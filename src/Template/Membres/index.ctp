<?php echo $this->Html->css('sygaj_theme'); ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Liste des membres</h3> 
    <small><?php echo $this->Html->link('Ajouter un membres', 
            array('controller' => 'membres', 
                  'action' => 'add')); ?>
    </small>
  </div>
  <!-- /.box-header -->
  <div class="box-body col-xs-12">
    <table class="table table-bordered table-hover datatable" role="grid">
        <tr role="row">
            <th class="col-xs-1">Id</th>
            <th class="col-xs-2">Nom</th>
            <th class="col-xs-2">Prénom</th>
            <th class="col-xs-2">Date de naissance</th>
            <th class="col-xs-1">Ceinture</th>
            <th class="col-xs-2">Mail</th>
            <th class="col-xs-1">Télépone fixe</th>
            <th class="col-xs-1">GSM</th>
            <th class="col-xs-1" style="text-align: center;">Suppression</th>
        </tr>
        <?php foreach ($membres as $membre): ?>
            <tr role="row">
              <td class="col-xs-1">
                <?php echo $this->Html->link($membre->id,array('action' => 'edit', $membre->id)); ?>
              </td>
              <td class="col-xs-2"><?php echo $membre->mem_nom; ?></td>
              <td class="col-xs-2"><?php echo $membre->mem_prenom; ?></td>
              <td class="col-xs-2"><?php echo $membre->mem_datnaiss; ?></td>
              <td class="col-xs-1"><?php echo $membre->mem_ceinture; ?></td>
              <td class="col-xs-1"><?php echo $membre->mem_mail; ?></td>
              <td class="col-xs-2"><?php echo $membre->mem_tel; ?></td>
              <td class="col-xs-1"><?php echo $membre->mem_gsm; ?></td>
                <!-- <td class="col-xs-1"><span class="glyphicon glyphicon-trash glyphicon-large"/></td> -->
<!--                 <td class="col-xs-1"><?php echo $this->Html->link('<i class="icon-align-left"></i>', 
                  array('controller' => 'links', 'action' => 'delete', $membre->id), 
                  array('escape' => false)); ?>
                </td> -->
              <td>
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span> Supprimer',array('action' => 'delete', $membre->id), array('class' => 'btn btn-default', 'escape' => false), 'Voulez-vous vraiment supprimer ce membre ?'); ?>
              </td>
            </tr>
        <?php endforeach; ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
