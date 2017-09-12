<?php echo $this->Html->css('sygaj_theme'); ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Liste des clubs</h3> 
    <small><?php echo $this->Html->link('Ajouter un club', 
            array('controller' => 'clubs', 
                  'action' => 'add')); ?>
    </small>
  </div>
  <!-- /.box-header -->
  <div class="box-body col-xs-12">
    <table class="table table-bordered table-hover datatable" role="grid">
        <tr role="row">
            <th class="col-xs-1">Id</th>
            <th class="col-xs-2">Nom</th>
            <th class="col-xs-2">Ville</th>
            <th class="col-xs-2">Mail</th>
            <th class="col-xs-2">Téléphone</th>
            <th class="col-xs-1">Président</th>
            <th class="col-xs-1">Trésorier</th>
            <th class="col-xs-1" style="text-align: center;">Suppression</th>
        </tr>
        <?php foreach ($clubs as $club): ?>
            <tr role="row">
              <td class="col-xs-1">
                <?php echo $this->Html->link($club->id,array('action' => 'edit', $club->id)); ?>
              </td>
              <td class="col-xs-2"><?php echo $club->clu_nom; ?></td>
              <td class="col-xs-2"><?php echo $club->ville->vil_nom; ?></td>
              <td class="col-xs-2"><?php echo $club->clu_mail; ?></td>
              <td class="col-xs-2"><?php echo $club->clu_tel; ?></td>
              <td class="col-xs-1"><?php echo $club->clu_president; ?></td>
              <td class="col-xs-1"><?php echo $club->clu_tresorier; ?></td>
                <!-- <td class="col-xs-1"><span class="glyphicon glyphicon-trash glyphicon-large"/></td> -->
<!--                 <td class="col-xs-1"><?php echo $this->Html->link('<i class="icon-align-left"></i>', 
                  array('controller' => 'links', 'action' => 'delete', $club->id), 
                  array('escape' => false)); ?>
                </td> -->
              <td>
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span> Supprimer',array('action' => 'delete', $club->id), array('class' => 'btn btn-default', 'escape' => false), 'Voulez-vous vraiment supprimer ce club ?'); ?>
              </td>
            </tr>
        <?php endforeach; ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
