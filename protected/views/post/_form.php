<div class="w-full max-w-screen-lg mx-auto bg-white text-gray-900">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'post-form',
        'enableAjaxValidation'=>false,
    )); ?>

    <p class="text-yellow-600 font-medium mb-2">
        Fields with <span class="text-red-500">*</span> are required.
    </p>

    <?php echo $form->errorSummary($model, '', '', array('class' => 'bg-red-100 text-red-700 border border-red-400 p-3 rounded mb-4')); ?>

    <div class="mb-4">
        <?php echo $form->labelEx($model,'title', array('class' => 'block text-gray-700 font-medium mb-1')); ?>
        <?php echo $form->textField($model,'title', array(
            'class' => 'w-full px-3 py-2 border border-gray-300 rounded focus:ring focus:ring-blue-200',
            'maxlength'=>128,
            'placeholder'=>'Enter post title...'
        )); ?>
        <?php echo $form->error($model,'title', array('class' => 'text-red-600 text-sm mt-1')); ?>
    </div>

    <div class="mb-4">
        <?php echo $form->labelEx($model,'content', array('class' => 'block text-gray-700 font-medium mb-1')); ?>
        <?php echo $form->textArea($model,'content', array(
            'class' => 'w-full px-3 py-2 border border-gray-300 rounded focus:ring focus:ring-blue-200',
            'rows'=>6,
            'placeholder'=>'Write your content here...'
        )); ?>
        <?php echo $form->error($model,'content', array('class' => 'text-red-600 text-sm mt-1')); ?>
    </div>

    <div class="mb-4">
        <?php echo $form->labelEx($model,'tags', array('class' => 'block text-gray-700 font-medium mb-1')); ?>
        <?php echo $form->textArea($model,'tags', array(
            'class' => 'w-full px-3 py-2 border border-gray-300 rounded focus:ring focus:ring-blue-200',
            'rows'=>2,
            'placeholder'=>'Add comma-separated tags...'
        )); ?>
        <?php echo $form->error($model,'tags', array('class' => 'text-red-600 text-sm mt-1')); ?>
    </div>

    <div class="mb-4">
        <?php echo $form->labelEx($model,'status', array('class' => 'block text-gray-700 font-medium mb-1')); ?>
        <?php echo $form->dropDownList($model,'status', array(
            Post::STATUS_DRAFT => 'Draft',
            Post::STATUS_PUBLISHED => 'Published',
            Post::STATUS_ARCHIVED => 'Archived',
        ), array('class' => 'w-full px-3 py-2 border border-gray-300 rounded focus:ring focus:ring-blue-200')); ?>
        <?php echo $form->error($model,'status', array('class' => 'text-red-600 text-sm mt-1')); ?>
    </div>

    <div class="flex justify-end">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-2 rounded transition duration-300')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
