// JavaScript Document
function zoomText(Accion,Elemento){
//inicializacion de variables y par�metros 
var obj=document.getElementById(Elemento);
var max = 500 //tama�o m�ximo del fontSize
var min = 80 //tama�o m�nimo del fontSize
if (obj.style.fontSize==""){
obj.style.fontSize="100%";
}
actual=parseInt(obj.style.fontSize); //valor actual del tama�o del texto 
incremento=10;// el valor del incremento o decremento en el tama�o 

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