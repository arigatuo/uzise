<?php

class AjaxController extends Controller
{
	public function actionIndex()
	{
		//$this->render('index');
	}

    //图片ajax上传
    public function actionUploadImg(){
        Yii::import("ext.EAjaxUpload.qqFileUploader");

        $folder='upload/'.date("Ymd", time()).'/';// folder for uploaded files
        if(!is_dir('upload/')){
            @mkdir('upload/');
        }
        if(!is_dir($folder)){
            @mkdir($folder);
        }

        $allowedExtensions = array("jpg");//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 0.5 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $result['folder'] = $folder;

        $finalFile = $folder.$result['filename'];
        $fileSize=filesize($finalFile);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME

        $imageInfo = getimagesize($finalFile);
        if(!empty($imageInfo[0])){
            $result['width'] = $imageInfo[0];
            $result['height'] = $imageInfo[1];
        }

        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        echo $return;// it's array
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