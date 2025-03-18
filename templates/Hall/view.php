<h1>إدارة القاعة</h1>
<p><strong>عدد القاعات :</strong> <?= h($admin->nb_hall) ?></p>

<div class="hall-container">
    <img id="hall-image" src="<?= $this->Url->build('/img/' . $admin->image) ?>" alt="Plan" width="800" height="500">
    
   
    <?php for ($i = 1; $i <= $admin->nb_hall; $i++): ?>
        <div id="hall-<?= $i ?>" class="draggable" data-x="0" data-y="0" data-angle="0">
               <a href="<?= $this->Url->build(['controller' => 'Stands', 'action' => 'add', $i]) ?>">قاعة <?= $i ?></a>     <!-- Poignées de redimensionnement -->
            <div class="resize-handle top-left" data-handle="tl"></div>
            <div class="resize-handle top-right" data-handle="tr"></div>
            <div class="resize-handle bottom-left" data-handle="bl"></div>
            <div class="resize-handle bottom-right" data-handle="br"></div>

            <!-- Poignée de rotation -->
            <div class="rotate-handle"></div>
            

        </div>
        
    <?php endfor; ?>
    <div class="save-controls">
    <button id="saveAllButton" class="btn-save">💾 حفظ كافة المواقف</button>
    <span id="saveStatus" class="status-message"></span>
</div></div>

<style>
    .hall-container {
        position: relative;
        width: 800px;
        height: 500px;
        border: 1px solid #ccc;
    }

    .draggable {
        width: 100px;
        height: 60px;
        position: absolute;
        background: gray;
        color: white;
        text-align: center;
        line-height: 60px;
        user-select: none;
        transform-origin: center;
        border: 2px solid purple;
    }

    .resize-handle, .rotate-handle {
        width: 10px;
        height: 10px;
        background: white;
        border: 1px solid black;
        position: absolute;
        border-radius: 50%;
        cursor: grab;
    }

    .resize-handle.top-left { top: -5px; left: -5px; }
    .resize-handle.top-right { top: -5px; right: -5px; }
    .resize-handle.bottom-left { bottom: -5px; left: -5px; }
    .resize-handle.bottom-right { bottom: -5px; right: -5px; }

    .rotate-handle {
        top: -20px;
        left: 50%;
        transform: translateX(-50%);
        cursor: grab;
    }
</style>



<!-- ... Votre code HTML existant ... -->

