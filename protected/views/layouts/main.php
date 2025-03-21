<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<!-- Tailwind CSS CDN -->
	<script src="https://cdn.tailwindcss.com"></script>

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
</head>

<body class="bg-white-100 text-gray-900">

<div class="w-full max-w-screen-lg mx-auto px-4 py-6">
	<!-- Header -->
	<header class="mb-6 text-center">
		<h1 class="text-3xl font-bold"><?php echo CHtml::encode(Yii::app()->name); ?></h1>
	</header>

	<!-- Navbar -->
	<nav class="bg-white shadow-md rounded-lg px-6 py-3 mb-6">
		<div class="flex justify-between items-center">
			<a href="<?php echo Yii::app()->createUrl('/site/index'); ?>" class="text-lg font-bold">
				<h2>Phrush</h2>
			</a>

			<div class="space-x-4">
				<?php $this->widget('zii.widgets.CMenu', array(
					'items' => array(
						array('label' => 'Home', 'url' => array('/site/index')),
						array('label' => 'Post', 'url' => array('/post/index')),
						array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
						array('label' => 'Contact', 'url' => array('/site/contact')),
						array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
						array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
					),
					'htmlOptions' => array('class' => 'flex space-x-4 text-gray-700'),
					'itemTemplate' => '<li class="inline-block">{menu}</li>',
					'encodeLabel' => false, 
				)); ?>
			</div>
		</div>
	</nav>

	<!-- Breadcrumbs -->
	<?php if(isset($this->breadcrumbs)): ?>
		<div class="bg-gray-200 text-gray-700 p-2 rounded mb-4">
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
				'htmlOptions' => array('class' => 'inline-block'),
			)); ?>
		</div>
	<?php endif ?>

	<!-- Main Content -->
	<div class="bg-white p-6">
		<?php echo $content; ?>
	</div>

	<!-- Footer -->
	<footer class="mt-6 text-center text-sm text-gray-500">
		Made by: Andreas Luy <?php echo date('Y'); ?><br/>
		BSIT 3A
	</footer>
</div>

</body>
</html>
