<div class="box box-info">
<div class="box-body">

	<div class="form">
	<?= $this->Form->create($saison) ?>
	    <fieldset>
	        <legend><?= __('Ajouter une saison') ?></legend>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-road"></i></span>
        		<?= $this->Form->input('sai_nom', array('label' => false, 'placeholder' => 'Nom de la saison (2017-2018)', 'class' => 'form-control', 'type' => 'text')) ?>
	        </div>
	        <br>
	    </fieldset>
	<?= $this->Form->button(__('Ajouter')); ?>
	<?= $this->Form->end() ?>
	</div>

</div>

