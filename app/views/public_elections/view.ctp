<?php


?>
<nav id="homeNavigation">
	<ul class="homeNav">
    <li class="homeLi homeListMedianaranja">
    	<a href="<?php Configure::load('facebook');echo Router::url(Configure::read('Facebook.APP_URL'));?>">
    		<h2>Media <br />Naranja</h2>
        </a>
    </li>
    <li class="homeLi homeListPerfiles">

        <a href="<?php echo Router::url('/'.$electionUser['User']['username'].'/'.$election['Election']['slug']."/profiles/");?>">
    		<h2> <?= __('Perfiles');?></h2>
      	</a>
    </li>
    <li class="homeLi homeListComparar">
    	<a href="<?php echo Router::url('/'.$electionUser['User']['username'].'/'.$election['Election']['slug']."/compare/");?>">
    		<h2><?= __('Comparar');?> <br /> <?= __('candidatos');?> </h2>
    	</a>
    </li>
    </ul>

</nav>