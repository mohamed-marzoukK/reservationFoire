<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;

class AdminController extends AppController
{
    public function index()
    {
        exit('admin');
    }

    public function add()
    {
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
                debug($admin->getErrors()); // Affiche les erreurs de validation
                exit; // Stoppe l'exécution pour voir les erreurs
            }
        }

        $this->set(compact('admin'));
    }
}
