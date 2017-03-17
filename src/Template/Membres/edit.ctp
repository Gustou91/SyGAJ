<div class="box box-info">
<div class="box-header with-border">
  <h3 class="box-title">Ajout d'un membre</h3>
</div>
<div class="box-body">

	<div class="form">
	<?= $this->Form->create($membre) ?>
	    <fieldset>
	        <legend><?= __('Ajouter un membre') ?></legend>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
        		<?= $this->Form->input('mem_nom', array('label' => 'Nom', 'placeholder' => 'Nom', 'class' => 'form-control', 'type' => 'text')) ?>
	        </div>
	        <br>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
        		<?= $this->Form->input('mem_prenom', array('label' => 'Prénom', 'placeholder' => 'Prénom', 'class' => 'form-control', 'type' => 'text')) ?>
	        </div>
	        <br>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
        		<?= $this->Form->input('mem_datnaiss', array('label' => 'Né(e) le', 'placeholder' => 'Date de naissance', 'class' => 'form-control', 'type' => 'text')) ?>
	        </div>
	        <br>

	        <div class="input-group">
				<select class="form-control select2" style="width: 100%;">
			        <?= $this->Form->input('mem_ceinture', 'class' => 'form-control select2', 'style' => 'width: 100%;', [
	    		        'options' => ['BL' => 'Blanche', 
	    		        			  'BJ' => 'Blanche/Jaune',
	    		        			  'JA' => 'Jaune',
	    		        			  'JO' => 'Jaune/Orange',
	    		        			  'OR' => 'Orange',
	    		        			  'OV' => 'Orange/Verte',
	    		        			  'VE' => 'Verte',
	    		        			  'BL' => 'Bleue',
	    		        			  'MA' => 'Marron',
	    		        			  'NO' => 'Noire',
	    		        			  'admin' => 'Administrateur']
				        ]) ?>
				</select>
            </div>

	        <div class="input-group">
	        	<div class="form-group">
		        <?= $this->Form->input('mem_mail', array('label' => 'Adresse électronique', 'placeholder' => 'Mail', 'type' => 'email')) ?>
	        	</div>
	        </div>
	    </fieldset>
	<?= $this->Form->button(__('Ajouter')); ?>
	<?= $this->Form->end() ?>
	</div>

</div>
