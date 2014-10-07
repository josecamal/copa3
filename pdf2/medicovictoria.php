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
$pdf->ezImage('',0, 140, 'none', 'left',array('color'=>'black'));
$txttit="";
     
$resEmp = mysql_query("SELECT nombre,apellidos,genero,procedencia, enfermedad, enfermedades FROM  datos WHERE procedencia ='Esc. Victoria'") or die(mysql_error());
$txttit = "Informe Medico General\n";
$titles = array(

                         
'nombre'=>'<b>Nombre del Alumno</b>',
'apellidos'=>'<b>Apellidos del alumno</b>',

'genero'=>'<b>sexo</b>',

'procedencia'=>'<b>procedencia</b>',
'enfermedad'=>'<b>enfermedad</b>',
'enfermedades' => '<b>medicamentos</b>',

)

;


$pdf->ezImage('img/logo.jpg',0, 140, 'none', 'center',array('color'=>'black')); 
$pdf->ezText("<b>Informe Medico General De La Esc.Victoria</b>\n",16);
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