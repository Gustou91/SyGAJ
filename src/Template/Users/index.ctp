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
  <div class="box-body col-xs-10">
    <table class="table table-bordered table-hover datatable" role="grid">
        <tr role="row">
            <th class="col-xs-1">Id</th>
            <th class="col-xs-2">Identifiant</th>
            <th class="col-xs-2">Prénom</th>
            <th class="col-xs-2">Nom</th>
            <th class="col-xs-2">Crée le</th>
            <th class="col-xs-2">Modifié le</th>
            <th class="col-xs-1" style="text-align: center;">Suppression</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr role="row">
                <td class="col-xs-1">
                  <?php echo $this->Html->link($user->id,array('action' => 'edit', $user->id)); ?>
                </td>
                <td class="col-xs-2"><?php echo $user->username; ?></td>
                <td class="col-xs-2"><?php echo $user->firstname; ?></td>
                <td class="col-xs-2"><?php echo $user->lastname; ?></td>
                <td class="col-xs-1"><?php echo $user->created; ?></td>
                <td class="col-xs-1"><?php echo $user->updated; ?></td>
                <!-- <td class="col-xs-1"><span class="glyphicon glyphicon-trash glyphicon-large"/></td> -->
<!--                 <td class="col-xs-1"><?php echo $this->Html->link('<i class="icon-align-left"></i>', 
                  array('controller' => 'links', 'action' => 'delete', $user->id), 
                  array('escape' => false)); ?>
                </td> -->
                <td class="col-xs-1">
                  <?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span> Supprimer',array('action' => 'delete', $user->id), array('class' => 'btn btn-default', 'escape' => false), 'Voulez-vous vraiment supprimer cet utilisateur ?'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
