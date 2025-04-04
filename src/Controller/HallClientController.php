<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

class HallClientController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->fetchTable('Admin'); // Charger le modèle Admin pour accéder aux données
        $this->fetchTable('Halls'); // Charger le modèle Halls pour les positions des halls
    }

    public function index($id = null)
    {
        // Récupérer le premier enregistrement Admin ou un spécifique si un ID est fourni
        $adminTable = $this->fetchTable('Admin');
        if ($id) {
            $admin = $adminTable->get($id, ['contain' => ['Halls']]);
        } else {
            $admin = $adminTable->find()->contain(['Halls'])->first();
            if (!$admin) {
                $this->Flash->error('Aucun plan disponible pour le moment.');
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
            $id = $admin->id;
        }

        // Vérifier si l'image et nb_hall existent
        if (empty($admin->image) || empty($admin->nb_hall)) {
            $this->Flash->error('Plan incomplet. Contactez un administrateur.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $this->set(compact('admin'));
    }
}