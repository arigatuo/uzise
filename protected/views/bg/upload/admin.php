<?php
$this->breadcrumbs=array(
	'Uploads'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Upload', 'url'=>array('index')),
	array('label'=>'Create Upload', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('upload-grid', {
		data: $(this).serialize()
	});
	return false;
});

$('.multi-button').click(function(){
        var atLeastOneIsChecked = $('input[name=\"upload-grid_c0[]\"]:checked').length > 0;
        if (!atLeastOneIsChecked)
        {
                alert('请至少选择一条记录');
        }
        else
        {
                if (!window.confirm('确定要删除记录吗?')){
                    return false;
                }
                var baseFormSubmitUrl = '".Yii::app()->baseUrl."/bg/upload/MultiAll/action/';
                var theFormAction;
                switch($(this).attr('name')){
                    case 'btndeleteall':
                            theFormAction = 'delete';
                        break;
                    case 'btnshowall':
                            theFormAction = 'show';
                        break;
                    case 'btnhideall':
                            theFormAction = 'hide';
                        break;
                }
                $('#upload-search-form').attr('action', baseFormSubmitUrl + theFormAction);
                $('#upload-search-form').submit();
        }
});


");
?>

<h1><?php echo Yii::t('bg','Manage Uploads');?></h1>

    <?php /*
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
 */ ?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'upload-search-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype' => 'multipart/form-data')
));
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'upload-grid',
    'selectableRows'=>2,
    'ajaxUpdate'=>false,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
          'value' => '$data->upload_id',
          'class' => 'CCheckBoxColumn',
        ),
		//'upload_id',
		//'status',
        array(
          'name' => 'status',
          'value' => 'Yii::t("bg", $data->status)',
          'filter' => array('show'=>'显示', 'hide'=>'隐藏'),
        ),
		//'org_photo_url',
		//'mini_photo_url',
        array(
            'name' => 'mini_photo_url',
            'value' => 'CHtml::image($data->mini_photo_url, $data->upload_id, array("width"=>100,
            "height"=>100))',
            'type' => 'raw',
        ),
		'title',
		'phone',
		'username',
        /*
          'email',
          'address',
          'sina_id',
          'sina_nick',
          */
        //'ctime',
        array(
          'name' => 'ctime',
            'value' => 'date("Y-m-d H:i", $data->ctime)',
        ),
        'vote_num',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<div class="row buttons">
    <?php echo CHtml::button('删除',array('name'=>'btndeleteall','class'=>'multi-button')); ?>
    <?php echo CHtml::button('显示',array('name'=>'btnshowall','class'=>'multi-button')); ?>
    <?php echo CHtml::button('隐藏',array('name'=>'btnhideall','class'=>'multi-button')); ?>
</div>

<?php $this->endWidget(); ?>
