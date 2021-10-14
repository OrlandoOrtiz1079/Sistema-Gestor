<?php
require('../pdf/fpdf.php');
 $Nombre_Completo=$nombre=$_GET['nom'].' '.$AP=$_GET['AP'].' '.$AM=$_GET['AM'];
 $Numero_Control=$_GET['NumCon'];
 $Creditos=$_GET['Cred'];
 $Valor=$_GET['Valor'];
 $Desempeño=$_GET['Desem'];
 $Carrera=$_GET['carrera'];
 $Evento=$_GET['Even'];
 $Fecha=$_GET['fecha'];
 $Periodo=$_GET['Periodo'];
 
class PDF_FlowingBlock extends FPDF{

    var $flowingBlockAttr;

    function saveFont()
    {

        $saved = array();

        $saved[ 'family' ] = $this->FontFamily;
        $saved[ 'style' ] = $this->FontStyle;
        $saved[ 'sizePt' ] = $this->FontSizePt;
        $saved[ 'size' ] = $this->FontSize;
        $saved[ 'curr' ] =& $this->CurrentFont;

        return $saved;

    }

    function restoreFont( $saved )
    {

        $this->FontFamily = $saved[ 'family' ];
        $this->FontStyle = $saved[ 'style' ];
        $this->FontSizePt = $saved[ 'sizePt' ];
        $this->FontSize = $saved[ 'size' ];
        $this->CurrentFont =& $saved[ 'curr' ];

        if( $this->page > 0)
            $this->_out( sprintf( 'BT /F%d %.2F Tf ET', $this->CurrentFont[ 'i' ], $this->FontSizePt ) );

    }

    function newFlowingBlock( $w, $h, $b = 0, $a = 'J', $f = 0 )
    {

        // cell width in points
        $this->flowingBlockAttr[ 'width' ] = $w * $this->k;

        // line height in user units
        $this->flowingBlockAttr[ 'height' ] = $h;

        $this->flowingBlockAttr[ 'lineCount' ] = 0;

        $this->flowingBlockAttr[ 'border' ] = $b;
        $this->flowingBlockAttr[ 'align' ] = $a;
        $this->flowingBlockAttr[ 'fill' ] = $f;

        $this->flowingBlockAttr[ 'font' ] = array();
        $this->flowingBlockAttr[ 'content' ] = array();
        $this->flowingBlockAttr[ 'contentWidth' ] = 0;

    }

    function finishFlowingBlock()
    {

        $maxWidth =& $this->flowingBlockAttr[ 'width' ];

        $lineHeight =& $this->flowingBlockAttr[ 'height' ];

        $border =& $this->flowingBlockAttr[ 'border' ];
        $align =& $this->flowingBlockAttr[ 'align' ];
        $fill =& $this->flowingBlockAttr[ 'fill' ];

        $content =& $this->flowingBlockAttr[ 'content' ];
        $font =& $this->flowingBlockAttr[ 'font' ];

        // set normal spacing
        $this->_out( sprintf( '%.3F Tw', 0 ) );

        // print out each chunk

        // the amount of space taken up so far in user units
        $usedWidth = 0;

        foreach ( $content as $k => $chunk )
        {

            $b = '';

            if ( is_int( strpos( $border, 'B' ) ) )
                $b .= 'B';

            if ( $k == 0 && is_int( strpos( $border, 'L' ) ) )
                $b .= 'L';

            if ( $k == count( $content ) - 1 && is_int( strpos( $border, 'R' ) ) )
                $b .= 'R';

            $this->restoreFont( $font[ $k ] );

            // if it's the last chunk of this line, move to the next line after
            if ( $k == count( $content ) - 1 )
                $this->Cell( ( $maxWidth / $this->k ) - $usedWidth + 2 * $this->cMargin, $lineHeight, $chunk, $b, 1, $align, $fill );
            else
                $this->Cell( $this->GetStringWidth( $chunk ), $lineHeight, $chunk, $b, 0, $align, $fill );

            $usedWidth += $this->GetStringWidth( $chunk );

        }

    }

