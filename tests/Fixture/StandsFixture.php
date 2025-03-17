<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StandsFixture
 */
class StandsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'x1' => 1,
                'y1' => 1,
                'x2' => 1,
                'y2' => 1,
                'width' => 1,
                'height' => 1,
                'angle' => 1,
                'created_at' => 1740747113,
                'updated_at' => 1740747113,
            ],
        ];
        parent::init();
    }
}
