<?php
 
require_once('class.ezpdf.php');
 
$pdf =& new Cezpdf('LETTER','landscape');
$pdf->selectFont('fonts/Courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5); 
 
     
$conexion=mysql_connect("localhost","livecamp_cy","Cop@yermo2014") or die(mysql_error());
mysql_select_db("livecamp_registros",$conexion) or die(mysql_error());
         
$resEmp= "";
$titles= "";
$pdf->ezImage('img/logo.jpg',0, 140, 'none', 'center',array('color'=>'black'));
$txttit="";
     
$resEmp = mysql_query("SELECT  nombre, apellidos, procedencia, deporte, categoria, rama, rango, cinta, foto FROM datos where procedencia='Esc. Victoria' ORDER BY deporte ,categoria , genero") or die(mysql_error());
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


 
$pdf->ezText("<b>Esc. Victoria</b>\n",16);
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
$pdf->ezText("<b>Entrenador:</b> ", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 7);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 7);
$pdf->ezStream(); 

?>



