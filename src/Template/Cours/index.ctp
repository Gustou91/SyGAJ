<?php echo $this->Html->css('sygaj_theme'); ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Liste des cours</h3> 
    <small><?php echo $this->Html->link('Ajouter un cours', 
            array('controller' => 'cours', 
                  'action' => 'add')); ?>
    </small>
  </div>
  <!-- /.box-header -->
  <div class="box-body col-xs-12">
    <table class="table table-bordered table-hover datatable" role="grid">
        <tr role="row">
            <th class="col-xs-1">Id</th>
            <th class="col-xs-2">Nom</th>
            <th class="col-xs-5">Description</th>
            <th class="col-xs-1">Tarif</th>
            <th class="col-xs-1">Licence</th>
            <th class="col-xs-1">Total</th>
            <th class="col-xs-1" style="text-align: center;">Suppression</th>
        </tr>
        <?php foreach ($cours as $unCours): ?>
            <tr role="row">
                <td>
                  <?php echo $this->Html->link($unCours->id,array('action' => 'edit', $unCours->id)); ?>
                </td>
                <td class="col-xs-2"><?php echo $unCours->cou_nom; ?></td>
                <td class="col-xs-5"><?php echo $unCours->cou_description; ?></td>
                <td class="col-xs-1"><?php echo $unCours->cou_tarif; ?>€</td>
                <td class="col-xs-1"><?php echo $unCours->cou_licence; ?>€</td>
                <td class="col-xs-1"><?php echo $unCours->cou_tarif + $unCours->cou_licence; ?>€</td>
                <td align="center">
                  <?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span> Supprimer',array('action' => 'delete', $unCours->id), array('class' => 'btn btn-default', 'escape' => false), 'Voulez-vous vraiment supprimer ce cours ?'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
