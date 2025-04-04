<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

class StandClientController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Stands = $this->fetchTable('Stands');
    }

    public function index($hallId = null)
    {
        $standTable = $this->fetchTable('Stands');
        $stand = null;

        if ($hallId) {
            // Rechercher un Stand associé à ce hall_id
            $stand = $standTable->find()
                ->where(['hall_id' => $hallId])
                ->contain(['Halls'])
                ->first();
        } else {
            // Si aucun hall_id n'est fourni, prendre le premier Stand disponible
            $this->Flash->success('Stand non dispo.');
                return $this->redirect(['controller' => 'StandClient', 'action' => 'index']);
        }

        // Vérifier si le Stand existe et a des données complètes
        if ($stand && (empty($stand->image) || empty($stand->number_of_stands))) {
            $stand = null; // Données incomplètes, on traite cela comme si aucun Stand n'existait
        }

        $this->set(compact('stand'));
    }
}