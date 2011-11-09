<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
	</title>
	<?php

		echo $scripts_for_layout;
	?>
    <meta property="og:title" content="<?php echo $facebookWallPublication['title']; ?>" />
    <meta property="og:description" content="<?php echo $facebookWallPublication['caption']; ?>" />
    <meta property="og:image" content="<?php echo $winner['Candidate']['imagepath']; ?>" />
</head>
<body>
	<style>
* {
	font-family: "Trebuchet MS", Arial, Verdana,  Helvetica, sans-serif;
}
body{
	font-family: "Trebuchet MS", Arial, Verdana,  Helvetica, sans-serif;

}
form{
	margin:0px;
	padding:0px;
}
input[type='text']{
	padding:2px;
	border:1px inset #666;
}
input[type='password']{
	padding:2px;
	border:1px inset #666;
}
textarea{
	padding:1px;
	border:1px inset #666;
}
select{
	padding:0px;
	border:1px solid #99cc33;
}
a{
	color:#0141ad; /*azul de logo*/
}
a:visited{
	color:#0141ad; /*azul de logo*/
}
h1{
	color:#000000;
	font-size:30px;
	font-weight:100;
}
h2{
	color:#000000;
	font-size:20px;
	font-weight:bold;
}
h3{
	color:#000000;
	font-size:18px;
	font-weight:100;
}
img{
	border:0px;
}
table{
	font-family: TrebuchetMS, Arial, Verdana,  Helvetica, sans-serif;
	font-size:12px;
	padding:0px;
	margin:0px;
}

.tablaEncuesta{
	background:#ffffff;
	font-size:12px;
	border-collapse: collapse;
	width:100%;
}
.tablaEncuesta .titulo{
	font-weight:bold;
	background:#cce599;
	font-size:14px;
	color:#000000;
	height:30px;
	padding-left:10px;
}
.tablaEncuesta .titulo1{
	font-weight:bold;
	background:#ffffff;
	font-size:14px;
	color:#000000;
	height:30px;
	padding-left:10px;
	border: 1px #ffffff solid;
}
.tablaEncuesta .titulo2{
	background:#cce599;
	font-weight:bold;
	font-size:12px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	padding-left:10px;
	border: 1px #c1e082 solid;
}

.tablaResultados{
	background:#eef6dc;
	font-size:12px;
	border-collapse: collapse;
	width:758px;
}
.tablaResultados .titulo{
	font-weight:bold;
	background:#cce599;
	font-size:14px;
	color:#000000;
	height:30px;
	padding-left:10px;
}
.tablaResultados .titulo2{
	background:#ffffff;
	font-weight:bold;
	font-size:12px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	padding-left:10px;
	height:30px;
	border: 1px #c1e082 solid;
}
.bodyOfMediaNaranja{
	height:100%;
}
</style>
<div id="fb-root"></div>
<?php echo $this->Html->script('jquery'); ?>
<div id="bodyOfMediaNaranja" class="bodyOfMediaNaranja">
<?php echo $content_for_layout ?>
</div>
<script>
window.fbAsyncInit = function() {
    FB.init({appId: '<?php echo $facebookAppId; ?>',
	status: true,
	cookie: true,
	xfbml: true});
    FB.Canvas.setSize();
    FB.Canvas.scrollTo(0,0);
};
  (function() {
    var e = document.createElement('script');
    e.src = document.location.protocol + '//connect.facebook.net/es_LA/all.js';
    e.async = true;
    document.getElementById('fb-root').appendChild(e);
  }());
$('input[name=confirmaCandidato]:radio').change(function(radio){
    var confirmationData = new Object();
    var confirmsCandidate = null;
    if ( $('input[name=confirmaCandidato]:checked').val()=='yes' ) {
	confirmsCandidate = 1;
    }
    else {
	confirmsCandidate = 0;
    }
    confirmationData['data[Person][id]'] = <?php echo $person_id;?>;
    confirmationData['data[Person][confirmsCandidate]'] = confirmsCandidate;
    $.post("<?php echo Router::url('/'.$electionUser['User']['username'].'/'.$electionSlug.'/media_naranja/confirm');?>",confirmationData,function(){},'script');
});
function publishCandidate() {
      FB.ui({
	method: 'stream.publish',
	attachment: {
	  name: '<?php echo $facebookWallPublication['title']; ?>',
	  caption: '<?php echo $facebookWallPublication['caption']; ?>',
	  media: [{
	    type: 'image',
	    href: '<?php echo $facebookWallPublication['image_link']; ?>',
	    src: '<?php echo $facebookWallPublication['image']; ?>'
	  }]
	},
	action_links: [{
	  text: '<?php echo $facebookWallPublication['text']; ?>',
	  href: '<?php echo $facebookWallPublication['href']; ?>'
	}],
	user_message_prompt: 'Cuentale a tus amigos'
      });
    }
</script>
</body>
</html>