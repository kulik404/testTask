<?php

namespace app\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\Resume;
use app\models\Speciality;


class MyResumeController extends \yii\web\Controller
{

    public function actionEditreg($id = NULL)
    {
        $speciality = Speciality::find()->asArray()->all();
        $speciality = ArrayHelper::map($speciality, 'id', 'speciality');
        
        $model = Resume::findOne($id);
        if (!$model) {
            $model = new Resume(); 
            $model->foto = 'images/profile-foto.jpg'; 
        }
        if ($model->load(Yii::$app->request->post())){
            $model->uDate = date('Y-m-d H:i:s');
            $model->save();

            return $this->redirect(['myResume/list']);
        }
        
        $townList = [
            0 => 'Кемерово',
            1 => 'Новосибирск',
            2 => 'Иркутск',
            3 => 'Красноярск',
            4 => 'Барнаул',
        ];

        //$experience =  Experience::find()->where(['resumeId' => $model->id])->all();


        return $this->render('editreg', [
            'model' => $model,
            'townList' => $townList,
            'speciality' => $speciality,
            //'experience' => $experience,
        ]);
    }

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

        $resumeList = Resume::find()->all();;

        return $this->render('list',[
            'resumeList' => $resumeList,
            'speciality' => $speciality,
            'townList' => $townList,
        ]);

    }

    public function actionView($id)
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

        $model = Resume::findOne($id);

        return $this->render('view',[
            'model' => $model,
            'speciality' => $speciality,
            'townList' => $townList,
        ]);
    }

    public function actionDel($id)
    {

       $resume = Resume::findOne($id);
       $resume->delete(); 

       return $this->redirect('list');

    }

}
