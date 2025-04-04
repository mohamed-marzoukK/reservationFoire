<nav class="dashboard-sidebar">
    <div class="sidebar-header">
        <h3>Admin Panel</h3>
    </div>
    
    <ul class="sidebar-nav">
        <li><?= $this->Html->link('<i class="fas fa-tachometer-alt"></i> Dashboard', 
            ['controller' => 'Admin', 'action' => 'index'], 
            ['escape' => false]) ?></li>
            
        <li><?= $this->Html->link('<i class="fas fa-users"></i> Utilisateurs', 
            ['controller' => 'Admin', 'action' => 'index'], 
            ['escape' => false]) ?></li>
            
        <li><?= $this->Html->link('<i class="fas fa-cog"></i> gestion halls', 
            ['controller' => 'Hall', 'action' => 'view'], 
            ['escape' => false]) ?></li>
            
             <li>
                    <?php
                    use App\View\Helper\IdentityHelper; // Ensure this helper is loaded
                    $identity = new IdentityHelper($this); // Instantiate helper manually if not auto-loaded
                    if ($identity->isLoggedIn()): ?>
                        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>">Logout</a>
                    <?php else: ?>
                        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>">Login</a>
                    <?php endif; ?>
                </li>
    </ul>
</nav>