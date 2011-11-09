<?php echo $this->element('header',array('js'=>array('dropDownLists'),'css'=>array('compare', 'style', 'nav','dropDownList')));?>
<?php echo $this->element('comparator-js');?>
	<div class="wrapper">
       <article class="wrapW">
                    <ul id="errors">
                    </ul>

                        <div class="leftContent">
                            <header class="comparisonBox">
                                <div class="candidatesLists">
                                    <div class="firstCandidate">
                                        <select name="firstCandidate">
                                        <option value="0" data-skip="1">Seleciona un candidato</option>
                                        <?php foreach($candidates as $candidate) {
                                        $isThisCandidateSelected = isset($firstCandidate['Candidate']['id']) && $firstCandidate['Candidate']['id']==$candidate['Candidate']['id'];
                                        ?>
                                        <option data-html-text="<?php echo $candidate['Candidate']['name'];?>" data-icon="<?php echo Router::url($candidate['Candidate']['imagepath'],true);?>" value="<?php echo $candidate['Candidate']['id'];?>" <?php
                                        if($isThisCandidateSelected) {
                                            echo 'SELECTED';
                                        }
                                        ?> ><?php echo $candidate['Candidate']['name'] ;?></option>
                                        <?php } ?>
                                        </select>
                                        <div class="basicProfileContainer">
                                            <?php
                                            if(isset($firstCandidate)) {
                                            echo $this->element('basic_profile',array('candidate'=>$firstCandidate));
                                            }
                                            else {
                                            echo $this->element('basic_profile');
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="secondCandidate">
                                        <select name="secondCandidate">
                                        <option value="0" data-skip="1">Seleciona un candidato</option>
                                        <?php foreach($candidates as $candidate) {
                                        $isThisCandidateSelected = isset($secondCandidate['Candidate']['id']) && $secondCandidate['Candidate']['id']==$candidate['Candidate']['id'];
                                        ?>
                                        <option data-html-text="<?php echo $candidate['Candidate']['name'];?>" data-icon="<?php echo Router::url($candidate['Candidate']['imagepath'],true);?>" value="<?php echo $candidate['Candidate']['id'];?>" <?php
                                        if($isThisCandidateSelected) {
                                            echo 'Selected';
                                        }
                                        ?>><?php echo $candidate['Candidate']['name'] ;?></option>
                                        <?php } ?>
                                        </select>
                                        <div class="basicProfileContainer">
                                            <?php
                                            if(isset($secondCandidate)) {
                                                echo $this->element('basic_profile',array('candidate'=>$secondCandidate));
                                            }
                                            else {
                                                echo $this->element('basic_profile');
                                            }

                                            ?>
                                         </div>
                                    </div>
                                 </div><!-- /candidatesLists-->
                               </header>
                                <section id ="result" class="comparisonResult" >
                                    <?php echo $content_for_layout;//The comparison Result ?>
                                </section>
                            </div>
                            <aside class="categories">
                                <h3 class="categoriesTitle"> Temas</h3>
                                <ul class="categoriesList">

                                <?php foreach ($categories as $category) {?>
                                    <li>
                                    <?php
                                    $selected = false;
                                    if(isset($categoryId) && $categoryId == $category['Category']['id']) {
                                        $selected = true;
                                    }
                                    echo $this->Form->radio(null,array($category['Category']['id']=>$category['Category']['name']),array('checked'=>$selected,'id'=>'category_'.$category['Category']['id'],'name'=>'category'));
                                    ?>
                                    </li>
                                <?php } ?>
                                </ul>
                            </aside>


       </article>
    </div>
<?php echo $this->element('footer');?>