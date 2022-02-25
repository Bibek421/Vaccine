<?php

namespace app\controllers;

use Yii;
use app\models\Vaccine;
use app\models\VaccineSearch;
use app\models\VaccineType;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;

/**
 * VaccineController implements the CRUD actions for Vaccine model.
 */
class VaccineController extends Controller
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
     * Lists all Vaccine models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VaccineSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vaccine model.
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
     * Creates a new Vaccine model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Vaccine();
        $user_id=Yii::$app->user->id;
        $user_details=\app\models\Users::findone(['id'=>$user_id]);
        $vaccine_list= yii\helpers\ArrayHelper::map(\app\models\Vaccines::find()->all(),'id','v_name');
        if ($model->load(Yii::$app->request->post())) {

            $transaction=Yii::$app->db->beginTransaction();

            try{
                $model->image_child=UploadedFile::getInstance($model,'image_child');
                // var_dump($model->image_child);die;
                if(!empty($model->image_child)){
                $random_string=yii::$app->security->generateRandomString();
                $model->image_child->saveAs('images/'.$random_string.'.'.$model->image_child->extension,false);//for folder
                $model->image='images/'.$random_string.'.'.$model->image_child->extension;//for database
                }
                if($flag=$model->save(false)){
                    $vaccine_type=new \app\models\VaccineType();
                    $vaccine_type->fk_child=$model->id;
                    $vaccine_type->fk_vlist=$model->fk_vaccine;
                    $vaccine_type->date="2078-09-10";
                    $vaccine_type->dose=1;
                    $vaccine_type->fk_user=$user_id;
                    $vaccine_type->type=\app\models\VaccineType::VACCINATED;
                    if(!$flag=$vaccine_type->save(false)){
                        $transaction->rollBack();
                    }
                }
                if($flag){
                    $transaction->commit();
                }
            }
            catch(\Exception $e){
                $transaction->rollBack();
            }
            return $this->redirect(['view','id'=>$model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'vaccine_list'=>$vaccine_list,
        ]);
    }

    public function actionVaccineDetail($id){

        $child=$this->findmodel($id);
        $user_id=Yii::$app->user->id;
        $user_details=\app\models\Users::findone(['id'=>$user_id]);
        $model= new \app\models\VaccineType();
        
        $vaccine_list= yii\helpers\ArrayHelper::map(\app\models\Vaccines::find()->all(),'id','v_name');
        $query=\app\models\VaccineType::find()->where(['fk_child'=>$id])->andWhere(['type'=>VaccineType::VACCINATED]);
        $query_next=\app\models\VaccineType::find()->where(['fk_child'=>$id])->andWhere(['type'=>VaccineType::NEXT_VACCINATION])->all();
        $dataProvider=new ActiveDataProvider([
            'query'=>$query,
        ]);
        $vaccine_drop=\app\models\Vaccines::find()->all();
        $drop_list=array();
        foreach($vaccine_drop as $drop){
            $vaccine_arr=\app\models\VaccineType::find()->where(['fk_child'=>$id])->andWhere(['fk_vlist'=>$drop['id']])->all();
            if($vaccine_arr){
                foreach($vaccine_arr as $arr){
                    $max_value=$arr['dose'];
                }
            }else{
                $max_value=0;
            }
            if(!($max_value==$drop['dose'])){
                $drop_list[$drop['id']]=$drop['v_name'];
            }
            // var_dump($vaccine_arr);die;
        }
        // var_dump($drop_list);die;
        if ($model->load(Yii::$app->request->post())) {
            // var_dump($model);die;
            $a=null;
            if($model->type==VaccineType::VACCINATED){
                $check_dose=\app\models\VaccineType::find()->where(['fk_child'=>$model->fk_child])->andWhere(['fk_vlist'=>$model->fk_vlist])->andWhere(['type'=>$model->type])->all();
                if(empty($check_dose)){
                    $check_dose=\app\models\VaccineType::find()->where(['fk_child'=>$model->fk_child])->andWhere(['fk_vlist'=>$model->fk_vlist])->andWhere(['type'=>2])->one();
                    if(!empty($check_dose)){
                        Yii::$app->db->createCommand()
                        ->update('vaccine_type',['type'=>$model->type,'date'=>$model->date],['fk_child'=>$model->fk_child,'fk_vlist'=>$model->fk_vlist,'type'=>2,'dose'=>1])
                        ->execute();
                        return $this->redirect(['back',
                        'id'=>$id,
                    ]);
                    }
                    else{
                        $model->dose=1;
                        $model->fk_user=$user_id;
                        if($model->save()){
                            return $this->redirect(['back',
                            'id'=>$id,
                    ]);
                }
                    }
                }
            }else{
                $check_dose=\app\models\VaccineType::find()->where(['fk_child'=>$model->fk_child])->andWhere(['fk_vlist'=>$model->fk_vlist])->all(); //query for all data
            }
            foreach($check_dose as $dose){
                
                $a=$dose['dose'];
            }
            if(!empty($a)){
                $next_dose=$a+1;
                $find_dose=\app\models\VaccineType::find()->where(['fk_child'=>$model->fk_child])->andWhere(['fk_vlist'=>$model->fk_vlist])->andWhere(['type'=>2])->andWhere(['dose'=>$next_dose])->one();
            
            
            // var_dump($a);die;
            // var_dump($find_dose);die;
            if($find_dose){
                Yii::$app->db->createCommand()
                ->update('vaccine_type',['type'=>$model->type,'date'=>$model->date],['fk_child'=>$model->fk_child,'fk_vlist'=>$model->fk_vlist,'type'=>2,'dose'=>$next_dose])
                ->execute();

                return $this->redirect(['back',
                    'id'=>$id,
                ]);
            }else if(!empty($a)){
                $model->dose=$a+1;
            }
        }  else{
                $model->dose=1;
            }
            $model->fk_user=$user_id;
            
            if($model->save()){
                return $this->redirect(['back',
                    'id'=>$id,
                ]);
            }
        
        }
        return $this->render('vaccine_detail',[
                    'model'=>$model,
                    'dataProvider'=>$dataProvider,
                    'child'=>$child,
                    'vaccine_list'=>$vaccine_list,
                    'query_next'=>$query_next,
                    'drop_list'=>$drop_list,
                ]);


    }

    public function actionBack($id){

        $back=new Vaccine();
        return $this->render('back',[
            'back'=>$back,
            'id'=>$id,
        ]);
    }
    public function actionInactive($id){
        yii::$app->db->createCommand()
        ->update('vaccine',['status'=>0],['id'=>$id])
        ->execute();

        return $this->redirect(['index']);
    }

    public function actionActive($id){
        yii::$app->db->createCommand()
        ->update('vaccine',['status'=>1],['id'=>$id])
        ->execute();

        return $this->redirect(['index']);
    }

    /**
     * Updates an existing Vaccine model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $vaccine_list= yii\helpers\ArrayHelper::map(\app\models\Vaccines::find()->all(),'id','v_name');
        
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'vaccine_list'=>$vaccine_list,
        ]);
    }

    /**
     * Deletes an existing Vaccine model.
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
    public function actionSubcat() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $province_id = $parents[0];
                $out = \app\models\District::getDistrict($province_id); 
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                return ['output'=>$out, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }
    public function actionMunicipal() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $district_id = $parents[0];
                $out = \app\models\Municipals::getMunicipal($district_id); 
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                return ['output'=>$out, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }


    /**
     * Finds the Vaccine model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vaccine the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Vaccine::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
