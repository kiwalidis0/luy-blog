<?php

/**
 * This is the model class for table "{{tag}}".
 *
 * The followings are the available columns in table '{{tag}}':
 * @property integer $id
 * @property string $name
 * @property integer $frequency
 */
class Tag extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{tag}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('name', 'required'),
            array('frequency', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 128),
            array('id, name, frequency', 'safe', 'on' => 'search'),
        );
    }

    /**
     * Finds tag weights for generating a tag cloud.
     * The weights are randomly assigned for visualization.
     *
     * @param int $limit The maximum number of tags to retrieve.
     * @return array The tag names mapped to their respective weights.
     */
    public function findTagWeights($limit = 20)
    {
        $tags = $this->findAll();
        $tagWeights = array();

        foreach ($tags as $tag) {
            $tagWeights[$tag->name] = rand(8, 15); // Assigns a random weight for font size
        }

        return $tagWeights;
    }

    /**
     * Updates the frequency count of tags based on changes.
     * It increases the count for new tags and decreases it for removed tags.
     *
     * @param string $oldTags The previous tag list.
     * @param string $newTags The updated tag list.
     */
    public function updateFrequency($oldTags, $newTags)
    {
        $oldTags = self::string2array($oldTags);
        $newTags = self::string2array($newTags);

        $this->addTags(array_values(array_diff($newTags, $oldTags)));
        $this->removeTags(array_values(array_diff($oldTags, $newTags)));
    }

    /**
     * Increases the frequency count for a given set of tags.
     * If a tag does not exist, it creates a new entry.
     *
     * @param array $tags The tags to be added.
     */
    public function addTags($tags)
    {
        $criteria = new CDbCriteria;
        $criteria->addInCondition('name', $tags);
        $this->updateCounters(array('frequency' => 1), $criteria);

        foreach ($tags as $name) {
            if (!$this->exists('name=:name', array(':name' => $name))) {
                $tag = new Tag;
                $tag->name = $name;
                $tag->frequency = 1;
                $tag->save();
            }
        }
    }

    /**
     * Decreases the frequency count for a given set of tags.
     * Tags with a frequency of zero or less are removed.
     *
     * @param array $tags The tags to be removed.
     */
    public function removeTags($tags)
    {
        if (empty($tags)) {
            return;
        }

        $criteria = new CDbCriteria;
        $criteria->addInCondition('name', $tags);
        $this->updateCounters(array('frequency' => -1), $criteria);
        $this->deleteAll('frequency <= 0');
    }

    /**
     * Converts a comma-separated string into an array of tags.
     *
     * @param string $tags The tag string.
     * @return array The array of tag names.
     */
    public static function string2array($tags)
    {
        return preg_split('/\s*,\s*/', trim($tags), -1, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * Converts an array of tags into a comma-separated string.
     *
     * @param array $tags The array of tag names.
     * @return string The tag string.
     */
    public static function array2string($tags)
    {
        return implode(', ', $tags);
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'frequency' => 'Frequency',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * @return CActiveDataProvider The data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('frequency', $this->frequency);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * This method must be present in all CActiveRecord descendants.
     *
     * @param string $className Active record class name.
     * @return Tag The static model class.
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
