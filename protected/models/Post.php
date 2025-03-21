<?php

/**
 * This is the model class for table "{{post}}".
 *
 * The following are the available columns in table '{{post}}':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $tags
 * @property integer $status
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $author_id
 *
 * The following are the available model relations:
 * @property Comment[] $comments
 * @property User $author
 */
class Post extends CActiveRecord
{
    const STATUS_DRAFT = 1;
    const STATUS_PUBLISHED = 2;
    const STATUS_ARCHIVED = 3;

    private $_oldTags;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{post}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('title, content, status', 'required'),
            array('title', 'length', 'max' => 128),
            array('status', 'in', 'range' => array(self::STATUS_DRAFT, self::STATUS_PUBLISHED, self::STATUS_ARCHIVED)),
            array('tags', 'match', 'pattern' => '/^[\w\s,]+$/', 'message' => 'Tags can only contain word characters.'),
            array('tags', 'normalizeTags'),
            array('title, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'author' => array(self::BELONGS_TO, 'User', 'author_id'),
            'comments' => array(self::HAS_MANY, 'Comment', 'post_id',
                'condition' => 'comments.status=' . Comment::STATUS_APPROVED,
                'order' => 'comments.create_time DESC'),
            'commentCount' => array(self::STAT, 'Comment', 'post_id',
                'condition' => 'status=' . Comment::STATUS_APPROVED),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'tags' => 'Tags',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'author_id' => 'Author',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('tags', $this->tags, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('create_time', $this->create_time);
        $criteria->compare('update_time', $this->update_time);
        $criteria->compare('author_id', $this->author_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the URL for viewing this post.
     * @return string
     */
    public function getUrl()
    {
        return Yii::app()->createUrl('post/view', array(
            'id' => $this->id,
            'title' => $this->title,
        ));
    }

    /**
     * Converts a comma-separated string into an array.
     * @param string $tags
     * @return array
     */
    public static function string2array($tags)
    {
        return preg_split('/\s*,\s*/', trim($tags), -1, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * Converts an array into a comma-separated string.
     * @param array $tags
     * @return string
     */
    public static function array2string($tags)
    {
        return implode(', ', $tags);
    }

    /**
     * Normalizes the tags before saving.
     */
    public function normalizeTags($attribute, $params)
    {
        $this->tags = Tag::array2string(array_unique(Tag::string2array($this->tags)));
    }

    /**
     * Handles actions before saving a post.
     * @return bool whether the saving should be executed
     */
    protected function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->create_time = $this->update_time = time();
                $this->author_id = Yii::app()->user->id;
            } else {
                $this->update_time = time();
            }
            return true;
        }
        return false;
    }

    /**
     * Handles actions after finding a post.
     */
    protected function afterFind()
    {
        parent::afterFind();
        $this->_oldTags = $this->tags;
    }

    /**
     * Handles actions after saving a post.
     */
    protected function afterSave()
    {
        parent::afterSave();
        Tag::model()->updateFrequency($this->_oldTags, $this->tags);
    }

    /**
     * Handles actions after deleting a post.
     */
    protected function afterDelete()
    {
        parent::afterDelete();
        Comment::model()->deleteAll('post_id=' . $this->id);
        Tag::model()->updateFrequency($this->tags, '');
    }

    /**
     * Adds a comment to the post.
     * @param Comment $comment
     * @return bool whether the comment was saved successfully
     */
    public function addComment($comment)
    {
        $comment->status = Yii::app()->params['commentNeedApproval'] ? Comment::STATUS_PENDING : Comment::STATUS_APPROVED;
        $comment->post_id = $this->id;
        return $comment->save();
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Post the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}