<?php 
include 'header.php'; 

$bankasor=$db->prepare("SELECT * FROM banka order by banka_id ASC");
$bankasor->execute();
?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>banka Listeleme <small>,

              <?php 

              if ($_GET['durum']=="ok") {?>

                <b style="color:green;">Transaction Successful...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

                <b style="color:red;">Operation Failed...</b>

              <?php }

              ?>


            </small></h2>

            <div class="clearfix"></div>

            <div align="right">
              <a href="banka-ekle.php"><button class="btn btn-success btn-xs"> Add Bank </button></a>
            </div>

          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Line</th>
                  <th>The name of the Bank</th>
                  <th>IBAN</th>
                  <th>Account Name Surname</th>
                  <th>Status</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 
                $say=0;
                while($bankacek=$bankasor->fetch(PDO::FETCH_ASSOC)) { $say++; ?>


                  <tr>
                    <td width="30"><?php echo $say ?></td>
                    <td><?php echo $bankacek['banka_ad'] ?></td>
                    <td><?php echo $bankacek['banka_iban'] ?></td>
                    <td><?php echo $bankacek['banka_hesapadsoyad'] ?></td>
                    <td><?php 

                    if ($bankacek['banka_durum']==1) {?>

                      <button class="btn btn-success btn-xs">Active</button>


                    <?php }else{?>


                      <button class="btn btn-danger btn-xs">Passive</button>


                    <?php }
                    


                    ?></td>

                    <td><center><a href="banka-duzenle.php?banka_id=<?php echo $bankacek['banka_id']; ?>"><button class="btn btn-primary btn-xs">Edit</button></a></center></td>
                    <td><center><a href="../netting/islem.php?banka_id=<?php echo $bankacek['banka_id']; ?>&bankasil=ok"><button class="btn btn-danger btn-xs">Delete</button></a></center></td>
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
