<?php

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 */
class User extends Entity
{

    /**
     * @var array 各プロパティが一括代入できるかどうかの情報
     */
    protected $_accessible = [
        'username' => true,
        'password' => true,
        'nickname' => true,
        'created' => true,
        'modified' => true
    ];

    /**
     * @var array JSONレスポンスなどで非表示にするプロパティ
     */
    protected $_hidden = [
        'password'
    ];

    /**
     * パスワードをハッシュ化する
     *
     * @param $value string 生パスワード
     * @return void bool|string ハッシュ化されたパスワード
     */
    protected function _setPassword($value)
    {
        if (strLen($value)) {
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($value);
        }
    }
}
