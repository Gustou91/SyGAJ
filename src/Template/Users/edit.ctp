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
	    		        'options' => ['user' => 'Utilisateur', 'admin' => 'Administrateur']
				        ]) ?>
	        	</div>
	        </div>
	    </fieldset>
	<?= $this->Form->button(__('Ajouter')); ?>
	<?= $this->Form->end() ?>
	</div>
</section>
