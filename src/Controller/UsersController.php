<?php
declare(strict_types=1);
namespace App\Controller;

use App\Controller\AppController;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Log\Log;

class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login', 'add', 'logout']);
    }

    public function login()
{
    $this->request->allowMethod(['get', 'post']);

    if ($this->request->is('post')) {
        $email = trim($this->request->getData('email')); // Supprimer espaces
        $password = trim($this->request->getData('password')); // Supprimer espaces

        Log::write('debug', 'Submitted Email: ' . ($email ?? 'null'));
        Log::write('debug', 'Submitted Password: ' . ($password ?? 'null'));

        if (!$email || !$password) {
            $this->Flash->error(__('Email ou mot de passe manquant.'));
            return;
        }

        $user = $this->Users->find()
            ->where(['email' => $email])
            ->first();

        Log::write('debug', 'User Found: ' . ($user ? print_r($user->toArray(), true) : 'null'));

        if ($user && $password) {
            $hasher = new DefaultPasswordHasher();
            $passwordMatch = $hasher->check($password, $user->password);
            Log::write('debug', 'Password Match: ' . ($passwordMatch ? 'true' : 'false'));
            Log::write('debug', 'Stored Hashed Password: ' . $user->password);
            Log::write('debug', 'Submitted Plain Password: ' . $password);

            if ($passwordMatch) {
                $this->Authentication->setIdentity($user);
                Log::write('debug', 'User authenticated: ' . print_r($user->toArray(), true));
                if ($user->role === 'admin') {
                    return $this->redirect(['controller' => 'Admin', 'action' => 'add']);
                } else if ($user->role === 'user') {
                    return $this->redirect(['controller' => 'HallClient', 'action' => 'index']);
                } else {
                    $this->Flash->error(__('Rôle non reconnu.'));
                }
            } else {
                $this->Flash->error(__('Invalid username or password'));
            }
        } else {
            $this->Flash->error(__('Invalid username or password'));
        }
    }
}

    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            Log::write('debug', 'Raw Form Data: ' . print_r($data, true));
            $user = $this->Users->patchEntity($user, $data);
            // Ne pas hacher ici si beforeSave le fait déjà
            Log::write('debug', 'Password before save: ' . $user->password);
    
            if (empty($user->role)) {
                $user->role = 'user';
            }
    
            if ($this->Users->save($user)) {
                Log::write('debug', 'User saved with ID: ' . $user->id);
                $this->Flash->success(__('Votre compte a été créé avec succès. Veuillez vous connecter.'));
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('Erreur lors de la création du compte. Veuillez réessayer.'));
                Log::write('debug', 'Erreur de sauvegarde : ' . print_r($user->getErrors(), true));
            }
        }
    
        $this->set(compact('user'));
    }
}