<div class="w-full max-w-screen-lg mx-auto bg-white text-gray-900 border border-gray-300 p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold text-gray-900 mb-4">Manage Posts</h1>

    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'post-grid',
        'itemsCssClass' => 'w-full border border-gray-300 rounded-lg text-gray-900 bg-white',
        'pagerCssClass' => 'flex justify-center mt-4 space-x-2', 
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            array(
                'name' => 'title',
                'type' => 'raw',
                'value' => 'CHtml::link(CHtml::encode($data->title), $data->url, array("class" => "text-blue-500 hover:underline"))',
                'headerHtmlOptions' => array('class' => 'bg-gray-200 p-3 font-semibold'),
                'htmlOptions' => array('class' => 'p-3'),
            ),
            array(
                'name' => 'status',
                'value' => 'CHtml::encode(Lookup::item("PostStatus", $data->status))',
                'filter' => Lookup::items('PostStatus'),
                'headerHtmlOptions' => array('class' => 'bg-gray-200 p-3 font-semibold'),
                'htmlOptions' => array('class' => 'p-3'),
            ),
            array(
                'name' => 'create_time',
                'type' => 'raw',
                'value' => 'date("F j, Y \a\t h:i A", $data->create_time)',
                'filter' => false,
                'headerHtmlOptions' => array('class' => 'bg-gray-200 p-3 font-semibold'),
                'htmlOptions' => array('class' => 'p-3 text-gray-600'),
            ),
            array(
                'class' => 'CButtonColumn',
                'header' => 'Actions',
                'headerHtmlOptions' => array('class' => 'bg-gray-200 p-3 font-semibold'),
                'htmlOptions' => array('class' => 'p-3 flex space-x-2'),
                'buttons' => array(
                    'view' => array('imageUrl' => false, 'label' => '<i class="fas fa-eye"></i>', 'options' => array('class' => 'text-blue-500 hover:text-blue-600')),
                    'update' => array('imageUrl' => false, 'label' => '<i class="fas fa-edit"></i>', 'options' => array('class' => 'text-green-500 hover:text-green-600')),
                    'delete' => array('imageUrl' => false, 'label' => '<i class="fas fa-trash"></i>', 'options' => array('class' => 'text-red-500 hover:text-red-600')),
                ),
            ),
        ),
    )); ?>
</div>
