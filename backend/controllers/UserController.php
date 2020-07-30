<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\SignupForm;
use common\models\User;
use common\models\Profile;

/**
 * Site controller
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['create', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new User();
        $allUser = $model->find()->orderBy(['id' => SORT_DESC])->asArray()->all();
        return $this->render('index', ['allUser' => $allUser]);
    }


    public function actionCreate()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            $val = $model->signup();
            if ($val) {
                $usersaved = User::findOne(['username' => $model->username]);
                $Profile = new Profile();
                $Profile->user_id = $usersaved->id;
                $Profile->name    = $model->name;
                $Profile->dob     = '';
                $Profile->save();
                print_r($Profile->errors);
                exit;
                Yii::$app->session->setFlash('success', 'Thank you for registration. ');
                return $this->goHome();
            }
        }
        return $this->render('create', ['model' => $model]);
    }
}