<script>
// Déclaration correcte des variables
const container = document.querySelector('.hall-container');
const imgElement = document.getElementById('hall-image');
let draggables; // Déclaration globale
document.addEventListener('DOMContentLoaded', () => {
     draggables = document.querySelectorAll('.draggable');
    
    const getRotation = (element) => {
        const style = window.getComputedStyle(element);
        const matrix = new DOMMatrix(style.transform);
        return Math.round(Math.atan2(matrix.b, matrix.a) * (180 / Math.PI));
    };

    const getComputedTransform = (element) => {
        const style = window.getComputedStyle(element);
        const matrix = new DOMMatrix(style.transform);
        return { x: matrix.m41, y: matrix.m42 };
    };

    draggables.forEach(draggable => {
        let currentAction = null;
        let initialX, initialY, initialMouseX, initialMouseY, initialAngle, initialWidth, initialHeight, handleType;

        const handleMouseDown = (e, element) => {
            e.preventDefault();
            const handle = e.target;
            const transform = getComputedTransform(element);
            
            if (handle.classList.contains('resize-handle')) {
                currentAction = 'resize';
                handleType = handle.dataset.handle;
                initialWidth = parseFloat(getComputedStyle(element).width);
                initialHeight = parseFloat(getComputedStyle(element).height);
                initialX = transform.x;
                initialY = transform.y;
                initialAngle = getRotation(element);
            } else if (handle.classList.contains('rotate-handle')) {
                currentAction = 'rotate';
                const rect = element.getBoundingClientRect();
                const centerX = rect.left + rect.width / 2;
                const centerY = rect.top + rect.height / 2;
                let startAngle = Math.atan2(e.clientY - centerY, e.clientX - centerX);
                let previousAngle = startAngle;
                let cumulativeDelta = 0;
                initialAngle = getRotation(element);
                initialX = transform.x;
                initialY = transform.y;

                const onMouseMove = (e) => {
                    const rect = element.getBoundingClientRect();
                    const centerX = rect.left + rect.width / 2;
                    const centerY = rect.top + rect.height / 2;
                    const currentAngle = Math.atan2(e.clientY - centerY, e.clientX - centerX);
                    
                    // Calcul du delta d'angle
                    let delta = currentAngle - previousAngle;
                    
                    // Ajustement pour les angles circulaires
                    delta = ((delta % (2 * Math.PI)) + 3 * Math.PI) % (2 * Math.PI) - Math.PI;
                    
                    cumulativeDelta += delta;
                    const degrees = cumulativeDelta * (180 / Math.PI);
                    
                    element.style.transform = `translate(${initialX}px, ${initialY}px) rotate(${initialAngle + degrees}deg)`;
                    previousAngle = currentAngle;
                };

                const onMouseUp = () => {
                    document.removeEventListener('mousemove', onMouseMove);
                    document.removeEventListener('mouseup', onMouseUp);
                    currentAction = null;
                };

                document.addEventListener('mousemove', onMouseMove);
                document.addEventListener('mouseup', onMouseUp);

            } else {
                currentAction = 'drag';
                initialX = transform.x;
                initialY = transform.y;
            }
            
            initialMouseX = e.clientX;
            initialMouseY = e.clientY;

            document.addEventListener('mousemove', onMouseMove);
            document.addEventListener('mouseup', onMouseUp);
        };

        const onMouseMove = (e) => {
            if (currentAction === 'drag') {
                const dx = e.clientX - initialMouseX;
                const dy = e.clientY - initialMouseY;
                draggable.style.transform = `translate(${initialX + dx}px, ${initialY + dy}px) rotate(${getRotation(draggable)}deg)`;
            } 
            else if (currentAction === 'resize') {
                const dx = e.clientX - initialMouseX;
                const dy = e.clientY - initialMouseY;
                const angle = initialAngle * Math.PI / 180;
                const localDx = dx * Math.cos(angle) + dy * Math.sin(angle);
                const localDy = -dx * Math.sin(angle) + dy * Math.cos(angle);

                let newWidth = initialWidth;
                let newHeight = initialHeight;
                let newX = initialX;
                let newY = initialY;

                switch(handleType) {
                    case 'br':
                        newWidth = Math.max(50, initialWidth + localDx);
                        newHeight = Math.max(30, initialHeight + localDy);
                        break;
                    case 'tr':
                        newWidth = Math.max(50, initialWidth + localDx);
                        newHeight = Math.max(30, initialHeight - localDy);
                        newY = initialY + localDy;
                        break;
                    case 'bl':
                        newWidth = Math.max(50, initialWidth - localDx);
                        newHeight = Math.max(30, initialHeight + localDy);
                        newX = initialX + localDx;
                        break;
                    case 'tl':
                        newWidth = Math.max(50, initialWidth - localDx);
                        newHeight = Math.max(30, initialHeight - localDy);
                        newX = initialX + localDx;
                        newY = initialY + localDy;
                        break;
                }

                draggable.style.width = `${newWidth}px`;
                draggable.style.height = `${newHeight}px`;
                draggable.style.transform = `translate(${newX}px, ${newY}px) rotate(${initialAngle}deg)`;
                 // Enregistrement des données après chaque modification
                 saveData(draggable);
            }
        };

        const onMouseUp = () => {
            document.removeEventListener('mousemove', onMouseMove);
            document.removeEventListener('mouseup', onMouseUp);
            currentAction = null;
        };

        draggable.querySelectorAll('.resize-handle, .rotate-handle').forEach(handle => {
            handle.addEventListener('mousedown', (e) => {
                e.stopPropagation();
                handleMouseDown(e, draggable);
            });
        });

        draggable.addEventListener('mousedown', (e) => {
            if (!e.target.classList.contains('resize-handle') && !e.target.classList.contains('rotate-handle')) {
                handleMouseDown(e, draggable);
            }
        });
    });

    

    const container = document.querySelector('.hall-container');
const imgElement = document.getElementById('hall-image');

const getPercentagePosition = (element) => {
    const imgRect = imgElement.getBoundingClientRect();
    const elementRect = element.getBoundingClientRect();
    
    // Position relative à l'image
    const x = (elementRect.left - imgRect.left) / imgRect.width * 100;
    const y = (elementRect.top - imgRect.top) / imgRect.height * 100;
    
    return {
        x: x.toFixed(2),
        y: y.toFixed(2),
        width: (element.offsetWidth / imgRect.width * 100).toFixed(2),
        height: (element.offsetHeight / imgRect.height * 100).toFixed(2),
        rotation: getRotation(element)
    };
};


const saveAllPositions = async () => {
        const statusElement = document.getElementById('saveStatus');
        statusElement.textContent = 'Sauvegarde en cours...';
        
        try {
            const saves = Array.from(draggables).map(hall => {
                const data = getPercentagePosition(hall);
                const hallId = hall.id.split('-')[1];
                
                return fetch('/hall/save-position', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': '<?= $this->request->getAttribute('csrfToken') ?>'
                    },
                    body: JSON.stringify({
                        id: hallId,
                        admin_id: <?= $admin->id ?>,
                        x_percent: data.x,
                        y_percent: data.y,
                        width_percent: data.width,
                        height_percent: data.height,
                        rotation_degrees: data.rotation
                    })
                });
            });

            await Promise.all(saves);
            statusElement.textContent = '✓ Toutes les positions sont sauvegardées !';
            setTimeout(() => statusElement.textContent = '', 3000);
        } catch (error) {
            console.error('Erreur de sauvegarde:', error);
            statusElement.textContent = '❌ Erreur lors de la sauvegarde !';
        }
    };

    // Ajouter le listener ICI
    document.getElementById('saveAllButton').addEventListener('click', saveAllPositions);
});

// Déplacer les fonctions hors de l'event listener DOMContentLoaded
const getPercentagePosition = (element) => {
    const imgRect = imgElement.getBoundingClientRect();
    const elementRect = element.getBoundingClientRect();
    
    const x = (elementRect.left - imgRect.left) / imgRect.width * 100;
    const y = (elementRect.top - imgRect.top) / imgRect.height * 100;
    
    return {
        x: x.toFixed(2),
        y: y.toFixed(2),
        width: (element.offsetWidth / imgRect.width * 100).toFixed(2),
        height: (element.offsetHeight / imgRect.height * 100).toFixed(2),
        rotation: getRotation(element)
    };
};

const getRotation = (element) => {
    const style = window.getComputedStyle(element);
    const matrix = new DOMMatrix(style.transform);
    return Math.round(Math.atan2(matrix.b, matrix.a) * (180 / Math.PI));
};


</script>

</body>
</html>

 