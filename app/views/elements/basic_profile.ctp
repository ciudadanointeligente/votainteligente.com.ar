<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<img class="candidateComparedImage" src="<?php
if(isset($candidate['Candidate']['imagepath'])){
    echo Router::url($candidate['Candidate']['imagepath']);
}
else {
    echo Router::url('/img/candidate/imagepath/default-user.gif');
}
?>"></img>
<ul class="candidateBasicProfileInfo">
    <li>
    <span class="candidateBasicComparisonQuestion"><?= __('Nacimiento');?>:</span>
    <span class="candidateBasicComparisonAnswer"><?php
        if(isset($candidate['CandidateProfile']['birth'])){
        echo $this->Time->format('d/m/Y',$candidate['CandidateProfile']['birth']);
        }
    ?></span>
    </li>

    <li>
    <span class="candidateBasicComparisonQuestion"><?= __('Profesión');?>:</span>
    <span class="candidateBasicComparisonAnswer"><?php
        if(isset($candidate['CandidateProfile']['profession'])){
        echo $candidate['CandidateProfile']['profession'];
        }
    ?></span></li>
    <li>
    <span class="candidateBasicComparisonQuestion"><?= __('Estado Civil');?>:</span>
    <span class="candidateBasicComparisonAnswer"><?php
        if(isset($candidate['CandidateProfile']['civil_status'])){
        echo $candidate['CandidateProfile']['civil_status'];
        }
    ?></span></li>
    <li>
    <span class="candidateBasicComparisonQuestion"><?= __('Hijos');?>:</span>
    <span class="candidateBasicComparisonAnswer"><?php
        if(isset($candidate['CandidateProfile']['sons'])){
        echo $candidate['CandidateProfile']['sons'];
        }
    ?></span></li>
    <li>
    <span class="candidateBasicComparisonQuestion"><?= __('Religión');?>:</span>
    <span class="candidateBasicComparisonAnswer"><?php
        if(isset($candidate['CandidateProfile']['religion'])){
        echo $candidate['CandidateProfile']['religion'];
        }
    ?></span>
    </li>
</ul>
