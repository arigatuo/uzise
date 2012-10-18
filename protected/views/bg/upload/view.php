<?php
$this->breadcrumbs=array(
	'Uploads'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Upload', 'url'=>array('index')),
	array('label'=>'Create Upload', 'url'=>array('create')),
	array('label'=>'Update Upload', 'url'=>array('update', 'id'=>$model->upload_id)),
	array('label'=>'Delete Upload', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->upload_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Upload', 'url'=>array('admin')),
);
?>

<h1>View Upload #<?php echo $model->upload_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'upload_id',
		'status',
		//'org_photo_url',
        array(
          'name' => 'org_photo_url',
          'value' => CHtml::image($model->org_photo_url, $model->upload_id),
          'type' => 'raw',
        ),
        array(
          'name' => 'mini_photo_url',
          'value' => CHtml::image($model->mini_photo_url, $model->upload_id),
          'type' => 'raw',
        ),
		//'mini_photo_url',
		'title',
		'phone',
		'username',
		'email',
		'address',
		'sina_id',
		'sina_nick',
		'ctime',
        array(
            'name' => 'ctime',
            'value' => date("Y-m-d H:i:s", $model->ctime),
        ),
	),
)); ?>