    function WriteFlowingBlock( $s )
    {

        // width of all the content so far in points
        $contentWidth =& $this->flowingBlockAttr[ 'contentWidth' ];

        // cell width in points
        $maxWidth =& $this->flowingBlockAttr[ 'width' ];

        $lineCount =& $this->flowingBlockAttr[ 'lineCount' ];

        // line height in user units
        $lineHeight =& $this->flowingBlockAttr[ 'height' ];

        $border =& $this->flowingBlockAttr[ 'border' ];
        $align =& $this->flowingBlockAttr[ 'align' ];
        $fill =& $this->flowingBlockAttr[ 'fill' ];

        $content =& $this->flowingBlockAttr[ 'content' ];
        $font =& $this->flowingBlockAttr[ 'font' ];

        $font[] = $this->saveFont();
        $content[] = '';

        $currContent =& $content[ count( $content ) - 1 ];

        // where the line should be cutoff if it is to be justified
        $cutoffWidth = $contentWidth;

        // for every character in the string
        for ( $i = 0; $i < strlen( $s ); $i++ )
        {

            // extract the current character
            $c = $s[ $i ];

            // get the width of the character in points
            $cw = $this->CurrentFont[ 'cw' ][ $c ] * ( $this->FontSizePt / 1000 );

            if ( $c == ' ' )
            {

                $currContent .= ' ';
                $cutoffWidth = $contentWidth;

                $contentWidth += $cw;

                continue;

            }

            // try adding another char
            if ( $contentWidth + $cw > $maxWidth )
            {

                // won't fit, output what we have
                $lineCount++;

                // contains any content that didn't make it into this print
                $savedContent = '';
                $savedFont = array();

                // first, cut off and save any partial words at the end of the string
                $words = explode( ' ', $currContent );

                // if it looks like we didn't finish any words for this chunk
                if ( count( $words ) == 1 )
                {

                    // save and crop off the content currently on the stack
                    $savedContent = array_pop( $content );
                    $savedFont = array_pop( $font );

                    // trim any trailing spaces off the last bit of content
                    $currContent =& $content[ count( $content ) - 1 ];

                    $currContent = rtrim( $currContent );

                }

                // otherwise, we need to find which bit to cut off
                else
                {

                    $lastContent = '';

                    for ( $w = 0; $w < count( $words ) - 1; $w++)
                        $lastContent .= "{$words[ $w ]} ";

                    $savedContent = $words[ count( $words ) - 1 ];
                    $savedFont = $this->saveFont();

                    // replace the current content with the cropped version
                    $currContent = rtrim( $lastContent );

                }

                // update $contentWidth and $cutoffWidth since they changed with cropping
                $contentWidth = 0;

                foreach ( $content as $k => $chunk )
                {

                    $this->restoreFont( $font[ $k ] );

                    $contentWidth += $this->GetStringWidth( $chunk ) * $this->k;

                }

                $cutoffWidth = $contentWidth;

                // if it's justified, we need to find the char spacing
                if( $align == 'J' )
                {

                    // count how many spaces there are in the entire content string
                    $numSpaces = 0;

                    foreach ( $content as $chunk )
                        $numSpaces += substr_count( $chunk, ' ' );

                    // if there's more than one space, find word spacing in points
                    if ( $numSpaces > 0 )
                        $this->ws = ( $maxWidth - $cutoffWidth ) / $numSpaces;
                    else
                        $this->ws = 0;

                    $this->_out( sprintf( '%.3F Tw', $this->ws ) );

                }

                // otherwise, we want normal spacing
                else
                    $this->_out( sprintf( '%.3F Tw', 0 ) );

                // print out each chunk
                $usedWidth = 0;

                foreach ( $content as $k => $chunk )
                {

                    $this->restoreFont( $font[ $k ] );

                    $stringWidth = $this->GetStringWidth( $chunk ) + ( $this->ws * substr_count( $chunk, ' ' ) / $this->k );

                    // determine which borders should be used
                    $b = '';

                    if ( $lineCount == 1 && is_int( strpos( $border, 'T' ) ) )
                        $b .= 'T';

                    if ( $k == 0 && is_int( strpos( $border, 'L' ) ) )
                        $b .= 'L';

                    if ( $k == count( $content ) - 1 && is_int( strpos( $border, 'R' ) ) )
                        $b .= 'R';

                    // if it's the last chunk of this line, move to the next line after
                    if ( $k == count( $content ) - 1 )
                        $this->Cell( ( $maxWidth / $this->k ) - $usedWidth + 2 * $this->cMargin, $lineHeight, $chunk, $b, 1, $align, $fill );
                    else
                    {

                        $this->Cell( $stringWidth + 2 * $this->cMargin, $lineHeight, $chunk, $b, 0, $align, $fill );
                        $this->x -= 2 * $this->cMargin;

                    }

                    $usedWidth += $stringWidth;

                }

                // move on to the next line, reset variables, tack on saved content and current char
                $this->restoreFont( $savedFont );

                $font = array( $savedFont );
                $content = array( $savedContent . $s[ $i ] );

                $currContent =& $content[ 0 ];

                $contentWidth = $this->GetStringWidth( $currContent ) * $this->k;
                $cutoffWidth = $contentWidth;

            }

            // another character will fit, so add it on
            else
            {

                $contentWidth += $cw;
                $currContent .= $s[ $i ];

            }

        }
        // Intérprete de HTML
    $s = str_replace("\n",' ',$s);
    $a = preg_split('/<(.*)>/U',$s,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                print ("");
        }
        else
        {
            // Etiqueta
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extraer atributos
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }


    }

protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';
function WriteHTML($html)
{
    // Intérprete de HTML
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            // Etiqueta
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extraer atributos
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Etiqueta de apertura
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Etiqueta de cierre
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modificar estilo y escoger la fuente correspondiente
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    // Escribir un hiper-enlace
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->MultiCell(0,5,$txt);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);

    $this->Ln(20);
}


}


