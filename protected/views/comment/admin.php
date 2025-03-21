<?php
/* @var $this CommentController */
/* @var $model Comment */

// Breadcrumb navigation
$this->breadcrumbs = array(
    'Comments' => array('index'),
    'Manage',
);

// JavaScript for search form toggle and AJAX search updates
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').slideToggle('fast'); // Smooth toggle effect
        return false;
    });
    $('.search-form form').submit(function(){
        $('#comment-grid').yiiGridView('update', {
            data: $(this).serialize()
        });
        return false;
    });
");
?>

<div class="max-w-screen-lg mx-auto mt-6 p-6 bg-white text-gray-800 rounded-lg shadow-md border border-gray-300">
    <h1 class="text-2xl font-bold mb-4">Manage Comments</h1>

    <p class="text-sm text-gray-600 mb-4">
        You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>, or <b>=</b>) at the beginning of each search value.
    </p>

    <div class="flex flex-wrap gap-2 mb-4">
        <?php echo CHtml::link('List Comments', array('index'), array('class' => 'bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition text-sm')); ?>
        <?php echo CHtml::link('Create Comment', array('create'), array('class' => 'bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition text-sm')); ?>
    </div>

    <!-- Link to toggle advanced search form -->
    <button class="search-button bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition mb-4">
        Advanced Search
    </button>

    <!-- Advanced search form (hidden by default) -->
    <div class="search-form bg-gray-100 p-4 rounded-lg shadow-md border border-gray-300 hidden">
        <?php $this->renderPartial('_search', array('model' => $model)); ?>
    </div>

    <!-- Comment Management Table -->
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'comment-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'itemsCssClass' => 'w-full border border-gray-300 bg-white shadow-sm rounded-lg', // Tailwind styling
        'columns' => array(
            'id',
            array(
                'name' => 'content',
                'type' => 'html',
                'value' => 'CHtml::encode($data->content)',
            ),
            array(
                'name' => 'status',
                'value' => '($data->status == Comment::STATUS_APPROVED) ? "Approved" : "Pending"',
                'filter' => array(Comment::STATUS_PENDING => 'Pending', Comment::STATUS_APPROVED => 'Approved'),
                'htmlOptions' => array('class' => 'text-center'),
            ),
            'create_time',
            'author',
            'email',
            array(
                'class' => 'CButtonColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => array(
                    'delete' => array(
                        'click' => 'function(){ 
                            if(confirm("Are you sure you want to delete this comment?")) { 
                                $.fn.yiiGridView.update("comment-grid", {
                                    type: "POST",
                                    url: $(this).attr("href"),
                                    success: function(data) {
                                        $.fn.yiiGridView.update("comment-grid"); 
                                    }
                                });
                            }
                            return false;
                        }',
                        'options' => array('class' => 'bg-red-500 text-white px-3 py-1 text-xs rounded-md hover:bg-red-600 transition'),
                    ),
                    'update' => array('options' => array('class' => 'bg-yellow-500 text-white px-3 py-1 text-xs rounded-md hover:bg-yellow-600 transition')),
                    'view' => array('options' => array('class' => 'bg-blue-500 text-white px-3 py-1 text-xs rounded-md hover:bg-blue-600 transition')),
                ),
            ),
        ),
    )); 
    ?>
</div>
