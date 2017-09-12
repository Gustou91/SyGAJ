<div class="box box-info">
<div class="box-body">

	<div class="form">
	<?= $this->Form->create($challenge) ?>
	    <fieldset>
	        <legend><?= __('Ajouter un challenge') ?></legend>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
        		<?= $this->Form->input('cha_nom', array('label' => false, 'placeholder' => 'Nom du challenge', 'class' => 'form-control', 'type' => 'text')) ?>
	        </div>
	        <br>
	        <div class="input-group col-md-4">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        		<?= $this->Form->input('cha_date', [
        				  'label' => false, 
        				  'class' => 'form-control', 
        				  'type' => 'text',
        				  'data-inputmask' => "'alias': 'dd/mm/yyyy'",
        				  'data-mask' => '']); ?>		  
	        </div>       
	        <br>        
	    </fieldset>
	<?= $this->Form->button(__('Ajouter')); ?>
	<?= $this->Form->end() ?>
	</div>

</div>

