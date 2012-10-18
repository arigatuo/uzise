<?php

/**
 * This is the model class for table "uzs_comment".
 *
 * The followings are the available columns in table 'uzs_comment':
 * @property string $upload_id
 * @property string $status
 * @property string $comment_username
 * @property string $comment_text
 * @property string $ctime
 */
class Comment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'uzs_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('upload_id, comment_username, comment_text, ctime', 'required'),
			array('upload_id', 'length', 'max'=>20),
			array('status', 'length', 'max'=>6),
			array('comment_username', 'length', 'max'=>30),
			array('comment_text', 'length', 'max'=>140),
			array('ctime', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('upload_id, status, comment_username, comment_text, ctime', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'upload_id' => Yii::t('bg','Upload'),
			'status' => Yii::t('bg','Status'),
			'comment_username' => Yii::t('bg','Comment Username'),
			'comment_text' => Yii::t('bg','Comment Text'),
			'ctime' => Yii::t('bg','Ctime'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;

		$criteria->compare('upload_id',$this->upload_id,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('comment_username',$this->comment_username,true);
		$criteria->compare('comment_text',$this->comment_text,true);
		$criteria->compare('ctime',$this->ctime,true);

        $criteria->addCondition('status!="delete"');
        $criteria->order = "ctime desc";

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>30,
            ),
        ));
	}
}