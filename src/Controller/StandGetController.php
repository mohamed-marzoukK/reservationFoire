<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

class StandGetController extends AppController
{
    public function view($id)
    {
        $stand = $this->fetchTable('Stands')->get($id);
    
        $this->set(compact('stand'));
    }
}