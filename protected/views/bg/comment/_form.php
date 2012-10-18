<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'upload_id'); ?>
		<?php echo $form->textField($model,'upload_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'upload_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment_username'); ?>
		<?php echo $form->textField($model,'comment_username',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'comment_username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment_text'); ?>
		<?php echo $form->textField($model,'comment_text',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'comment_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ctime'); ?>
		<?php echo $form->textField($model,'ctime',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ctime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->