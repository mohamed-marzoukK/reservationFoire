<?php
namespace App\View\Helper;

use Cake\View\Helper;

class IdentityHelper extends Helper
{
    public function user()
    {
        return $this->getView()->getRequest()->getAttribute('identity');
    }

    public function isLoggedIn(): bool
    {
        return $this->user() !== null;
    }

    public function get($field)
    {
        $identity = $this->user();
        return $identity ? $identity->get($field) : null;
    }
    
}