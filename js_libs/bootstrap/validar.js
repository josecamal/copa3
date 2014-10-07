$( document ).ready(function() {
	//alert("listo");
  $("#bEnviar").on("click",validarFormulario);
  $("#benvio").on("click",validarFormulario2);
  $("#benvio2").on("click",validarFormulario3);
  
  //aqui se realizan las funciones del datepicker desde el cambio de idioma ,etc
  $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
   $.datepicker.setDefaults($.datepicker.regional['es']);
     $( "#datepicker" ).datepicker({
              changeMonth: true,
               changeYear: true,

        });

     //ocultar los elementos
  $("#enfermedad01").click(function(evento){
        if ($("#enfermedad01").attr("checked")){
            $("#enfermedades").css("display", "block");
        }else{
            $("#enfermedades").css("display", "none");
        }
    });
});

//validacion de los formularios
	var expr="/^[a-zA-Z0-9_\.\-]+@[a-za-Z0-9\-]+\.[a-za-Z0-9\-\.]+$/";
	
	function validarFormulario(){
		
         var nombre    =$("#nombre").val();
         var apellidos =$("#apellidos").val();
         var edad      =$("#edad").val();
         var curp      =$("#curp").val();
         var domicilio =$("#domicilio").val();
         var ciudad    =$("#ciudad").val();
         var municipio =$("#municipio").val();
        var localidad  =$("#localidad").val();
        var telefono   =$("#tel").val();
        var celular    =$("#cel").val();
        var correo     =$("#correo").val();
        var fecha      =$("#datepicker").val();
        var    rb      =$("input [type='radio']:checked");

$("#nombre").each(function(){
 var bandera = 0;		
if(nombre==""){
	 $(this).css({'border':'3px solid red'});
     $(this).attr('placeholder','Dato requrido');
	 return false;
     bandera =1;
}else{
    $(this).css({'border':'1px solid #ccc'});
    $(this).removeAttr('placeholder','Dato requrido');
}
 
  });
$("#apellidos").each(function(){
var bandera1 = 0;        
if(apellidos==""){
     $(this).css({'border':'3px solid red'});
     $(this).attr('placeholder','Dato requrido');
     return false;
     bandera1 =1;
}else{
    $(this).css({'border':'1px solid #ccc'});
    $(this).removeAttr('placeholder','Dato requrido');
}
 
  });
$("#edad").each(function(){
var bandera2 = 0;        
if(edad==""){
     $(this).css({'border':'3px solid red'});
     $(this).attr('placeholder','Dato requrido');
     return false;
     bandera2 =1;
}else{
    $(this).css({'border':'1px solid #ccc'});
    $(this).removeAttr('placeholder','Dato requrido');
}
 
  });
$("#datepicker").each(function(){
var bandera3 = 0;        
if(fecha==""){
     $(this).css({'border':'3px solid red'});
     $(this).attr('placeholder','Dato requrido');
     return false;
     bandera3 =1;
}else{
    $(this).css({'border':'1px solid #ccc'});
    $(this).removeAttr('placeholder','Dato requrido');
}
 
  });
$("#curp").each(function(){
var bandera4 = 0;        
if(curp==""){
     $(this).css({'border':'3px solid red'});
     $(this).attr('placeholder','Dato requrido');
     return false;
     bandera4 =1;
}else{
    $(this).css({'border':'1px solid #ccc'});
    $(this).removeAttr('placeholder','Dato requrido');
}
 
  });
$("#domicilio").each(function(){
var bandera5 = 0;        
if(domicilio==""){
     $(this).css({'border':'3px solid red'});
     $(this).attr('placeholder','Dato requrido');
     return false;
     bandera5 =1;
}else{
    $(this).css({'border':'1px solid #ccc'});
    $(this).removeAttr('placeholder','Dato requrido');
}
 
  });
$("#localidad").each(function(){
var bandera6 = 0;        
if(localidad==""){
     $(this).css({'border':'3px solid red'});
     $(this).attr('placeholder','Dato requrido');
     return false;
     bandera6 =1;
}else{
    $(this).css({'border':'1px solid #ccc'});
    $(this).removeAttr('placeholder','Dato requrido');
}
 
  });
$("#ciudad").each(function(){
var bandera3 = 0;        
if(ciudad==""){
     $(this).css({'border':'3px solid red'});
     $(this).attr('placeholder','Dato requrido');
     return false;
     bandera3 =1;
}else{
    $(this).css({'border':'1px solid #ccc'});
    $(this).removeAttr('placeholder','Dato requrido');
}
 
  });
$("#municipio").each(function(){
var bandera3 = 0;        
if(municipio==""){
     $(this).css({'border':'3px solid red'});
     $(this).attr('placeholder','Dato requrido');
     return false;
     bandera3 =1;
}else{
    $(this).css({'border':'1px solid #ccc'});
    $(this).removeAttr('placeholder','Dato requrido');
}
 
  });
$("#tel").each(function(){
var bandera3 = 0;        
if(telefono==""){
     $(this).css({'border':'3px solid red'});
     $(this).attr('placeholder','Dato requrido');
     return false;
     bandera3 =1;
}else{
    $(this).css({'border':'1px solid #ccc'});
    $(this).removeAttr('placeholder','Dato requrido');
}
 
  });
$("#cel").each(function(){
var bandera3 = 0;        
if(celular==""){
     $(this).css({'border':'3px solid red'});
     $(this).attr('placeholder','Dato requrido');
     return false;
     bandera3 =1;
}else{
    $(this).css({'border':'1px solid #ccc'});
    $(this).removeAttr('placeholder','Dato requrido');
}
 
  });
$("#correo").each(function(){
var bandera3 = 0;        
if(correo==""){
     $(this).css({'border':'3px solid red'});
     $(this).attr('placeholder','Dato requrido');
     return false;
     bandera3 =1;
}else{
    $(this).css({'border':'1px solid #ccc'});
    $(this).removeAttr('placeholder','Dato requrido');
}
 
  });

}
 
 function validarFormulario2(){
    //alert("jose");
   var matricula=$("#matricula").val();
   var responsable =$("#responsable").val();
  
 $("#matricula").each(function(){
   var bandera = 0;        
   if(matricula==""){
        $(this).css({'border':'3px solid red'});
        $(this).attr('placeholder','Dato requrido');
       return false;
        bandera =1;
}  else{
      $(this).css({'border':'1px solid #ccc'});
      $(this).removeAttr('placeholder','Dato requrido');
}
 
  });
      
$("#responsable").each(function(){
     var bandera = 0;        
if(responsable==""){
     $(this).css({'border':'3px solid red'});
     $(this).attr('placeholder','Dato requrido');
     return false;
     bandera =1;
}else{
    $(this).css({'border':'1px solid #ccc'});
    $(this).removeAttr('placeholder','Dato requrido');
}
 
  });

 }
    
