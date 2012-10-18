<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'upload-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('bg','status')); ?>
		<?php echo $form->textField($model,'status',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('bg','org_photo_url')); ?>
		<?php echo $form->textField($model,'org_photo_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'org_photo_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('bg','mini_photo_url')); ?>
		<?php echo $form->textField($model,'mini_photo_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'mini_photo_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('bg','title')); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('bg','phone')); ?>
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('bg','username')); ?>
		<?php echo $form->textField($model,'username',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('bg','email')); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('bg','address')); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('bg','sina_id')); ?>
		<?php echo $form->textField($model,'sina_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'sina_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('bg','sina_nick')); ?>
		<?php echo $form->textField($model,'sina_nick',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sina_nick'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('bg','ctime')); ?>
		<?php echo $form->textField($model,'ctime',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ctime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->