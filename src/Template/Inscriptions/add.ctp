<div class="box box-info">
<?= $this->Html->css('sygaj_theme');?>
<div class="box-body">

	<div class="form">
	<?= $this->Form->create($inscription) ?>
	    <fieldset>
	        <legend><?= __('Inscrire un membre') ?></legend>

	    	<div class="row">

       	        <div class="input-group col-md-4">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
			        <?php echo $this->Form->select('ins_idmembre', $membres, ['empty' => '(choisissez)']); ?>				
	            </div>
	            <div class="input-group col-md-2">
					<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
			        <?php echo $this->Form->select('ins_idcours', $cours, ['empty' => '(choisissez)']); ?>				
	            </div>
	        </div>


	    </fieldset>
		<?= $this->Form->button(__('Ajouter')); ?>
		<?= $this->Form->end() ?>
	</div>

</div>

