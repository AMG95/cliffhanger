// Alejandro Millet Gerion
// Documento JS para mostrar mensajes personalizados segun el caso

// Variables necesarias para la carga de mensajes
let estado;
let mensajeCod;
let mensajeTxt;

mensajeCod = parseInt(getParameterByName('mensaje'));

// Switch que selecciona el texto y el estado del mensaje según el código
switch(mensajeCod){
    case 11:
        estado     = "success";
        mensajeTxt = "Usuario registrado con éxito";
        break;
    case 12:
        estado     = "danger";
        mensajeTxt = "Usuario bloqueado. Consulte con el administrador";
        break;
    case 13:
        estado     = "danger";
        mensajeTxt = "El usuario no esta registrado. Intentelo de nuevo";
        break;
    case 21:
        estado     = "success";
        mensajeTxt = "Incidencia enviada con éxito";
        break;  
    case 31:
        estado     = "success";
        mensajeTxt = "Producto eliminado con éxito";
        break;
    case 32:
        estado     = "success";
        mensajeTxt = "Pedido realizado con éxito";
        break;  
}