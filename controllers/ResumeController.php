<?php

namespace app\controllers;

use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use app\models\Resume;
use app\models\Speciality;

class ResumeController extends \yii\web\Controller
{
    public function actionList()
    {
        $speciality = Speciality::find()->asArray()->all();
        $speciality = ArrayHelper::map($speciality, 'id', 'speciality');

        $townList = [
            0 => 'Кемерово',
            1 => 'Новосибирск',
            2 => 'Иркутск',
            3 => 'Красноярск',
            4 => 'Барнаул',
        ];

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

    public function actionView($id)
    {
        $model = Resume::findOne($id);
        $model->updateCounters(['count' => 1]);

        $speciality = Speciality::find()->asArray()->all();
        $speciality = ArrayHelper::map($speciality, 'id', 'speciality');

        $townList = [
            0 => 'Кемерово',
            1 => 'Новосибирск',
            2 => 'Иркутск',
            3 => 'Красноярск',
            4 => 'Барнаул',
        ];

        $model = Resume::findOne($id);

        return $this->render('//my-resume/view', [
        	'model' => $model,
            'speciality' => $speciality,
            'townList' => $townList,
        ]);
    }

}
