<?php

namespace app\controllers;

use Yii;
use app\models\AlbumesTemas;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlbumesTemasController implements the CRUD actions for AlbumesTemas model.
 */
class AlbumesTemasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AlbumesTemas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AlbumesTemas::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AlbumesTemas model.
     * @param integer $album_id
     * @param integer $tema_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($album_id, $tema_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($album_id, $tema_id),
        ]);
    }

    /**
     * Creates a new AlbumesTemas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AlbumesTemas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'album_id' => $model->album_id, 'tema_id' => $model->tema_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AlbumesTemas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $album_id
     * @param integer $tema_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($album_id, $tema_id)
    {
        $model = $this->findModel($album_id, $tema_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'album_id' => $model->album_id, 'tema_id' => $model->tema_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AlbumesTemas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $album_id
     * @param integer $tema_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($album_id, $tema_id)
    {
        $this->findModel($album_id, $tema_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AlbumesTemas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $album_id
     * @param integer $tema_id
     * @return AlbumesTemas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($album_id, $tema_id)
    {
        if (($model = AlbumesTemas::findOne(['album_id' => $album_id, 'tema_id' => $tema_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
