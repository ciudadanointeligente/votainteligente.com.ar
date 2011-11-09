function ensureConsistency(checkbox) {
    if($(checkbox).attr("checked") == "checked") {
	disableCandidateFromAnsweringThis($(checkbox).val());
    }
    else {
	enableCandidateFromAnsweringThis($(checkbox).val());
    }
}
function disableCandidateFromAnsweringThis(idCandidate){
    var checkboxesOfCandidatesInOtherAnswers = 'input[type="checkbox"]:not(:checked):not(:disabled)';
    checkboxesOfCandidatesInOtherAnswers += '[name^="data[Answers]"][name$="[candidate_id]"]';
    checkboxesOfCandidatesInOtherAnswers += '[value="'+idCandidate+'"]';

    $(checkboxesOfCandidatesInOtherAnswers).attr('disabled', '');
}
function enableCandidateFromAnsweringThis(idCandidate){
    var checkboxesThatHaveBeenDisabled = 'input[type="checkbox"]:not(:checked):disabled';
    checkboxesThatHaveBeenDisabled += '[name^="data[Answers]"][name$="[candidate_id]"]';
    checkboxesThatHaveBeenDisabled += '[value="'+idCandidate+'"]';
    $(checkboxesThatHaveBeenDisabled).removeAttr('disabled');
}
function ensureConsistencyForANewElement(newElement){
    var alreadyCheckedCandidates = 'input[type="checkbox"]:checked:not(:disabled)';
    alreadyCheckedCandidates += '[name^="data[Answers]"][name$="[candidate_id]"]';

    var checkboxesInTheNewElement = '';

    $(alreadyCheckedCandidates).each(function(index,checkbox){
	checkboxesInTheNewElement = 'input[type="checkbox"]:not(:checked):not(:disabled)';
	checkboxesInTheNewElement += '[name^="data[Answers]"][name$="[candidate_id]"]';
	checkboxesInTheNewElement += '[value="'+$(checkbox).val()+'"]';
	$(checkboxesInTheNewElement,newElement).attr('disabled', '');
    });
}