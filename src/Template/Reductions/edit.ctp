<div class="box box-info">
<div class="box-body">

	<div class="form">
	<?= $this->Form->create($reduction) ?>
	    <fieldset>
	        <legend><?= __('Modifier une réduction') ?></legend>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-circle-down"></i></span>
        		<?= $this->Form->input('red_nom', array('label' => false, 'placeholder' => "Désignation de la réduction", 'class' => 'form-control', 'type' => 'text')) ?>
	        </div>
	        <br>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-comment-o"></i></span>
        		<?= $this->Form->input('red_description', array('label' => false, 'placeholder' => 'Description', 'class' => 'form-control', 'type' => 'text')) ?>
	        </div>
	        <br>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-eur"></i></span>
        		<?= $this->Form->input('red_montant', array('label' => false, 'placeholder' => 'Montant', 'class' => 'form-control', 'type' => 'number')) ?>
	        </div>
	        <br>
	    </fieldset>
	<?= $this->Form->button(__('Modifier')); ?>
	<?= $this->Form->end() ?>
	</div>

</div>

