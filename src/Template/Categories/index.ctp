<?php echo $this->Html->css('sygaj_theme'); ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Liste des catégories</h3> 
    <small><?php echo $this->Html->link('Ajouter une catégorie', 
            array('controller' => 'categories', 
                  'action' => 'add')); ?>
    </small>
  </div>
  <!-- /.box-header -->
  <div class="box-body col-xs-12">
    <table class="table table-bordered table-hover datatable" role="grid">
        <tr role="row">
            <th class="col-xs-1">Id</th>
            <th class="col-xs-2">Nom</th>
            <th class="col-xs-1">De</th>
            <th class="col-xs-1">A</th>
            <th class="col-xs-1">Mode</th>
            <th class="col-xs-1" style="text-align: center;">Suppression</th>
        </tr>
        <?php foreach ($categories as $categorie): ?>
            <tr role="row">
              <td class="col-xs-1">
                <?php echo $this->Html->link($categorie->id,array('action' => 'edit', $categorie->id)); ?>
              </td>
              <td class="col-xs-2"><?php echo $categorie->cat_nom; ?></td>
              <td class="col-xs-1"><?php echo $categorie->cat_adeb; ?></td>
              <td class="col-xs-1"><?php echo $categorie->cat_afin; ?></td>
              <td class="col-xs-1"><?php echo $categorie->cat_mode; ?></td>
                <!-- <td class="col-xs-1"><span class="glyphicon glyphicon-trash glyphicon-large"/></td> -->
<!--                 <td class="col-xs-1"><?php echo $this->Html->link('<i class="icon-align-left"></i>', 
                  array('controller' => 'links', 'action' => 'delete', $categorie->id), 
                  array('escape' => false)); ?>
                </td> -->
              <td>
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span> Supprimer',array('action' => 'delete', $categorie->id), array('class' => 'btn btn-default', 'escape' => false), 'Voulez-vous vraiment supprimer cette categorie ?'); ?>
              </td>
            </tr>
        <?php endforeach; ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
