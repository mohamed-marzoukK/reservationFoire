<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StandPositionsFixture
 */
class StandPositionsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'stand_id' => 1,
                'stand_number' => 1,
                'x' => 1,
                'y' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'size' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-03-27 02:38:49',
                'modified' => '2025-03-27 02:38:49',
            ],
        ];
        parent::init();
    }
}
