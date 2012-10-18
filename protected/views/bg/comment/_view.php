<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('autoid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->autoid), array('view', 'id'=>$data->autoid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('upload_id')); ?>:</b>
	<?php echo CHtml::encode($data->upload_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment_username')); ?>:</b>
	<?php echo CHtml::encode($data->comment_username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment_text')); ?>:</b>
	<?php echo CHtml::encode($data->comment_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ctime')); ?>:</b>
	<?php echo CHtml::encode($data->ctime); ?>
	<br />


</div>