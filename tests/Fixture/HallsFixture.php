<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HallsFixture
 */
class HallsFixture extends TestFixture
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
                'x_percent' => 1.5,
                'y_percent' => 1.5,
                'width_percent' => 1.5,
                'height_percent' => 1.5,
                'rotation_degrees' => 1.5,
                'image_id' => 1,
            ],
        ];
        parent::init();
    }
}
