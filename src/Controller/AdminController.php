<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;

class AdminController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
    }

    public function index()
    {
        $users = $this->fetchTable('Users')->find()
            ->order(['Users.created' => 'DESC'])
            ->all();
        
        $admin = $this->Authentication->getIdentity();
        
        $this->set(compact('users', 'admin'));
    }

    public function add()
    {
        // Vérifier si un enregistrement existe déjà dans la table Admin
        $adminTable = $this->fetchTable('Admin');
        $userId = $this->Authentication->getIdentity()->id; // ID de l'utilisateur connecté
        $existingAdmin = $adminTable->find()->first();

        if ($existingAdmin) {
            // Si un enregistrement existe, rediriger vers HallController::view avec cet ID
            $this->Flash->info('Un enregistrement Admin existe déjà.');
            return $this->redirect(['controller' => 'Hall', 'action' => 'view', $existingAdmin->id]);
        }

        // Si aucun enregistrement n'existe, permettre l'ajout
        $admin = $this->Admin->newEmptyEntity();

        if ($this->request->is('post')) {
            $admin = $this->Admin->patchEntity($admin, $this->request->getData());

            // Gestion du fichier image
            $file = $this->request->getData('image_file');
            if ($file && $file->getError() === UPLOAD_ERR_OK) {
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $ext = strtolower(pathinfo($file->getClientFilename(), PATHINFO_EXTENSION));

                if (!in_array($ext, $allowedExtensions)) {
                    $this->Flash->error('Format d\'image non valide. Veuillez télécharger un fichier JPG, JPEG, PNG ou GIF.');
                    return $this->redirect(['action' => 'add']);
                }

                $imageName = time() . '_' . $file->getClientFilename();
                $uploadPath = WWW_ROOT . 'img/uploads/' . $imageName;
                
                if (!is_dir(WWW_ROOT . 'img/uploads/')) {
                    mkdir(WWW_ROOT . 'img/uploads/', 0775, true);
                }

                $file->moveTo($uploadPath);
                $admin->image = 'uploads/' . $imageName;
            }

            if ($this->Admin->save($admin)) {
                $this->Flash->success('Admin enregistré avec succès.');
                return $this->redirect(['controller' => 'Hall', 'action' => 'view', $admin->id]);
            } else {
                debug($admin);
                debug($admin->getErrors());
                // Pas d'exit, laisser la vue se rendre pour afficher les erreurs
            }
        }

        $this->set(compact('admin'));
    }
}