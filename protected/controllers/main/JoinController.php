<?php

class JoinController extends Controller
{
    public function init(){
        $this->layout = "//layouts/module_main_layout";
    }

    //参加页面
	public function actionIndex()
	{
        $model = new Upload;
        if(!empty($_POST['Upload'])){
            //提交表单
            $request = Yii::app()->request;
            $validateCode = $request->getParam('validateCode');
            $Upload = $request->getParam('Upload');
            if(!empty($Upload['phone']) && Helper::setHash($Upload['phone']) === $validateCode){
                //根据phone参数哈希生成的validateCode验证
                ;
            }else{
                throw new CHttpException('无效的提交');
            }

            $model->attributes = $Upload;
            $more_attributes = array(
              'mini_photo_url' => $Upload['org_photo_url'],
              'ctime' => time(),
            );
            $model->setAttributes($more_attributes);

            if($model->save()){
                echo "ok";
                exit();
            }else{
                /*
                echo CHtml::errorSummary($model);
                die();
                */
                throw new CHttpException("保存失败");
            }
        }
		$this->render('index', array('model'=>$model));
	}

    //ajax检查电话
    public function actionAjax()
    {
        $request = Yii::app()->request;
        if($request->isAjaxRequest){
            $phoneNumber = $request->getParam('phone');

            if(!empty($phoneNumber)){
                //检查是否已存在
                $criteria = new CDbCriteria;
                $criteria->select = 'upload_id';
                $criteria->addCondition("`phone`='{$phoneNumber}'");
                $rs = Upload::model()->find($criteria);

                if($rs === null){
                    //validateCode
                    $returnArray = array('msg'=>'ok', 'code'=>Helper::setHash($phoneNumber));
                }else{
                    $returnArray = array('msg'=>'exist');
                }
            }else{
                $returnArray = array('msg'=>'given param is error');
            }
            echo json_encode($returnArray);
        }
    }

    //列表
    public function actionList()
    {

    }

    //单页
    public function actionSingle()
    {

    }

    //首页
    public function actionFirst()
    {

    }

    //介绍页
    public function actionIntro()
    {

    }

    //获奖名单
    public function actionFinal()
    {

    }

    public function actionTest()
    {
    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}