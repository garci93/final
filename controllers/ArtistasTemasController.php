<?php

namespace app\controllers;

use Yii;
use app\models\ArtistasTemas;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArtistasTemasController implements the CRUD actions for ArtistasTemas model.
 */
class ArtistasTemasController extends Controller
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
     * Lists all ArtistasTemas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ArtistasTemas::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArtistasTemas model.
     * @param integer $artista_id
     * @param integer $tema_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($artista_id, $tema_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($artista_id, $tema_id),
        ]);
    }

    /**
     * Creates a new ArtistasTemas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArtistasTemas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'artista_id' => $model->artista_id, 'tema_id' => $model->tema_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ArtistasTemas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $artista_id
     * @param integer $tema_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($artista_id, $tema_id)
    {
        $model = $this->findModel($artista_id, $tema_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'artista_id' => $model->artista_id, 'tema_id' => $model->tema_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ArtistasTemas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $artista_id
     * @param integer $tema_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($artista_id, $tema_id)
    {
        $this->findModel($artista_id, $tema_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArtistasTemas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $artista_id
     * @param integer $tema_id
     * @return ArtistasTemas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($artista_id, $tema_id)
    {
        if (($model = ArtistasTemas::findOne(['artista_id' => $artista_id, 'tema_id' => $tema_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
