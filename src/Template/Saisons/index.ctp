<?php echo $this->Html->css('sygaj_theme'); ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Liste des saisons</h3> 
    <small><?php echo $this->Html->link('Ajouter une saison', 
            array('controller' => 'saisons', 
                  'action' => 'add')); ?>
    </small>
  </div>
  <!-- /.box-header -->
  <div class="box-body col-xs-12">
    <table class="table table-bordered table-hover datatable" role="grid">
        <tr role="row">
            <th class="col-xs-1">Id</th>
            <th class="col-xs-2">Nom</th>
            <th class="col-xs-1" style="text-align: center;">Suppression</th>
        </tr>
        <?php foreach ($saisons as $saison): ?>
            <tr role="row">
              <td class="col-xs-1"><?php echo $this->Html->link($saison->id,array('action' => 'edit', $saison->id)); ?></td>
              <td class="col-xs-2"><?php echo $saison->sai_nom; ?></td>
              <td>
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span> Supprimer',array('action' => 'delete', $saison->id), array('class' => 'btn btn-default', 'escape' => false), 'Voulez-vous vraiment supprimer cette saison ?'); ?>
              </td>
            </tr>
        <?php endforeach; ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
