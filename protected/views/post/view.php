<div class="w-full mx-auto bg-white text-gray-900">
    <h1 class="text-3xl font-bold text-black-600"><?php echo CHtml::encode($model->title); ?></h1>

    <!-- Display Post Content -->
    <div class="mt-4 p-4">
        <p class="text-gray-800"><?php echo nl2br(CHtml::encode($model->content)); ?></p>
        <p class="mt-2"><strong>Tags:</strong> 
            <span class="px-2 py-1 bg-blue-200 text-blue-800 rounded-md">
                <?php echo CHtml::encode($model->tags); ?>
            </span>
        </p>
    </div>

    <!-- Metadata -->
    <div class="mt-4 p-4">
        <p><strong>Posted on:</strong> 
            <span class="text-blue-600"><?php echo date('F j, Y \a\t h:i a', $model->create_time); ?></span>
        </p>
        <p><strong>Last Updated:</strong> 
            <span class="text-yellow-600"><?php echo date('F j, Y \a\t h:i a', $model->update_time); ?></span>
        </p>
    </div>

    <!-- Comments Section -->
    <div id="comments" class="mt-6">
        <?php 
        $approvedComments = Comment::model()->findAll([
            'condition' => 'post_id=:post_id AND status=:status',
            'params' => [
                ':post_id' => $model->id,
                ':status' => Comment::STATUS_APPROVED,
            ],
        ]);
        ?>

        <?php if (!empty($approvedComments)): ?>
            <h3 class="text-xl font-semibold text-blue-600">
                <?php echo count($approvedComments) . ' Comment(s)'; ?>
            </h3>
            <div class="mt-3 p-4">
                <?php $this->renderPartial('_comments', array(
                    'comments' => $approvedComments,
                )); ?>
            </div>
        <?php else: ?>
            <h3 class="text-gray-500">No comments yet. Be the first to comment!</h3>
        <?php endif; ?>

        <h3 class="mt-6 text-green-600 font-semibold">Leave a Comment</h3>

        <?php if (Yii::app()->user->hasFlash('commentSubmitted')): ?>
            <div class="mt-3 p-3 bg-green-100 border border-green-400 text-green-800 rounded-md">
                <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
            </div>
        <?php else: ?>
            <div class="mt-3 p-4">
                <?php $this->renderPartial('/comment/_form', array(
                    'model' => $comment,
                )); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Action Buttons -->
    <div class="mt-6 flex flex-wrap gap-2">
        <a href="<?php echo Yii::app()->createUrl('post/index'); ?>" 
           class="px-4 py-2 bg-gray-300 text-gray-900 font-semibold rounded-lg shadow hover:bg-gray-400 transition">
            List Posts
        </a>
        <a href="<?php echo Yii::app()->createUrl('post/update', array('id' => $model->id)); ?>" 
           class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded-lg shadow hover:bg-yellow-600 transition">
            Update Post
        </a>
        <?php echo CHtml::link('Delete Post', '#', array(
            'submit' => array('delete', 'id' => $model->id),
            'confirm' => 'Are you sure you want to delete this post?',
            'class' => 'px-4 py-2 bg-red-500 text-white font-semibold rounded-lg shadow hover:bg-red-600 transition'
        )); ?>
    </div>
</div>
