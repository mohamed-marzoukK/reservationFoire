<?php
use App\View\Helper\IdentityHelper;

// Instantiate the IdentityHelper
$identity = new IdentityHelper($this);

// Check if the user is logged in and has an 'admin' role
$isLoggedIn = $identity->isLoggedIn();
$isAdmin = $isLoggedIn && $identity->get('role') === 'admin'; // Assuming 'role' is the field in your users table

// Check if the current page is the login page
$currentController = $this->request->getParam('controller');
$currentAction = $this->request->getParam('action');
$isLoginPage = ($currentController === 'Users' && $currentAction === 'login');
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?= $this->Html->css([
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css',
        'normalize.min',
        'milligram.min',
        'fonts',
        'cake',
        'admin'
    ]) ?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body class="dashboard-admin">

    <!-- Header for non-admin users -->
    <?php if (!$isAdmin && !$isLoginPage): ?>
        <?php echo $this->element('header'); // Include header.php ?>
    <?php endif; ?>

    <!-- Admin Sidebar and Main Content -->
    <?php if ($isAdmin && !$isLoginPage): ?>
        <?php echo $this->element('admin_sidebar'); // Include admin_sidebar.php ?>
        <main class="dashboard-main">
            <div class="container-fluid">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </main>
    <?php endif; ?>

    <!-- Non-Admin Content (without sidebar) -->
    <?php if (!$isAdmin && !$isLoginPage): ?>
        <main class="main-content">
            <div class="container-fluid">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </main>
    <?php endif; ?>

    <!-- Login Page Content (no header/footer/sidebar) -->
    <?php if ($isLoginPage): ?>
        <main class="login-content">
            <div class="container-fluid">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </main>
    <?php endif; ?>

    <!-- Footer for non-admin users -->
    <?php if (!$isAdmin && !$isLoginPage): ?>
        <?php echo $this->element('footer'); // Include footer.php ?>
    <?php endif; ?>

</body>
</html>