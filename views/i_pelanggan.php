<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Data Pelanggan</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
						 <div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">ID Pelanggan</label>
                            <div class="col-sm-9">
                                <input type="text" name="id" class="form-control" id="inputEmail3" placeholder="Inputkan Nomor Rak atau Lemari" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="no_laci" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="Inputkan Nomor Laci" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="no_boks" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" id="inputEmail3" placeholder="Inputkan Nomor Boks" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="para_pihak" class="col-sm-3 control-label">No Telepon</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_hp" class="form-control" id="inputEmail3" placeholder="Inputkan Para Pihak yang Terlibat" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_perkara" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email"class="form-control" id="inputEmail3" placeholder="Inputkan Email" required>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="tgl_masuk" class="col-sm-3 control-label">Paket</label>
                            <div class="col-sm-3">
                                <select name="paket" onchange="showUser(this.value)" class="form-control">
                            <option value="">--Pilih Paket--</option>
                             <?php
                                $pos=mysqli_query($koneksi, "select * from t_paket order by id_paket");
                                while($r_pos=mysqli_fetch_array($pos)){
                                    echo "<option value=\"$r_pos[id_paket]\">$r_pos[nama]</option>";
                                }
                            ?>
                             </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" name="simpan" class="btn btn-success">
                                    <span class="fa fa-save"></span> Save</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=v&actions=pelanggan" class="btn btn-danger btn-sm">
                        Kembali Ke Data Arsip
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

 <?php 
  if(isset($_POST['simpan'])){
    $cekdata="SELECT id_pelanggan from t_pelanggan where id_pelanggan='".$_POST['id']."'"; 
    $ada=mysqli_query($koneksi, $cekdata) or die(mysqli_error()); 
    if(mysqli_num_rows($ada)>0) { 
      writeMsg('pelanggan.sama');
    } else { 
      $query="INSERT INTO t_pelanggan VALUES ('".$_POST['id']."',
                                              '".$_POST['nama']."',
                                              '".$_POST['alamat']."',
                                              '".$_POST['no_hp']."',
                                              '".$_POST['email']."',
                                              '".$_POST['paket']."')"; 
      mysqli_query($koneksi, $query) or die("Gagal menyimpan data karena :").mysqli_error(); 
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=v&actions=pelanggan">';
    } 
  } 

  ?>

