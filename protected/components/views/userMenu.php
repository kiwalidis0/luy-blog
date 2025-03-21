<div class="max-w-sm w-full p-5 border border-gray-300 bg-white text-gray-900 shadow-md rounded-lg">
    <h4 class="text-base font-semibold text-gray-800 mb-3">User Menu</h4>
    <ul class="list-none space-y-2">
        <li>
            <?php echo CHtml::link(
                'Create New Post', 
                array('post/create'), 
                array('class' => 'block text-sm text-blue-600 py-1 px-3 rounded-md hover:bg-blue-100 hover:underline transition')
            ); ?>
        </li>
        <li>
            <?php echo CHtml::link(
                'Manage Posts', 
                array('post/admin'), 
                array('class' => 'block text-sm text-blue-600 py-1 px-3 rounded-md hover:bg-blue-100 hover:underline transition')
            ); ?>
        </li>
        <li class="flex items-center justify-between py-1 px-3 rounded-md hover:bg-blue-100 transition">
            <?php echo CHtml::link(
                'Approve Comments', 
                array('comment/index'), 
                array('class' => 'text-sm text-blue-600 hover:underline')
            ); ?>
            <span class="bg-red-500 text-white text-xs font-semibold px-2 py-0.5 rounded-full">
                <?php echo Comment::model()->pendingCommentCount; ?>
            </span>
        </li>
        <li>
            <?php echo CHtml::link(
                'Logout', 
                array('site/logout'), 
                array('class' => 'block text-sm text-red-600 py-1 px-3 rounded-md hover:bg-red-100 hover:underline transition')
            ); ?>
        </li>
    </ul>
</div>
