<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('upload_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->upload_id), array('view', 'id'=>$data->upload_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('org_photo_url')); ?>:</b>
	<?php echo CHtml::encode($data->org_photo_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mini_photo_url')); ?>:</b>
	<?php echo CHtml::encode($data->mini_photo_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sina_id')); ?>:</b>
	<?php echo CHtml::encode($data->sina_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sina_nick')); ?>:</b>
	<?php echo CHtml::encode($data->sina_nick); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ctime')); ?>:</b>
	<?php echo CHtml::encode($data->ctime); ?>
	<br />

	*/ ?>

</div>