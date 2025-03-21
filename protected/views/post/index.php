<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('Posts');

$this->menu = array(
    array('label' => 'Create Post', 'url' => array('create'), 'itemOptions' => array('class' => 'block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition')),
    array('label' => 'Manage Posts', 'url' => array('admin'), 'itemOptions' => array('class' => 'block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition')),
);
?>

<div class="w-full max-w-screen-lg mx-auto bg-white">
    <!-- Show Tag Filter Title if Applied -->
    <?php if (!empty($_GET['tag'])): ?>
        <h1 class="text-gray-900 text-xl font-bold mb-4">Posts Tagged with <i class="text-blue-600"><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
    <?php else: ?>
        <h1 class="text-gray-900 text-xl font-bold mb-4">All Posts</h1>
    <?php endif; ?>

    <!-- Display Posts Using CListView -->
    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view', // Uses _view.php for individual post rendering
        'template' => "{items}\n{pager}", // Display items followed by pagination
        'htmlOptions' => array('class' => 'divide-y divide-gray-200'), // Light mode styling
        'pager' => array(
            'header' => '',
            'nextPageLabel' => '<span class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">Next →</span>',
            'prevPageLabel' => '<span class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">← Previous</span>',
            'firstPageLabel' => '<span class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">First</span>',
            'lastPageLabel' => '<span class="px-3 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">Last</span>',
            'maxButtonCount' => 5, // Limit number of page buttons
        ),
        'emptyText' => '<p class="text-gray-500 italic">No posts available.</p>', // Custom message when no posts exist
    ));
    ?>
</div>

