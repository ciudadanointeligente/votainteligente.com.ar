<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
	</title>
	<?php

		echo $scripts_for_layout;
	?>
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
.not-answered-yet{
    background-color: red;
}
</style>
<?php echo $this->Html->script('jquery'); ?>
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
    FB.init({appId: '<?php echo $facebookAppId; ?>',
        status: true,
	cookie: true,
        xfbml: true});
    FB.Canvas.setSize();
    $(':radio[name$="\\[Answer\\]"]').click(function(){
	var questionId = $(this).attr('question_id');
	$('#section_question_'+questionId).removeClass('not-answered-yet');
	var nonAnsweredQuestions = $('.not-answered-yet');
	if (nonAnsweredQuestions.length === 0) {
	    $('#media-naranja-form-errors').text('');
	}
    });
    $('#CategoryIndexForm').submit(function(){
	var allAnswered = true;
	var questionId = 0;
	$(':radio[name$="\\[Answer\\]"]').each(function(index,element){
	    if ($(':radio:checked[name$="'+element.name+'"]').length === 0 ){
		allAnswered = false;
		questionId = $(element).attr('question_id');
		$('#section_question_'+questionId).addClass('not-answered-yet');
	    }
	});
	if (allAnswered) {
	    return true;
	}
	$('#media-naranja-form-errors').text('Existen preguntas que no respondiste');
	FB.Canvas.scrollTo(0,$('.not-answered-yet').offset().top);
	return false;
    });
  };
  (function() {
    var e = document.createElement('script');
    e.src = document.location.protocol + '//connect.facebook.net/es_LA/all.js';
    e.async = true;
    document.getElementById('fb-root').appendChild(e);
  }());
</script>
<div id="bodyOfMediaNaranja" class="bodyOfMediaNaranja">
<table align="left" style="width:760px;" cellpadding="0" cellspacing="0" border="0">
    <tr>
		<td align="left">
            <table align="left" style="width:760px;" cellpadding="0" cellspacing="0" border="0">
                <td style="text-align:left; width:500px">

                    <img src="http://www.votainteligente.cl/medianaranja/images/fb_header_1.png" width="500" height="113" border="0" />
                </td>
                <td style="text-align:left; width:260px">
                    <a href="http://www.votainteligente.cl/" target="_blank"><img src="http://www.votainteligente.cl/medianaranja/images/fb_header_2.png" width="260" height="113" border="0" /></a>
                </td>
            </table>
     	</td>
    </tr>
    <tr>
        <td bgcolor="#FFFFFF" style="width:760px; text-align:left; padding:0px; border:0px;">
  	<table class="tablaEncuesta">
        <tr>
            <td class="titulo" style="font-weight:normal" colspan="2">
            	La media naranja es una aplicación en la que podrás conocer tu cercanía con los candidatos a las presidencia. Esto NO es un juego. Los datos los hemos recopilado de diferentes fuentes periodísticas y por ello los temas y opciones que ponemos a disposición son sólo aquellas que los candidatos han declarado. Son las posiciones REALES de los candidatos que aspiran a ocupar la presidencia de nuestro país. El proceso de búsqueda, los criterios de selección y la forma de procesamiento de los datos que utilizamos en la media naranja política los puedes conocer en www.votainteligente.cl.
            </td>
        </tr>
        <tr>
            <td class="titulo" style="width:415px">
            	Responde la encuesta y encuentra tu 1/2 naranja política
            </td>
			<td class="titulo" style="width:305px; vertical-align:bottom">
				<img src="http://www.votainteligente.cl/medianaranja/images/importancia.png" width="316" height="46" border="0" />
            </td>
        </tr>
	    <?php echo Router::url('/'.$electionSlug.'/media_naranja/vota',true);?>
        <?php echo $this->Form->create(null, array('url' => Router::url('/'.$electionUser['User']['username'].'/'.$electionSlug.'/media_naranja/vota',true))); ?>
        <?php echo $content_for_layout ?>
        <tr>
            <td class="titulo" colspan="2">
		<div id="media-naranja-form-errors">&nbsp;</div>
                <input type="submit" value="Buscar Media Naranja">
            </td>
        </tr>

   	<?php echo $this->Form->end(); ?>
   	</table>
   	        </td>
    </tr>
</table>
<div>
</body>
</html>