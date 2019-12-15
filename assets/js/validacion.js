// Documento JS que se usara mayoritariamente para la validacion de cada uno de los campos del formulario y otras utilidades.

// Funcion tooltip que mostrara un mensaje personalizado al pasar el puntero sobre el elemento que tiene asignado dicha funcion.
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();  
  });
  
  // Funcion para no perder el foco en los campos "Nombre" y "Cuenta de correo electronico (email)" de los formularios de registro e inicio de sesion respectivamente ya que al estar creados dentro de un modal de boostrap, tiende a dar problemas con el autofocus.
  $(document).ready(function() {   
	  $('#modal1').on('shown.bs.modal', function () {   
		  $('#id_nombre').focus(); 
	  });
	  $('#modal2').on('shown.bs.modal', function () {   
		  $('#id_email_login').focus(); 
	  });
  });
  
  // Funcion para validar el campo del formulario donde el usuario introducira su nombre.
  $(document).ready(function(){
	  $("#id_nombre").change(function(){
		  var nombre = $("#id_nombre").val(); //Recoge el valor del campo del formulario.
		  var expre_regu = /^[a-zA-Z\'\s]*$/; //Expresion regular para validacion de nombre en el que no admita numeros.
  
		  if (!expre_regu.test(nombre)) { //Si lo que dicta la expresion regular no coincide con lo que hay en el campo, sale un mensaje de error.
			  document.getElementById("error_nombre").innerHTML = "El nombre contiene caracteres no permitidos.";
			  $("#id_nombre").focus(); //El campo no pierde el foco del puntero.
		  } else { //Si todo va bien, vacia el error solo si anteriormente se escribio algo no establecido en la expresion regular.
			  document.getElementById("error_nombre").innerHTML = "";
		  }
	  });
  });
  
  // Funcion para validar el campo del formulario donde el usuario introducira su primer apellido.
  $(document).ready(function(){
	  $("#id_primer_ape").change(function(){
		  var apellido1 = $("#id_primer_ape").val(); //Recoge el valor del campo del formulario.
		  var expre_regu = /^[a-zA-Z\'\s]*$/; //Expresion regular para validacion de apellido/s en el que no admita numeros.
  
		  if (!expre_regu.test(apellido1)) { //Si lo que dicta la expresion regular no coincide con lo que hay en el campo, sale un mensaje de error.
			  document.getElementById("error_primer_ape").innerHTML = "El apellido contiene caracteres no permitidos.";
			  $("#id_primer_ape").focus(); //El campo no pierde el foco del puntero.
		  } else { //Si todo va bien, vacia el error solo si anteriormente se escribio algo no establecido en la expresion regular.
			  document.getElementById("error_primer_ape").innerHTML = "";
		  }
	  });
  });
  
  
  // Funcion para validar el campo del formulario donde el usuario introducira su segundo apellido.
  $(document).ready(function(){
	  $("#id_segundo_ape").change(function(){
		  var apellido2 = $("#id_segundo_ape").val(); //Recoge el valor del campo del formulario.
		  var expre_regu = /^[a-zA-Z\'\s]*$/; //Expresion regular para validacion de apellido/s en el que no admita numeros.
  
		  if (!expre_regu.test(apellido2)) { //Si lo que dicta la expresion regular no coincide con lo que hay en el campo, sale un mensaje de error.
			  document.getElementById("error_segundo_ape").innerHTML = "El apellido contiene caracteres no permitidos.";
			  $("#id_segundo_ape").focus(); //El campo no pierde el foco del puntero.
		  } else { //Si todo va bien, vacia el error solo si anteriormente se escribio algo no establecido en la expresion regular.
			  document.getElementById("error_segundo_ape").innerHTML = "";
		  }
	  });
  });
  
  
  // Funcion para validar el campo del formulario donde el usuario introducira su DNI.
  $(document).ready(function(){
	  $("#id_dni").change(function(){
		  var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E']; //Array de letras.
		  var dni = $("#id_dni").val(); //Recoge el valor del campo del formulario.
		  var dniNumero = dni.substring(0,7); //Conjunto de numero del DNI.
		  var dniLetra = dni.substring(8); //Letra unica que ira asociada al conjunto de numeros del DNI.
  
		  dniLetra = dniLetra.toUpperCase(); //Convertimos la letra a mayuscula si el usuario la a introducido en minuscula.
		  dniNumero = parseInt(dni); //Convertimos de cadena a numero entero.
  
		  if (dniNumero < 0 || dniNumero > 99999999) { //Si el conjunto de numeros es menor que cero o mayor que el limite de numeros admitidos en un DNI, salta un error.
			  document.getElementById("error_dni").innerHTML = "El DNI introducido no es valido.";
			  $("#id_dni").focus(); //El campo no pierde el foco del puntero.
		  }
		  else { //Sino, se calcula el cojunto de numeros con su letra asociada y si coincide, es correcto. 
			  var letraCalculada = letras[dniNumero % 23];
			  if(letraCalculada == dniLetra) {
				  document.getElementById("error_dni").innerHTML = "";
			  }
			  else {
				  document.getElementById("error_dni").innerHTML = "La letra o el numero proporcionados no son correctos.";
				  $("#id_dni").focus();
			  }
		  }
	  });
  });
  
  
  // Funcion para validar el campo del formulario donde el usuario introducira su nombre de usuario.
  $(document).ready(function(){
	  $("#id_username").change(function(){
		  var tel = $("#id_username").val(); //Recoge el valor del campo del formulario.
		  var expre_regu = /^[a-zA-Z0-9]+$/; //Expresion regular para validacion de usuario.
  
		  if (!expre_regu.test(tel)) { //Si lo que dicta la expresion regular no coincide con lo que hay en el campo, sale un mensaje de error.
			  document.getElementById("error_username").innerHTML = "El nombre de usuario contiene caracteres no permitidos.";
			  $("#id_username").focus(); //El campo no pierde el foco del puntero.
		  } else { //Si todo va bien, vacia el error solo si anteriormente se escribio algo no establecido en la expresion regular.
			  document.getElementById("error_username").innerHTML = "";
		  }
	  });
  });
  
  
  // Funcion para validar el campo del formulario donde el usuario introducira otra vez la contrasena en el formulario de registro.
  $(document).ready(function(){
	  $("#id_rpwd").change(function(){
		  var contra = $("#id_pwd").val(); //Recoge el valor del campo del formulario.
		  var repite_contra = $("#id_rpwd").val();
  
		  if (contra != repite_contra){
			  document.getElementById("error_rpwd").innerHTML = "Las contrasenas no son iguales. Intentalo de nuevo.";
			  $("#id_rpwd").val(""); //Vacia el campo.
			  $("#id_rpwd").focus(); //El campo no pierde el foco del puntero.
		  }
		  else {
			  document.getElementById("error_rpwd").innerHTML = "";
		  }
	  });
  });
  
  
  // Funcion para validar el campo del formulario donde el usuario introducira el email.
  $(document).ready(function(){
	  $("#id_email").change(function(){
		  var email = $("#id_email").val(); //Recoge el valor del campo del formulario.
		  var expre_regu = /^[a-zA-Z]+[a-zA-Z0-9\.\-\_]+@[a-z|A-Z|0-9]+\.([a-z|A-Z]{2,4})$/; //Expresion regular para validacion de email.
  
		  if (!expre_regu.test(email)) { //Si lo que dicta la expresion regular no coincide con lo que hay en el campo, sale un mensaje de error.
			  document.getElementById("error_email").innerHTML = "Email incorrecto.";
			  $("#id_email").focus(); //El campo no pierde el foco del puntero.
		  } else { //Si todo va bien, vacia el error solo si anteriormente se escribio algo no establecido en la expresion regular.
			  document.getElementById("error_email").innerHTML = "";
		  }
	  });
  });
  
  
  // Funcion para validar el campo del formulario donde el usuario introducira el email en el login o Inicio de sesion.
  $(document).ready(function(){
	  $("#id_email_login").change(function(){
		  var email_login = $("#id_email_login").val(); //Recoge el valor del campo del formulario.
		  var expre_regu = /^[a-zA-Z]+[a-zA-Z0-9\.\-\_]+@[a-z|A-Z|0-9]+\.([a-z|A-Z]{2,4})$/; //Expresion regular para validacion de email.
  
		  if (!expre_regu.test(email_login)) { //Si lo que dicta la expresion regular no coincide con lo que hay en el campo, sale un mensaje de error.
			  document.getElementById("error_email_login").innerHTML = "Email incorrecto.";
			  $("#id_email_login").focus(); //El campo no pierde el foco del puntero.
		  } else { //Si todo va bien, vacia el error solo si anteriormente se escribio algo no establecido en la expresion regular.
			  document.getElementById("error_email_login").innerHTML = "";
		  }
	  });
  });