<div class="w-full max-w-sm mx-auto p-6 bg-white text-gray-900">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    )); ?>

    <h2 class="text-center text-2xl font-bold text-black-600 mb-4">Welcome Back</h2>

    <p class="text-center text-gray-700">Log in to continue your artistic journey.</p>

    <div class="mt-4">
        <label class="block text-gray-700 font-medium"><?php echo $form->labelEx($model, 'username'); ?></label>
        <?php echo $form->textField($model, 'username', array(
            'class' => 'w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring focus:ring-red-300',
            'placeholder' => 'Enter your username',
        )); ?>
        <?php echo $form->error($model, 'username', array('class' => 'text-red-500 text-sm mt-1')); ?>
    </div>

    <div class="mt-4">
        <label class="block text-gray-700 font-medium"><?php echo $form->labelEx($model, 'password'); ?></label>
        <?php echo $form->passwordField($model, 'password', array(
            'class' => 'w-full p-3 mt-1 border border-gray-300 rounded-lg focus:ring focus:ring-red-300',
            'placeholder' => 'Enter your password',
        )); ?>
        <?php echo $form->error($model, 'password', array('class' => 'text-red-500 text-sm mt-1')); ?>
    </div>

    <div class="mt-4 flex items-center">
        <?php echo $form->checkBox($model, 'rememberMe', array('class' => 'w-4 h-4 text-red-600 focus:ring focus:ring-red-300 border-gray-300 rounded')); ?>
        <label class="ml-2 text-gray-700"><?php echo $form->label($model, 'rememberMe'); ?></label>
    </div>

    <div class="mt-6">
        <?php echo CHtml::submitButton('Login', array(
            'class' => 'w-full px-4 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition',
        )); ?>
    </div>

    <p class="text-center text-gray-700 mt-4">
        Don't have an account? <a href="<?php echo Yii::app()->createUrl('user/register'); ?>" class="text-black-600 font-medium hover:underline">Sign up</a>
    </p>

    <?php $this->endWidget(); ?>
</div>
