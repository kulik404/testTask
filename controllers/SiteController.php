<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
//use yii\web\Response;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
//use app\models\LoginForm;
use app\models\Resume;
use app\models\Speciality;
use app\models\Experience;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
       // return $this->render('index');
        $this->redirect(['site/resume_list']);
    }

    

    public function actionResume_list()
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

        return $this->render('resume_list', [
            'resumeList' => $resumeList,
            'pagination' => $pagination,
            'speciality' => $speciality,
            'townList' => $townList,
        ]);
    }

    public function actionMy_resume()
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

        return $this->render('my_resume',[
            'resumeList' => $resumeList,
            'speciality' => $speciality,
            'townList' => $townList,
        ]);
    }

    public function actionPre_view($id)
    {

        $model = Resume::findOne($id);
        $model->updateCounters(['count' => 1]);

        return $this->redirect(['site/resume_view', 'id'=>$id]);
    }

    public function actionResume_view($id)
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

        return $this->render('resume_view',[
            'id' => $id,
            'model' => $model,
            'speciality' => $speciality,
            'townList' => $townList,
        ]);
    }

    public function actionEdit_reg_resume($id = NULL)
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

            return $this->redirect(['site/my_resume']);
        }
        
        $townList = [
            0 => 'Кемерово',
            1 => 'Новосибирск',
            2 => 'Иркутск',
            3 => 'Красноярск',
            4 => 'Барнаул',
        ];

        $experience =  Experience::find()->where(['resumeId' => $model->id])->all();
        //$experience[] = new Experience();  
        //$experience[] = new Experience();  


        return $this->render('edit_reg_resume', [
            'model' => $model,
            'townList' => $townList,
            'speciality' => $speciality,
            'experience' => $experience,
        ]);

    }

    public function actionResume_del($id)
    {

       $resume = Resume::findOne($id);
       $resume->delete(); 

       return $this->redirect(['site/my_resume']);

    }
}
