<?php

namespace App\Controller;

/**
 * Questions Controller
 */
class QuestionsController extends AppController
{

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function initialize() : void
    {
        parent::initialize();
    }

    /**
     * 質問一覧画面
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $questions = $this->paginate($this->Questions->find(), [
            'order' => ['Questions.id' => 'DESC']
        ]);

        $this->set(compact('questions'));
    }
}

?>
