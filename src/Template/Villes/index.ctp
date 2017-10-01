<?php echo $this->Html->css('sygaj_theme'); ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Liste des villes</h3> 
    <small><?php echo $this->Html->link('Ajouter une ville', 
            array('controller' => 'villes', 
                  'action' => 'add')); ?>
    </small>
  </div>
  <!-- /.box-header -->
  <div class="box-body col-xs-12">
    <table class="table table-bordered table-hover datatable" role="grid">
        <tr role="row">
            <th class="col-xs-1">Id</th>
            <th class="col-xs-1">CP</th>
            <th class="col-xs-8">Nom</th>
            <th class="col-xs-1">Active</th>
            <th class="col-xs-1" style="text-align: center;">Suppression</th>
        </tr>
        <?php foreach ($villes as $ville): ?>
            <tr role="row">
              <td class="col-xs-1"><?php echo $this->Html->link($ville->id,array('action' => 'edit', $ville->id)); ?></td>
              <td class="col-xs-1"><?php echo $ville->vil_cp; ?></td>
              <td class="col-xs-8"><?php echo $ville->vil_nom; ?></td>
              <td class="col-xs-1"><?php echo $ville->vil_active == 1 ? 'Oui' : 'Non'; ?></td>
              <td>
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span> Supprimer',array('action' => 'delete', $ville->id), array('class' => 'btn btn-default', 'escape' => false), 'Voulez-vous vraiment supprimer cette ville ?'); ?>
              </td>
            </tr>
        <?php endforeach; ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->