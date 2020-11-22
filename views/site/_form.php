<?php
$month = [
            1 => 'Январь',
            2 => 'Февраль',
            3 => 'Март',
            4 => 'Апрель',
            5 => 'Май',
            6 => 'Июнь',
            7 => 'Июль',
            8 => 'Август',
            9 => 'Сентябрь',
            10 => 'Октябрь',
            11 => 'Ноябрь',
            12 => 'Декабрь',
        ];
?>





<div class="row mb24">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Начало работы</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="d-flex justify-content-between">
                                <?= $form->field($exp, 'mStart', ['options' => 
		                                ['class'=> 'citizenship-select w100 mr16']])
		                            ->dropDownList($month, ['class' => 'form-control nselect-1'])
		                            ->label(false) ; ?>
                                <div class="citizenship-select w100">
                                    <?= $form->field($exp, 'yStart')
                                    ->textInput(['class' => 'form-control dor-input w100', 'placeholder' => '2006'] )
                                    ->label(false) ; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb8">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Окончание работы</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="d-flex justify-content-between">
                                <div class="citizenship-select w100 mr16">
                                    <?= $form->field($exp, 'mEnd', ['options' => 
                                        ['class'=> 'citizenship-select w100 mr16']])
                                    ->dropDownList($month, ['class' => 'form-control nselect-1'])
                                    ->label(false) ; ?>
                                </div>
                                <div class="citizenship-select w100">
                                    <?= $form->field($exp, 'yEnd')
                                    ->textInput(['class' => 'form-control dor-input w100', 'placeholder' => '2006'] )
                                    ->label(false) ; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb32">
                        <div class="col-lg-2 col-md-3">
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="profile-info">
                                <div class="form-check d-flex">
                                    <!-- <input type="checkbox" class="form-check-input" id="exampleCheck111"> -->
                                    <?= $form->field($exp, 'now',['checkTemplate' => '{input}',
                                                                    'options' => ['tag' => false]])
                                    ->checkbox([ 'class' => 'form-check-input',
                                                'id' => 'exampleCheck'.$key])
                                    ->label(false) ; ?>
                                    <label class="form-check-label" for="exampleCheck<?= $key ?>"></label>
                                    <label for="exampleCheck<?= $key ?>"
                                           class="profile-info__check-text job-resolution-checkbox">По настоящее
                                        время</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Организация</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <input type="text" class="dor-input w100">
                        </div>
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Должность</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <input type="text" class="dor-input w100">
                        </div>
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3">
                            <div class="paragraph">Обязанности, функции, достижения</div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <textarea class="dor-input w100 h96 mb8"
                                      placeholder="Расскажите о своих обязанностях, функциях и достижениях"></textarea>
                            <div><a href="#">Удалить место работы</a></div>
                            <!--  --><!--  --><!--  -->
                            <div><a href="#">+ Добавить место работы</a></div>
                            <!--  --><!--  --><!--  -->
                        </div>
                    </div>

                    <!--  --><!--  --><!--  -->