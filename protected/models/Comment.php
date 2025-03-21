<?php

/**
 * This is the model class for table "{{comment}}".
 *
 * The following are the available columns in table '{{comment}}':
 * @property integer $id
 * @property string $content
 * @property integer $status
 * @property integer $create_time
 * @property string $author
 * @property string $email
 * @property string $url
 * @property integer $post_id
 *
 * The following are the available model relations:
 * @property Post $post
 */
class Comment extends CActiveRecord
{
    const STATUS_PENDING = 1;
    const STATUS_APPROVED = 2;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{comment}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('content, author, email', 'required'),
            array('author, email, url', 'length', 'max' => 128),
            array('email', 'email'),
            array('url', 'url'),
            array('status', 'in', 'range' => array(self::STATUS_PENDING, self::STATUS_APPROVED))
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'post' => array(self::BELONGS_TO, 'Post', 'post_id'),
        );
    }

    /**
     * @return array customized attribute labels (name => label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'Id',
            'content' => 'Comment',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'author' => 'Name',
            'email' => 'Email',
            'url' => 'Website',
            'post_id' => 'Post',
        );
    }

    /**
     * Retrieves the count of pending comments.
     * @return int count of pending comments
     */
    public function getPendingCommentCount()
    {
        return $this->count('status=' . self::STATUS_PENDING);
    }

    /**
     * Finds recent approved comments.
     * @param int $limit number of comments to retrieve
     * @return Comment[] list of recent comments
     */
    public function findRecentComments($limit = 10)
    {
        return $this->with('post')->findAll(array(
            'condition' => 't.status=' . self::STATUS_APPROVED,
            'order' => 't.create_time DESC',
            'limit' => $limit,
        ));
    }

    /**
     * Approves the comment by changing its status.
     */
    public function approve()
    {
        $this->status = self::STATUS_APPROVED;
        $this->update(array('status'));
    }

    /**
     * Sets default values before saving the model.
     * @return bool whether the saving should be executed
     */
    protected function beforeSave()
    {
        if ($this->isNewRecord) {
            $this->status = self::STATUS_PENDING;
        }
        return parent::beforeSave();
    }

	 /**
     * Let's the authenticated user comment without filling other fields
     */
	protected function beforeValidate()
	{
		if (!Yii::app()->user->isGuest) {
			$user = User::model()->findByPk(Yii::app()->user->id);
			if ($user) {
				$this->author = $user->username;
				$this->email = $user->email;
			}
		}
		return parent::beforeValidate();
	}

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider for retrieving models
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('create_time', $this->create_time);
        $criteria->compare('author', $this->author, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('post_id', $this->post_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Comment the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}