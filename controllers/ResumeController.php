<?php

namespace app\controllers;

use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use app\models\Resume;
use app\models\Speciality;

class ResumeController extends \yii\web\Controller
{
    
    /**
     * Страница поиска и фильтрации резюме.
     */
    public function actionList()
    {
        $speciality = Speciality::find()->asArray()->all();
        $speciality = ArrayHelper::map($speciality, 'id', 'speciality');

        $townList = MyResumeController::getTownList();

        $query = Resume::find();

        $pagination = new Pagination([
            'defaultPageSize' => 6,
            'totalCount' => $query->count(),
        ]);

        $resumeList = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('list', [
            'resumeList' => $resumeList,
            'pagination' => $pagination,
            'speciality' => $speciality,
            'townList' => $townList,
        ]);
    }


    /**
     * Страница просмотра одного резюме.
     */
    public function actionView($id)
    {
        $model = Resume::findOne($id);
        $model->updateCounters(['count' => 1]);

        $speciality = Speciality::find()->asArray()->all();
        $speciality = ArrayHelper::map($speciality, 'id', 'speciality');

        $townList = MyResumeController::getTownList();

        $model = Resume::findOne($id);

        return $this->render('//my-resume/view', [
        	'model' => $model,
            'speciality' => $speciality,
            'townList' => $townList,
        ]);
    }

    

}
