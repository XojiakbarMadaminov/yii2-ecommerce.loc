<?php

namespace frontend\controllers;

use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class ProfileController extends \frontend\base\Controller
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
                        'actions' => ['index', 'user-address', 'user-account'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ]
            ]
        ];
    }

    public function actionIndex(){
        /** @var \common\models\User $user */
        $user = Yii::$app->user->identity;
        $userAddresses = $user->addresses;
        $userAddress = $user->getAddress();

        return $this->render('index',[
            'user' => $user,
            'userAddress' => $userAddress,
        ]);
    }

    public function actionUserAddress(){

        if (!Yii::$app->request->isAjax){
            throw new ForbiddenHttpException("You are only allowed to make ajax request");
        }
        $user = Yii::$app->user->identity;
        $userAddress = $user->getAddress();
        $success = false;
        if ($userAddress->load(Yii::$app->request->post()) && $userAddress->save()){
            $success = true;
        }
        return $this->renderAjax('user-address',[
            'userAddress' => $userAddress,
            'success' => $success
        ]);
    }

    public function actionUserAccount(){

        if (!Yii::$app->request->isAjax){
            throw new ForbiddenHttpException("You are only allowed to make ajax request");
        }
        $user = Yii::$app->user->identity;
        $userAddress = $user->getAddress();
        $success = false;
        if ($user->load(Yii::$app->request->post()) && $user->save()){
            $success = true;
        }
        return $this->renderAjax('user-account',[
            'user' => $user,
            'success' => $success
        ]);
    }
}