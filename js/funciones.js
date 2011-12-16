// JavaScript Document
/*
------------------------------
CARACTERES UNICODE
\00e1 -> �
\00e9 -> �
\00ed -> �
\00f3 -> �
\00fa -> �

\00c1 -> �
\00c9 -> �
\00cd -> �
\00d3 -> �
\00da -> �

\00f1 -> �
\00d1 -> �
------------------------------
CARACTERES ESPECIALES
&aacute;	�
&eacute;	�
&iacute;	�
&oacute;	�
&uacute;	�
&Aacute;	�
&Eacute;	�
&Iacute;	�
&Oacute;	�
&Uacute;	�
&Ntilde;	�
&ntilde;	�
&iquest;	�
&iexcl;		�
&Uuml;		�
&uuml;		�
&amp;		&
&quot;		"
&lt;		<
&gt;		>
------------------------------
 


Ativando o jQuery lightBox plugin
GALERIA DE IMAGENES */
$(function() {
    $('#gallery a').lightBox();
});


/* BORDES REDONDEADOS */
$(document).ready(function(){
    $("#page").corner();
    $("#wrapper").corner();	
    $("#gallery").corner();		
});

function fecha ()
{
    var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    var f=new Date();
    document.getElementById('fecha').innerHTML=(f.getDate() + " de " + meses[f.getMonth()] + " del " + f.getFullYear());
}

function menu_horizontal ()	//para el menu horizontal y el pie de pagina
{
    var menu_principal=	"<ul>"+
    "<li><a href='index.php'>Principal<\/a><\/li>"+
    "<li><a href='empresa.html'>Empresa<\/a><\/li>"+
    "<li><a href='forma_pago.html'>Forma de Pago<\/a><\/li>"+
    "<li><a href='contactos.html'>Contactos<\/a><\/li><\/ul>";
 
    //document.getElementById('menu').innerHTML=menu_principal;
    document.getElementById('footer-menu').innerHTML=menu_principal;
}

function lista_productos ()
{
    var productos=	"<ul><li><h2>CATEGORIAS<\/h2><ul>"+
    "<li><a href=\'productos.php?id=1\'>Hogar<\/a><\/li>"+
    "<li><a href=\'productos.php?id=\'>Jardineria<\/a><\/li>"+
    "<li><a href=\'aire.html\'>Aire<\/a><\/li>"+
    "<li><a href=\'audio_video.html\'>Audio y Video<\/a><\/li>"+
    "<li><a href=\'electronica.html\'>Electronica<\/a><\/li>"+
    "<\/ul><\/li><\/ul>";
 
    //document.getElementById('sidebar').innerHTML=productos;
}

function calcular_cuotas (valor, id_producto)
{
    var texto="";
    var interes_3 = "";
    var interes_6 = "";
    var interes_10 = "";
    var interes_12 = "";
	
    var resultado_3 = "";
    var resultado_6 = "";
    var resultado_10 = "";
    var resultado_12 = "";
    var	concatenado="";
    var valores_calculados="";
    //	document.getElementById(id_producto).title="";
    interes_3 = ((valor*40)/100) + valor;
    interes_6 = ((valor*50)/100) + valor;
    interes_10 = ((valor*60)/100) + valor;
    interes_12 = ((valor*60)/100) + valor;	
	
    resultado_3 = Math.round(interes_3/3);
    resultado_6 = Math.round(interes_6/6);
    resultado_10 = Math.round(interes_10/10);
    resultado_12 = Math.round(interes_12/12);
    valor = Math.round(valor);
    texto = (document.getElementById(id_producto).title);
    valores_calculados ="<br>Precio Contado = "+valor+
    "<br>3 Cuotas de: "+resultado_3+
    "<br>6 Cuotas de: "+resultado_6+
    "<br>10 Cuotas de: "+resultado_10+
    "<br>12 Cuotas de: "+resultado_12;
    concatenado=texto+valores_calculados;
    document.getElementById(id_producto).title="";
    document.getElementById(id_producto).title=concatenado;

//	document.getElementById('hogar_1').title=(document.getElementById('hogar_1').title)+"123456879";
//	alert(document.getElementById(id_producto).title)
}