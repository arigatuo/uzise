<?php

/**
 * This is the model class for table "uzs_vote_log".
 *
 * The followings are the available columns in table 'uzs_vote_log':
 * @property string $vote_log_id
 * @property string $vote_ip
 * @property string $vote_time
 * @property string $upload_id
 * @property string $status
 */
class VoteLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VoteLog the static model class
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
		return 'uzs_vote_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vote_log_id, vote_ip, vote_time, upload_id', 'required'),
			array('vote_log_id, vote_ip, upload_id', 'length', 'max'=>20),
			array('vote_time', 'length', 'max'=>10),
			array('status', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('vote_log_id, vote_ip, vote_time, upload_id, status', 'safe', 'on'=>'search'),
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
			'vote_log_id' => 'Vote Log',
			'vote_ip' => 'Vote Ip',
			'vote_time' => 'Vote Time',
			'upload_id' => 'Upload',
			'status' => 'Status',
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

		$criteria->compare('vote_log_id',$this->vote_log_id,true);
		$criteria->compare('vote_ip',$this->vote_ip,true);
		$criteria->compare('vote_time',$this->vote_time,true);
		$criteria->compare('upload_id',$this->upload_id,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}