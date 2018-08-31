<section class="content">
	<div class="row">
		<div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- form start -->
            <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url() ?>book/edit/<?php echo $book->book_id ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputISBN" class="col-sm-2 control-label">ISBN</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputISBN" placeholder="ISBN" name="isbn" value="<?php echo $book->ISBN ?>" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputJudul" class="col-sm-2 control-label">Judul</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputJudul" placeholder="Judul buku" name="title" value="<?php echo $book->title ?>" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Kategori</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="category" required="required">
	                    <?php foreach ($kategori->result() as $key): ?>
                        <option value="<?php echo $key->category_id ?>"><?php echo $key->category_name ?></option>
                        <?php if ($key->category_id == $book->category_id): ?>
                          <option selected="selected" value="<?php echo $key->category_id ?>"><?php echo $key->category_name ?></option>
                        <?php endif ?>
                      <?php endforeach ?>
	                </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputAuthor" class="col-sm-2 control-label">Penulis</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputAuthor" placeholder="Penulis" name="author" value="<?php echo $book->author ?>" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Penerbit</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="publisher" required="required">
	                    <?php foreach ($penerbit->result() as $key): ?>
                        <option value="<?php echo $key->publisher_id ?>"><?php echo $key->publisher_name ?></option>
                        <?php if ($key->publisher_id == $book->publisher_id): ?>
                          <option selected="selected" value="<?php echo $key->publisher_id ?>"><?php echo $key->publisher_name ?></option>
                        <?php endif ?>
                      <?php endforeach ?>
	                </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputTahun" class="col-sm-2 control-label">Tanggal</label>

                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="inputTahun" placeholder="Tahun terbit" name="publishDate" value="<?php echo $book->publish_date ?>" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputHarga" class="col-sm-2 control-label">Harga</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputHarga" placeholder="Rp." name="price" value="<?php echo $book->price ?>" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputImage" class="col-sm-2 control-label">Gambar</label>

                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="inputImage" name="image">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url()?>book" class="btn btn-default">Batal</a>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
	</div>
</section>  