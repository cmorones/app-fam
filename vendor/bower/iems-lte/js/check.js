$(function(){
marcar = function(elemento){
elemento = $(elemento);
elemento.prop("checked", true);
}

desmarcar = function(elemento){
elemento = $(elemento);
elemento.prop("checked", false);
}
});