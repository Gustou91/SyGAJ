<div class="box box-info">
<div class="box-body">

	<div class="form">
	<?= $this->Form->create($cours) ?>
	    <fieldset>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
        		<?= $this->Form->input('cou_nom', array('label' => false, 'placeholder' => 'Nom du cours', 'class' => 'form-control', 'type' => 'text')) ?>
	        </div>
	        <br>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-comment-o"></i></span>
        		<?= $this->Form->input('cou_description', array('label' => false, 'placeholder' => 'Description (age concerné)', 'class' => 'form-control', 'type' => 'text')) ?>
	        </div>
	        <br>
	    </fieldset>
	<?= $this->Form->button(__('Enregistrer')); ?>
	<?= $this->Form->end() ?>
	</div>

</div>

