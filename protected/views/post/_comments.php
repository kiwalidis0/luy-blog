<?php foreach ($comments as $comment): ?>
    <div class="w-full max-w-screen-lg mx-auto bg-white border border-gray-300 rounded-lg p-4 shadow-sm mb-4">
        <div class="flex justify-between items-center">
            <span class="font-semibold text-gray-800"><?php echo CHtml::encode($comment->author); ?></span>
            <span class="text-gray-500 text-sm">
                <?php echo date('F j, Y \a\t h:i a', $comment->create_time); ?>
            </span>
        </div>
        <div class="mt-2 text-gray-700">
            <p class="mb-0"><?php echo nl2br(CHtml::encode($comment->content)); ?></p>
        </div>
    </div>
<?php endforeach; ?>
