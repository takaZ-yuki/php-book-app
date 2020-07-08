<?php

namespace App\Test\TestCase\Controller;

use App\Model\Entity\Answer;
use App\Model\Entity\Question;
use App\Model\Entity\User;
use App\Model\Table\QuestionsTable;
use App\Model\Table\UsersTable;
use Cake\ORM\ResultSet;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\QuestionsController Test Case
 *
 * @property QuestionsTable $Questions
 * @property UsersTable $Users
 */
class QuestionsControllerTest extends IntegrationTestCase
{
    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Answers',
        'app.Questions',
        'app.Users',
    ];

    /**
     * @inheritdoc
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->Questions = TableRegistry::getTableLocator()->get('Questions');
        $this->Users = TableRegistry::getTableLocator()->get('Users');
    }

    /**
     * @inheritdoc
     */
    public function tearDown(): void
    {
        unset($this->Questions);
        unset($this->Users);

        parent::tearDown();
    }

    /**
     * 質問一覧画面のテスト
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * 質問詳細画面のテスト
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * 質問投稿画面のテスト
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * 質問削除機能のテスト
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
