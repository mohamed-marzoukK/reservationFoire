<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StandsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StandsTable Test Case
 */
class StandsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StandsTable
     */
    protected $Stands;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Stands',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Stands') ? [] : ['className' => StandsTable::class];
        $this->Stands = $this->getTableLocator()->get('Stands', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Stands);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StandsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
