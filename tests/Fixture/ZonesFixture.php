<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ZonesFixture
 */
class ZonesFixture extends TestFixture
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
                'admin_id' => 1,
                'x_percent' => 1.5,
                'y_percent' => 1.5,
                'width_percent' => 1.5,
                'height_percent' => 1.5,
                'rotation_degrees' => 1.5,
                'created' => '2025-03-05 00:40:39',
                'modified' => '2025-03-05 00:40:39',
            ],
        ];
        parent::init();
    }
}
