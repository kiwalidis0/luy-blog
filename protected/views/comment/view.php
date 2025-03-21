<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs = array(
    'Comments' => array('index'),
    "Comment #{$model->id}",
);
?>

<div class="max-w-screen-lg mx-auto mt-6 p-6 bg-white text-gray-800 rounded-lg shadow-md border border-gray-300">
    <h1 class="text-2xl font-bold mb-4">View Comment #<?php echo $model->id; ?></h1>

    <div class="flex gap-2 mb-4">
        <?php echo CHtml::link('List Comments', array('index'), array('class' => 'bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition text-sm')); ?>
        <?php echo CHtml::link('Create Comment', array('create'), array('class' => 'bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition text-sm')); ?>
        <?php echo CHtml::link('Update Comment', array('update', 'id' => $model->id), array('class' => 'bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition text-sm')); ?>
        <?php echo CHtml::link('Delete Comment', '#', array(
            'submit' => array('delete', 'id' => $model->id),
            'confirm' => 'Are you sure you want to delete this item?',
            'class' => 'bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition text-sm'
        )); ?>
        <?php echo CHtml::link('Manage Comments', array('admin'), array('class' => 'bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition text-sm')); ?>
    </div>

    <div class="bg-gray-100 p-6 rounded-lg border border-gray-300 shadow-sm">
        <?php $this->widget('zii.widgets.CDetailView', array(
            'data' => $model,
            'htmlOptions' => array('class' => 'w-full text-sm text-gray-800'),
            'attributes' => array(
                'id',
                'content',
                array(
                    'name' => 'status',
                    'value' => ($model->status == Comment::STATUS_APPROVED) ? "Approved" : "Pending",
                ),
                'create_time',
                'author',
                'email',
                array(
                    'name' => 'url',
                    'type' => 'raw',
                    'value' => CHtml::link(CHtml::encode($model->url), $model->url, array('target' => '_blank', 'class' => 'text-blue-500 hover:underline')),
                ),
                'post_id',
            ),
        )); ?>
    </div>
</div>
