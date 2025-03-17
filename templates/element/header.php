<nav class="header">
    <div class="header-content">
        <h1><?= $this->Html->link('Mon Site', ['controller' => 'Pages', 'action' => 'display', 'home']) ?></h1>
        <ul class="nav-links">
            <li><?= $this->Html->link('Accueil', ['controller' => 'Pages', 'action' => 'display', 'home']) ?></li>
            <li><?= $this->Html->link('À propos', ['controller' => 'Pages', 'action' => 'display', 'about']) ?></li>
            <li><?= $this->Html->link('Contact', ['controller' => 'Pages', 'action' => 'display', 'contact']) ?></li>
        </ul>
    </div>
</nav>