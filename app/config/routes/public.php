<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
	Router::connect(
	    '/account/:action',
	    array(
		'controller' => 'account',
		'action' => ':action'
	    )
	);
	Router::connect(
	    '/:user/:election',
	    array(
		'controller' => 'public_elections',
		'action' => 'view'
	    ),
	    array(
		'election' =>'[a-zA-Z0-9_-]+',
		'user' =>'[a-zA-Z0-9_-]+',
		'pass' => array(
		    'election',
		    'user',
		)
	    )
	);
	Router::connect(
	    '/:user/:election/profiles',
	    array(
		'controller' => 'profiles',
		'action' => 'index'
	    ),
	    array(
		'election' =>'[a-zA-Z0-9_-]+',
		'user' =>'[a-zA-Z0-9_-]+',
		'pass' => array(
		    'election',
		    'user',

		)
	    )
	);
	Router::connect(
	    '/:user/:election/profiles/view/:candidate',
	    array(
		'controller' => 'profiles',
		'action' => 'view'
	    ),
	    array(
		'election' =>'[a-zA-Z0-9_-]+',
		'user' =>'[a-zA-Z0-9_-]+',
		'candidate' =>'[a-zA-Z0-9_-]+',
		'pass' => array(
		    'candidate',//IT IS IMPORTANT TO NOTE THAT CANDIDATE SHOULD BE FIRST
		    'election',
		    'user',

		)
	    )
	);
	Router::connect(
	    '/:user/:election/compare/getComparisonAddress',
	    array(
		'controller' => 'compare',
		'action' => 'getComparisonAddress'
	    ),
	    array(
		'election' =>'[a-zA-Z0-9_-]+',
		'user' =>'[a-zA-Z0-9_-]+',
		'pass' => array(
		    'election',
		    'user',
		)
	    )
	);
	Router::connect(
	    '/:user/:election/compare/:candidatesAndCategory',
	    array(
		'controller' => 'compare',
		'action' => 'index'
	    ),
	    array(
		'election' =>'[a-zA-Z0-9_-]+',
		'user' =>'[a-zA-Z0-9_-]+',
		'candidatesAndCategory' => '[a-zA-Z0-9_-]+',
		'pass' => array(
		    'candidatesAndCategory',
		    'election',
		    'user',

		)
	    )
	);
	Router::connect(
	    '/:user/:election/compare',
	    array(
		'controller' => 'compare',
		'action' => 'index'
	    ),
	    array(
		'election' =>'[a-zA-Z0-9_-]+',
		'user' =>'[a-zA-Z0-9_-]+',
		'pass' => array(
		    'election',
		    'user',
		)
	    )
	);
	Router::connect(
	    '/:user/:election/compare/showCandidateBasicProfile/:idCandidate',
	    array(
		'controller' => 'compare',
		'action' => 'showCandidateBasicProfile'
	    ),
	    array(
		'election' =>'[a-zA-Z0-9_-]+',
		'user' =>'[a-zA-Z0-9_-]+',
		'idCandidate' =>'[0-9]+',

		'pass' => array(
		    'election',
		    'user',
		    'idCandidate',
		)
	    )
	);
	Router::connect(
	    '/:user/:election/media_naranja',
	    array(
		'controller' => 'media_naranja',
		'action' => 'index'
	    ),
	    array(
		'election' =>'[a-zA-Z0-9_-]+',
		'user' =>'[a-zA-Z0-9_-]+',
		'pass' => array(
		    'election',
		    'user'
		)
	    )
	);
	Router::connect(
	    '/:user/:election/media_naranja/:action',
	    array(
		'controller' => 'media_naranja',
		'action' => ':action'
	    ),
	    array(
		'election' =>'[a-zA-Z0-9_-]+',
		'user' =>'[a-zA-Z0-9_-]+',
		'pass' => array(
		    'election',
		    'user',
		)
	    )
	);
?>
