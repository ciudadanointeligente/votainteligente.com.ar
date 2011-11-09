<?php
/* Candidates Test cases generated on: 2011-09-09 15:11:33 : 1315591893*/
App::import('Controller', 'Compare');
if (!class_exists('ApplicationTestCase')) {
    require dirname(dirname(__FILE__)).DS.'application_testcase.php';
}
class TestCompareController extends CompareController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
	function render($action = null, $layout = null, $file = null) {
	    $this->renderedAction = $action;
	}
}

class CompareControllerTestCase extends ApplicationTestCase {

	function startTest() {
		$this->Compare =& new TestCompareController();
		$this->Compare->constructClasses();
	}

	function endTest() {
		unset($this->Compare);
		ClassRegistry::flush();
	}
	function testAllowOnlyIfElectionIsValid(){
	    $this->Compare->params['user'] = 'usuario1';
	    $this->Compare->params['election'] = 'eleccion_uno';
	    $this->Compare->beforeFilter();
	    $this->assertEqual($this->Compare->electionId,1);
	}
	function testSetCandidates(){
	    $this->Compare->params['user'] = 'usuario1';
	    $this->Compare->params['election'] = 'eleccion_uno';
	    $this->Compare->beforeFilter();
	    $this->Compare->_setCandidates();
	    $this->assertEqual(2,count($this->Compare->viewVars['candidates']));
	}
	function testSetCategories(){
	    $this->Compare->params['user'] = 'usuario1';
	    $this->Compare->params['election'] = 'eleccion_uno';
	    $this->Compare->beforeFilter();
	    $this->Compare->_setCategories();
	    $this->assertEqual(2,count($this->Compare->viewVars['categories']));
	}
	function testSetCandidatesAndCategoriesForComparison(){
	    $this->Compare->params['user'] = 'usuario1';
	    $this->Compare->params['election'] = 'eleccion_uno';
	    $this->Compare->beforeFilter();
	    $data = array(
		'firstCandidate'=>array(
		    'Candidate'=>'pepito'
		    ),
		'secondCandidate'=>array(
		    'Candidate'=>'juanito'
		    ),
		'categoryId'=>1
		);
	    $this->Compare->_setSelectedCandidatesAndCategory($data);
	    $this->assertEqual('pepito',$this->Compare->viewVars['firstCandidate']['Candidate']);
	    $this->assertEqual('juanito',$this->Compare->viewVars['secondCandidate']['Candidate']);
	    $this->assertEqual(1,$this->Compare->viewVars['categoryId']);
	}

	function testCompare(){
	    $this->Compare->params['user'] = 'usuario1';
	    $this->Compare->params['election'] = 'eleccion_uno';
	    $this->Compare->beforeFilter();
	    $this->Compare->_compare(1,2,1);//triadic should be avoided when possible
	    $expected = array(
		1=>array(//question with id 1
		    1=>array( //answer with id 1
			1 //first Candidate said answer 1 for question 1
		    ),
		    2=>array(
			2 //second candidate said 2 for question 1
		    )
		),
		2=>array( // question with id 2
		    3=>array( //answer with id 3
			1 //candidate said that answer 3 for question 1
		    ),
		    4=>array(
			2 //candidate with id 2 said answer 4 for question 2
		    )
		)
	    );
	    $weightsForCategoryOne = $this->Compare->viewVars['weights'];
	    $this->assertEqual($expected,$weightsForCategoryOne);
	}

	function testEncodeData(){
	    $this->Compare->params['user'] = 'usuario1';
	    $this->Compare->params['election'] = 'eleccion_uno';
	    $this->Compare->beforeFilter();
	    $this->Compare->_encodeData(1,1,1);
	    $url = $this->Compare->viewVars['url'];
	    $expected = '/usuario1/eleccion_uno/compare/candidato1_vs_candidato1_en_numeros-imaginarios';
	    $this->assertEqual($expected,$url);
	}
	function testAccessibleActiongetComparisonAddressWithNoLoggedUser(){

	    $data = array(
		'firstCandidate'    =>1,
		'secondCandidate'   =>2,
		'category'	    =>1
	    );
	    $this->Compare->params['user'] = 'usuario1';
	    $this->Compare->params['election'] = 'eleccion_uno';
	    $this->Compare->beforeFilter();
	    $this->Compare->data = $data;
	    $this->Compare->getComparisonAddress();
	    $vars = $this->Compare->viewVars;
	    $this->assertTrue(isset($vars['url']));
	}
	function testAccessibleActionCompareWithNoLoggedUser(){
	    $this->Compare->params['user'] = 'usuario1';
	    $this->Compare->params['election'] = 'eleccion_uno';
	    $data = array(
		'firstCandidate'    =>1,
		'secondCandidate'   =>2,
		'category'	    =>1
	    );
	    $this->Compare->params['candidatesAndCategory'] = 'candidato1_vs_candidato2_en_numeros-imaginarios';
	    $this->Compare->beforeFilter();
	    $this->Compare->index();
	    $vars = $this->Compare->viewVars;
	    $this->assertTrue(isset($vars['firstCandidate']));
	    $this->assertTrue(isset($vars['secondCandidate']));
	    $this->assertTrue(isset($vars['category']));
	}
	function testIfISendOnlyOneCandidateItShouldSelectIt(){
	    $this->Compare->params['user'] = 'usuario1';
	    $this->Compare->params['election'] = 'eleccion_uno';
	    $this->Compare->params['candidatesAndCategory'] = 'candidato1';
	    $this->Compare->beforeFilter();
	    $this->Compare->index();
	    $vars = $this->Compare->viewVars;
	    $this->assertTrue(isset($vars['firstCandidate']));
	}
	function testDecodeReturnsOneCandidate(){
	    $decodedData = $this->Compare->_decodeData('candidato1');
	    $this->assertTrue(isset($decodedData['firstCandidate']));

	}
}
?>
