<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



<head>











<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<link rel="shortcut icon" type="image/gif" href="http://i.imgur.com/hdptR.jpg" />


<title>+[.: Hacked by Atheroz :.]+</title>



<style type="text/css">



	body {



		font:"Courier New", Courier, monospace;



		background-color: #000;



		background-image: url(http://www.maxipapel.es/Uploads/1.png);



		background-repeat: no-repeat;



	}



	#warp	{



		margin-left: auto;



		margin-right: auto;



		width:630px;



	}



	#title	{



		font-size:30px;



		margin-bottom:200px;



	}



	#subheader	{



		margin-top:-30px;



	}



	#masage	{



		font-size: 24px;







	}



	h1	{



		color:#999;



		margin-bottom:1px;



	}



	p	{



		color:#999;



	}



	#footer	{



		margin-top: 150px;



		margin-left: auto;



		margin-right:auto;



		color:#999;



		border:dashed;



		width:400px;



	}



	a.activator{



		width:153px;



		height:150px;



		position:absolute;



		top:0px;



		right:0px;



		background: url(http://i1168.photobucket.com/albums/r487/chrisk8er/clickme.png) no-repeat top right;



		z-index:1;



		cursor:pointer;



	}



	/* Style for overlay and box */



	.overlay{



		background:transparent url(http://i1168.photobucket.com/albums/r487/chrisk8er/overlay.png) repeat top left;



		position:fixed;



		top:0px;



		bottom:0px;



		left:0px;



		right:0px;



		z-index:100;



	}



	.box{



		position:fixed;



		top:-200px;



		left:30%;



		right:30%;



		background-color: #000;



		color:#7f7f7f;



		padding:20px;



		border:2px solid #ccc;



		-moz-border-radius: 20px;



		-webkit-border-radius:20px;



		-khtml-border-radius:20px;



		-moz-box-shadow: 0 1px 5px #333;



		-webkit-box-shadow: 0 1px 5px #333;



		z-index:101;



	}



	.box h1{



		border-bottom: 1px dashed #7F7F7F;



		margin:-20px -20px 0px -20px;



		padding:10px;



		background-color:#FF0;



		color: #000;



		-moz-border-radius:20px 20px 0px 0px;



		-webkit-border-top-left-radius: 20px;



		-webkit-border-top-right-radius: 20px;



		-khtml-border-top-left-radius: 20px;



		-khtml-border-top-right-radius: 20px;



	}



	a.boxclose{



		float:right;



		width:26px;



		height:26px;



		background:transparent url(http://i1168.photobucket.com/albums/r487/chrisk8er/cancel.png) repeat top left;



		margin-top:-30px;



		margin-right:-30px;



		cursor:pointer;



	}



	.drop { position: absolute; width: 3;  filter: flipV(), flipH(); font-size: 40; color: blue }



</style>







<script language="JavaScript">



var message=" Your Security is BAD... Fix It Now... I'll ComeBack ";







///////////////////////////////////



function clickIE4(){



if (event.button==2){



alert(message);



return false;



}



}







function clickNS4(e){



if (document.layers||document.getElementById&&!document.all){



if (e.which==2||e.which==3){



alert(message);



return false;



}



}



}







if (document.layers){



document.captureEvents(Event.MOUSEDOWN);



document.onmousedown=clickNS4;



}



else if (document.all&&!document.getElementById){



document.onmousedown=clickIE4;



}







document.oncontextmenu=new Function("alert(message);return false")




</script>







<script language="javascript">



var rev = "fwd";



function titlebar(val)



{



var msg = "!!! Hacked By Atheroz / Oaxacan Hackers ";



var res = " ";



var speed = 100;



var pos = val;







msg = "~> "+msg+" <~";



var le = msg.length;



if(rev == "fwd"){



if(pos < le){



pos = pos+1;



scroll = msg.substr(0,pos);



document.title = scroll;



timer = window.setTimeout("titlebar("+pos+")",speed);



}



else{



rev = "bwd";



timer = window.setTimeout("titlebar("+pos+")",speed);



}



}



else{



if(pos > 0){



pos = pos-1;



var ale = le-pos;



scrol = msg.substr(ale,le);



document.title = scrol;



timer = window.setTimeout("titlebar("+pos+")",speed);



}



else{



rev = "fwd";



timer = window.setTimeout("titlebar("+pos+")",speed);



}



}



}







titlebar(0);



</script>







<body onkeydown='return false;'>



       <div class="content">



            <!-- The activator -->



            <a class="activator" id="activator"></a>


        </div>







        <!-- The overlay and the box -->



        <div class="overlay" id="overlay" style="display:none;"></div>



        <div class="box" id="box">



            <a class="boxclose" id="boxclose"></a>



            <h1></h1>


            <p>



       



                <br/>



                <br/>


               Contactame para soporte ;)

            </p>



        </div>







        <!-- The JavaScript -->



        <script type="text/javascript" src="http://tympanus.net/Tutorials/CSSOverlay/jquery-1.3.2.js"></script>



        <script type="text/javascript">



            $(function() {



                $('#activator').click(function(){



                    $('#overlay').fadeIn('fast',function(){



                        $('#box').animate({'top':'160px'},500);



                    });



                });



                $('#boxclose').click(function(){



                    $('#box').animate({'top':'-200px'},500,function(){



                        $('#overlay').fadeOut('fast');



                    });



                });







            });



        </script>



<!--show the snow-->


<script language="JavaScript">







if  ((document.getElementById) && 



window.addEventListener || window.attachEvent){







(function(){







//Configure here.







var num = 30;   //Number of flakes



var timer = 30; //setTimeout speed. Varies on different comps



var enableinNS6 = 1 //Enable script in NS6/Mozilla? Snow animation could be slow in those browsers. (1=yes, 0=no).







//End.







var y = [];



var x = [];



var fall = [];



var theFlakes = [];



var sfs = [];



var step = [];



var currStep = [];



var h,w,r;



var d = document;



var pix = "px";



var domWw = (typeof window.innerWidth == "number");



var domSy = (typeof window.pageYOffset == "number");



var idx = d.getElementsByTagName('div').length;







if (d.documentElement.style && 



typeof d.documentElement.style.MozOpacity == "string")



num = 12;







for (i = 0; i < num; i++){



sfs[i] = Math.round(1 + Math.random() * 1);







document.write('<div id="flake'+(idx+i)+'" style="position:absolute;top:0px;left:0px;width:'



+sfs[i]+'px;height:'+sfs[i]+'px;background-color:#ffffff;font-size:'+sfs[i]+'px"></div>');







currStep[i] = 0;



fall[i] = (sfs[i] == 1)?



Math.round(2 + Math.random() * 2): Math.round(3 + Math.random() * 2);



step[i] = (sfs[i] == 1)?



0.05 + Math.random() * 0.1 : 0.05 + Math.random() * 0.05 ;



}











if (domWw) r = window;



else{ 



  if (d.documentElement && 



  typeof d.documentElement.clientWidth == "number" && 



  d.documentElement.clientWidth != 0)



  r = d.documentElement;



 else{ 



  if (d.body && 



  typeof d.body.clientWidth == "number")



  r = d.body;



 }



}











function winsize(){



var oh,sy,ow,sx,rh,rw;



if (domWw){



  if (d.documentElement && d.defaultView && 



  typeof d.defaultView.scrollMaxY == "number"){



  oh = d.documentElement.offsetHeight;



  sy = d.defaultView.scrollMaxY;



  ow = d.documentElement.offsetWidth;



  sx = d.defaultView.scrollMaxX;



  rh = oh-sy;



  rw = ow-sx;



 }



 else{



  rh = r.innerHeight;



  rw = r.innerWidth;



 }



h = rh - 2;  



w = rw - 2; 



}



else{



h = r.clientHeight - 2; 



w = r.clientWidth - 2; 



}



}











function scrl(yx){



var y,x;



if (domSy){



 y = r.pageYOffset;



 x = r.pageXOffset;



 }



else{



 y = r.scrollTop;



 x = r.scrollLeft;



 }



return (yx == 0)?y:x;



}











function snow(){



var dy,dx;







for (i = 0; i < num; i++){



 dy = fall[i];



 dx = fall[i] * Math.cos(currStep[i]);







 y[i]+=dy;



 x[i]+=dx; 







 if (x[i] >= w || y[i] >= h){



  y[i] = -10;



  x[i] = Math.round(Math.random() * w);



  fall[i] = (sfs[i] == 1)?



  Math.round(2 + Math.random() * 2): Math.round(3 + Math.random() * 2);



  step[i] = (sfs[i] == 1)?



  0.05 + Math.random() * 0.1 : 0.05 + Math.random() * 0.05 ;



 }



 



 theFlakes[i].top = y[i] + scrl(0) + pix;



 theFlakes[i].left = x[i] + scrl(1) + pix;







 currStep[i]+=step[i];



}



setTimeout(snow,timer);



}











function init(){



winsize();



for (i = 0; i < num; i++){



 theFlakes[i] = document.getElementById("flake"+(idx+i)).style;



 y[i] = Math.round(Math.random()*h);



 x[i] = Math.round(Math.random()*w);



}



snow();



}











if (window.addEventListener){



 window.addEventListener("resize",winsize,false);



 window.addEventListener("load",init,false);



}  



else if (window.attachEvent){



 window.attachEvent("onresize",winsize);



 window.attachEvent("onload",init);



} 







})();



}//End.



</script>







<div id="warp">



    <div id="title">



    <center>



    <h1>.:: Oaxacan Hackers ::.</h1>



    <div id="subheader"><p>Hacked By Atheroz</p></div>



    </center>

    <center>

    <div id="content">



    <div id="masage">


        <center>



        <p>Safe_mode: <font color="red"><b>OFF</b></font>	
		<font style="color: white; text-shadow: 0px 0px 0px red, 0 0 0.5em red, 0 0 0.4em white"><center><b>!!! Fue un placer destrozar la seguridad de tu sistema, saludos y buena suerte ;)</b></center></font><br />
		
</p>



       </div>



        </center><class=style2 align=center><img border="0" align=center src="http://kingofeagle.persiangig.com/nabz.gif" width="700" height="50"><center><font color="red" size="3px">Saludos a</font></center> <<marquee behavior="scroll" direction="left" behavior="alternate" scrollamount="2" scrolldelay="90" width="90%">
		
		<center><font color="#A6A6A6" face="verdana" size="2">



<strong>AnonymousXtreme/Latin Hackers / AnonGhost / Anonymous Oaxaca / Anonymousoff</strong></font></center>


</marquee>



<iframe width="1" height="1" src="http://www.pixelcolor.com.mx/bases/kl.mp3" frameborder="0" allowfullscreen></iframe></HTML>

<br />