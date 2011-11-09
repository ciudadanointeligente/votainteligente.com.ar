<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend>Login</legend>
		<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
O podrías conectarte usando
<ul>
<li><?php echo $this->Html->link('twitter',array('action'=>'twitter'));?></li>
<li><?php echo $this->Html->link('facebook',array('action'=>'facebook'));?></li>
</ul>