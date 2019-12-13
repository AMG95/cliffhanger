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
        mensajeTxt = "Producto eliminado con éxito";
        break;
    case 21:
        estado     = 'success';
        mensajeTxt = 'Pedido cancelado con éxito';
        break;
    case 31:
        estado     = 'success';
        mensajeTxt = 'Opinión moderada con éxito';
        break;
    case 41:
        estado     = 'success';
        mensajeTxt = 'Usuario bloqueado con éxito';
        break;
    case 42:
        estado     = 'success';
        mensajeTxt = 'Usuario desbloqueado con éxito';
        break;
    case 51:
        estado     = 'success';        
        mensajeTxt = 'Categoría actualizada con éxito';
        break;
    case 52:
        estado     = 'success';        
        mensajeTxt = 'Categoría insertada con éxito';
        break;        
    case 61:
        estado     = 'success';
        mensajeTxt = 'Producto insertado con éxito';
        break;
    case 71:
        estado     = 'success';
        mensajeTxt = 'Producto actualizado con éxito';
        break;        
}