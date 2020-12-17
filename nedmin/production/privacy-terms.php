<?php include 'header.php';


$privacyTermssor = $db->prepare("SELECT * FROM privacy_terms order by privacyTerms_durum ASC");
$privacyTermssor->execute();

?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Privacy Terms <small>,

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
              <a href="privacy-terms-add.php"><button class="btn btn-success btn-xs"> Add Term </button></a>
            </div>

          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Content</th>
                  <th>Number</th>
                  <th>Activation</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php
                while ($privacy_termscek = $privacyTermssor->fetch(PDO::FETCH_ASSOC)) {  ?>

                  <tr>
                    <td><?php echo $privacy_termscek['privacy_terms_id'] ?></td>
                    <td><?php echo $privacy_termscek['privacy_terms_content'] ?></td>
                    <td><?php echo $privacy_termscek['privacyTerms_sira'] ?></td>
                    <td><?php

                        if ($privacy_termscek['privacyTerms_durum'] == 1) { ?>

                        <a href="../netting/islem.php?privacy_terms_id=<?php echo $privacy_termscek['privacy_terms_id']; ?>&terms_one=0&terms_onay=ok"><button class="btn btn-success btn-xs">Active</button></a>

                      <?php } else { ?>

                        <a href="../netting/islem.php?privacy_terms_id=<?php echo $privacy_termscek['privacy_terms_id']; ?>&terms_one=1&terms_onay=ok"><button class="btn btn-danger btn-xs">Passive</button></a>

                      <?php }



                      ?></td>

                    <td>
                      <center><a href="privacy-terms-edit.php?privacy_terms_id=<?php echo $privacy_termscek['privacy_terms_id']; ?>"><button class="btn btn-primary btn-xs">Edit</button></a></center>
                    </td>
                    <td>
                      <center><a href="../netting/islem.php?privacy_terms_id=<?php echo $privacy_termscek['privacy_terms_id']; ?>&privacy_termssil=ok"><button class="btn btn-danger btn-xs">Delete</button></a></center>
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