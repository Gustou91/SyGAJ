<?php echo $this->Html->css('sygaj_theme'); ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Liste des poules - </h3> 
    <small><?php echo $this->Html->link('Constuire les poules', 
            array('controller' => 'poules', 
                  'action' => 'allocateCandidates')); ?>
    </small>
     - 
    <small><?php echo $this->Html->link('Composition des poules', 
            array('controller' => 'poules', 
                  'action' => 'groupComposition')); ?>
    </small>
     - 
     <small><?php echo $this->Html->link('Consulter les judokas non affectés', 
            array('controller' => 'poules', 
                  'action' => 'notAffectedCandidates')); ?>
    </small>
  </div>
  <!-- /.box-header -->
  <div class="box-body col-xs-12">
    <table class="table table-bordered table-hover datatable" role="grid">
        <tr role="row">
            <th class="col-xs-1">Id</th>
            <th class="col-xs-2">Catégorie</th>
            <th class="col-xs-1">Sexe</th>
            <th class="col-xs-1">Poids min</th>
            <th class="col-xs-1" style="text-align: center;">Suppression</th>
        </tr>
        <?php foreach ($poules as $poule): ?>
            <tr role="row">
              <td class="col-xs-1">
                <?php echo $this->Html->link($poule->id,array('action' => 'edit', $poule->id)); ?>
              </td>
              <td class="col-xs-2"><?php echo $poule->category->cat_nom; ?></td>
              <td class="col-xs-1"><?php echo $poule->pou_sexe; ?></td>
              <td class="col-xs-1"><?php echo $poule->pou_poidsmin; ?></td>
                <!-- <td class="col-xs-1"><span class="glyphicon glyphicon-trash glyphicon-large"/></td> -->
<!--                 <td class="col-xs-1"><?php echo $this->Html->link('<i class="icon-align-left"></i>', 
                  array('controller' => 'links', 'action' => 'delete', $poule->id), 
                  array('escape' => false)); ?>
                </td> -->
              <td>
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span> Supprimer',array('action' => 'delete', $poule->id), array('class' => 'btn btn-default', 'escape' => false), 'Voulez-vous vraiment supprimer cette poule ?'); ?>
              </td>
            </tr>
        <?php endforeach; ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
