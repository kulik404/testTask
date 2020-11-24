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
     * При успешном сохранении должна открыться страница моих резюме 
     */
    public function actionEditReg($id = null)
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
        
        $townList = $this->getTownList();

        return $this->render('edit-reg', [
            'model' => $model,
            'townList' => $townList,
            'speciality' => $speciality,
        ]);
    }

    /**
     * Страница моих резюме.
     */
    public function actionList()
    {
        $speciality = Speciality::find()->asArray()->all();
        $speciality = ArrayHelper::map($speciality, 'id', 'speciality');

        $townList = $this->getTownList();

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

        $townList = $this->getTownList();

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

    /**
     * Список городов
     */
    public static function getTownList()
    {

        $townList = [
            0 => 'Кемерово',
            1 => 'Новосибирск',
            2 => 'Иркутск',
            3 => 'Красноярск',
            4 => 'Барнаул',
        ];

        return  $townList;
    }

}
