<?php
/* @var $this SiteController */

// Set the page title
$this->pageTitle = "Phrush - A Community for Artists";

// Fetch the latest posts
$posts = Post::model()->findAll(array(
    'order' => 'create_time DESC',
    'limit' => 10,
));

$this->breadcrumbs = array('Index');
?>

<div class="w-full p-1 bg-white text-gray-900">
    <h1 class="text-center text-4xl font-bold text-black">Welcome to Phrush</h1>
    <p class="text-center text-lg mt-4">
        Phrush is a blog community where artists can share thoughts, ask questions, and interact with fellow creators!
    </p>

    <?php if (Yii::app()->user->isGuest): ?>
    <div class="mt-6 p-4 bg-yellow-100 border border-yellow-300 text-yellow-800 rounded-lg">
        <p>You are currently browsing as a guest. Feel free to explore posts, comment, and share your thoughts!</p>
        <p>To create posts, please <a href="<?php echo Yii::app()->createUrl('site/login'); ?>" class="text-black font-semibold hover:underline">Log in</a>.</p>
    </div>
    <?php else: ?>
        <div class="mt-6 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg">
            <p>Hello, <b><?php echo CHtml::encode(Yii::app()->user->name); ?></b>! You are logged in as an artist.</p>
            <p>
                <a href="<?php echo Yii::app()->createUrl('post/create'); ?>" class="mt-3 inline-block px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition">
                    Create a New Post
                </a>
            </p>
        </div>
    <?php endif; ?>

    <h2 class="text-2xl font-bold text-blue-600 mt-8">Latest Posts</h2>

    <?php if (count($posts) > 0): ?>
        <ul class="mt-4 space-y-4">
            <?php foreach ($posts as $post): ?>
                <li class="p-4 bg-gray-50 rounded-lg shadow-sm">
                    <a href="<?php echo Yii::app()->createUrl('post/view', array('id' => $post->id)); ?>" class="text-black font-semibold text-xl hover:underline">
                        <?php echo CHtml::encode($post->title); ?>
                    </a>
                    <p class="text-gray-600 text-sm"><i><?php echo date('F j, Y', $post->create_time); ?></i></p>
                    <p class="text-gray-800"><?php echo CHtml::encode(substr($post->content, 0, 150)) . '...'; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <div class="mt-4 p-4 bg-gray-200 text-gray-800 border border-gray-300 rounded-lg">
            <p>No posts yet. Start by creating your first post!</p>
        </div>
    <?php endif; ?>

	<h3 class="text-xl font-bold text-green-600 mt-8">Join the Conversation!</h3>
	<p class="mt-2 text-gray-700">
		Share your thoughts, ask questions, and engage in discussions about art, materials, techniques, and creativity.  
		Connect with other artists in the community and get inspired!
	</p>
</div>
