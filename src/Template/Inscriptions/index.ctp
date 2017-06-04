<?php echo $this->Html->css('sygaj_theme'); ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Liste des inscriptions</h3> 
    <small><?php echo $this->Html->link('Nouvelle inscription', 
            array('controller' => 'inscriptions', 
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
            <th class="col-xs-1">Cours</th>
            <th class="col-xs-1">Saison</th>
            <th class="col-xs-1" style="text-align: center;">Suppression</th>
        </tr>
        <?php foreach ($inscriptions as $inscription): ?>
            <tr role="row">
              <td class="col-xs-1">
                <?php echo $this->Html->link($inscription->id,array('action' => 'edit', $inscription->id)); ?>
              </td>
              <td class="col-xs-2"><?php echo $inscription->membre->mem_nom; ?></td>
              <td class="col-xs-2"><?php echo $inscription->membre->mem_prenom; ?></td>
              <td class="col-xs-1"><?php echo $inscription->cour->cou_nom; ?></td>
              <td class="col-xs-1"><?php echo $inscription->saison->sai_nom; ?></td>
                <!-- <td class="col-xs-1"><span class="glyphicon glyphicon-trash glyphicon-large"/></td> -->
<!--                 <td class="col-xs-1"><?php echo $this->Html->link('<i class="icon-align-left"></i>', 
                  array('controller' => 'links', 'action' => 'delete', $inscription->id), 
                  array('escape' => false)); ?>
                </td> -->
              <td>
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span> Supprimer',array('action' => 'delete', $inscription->id), array('class' => 'btn btn-default', 'escape' => false), 'Voulez-vous vraiment supprimer cette inscription ?'); ?>
              </td>
            </tr>
        <?php endforeach; ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
