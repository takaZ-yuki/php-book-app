<?php

namespace App\Controller;

/**
 * Users Controller
 */
class UsersController extends AppController
{

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add']);
    }

    /**
     * ユーザ登録画面/ユーザー登録処理
     *
     * @return \Cake\Http\Response|null ユーザー登録後にログイン画面へ遷移する
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success('ユーザーの登録が完了しました');

                return $this->redirect(['controller' => 'Login', 'action' => 'index']);
            }
            $this->Flash->error('ユーザーの登録に失敗しました');
        }
        $this->set(compact('user'));
    }

    /**
     * ユーザー編集画面/ユーザー情報更新処理
     *
     * @return void
     */
    public function edit()
    {
        $user = $this->Users->get($this->Auth->user('id'));
        if ($this->request->is('put')) {
            $user = $this->Users->pathEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Auth->setUser($user->toArray());

                $this->Flash->success('ユーザー情報を更新しました');

                return $this->redirect(['controller' => 'Questions', 'action' => 'index']);
            }
            $this->Flash->error('ユーザー情報の更新に失敗しました');
        }
        $this->set(compact('user'));
    }

    /**
     * パスワード更新画面/パスワード更新処理
     *
     * @return \Cake\Http\Response|null パスワード更新後にユーザー編集画面へ遷移する
     */
    public function password()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->get($this->Auth->user('id'));

            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Auth->setUser($user->toArray());

                $this->Flash->success('パスワードを更新しました');

                return $this->redirect(['action' => 'edit']);
            }
            $this->Flash->error('パスワードの更新に失敗しました');
        }
        $this->set(compact('user'));
    }
}
