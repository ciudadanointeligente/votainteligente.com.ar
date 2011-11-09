<h3><?php echo $category['Category']['name'];?></h3>

<?php

foreach($questions as $question) {
    $firstCandidateDidntAnswerThisQuestion = true;
    $secondCandidateDidntAnswerThisQuestion = true;
?>
<div class="questionInComparison"><?php echo $question['Question']['question']; ?></div>
    <div class="answerSpace">
        <ul class="firstCandidatesAnswer">
            <?php foreach ($question['Answer'] as $answer) {
                $answerAndQuestionAreSet = isset($weights[$question['Question']['id']]) && isset($weights[$question['Question']['id']][$answer['id']]);

                ?>
                    <li class=" answerInComparison <?php

                    $firstCandidateAnsweredThis = $answerAndQuestionAreSet && in_array($idFirstCandidate,$weights[$question['Question']['id']][$answer['id']]);
                    if ($firstCandidateAnsweredThis) {
                        $firstCandidateDidntAnswerThisQuestion = false;
                        echo 'answered';
                    }
                    else {
                        echo 'notAnswered';
                    } ?>"><?php echo $answer['answer'];?></li>


            <?php
            }
            ?>
            <?php
            if ($firstCandidateDidntAnswerThisQuestion) {
                ?>
                <li class="candidatesSpace answerInComparison answered">
                <?=__('Sin información');?>
                </li>
            <?php
            }
            ?>
        </ul>
        <ul class="secondCandidatesAnswer">
            <?php foreach ($question['Answer'] as $answer) {
                $answerAndQuestionAreSet = isset($weights[$question['Question']['id']]) && isset($weights[$question['Question']['id']][$answer['id']]);

                ?>

                    <li class="answerInComparison <?php

                    $secondCandidateAnsweredThis = $answerAndQuestionAreSet && in_array($idSecondCandidate,$weights[$question['Question']['id']][$answer['id']]);
                    if ($secondCandidateAnsweredThis) {
                        $secondCandidateDidntAnswerThisQuestion = false;
                        echo 'answered';
                    }
                    else{
                        echo 'notAnswered';
                    } ?>"><?php echo $answer['answer'];?>
                    </li>
            <?php
            }
            ?>
            <?php
            if ($secondCandidateDidntAnswerThisQuestion) {
            ?>
                <li class="candidatesSpace answerInComparison answered">
                <?=__('Sin información');?>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
<?php } ?>
<?php echo $this->element('facebook_comment',array('width'=>570));?>