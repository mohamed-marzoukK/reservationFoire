<?php
declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * Users seed.
 */
class UsersSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/migrations/4/en/seeding.html
     *
     * @return void
     */
    // dans config/Seeds/UsersSeed.php
public function run(): void
{
    $data = [
        'email' => 'admin@example.com',
        'password' => 'motdepasse', // Sera hashé automatiquement
        'role' => 'admin',
        'created' => date('Y-m-d H:i:s'),
        'modified' => date('Y-m-d H:i:s')
    ];

    $table = $this->table('users');
    $table->insert($data)->save();
}
}
