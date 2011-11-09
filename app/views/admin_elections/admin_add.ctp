<div class="elections form">
<?php echo $this->Form->create('Election');?>
	<fieldset>
		<legend><?php __('Admin Add Election'); ?></legend>
	<?php
		echo $this->Form->input('user_id',array('type'=>'textfield','value'=>$user['id']));
		echo $this->Form->input('name');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>