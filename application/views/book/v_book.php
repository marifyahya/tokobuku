<section class="content">
  <div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <a href="book/create" class="btn btn-primary"> <span class="fa fa-plus"></span> Tambah buku</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Gambar</th>
              <th>ISBN</th>
              <th>Judul</th>
              <th>Kategori</th>
              <th>Penulis</th>
              <th>Penerbit</th>
              <th>Tanggal terbit</th>
              <th>Harga</th>
              <th>Opsi</th>
            </tr>
            </thead>
            <tbody>
              <?php 
                if ($book->num_rows() > 0) {
                  foreach ($book->result() as $row) {
                  ?>
                <tr>
                  <td><img src="<?php echo base_url()?>public/uploads/<?php echo $row->img ?>" alt="img" style="width: 25px; height: 25px;"></td>
                  <td><?php echo $row->ISBN?></td>
                  <td><?php echo $row->title?></td>
                  <td><?php echo $row->category_name?></td>
                  <td><?php echo $row->author?></td>
                  <td><?php echo $row->publisher_name?></td>
                  <td><?php echo $row->publish_date?></td>
                  <td>Rp. <?php echo number_format($row->price, 0, ",", "."); ?></td>
                  <td>
                    <a href="<?php echo base_url() ?>book/edit/<?php echo $row->book_id ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil-square-o"></span></a>
                    <a href="<?php echo base_url() ?>book/delete/<?php echo $row->book_id ?>" class="btn btn-danger btn-xs" onClick="return confirm('Anda yakin ingin menghapus data ini?')"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
              <?php }} ?>
            </tbody>
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