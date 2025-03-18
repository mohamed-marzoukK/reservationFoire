<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Http\Exception\NotFoundException;

class StandsController extends AppController
{
   
        public function index()
    {
        exit('admin');
    }
    

    public function add()
    {
        $stand = $this->Stands->newEmptyEntity();
        if ($this->request->is('post')) {
            $stand = $this->Stands->patchEntity($stand, $this->request->getData());
            $file = $this->request->getData('image_file');
            if ($file && $file->getError() === UPLOAD_ERR_OK) {
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $ext = strtolower(pathinfo($file->getClientFilename(), PATHINFO_EXTENSION));

                if (!in_array($ext, $allowedExtensions)) {
                    $this->Flash->error('Format d\'image non valide. Veuillez télécharger un fichier JPG, JPEG, PNG ou GIF.');
                    return $this->redirect(['action' => 'add']);
                }

                $imageName = time() . '_' . $file->getClientFilename();
                $uploadPath = WWW_ROOT . 'img/stands/' . $imageName;
                
                if (!is_dir(WWW_ROOT . 'img/stands/')) {
                    mkdir(WWW_ROOT . 'img/stands/', 0775, true);
                }

                $file->moveTo($uploadPath);
                $stand->image = 'stands/' . $imageName;
            }

            if ($this->Stands->save($stand)) {
                $this->Flash->success('Stand enregistré avec succès.');
                return $this->redirect(['controller' => 'StandGet', 'action' => 'view', $stand->id]);
            } else {
                debug($stand);
                debug($stand->getErrors()); // Affiche les erreurs de validation
                exit; // Stoppe l'exécution pour voir les erreurs
            }
        }

        $this->set(compact('stand'));
    }
}