function validarFormulario3(){
    //alert("josee");

    var nombrerespon     =$("#nom_resp").val();
    var apellidosrespon  =$("#apellido_resp").val();
    var correorespon     =$("#correo_resp").val();
    var celularrespon    =$("#cel_resp").val();

    $("#nom_resp").each(function(){
      var bandera = 0;        
if(nombrerespon==""){
     $(this).css({'border':'3px solid red'});
     $(this).attr('placeholder','Dato requrido');
     return false;
     bandera =1;
}else{
    $(this).css({'border':'1px solid #ccc'});
    $(this).removeAttr('placeholder','Dato requrido');
}
 
  });

$("#apellido_resp").each(function(){
    var bandera = 0;        
if(apellidosrespon==""){
     $(this).css({'border':'3px solid red'});
     $(this).attr('placeholder','Dato requrido');
     return false;
     bandera =1;
}else{
    $(this).css({'border':'1px solid #ccc'});
    $(this).removeAttr('placeholder','Dato requrido');
}
 
  });
      
 $("#correo_resp").each(function(){
    var bandera = 0;        
if(correorespon==""){
     $(this).css({'border':'3px solid red'});
     $(this).attr('placeholder','Dato requrido');
     return false;
     bandera =1;
}else{
    $(this).css({'border':'1px solid #ccc'});
    $(this).removeAttr('placeholder','Dato requrido');
}
 
  });

 $("#cel_resp").each(function(){
   var bandera = 0;        
if(celularrespon==""){
     $(this).css({'border':'3px solid red'});
     $(this).attr('placeholder','Dato requrido');
     return false;
     bandera =1;
}else{
    $(this).css({'border':'1px solid #ccc'});
    $(this).removeAttr('placeholder','Dato requrido');
}
 
  });
}

    
	
   

