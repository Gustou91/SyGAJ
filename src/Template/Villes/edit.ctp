<div class="box box-info">
<?= $this->Html->css('sygaj_theme');?>
<div class="box-body">

	<div class="form">
	<?= $this->Form->create($ville) ?>
	    <fieldset>
	        <legend><?= __('Ajouter une ville') ?></legend>
   	    	<div class="row">
		        <div class="input-group col-md-2">
	                <span class="input-group-addon"><i><?= $this->Form->checkbox('vil_active'); ?></i></span>
	        		<?= $this->Form->input('vil_cp', array('label' => false, 'placeholder' => 'Code postal', 'class' => 'form-control', 'type' => 'text')) ?>
		        </div>	        
		        <div class="input-group col-md-9">
	                <span class="input-group-addon"><i class="fa fa-building"></i></span>
	        		<?= $this->Form->input('vil_nom', array('label' => false, 'placeholder' => 'Nom de la ville', 'class' => 'form-control', 'type' => 'text')) ?>
		        </div>
	        </div>
	    </fieldset>
	<?= $this->Form->button(__('Enregistrer')); ?>
	<?= $this->Form->end() ?>
	</div>

</div>