$html = '<br><br><br><br><br><br><br>                                   Constancia de Cumplimiento de Actividad Complementaria.';

$html2='<br><br><br><br><br><b> LEOBARDA ESPERANZA SOTO TABOADA</b><br>
<b>JEFA DEL DEPARTAMENTO DE SERVICIOS ESCOLARES</b><br>
<b>P R E S E N T E</b><br><br><br>';

$html3='<br><br><br><b></b>Se extiende la presente en la Ciudad de Iguala, Guerrero., <b>'.$Fecha.'</b>';
$html4='  <br><br><br>                                                                    <b>ATENTAMENTE</b><br>
                                                  <i>Excelencia en Educación Tecnológica</i><br>
                                             <i>Tecnología como Sinónimo de Independencia</i>';
$html7='<br><br><br>                                                                                                                    Vo. Bo.
<br><br><br><br><br><br><b>JORGE EDUARDO ORTEGA LÓPEZ                             SERGIO RICARDO ZAGAL BARRERA</b>
<br>JEFE DEL DEPARTAMENTO DE SISTEMAS                          SUBDIRECTOR ACADEMICO<br>Y COMPUTACIÓN.';
$html8='<br><br>c.c.p. Jefe de Departamento de Sistemas y Computación.';

$pdf = new PDF_FlowingBlock();

$pdf->AddPage();
$pdf->Image('../vistas/assets/images/Encabezado.png',15,14,180,0);
$pdf->Image('../vistas/assets/images/Piedepagina.png',15,245,180,0);
$pdf->SetFont('Arial','I',9);
$pdf->WriteHTML(utf8_decode($html));
$pdf->WriteHTML(utf8_decode($html2));
$pdf->newFlowingBlock( 160, 6, '', 'J' );
$pdf->SetFont( 'Arial', '', 9 );
$pdf->WriteFlowingBlock( utf8_decode('El que suscribe ') );
$pdf->SetFont( 'Arial', 'B', 9 );
$pdf->WriteFlowingBlock( utf8_decode('JORGE EDUARDO ORTEGA LÓPEZ') );
$pdf->SetFont( 'Arial', '', 9 );
$pdf->WriteFlowingBlock( utf8_decode(', Jefe del Departamento de Sistemas y Computación, por este medio se permite hacer de su conocimiento que el(a) estudiante ') );
$pdf->SetFont( 'Arial', 'B', 9 );
$pdf->WriteFlowingBlock( utf8_decode($Nombre_Completo) );
$pdf->SetFont( 'Arial', '', 9 );
$pdf->WriteFlowingBlock( utf8_decode(', con número de control ') );
$pdf->SetFont( 'Arial', 'B', 9 );
$pdf->WriteFlowingBlock( utf8_decode($Numero_Control) );
$pdf->SetFont( 'Arial', '', 9 );
$pdf->WriteFlowingBlock( utf8_decode(' de la carrera de ') );
$pdf->SetFont( 'Arial', 'B', 9 );
$pdf->WriteFlowingBlock( utf8_decode($Carrera) );
$pdf->SetFont( 'Arial', '', 9 );
$pdf->WriteFlowingBlock( utf8_decode(' ha ') );
$pdf->SetFont( 'Arial', 'B', 9 );
$pdf->WriteFlowingBlock( utf8_decode('CUMPLIDO') );
$pdf->SetFont( 'Arial', '', 9 );
$pdf->WriteFlowingBlock( utf8_decode(' su actividad complementaria como participante en ') );
$pdf->SetFont( 'Arial', 'B', 9 );
$pdf->WriteFlowingBlock( utf8_decode($Evento) );
$pdf->SetFont( 'Arial', '', 9 );
$pdf->WriteFlowingBlock( utf8_decode(' con el nivel de desempeño ') );
$pdf->SetFont( 'Arial', 'B', 9 );
$pdf->WriteFlowingBlock( utf8_decode($Desempeño) );
$pdf->SetFont( 'Arial', '', 9 );
$pdf->WriteFlowingBlock( utf8_decode(' y un valor numérico de ') );
$pdf->SetFont( 'Arial', 'B', 9 );
$pdf->WriteFlowingBlock( utf8_decode($Valor) );
$pdf->SetFont( 'Arial', '', 9 );
$pdf->WriteFlowingBlock( utf8_decode(', durante el periodo escolar ') );
$pdf->SetFont( 'Arial', 'B', 9 );
$pdf->WriteFlowingBlock( utf8_decode($Periodo) );
$pdf->SetFont( 'Arial', '', 9 );
$pdf->WriteFlowingBlock( utf8_decode(', con un valor curricular de ') );
$pdf->SetFont( 'Arial', 'B', 9 );
$pdf->WriteFlowingBlock( utf8_decode($Creditos) );


$pdf->finishFlowingBlock();

$pdf->WriteHTML(utf8_decode($html3));
$pdf->WriteHTML(utf8_decode($html4));
$pdf->WriteHTML(utf8_decode($html7));
$pdf->WriteHTML(utf8_decode($html8));

$pdf->Output();
//
?>
