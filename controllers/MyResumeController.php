<?php

namespace app\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\Resume;
use app\models\Speciality;


class MyResumeController extends \yii\web\Controller
{

    /**
     * Страница создания и редактирования резюме.
     * При успешном сохранении открыться страница моих резюме 
     */
    public function actionEditReg($id = NULL)
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

            return $this->redirect(['my-resume/list']);
        }
        
        $townList = [
            0 => 'Кемерово',
            1 => 'Новосибирск',
            2 => 'Иркутск',
            3 => 'Красноярск',
            4 => 'Барнаул',
        ];

        //$experience =  Experience::find()->where(['resumeId' => $model->id])->all();


        return $this->render('edit-reg', [
            'model' => $model,
            'townList' => $townList,
            'speciality' => $speciality,
            //'experience' => $experience,
        ]);
    }

    /**
     * Страница моих резюме.
     */
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


    /**
     * Страница просмотра одного резюме.
     */
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

    /**
     * удаление одного резюме.
     */
    public function actionDel($id)
    {

       $resume = Resume::findOne($id);
       $resume->delete(); 

       return $this->redirect('list');

    }

}
