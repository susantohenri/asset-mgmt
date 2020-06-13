<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/dataTables.bootstrap4.css') ?>">
<div class="col-sm-12">
    <div class="card card-primary card-outline">
      <div class="card-body">

        <?php if (in_array("create_{$current['controller']}", $permission)) : ?>
        <div class="col-sm-12 text-right">
            <?php if ('Asset' === $current['controller']): ?>
                <a href="<?= site_url($current['controller'] . '/scan') ?>" class="btn btn-primary">
                    Add / Edit <?= $page_title ?>
                </a>
                <a href="<?= site_url($current['controller'] . '/pdf') ?>" class="btn btn-info">
                    Export PDF
                </a>
                <a href="<?= site_url($current['controller'] . '/excel') ?>" class="btn btn-warning">
                    Export Excel
                </a>
            <?php else: ?>
            <a href="<?= site_url($current['controller'] . '/create') ?>" class="btn btn-primary">
                <i class="fa fa-plus"></i>&nbsp;Add New <?= $page_title ?>
            </a>
            <?php endif ?>
        </div>
        <br>
        <?php endif ?>

        <table class="table table-bordered table-striped datatable table-model">
            <tfoot>
                <tr>
                </tr>
            </tfoot>
        </table>

      </div>
    </div><!-- /.card -->
</div>
<script type="text/javascript">
    var thead = <?= json_encode ($thead) ?>;
    var allow_read = <?= in_array("read_{$current['controller']}", $permission) ?>
</script>