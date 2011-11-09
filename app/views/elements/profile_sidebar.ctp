<div id="sidebarLeftContainer">
    <div id="sidebarTrigger">
    trigger
    </div>
    <div id="sidebarLeft">

        <ul class="sidebarMenu">
        <?php

        foreach( $candidates as $candidate ){
	    echo '<li>'.$this->Html->link($this->Html->image($candidate['imagepath']).'<span>'.$candidate['name'].'</span>',
		    '/'.$electionUser['User']['username'].'/'.$election['Election']['slug'].'/profiles/view/'.$candidate['slug'],array(
            'class'=>'link',
            'escape'=>false
            )).'</li>';
        }
        ?>
        </ul>

    </div>
</div>

<script>
    $('#sidebarTrigger').click(
    function(){
	$('#sidebarLeft').toggle(0,function(){
	    if ($(this).is(":visible")) {
		$('#sidebarTrigger').css('left',279);
	    }
	    else {
		$('#sidebarTrigger').css('left',0);
	    }
	});
    }

    );
</script>