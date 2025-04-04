<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\HallsTable;
use Cake\Log\Log;

class HallController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Halls = $this->fetchTable('Halls');
    }

    public function view($id = null)
    {
        // Vérifier si $id est fourni
        if (!$id) {
            return $this->redirect(['controller' => 'Admin', 'action' => 'add']);
        }
      
        // Récupérer l'entité Admin avec l'ID donné
        $adminTable = $this->fetchTable('Admin');
        try {
            $admin = $adminTable->get($id, [
                'contain' => ['Halls']
            ]);
        } catch (\Cake\Datasource\Exception\RecordNotFoundException $e) {
            $this->Flash->error('Aucun enregistrement Admin trouvé pour cet ID.');
            return $this->redirect(['controller' => 'Admin', 'action' => 'add']);
        }

        // Vérifier si image et nb_hall sont définis et non vides
        if (empty($admin->image) || empty($admin->nb_hall)) {
            $this->Flash->error('Image ou nombre de halls manquant. Veuillez ajouter ces informations.');
            return $this->redirect(['controller' => 'Admin', 'action' => 'add']);
        }
        $hall = $this->fetchTable('Halls');

        // Passer les données à la vue
        $this->set(compact('admin'));
    }
    // src/Controller/HallController.php
    public function savePosition()
    
    {
        $this->autoRender = false; // Désactiver le rendu de la vue
        $this->request->allowMethod(['post']); // Autoriser uniquement les requêtes POST
        try {
            $data = $this->request->getData();
            Log::debug('Données reçues : ' . print_r($data, true));
    
        // Récupérer les données JSON
        $data = $this->request->getData();
        Log::debug('Données reçues : ' . print_r($data, true)); // Journalisation des données

        // Validation des données
        if (empty($data['id']) || empty($data['admin_id'])) {
            return $this->response->withStatus(400)->withStringBody('Données manquantes');
        }

        $hallsTable = $this->fetchTable('Halls');

        // Trouver ou créer une entrée
        $hall = $this->Halls->findOrCreate([
            'id' => $data['id'],
            'admin_id' => $data['admin_id']
        ]);

        // Mettre à jour les données
        $hall = $this->Halls->patchEntity($hall, [
            'x_percent' => $data['x_percent'],
            'y_percent' => $data['y_percent'],
            'width_percent' => $data['width_percent'],
            'height_percent' => $data['height_percent'],
            'rotation_degrees' => $data['rotation_degrees']
        ]);

        // Sauvegarder
        if ($this->Halls->save($hall)) {
            return $this->response->withType('json')->withStringBody(json_encode(['success' => true]));
        } else {
            Log::error('Erreur de sauvegarde : ' . print_r($hall->getErrors(), true)); // Journalisation des erreurs
            return $this->response->withStatus(500)->withStringBody('Erreur de sauvegarde');
        }
    } catch (\Exception $e) {
        Log::error('Erreur dans savePosition : ' . $e->getMessage());
        return $this->response->withStatus(500)->withStringBody('Erreur interne');
    }
   
    }
}