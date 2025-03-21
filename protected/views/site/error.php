<?php
/* @var $this CController */
$this->pageTitle = 'Error ' . CHtml::encode($code);
?>

<div class="w-full max-w-3xl mx-auto p-8 bg-white text-gray-900 rounded-lg shadow-lg text-center">
    <h2 class="text-4xl font-bold text-red-600">Error <?php echo CHtml::encode($code); ?></h2>

    <div class="mt-4 p-4 bg-red-100 text-red-800 border border-red-300 rounded">
        <?php echo CHtml::encode($message); ?>
    </div>

    <a href="<?php echo Yii::app()->homeUrl; ?>" class="inline-block mt-6 px-6 py-3 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 transition">
        Go Back to Homepage
    </a>
</div>
