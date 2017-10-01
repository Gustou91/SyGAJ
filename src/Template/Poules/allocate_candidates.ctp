<?php echo $this->Html->css('sygaj_theme'); ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Liste des candidats non affectés</h3> 
  </div>
  <!-- /.box-header -->
  <div class="box-body col-xs-12">
    <table class="table table-bordered table-hover datatable" role="grid">
        <tr role="row">
            <th class="col-xs-1">Id</th>
            <th class="col-xs-1">Nom</th>
            <th class="col-xs-1">Prénom</th>
            <th class="col-xs-1">Année</th>
            <th class="col-xs-1">Sexe</th>
            <th class="col-xs-1">Poids</th>
        </tr>
        <?php foreach ($candidats as $candidat): ?>
            <tr role="row">
              <td class="col-xs-1"><?php echo $candidat->id; ?></td>
              <td class="col-xs-1"><?php echo $candidat->can_nom; ?></td>
              <td class="col-xs-1"><?php echo $candidat->can_prenom; ?></td>
              <td class="col-xs-1"><?php echo substr($candidat->can_datnaiss, -4); ?></td>
              <td class="col-xs-1"><?php echo $candidat->can_sexe; ?></td>
              <td class="col-xs-1"><?php echo $candidat->can_poids; ?></td>
                <!-- <td class="col-xs-1"><span class="glyphicon glyphicon-trash glyphicon-large"/></td> -->
<!--                 <td class="col-xs-1"><?php echo $this->Html->link('<i class="icon-align-left"></i>', 
                  array('controller' => 'links', 'action' => 'delete', $poule->id), 
                  array('escape' => false)); ?>
                </td> -->
            </tr>
        <?php endforeach; ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
