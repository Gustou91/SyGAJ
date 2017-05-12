<div class="box box-info">
<div class="box-body">

	<div class="form">
	<?= $this->Form->create($article) ?>
	    <fieldset>
	        <legend><?= __('Modifier un article') ?></legend>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-diamond"></i></span>
        		<?= $this->Form->input('art_nom', array('label' => false, 'placeholder' => "Désignation de l'article", 'class' => 'form-control', 'type' => 'text')) ?>
	        </div>
	        <br>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-comment-o"></i></span>
        		<?= $this->Form->input('art_description', array('label' => false, 'placeholder' => 'Description', 'class' => 'form-control', 'type' => 'text')) ?>
	        </div>
	        <br>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-eur"></i></span>
        		<?= $this->Form->input('art_prix', array('label' => false, 'placeholder' => 'Prix', 'class' => 'form-control', 'type' => 'number')) ?>
	        </div>
	        <br>
	    </fieldset>
	<?= $this->Form->button(__('Enregistrer')); ?>
	<?= $this->Form->end() ?>
	</div>

</div>

