<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\BadRequestException;

class ReservationController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Reservations = $this->fetchTable('Reservations');
    }

    public function index()
    {
        $reservation = $this->Reservations->newEmptyEntity();

        if ($this->request->is('post')) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->getData());

            // Gérer le téléchargement du fichier logo
            $file = $this->request->getData('logo_file');
            if ($file && $file->getError() === UPLOAD_ERR_OK) {
                $allowedExtensions = ['png', 'pdf'];
                $ext = strtolower(pathinfo($file->getClientFilename(), PATHINFO_EXTENSION));

                if (!in_array($ext, $allowedExtensions)) {
                    $this->Flash->error('Format de fichier non valide. Veuillez télécharger un fichier PNG ou PDF.');
                    $this->set(compact('reservation'));
                    return;
                }

                $fileName = time() . '_' . $file->getClientFilename();
                $uploadPath = WWW_ROOT . 'uploads/logos/' . $fileName;

                if (!is_dir(WWW_ROOT . 'uploads/logos/')) {
                    mkdir(WWW_ROOT . 'uploads/logos/', 0775, true);
                }

                $file->moveTo($uploadPath);
                $reservation->logo_path = 'uploads/logos/' . $fileName;
            }

            // Sauvegarder les données
            if ($this->Reservations->save($reservation)) {
                $this->Flash->success('Réservation enregistrée avec succès.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Erreur lors de l\'enregistrement de la réservation. Veuillez réessayer.');
                debug($reservation->getErrors()); // Affiche les erreurs de validation
            }
        }

        $this->set(compact('reservation'));
    }
}