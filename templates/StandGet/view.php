<h1>إدارة القاعة</h1>
<?= $this->Flash->render() ?>

<?php if ($stand): ?>
    <p><strong>القاعة:</strong> <?= $stand->hall ? h($stand->hall->name) : 'غير محدد' ?></p>
    <p><strong>عدد القاعات:</strong> <?= h($stand->number_of_stands) ?></p>
    <div class="hall-container">
        <img id="hall-image" src="<?= $this->Url->build('/img/' . h($stand->image) . '?v=' . time()) ?>" alt="Plan">
        <div id="drag-drop-area" class="drag-drop-area">
            <?php for ($i = 1; $i <= $stand->number_of_stands; $i++): ?>
                <?php
                $x = isset($positions[$i]) ? $positions[$i]->x : 10;
                $y = isset($positions[$i]) ? $positions[$i]->y : ($i - 1) * 60;
                $name = isset($positions[$i]) && $positions[$i]->name ? h($positions[$i]->name) : 'Stand ' . $i;
                $size = isset($positions[$i]) && $positions[$i]->size ? h($positions[$i]->size) : '';
                ?>
                <button
                    class="draggable-button"
                    draggable="true"
                    id="stand-<?= $i ?>"
                    data-stand-id="<?= $stand->id ?>"
                    data-stand-number="<?= $i ?>"
                    style="left: <?= $x ?>px; top: <?= $y ?>px;"
                    onclick="window.location.href='<?= $this->Url->build(['controller' => 'Reservation', 'action' => 'index', $stand->hall_id]) ?>'"
                >
                    <?= $name ?>
                </button>
            <?php endfor; ?>
        </div>
    </div>

    <!-- Popup pour saisir le nom et la taille du stand -->
    <div id="stand-popup" class="popup">
        <div class="popup-content">
            <span class="close-popup">×</span>
            <h2>Modifier le Stand</h2>
            <form id="stand-form">
                <input type="hidden" id="popup-stand-id" name="stand_id">
                <input type="hidden" id="popup-stand-number" name="stand_number">
                <input type="hidden" id="popup-x" name="x">
                <input type="hidden" id="popup-y" name="y">
                <div>
                    <label for="popup-name">Nom du Stand :</label>
                    <input type="text" id="popup-name" name="name" required>
                </div>
                <div>
                    <label for="popup-size">Taille du Stand :</label>
                    <input type="text" id="popup-size" name="size" placeholder="Ex: 10m²" required>
                </div>
                <button type="submit">Enregistrer</button>
            </form>
        </div>
    </div>
<?php else: ?>
    <p>القاعة غير موجودة.</p>
<?php endif; ?>

<style>
    .hall-container {
        position: relative;
        border: 1px solid #ccc;
        margin: 20px 0;
    }
    .hall-container img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .drag-drop-area {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.1);
    }
    .draggable-button {
        position: absolute;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: move;
        user-select: none;
        z-index: 10;
    }
    .draggable-button:hover {
        background-color: #0056b3;
    }

    /* Styles pour le popup */
    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 100;
    }
    .popup-content {
        background: white;
        width: 300px;
        margin: 100px auto;
        padding: 20px;
        border-radius: 5px;
        position: relative;
    }
    .close-popup {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }
    .popup-content h2 {
        margin-top: 0;
    }
    .popup-content form div {
        margin-bottom: 15px;
    }
    .popup-content label {
        display: block;
        margin-bottom: 5px;
    }
    .popup-content input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }
    .popup-content button {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .popup-content button:hover {
        background-color: #0056b3;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const dragDropArea = document.getElementById('drag-drop-area');
        const draggableButtons = document.querySelectorAll('.draggable-button');
        const popup = document.getElementById('stand-popup');
        const closePopup = document.querySelector('.close-popup');
        const standForm = document.getElementById('stand-form');
        const popupStandId = document.getElementById('popup-stand-id');
        const popupStandNumber = document.getElementById('popup-stand-number');
        const popupX = document.getElementById('popup-x');
        const popupY = document.getElementById('popup-y');
        const popupName = document.getElementById('popup-name');
        const popupSize = document.getElementById('popup-size');

        let currentButton = null;

        draggableButtons.forEach(button => {
            button.addEventListener('dragstart', (e) => {
                e.dataTransfer.setData('text/plain', button.id);
                button.style.opacity = '0.5';
            });

            button.addEventListener('dragend', (e) => {
                button.style.opacity = '1';
            });
        });

        dragDropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
        });

        dragDropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            const buttonId = e.dataTransfer.getData('text/plain');
            const button = document.getElementById(buttonId);

            const rect = dragDropArea.getBoundingClientRect();
            const x = e.clientX - rect.left - (button.offsetWidth / 2);
            const y = e.clientY - rect.top - (button.offsetHeight / 2);

            const maxX = rect.width - button.offsetWidth;
            const maxY = rect.height - button.offsetHeight;
            const newX = Math.max(0, Math.min(x, maxX));
            const newY = Math.max(0, Math.min(y, maxY));

            button.style.left = newX + 'px';
            button.style.top = newY + 'px';

            // Afficher le popup
            currentButton = button;
            popupStandId.value = button.getAttribute('data-stand-id');
            popupStandNumber.value = button.getAttribute('data-stand-number');
            popupX.value = newX;
            popupY.value = newY;
            popupName.value = button.textContent.trim();
            popupSize.value = button.getAttribute('data-size') || '';
            popup.style.display = 'block';
        });

        // Fermer le popup
        closePopup.addEventListener('click', () => {
            popup.style.display = 'none';
        });

        // Soumettre le formulaire du popup
        standForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const standId = popupStandId.value;
            const standNumber = popupStandNumber.value;
            const x = popupX.value;
            const y = popupY.value;
            const name = popupName.value;
            const size = popupSize.value;

            // Mettre à jour le texte du bouton
            if (currentButton) {
                currentButton.textContent = name;
                currentButton.setAttribute('data-size', size);
            }

            // Sauvegarder via AJAX
            fetch('<?= $this->Url->build(['controller' => 'StandGet', 'action' => 'savePosition']) ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': '<?= $this->request->getAttribute('csrfToken') ?>'
                },
                body: JSON.stringify({
                    stand_id: standId,
                    stand_number: standNumber,
                    x: x,
                    y: y,
                    name: name,
                    size: size
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    popup.style.display = 'none';
                } else {
                    alert('Erreur lors de la sauvegarde: ' + (data.message || 'Erreur inconnue'));
                }
            })
            .catch(error => {
                console.error('Erreur réseau:', error);
                alert('Erreur réseau lors de la sauvegarde.');
            });
        });
    });
</script>