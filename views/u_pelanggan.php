<?php
$ambil=  mysqli_query($koneksi, "SELECT * FROM t_pelanggan WHERE id_pelanggan='$_GET[id]'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Update Data Pelanggan</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">ID Pelanggan</label>
                            <div class="col-sm-9">
                                <input type="text" name="id" required value="<?=$data['id_pelanggan']?>"class="form-control"  placeholder="ID Pelanggan">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" value="<?=$data['nama']?>"class="form-control"  placeholder="Nama">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" value="<?=$data['alamat']?>"class="form-control"  placeholder="Alamat">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-3 control-label">No Hp</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_hp" value="<?=$data['no_hp']?>"class="form-control"  placeholder="No Handphone">
                            </div>
                        </div>
							<div class="form-group">
                            <label class="col-sm-3 control-label">Alamat Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" value="<?=$data['email']?>"class="form-control" id="inputEmail3" placeholder="Alamat Email" >
                            </div>
                        </div>
                        <!--untuk tanggal lahir form tahun-bulan-tanggal 1998-10-10-->
                        <div class="form-group">
                        <label class="col-sm-3 control-label">Paket</label>
                      <div class="col-sm-3">
                        <select name="id_paket" class="form-control">
                        <?php
                          $pos=mysqli_query($koneksi, "select * from t_paket order by id_paket");
                          while($r_pos=mysqli_fetch_array($pos) ){
                            ?>
                            <!--echo "<option value=\"$r_pos[id_paket]\">$r_pos[nama]</option>";-->
                            <option <?php if($data['id_paket']==$r_pos['id_paket']) {echo "selected"; } ?> value='<?php echo $r_pos['id_paket'] ;?>'><?php echo $r_pos['nama'] ;?></option>
                          <?php
                          };
                          ?>
                        </select>
                      </div>
                    </div>  
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" name="update" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Arsip</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=v&actions=pelanggan" class="btn btn-danger btn-sm">
                        Kembali Ke Data Pelanggan
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
  if(isset($_POST['update'])){
    $query=mysqli_query($koneksi,"UPDATE t_pelanggan SET nama='$_POST[nama]', 
        alamat='$_POST[alamat]', 
        no_hp='$_POST[no_hp]', 
        email='$_POST[email]', 
        id_paket='$_POST[id_paket]' 
        WHERE id_pelanggan='$_POST[id]'")or die(mysqli_error());
    echo '<META HTTP-EQUIV="Refresh" Content="0;  URL=?page=v&actions=pelanggan">';
    } 


  ?>


