<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Resume */
/* @var $townList An array of string objects */
/* @var $speciality An array of string objects */
/* @var $resumeList An array of app\models\Resume */
 
$this->title = 'Мои резюме';
?>
<div class="content">
        <div class="container">
            <div class="col-lg-9">
                <div class="main-title mb32 mt50 d-flex justify-content-between align-items-center">Мои резюме
                    <a href="<?= Url::toRoute('my-resume/editreg'); ?>" class="link-orange-btn orange-btn my-vacancies-add-btn">Добавить резюме</a><a
                            class="my-vacancies-mobile-add-btn link-orange-btn orange-btn plus-btn" href="#">+</a></div>
                <div class="tabs mb64">
                    <div class="tabs__content active">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex">
                                    <div class="paragraph mb8 mr16">У вас <span><?= count($resumeList) ?></span> резюме</div>
                                </div>
                                <?php foreach ($resumeList as $model): ?>
                                <div class="vakancy-page-block my-vacancies-block p-rel mb16">
                                    <div class="row">
                                        <div class="my-resume-dropdown dropdown show mb8">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="images/dots.svg" alt="dots">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                 aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="<?= Url::to(['my-resume/editreg', 'id'=>$model->id]) ?>">Редактировать</a>
                                                <a class="dropdown-item" href="<?= Url::to(['my-resume/del', 'id'=>$model->id]) ?>">Удалить</a>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 my-vacancies-block__left-col mb16">
                                            <h2 class="mini-title mb8"><?= $speciality[$model->specialityId]; ?></h2>
                                            <div class="d-flex align-items-center flex-wrap mb8 ">
                                                <span class="mr16 paragraph"><?=Yii::$app->formatter->asCurrency($model->salary, 'RUB', [NumberFormatter::FRACTION_DIGITS => 0]) ; ?></span>
                                                <span class="mr16 paragraph">Опыт работы 3 года</span>
                                                <span class="mr16 paragraph"><?= $townList[$model->townId]; ?></span>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <div class="paragraph mr16">
                                                    <strong>Просмотров</strong>
                                                    <span class="grey"><?= $model->count; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                                class="col-xl-12 d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="d-flex flex-wrap mobile-mb12">
                                                <a class="mr16" href="<?= Url::to(['my-resume/view', 'id'=>$model->id]) ?>">Открыть</a>
                                            </div>
                                            <span class="mini-paragraph cadet-blue">Опубликовано <?= Yii::$app->formatter->asDate($model->cDate, 'long');?> в <?= Yii::$app->formatter->asTime($model->cDate, 'php:H:i');?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

