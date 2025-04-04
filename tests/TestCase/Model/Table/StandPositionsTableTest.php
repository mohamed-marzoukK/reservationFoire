<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StandPositionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StandPositionsTable Test Case
 */
class StandPositionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StandPositionsTable
     */
    protected $StandPositions;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.StandPositions',
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
        $config = $this->getTableLocator()->exists('StandPositions') ? [] : ['className' => StandPositionsTable::class];
        $this->StandPositions = $this->getTableLocator()->get('StandPositions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->StandPositions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StandPositionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\StandPositionsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
