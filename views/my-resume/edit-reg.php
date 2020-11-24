<?php
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Resume */
/* @var $townList An array of string objects */
/* @var $speciality An array of string objects */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Создание нового резюме';

$this->registerCssFile('css/jquery.nselect.css'); 
$this->registerCssFile('css/bootstrap-datepicker.css');

$this->registerJsFile('js/jquery.nselect.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('js/bootstrap-datepicker.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('js/bootstrap-datepicker.ru.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]); 
$this->registerJsFile('js/jquery-editable-select.js',['depends' => [\yii\web\JqueryAsset::className()]]); 
?>
<div class="content p-rel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt8 mb40"><a href="<?= Yii::$app->request->referrer ?>"><img src="images/blue-left-arrow.svg" alt="arrow"> Вернуться без
                        сохранения</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-title mb24">Новое резюме</div>
                </div>
            </div>
            <div class="col-12">
                <?php $form = ActiveForm::begin(); ?>
                    <div class="row mb32">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Фото</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="profile-foto-upload mb8"><img src="images/profile-foto.jpg" alt="foto">
                            </div>
                            <label class="custom-file-upload">
                                <input type="file"/>
                                Изменить фото
                            </label>
                        </div>
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Фамилия</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <?= $form->field($model, 'last_name')->textInput(['class' => 'form-control dor-input w100'])->label(false) ; ?>
                        </div>
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Имя</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <?= $form->field($model, 'first_name')->textInput(['class' => 'form-control dor-input w100'])->label(false) ; ?>
                        </div>
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Отчество</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <?= $form->field($model, 'middle_name')->textInput(['class' => 'form-control dor-input w100'])->label(false) ; ?>
                        </div>
                    </div>
                   
                    <div class="row mb24">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Дата рождения</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="datepicker-wrap input-group date">
                                <?= $form->field($model, 'bdate', ['options' => ['tag' => false]])
                                    ->input('text',['class' => 'form-control dor-input dpicker datepicker-input'])
                                    ->label(false) ; ?>                                
                                <img src="images/mdi_calendar_today.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Пол</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <ul class="card-ul-radio profile-radio-list">
                               <?php  if (!$model->sex) $model->sex = 1;?>
                                <?= 
                                    $form->field($model, 'sex')
                                        ->radioList(
                                            [1 => 'Мужской', 2 => 'Женский'],
                                            [
                                                'item' => function($index, $label, $name, $checked, $value) {
                                                    if ($checked) ;
                                                    $html = '<li><input type="radio" id="'.$index.'" name="'.$name.'" value="'.$value.'"';
                                                    if ($checked) $html .=' checked';
                                                    $html .='>';
                                                    $html .= '<label for="'.$index.'">'.$label.'</label></li>';

                                                    return $html;
                                                }
                                            ]
                                        )
                                    ->label(false);
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Город проживания</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <?= $form->field($model, 'townId')->dropDownList($townList, ['class' => 'dor-input w100'])->label(false) ; ?>
                        </div>
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="heading">Способы связи</div>
                        </div>
                        <div class="col-lg-7 col-10"></div>
                    </div>
                    <div class="row mb24">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Электронная почта</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="p-rel">
                                <?= $form->field($model, 'email')->input('email', ['class' => 'form-control dor-input w100']) ; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb32">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Телефон</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div style="width: 140px;" class="p-rel mobile-w100">
                                <?= $form->field($model, 'phone')->Input('text',['class' => 'form-control p-rel mobile-w100','placeholder' => '+7 ___ ___-__-__'])->label(false) ; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb24">
                        <div class="col-12">
                            <div class="heading">Желаемая должность</div>
                        </div>
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Специализация</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                        <?= $form->field($model, 'specialityId', ['options' => 
                                ['class'=> 'citizenship-select']])
                            ->dropDownList($speciality, ['class' => 'form-control nselect-1'])
                            ->label(false) ; ?>
                        </div>
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Зарплата</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="p-rel">
                                <?= $form->field($model, 'salary')
                                ->textInput([ 'class' => 'form-control dor-input w100',
                                    'placeholder' => 'От'])
                                ->label(false) ; ?>
                                <img class="rub-icon" src="images/rub-icon.svg" alt="rub-icon">
                            </div>
                        </div>
                    </div>
                    <div class="row mb32">
                        <div class="col-lg-2 col-md-3">
                            <div class="paragraph">Занятость</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="profile-info">
                                <div class="form-check d-flex">
                                    <?= $form->field($model, 'fEmp',['checkTemplate' => '{input}',
                                                                    'options' => ['tag' => false]                            ])
                                    ->checkbox([ 'class' => 'form-check-input',
                                                'id' => 'exampleCheck1'])
                                    ->label(false) ; ?>
                                    <label class="form-check-label" for="exampleCheck1"></label>
                                    <label for="exampleCheck1" class="profile-info__check-text job-resolution-checkbox">Полная
                                        занятость</label>
                                </div>
                                <div class="form-check d-flex">
                                    <?= $form->field($model, 'pEmp',['checkTemplate' => '{input}',
                                                                    'options' => ['tag' => false]                            ])
                                    ->checkbox([ 'class' => 'form-check-input',
                                                'id' => 'exampleCheck2'])
                                    ->label(false) ; ?>
                                    <label class="form-check-label" for="exampleCheck2"></label>
                                    <label for="exampleCheck2" class="profile-info__check-text job-resolution-checkbox">Частичная
                                        занятость</label>
                                </div>
                                <div class="form-check d-flex">
                                    <?= $form->field($model, 'tEmp',['checkTemplate' => '{input}',
                                                                    'options' => ['tag' => false]                            ])
                                    ->checkbox([ 'class' => 'form-check-input',
                                                'id' => 'exampleCheck3'])
                                    ->label(false) ; ?>
                                    <label class="form-check-label" for="exampleCheck3"></label>
                                    <label for="exampleCheck3" class="profile-info__check-text job-resolution-checkbox">Проектная/Временная
                                        работа</label>
                                </div>
                                <div class="form-check d-flex">
                                    <?= $form->field($model, 'vEmp',['checkTemplate' => '{input}',
                                                                    'options' => ['tag' => false]                            ])
                                    ->checkbox([ 'class' => 'form-check-input',
                                                'id' => 'exampleCheck4'])
                                    ->label(false) ; ?>
                                    <label class="form-check-label" for="exampleCheck4"></label>
                                    <label for="exampleCheck4" class="profile-info__check-text job-resolution-checkbox">Волонтёрство</label>
                                </div>
                                <div class="form-check d-flex">
                                    <?= $form->field($model, 'iEmp',['checkTemplate' => '{input}',
                                                                    'options' => ['tag' => false]                            ])
                                    ->checkbox([ 'class' => 'form-check-input',
                                                'id' => 'exampleCheck5'])
                                    ->label(false) ; ?>
                                    <label class="form-check-label" for="exampleCheck5"></label>
                                    <label for="exampleCheck5" class="profile-info__check-text job-resolution-checkbox">Стажировка</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb32">
                        <div class="col-lg-2 col-md-3">
                            <div class="paragraph">График работы</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="profile-info">
                                <div class="form-check d-flex">
                                    <?= $form->field($model, 'fSchedule',['checkTemplate' => '{input}',
                                                                    'options' => ['tag' => false]                            ])
                                    ->checkbox([ 'class' => 'form-check-input',
                                                'id' => 'exampleCheck6'])
                                    ->label(false) ; ?>
                                    <label class="form-check-label" for="exampleCheck6"></label>
                                    <label for="exampleCheck6" class="profile-info__check-text job-resolution-checkbox">Полный
                                        день</label>
                                </div>
                                <div class="form-check d-flex">
                                    <?= $form->field($model, 'sSchedule',['checkTemplate' => '{input}',
                                                                    'options' => ['tag' => false]                            ])
                                    ->checkbox([ 'class' => 'form-check-input',
                                                'id' => 'exampleCheck7'])
                                    ->label(false) ; ?>
                                    <label class="form-check-label" for="exampleCheck7"></label>
                                    <label for="exampleCheck7" class="profile-info__check-text job-resolution-checkbox">Сменный
                                        график</label>
                                </div>
                                <div class="form-check d-flex">
                                    <?= $form->field($model, 'flexSchedule',['checkTemplate' => '{input}',
                                                                    'options' => ['tag' => false]                            ])
                                    ->checkbox([ 'class' => 'form-check-input',
                                                'id' => 'exampleCheck8'])
                                    ->label(false) ; ?>
                                    <label class="form-check-label" for="exampleCheck8"></label>
                                    <label for="exampleCheck8" class="profile-info__check-text job-resolution-checkbox">Гибкий
                                        график</label>
                                </div>
                                <div class="form-check d-flex">
                                    <?= $form->field($model, 'remSchedule',['checkTemplate' => '{input}',
                                                                    'options' => ['tag' => false]                            ])
                                    ->checkbox([ 'class' => 'form-check-input',
                                                'id' => 'exampleCheck9'])
                                    ->label(false) ; ?>
                                    <label class="form-check-label" for="exampleCheck9"></label>
                                    <label for="exampleCheck9" class="profile-info__check-text job-resolution-checkbox">Удалённая
                                        работа</label>
                                </div>
                                <div class="form-check d-flex">
                                    <?= $form->field($model, 'rSchedule',['checkTemplate' => '{input}',
                                                                    'options' => ['tag' => false]                            ])
                                    ->checkbox([ 'class' => 'form-check-input',
                                                'id' => 'exampleCheck10'])
                                    ->label(false) ; ?>
                                    <label class="form-check-label" for="exampleCheck10"></label>
                                    <label for="exampleCheck10"
                                           class="profile-info__check-text job-resolution-checkbox">Вахтовый
                                        метод</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb32">
                        <div class="col-12">
                            <div class="heading">Опыт работы</div>
                        </div>
                    </div>
                    <div class="row mb32">
                        <div class="col-lg-2 col-md-3">
                            <div class="paragraph">Опыт работы</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <ul class="card-ul-radio profile-radio-list">
                                <?php if (is_null ($model->exp)) $model->exp = 0; ?>
                                <?= $form->field($model, 'exp')
                                        ->radioList(
                                            [0 => 'Нет опыта работы', 1 => 'Есть опыт работы'],
                                            [
                                                'item' => function($index, $label, $name, $checked, $value) {
                                                    if ($checked) ;
                                                    $html = '<li><input type="radio" id="exp'.$index.'" name="'.$name.'" value="'.$value.'"';
                                                    if ($checked) $html .=' checked';
                                                    $html .='>';
                                                    $html .= '<label for="exp'.$index.'">'.$label.'</label></li>';

                                                    return $html;
                                                }
                                            ]
                                        )
                                    ->label(false);
                                ?>
                            </ul>
                        </div>
                    </div>
                    
                    </div>
                    <div class="row mb32">
                        <div class="col-12">
                            <div class="heading">Расскажите о себе</div>
                        </div>
                    </div>
                    <div class="row mb64 mobile-mb32">
                        <div class="col-lg-2 col-md-3">
                            <div class="paragraph">О себе</div>
                        </div>
                        <div class="col-lg-5 col-md-7 col-12">
                            <?= $form->field($model, 'about')->textarea(['class' => 'form-control dor-input w100 h176 mb8'])->label(false) ; ?>
                        </div>
                    </div>
                    <div class="row mb128 mobile-mb64">
                        <div class="col-lg-2 col-md-3">
                        </div>
                        <div class="col-lg-10 col-md-9">
                            <?= Html::submitButton('Сохранить', ['class' => 'orange-btn link-orange-btn']) ?>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
