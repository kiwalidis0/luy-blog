<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs = array(
    'Comments' => array('index'),
    'Create',
);
?>

<div class="max-w-screen-lg mx-auto mt-6 p-6 bg-white text-gray-800 rounded-lg shadow-md border border-gray-300">
    <h1 class="text-2xl font-bold mb-4">Create Comment</h1>

    <div class="flex flex-wrap gap-2 mb-4">
        <?php echo CHtml::link('List Comments', array('index'), array('class' => 'bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition text-sm')); ?>
        <?php echo CHtml::link('Manage Comments', array('admin'), array('class' => 'bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition text-sm')); ?>
    </div>

    <div class="bg-gray-100 p-6 rounded-lg border border-gray-300 shadow-sm">
        <?php $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>
