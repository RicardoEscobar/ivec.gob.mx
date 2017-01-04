// JavaScript Document
function zoomText(Accion,Elemento){
//inicializacion de variables y parámetros 
var obj=document.getElementById(Elemento);
var max = 500 //tamaño máximo del fontSize
var min = 80 //tamaño mínimo del fontSize
if (obj.style.fontSize==""){
obj.style.fontSize="100%";
}
actual=parseInt(obj.style.fontSize); //valor actual del tamaño del texto 
incremento=10;// el valor del incremento o decremento en el tamaño 

//accion sobre el texto 
if( Accion=="reestablecer" ){
obj.style.fontSize="100%"
}
if( Accion=="aumentar" && ((actual+incremento) <= max )){
valor=actual+incremento;
obj.style.fontSize=valor+"%"
obj.style.lineHeight=valor+70+"%"
}
if( Accion=="disminuir" && ((actual+incremento) >= min )){
valor=actual-incremento;
obj.style.fontSize=valor+"%"
obj.style.lineHeight=valor+70+"%"
}
} 