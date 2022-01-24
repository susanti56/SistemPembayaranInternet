<?php 
include 'config/function.php';
 ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Data Pembayaran</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
						 <div class="form-group">
                            <label for="no_rak" class="col-sm-2 control-label">NO Invoice</label>
                            <div class="col-sm-3">
                            <input type="text" name="id" class="form-control" id="inputEmail3" placeholder="Inputkan Nomor Rak atau Lemari" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tanggal Bayar</label>
                            <div class="col-sm-3">
                            <input type="date" id="datepicker" class="form-control" name="tgl_bayar" placeholder="Tanggal Bayar">
                          </div>
                        </div>
						            <div class="form-group">
                          <label class="col-sm-2 control-label">Jumlah Bayar</label>
                          <div class="col-sm-3">        
                          <input type="text" class="form-control" id="inputEmail3" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" name="nominal" placeholder="Jumlah Bayar">
                          </div>
                         </div>    
						            <div class="form-group">
                          <label class="col-sm-2 control-label">Bukti Pembayaran</label>
                          <div class="col-sm-3">
                          <input type="file" id="exampleInputFile" name="file">
                          </div>
                        </div>
                         <input type="hidden" name="info" value="1">
                         <input type="hidden" name="id_pelanggan" value="<?php echo "$_SESSION[id]" ;?>">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-3">
                                <button type="submit" name="simpan" class="btn btn-success">
                                    <span class="fa fa-save"></span> Save</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=index&actions=admin" class="btn btn-danger btn-sm">
                        Kembali 
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>



 <?php 
 $maxsize = 1024 * 200; // maksimal 200 KB (1KB = 1024 Byte)
 $valid_ext = array('jpg','jpeg','png','gif','bmp');
  if(isset($_POST['simpan']) && $_POST['file']['size']<=$maxsize){
    $ext = strtolower(end(explode('.', $_POST['file']['name'])));
    $cekdata="SELECT id_transaksi from t_transaksi where id_transaksi='".$_POST['id']."'"; 
    $ada=mysqli_query($koneksi, $cekdata) or die(mysqli_error());
    $data="SELECT * from t_transaksi";
    $aya=mysqli_query($koneksi, $data) or die(mysqli_error());
    if(mysqli_num_rows($ada)>0 && in_array($ext, $valid_array)) { 
      writeMsg('invoice.sama');
    } else { 
     $query="INSERT INTO t_transaksi (id_transaksi, id_pelanggan,  tgl_bayar, nominal, bukti)
             VALUES ('".$_POST['id']."',
                    '".$_POST['id_pelanggan']."',
                    '".$_POST['tgl_bayar']."',
                    '".str_replace(".","",$_POST['nominal'])."',
                    '".move_uploaded_file($_POST['file']['tmp_name'], 
                        'upload/'.$_POST['file']['name'])."')"; 
      mysqli_query($koneksi, $query) or die("Gagal menyimpan data karena :").mysqli_error(); 
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=index&actions=admin">';
    } 
  } 

  ?>

