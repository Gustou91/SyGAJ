<div class="box box-info">
<div class="box-body">

	<div class="form">
	<?= $this->Form->create($membre) ?>
	    <fieldset>
	        <legend><?= __('Ajouter un membre') ?></legend>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
        		<?= $this->Form->input('mem_nom', array('label' => false, 'placeholder' => 'Nom', 'class' => 'form-control', 'type' => 'text')) ?>
	        </div>
	        <br>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
        		<?= $this->Form->input('mem_prenom', array('label' => false, 'placeholder' => 'Prénom', 'class' => 'form-control', 'type' => 'text')) ?>
	        </div>
	        <br>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        		<?= $this->Form->input('mem_datnaiss', 
        								array('label' => false, 
        									  'placeholder' => 'Né(e) le', 
        									  'class' => 'form-control', 
        									  'type' => 'text',
        									  'data-inputmask' => "'alias': 'dd/mm/yyyy'",
        									  'data-mask' => '')) ?>
	        </div>
	        <br>

	        <div class="input-group">
	        	<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
	        	<?= $this->Form->input('mem_mail', array('label' => false, 
	        											 'placeholder' => 'Email', 
	        											 'type' => 'email', 
	        											 'class' => 'form-control')) ?>
	        </div>
	        <br>

	        <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-tint"></i></span>
		        <?php $ceintures = array('BL' => 'Blanche', 
										'BJ' => 'Blanche/Jaune',
										'JA' => 'Jaune',
										'JO' => 'Jaune/Orange',
										'OR' => 'Orange',
										'OV' => 'Orange/Verte',
										'VE' => 'Verte',
										'BE' => 'Bleue',
										'MA' => 'Marron',
										'NO' => 'Noire');
		        echo $this->Form->select('mem_ceinture', $ceintures); ?>				
            </div>
	        <br>

	    </fieldset>
	<?= $this->Form->button(__('Ajouter')); ?>
	<?= $this->Form->end() ?>
	</div>

</div>
