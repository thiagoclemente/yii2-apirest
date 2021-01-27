<?php


namespace frontend\modules\api\controllers\v1;


use frontend\modules\api\resource\Comment;
use frontend\modules\api\resource\Post;
use yii\filters\auth\HttpBearerAuth;
use yii\web\ForbiddenHttpException;

class ActiveController extends \yii\rest\ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['only'] = ['create', 'update', 'delete'];
        $behaviors['authenticator']['authMethods'] = [
            'class' => HttpBearerAuth::class
        ];

        return $behaviors;
    }

    /**
     * @param string $action
     * @param Post|Comment $model
     * @param array $params
     * @throws ForbiddenHttpException
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        if (in_array($action, ['update', 'delete']) && $model->created_by !== \Yii::$app->user->id)
        {
            throw new ForbiddenHttpException('You do not haver permission to change this record.');
        }
    }
}