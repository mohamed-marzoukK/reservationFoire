<?php

use Phinx\Migration\AbstractMigration;

class CreateHallsTable extends AbstractMigration
{
    // config/Migrations/20231010120000_CreateHallsTable.php
// config/Migrations/20231010120000_CreateHallsTable.php
public function change()
{
    $table = $this->table('halls');
    $table->addColumn('admin_id', 'integer')
          ->addColumn('x_percent', 'decimal', ['precision' => 5, 'scale' => 2])
          ->addColumn('y_percent', 'decimal', ['precision' => 5, 'scale' => 2])
          ->addColumn('width_percent', 'decimal', ['precision' => 5, 'scale' => 2])
          ->addColumn('height_percent', 'decimal', ['precision' => 5, 'scale' => 2])
          ->addColumn('rotation_degrees', 'decimal', ['precision' => 5, 'scale' => 2])
          ->addForeignKey('admin_id', 'admin', 'id')
          ->create();
}
}
?>