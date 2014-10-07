<?php
 
require_once('class.ezpdf.php');
 
$pdf =& new Cezpdf('LETTER','landscape');
$pdf->selectFont('fonts/Courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5); 
 
     
$conexion= mysql_connect("localhost","livecamp_cy","Cop@yermo2014") 
or die(mysql_error());
mysql_select_db("livecamp_registros",$conexion) or die(mysql_error());
         
$resEmp= "";
$titles= "";
$pdf->ezImage('',0, 80, 'none', 'center',array());
$pdf->ezImage('',0, 100, 'none', 'left',array());
$txttit="";
     
$resEmp = mysql_query("SELECT escuela,desayuno,almuerzo,cena FROM  alimentacion ") or die(mysql_error());
$txttit = "Informe De alimentacion General\n";
$titles = array(

                         
'escuela'=>'<b>Nombre de la escuela</b>',
'desayuno'=>'<b>cantidad de desayunos</b>',

'almuerzo'=>'<b>cantidad de almuerzos</b>',

'cena'=>'<b>cantidad de cena</b>',


)

;


 
$pdf->ezText("<b>Informe General De Alimentacion</b>\n",16,array('justification'=>'top'));
$pdf->ezText("IV Copa Yermo\n",12,array('justification'=>'center'));

$pdf->ezTable($data,$titles,'',$options );

                    
 
$totEmp = mysql_num_rows($resEmp); 
 
$ixx = 0;
 
while($datatmp = mysql_fetch_assoc($resEmp)) { 
$ixx = $ixx+1;
$data[] = array_merge($datatmp, array('num'=>$ixx));
}
 
$options = array(
'shadeCol'=>array(0.9,0.9,0.9),
'xOrientation'=>'center',
'width'=>700
); 
 
$pdf->ezText($txttit, 9);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 7);

$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 7);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 7);
$pdf->ezStream(); 

?>