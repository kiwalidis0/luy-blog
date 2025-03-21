<div class="p-4 border border-gray-200 rounded-lg bg-white text-gray-900 shadow w-full max-w-screen-md mx-auto">
    <h4 class="text-blue-600 font-semibold text-sm">Recent Comments</h4>
    <ul class="list-none space-y-3 mt-2 pl-4">
        <?php foreach ($this->getRecentComments() as $comment): ?>
            <li class="border-b border-gray-200 pb-2 last:border-none">
                <span class="text-blue-600 font-medium text-sm">
                    <?php echo CHtml::link(CHtml::encode($comment->author), array('post/view', 'id' => $comment->post->id), array('class' => 'hover:underline')); ?>
                </span> 
                <span class="text-gray-700 text-xs">said:</span>
                <blockquote class="mt-1 p-2 bg-gray-100 border-l-4 border-blue-500 text-gray-700 rounded-md text-xs leading-relaxed">
                    "<?php echo CHtml::encode($comment->content); ?>"
                </blockquote>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
