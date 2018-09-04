<section class="content">
    <?php if ($this->session->flashdata('success') != null): ?>
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo($this->session->flashdata('success')) ?>
        </div>
    <?php endif ?>

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-penerbit">
            <span class="fa fa-plus"></span> Tambah penerbit
          </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Nama Penerbit</th>
              <th style="max-width: 90px">Opsi</th>
            </tr>
            </thead>
            <tbody>
               <?php 
                if ($penerbit->num_rows() > 0) {
                  foreach ($penerbit->result() as $row) {
                  ?>
                <tr>
                  <td><?php echo $row->publisher_name?></td>
                  <td>
                    <a href="<?php echo base_url() ?>publisher/edit/<?php echo $row->publisher_id ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil-square-o"></span> edit</a>
                    <a href="<?php echo base_url() ?>publisher/delete/<?php echo $row->publisher_id ?>" class="btn btn-danger btn-xs" onClick="return confirm('Anda yakin ingin menghapus data ini?')"><span class="fa fa-trash"></span> hapus</a>
                  </td>
                </tr>
              <?php }} ?>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>  

<div class="modal fade" id="modal-tambah-penerbit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah penerbit</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="<?php echo base_url()?>publisher/insert">
          <div class="form-group">
            <label for="inputCategory" class="col-sm-3 control-label">Nama penerbit</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputCategory" placeholder="Nama penerbit" name="publisher" required="required">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->