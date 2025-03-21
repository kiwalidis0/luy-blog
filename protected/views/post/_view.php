<div class="w-full max-w-3xl mx-auto bg-white border border-gray-300 rounded-lg p-6 shadow-md mb-6">
    <h3 class="text-blue-600 font-bold text-xl">
        <?php echo CHtml::link(
            CHtml::encode($data->title), 
            array('view', 'id' => $data->id), 
            array('class' => 'hover:underline hover:text-blue-800 transition duration-300')
        ); ?>
    </h3>

    <div class="mt-4 grid gap-2">
        <p><strong>Content:</strong><br>
            <span class="text-gray-700"><?php echo nl2br(CHtml::encode($data->content)); ?></span>
        </p>

        <p><strong>Tags:</strong> 
            <span class="px-2 py-1 bg-gray-200 text-gray-700 text-sm rounded">
                <?php echo !empty($data->tags) ? CHtml::encode($data->tags) : 'No tags'; ?>
            </span>
        </p>

        <p><strong>Status:</strong> 
            <?php 
                $statusClass = ($data->status == Post::STATUS_PUBLISHED) ? 'bg-green-100 text-green-700' : 
                            (($data->status == Post::STATUS_DRAFT) ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-700'); 
            ?>
            <span class="px-3 py-1 rounded-full text-sm font-semibold <?php echo $statusClass; ?>">
                <?php echo $data->status == Post::STATUS_PUBLISHED ? 'Published' : ($data->status == Post::STATUS_DRAFT ? 'Draft' : 'Archived'); ?>
            </span>
        </p>

        <p><strong>Created On:</strong> 
            <span class="text-gray-500 text-sm"><?php echo date('F j, Y \a\t h:i A', $data->create_time); ?></span>
        </p>

        <p><strong>Last Updated:</strong> 
            <span class="text-gray-600 text-sm font-medium"><?php echo date('F j, Y \a\t h:i A', $data->update_time); ?></span>
        </p>
    </div>
</div>
