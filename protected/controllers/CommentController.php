<?php

class CommentController extends Controller
{
    public $layout = '//layouts/column2';

    public function filters()
    {
        return array(
            'accessControl',
            // Removed 'postOnly + delete' to allow AJAX handling
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('index', 'view', 'approve', 'update', 'delete'),
                'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionApprove($id)
	{
		$comment = $this->loadModel($id);
		if ($comment->status == Comment::STATUS_PENDING) {
			$comment->status = Comment::STATUS_APPROVED;
			if ($comment->save()) {
				Yii::app()->user->setFlash('success', 'Comment approved successfully.');
			}
		}
		$this->redirect(array('index'));
	}


    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Comment', array(
            'criteria' => array(
                'with' => 'post',
                'order' => 't.status, t.create_time DESC',
            ),
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate()
    {
        $model = new Comment;

        if (isset($_POST['Comment'])) {
            $model->attributes = $_POST['Comment'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (isset($_POST['Comment'])) {
            $model->attributes = $_POST['Comment'];
            if ($model->save()) {
                $this->redirect(array('index'));
            }
        }

        $this->render('update', array('model' => $model));
    }

	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) { // Ensure DELETE is via POST request
			$this->loadModel($id)->delete();

			if (Yii::app()->request->isAjaxRequest) {
				echo "Success";
				Yii::app()->end();
			} else {
				$this->redirect(array('admin'));
			}
		} else {
			throw new CHttpException(400, 'Invalid request. This action can only be performed via POST.');
		}
	}


	

    public function actionAdmin()
    {
        $model = new Comment('search');
        $model->unsetAttributes();
        if (isset($_GET['Comment'])) {
            $model->attributes = $_GET['Comment'];
        }

        $this->render('admin', array('model' => $model));
    }

    public function loadModel($id)
    {
        $model = Comment::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'comment-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}