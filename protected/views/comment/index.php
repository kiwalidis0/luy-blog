<?php
/* @var $this CommentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('Comments');

$this->menu = array(
    array('label' => 'Create Comment', 'url' => array('create'), 'itemOptions' => array('class' => 'bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition text-sm')),
    array('label' => 'Manage Comments', 'url' => array('admin'), 'itemOptions' => array('class' => 'bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition text-sm')),
);
?>

<div class="container mx-auto mt-6 p-6 bg-white text-gray-800 rounded-lg shadow-md border border-gray-300">
    <h1 class="text-2xl font-bold mb-4">Comments</h1>

    <div class="bg-gray-100 p-6 rounded-lg border border-gray-300 shadow-sm">
        <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '_view',
            'htmlOptions' => array('class' => 'divide-y divide-gray-300'),
            'itemsCssClass' => 'space-y-4',
        )); ?>
    </div>
</div>
