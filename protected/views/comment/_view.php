<div class="bg-white text-gray-800 p-6 rounded-lg shadow-md mb-6 border border-gray-300 max-w-4xl mx-auto">
    <div class="flex items-center justify-between">
        <h6 class="text-base font-semibold">
            <?php echo CHtml::encode($data->author); ?>
        </h6>

        <!-- Status Badge -->
        <span class="px-3 py-1 text-sm font-medium rounded-md 
            <?php echo ($data->status == Comment::STATUS_APPROVED) 
                ? 'bg-green-100 text-green-700' 
                : 'bg-yellow-100 text-yellow-700'; ?>">
            <?php echo ($data->status == Comment::STATUS_APPROVED) ? "Approved" : "Pending"; ?>
        </span>
    </div>

    <p class="text-base mt-3 border-l-4 border-gray-300 pl-4">
        <?php echo CHtml::encode($data->content); ?>
    </p>

    <div class="flex gap-3 mt-4">
        <!-- Approve Button (Only for Pending Comments & Logged-in Users) -->
        <?php if (!Yii::app()->user->isGuest && $data->status == Comment::STATUS_PENDING): ?>
            <?php echo CHtml::link(
                'Approve',
                array('comment/approve', 'id' => $data->id),
                array(
                    'class' => 'bg-green-500 text-white px-4 py-2 text-sm rounded-md hover:bg-green-600 transition',
                    'confirm' => 'Are you sure you want to approve this comment?'
                )
            ); ?>
        <?php endif; ?>

        <!-- Update Button -->
        <?php echo CHtml::link(
            'Update',
            array('comment/update', 'id' => $data->id),
            array('class' => 'bg-blue-500 text-white px-4 py-2 text-sm rounded-md hover:bg-blue-600 transition')
        ); ?>

        <!-- Delete Button (AJAX) -->
        <?php echo CHtml::ajaxLink(
            'Delete',
            array('comment/delete', 'id' => $data->id),
            array(
                'type' => 'POST',
                'success' => 'function(){ location.reload(); }'
            ),
            array(
                'class' => 'bg-red-500 text-white px-4 py-2 text-sm rounded-md hover:bg-red-600 transition',
                'confirm' => 'Are you sure?'
            )
        ); ?>
    </div>
</div>
