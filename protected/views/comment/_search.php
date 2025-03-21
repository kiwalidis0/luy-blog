<div class="max-w-screen-lg mx-auto bg-white text-gray-800 p-8 rounded-lg shadow-md border border-gray-300">
    <h2 class="text-xl font-semibold mb-6">Search Comments</h2>

    <?php $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
            <?php echo $form->label($model, 'id', array('class' => 'block text-sm font-medium mb-1')); ?>
            <?php echo $form->textField($model, 'id', array(
                'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none',
                'placeholder' => 'Comment ID'
            )); ?>
        </div>

        <div>
            <?php echo $form->label($model, 'status', array('class' => 'block text-sm font-medium mb-1')); ?>
            <?php echo $form->textField($model, 'status', array(
                'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none',
                'placeholder' => 'Status'
            )); ?>
        </div>

        <div>
            <?php echo $form->label($model, 'create_time', array('class' => 'block text-sm font-medium mb-1')); ?>
            <?php echo $form->textField($model, 'create_time', array(
                'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none',
                'placeholder' => 'Creation Time'
            )); ?>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <div>
            <?php echo $form->label($model, 'author', array('class' => 'block text-sm font-medium mb-1')); ?>
            <?php echo $form->textField($model, 'author', array(
                'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none',
                'placeholder' => 'Author Name'
            )); ?>
        </div>

        <div>
            <?php echo $form->label($model, 'email', array('class' => 'block text-sm font-medium mb-1')); ?>
            <?php echo $form->textField($model, 'email', array(
                'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none',
                'placeholder' => 'Email Address'
            )); ?>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <div>
            <?php echo $form->label($model, 'url', array('class' => 'block text-sm font-medium mb-1')); ?>
            <?php echo $form->textField($model, 'url', array(
                'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none',
                'placeholder' => 'Website (optional)'
            )); ?>
        </div>

        <div>
            <?php echo $form->label($model, 'post_id', array('class' => 'block text-sm font-medium mb-1')); ?>
            <?php echo $form->textField($model, 'post_id', array(
                'class' => 'w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none',
                'placeholder' => 'Post ID'
            )); ?>
        </div>
    </div>

    <div class="mt-8 text-right">
        <?php echo CHtml::submitButton('Search', array(
            'class' => 'bg-blue-600 text-white px-5 py-3 rounded-md hover:bg-blue-700 transition ease-in-out duration-200 focus:ring-2 focus:ring-blue-400 focus:outline-none'
        )); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
