<?php

namespace App\Model\Table;

use Cake\ORM\Table;

/**
 * Answers Model
 */
class AnswersTable extends Table
{
    /**
     * {@inheritdoc}
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('answers'); // 使用されるテーブル名
        $this->setDisplayField('id'); // list形式でデータ取得される際に使用されるカラム
        $this->setPrimaryKey('id'); // プライマリキーとなるカラム名

        $this->addBehavior('Timestamp'); // created及びmodifiedカラムを自動設定する

        $this->hasMany('Questions', [
            'foreignKey' => 'question_id',
            'joinType' => 'INNER'
        ]);
    }
}

?>
