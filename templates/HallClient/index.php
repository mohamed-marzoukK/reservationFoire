<h1>Vue des Halls</h1>
<p><strong>Nombre de halls :</strong> <?= h($admin->nb_hall) ?></p>

<div class="hall-container">
    <img id="hall-image" src="<?= $this->Url->build('/img/' . h($admin->image)) ?>" alt="Plan" width="800" height="500">
    
    <?php 
    $hallsData = [];
    foreach ($admin->halls as $hall) {
        $hallsData[$hall->id] = $hall;
    }

    for ($i = 1; $i <= $admin->nb_hall; $i++): 
        $hall = isset($hallsData[$i]) ? $hallsData[$i] : null;
        $xPercent = $hall && !empty($hall->x_percent) ? $hall->x_percent : 0;
        $yPercent = $hall && !empty($hall->y_percent) ? $hall->y_percent : 0;
        $widthPercent = $hall && !empty($hall->width_percent) ? $hall->width_percent : 12.5;
        $heightPercent = $hall && !empty($hall->height_percent) ? $hall->height_percent : 12;
        $rotation = $hall && !empty($hall->rotation_degrees) ? $hall->rotation_degrees : 0;
    ?>
        <div 
            id="hall-<?= $i ?>" 
            class="hall" 
            style="
                left: <?= $xPercent ?>%;
                top: <?= $yPercent ?>%;
                width: <?= $widthPercent ?>%;
                height: <?= $heightPercent ?>%;
                transform: rotate(<?= $rotation ?>deg);
            "
        >
            <a href="<?= $this->Url->build(['controller' => 'StandGet', 'action' => 'view', $i]) ?>">قاعة <?= $i ?></a>
        </div>
    <?php endfor; ?>
</div>

<style>
    .hall-container {
        position: relative;
        width: 800px;
        height: 500px;
        border: 1px solid #ccc;
    }

    .hall {
        position: absolute;
        background: gray;
        color: white;
        text-align: center;
        line-height: 60px;
        user-select: none;
        transform-origin: center;
        border: 2px solid purple;
    }
</style>