<div class="box box-info">
<?= $this->Html->css('sygaj_theme');?>
<div class="box-body">

	<div class="form">
	<?= $this->Form->create($membre) ?>
	    <fieldset>
	        <legend><?= __('Ajouter un membre') ?></legend>
	    	<div class="row">
		        <div class="input-group col-md-4">
	                <span class="input-group-addon"><i class="fa fa-user"></i></span>
	        		<?= $this->Form->input('mem_nom', array('label' => false, 'placeholder' => 'Nom', 'class' => 'form-control', 'type' => 'text')) ?>
		        </div>
		        <div class="input-group col-md-4">
	                <span class="input-group-addon"><i class="fa fa-user"></i></span>
	        		<?= $this->Form->input('mem_prenom', array('label' => false, 'placeholder' => 'Prénom', 'class' => 'form-control', 'type' => 'text')) ?>
		        </div>
	        </div>

	    	<div class="row">
		        <div class="input-group col-md-10">
		        	<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
		        	<?= $this->Form->input('mem_mail', array('label' => false, 
		        											 'placeholder' => 'Email', 
		        											 'type' => 'email', 
		        											 'class' => 'form-control')) ?>
		        </div>
	        </div>

	    	<div class="row">
		        <div class="input-group col-md-10">
		        	<span class="input-group-addon"><i class="fa fa-building"></i></span>
		        	<?= $this->Form->input('mem_adr1', array('label' => false, 
		        											 'placeholder' => 'Adresse ligne 1', 
		        											 'type' => 'text', 
		        											 'class' => 'form-control')) ?>
		        </div>
			</div>

	    	<div class="row">
		        <div class="input-group col-md-10">
		        	<span class="input-group-addon"><i class="fa fa-building"></i></span>
		        	<?= $this->Form->input('mem_adr2', array('label' => false, 
		        											 'placeholder' => 'Adresse ligne 2', 
		        											 'type' => 'text', 
		        											 'class' => 'form-control')) ?>
		        </div>
		    </div>

	    	<div class="row">
	        	<div class="input-group col-md-8">
					<span class="input-group-addon"><i class="fa fa-building"></i></span>
			        <?php echo $this->Form->select('mem_idville', $villes, [
			        	'empty' => '(choisissez la ville)',
			        	'id' => 'listVilles'
			        	]); ?>
	            </div>
		    </div>
	        
	    	<div class="row">
		        <div class="input-group col-md-4">
	                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
	        		<?= $this->Form->input('mem_datnaiss', [
	        				  'label' => false, 
	        				  'class' => 'form-control', 
	        				  'type' => 'text',
	        				  'data-inputmask' => "'alias': 'dd/mm/yyyy'",
	        				  'data-mask' => '']); ?>		  
		        </div>
       	        <div class="input-group col-md-4">
					<span class="input-group-addon"><i class="fa fa-tint"></i></span>
			        <?php $ceintures = array('BL' => 'Blanche', 
											'BJ' => 'Blanche/Jaune',
											'JA' => 'Jaune',
											'JO' => 'Jaune/Orange',
											'OR' => 'Orange',
											'OV' => 'Orange/Verte',
											'VE' => 'Verte',
											'BE' => 'Bleue',
											'MA' => 'Marron',
											'NO' => 'Noire');
			        echo $this->Form->select('mem_ceinture', $ceintures, ['empty' => '(choisissez)']); ?>				
	            </div>
	        </div>

	    </fieldset>
		<?= $this->Form->button(__('Ajouter')); ?>
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

