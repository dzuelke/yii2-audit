<?php

namespace bedezign\yii2\audit\controllers;

use bedezign\yii2\audit\components\web\Controller;
use bedezign\yii2\audit\models\AuditError;
use bedezign\yii2\audit\models\AuditErrorSearch;
use Yii;

/**
 * ErrorController
 * @package bedezign\yii2\audit\controllers
 */
class ErrorController extends Controller
{
    /**
     * Lists all AuditError models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuditErrorSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single AuditError model.
     * @param integer $id
     * @return mixed
     * @throws \HttpInvalidParamException
     */
    public function actionView($id)
    {
        $model = AuditError::findOne($id);
        if (!$model) {
            throw new \HttpInvalidParamException('Invalid request number specified');
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }
}
