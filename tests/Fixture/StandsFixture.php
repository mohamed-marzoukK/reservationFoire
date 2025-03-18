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
                'image' => 'Lorem ipsum dolor sit amet',
                'number_of_stands' => 1,
                'created' => '2025-03-18 02:17:46',
                'modified' => '2025-03-18 02:17:46',
            ],
        ];
        parent::init();
    }
}
