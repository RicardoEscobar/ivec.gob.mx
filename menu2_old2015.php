 <style>	
	#top-bar{
	position: fixed;
	width: 100%;
	height: 45px;
	top: 0;
	left: 0;
	color: #FFFFFF;
	background: #C41230; 
	box-shadow: 0px 2px 2px rgba(0,0,0,.3);
	font-size: 90%;
	font-family: 'Ubuntu',Arial, Helvetica, sans-serif;
	text-align: center;
	line-height: 45px;
	
	}
	#top-bar p{
	font-size:large;
	font-weight:500;
	margin:0;
	}
	#top-bar .title a{
	float:left;
	position:relative;
	font-size:large;
	left:0;
	
	-moz-transition:all.6s;/*Firefox*/
	-webkit-transition:all .6s;/*Crome/Safari*/
	-ms-transition:all .6s;/*IE-->No funciona todavía*/
	-o-transition:all .6s;/*Opera*/
	transition:all .6s;	
	color:#FFFFFF;
	text-decoration:none;
	padding:0 50px 0 10px;
	}
	
	#top-bar .title a:hover{
	left: 20px;
	font-size: x-large;
	text-decoration: underline;
	color: #FFC94D;
	}
	#top-bar .link a{
	float:right;
	position:relative;
	right:0;
	-moz-transition:all.6s;/*Firefox*/
	-webkit-transition:all .6s;/*Crome/Safari*/
	-ms-transition:all .6s;/*IE-->No funciona todavía*/
	-o-transition:all .6s;/*Opera*/
	transition:all .6s;	
	color:#FFFFFF;
	text-decoration:none;
	padding:0 10px 0 50px;
	font-size:15px;
	}
	#top-bar .link a:after{
	content: ' »';
}
	#top-bar .link a:hover{
	text-decoration:underline;
	color:#FFC94D;
}
	#container{
	width: 100%;
	height: 100%;
	position: fixed;
	left: 0;
	top: 0;
	}
	#demo-nav-container{
		position:absolute;
		bottom:50px;
		width:100%;
		
	}
	#demo-nav{
		margin:0 auto;
		width: 170px;
		background: #C41230; 
		box-shadow:0px 2px 2px rgba(0,0,0,.3); 
		overflow:hidden;/*Para que entre la lista*/
	}
	#demo-nav ul{
		float:right;
		margin-bottom:10px;
		margin-right:15px;
	}
	#demo-nav p{
		color:#fff;
		padding:0 0 5px 5px;
		margin:10px 0 3px 10px;
	}
	#demo-nav li.actual{background:#fff;}
	#demo-nav li.actual a{color:#2c2c2c;}
	#demo-nav li{
		display:inline-block;
		list-style:none;
		width:20px;
		height:20px;
		text-align:center; 
		background:#666;
		box-shadow: 1px 2px 2px rgba(0,0,0,.6);
		line-height:20px;
		color:#fff;
		font-family:'Ubuntu', Arial, Helvetica, sans-serif;
	}
	#demo-nav li a{
	text-align: center;
	width: 20px;
	height: 20px;
	/* [disabled]display:inline-block; */
	color: #fff;
	line-height: 20px;
	font-family: 'Ubuntu', Arial, Helvetica, sans-serif;
	text-decoration: none;
	}
	#demo-container{
	position: relative;
	top: 50%;
	margin: 0 auto;
	}
	
#menu-altern
{
	color: #FFFFFF;
	height: 35px;
	font-family: Ubuntu,Trebuchet, Arial, Helvetica, sans-serif;
	z-index: 999;
	text-align: center;
	font-size: 12px;
}

#menu-altern ul
{
	z-index:999;
}

#menu-altern ul li
{
	list-style: none;
	display: inline;
	float: left;
	height: 35px;
	line-height: 35px;
	background: #C41230;
	cursor: pointer;
	max-width: 250px;
	/*width: 200px;*/
}

#menu-altern ul li:first-child
{
 
}

#menu-altern ul li:first-child a
{

}

#menu-altern ul li:last-child,#menu-altern ul li:last-child a
{
	 
	border-right:0;
}

#menu-altern .flechaabajo
{
	display:inline-block;
	position:relative;
	top:-1px;
	left:10px;
	border-left:3px solid transparent;
	border-top:6px solid #fff;
	border-right:3px solid transparent;
	border-bottom:0;
}

#menu-altern ul li a
{
	display:block;
	text-decoration:none;
	color:#fff;
	position:relative;
}

#menu-altern ul li ul
{
	box-shadow: none;
	position: relative;
	width: 117px;
	/* [disabled]z-index: 999; */
	display: none;
	float: left;
	left: -40px;
}
 
#menu-altern ul li ul li
{
	display: block;
	float: none;
	position: relative;
	background: #C41230;
	z-index: 999;
	overflow: hidden;
	-moz-transition: all 1s;/*Firefox*/
	-webkit-transition: all 1s;/*Crome/Safari*/
	-ms-transition: all 1s;/*IE-->No funciona todavía*/
	-o-transition: all 1s;/*Opera*/
	transition: all 1s;
	opacity: 0;
}

#menu-altern ul li ul li a
{
	color:#ffffff;
	border:0;
}

#menu-altern ul li ul li a:hover
{
	color:#FFC94D;
	border:0;
}
#menu-altern ul li ul li:first-child,#menu-altern ul li ul li:first-child a
{
	margin-left:0;  
}

#menu-altern ul li ul li:last-child
{ 
}
#menu-altern ul li ul li:last-child a
{ 
}
#menu-altern ul li.destacada,#menu-altern ul li.destacada ul li
{
	background:#C00;
}

#menu-altern ul li.destacada:hover,#menu-altern ul li.destacada ul li:hover
{
	background: #FF1A1A;
	color: #FFC94D;
}

#menu-altern ul li:hover
{
	background: #C41230;
	color: #FFC94D;
}
#menu-altern ul li:hover ul li{
	opacity: 1;
	color: #FFC94D;
}
		
	</style>
 
<div id="demo-container">
<script type="text/javascript">
$(document).ready(function() {
   // Muestra y oculta los menús
   $('#menu-altern ul li:has(ul)').hover( //función al pasar el ratón por encima de un "li" que tiene una "ul"
      function(e) //Primera función-->ratón por encima
      {
         $(this).find('ul').fadeIn();
      },
      function(e) //Cuando el ratón deja de estar encima.
      {
         $(this).find('ul').fadeOut();
      }
   );
});
</script>
<div style="margin: 0 auto;" id="menu-altern">
	<ul>
    <?  
	$f=0;
	$buca=$bd->ejecutar("select * from artistas_seccion order by padre asc,id asc");
	$total=$bd->num_rows($buca);
	while($row=$bd->obtener_fila($buca,0)){
		$f++;
		if ($row['id']==1){  $ancho=160; }
		if ($row['id']==11){ $ancho=150; }
		if ($row['id']==17){ $ancho=90; }
		if ($row['id']==22){ $ancho=120; } 
		if ($row['id']==29){ $ancho=210;  } 
     if ($row['tipo']==1){ 
	 if ($f>1){ echo '</ul></li>';} ?>
     <li style="width:<?=$ancho?>px" ><?=$row['nombre']?> <span class="flechaabajo"/></span><ul style="min-width:170px; width:<?=$ancho?>px">
    <? }  else { ?>
    <li style="text-align:left; padding-left:5px; height:30px; "><a href="artistas.php?secc=<?=$row['id']?>"><?=$row['nombre']?></a></li>
    <? } ?>
    
    <? if ($f==$total){ ?></ul></li> <? } ?>
		
        <? } ?>
	</ul>
</div>
 