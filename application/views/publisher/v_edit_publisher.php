<section class="content">
	<div class="row">
		<div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- form start -->
            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>publisher/edit/<?php echo $penerbit->publisher_id ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputISBN" class="col-sm-2 control-label">Nama penerbit</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputISBN" placeholder="Nama penerbit" name="publisher" value="<?php echo $penerbit->publisher_name ?>" required>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url()?>category" class="btn btn-default">Batal</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
	</div>
</section>  