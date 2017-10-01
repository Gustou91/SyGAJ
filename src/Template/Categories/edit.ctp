<div class="box box-info">
<?= $this->Html->css('sygaj_theme');?>
<div class="box-body">

	<div class="form">
	<?= $this->Form->create($categorie) ?>
	    <fieldset>
	        <legend><?= __($titre) ?></legend>
	    	<div class="row">
		        <div class="input-group col-md-3">
	                <span class="input-group-addon"><i class="fa fa-object-ungroup"></i></span>
	        		<?= $this->Form->input('cat_nom', array('label' => false, 'placeholder' => 'Nom', 'class' => 'form-control', 'type' => 'text')) ?>
		        </div>
				<div class="input-group col-md-2">
	                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
	        		<?= $this->Form->input('cat_adeb', [
	        				  'label' => false, 
	        				  'placeholder' => 'De',
	        				  'class' => 'form-control', 
	        				  'type' => 'text',
	        				  'data-inputmask' => "'alias': 'yyyy'",
	        				  'data-mask' => '']); ?>		  
		        </div>
				<div class="input-group col-md-2">
	                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
	        		<?= $this->Form->input('cat_afin', [
	        				  'label' => false, 
	        				  'placeholder' => 'A',
	        				  'class' => 'form-control', 
	        				  'type' => 'text',
	        				  'data-inputmask' => "'alias': 'yyyy'",
	        				  'data-mask' => '']); ?>		  
		        </div>		        
		        <div class="input-group col-md-4">
					<span class="input-group-addon"><i class="fa fa-cogs"></i></span>
			        <?php $mode = array('MORPHO' => 'Groupes morphologiques', 
										'FFJDA' => "Tranches d'age FFJDA");
			        echo $this->Form->select('cat_mode', $mode, ['empty' => '(choisissez)']); ?>				
		        </div>		        
	        </div>

	    </fieldset>
		<?= $this->Form->button(__($bouton)); ?>
		<?= $this->Form->end() ?>
	</div>

</div>

<?php
$this->Html->css([
    'AdminLTE./plugins/daterangepicker/daterangepicker-bs3',
    'AdminLTE./plugins/iCheck/all',
    'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
    'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
    'AdminLTE./plugins/select2/select2.min',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/select2/select2.full.min',
  'AdminLTE./plugins/input-mask/jquery.inputmask',
  'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
  'AdminLTE./plugins/input-mask/jquery.inputmask.extensions',
  'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
  'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
  'AdminLTE./plugins/iCheck/icheck.min',
  'sygaj-ui',
],
['block' => 'script']);
?>

