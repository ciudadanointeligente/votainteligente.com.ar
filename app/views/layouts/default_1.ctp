<?php echo $this->element('header',array('css'=>array('style', 'nav','tooltip','profile','profileHome','footer','jquery.qtip'),'js'=>array('jquery.qtip')));//the file views/elements/header.ctp?>

    <div id="" class="wrapper">
		<?php echo $content_for_layout ?>
    </div>
<?php echo $this->element('footer');//the file views/elements/footer.ctp?>