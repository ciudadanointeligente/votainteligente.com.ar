<?php
?>
	<h2><?php __('Tus Elecciones');?></h2>
	<table>
	    <tr>
		<th><?=_('Elección')?></th>
		<th><?=_('Fecha inicio')?></th>
		<th><?=_('Fecha término')?></th>
		<th><?=_('Link a tu elección')?></th>
		<th><?=_('Actions')?></th>
	    </tr>
	    <?php
	    foreach($elections as $election){?>
	    <tr>
		<?php
		$urlToThisElection = Router::url('/'.$user['User']['username'].'/'.$election['Election']['slug'],true);
		?>
		<td><?= $election['Election']['name']?></td>
		<td><?= $election['Election']['start_date']?></td>
		<td><?= $election['Election']['end_date']?></td>
		<td><?= $urlToThisElection;?></td>
		<td>
		    <a href="<?= Router::url('/user_elections/delete/'.$election['Election']['id']);?>"><?= __('Eliminar')?></a>
		    <a href="<?= Router::url('/user_elections/edit/'.$election['Election']['id'])?>"><?= __('Editar')?></a>
		</td>
	    </tr>
	    <?php } ?>
	</table>