<?php echo $this->Html->css('sygaj_theme'); ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Liste des utilisateurs</h3> 
    <small><?php echo $this->Html->link('Ajouter un utilisateur', 
            array('controller' => 'users', 
                  'action' => 'add')); ?>
    </small>
  </div>
  <!-- /.box-header -->
  <div class="box-body col-xs-6">
    <table class="table table-bordered table-hover datatable" role="grid">
        <tr role="row">
            <th class="col-xs-1">Id</th>
            <th class="col-xs-4">Identifiant</th>
            <th class="col-xs-3">Crée le</th>
            <th class="col-xs-1" style="text-align: center;">Suppression</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr role="row">
                <td class="col-xs-1"><?php echo $user->id; ?></td>
                <td class="col-xs-4"><?php echo $user->username; ?></td>
                <td class="col-xs-3"><?php echo $user->created; ?></td>
                <!-- <td class="col-xs-1"><span class="glyphicon glyphicon-trash glyphicon-large"/></td> -->
<!--                 <td class="col-xs-1"><?php echo $this->Html->link('<i class="icon-align-left"></i>', 
                  array('controller' => 'links', 'action' => 'delete', $user->id), 
                  array('escape' => false)); ?>
                </td> -->
                <td>
                  <?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span> Supprimer',array('action' => 'delete', $user->id), array('class' => 'btn btn-default', 'escape' => false), 'Voulez-vous vraiment supprimer cet utilisateur ?'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
