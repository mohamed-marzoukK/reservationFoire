
<nav class="header">
    <div class="header-content">
        <h1><?= $this->Html->link('حجز المعرض', ['controller' => 'Pages', 'action' => 'display', 'home']) ?></h1>
        <ul class="nav-links">
            <li><?= $this->Html->link('الصفحة الرئيسية', ['controller' => 'Pages', 'action' => 'display', 'home']) ?></li>
            <li><?= $this->Html->link('من نحن', ['controller' => 'Pages', 'action' => 'display', 'about']) ?></li>
            <li><?= $this->Html->link('للمشاركة', ['controller' => 'Pages', 'action' => 'display', 'contact']) ?></li>
            <li><?= $this->Html->link('للحجز', ['controller' => 'Pages', 'action' => 'display', 'contact']) ?></li>
            <li><?= $this->Html->link('اتصل بنا', ['controller' => 'Pages', 'action' => 'display', 'contact']) ?></li>
            <?= $this->Html->link('العربية', ['controller' => 'Pages', 'action' => 'changeLanguage', 'ar']) ?>
<?= $this->Html->link('English', ['controller' => 'Pages', 'action' => 'changeLanguage', 'en']) ?>
        </ul>
    </div>
</nav>