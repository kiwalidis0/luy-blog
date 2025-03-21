<div class="max-w-screen-lg mx-auto bg-white p-8 rounded-lg shadow-md border border-gray-300">
    <h2 class="text-xl font-semibold text-gray-800 mb-6">Leave a Comment</h2>

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'comment-form',
        'enableAjaxValidation' => true, 
    )); ?>

    <!-- Display validation errors -->
    <?php echo $form->errorSummary($model, '', '', array('class' => 'text-red-600 bg-red-100 p-4 rounded-md mb-6')); ?>

    <!-- Comment Textarea -->
    <div class="mb-6">
        <?php echo $form->labelEx($model, 'content', array('class' => 'block font-medium text-gray-700 mb-2')); ?>
        <?php echo $form->textArea($model, 'content', array(
            'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none',
            'rows' => 5, 
            'placeholder' => 'Write your comment...',
            'aria-label' => 'Comment content'
        )); ?>
        <?php echo $form->error($model, 'content', array('class' => 'text-red-500 text-sm')); ?>
    </div>

    <!-- Show extra fields if user is a guest -->
    <?php if(Yii::app()->user->isGuest): ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <?php echo $form->labelEx($model, 'author', array('class' => 'block font-medium text-gray-700 mb-2')); ?>
                <?php echo $form->textField($model, 'author', array(
                    'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none',
                    'placeholder' => 'Your name',
                    'aria-label' => 'Author name'
                )); ?>
                <?php echo $form->error($model, 'author', array('class' => 'text-red-500 text-sm')); ?>
            </div>

            <div>
                <?php echo $form->labelEx($model, 'email', array('class' => 'block font-medium text-gray-700 mb-2')); ?>
                <?php echo $form->textField($model, 'email', array(
                    'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none',
                    'placeholder' => 'Your email',
                    'aria-label' => 'Email'
                )); ?>
                <?php echo $form->error($model, 'email', array('class' => 'text-red-500 text-sm')); ?>
            </div>

            <div>
                <?php echo $form->labelEx($model, 'url', array('class' => 'block font-medium text-gray-700 mb-2')); ?>
                <?php echo $form->textField($model, 'url', array(
                    'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none',
                    'placeholder' => 'Your website (optional)',
                    'aria-label' => 'Website URL'
                )); ?>
                <?php echo $form->error($model, 'url', array('class' => 'text-red-500 text-sm')); ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Submit Button -->
    <div class="mt-8 text-right">
        <?php echo CHtml::submitButton(
            $model->isNewRecord ? 'Post Comment' : 'Save',
            array(
                'class' => 'bg-blue-600 text-white px-5 py-3 rounded-md hover:bg-blue-700 transition ease-in-out duration-200 focus:ring-2 focus:ring-blue-400 focus:outline-none'
            )
        ); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
