<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script src="JavascriptFiles/mootools.js" type="text/javascript"></script>
<script src="JavascriptFiles/slideshow.js" type="text/javascript"></script>
<script src="JavascriptFiles/backgroundslider.js" type="text/javascript"></script>
<link href="CSSFiles/slideshow.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="pf_slideShow1" class="container">
  <div id="slideshowContainer" class="slideshowContainer"></div>
  <a href="Images/img_1.jpg" class="slideshowThumbnail"><img src="Images/timg_1.jpg" border="0" /></a> <a href="Images/img_2.jpg" class="slideshowThumbnail"><img src="Images/timg_2.jpg" border="0" /></a> <a href="Images/img_3.jpg" class="slideshowThumbnail"><img src="Images/timg_3.jpg" border="0" /></a> <a href="Images/img_4.jpg" class="slideshowThumbnail"><img src="Images/timg_4.jpg" border="0" /></a> <a href="Images/img_5.jpg" class="slideshowThumbnail"><img src="Images/timg_5.jpg" border="0" /></a> <a href="Images/img_6.jpg" class="slideshowThumbnail"><img src="Images/timg_6.jpg" border="0" /></a>
  <p> <a href="#" onclick="show.play(); return false;">Play</a> | <a href="#" onclick="show.stop(); return false;">Stop</a> | <a href="#" onclick="show.next(); return false;">Next</a> | <a href="#" onclick="show.previous(); return false;">Previous</a> </p>
</div>
<script type="text/javascript">
// BeginWebWidget phatfusion_slideShow: pf_slideShow1

 	window.addEvent('domready',function(){
    var obj_pf_slideShow1 = { 
                wait: 5000, 
					      effect: 'random',
					      duration: 1000, 
                direction: 'random',
					      loop: true, 
					      thumbnails: true,
					      backgroundSlider: true,
					      onClick: function(i){alert(i)}
				      }
    show = new SlideShow('pf_slideShow1','slideshowContainer','slideshowThumbnail',obj_pf_slideShow1);
	  show.play();
	});


// EndWebWidget phatfusion_slideShow: pf_slideShow1
</script>
</body>
</html>