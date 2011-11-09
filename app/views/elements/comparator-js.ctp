<?php echo $html->scriptStart();?>
    $(document).ready(function() {
	$('input[name=category]:radio').change(function(event){
	    obtainCandidatesAndCategory();
	});
	$('select[name=firstCandidate]').change(function(event){
		$('#errors li').remove();
		var firstCandidate      = $('select[name=firstCandidate] option:checked').val();
		if (firstCandidate<1){
		    $('#errors').append('<li><?= __('Debes seleccionar el primer candidato');?></li>');
		} else {
		    displayFirstCandidatesDescription();
		    obtainCandidatesAndCategory();
		}
	});
	$('select[name=secondCandidate]').change(function(event){
	    $('#errors li').remove();
	    var secondCandidate     = $('select[name=secondCandidate] option:checked').val();
	    if (secondCandidate<1){
		$('#errors').append('<li><?= __('Debes seleccionar el segundo candidato');?></li>');
	    } else {
		displaySecondCandidatesDescription();
		obtainCandidatesAndCategory();
	    }

	});
    });
    function displayFirstCandidatesDescription(){
	var candidate_id = $('select[name=firstCandidate] option:selected').val();
	var where = $('.firstCandidate .basicProfileContainer');
	displayShortDescription(where,candidate_id);
    }
    function displaySecondCandidatesDescription(){
	var candidate_id = $('select[name=secondCandidate] option:selected').val();
	var where = $('.secondCandidate .basicProfileContainer');
	displayShortDescription(where,candidate_id);
    }
    function displayShortDescription(where,candidate_id){
	$.post('<?php echo Router::url('/'.$electionUser['User']['username'].'/'.$election['Election']['slug'].'/compare/showCandidateBasicProfile');?>/'+candidate_id,function(data){where.html(data);});
    }
    function obtainCandidatesAndCategory(){
	var category            = $('input[name=category]:checked').val();
	var firstCandidate      = $('select[name=firstCandidate] option:selected').val();
	var secondCandidate     = $('select[name=secondCandidate] option:selected').val();
	var theSelectionIsRight = (firstCandidate>0) && (secondCandidate>0) && (category!=undefined) && firstCandidate != secondCandidate;
	if (theSelectionIsRight) {
	    $('#errors li').remove();
	    compareCandidates(firstCandidate,secondCandidate,category);
	} else {
	    manageErrors(firstCandidate,secondCandidate,category);
	}

    }
    function manageErrors(firstCandidate,secondCandidate,category){
	var errors = [];
	var candidatesAreEqual = secondCandidate>0 && firstCandidate>0 && secondCandidate==firstCandidate;
	if (candidatesAreEqual){
	    errors.push('<?= __('Los dos candidatos son iguales');?>');
	}
	$('#errors li').remove();
	for(var i=0;i<errors.length;i++){
	    $('#errors').append('<li>'+errors[i]+'</li>');
	}
    }
    function compareCandidates(firstCandidate,secondCandidate,category){
	var comparationData = new Object();
	comparationData['data[firstCandidate]']     = firstCandidate;
	comparationData['data[secondCandidate]']    = secondCandidate;
	comparationData['data[category]']           = category;
	$.post('<?php echo Router::url('/'.$electionUser['User']['username'].'/'.$election['Election']['slug'].'/compare/getComparisonAddress');?>',comparationData,function(data){
	    $('#result').html(data);
	});
    }
<?php echo $html->scriptEnd();?>