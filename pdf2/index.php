<?php
 
require_once('class.ezpdf.php');
 
$pdf =& new Cezpdf('LETTER','landscape');
$pdf->selectFont('fonts/Courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5); 
 
     
$conexion=mysql_connect("localhost","root","root") or die(mysql_error());
mysql_select_db("registro",$conexion) or die(mysql_error());
         
$resEmp= "";
$titles= "";
$txttit="";
     
$resEmp = mysql_query("SELECT  nombre, apellidos, procedencia, deporte, categoria, rama, rango, cinta, foto FROM datos") or die(mysql_error());
$txttit = "Informe de todos los usuarios\n";
$titles = array(

                         
'adjunto' => 'Foto',
'nombre'=>'<b>Nombre Alumno</b>',
'apellidos'=>'<b>Apellido alumno</b>',
'procedencia'=>'<b>Escuela</b>',
'deporte'=>'<b>Deporte del participante</b>',
'categoria'=>'<b>Categoria del deporte</b>',
'rama'=>'<b>Rama del deporte</b>',
'rango' => '<b>Rango</b>',
'cinta'=>'<b>Cinta</b>',


);


$pdf->ezText("<b>Colegio Miguel Hidalgo</b>\n",16);
$pdf->ezText("Relacion de participantes\n",12,array('justification'=>'center'));              
 
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