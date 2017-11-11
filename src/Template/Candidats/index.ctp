<?php echo $this->Html->css('sygaj_theme'); ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Liste des candidats</h3> 
    <small><?php echo $this->Html->link('Ajouter un candidat', 
            array('controller' => 'candidats', 
                  'action' => 'add')); ?>
    </small>
  </div>
  <!-- /.box-header -->
  <div class="box-body col-xs-12">
    <table id="listCandidats" class="table table-bordered table-hover" role="grid">
        <thead>
          <tr role="row">
              <th class="col-xs-1">Id</th>
              <th class="col-xs-2">Nom</th>
              <th class="col-xs-2">Prénom</th>
              <th class="col-xs-1">Sexe</th>
              <th class="col-xs-1">Ceinture</th>
              <th class="col-xs-1">Poids</th>
              <th class="col-xs-3">Clubs</th>
              <th class="col-xs-1" style="text-align: center;">Suppression</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($candidats as $candidat): ?>
              <tr role="row">
                <td class="col-xs-1">
                  <?php echo $this->Html->link($candidat->id,array('action' => 'edit', $candidat->id)); ?>
                </td>
                <td class="col-xs-2"><?php echo $candidat->can_nom; ?></td>
                <td class="col-xs-2"><?php echo $candidat->can_prenom; ?></td>
                <td class="col-xs-1"><?php echo $candidat->can_sexe; ?></td>
                <td class="col-xs-1"><?php echo $candidat->can_ceinture; ?></td>
                <td class="col-xs-1"><?php echo $candidat->can_poids; ?></td>
                <td class="col-xs-3"><?php echo $candidat->club->clu_nom; ?></td>
                  <!-- <td class="col-xs-1"><span class="glyphicon glyphicon-trash glyphicon-large"/></td> -->
  <!--                 <td class="col-xs-1"><?php echo $this->Html->link('<i class="icon-align-left"></i>', 
                    array('controller' => 'links', 'action' => 'delete', $candidat->id), 
                    array('escape' => false)); ?>
                  </td> -->
                <td>
                  <?php echo $this->Html->link('<span class="glyphicon glyphicon-trash"></span> Supprimer',array('action' => 'delete', $candidat->id), array('class' => 'btn btn-default', 'escape' => false), 'Voulez-vous vraiment supprimer ce candidat ?'); ?>
                </td>
              </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
<?php
$this->Html->css([
    'AdminLTE./plugins/datatables/dataTables.bootstrap',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
],
['block' => 'script']);
?>

<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
    $('#listCandidats').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<?php $this->end(); ?>
