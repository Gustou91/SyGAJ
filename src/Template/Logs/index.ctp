<?php echo $this->Html->css('sygaj_theme'); ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Logs</h3> 
  </div>
  <!-- /.box-header -->
  <div class="box-body col-xs-12">
    <table id="listLogs" class="table table-bordered table-hover" role="grid">
        <thead>
          <tr role="row">
              <th class="col-xs-1">Horodatage</th>
              <th class="col-xs-1">Prénom</th>
              <th class="col-xs-1">Nom</th>
              <th class="col-xs-1">Ip source</th>
              <th class="col-xs-2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($logs as $log): ?>
              <tr role="row">
                <td class="col-xs-1"><?php echo $log->created; ?></td>
                <td class="col-xs-1"><?php echo $log->user->firstname; ?></td>
                <td class="col-xs-1"><?php echo $log->user->lastname; ?></td>
                <td class="col-xs-1"><?php echo $log->log_srcip; ?></td>
                <td class="col-xs-1"><?php echo $log->log_action; ?></td>
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
    $('#listLogs').DataTable({
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
