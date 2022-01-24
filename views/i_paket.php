<?php 
include "./config/function.php"
 ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Pinjaman Arsip</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="POST">

						<div class="form-group">
                            <label for="" class="col-sm-3 control-label">Kode Paket</label>
                            <div class="col-sm-3">
                                <input type="text" name="kode" class="form-control" id="inputEmail3" placeholder="Kode Paket">
                            </div>
                        </div>

						<div class="form-group">
                            <label class="col-sm-3 control-label">Jumlah Paket/Mbps</label>
                            <div class="col-sm-3">
                                <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="Jumlah Paket/Mbps">
                            </div>
                        </div>

						 <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Harga</label>
                            <div class="col-sm-3">
                                <input type="text" name="harga" class="form-control" id="inputEmail3" placeholder="Masukkan Harga">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-3">
                                <button type="reset" class="btn btn-primary btn-sm-3">
                                    <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
                                <button type="submit" name="simpan" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=v&actions=paket" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-arrow-left"> Back </span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>



<?php 
  if(isset($_POST['simpan'])){
    $cekdata="SELECT id_paket from t_paket where id_paket='".$_POST['kode']."'";
    $ada=mysqli_query($koneksi, $cekdata) or die(mysqli_error()); 
    $data="SELECT * from t_paket";
    $aya=mysqli_query($koneksi, $data) or die(mysqli_error());
    if(mysqli_num_rows($ada)>0) { 
      writeMsg('paket.sama');
    } else if(mysqli_num_rows($aya)>=5){
      writeMsg('data.lebih');
    } else { 
      $query="INSERT INTO t_paket (id_paket, nama, harga) VALUES ('".$_POST['kode']."','".$_POST['nama']."','".str_replace(".","",$_POST['harga'])."')";
      mysqli_query($koneksi, $query) or die("Gagal menyimpan data karena :").mysqli_error(); 
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=v&actions=paket">';
    } 
  } 

  ?>
