<?php
$ambil=  mysqli_query($koneksi, "SELECT * FROM t_transaksi WHERE id_transaksi='$_GET[id]'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Update Data Pembayaran</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" method="POST">
                      <fieldset>
                        <legend>Update Data Transaksi</legend>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">No Invoice</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" readonly name="id" required value="<?php echo $data['id_transaksi'] ;?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Tanggal Bayar</label>
                          <div class="col-sm-3">
                            <input type="date" id="datepicker" class="form-control" name="tgl_bayar" value="<?php echo $data['tgl_bayar'] ;?>">
                          </div>
                        </div>
                        <?php if($_SESSION['level'] == '1'){ ;?>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Tanggal Validasi</label>
                          <div class="col-sm-3">
                            <input type="date" id="tgl_validasi" class="form-control" name="tgl_validasi" value="<?php echo $data['tgl_validasi'] ;?>">
                          </div>
                        </div>
                        <?php }; ?>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Jumlah Bayar</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control" name="nominal" value="<?php echo $data['nominal'] ;?>">
                          </div>
                        </div>
                        <?php if($_SESSION['level'] == '1'){ ;?>  
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Status</label>
                          <div class="col-sm-3">
                            <select name="status" class="form-control">
                              <option <?php if( $data['status']=='lunas'){echo "selected"; } ?> value='lunas'>Lunas</option>
                              <option <?php if( $data['status']=='pending'){echo "selected"; } ?> value='pending'>Pending</option>          
                            </select>
                          </div>
                        </div>  
                        <?php }; ?>
                        <?php if($_SESSION['level'] == 'pelanggan'){ ;?>   
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Bukti Pembayaran</label>
                          <div class="col-sm-3">
                            <input type="file" id="exampleInputFile" name="file">
                          </div>
                        </div> 
                        <?php }; ?>
                       
                       <input type="hidden" name="username" value="<?php echo "$_SESSION[username]" ;?>">
                        <div class="form-group">
                          <div class="col-sm-3 col-sm-offset-2">
                            <button type="reset" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
                            <button type="submit" name="simpan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Simpan</button>
                            <a href="?page=transaksi" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal </a>
                          </div>
                        </div>
                      </fieldset>


                    </form>


  <?php 
  if(isset($_POST['simpan'])){
    if($_SESSION['level'] == '1'){
    $query=mysqli_query($koneksi,"UPDATE t_transaksi SET tgl_bayar='$_POST[tgl_bayar]', tgl_validasi='$_POST[tgl_validasi]', nominal='$_POST[nominal]', status='$_POST[status]' WHERE id_transaksi='$_POST[id]'")or die(mysqli_error());
    }else{
      $query=mysqli_query($koneksi,"UPDATE t_transaksi SET tgl_bayar='$_POST[tgl_bayar]', tgl_validasi='$_POST[tgl_validasi]', nominal='$_POST[nominal]' WHERE id_transaksi='$_POST[id]'")or die(mysqli_error());
    
    }
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=index&actions=admin">';
   
  } 


  ?>
