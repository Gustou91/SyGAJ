<?php echo $this->Html->css('sygaj_theme'); ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Liste des challenges</h3> 
    <small><?php echo $this->Html->link('Ajouter un challenge', 
            array('controller' => 'challenges', 
                  'action' => 'add')); ?>
    </small>
  </div>
  <!-- /.box-header -->
  <div class="box-body col-xs-8">
    <table class="table table-bordered table-hover datatable" role="grid">
        <tr role="row">
            <th class="col-xs-1">Id</th>
            <th class="col-xs-5">Nom</th>
            <th class="col-xs-1">Date</th>
            <th class="col-xs-1" style="text-align: center;">Suppression</th>
        </tr>
        <?php foreach ($challenges as $challenge): ?>
            <tr role="row">
                <td>
                  <?php echo $this->Html->link($challenge->id,array('action' => 'edit', $challenge->id)); ?>
                </td>
                <td class="col-xs-5"><?php echo $challenge->cha_nom; ?></td>
                <td class="col-xs-1"><?php echo $challenge->cha_date; ?></td>
                <td align="center">
                  <?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span> Supprimer',array('action' => 'delete', $challenge->id), array('class' => 'btn btn-default', 'escape' => false), 'Voulez-vous vraiment supprimer ce cours ?'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
