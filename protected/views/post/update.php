<div class="w-full mx-auto bg-white text-gray-900">
    <h1 class="text-2xl font-bold text-gray-900">Update Post #<?php echo $model->id; ?></h1>
    <p class="text-gray-600 mt-2">Modify the post details below and click "Save" to apply changes.</p>

    <div class="mt-4">
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>

<!-- Action Buttons -->
<div class="w-full mx-auto mt-6 flex flex-wrap gap-2">
    <a href="<?php echo Yii::app()->createUrl('post/index'); ?>" 
       class="px-4 py-2 bg-gray-300 text-gray-900 font-semibold rounded-lg shadow hover:bg-gray-400 transition">
        List Posts
    </a>
    <a href="<?php echo Yii::app()->createUrl('post/view', array('id' => $model->id)); ?>" 
       class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow hover:bg-blue-600 transition">
        View Post
    </a>
</div>
