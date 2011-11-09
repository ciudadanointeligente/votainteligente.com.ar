<?php if ($user) {  ?>
<a href="<?= Router::url('/myAccount/elections/add');?>"><?=__('Crear una nueva')?></a>
<?php
}
?>
	<h2><?php __('Elections');?></h2>
	<table>
	    <tr>
		<th><?=_('Elección')?></th>
		<th><?=_('Fecha inicio')?></th>
		<th><?=_('Fecha término')?></th>
		<th><?=_('Link a tu elección')?></th>
	    </tr>
	    <?php foreach($elections as $election){?>
	    <tr>
		<?php
		$urlToThisElection = Router::url('/'.$election['User']['username'].'/'.$election['Election']['slug'],true);
		?>
		<td><a href="<?= $urlToThisElection;?>"><?= $election['Election']['name']?></a></td>
		<td><?= $election['Election']['start_date']?></td>
		<td><?= $election['Election']['end_date']?></td>
		<td><?= $urlToThisElection;?></td>
	    </tr>
	    <?php } ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>