<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - About';
$this->breadcrumbs = array('About');
?>

<div class="w-full mx-auto p-6 bg-white text-gray-900 rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-black-600 mb-4">About Phrush</h1>

    <p class="mb-6">
        Welcome to <span class="font-bold">Phrush</span>, a vibrant online community designed specifically for artists from the Philippines and beyond. Whether you're a beginner or a seasoned creator, Phrush serves as a platform where you can share, learn, and grow together with fellow artists. Phrush is more than just a blog; it's a space where your voice matters.
    </p>

    <h2 class="text-2xl font-semibold text-blue-600 mb-2">Our Mission</h2>
    <p class="mb-6">
        Our mission is simple: to provide a space where artists can share their thoughts, ask questions, and discuss their creative journeys. From the latest art tools and techniques to best practices in creative expression, Phrush is here to support your artistic endeavors. We believe in the power of <span class="font-bold">collaboration</span> and <span class="font-bold">feedback</span>—two things that every artist needs to thrive.
    </p>

    <h2 class="text-2xl font-semibold text-blue-600 mb-2">What You Can Do Here</h2>
    <ul class="space-y-3 mb-6">
        <li class="p-4 bg-gray-100 rounded-lg"><span class="font-bold">Ask Questions</span> – Share your thoughts on new tools, materials, and techniques, or ask for advice on improving your craft.</li>
        <li class="p-4 bg-gray-100 rounded-lg"><span class="font-bold">Join the Discussions</span> – Comment on posts, offer suggestions, and learn from others’ experiences.</li>
        <li class="p-4 bg-gray-100 rounded-lg"><span class="font-bold">Collaborate</span> – Find other artists for collaborative projects, whether digital art, traditional painting, or any other creative pursuit.</li>
    </ul>

    <h2 class="text-2xl font-semibold text-blue-600 mb-2">Why Phrush?</h2>
    <p class="mb-6">
        Phrush is a blend of two powerful elements — the <span class="font-bold text-black-600">Philippines</span>, a nation with a rich cultural heritage and history of creativity, and the <span class="font-bold text-black-600">Brush</span>, a tool that has brought life to every masterpiece created. This unique combination makes Phrush not just a blog, but a celebration of art in all forms.
    </p>

    <h2 class="text-2xl font-semibold text-blue-600 mb-2">Our Values</h2>
    <ul class="space-y-3 mb-6">
        <li class="p-4 bg-gray-100 rounded-lg"><span class="font-bold">Creativity</span> – We encourage and celebrate all forms of art, from the traditional to the experimental.</li>
        <li class="p-4 bg-gray-100 rounded-lg"><span class="font-bold">Community</span> – Building a supportive environment where artists can learn from and inspire each other.</li>
        <li class="p-4 bg-gray-100 rounded-lg"><span class="font-bold">Growth</span> – Phrush is a place for both learning and teaching. Whether you're here to share or absorb knowledge, you’re part of the journey.</li>
    </ul>

    <h2 class="text-2xl font-semibold text-blue-600 mb-2">Get Involved</h2>
    <p class="mb-6">
        If you're ready to be part of the conversation, sign up today and start sharing your thoughts, ideas, and art with others. Whether you're looking for advice, a platform to showcase your work, or just want to meet other like-minded creatives, Phrush is the place to be!
    </p>

    <p class="font-bold">Contact Us:</p>
    <p>
        Have questions or suggestions? Feel free to reach out to us via our 
        <a href="<?php echo Yii::app()->createUrl('site/contact'); ?>" class="text-black-600 font-bold hover:underline">Contact Page</a>. We'd love to hear from you!
    </p>
</div>
