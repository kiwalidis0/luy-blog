<div class="w-full max-w-screen-lg mx-auto bg-white text-gray-900 border border-gray-300 p-6 rounded-lg shadow-lg">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
    )); ?>

    <div class="mb-4">
        <?php echo $form->label($model,'id', array('class' => 'block text-gray-700 font-medium mb-1')); ?>
        <?php echo $form->textField($model,'id', array(
            'class' => 'w-full px-3 py-2 border border-gray-300 rounded focus:ring focus:ring-blue-200',
            'placeholder' => 'Enter post ID...'
        )); ?>
    </div>

    <div class="mb-4">
        <?php echo $form->label($model,'title', array('class' => 'block text-gray-700 font-medium mb-1')); ?>
        <?php echo $form->textField($model,'title', array(
            'class' => 'w-full px-3 py-2 border border-gray-300 rounded focus:ring focus:ring-blue-200',
            'maxlength'=>128,
            'placeholder' => 'Enter post title...'
        )); ?>
    </div>

    <div class="mb-4">
        <?php echo $form->label($model,'content', array('class' => 'block text-gray-700 font-medium mb-1')); ?>
        <?php echo $form->textArea($model,'content', array(
            'class' => 'w-full px-3 py-2 border border-gray-300 rounded focus:ring focus:ring-blue-200',
            'rows'=>3,
            'placeholder' => 'Enter content keywords...'
        )); ?>
    </div>

    <div class="mb-4">
        <?php echo $form->label($model,'tags', array('class' => 'block text-gray-700 font-medium mb-1')); ?>
        <?php echo $form->textArea($model,'tags', array(
            'class' => 'w-full px-3 py-2 border border-gray-300 rounded focus:ring focus:ring-blue-200',
            'rows'=>2,
            'placeholder' => 'Enter tags (comma-separated)...'
        )); ?>
    </div>

    <div class="mb-4">
        <?php echo $form->label($model,'status', array('class' => 'block text-gray-700 font-medium mb-1')); ?>
        <?php echo $form->dropDownList($model,'status', array(
            '' => 'All Statuses',
            Post::STATUS_DRAFT => 'Draft',
            Post::STATUS_PUBLISHED => 'Published',
            Post::STATUS_ARCHIVED => 'Archived',
        ), array('class' => 'w-full px-3 py-2 border border-gray-300 rounded focus:ring focus:ring-blue-200')); ?>
    </div>

    <div class="mb-4">
        <?php echo $form->label($model,'create_time', array('class' => 'block text-gray-700 font-medium mb-1')); ?>
        <?php echo $form->textField($model,'create_time', array(
            'class' => 'w-full px-3 py-2 border border-gray-300 rounded focus:ring focus:ring-blue-200',
            'type' => 'date'
        )); ?>
    </div>

    <div class="mb-4">
        <?php echo $form->label($model,'update_time', array('class' => 'block text-gray-700 font-medium mb-1')); ?>
        <?php echo $form->textField($model,'update_time', array(
            'class' => 'w-full px-3 py-2 border border-gray-300 rounded focus:ring focus:ring-blue-200',
            'type' => 'date'
        )); ?>
    </div>

    <div class="mb-4">
        <?php echo $form->label($model,'author_id', array('class' => 'block text-gray-700 font-medium mb-1')); ?>
        <?php echo $form->textField($model,'author_id', array(
            'class' => 'w-full px-3 py-2 border border-gray-300 rounded focus:ring focus:ring-blue-200',
            'placeholder' => 'Enter author ID...'
        )); ?>
    </div>

    <div class="flex justify-end">
        <?php echo CHtml::submitButton('Search', array('class' => 'bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-2 rounded transition duration-300')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
