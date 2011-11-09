<?php

?>
<!----------ProfileHome----->
    <ul class="profileHome">
	<?php

	foreach( $candidates as $candidate ){
	    echo '<li>'.$this->Html->link($this->Html->image($candidate['Candidate']['imagepath']).'<span>'.$candidate['Candidate']['name'].'</span>',
		'/'.$electionUser['User']['username'].'/'.$election['Election']['slug'].'/profiles/view/'.$candidate['Candidate']['slug'],array(
		'class'=>'link',
		'escape'=>false
		)).'</li>';
	}
	?>
    </ul>