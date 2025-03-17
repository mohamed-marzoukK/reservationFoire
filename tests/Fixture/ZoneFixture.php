<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ZoneFixture
 */
class ZoneFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'zone';
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
                'x1' => 1,
                'y1' => 1,
                'x2' => 1,
                'y2' => 1,
            ],
        ];
        parent::init();
    }
}
