<?php echo $this->Html->css('sygaj_theme'); ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Liste des réductions</h3> 
    <small><?php echo $this->Html->link('Ajouter une réduction', 
            array('controller' => 'reductions', 
                  'action' => 'add')); ?>
    </small>
  </div>
  <!-- /.box-header -->
  <div class="box-body col-xs-12">
    <table class="table table-bordered table-hover datatable" role="grid">
        <tr role="row">
            <th class="col-xs-1">Id</th>
            <th class="col-xs-2">Désignation</th>
            <th class="col-xs-5">Description</th>
            <th class="col-xs-1">Montant</th>
            <th class="col-xs-1" style="text-align: center;">Suppression</th>
        </tr>
        <?php foreach ($reductions as $reduction): ?>
            <tr role="row">
                <td class="col-xs-1">
                  <?php echo $this->Html->link($reduction->id,array('action' => 'edit', $reduction->id)); ?>
                </td>
                <td class="col-xs-2"><?php echo $reduction->red_nom; ?></td>
                <td class="col-xs-5"><?php echo $reduction->red_description; ?></td>
                <td class="col-xs-1"><?php echo $reduction->red_montant; ?>€</td>
                <td align="center">
                  <?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span> Supprimer',array('action' => 'delete', $reduction->id), array('class' => 'btn btn-default', 'escape' => false), 'Voulez-vous vraiment supprimer ce cours ?'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
