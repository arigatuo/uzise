<?php

/**
 * This is the model class for table "uzs_upload".
 *
 * The followings are the available columns in table 'uzs_upload':
 * @property string $upload_id
 * @property string $status
 * @property string $org_photo_url
 * @property string $mini_photo_url
 * @property string $title
 * @property string $phone
 * @property string $username
 * @property string $email
 * @property string $address
 * @property string $sina_id
 * @property string $sina_nick
 * @property string $ctime
 */
class Upload extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Upload the static model class
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
		return 'uzs_upload';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('org_photo_url, mini_photo_url, title, phone, username', 'required'),
			array('status', 'length', 'max'=>6),
			array('org_photo_url, mini_photo_url, address', 'length', 'max'=>255),
			array('phone, sina_id', 'length', 'max'=>20),
			array('username', 'length', 'max'=>30),
			array('email', 'length', 'max'=>100),
			array('sina_nick', 'length', 'max'=>50),
			array('ctime', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('upload_id, status, org_photo_url, mini_photo_url, title, phone, username, email, address, sina_id, sina_nick, ctime', 'safe', 'on'=>'search'),
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
            'org_photo_url' => Yii::t('bg','Org Photo Url'),
            'mini_photo_url' => Yii::t('bg','Mini Photo Url'),
            'title' => Yii::t('bg','Title'),
            'phone' => Yii::t('bg','Phone'),
            'username' => Yii::t('bg','Username'),
            'email' => Yii::t('bg','Email'),
            'address' => Yii::t('bg','Address'),
            'sina_id' => Yii::t('bg','Sina'),
            'sina_nick' => Yii::t('bg','Sina Nick'),
            'ctime' => Yii::t('bg','Ctime'),
            'vote_num' => Yii::t('bg','vote num'),
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
		$criteria->compare('org_photo_url',$this->org_photo_url,true);
		$criteria->compare('mini_photo_url',$this->mini_photo_url,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('sina_id',$this->sina_id,true);
		$criteria->compare('sina_nick',$this->sina_nick,true);
		$criteria->compare('ctime',$this->ctime,true);
        $criteria->compare('vote_num',$this->ctime,true);

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