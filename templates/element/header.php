
<nav class="header">
    <div class="header-content">
        <h1><?= $this->Html->link('حجز المعرض', ['controller' => 'Pages', 'action' => 'display', 'home']) ?></h1>
        <ul class="nav-links">
            <li><?= $this->Html->link('الصفحة الرئيسية', ['controller' => 'HallClient', 'action' =>  'index']) ?></li>
            <li><?= $this->Html->link('من نحن', ['controller' => 'Pages', 'action' => 'display', 'about']) ?></li>
            <li><?= $this->Html->link('للمشاركة', ['controller' => 'Pages', 'action' => 'display', 'contact']) ?></li>
            <li><?= $this->Html->link('للحجز', ['controller' => 'Pages', 'action' => 'display', 'contact']) ?></li>
            <li><?= $this->Html->link('اتصل بنا', ['controller' => 'Pages', 'action' => 'display', 'contact']) ?></li>
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
            <?= $this->Html->link('العربية', ['controller' => 'Pages', 'action' => 'changeLanguage', 'ar']) ?>
<?= $this->Html->link('English', ['controller' => 'Pages', 'action' => 'changeLanguage', 'en']) ?>
        </ul>
    </div>
</nav>