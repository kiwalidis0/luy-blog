<?php
Yii::import('zii.widgets.CPortlet');

class TagCloud extends CPortlet
{
    public $title = 'Tags';
    public $maxTags = 20;

    protected function renderContent()
    {
        $tags = Tag::model()->findTagWeights($this->maxTags);

        echo '<div class="max-w-screen-lg mx-auto p-6 border border-gray-300 bg-white shadow-sm rounded-lg">';
        echo '<h4 class="text-gray-900 text-lg font-bold mb-4">Popular Tags</h4>';
        echo '<div class="flex flex-wrap gap-3">';

        foreach ($tags as $tag => $weight) {
            $link = CHtml::link(
                CHtml::encode($tag),
                array('post/index', 'tag' => $tag),
                array(
                    'class' => 'px-3 py-1.5 bg-green-100 text-gray-800 rounded-lg text-sm font-medium hover:bg-green-200 hover:scale-105 transition-transform',
                    'style' => "font-size: {$weight}pt;"
                )
            );
            echo $link . "\n";
        }

        echo '</div>';
        echo '</div>';
    }
}
?>
