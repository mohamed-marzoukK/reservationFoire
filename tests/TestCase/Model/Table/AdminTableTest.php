<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdminTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdminTable Test Case
 */
class AdminTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdminTable
     */
    protected $Admin;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Admin',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Admin') ? [] : ['className' => AdminTable::class];
        $this->Admin = $this->getTableLocator()->get('Admin', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Admin);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AdminTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
