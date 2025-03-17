<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;

class ZonesController extends AppController
{
    public function view($id)
    {
        $zone = $this->Zones->get($id);
        $this->set(compact('zone'));
    }

    public function save()
    {
        $this->autoRender = false;
        $this->request->allowMethod(['post']);

        try {
            $data = $this->request->getData();
            debug('Received data: ' . print_r($data, true));

            $data['x_percent'] = (float)$data['x_percent'];
            $data['y_percent'] = (float)$data['y_percent'];
            $data['width_percent'] = (float)$data['width_percent'];
            $data['height_percent'] = (float)$data['height_percent'];
            $data['rotation_degrees'] = (float)$data['rotation_degrees'];

            $zone = $this->Zones->newEntity();

            if (!empty($data['id'])) {
                try {
                    $zone = $this->Zones->get($data['id']);
                    debug('Existing zone fetched: ' . print_r($zone->toArray(), true));
                } catch (\Exception $e) {
                    debug('Error fetching zone: ' . $e->getMessage());
                    throw new \Exception('Invalid zone ID: ' . $data['id']);
                }
            }

            if (!isset($data['admin_id'])) {
                $data['admin_id'] = 1;
            }

            $zone = $this->Zones->patchEntity($zone, $data);
            debug('Patched entity: ' . print_r($zone->toArray(), true));

            if ($this->Zones->save($zone)) {
                debug('Zone saved successfully with ID: ' . $zone->id);
                $response = $this->response->withType('application/json');
                $response->getBody()->write(json_encode(['success' => true, 'id' => $zone->id]));
                return $response;
            } else {
                $errors = $zone->getErrors();
                debug('Validation errors: ' . print_r($errors, true));
                $response = $this->response->withType('application/json');
                $response->getBody()->write(json_encode(['success' => false, 'errors' => $errors]));
                return $response;
            }
        } catch (\Exception $e) {
            debug('Exception caught: ' . $e->getMessage());
            $response = $this->response->withType('application/json');
            $response->getBody()->write(json_encode(['success' => false, 'error' => 'Server error: ' . $e->getMessage()]));
            return $response;
        }
    }

    public function getData()
    {
        $this->autoRender = false;
        debug('Fetching all zones'); // Add debug log
        $zones = $this->Zones->find('all')->toArray();
        debug('Fetched zones: ' . print_r($zones, true)); // Log the data

        $response = $this->response->withType('application/json');
        $response->getBody()->write(json_encode($zones));
        return $response;
    }
}