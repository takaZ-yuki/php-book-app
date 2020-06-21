<?php

namespace App\Controller;

/**
 * Login Controller
 */
class LoginController extends AppController
{

    public function index()
    {
        if ($this->Auth->isAuthorized()) {
            return $this->redirect($this->Auth->redirectUrl());
        }

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('ユーザー名またはパスワードが不正です');
        }
    }
}
