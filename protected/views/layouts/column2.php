<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="max-w-screen-lg mx-auto px-4 py-6">
	<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
		<div class="md:col-span-2">
			<div class="bg-white p-6">
				<?php echo $content; ?>
			</div>
		</div>

		<div class="md:col-span-1">
			<div class="bg-white-100 p-6">
				<?php if (!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>

				<?php $this->widget('TagCloud', array(
					'maxTags'=>Yii::app()->params['tagCloudCount'],
				)); ?>

				<?php $this->widget('RecentComments', array(
					'maxComments'=>Yii::app()->params['recentCommentCount'],
				)); ?>
			</div>
		</div>
	</div>
</div>

<?php $this->endContent(); ?>
