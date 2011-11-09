<table class="tablaResultados">
        <tr>
        	<td colspan="2">
                <table class="tablaResultados">
            		<tr>
                    	<td class="titulo" style="width:30px">&nbsp;

                       	</td>
                    	<td class="titulo">
                        	<?=__('Tu Media Naranja Política es...');?>
                            <h1><?php echo $winner['Candidate']['name'];?></h1>
                       	</td>
                    </tr>
            		<tr>
                    	<td class="titulo" style="width:30px">&nbsp;

                   	  </td>
                    	<td class="titulo">
                       		<table style="width:730px">
                              	<tr>
                                    <td style="background-color:#FFF; width:360px">
	                              		<table style="width:360px">
                                            <tr>
                                                <td style="background-color:#FFF; width: 150px; padding:5px;" rowspan="7">
	                   		                    	<img src="<?php echo Router::url($winner['Candidate']['imagepath']);?>" width="150" height="200" />
                                                </td>
                                                <td style="background-color:#FFF; width:210px; text-align:center" colspan="2">
                                                  	Indices de Compatibilidad
                                                </td>
											</tr>
                                            <tr>
                                                <td style="background-color:#FFF" colspan="2">
                                                  	<img src="http://www.votainteligente.cl/medianaranja/images/division.png" width="210" height="20" />
                                                </td>
											</tr>
                                            <?php foreach($winner['afinity'] as $category) {?>
                                                <tr>
                                                    <td style="background-color:#FFF">
                                                            <strong><?php echo $category['Category']['name'];?></strong><br />
                                                        <img src="http://www.votainteligente.cl/medianaranja/images/barra_<?php echo $this->Percentage->imageForPercentage($category['Category']['afinity']['percentage']);?>.png" width="120" height="12" />
                                                    </td>
                                                    <td style="background-color:#FFF; vertical-align:bottom; font-size:18px;">
                                                            <a><?php echo $this->Number->precision($category['Category']['afinity']['percentage'],0);?> %</a>
                                                    </td>
						</tr>
                                            <?php } ?>
                                                <td style="background-color:#FFF">&nbsp;

                                                </td>
                                           	</tr>
						</table>
                                    </td>
                                    <td style=" width:15px">&nbsp;

                                    </td>
                                    <td style="background-color:#FFF; width:260px; padding:10px">
                                        <block start="blockConfirmar"/>
                                            <form id="confirm-form" action="?do=medianaranja.confirmar" method="post">
                                                <input type="hidden" name="idMediaNaranjaPersona" value="{idMediaNaranjaPersona}" />
                                                <h3>Estás de Acuerdo con tu Resultado?</h3><br />
                                                <input type="radio" name="confirmaCandidato" value="yes"> Si<br />
                                                <input type="radio" name="confirmaCandidato" value="no"> No<br /><br />
						<div id="confirm"></div>
                                                <input type="button" onclick="publishCandidate();" value="<?=__('Publicar');?>">
                                            </form>
                                        <!--block start="blockConfirmado"/>
                                           <h2> Y {sino} estas de Acuerdo con el Resultado.</h2>
                                        <block end="blockConfirmado"/-->
                                    </td>
                                    <td style="width:60px;  ">&nbsp;

                                    </td>
                                </tr>
	                      	</table>
                       	</td>
                    </tr>
					<tr>
                    	<td class="titulo" colspan="2" style="height:10px;">
                       	</td>
                   	</tr>
               	</table>
        	</td>
       	</tr>
        <tr>
            <td class="titulo2" colspan="2">
            	<?=__('Compatibilidad con otros Candidatos');?>
            </td>
        </tr>

                <?php foreach($others as $other) { ?>
                <tr>
        	<td>
                <table width="100%" cellpadding="5" cellspacing="0">
                            <tr><td class="titulo2" valign="middle" align="left">
                                    <h3><?php echo $other['Candidate']['name'];?></h3>
                                    </td></tr>
                            <tr>
                            <td>
                            <table>
                            <tr>

                            <td style="width:75px" align="center" rowspan="3">
                                    <img src="<?php echo Router::url($other['Candidate']['imagepath']);?>" width="75" height="100" />
                                    </td>

                            </tr>
                            <tr>
                                    <td align="center">
                                    <strong><?=__('Indices de Compatibilidad');?></strong>
                                    </td>
                            </tr>
                            <tr>
                                <td align="center">
                                <?php foreach($other['afinity'] as $category) {?>
                                    <strong><?php echo $category['Category']['name']; ?>:</strong> <a><?php echo $this->Number->precision($category['Category']['afinity']['percentage'],0); ?> %</a><br />
                                <?php } ?>
                                    </td>
                            </tr>
                            </table>
                            </td>
                            </tr>


               	</table>

        	</td>
                </tr>
                <?php } ?>

        <tr>
            <td colspan="2" style="background-color:#FFF">&nbsp;

            </td>
        </tr>
        <!--tr>
            <td class="titulo">
            	Participa en la Discusión
            </td>
            <td class="titulo">
            	Recursos Adicionales
            </td>
       	</tr-->
        <tr>
            <td colspan="2" style="background-color:#FFF">&nbsp;

            </td>
        </tr>
        <tr>
            <td colspan="2" class="titulo">
            	<?=__('Invita a tus amigos a participar');?>
            </td>
        </tr>
        <tr>
            <td colspan="2" height="150">
		<fb:serverFbml width="760px">
		  <script type="text/fbml">
		    <fb:fbml>
		      <fb:request-form
			    action='<?php echo $facebookAppUrl; ?>'
			    method='POST'
			    type='Vota inteligente'
			    content="<?=__('Revisa quien es tu media naranja');?><fb:req-choice url='<?php echo $facebookAppUrl; ?>' label='Register'/>"
			<fb:multi-friend-selector actiontext="<?=__('Invita a tus amigos a participar');?>"></fb:multi-friend-selector>
		     </fb:request-form>
		   </fb:fbml>
		  </script>
		</fb:serverFbml>
            </td>
        </tr>
	</table>