<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<p><?=_('Aquí se desplegará mi cuenta por mientras te despliego tus elecciones')?></p>
<a href="<?= Router::url('/myAccount/elections/add');?>"><?=_('Crea una nueva')?></a>
<?php echo $this->element('list_of_elections',array('elections',$elections));?>