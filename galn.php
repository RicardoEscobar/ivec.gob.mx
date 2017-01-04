<? session_start();
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");

function replace($cadena){
$cadena=str_replace("select","",$cadena);
$cadena=str_replace("delete","",$cadena);
$cadena=str_replace("drop","",$cadena);
$cadena=str_replace("'","",$cadena);
$cadena=str_replace("*","",$cadena);
$cadena=str_replace(";","",$cadena);
$cadena=str_replace("?","",$cadena);
$cadena=str_replace(">","",$cadena);
$cadena=str_replace("<","",$cadena);
$cadena=str_replace("script","",$cadena);
return $cadena;
}

require 'db.class.php';
require 'conf.class.php';

$bd=Db::getInstance();
$losid='0';

$id=$_GET['id'];
$id=replace($id);

function cambio($cad)
{
	$cad=str_replace('"',"&quot;",$cad);
	return $cad;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/jquery.ad-galleryg2.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.ad-gallery.js"></script>
  <script type="text/javascript">
  $(function() {
    $('img.image1').data('ad-desc', 'Whoa! This description is set through elm.data("ad-desc") instead of using the longdesc attribute.<br>And it contains <strong>H</strong>ow <strong>T</strong>o <strong>M</strong>eet <strong>L</strong>adies... <em>What?</em> That aint what HTML stands for? Man...');
    $('img.image1').data('ad-title', 'Title through $.data');
    $('img.image4').data('ad-desc', 'This image is wider than the wrapper, so it has been scaled down');
    $('img.image5').data('ad-desc', 'This image is higher than the wrapper, so it has been scaled down');
    var galleries = $('.ad-gallery').adGallery();
    $('#switch-effect').change(
      function() {
        galleries[0].settings.effect = $(this).val();
        return false;
      }
    );
    $('#toggle-slideshow').click(
      function() {
        galleries[0].slideshow.toggle();
        return false;
      }
    );
    $('#toggle-description').click(
      function() {
        if(!galleries[0].settings.description_wrapper) {
          galleries[0].settings.description_wrapper = $('#descriptions');
        } else {
          galleries[0].settings.description_wrapper = false;
        }
        return false;
      }
    );
  });
  </script>

  <style type="text/css">
  * {
	
  }
  select, input, textarea {
    font-size: 1em;
  }
  body {
	padding: 0px;
	font-size: 70%;
	width: 800px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	font-family: Arial, Helvetica, sans-serif;
	color: #000000;
	line-height: 140%;
	text-align: left;
  }
  h2 {
    margin-top: 1.2em;
    margin-bottom: 0;
    padding: 0;
    border-bottom: 1px dotted #dedede;
  }
  h3 {
    margin-top: 1.2em;
    margin-bottom: 0;
    padding: 0;
  }
  .example {
    border: 1px solid #CCC;
    background: #f2f2f2;
    padding: 10px;
  }
  ul {
    list-style-image:url(list-style.gif);
  }
  pre {
    font-family: "Lucida Console", "Courier New", Verdana;
    border: 1px solid #CCC;
    background: #f2f2f2;
    padding: 10px;
  }
  code {
    font-family: "Lucida Console", "Courier New", Verdana;
    margin: 0;
    padding: 0;
  }

  #gallery {
	padding: 0px;
	background: #ffffff;
	width: 600px;
  }
  #descriptions {
    position: relative;
    height: 50px;
    background: #EEE;
    margin-top: 10px;
    width: 640px;
    padding: 10px;
    overflow: hidden;
  }
    #descriptions .ad-image-description {
      position: absolute;
    }
      #descriptions .ad-image-description .ad-description-title {
        display: block;
      }
  body,td,th {
	color: #000;
}
  </style>
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="estilo.css" rel="stylesheet" type="text/css">
  <title>A demo of AD Gallery - Coffeescripter.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
  <div id="container">
    <div id="gallery" class="ad-gallery">
      <div class="ad-image-wrapper" style="height: 300px">
      </div>
      <div class="ad-controls">
      </div>
      <div class="ad-nav" style="display:none">
        <div class="ad-thumbs">
          <ul class="ad-thumb-list">
          <?php     $gal1=$bd->ejecutar("select * from foto where id_nota=$id order by id desc");
			$i=0;
		 while($rfo=@$bd->obtener_fila($gal1,0) and $i<10){ 
			$url1='admin/'.$rfo['url'].$rfo['id'].'_55x.jpg';
			if (!file_exists($url1)){
			$url1='admin/'.$rfo['url'].$rfo['id'].'_55.jpg';
			}
			$urtt='admin/'.$rfo['url'].$rfo['id'].'_55x.jpg';
			if (!file_exists($urtt)){
			$urtt='admin/'.$rfo['url'].$rfo['id'].'_55.jpg';
			}
			if (file_exists($urtt)){
				
				$urlf='admin/'.$rfo['url'].$rfo['id'].'_3.jpg';
			  	$tam=getimagesize($urlf);
					
				$ant=$tam[0]; 
				$alto=$tam[1]+50; 
				if ($alto>$ant){
				$urtt='admin/'.$rfo['url'].$rfo['id'].'_3.jpg';
				$url1='admin/'.$rfo['url'].$rfo['id'].'_3.jpg';
				
				}
				$pie='';
				$aut=$rfo['titulo'];
				
				$aup=$rfo['pie'];
				if ($aut==' ' or $aut=='&nbsp;' or $aup==' ' or $aup=='&nbsp;')
				{
					$pie='<strong>'.$aut.'</strong> '.$aup;
				} else {
					$pie='<strong>'.$aut.'</strong>  '.$aup;
				}
			?>
            <li>
              <a href="<?=$urtt;?>" title="<?=cambio($rfo['titulo']);?>" alt="<?=cambio($rfo['pie']);?>">
              <img src="<?=$url1; ?>" title=" " alt="<?=cambio($pie);?>" height="40" class="image3">
              </a>
            </li>
          <?php 
		  $i++;
			}
		  }?>
            
          </ul>
        </div>
      </div>
    </div>
<div id="odescriptions" style="float:left; width:590px; padding:7px 5px; text-align:left" class="naranja121" ></div>

</div>
</body>
</html>

<? @$bd->liberarawilly(); ?>