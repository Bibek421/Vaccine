<?php

namespace app\controllers;

use Yii;
use app\models\VaccineType;
use app\models\VaccineTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VaccineTypeController implements the CRUD actions for VaccineType model.
 */
class VaccineTypeController extends Controller
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
     * Lists all VaccineType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VaccineTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VaccineType model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new VaccineType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VaccineType();

        if ($model->load(Yii::$app->request->post()) && $model->save()){
        // var_dump($model);die; 
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdatevac($id){
        $model=$this->findmodel($id);
        $vaccine_list= yii\helpers\ArrayHelper::map(\app\models\Vaccines::find()->all(),'id','v_name');
        $child=\app\models\Vaccine::findone(['id'=>$model->fk_child]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['vaccine/vaccine-detail','id'=>$model->fk_child]);
        }
        return $this->render('vaccine_update',[
            'model'=>$model,
            'vaccine_list'=>$vaccine_list,
            'child'=>$child,
        ]);

    }

    /**
     * Updates an existing VaccineType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing VaccineType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the VaccineType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VaccineType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VaccineType::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
