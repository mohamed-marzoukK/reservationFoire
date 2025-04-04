<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Http\Exception\NotFoundException;

class StandsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Stands = $this->fetchTable('Stands');
        $this->Halls = $this->fetchTable('Halls');

        // Charger le composant Authentication
        $this->loadComponent('Authentication.Authentication');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        // Vérifier si l'utilisateur est connecté et a le rôle d'administrateur
        $user = $this->Authentication->getIdentity();
        if (!$user || $user->role !== 'admin') { // Remplacez 'role' et 'admin' par les champs et valeurs appropriés de votre table users
            $this->Flash->error('Accès non autorisé. Seuls les administrateurs peuvent ajouter un Stand.');
            return $this->redirect(['controller' => 'HallClient', 'action' => 'index']);
        }
    }

    public function index()
    {
        exit('admin');
    }

    public function add($hallId = null)
    {
        // Vérifier si hall_id est fourni
        if (!$hallId) {
            $this->Flash->error('Aucune salle spécifiée. Veuillez sélectionner une salle.');
            return $this->redirect(['controller' => 'Hall', 'action' => 'index']);
        }

        // Vérifier si la salle existe et récupérer son nom
        $hallName = '';
        try {
            $hall = $this->Halls->get($hallId);
            $hallName = $hall->name; // Remplacez 'name' par le champ approprié de la table halls
        } catch (RecordNotFoundException $e) {
            $this->Flash->error('Salle non trouvée.');
            return $this->redirect(['controller' => 'Halls', 'action' => 'index']);
        }

        // Vérifier s'il existe un Stand pour CE hall_id spécifique
        $existingStand = $this->Stands->find()
            ->where(['hall_id' => $hallId])
            ->first();

        if ($existingStand) {
            $this->Flash->info('Un Stand existe déjà pour cette salle.');
            return $this->redirect(['controller' => 'StandGet', 'action' => 'view', $hallId]);
        }

        $stand = $this->Stands->newEmptyEntity();
        if ($this->request->is('post')) {
            $stand = $this->Stands->patchEntity($stand, $this->request->getData());
            $file = $this->request->getData('image_file');
            if ($file && $file->getError() === UPLOAD_ERR_OK) {
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $ext = strtolower(pathinfo($file->getClientFilename(), PATHINFO_EXTENSION));

                if (!in_array($ext, $allowedExtensions)) {
                    $this->Flash->error('Format d\'image non valide. Veuillez télécharger un fichier JPG, JPEG, PNG ou GIF.');
                    $this->set(compact('stand', 'hallId', 'hallName'));
                    return;
                }

                $imageName = time() . '_' . $file->getClientFilename();
                $uploadPath = WWW_ROOT . 'img/stands/' . $imageName;
                
                if (!is_dir(WWW_ROOT . 'img/stands/')) {
                    mkdir(WWW_ROOT . 'img/stands/', 0775, true);
                }

                $file->moveTo($uploadPath);
                $stand->image = 'stands/' . $imageName;
            }

            // Associer hall_id à l'entité Stand
            $stand->hall_id = $hallId;

            if ($this->Stands->save($stand)) {
                $this->Flash->success('Stand enregistré avec succès.');
                return $this->redirect(['controller' => 'StandGet', 'action' => 'view', $hallId]);
            } else {
                debug($stand);
                debug($stand->getErrors()); // Affiche les erreurs de validation
                $this->set(compact('stand', 'hallId', 'hallName'));
                return;
            }
        }

        $this->set(compact('stand', 'hallId', 'hallName'));
    }
}