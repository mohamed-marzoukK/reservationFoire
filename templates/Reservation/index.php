<h1>تسجيل الحجز</h1>
<?= $this->Flash->render() ?>

<?= $this->Form->create($reservation, ['type' => 'file']) ?>
    <div class="form-group">
        <?= $this->Form->control('institution_name', [
            'label' => 'إسم المؤسسة',
            'class' => 'form-control',
            'required' => true
        ]) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('institution_nationality', [
            'label' => 'جنسية المؤسسة',
            'class' => 'form-control',
            'required' => true
        ]) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('agent_name', [
            'label' => 'إسم الوكيل',
            'class' => 'form-control',
            'required' => true
        ]) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('contact_person', [
            'label' => 'الشخص المختص للإتصال',
            'class' => 'form-control',
            'required' => true
        ]) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('position', [
            'label' => 'الصفة',
            'class' => 'form-control',
            'required' => true
        ]) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('address', [
            'label' => 'العنوان',
            'type' => 'textarea',
            'class' => 'form-control',
            'required' => true
        ]) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('country', [
            'label' => 'الدولة',
            'class' => 'form-control',
            'required' => true
        ]) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('city', [
            'label' => 'المدينة',
            'class' => 'form-control',
            'required' => true
        ]) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('phone', [
            'label' => 'الهاتف',
            'type' => 'tel',
            'class' => 'form-control',
            'required' => true
        ]) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('email', [
            'label' => 'البريد الالكتروني',
            'type' => 'email',
            'class' => 'form-control',
            'required' => true
        ]) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('website', [
            'label' => 'الموقع الإلكتروني',
            'type' => 'url',
            'class' => 'form-control',
            'required' => false
        ]) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('participation_type', [
            'label' => 'نوع المشاركة',
            'type' => 'radio',
            'options' => [
                'راعي' => 'راعي',
                'عارض' => 'عارض'
            ],
            'class' => 'form-check-input',
            'required' => true
        ]) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->control('logo_file', [
            'label' => 'تحميل شعار الشركة (PNG ou PDF)',
            'type' => 'file',
            'accept' => '.png,.pdf',
            'class' => 'form-control-file',
            'required' => false
        ]) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->button('تسجيل', ['class' => 'btn btn-primary']) ?>
    </div>
<?= $this->Form->end() ?>

<style>
    .form-group {
        margin-bottom: 15px;
    }
    .form-control, .form-control-file {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .form-check-input {
        margin-right: 10px;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 10px 20px;
        color: white;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>