<section class="content">
	<div class="users form">
	<?= $this->Flash->render() ?>
	<?= $this->Form->create() ?>
	    <fieldset>
	        <legend><?= __("Merci de saisir identifiant et mot de passe") ?></legend>
	        <div class="row">
		        <div class="col-md-6">
		        	<?= $this->Form->input('username', array('label' => 'Identifiant', 'placeholder' => 'Votre identifiant')) ?>
		        </div>
	        </div>
	        <div class="row">
		        <div class="col-md-6">
			        <?= $this->Form->input('password', array('label' => 'Mot de passe', 'placeholder' => 'Votre mot de passe')) ?>
		        </div>
	        </div>
	    </fieldset>
	<?= $this->Form->button(__('Se Connecter')); ?>
	<?= $this->Form->end() ?>
	</div>
</section>