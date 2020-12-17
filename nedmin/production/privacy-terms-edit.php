<?php 

include 'header.php'; 

$privacy_termssor=$db->prepare("SELECT * FROM privacy_terms where privacy_terms_id =:id");

$privacy_termssor->execute(array(
  'id'=>$_GET['privacy_terms_id']
));

$privacy_termscek=$privacy_termssor->fetch(PDO::FETCH_ASSOC);

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>




    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2> Edit Term <small>

              <?php  
              if($_GET['durum']=="ok"){?>
                <b style="color:green">The transaction is successful.</b>



              <?php }elseif($_GET['durum']=="fail"){?>
                <b style="color:red">The transaction is failed.</b>
              <?php }
              ?>

            </small></h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Id <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="term-id" name="privacy_terms_id" value="<?php echo $privacy_termscek["privacy_terms_id"]; ?>" readonly required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <!-- Ck başlangıç -->

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Term Content <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <textarea  class="ckeditor" id="editor1" name="privacy_terms_content"><?php echo $privacy_termscek['privacy_terms_content']; ?></textarea>
                </div>
              </div>

              <script type="text/javascript">

               CKEDITOR.replace( 'editor1',

               {

                filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

                filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

                filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

                filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                forcePasteAsPlainText: true

              } 

              );

            </script>

            <!-- Ck bitiş -->

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Number <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="term-id" name="privacyTerms_sira" value="<?php echo $privacy_termscek["privacyTerms_sira"]; ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>



            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Term Activation <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               <select id="heard" class="form-control" name="privacyTerms_durum" required>



                   <!-- Kısa İf Kulllanımı 

                    <?php echo $privacy_termscek['privacyTerms_durum'] == '1' ? 'selected=""' : ''; ?>

                  -->




                  <option value="1" <?php echo $privacy_termscek['privacyTerms_durum'] == '1' ? 'selected=""' : ''; ?>>Active</option>



                  <option value="0" <?php if ($privacy_termscek['privacyTerms_durum']==0) { echo 'selected=""'; } ?>>Passive</option>
                  <!-- <?php 

                   if ($privacy_termscek['privacyTerms_durum']==0) {?>


                   <option value="0">Pasif</option>
                   <option value="1">Aktif</option>


                   <?php } else {?>

                   <option value="1">Aktif</option>
                   <option value="0">Pasif</option>

                   <?php  }

                   ?> -->


                 </select>
               </div>
             </div>


             <input type="hidden" name="privacy_terms_id" value="<?php echo $privacy_termscek['privacy_terms_id']; ?>">



             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="privacytermsduzenle" class="btn btn-success">Update</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>






</div>
</div>
<!-- /page content -->



<?php include 'footer.php'; ?>
