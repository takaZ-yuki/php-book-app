<?php

namespace App\Model\Table;

use Cake\ORM\Table;

/**
 * Users Model
 */
class UsersTable extends Table
{

    /**
     * @inheritDoc
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

}

?>
