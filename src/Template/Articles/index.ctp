<?php echo $this->Html->css('sygaj_theme'); ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Liste des articles</h3> 
    <small><?php echo $this->Html->link('Ajouter un article', 
            array('controller' => 'articles', 
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
            <th class="col-xs-1">Prix</th>
            <th class="col-xs-1" style="text-align: center;">Suppression</th>
        </tr>
        <?php foreach ($articles as $article): ?>
            <tr role="row">
                <td class="col-xs-1">
                  <?php echo $this->Html->link($article->id,array('action' => 'edit', $article->id)); ?>
                </td>
                <td class="col-xs-2"><?php echo $article->art_nom; ?></td>
                <td class="col-xs-5"><?php echo $article->art_description; ?></td>
                <td class="col-xs-1"><?php echo $article->art_prix; ?>€</td>
                <td align="center">
                  <?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span> Supprimer',array('action' => 'delete', $article->id), array('class' => 'btn btn-default', 'escape' => false), 'Voulez-vous vraiment supprimer cet article ?'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
