<!--后台公共nav-->
<div id="mainmenu">
    <?php $this->widget('zii.widgets.CMenu',array(
    'items'=>array(
        array('label'=>'评论管理', 'url'=>array('/bg/comment/admin')),
        array('label'=>'上传作品管理', 'url'=>array('/bg/upload/admin')),
        array('label'=>'登录', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
        array('label'=>'注销 ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'),
            'visible'=>!Yii::app()->user->isGuest)
    ),
)); ?>
</div><!-- mainmenu -->

