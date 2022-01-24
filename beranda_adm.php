<?php
include "./config/function.php";
 ?>
<div class="container">
    <div class="row">
        <div class ="col-xs-12">

            <div class="alert alert-info">
                Selamat datang kembali <strong><?=$_SESSION['nama']?></strong>
            </div>
        </div>
    </div>
    <div class="row">
        <!--colomn kedua-->
        <div class="col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Halaman Administrator Sistem Informasi Pembayaran Paket Internet</h3>
                </div>
                 <div class="panel-body">
                     <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr class="info">
                                <th>No.</th><th>No. Invoice</th><th>Total<th>Tanggal Bayar<th>Tanggal Validasi</th><th>Status</th><th>File</th><th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM t_transaksi";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            //Baca hasil query dari databse, gunakan perulangan untuk
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++; //Penambahan satu untuk nilai var nomor
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $data['id_transaksi'] ?></td>
                                    <td><?php echo "Rp." . number_format( $data['nominal'] , 0 , ',' , '.' ); ?></td>
                                    <td><?= $data['tgl_bayar'] ?></td>
                                    <td><?php
                                    if ($data['tgl_validasi'] == '0000-00-00'){
                                    echo "<span class='label label-warning'>".ucwords("belum validasi")."</span>";
                                     }else{
                                     echo TanggalIndo($data['tgl_validasi']); 
                                     }?></td> 
                                    
                                    <td><?php if ($data['status']=='lunas'){ ?>
                                    <span class="label label-success"><?php echo ucfirst($data['status']) ?></span>
                                     <?php }else{ ?>
                                     <span class="label label-danger"><?php echo ucfirst($data['status']) ?></span>
                                        <?php }?>
                                    </td>
                                
                                <td><?php echo $data['bukti'] ?></td>     
        
                              <td align="center">          
                                <a href="?page=transaksi&aksi=detail&id=<?php echo $data['id_transaksi'] ;?>" class="btn btn-success btn-sm" title="Lihat Data"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a>

                                <a href="?page=u&actions=pembayaran&id=<?php echo $data['id_transaksi'] ;?>" class="btn btn-info btn-sm" title="Edit Data"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>

                                <a href="?page=del&actions=pembayaran&id=<?php echo $data['id_transaksi'] ;?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-danger btn-sm" title="Hapus Data"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>         
                                <?php if($data['status']=='lunas'){
                                ?>
                                <a href="?page=arsip&actions=report&id=<?php echo $data['id_transaksi'] ;?>" name="cetak" target="_blank" class="btn btn-info btn-sm" title="Cetak"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
                                <?php
                                }else{
                                ?>
                                <a href="#" target="_blank" class="btn btn-info btn-sm disabled" title="Cetak"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
                                <?php
                                }
                                ?>
                                </td>      
                              </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <a href="?page=i&actions=pembayaran" class="btn btn-info btn-sm">
                                        Tambah Data

                                    </a>
                                </td>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
</div>
