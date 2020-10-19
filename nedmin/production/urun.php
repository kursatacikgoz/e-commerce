<?php
include 'header.php';

$urunsor = $db->prepare("SELECT * FROM urun order by urun_id DESC");
$urunsor->execute();
?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürün Listeleme <small>,

                <?php

                if ($_GET['durum'] == "ok") { ?>

                  <b style="color:green;">İşlem Başarılı...</b>

                <?php } elseif ($_GET['durum'] == "no") { ?>

                  <b style="color:red;">İşlem Başarısız...</b>

                <?php }

                ?>


              </small></h2>

            <div class="clearfix"></div>

            <div align="right">
              <a href="urun-ekle.php"><button class="btn btn-success btn-xs"> Ürün Ekle </button></a>
            </div>

          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Sıra</th>
                  <th>Ad</th>
                  <th>Stok</th>
                  <th>Fiyat</th>
                  <th>Photo Processing</th>
                  <th>Durum</th>
                  <th>Öne Çıkan</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php
                $say = 0;
                while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {
                  $say++; ?>


                  <tr>
                    <td width="30"><?php echo $say ?></td>
                    <td><?php echo $uruncek['urun_ad'] ?></td>
                    <td><?php echo $uruncek['urun_stok'] ?></td>
                    <td><?php echo $uruncek['urun_fiyat'] ?></td>
                    <td>
                      <center><a href="urun-galeri.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><button class="btn btn-success btn-xs">Photo Processing</button></a></center>
                    </td>
                    <td><?php

                        if ($uruncek['urun_durum'] == 1) { ?>

                        <button class="btn btn-success btn-xs">Aktif</button>


                      <?php } else { ?>


                        <button class="btn btn-danger btn-xs">Pasif</button>


                      <?php }



                      ?></td>

                    <td><?php

                        if ($uruncek['urun_onecikan'] == 1) { ?>

                        <a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id']; ?>&urun_one=0&urun_onecikan=ok"><button class="btn btn-success btn-xs">Aktif</button></a>


                      <?php } else { ?>


                        <a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id']; ?>&urun_one=1&urun_onecikan=ok"><button class="btn btn-danger btn-xs">Pasif</button></a>


                      <?php }



                      ?></td>

                    <td>
                      <center><a href="urun-duzenle.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center>
                    </td>
                    <td>
                      <center><a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id']; ?>&urunsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center>
                    </td>
                  </tr>



                <?php  }

                ?>


              </tbody>
            </table>

            <!-- Div İçerik Bitişi -->


          </div>
        </div>
      </div>
    </div>




  </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>