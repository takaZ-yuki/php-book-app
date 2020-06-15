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
        $this->loadModel('Answers');
    }

    /**
     * 質問一覧画面
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $questions = $this->paginate($this->Questions->findQuestionsWithAnsweredCount(), [
            'order' => ['Questions.id' => 'DESC']
        ]);

        $this->set(compact('questions'));
    }

    /**
     * 質問投稿画面/質問投稿処理
     *
     * @return \Cake\Http\Response|null 質問投稿後に質問一覧画面へ遷移する
     */
    public function add()
    {
        $question = $this->Questions->newEntity();

        if ($this->request->is('post')) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            $question->user_id = 1; // TODO ユーザ管理機能実装時に修正する

            if ($this->Questions->save($question)) {
                $this->Flash->success('質問を投稿しました');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('質問の投稿に失敗しました');
        }

        $this->set(compact('question'));
    }

    /**
     * 質問詳細画面
     *
     * @param integer $id 質問🆔
     * @return void
     */
    public function view(int $id)
    {
        $question = $this->Questions->get($id);

        $answers = $this
            ->Answers
            ->find()
            ->where(['Answers.question_id' => $id])
            ->orderAsc('Answers.id')
            ->all();

        $newAnswer = $this->Answers->newEntity();

        $this->set(compact('question', 'answers', 'newAnswer'));
    }

    /**
     * 質問削除処理
     *
     * @return void \Cake\Http\Response|null 質問削除後に質問一覧画面へ遷移する
     */
    public function delete(int $id)
    {
        $this->request->allowMethod(['post']);

        $question = $this->Questions->get($id);
        // TODO 質問を削除できるのは質問投稿者飲みとする

        if ($this->Questions->delete($question)) {
            $this->Flash->success('質問を削除しました');
        } else {
            $this->Flash->error('質問の削除に失敗しました');
        }

        return $this->redirect(['action' => 'index']);
    }
}

?>
