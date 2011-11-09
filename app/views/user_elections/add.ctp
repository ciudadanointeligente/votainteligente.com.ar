Aquí irá el inicio de un wizard
<div class="elections form">
<?php echo $this->Form->create('Election',array('url'=>'/myAccount/elections/add'));?>
	<fieldset>
		<legend><?php __('Admin Add Election'); ?></legend>
	<?php
		echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$user['User']['id']));
		echo $this->Form->input('name');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>