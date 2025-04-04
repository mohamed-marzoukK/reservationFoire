<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\Exception\RecordNotFoundException;

class StandGetController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->Stands = $this->fetchTable('Stands');
        $this->StandPositions = $this->fetchTable('StandPositions');
    }

    public function view($hallId = null)
    {
        $standTable = $this->fetchTable('Stands');

        if (!$hallId) {
            $this->Flash->error('Aucune salle spécifiée.');
            return $this->redirect(['controller' => 'Halls', 'action' => 'index']);
        }

        $stand = $standTable->find()
            ->where(['hall_id' => $hallId])
            ->contain(['Halls'])
            ->first();

        if (!$stand) {
            $this->Flash->info('Aucun Stand trouvé pour cette salle. Veuillez ajouter un Stand.');
            return $this->redirect(['controller' => 'Stands', 'action' => 'add', $hallId]);
        }

        if (empty($stand->image) || empty($stand->number_of_stands)) {
            $this->Flash->error('Image ou nombre de stands manquant. Veuillez ajouter ces informations.');
            return $this->redirect(['controller' => 'Stands', 'action' => 'add', $hallId]);
        }

      // Charger les positions des stands
$positionsQuery = $this->StandPositions->find()
->where(['stand_id' => $stand->id])
->toArray();

// Indexer manuellement par stand_number
$positions = [];
foreach ($positionsQuery as $position) {
$positions[$position->stand_number] = $position;
}

        // Si aucune position n'existe, initialiser des positions par défaut
        for ($i = 1; $i <= $stand->number_of_stands; $i++) {
            if (!isset($positions[$i])) {
                $position = $this->StandPositions->newEntity([
                    'stand_id' => $stand->id,
                    'stand_number' => $i,
                    'x' => 10,
                    'y' => ($i - 1) * 60,
                ]);
                $this->StandPositions->save($position);
                $positions[$i] = $position;
            }
        }

        $this->set(compact('stand', 'hallId', 'positions'));
    }

    public function savePosition()
    {
        $this->request->allowMethod(['post', 'ajax']);
        $this->autoRender = false; // Pas de rendu de vue, réponse JSON

        $data = $this->request->getData();
        $standId = $data['stand_id'] ?? null;
        $standNumber = $data['stand_number'] ?? null;
        $x = $data['x'] ?? null;
        $y = $data['y'] ?? null;
        $name = $data['name'] ?? null;
        $size = $data['size'] ?? null;

        if (!$standId || !$standNumber || $x === null || $y === null) {
            return $this->response->withType('application/json')
                ->withStatus(400)
                ->withStringBody(json_encode(['success' => false, 'message' => 'Données manquantes']));
        }

        // Trouver ou créer la position
        $position = $this->StandPositions->find()
            ->where(['stand_id' => $standId, 'stand_number' => $standNumber])
            ->first();

        if (!$position) {
            $position = $this->StandPositions->newEntity([
                'stand_id' => $standId,
                'stand_number' => $standNumber,
                'x' => $x,
                'y' => $y,
                'name' => $name,
                'size' => $size,
            ]);
        } else {
            $position = $this->StandPositions->patchEntity($position, [
                'x' => $x,
                'y' => $y,
                'name' => $name,
                'size' => $size,
            ]);
        }

        if ($this->StandPositions->save($position)) {
            return $this->response->withType('application/json')
                ->withStringBody(json_encode(['success' => true]));
        } else {
            return $this->response->withType('application/json')
                ->withStatus(500)
                ->withStringBody(json_encode(['success' => false, 'message' => 'Erreur lors de la sauvegarde']));
        }
    }
}