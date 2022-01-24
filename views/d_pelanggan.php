<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Pelanggan</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT t_pelanggan.*, t_paket.nama as nama_paket, t_paket.harga from t_pelanggan left join t_paket on t_pelanggan.id_paket=t_paket.id_paket where t_pelanggan.id_pelanggan='$_GET[id]'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200">ID Pelanggan</td> <td><?= $data['id_pelanggan']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td> <td><?= $data['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td> <td><?= $data['alamat'] ?></td>
                        </tr>
						<tr>
                            <td>No Hp</td> <td><?= $data['no_hp'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td> <td><?= $data['email'] ?></td>
                        </tr>
						<tr>
                            <td>Paket</td> <td><?= $data['nama_paket'] ?></td>
                        </tr>
                        <tr>
                            <td>Harga</td> <td><?php echo "Rp".number_format($data['harga'], 0, ',', '.'); ?></td>
                        </tr>
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=v&actions=pelanggan" class="btn btn-success btn-sm">
                        Kembali ke Data Pelanggan </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

