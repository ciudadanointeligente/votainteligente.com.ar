<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Router::connect('/myAccount', array('controller' => 'users', 'action' => 'myAccount'));
Router::connect('/myAccount/elections/:action', array('controller' => 'user_elections', 'action' => ':action'));
?>
