<div class="box box-info">
<div class="box-body">

	<div class="form">
	<?= $this->Form->create($membre) ?>
	    <fieldset>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
        		<?= $this->Form->input('mem_nom', array('label' => false, 'placeholder' => 'Nom', 'class' => 'form-control', 'type' => 'text')) ?>
	        </div>
	        <br>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
        		<?= $this->Form->input('mem_prenom', array('label' => false, 'placeholder' => 'Prénom', 'class' => 'form-control', 'type' => 'text')) ?>
	        </div>
	        <br>
	        <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        		<?= $this->Form->input('mem_datnaiss', 
        			array('label' => false, 
        				  'placeholder' => 'Date de naissance', 
        				  'class' => 'form-control', 
        				  'type' => 'date',
        				  'minyear' => '1917',
        				  'maxyear' => '2017')) ?>
	        </div>
	        <br>
	        <div class="input-group">
	        	<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
	        	<?= $this->Form->input('mem_mail', array('label' => false, 
	        											 'placeholder' => 'Email', 
	        											 'type' => 'email', 
	        											 'class' => 'form-control')) ?>
	        </div>
	        <br>

	        <div class="input-group">
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
		        echo $this->Form->select('mem_ceinture', $ceintures); ?>				
            </div>
	        <br>
	        <div class="input-group">
	        	<span class="input-group-addon"><i class="fa fa-building"></i></span>
	        	<?= $this->Form->input('mem_adr1', array('label' => false, 
	        											 'placeholder' => 'Adresse ligne 1', 
	        											 'type' => 'text', 
	        											 'class' => 'form-control')) ?>
	        </div>
	        <br>
	        <div class="input-group">
	        	<span class="input-group-addon"><i class="fa fa-building"></i></span>
	        	<?= $this->Form->input('mem_adr2', array('label' => false, 
	        											 'placeholder' => 'Adresse ligne 2', 
	        											 'type' => 'text', 
	        											 'class' => 'form-control')) ?>
	        </div>
	        <br>
	        <div class="input-group">
	        	<span class="input-group-addon"><i class="fa fa-building"></i></span>
	        	<?= $this->Form->input('mem_cp', array('label' => false, 
	        											 'placeholder' => 'Code postal', 
	        											 'type' => 'text', 
	        											 'class' => 'form-control')) ?>
	        </div>
	        <br>
	        <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-building"></i></span>
		        <?php $villes = array('91290' => 'Arpajon', 
										'91200' => 'Athis-Mons',
										'91630' => 'Avrainville',
										'91630' => 'Ballainvilliers',
										'91610' => 'Ballancourt-sur-Essonne',
										'91570' => 'Bièvres',
										'91590' => 'Boissy-le-Cutté',
										'91870' => 'Boissy-le-Sec',
										'91070' => 'Bondoufle',
										'91850' => 'Bourray-Sur-Juine',
										'91220' => 'Brétigny-sur-Orges',
										'91630' => 'Cheptainville',
										'91630' => 'Marolles-en-Hurepoix');
		        echo $this->Form->select('mem_ville', $villes); ?>				
            </div>
	        <br>
	    </fieldset>
	<?= $this->Form->button(__('Enregistrer')); ?>
	<?= $this->Form->end() ?>
	</div>

</div>

