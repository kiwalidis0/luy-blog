<div class="w-full max-w-screen-lg mx-auto bg-white text-gray-900">
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-900">Create Post</h1>
        <p class="text-gray-600">Fill in the details below to add a new post.</p>
    </div>

    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>

<!-- Action Buttons -->
<div class="w-full max-w-screen-lg mx-auto mt-6 flex gap-2">
    <a href="<?php echo Yii::app()->createUrl('post/index'); ?>" 
       class="px-4 py-2 bg-gray-200 text-gray-900 font-semibold rounded-lg shadow hover:bg-gray-300 transition">
        View Posts
    </a>
    <a href="<?php echo Yii::app()->createUrl('post/admin'); ?>" 
       class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow hover:bg-blue-600 transition">
        Manage Posts
    </a>
</div>
