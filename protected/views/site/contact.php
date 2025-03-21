<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - Contact';
$this->breadcrumbs = array('Contact');
?>

<div class="w-full max-w-5xl mx-auto p-8 bg-white text-gray-900">
    <h1 class="text-3xl font-bold text-black-600 mb-4">Contact Phrush</h1>

    <?php if (Yii::app()->user->hasFlash('contact')): ?>
        <div class="p-4 mb-6 bg-green-100 text-green-800 border border-green-300 rounded">
            <?php echo Yii::app()->user->getFlash('contact'); ?>
        </div>
    <?php else: ?>

        <p class="mb-6">
            Have any questions about Phrush? Need help with something related to your artistic journey? 
            We’d love to hear from you! Please fill out the form below to get in touch with us. 
            Whether you have inquiries, feedback, or simply want to discuss creative ideas, we're here to help.
        </p>

        <div class="w-full max-w-5xl mx-auto p-8 bg-white text-gray-900">
            <?php $form = $this->beginWidget('CActiveForm', array(
                'id' => 'contact-form',
                'enableClientValidation' => true,
                'clientOptions' => array('validateOnSubmit' => true),
            )); ?>

            <?php echo $form->errorSummary($model, '', '', array('class' => 'p-4 mb-4 bg-red-100 text-red-800 border border-red-300 rounded')); ?>

            <div class="mb-4">
                <?php echo $form->labelEx($model, 'name', array('class' => 'block font-semibold mb-2')); ?>
                <?php echo $form->textField($model, 'name', array('class' => 'w-full p-3 border border-gray-300 rounded focus:ring-2 focus:ring-red-400')); ?>
                <?php echo $form->error($model, 'name', array('class' => 'text-red-600 text-sm')); ?>
            </div>

            <div class="mb-4">
                <?php echo $form->labelEx($model, 'email', array('class' => 'block font-semibold mb-2')); ?>
                <?php echo $form->textField($model, 'email', array('class' => 'w-full p-3 border border-gray-300 rounded focus:ring-2 focus:ring-red-400')); ?>
                <?php echo $form->error($model, 'email', array('class' => 'text-red-600 text-sm')); ?>
            </div>

            <div class="mb-4">
                <?php echo $form->labelEx($model, 'subject', array('class' => 'block font-semibold mb-2')); ?>
                <?php echo $form->textField($model, 'subject', array('class' => 'w-full p-3 border border-gray-300 rounded focus:ring-2 focus:ring-red-400')); ?>
                <?php echo $form->error($model, 'subject', array('class' => 'text-red-600 text-sm')); ?>
            </div>

            <div class="mb-4">
                <?php echo $form->labelEx($model, 'body', array('class' => 'block font-semibold mb-2')); ?>
                <?php echo $form->textArea($model, 'body', array('class' => 'w-full p-3 border border-gray-300 rounded focus:ring-2 focus:ring-red-400', 'rows' => 6)); ?>
                <?php echo $form->error($model, 'body', array('class' => 'text-red-600 text-sm')); ?>
            </div>

            <?php if (CCaptcha::checkRequirements()): ?>
                <div class="mb-4">
                    <?php echo $form->labelEx($model, 'verifyCode', array('class' => 'block font-semibold mb-2')); ?>
                    <div class="flex items-center space-x-4">
                        <?php $this->widget('CCaptcha', array('imageOptions' => array('class' => 'border border-gray-300 rounded'))); ?>
                        <?php echo $form->textField($model, 'verifyCode', array('class' => 'p-3 border border-gray-300 rounded focus:ring-2 focus:ring-red-400')); ?>
                    </div>
                    <small class="text-gray-600">Please enter the letters as shown in the image above. Letters are not case-sensitive.</small>
                    <?php echo $form->error($model, 'verifyCode', array('class' => 'text-red-600 text-sm')); ?>
                </div>
            <?php endif; ?>

            <div class="text-center mt-4">
                <?php echo CHtml::submitButton('Submit', array('class' => 'px-6 py-3 bg-green-600 text-white font-semibold rounded hover:bg-green-700 transition')); ?>
            </div>

            <?php $this->endWidget(); ?>
        </div>

        <p class="mt-6">
            You can also reach out to us on social media. Find us on 
            <span class="text-blue-600 font-semibold">Facebook</span>, <span class="text-blue-600 font-semibold">Instagram</span>, 
            and <span class="text-blue-600 font-semibold">Twitter</span> for the latest updates and community discussions.
        </p>

    <?php endif; ?>
</div>
