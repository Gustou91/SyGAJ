<section class="content">
	<div class="users form-inline">
        <div class="col-xs-6">
			<?= $this->Form->create($user) ?>
			    <fieldset>
			        <legend><?= __('Ajouter un utilisateur') ?></legend>
			        <div class="row">
			        	<div class="col-xs-3">
			        		<?= $this->Form->label('Identifiant', null) ?>
			        	</div>
			        	<div class="col-xs-9">
			        		<?= $this->Form->input('username', array('label' => '', 'placeholder' => 'Identifiant')) ?>
			        	</div>
			        </div>
			        <div class="row">
			        	<div class="col-xs-3">
			        		<?= $this->Form->label('Mot de passe', null) ?>
			        	</div>
			        	<div class="col-xs-9">
			        		<?= $this->Form->input('password', array('label' => '', 'placeholder' => 'Mot de passe')) ?>
			        	</div>
			        </div>
			        <div class="row">
			        	<div class="col-xs-3">
			        		<?= $this->Form->label('Rôle', null) ?>
			        	</div>
			        	<div class="col-xs-9">
					        <?= $this->Form->input('role', array('label' => '',
			    		        'options' => ['user' => 'Utilisateur', 'admin' => 'Administrateur']
						        )) ?>
			        	</div>
			        </div>
			        <div class="row">
			        	<div class="col-xs-3">
			        		<?= $this->Form->label('Prénom', null) ?>
			        	</div>
			        	<div class="col-xs-9">
			        		<?= $this->Form->input('firstname', array('label' => '', 'placeholder' => 'Prénom')) ?>
			        	</div>
			        </div>
			        <div class="row">
			        	<div class="col-xs-3">
			        		<?= $this->Form->label('Nom', null) ?>
			        	</div>
			        	<div class="col-xs-9">
			        		<?= $this->Form->input('lastname', array('label' => '', 'placeholder' => 'Nom')) ?>
			        	</div>
			        </div>
			    </fieldset>
			<?= $this->Form->button(__('Ajouter')); ?>
			<?= $this->Form->end() ?>
        </div>
	</div>
</section>
