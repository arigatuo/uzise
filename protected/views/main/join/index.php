<!--区域选择 START-->
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl;?>/css/imgareaselect-default.css" type="text/css"/>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/js/jquery.imgareaselect.pack.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/js/baseValidate.js"></script>
<!--图片区域选择 END-->
<script type="text/javascript">
    var uploadValidateJs = {
        validateForm : function(){
            if( this.validateNeeded() && this.validateEmail() && this.validateChinese() &&
                this.validatePhone() && this.validateLength() ){
                return true;
            }else{
                return false;
            }
        },
        //验证必填项
        validateNeeded: function(){
            var neededArray = [
                {name:'Upload_username',title:'请填写姓名'},
                {name:'Upload_phone', title:'请填写电话'},
                {name:'Upload_address',title:'请填写地址'},
                {name:'Upload_title', title:'请填写宣言'},
                {name:'thePic',title:'请上传图片'}
            ];
            var return_val = true;
            for(var i in neededArray){
                if(jQuery( "#"+neededArray[i].name ).val().Trim().length == 0 ){
                    alert(neededArray[i].title);
                    return_val = false;
                    break;
                }
            }
            return return_val;
        },

        validatePhone: function(){
            var Upload_phone = jQuery("#Upload_phone").val().Trim();
            var return_value = false;
            if(!Upload_phone.isTel() && !Upload_phone.isMobile()){
                alert('手机/电话格式不对');
                return_value = false;
            }else{
                this.validateAjaxPhone();
                if(jQuery("#validateCode").val().Trim().length == 32){
                    return_value = true;
                }else{
                    return_value = false;
                }
            }
            return return_value;
        },

        validateEmail: function(){
            var Upload_email = jQuery("#Upload_email").val().Trim();
            var return_value = true;
            if(Upload_email.length > 0){
                if(!Upload_email.isEmail()){
                    alert('邮箱格式不对');
                    return_value = false;
                }
            }
            return return_value;
        },

        validateChinese: function(){
            var chineseArray = [
                {name:'Upload_username', title:'请填写中文姓名'}
            ];

            var return_value = true;
            for(var i in chineseArray){
                if(!jQuery("#" + chineseArray[i].name).val().Trim().isChinese()){
                    alert(chineseArray[i].title);
                    return_value = false;
                    break;
                }
            }
            return return_value;
        },

        validateLength: function(){
            var validateLengthArray = [
                { name:"Upload_title", title:"宣言字数不符", max:140, min:10 }
            ];
            var return_value = true;
            for(var i in validateLengthArray){
                var cur_value = jQuery("#" + chineseArray[i].name).val().Trim();
                if( (cur_value.length > validateLengthArray[i].max) || (cur_value.length < validateLengthArray[i] .min) ){
                        alert(validateLengthArray[i].title);
                        return_value = false;
                        break;
                }
            }
            return return_value;
        },

        validateAjaxPhone: function(){
            jQuery.ajax({
                type:'POST',
                url: '<?php echo Yii::app()->createUrl('/main/join/ajax/')?>',
                async:false,
                dataType:'json',
                data:{phone:jQuery('#Upload_phone').val()},
                success: function(response){
                    var validateCode = jQuery("#validateCode");
                    if(response.msg === 'ok'){
                        validateCode.val(response.code);
                    }else{
                        alert('该手机号已使用');
                        validateCode.val('');
                    }
                }
            });
        }
    };
</script>
<?php
//浮动层
/*
    $colorBox = $this->widget('application.extensions.colorpowered.JColorBox');
    //Call addInstance (chainable) from the widget generated.
    $colorBox->addInstance(".colorBox", array("iframe"=>false, 'width'=>'500px', 'height'=>'500px'));
*/
?>
<div id="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'upload-form',
        'enableAjaxValidation'=>false,
        'htmlOptions' => array(
          'onsubmit' => 'return uploadValidateJs.validateForm()',
        )
    )); ?>

    <div class="row">
    <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
        array(
            'id'=>'uploadpic',
            'config'=>array(
                'debug' => true,
                'action'=>Yii::app()->createUrl('main/ajax/UploadImg/'),
                'allowedExtensions' => array("jpg"),
                'sizeLimit' => 0.5*1024*1024,
                'onComplete' => "js:function(id, fileName, responseJSON){
                                    var picUrl = '".Yii::app()->getBaseUrl()."/' + responseJSON.folder+responseJSON
                                    .filename;
									jQuery('#thePic').val(picUrl);
									var thePreviewImg = jQuery('#previewImg');
									thePreviewImg.attr('width', 200);
									thePreviewImg.attr('height',
									    Math.round(
									        200 / parseInt(responseJSON.width) * parseInt(responseJSON.height)
                                        )
									);
									thePreviewImg.attr('src', picUrl);
									thePreviewImg.show();
									jQuery('#fixWidthImg').attr('src', picUrl);
									jQuery('#fixWidthImg').show();
									jQuery('#previewImg').imgAreaSelect({
									    aspectRatio: '4:3', minWidth: 20, minHeight: 15, handles: true,
									    onSelectChange : function(img, selection){
                                            var scaleX = 200 / (selection.width || 1);
                                            var scaleY = 150 / (selection.height || 1);
                                            jQuery('#fixWidthImg').css({
                                                overflow: 'hidden',
                                                width: Math.round(scaleX * 200) + 'px',
                                                height: Math.round(scaleY * 150) + 'px',
                                                marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
                                                marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
                                            });
									    },
									    onSelectEnd : function(img, selection){
									    }
									});
                }"
            )
        )
    );
    ?>
        <div>
            <a href="" class="colorBox" id="previewImgHref"><img src="" id="previewImg" width="200" height="150"/></a>
            <div style="width:200px;height:150px;overflow:hidden;position:absolute">
                <img src="" id="fixWidthImg" width="200" height="150" style="position:relative"/>
            </div>
            <input id="thePic" type="hidden" name="Upload[org_photo_url]" value="" />
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,Yii::t('bg','status')); ?>
        <?php echo $form->textField($model,'status',array('size'=>6,'maxlength'=>6)); ?>
        <?php echo $form->error($model,'status'); ?>
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

    <input type="hidden" id="validateCode" name="validateCode" />

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>

