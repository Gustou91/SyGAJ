<section class="content">
	<div class="users form">
	<?= $this->Form->create($user) ?>
	    <fieldset>
	        <legend><?= __('Ajouter un utilisateur') ?></legend>
	        <div class="row">
	        	<div class="col-md-6">
	        		<?= $this->Form->input('username', array('label' => 'Identifiant', 'placeholder' => 'Identifiant')) ?>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-6">
		        <?= $this->Form->input('password', array('label' => 'Mot de passe', 'placeholder' => 'Mot de passe')) ?>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-6">
			        <?= $this->Form->input('role', [
	    		        'options' => ['user' => 'Utilisateur', 
	    		        			'admin' => 'Administrateur',
			    		        	'register_agent' => 'Agent en charge des inscriptions']
				        ]) ?>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-6">
		        <?= $this->Form->input('firstname', array('label' => 'Prénom', 'placeholder' => 'Prénom')) ?>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-6">
		        <?= $this->Form->input('lastname', array('label' => 'Nom', 'placeholder' => 'Nom')) ?>
	        	</div>
	        </div>
	    </fieldset>
	<?= $this->Form->button(__('Enregistrer')); ?>
	<?= $this->Form->end() ?>
	</div>
</section>
