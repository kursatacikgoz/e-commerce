<?php
include 'header.php';
?>

<div class="container">

	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">

		</div>
	</div>
	<div class="title-bg">
		<div class="title">Payment</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered chart">
			<thead>
				<tr>
					<th>Product</th>
					<th>Product Name</th>
					<th>Product code</th>
					<th>Piece</th>
					<th>Unit price</th>
					<th>Total price</th>
				</tr>
			</thead>
			<tbody>


				<?php
				$kullanici_id = $kullanicicek['kullanici_id'];

				$sepetsor = $db->prepare("SELECT * FROM sepet where kullanici_id =:id");

				$sepetsor->execute(array(
					'id' => $kullanici_id
				));

				while ($sepetcek = $sepetsor->fetch(PDO::FETCH_ASSOC)) {

					$urun_id = $sepetcek['urun_id'];

					$urunsor = $db->prepare("SELECT * FROM urun where urun_id =:id");

					$urunsor->execute(array(
						'id' => $urun_id
					));

					$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);

					$toplam_fiyat += $uruncek['urun_fiyat'] * $uruncek['urun_adet'];

				?>

					<!-- <input type="hidden" name="urun_id[]" value="<?php echo $uruncek['urun_id']; ?>"> -->

					<tr>
						<td><img src="images\demo-img.jpg" width="100" alt=""></td>
						<td><?php echo $uruncek['urun_ad']; ?></td>
						<td><?php echo $uruncek['urun_id']; ?></td>
						<td>
							<form><?php echo $sepetcek['urun_adet']; ?></form>
						</td>
						<td><?php echo $uruncek['urun_fiyat']; ?> TL</td>
						<td><?php echo $uruncek['urun_fiyat'] * $sepetcek['urun_adet']; ?> TL</td>
					</tr>

				<?php } ?>

			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col-md-6">


		</div>
		<div class="col-md-3 col-md-offset-3">
			<div class="subtotal-wrap">

				<div class="total">Toplam : <span class="bigprice"><?php echo $toplam_fiyat; ?> TL</span></div>
				<div class="clearfix"></div>
				<!-- <a href="" class="btn btn-default btn-yellow">Ödeme Sayfası</a> -->
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="tab-review">
		<ul id="myTab" class="nav nav-tabs shop-tab">
			<li class="active"><a href="#desc" data-toggle="tab">Credit card</a></li>
			<li><a href="#rev" data-toggle="tab">Bank transfer</a></li>

		</ul>
		<div id="myTabContent" class="tab-content shop-tab-ct">
			<div class="tab-pane fade" id="desc">
				<p>
					Integration Procedures...
				</p>
			</div>
			<div class="tab-pane fade" id="rev">

				<form action="nedmin/netting/islem.php" method="POST">

					<p>Select the bank you will pay</p>


					<?php

					$bankasor = $db->prepare("SELECT * FROM banka order by banka_id ASC");
					$bankasor->execute();

					while ($bankacek = $bankasor->fetch(PDO::FETCH_ASSOC)) { ?>

						<input type="radio" name="siparis_banka" value="<?php echo $bankacek['banka_ad']; ?>">

						<?php echo $bankacek['banka_ad'] ?> <br>


					<?php } ?>

					<br>

					<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
					<input type="hidden" name="siparis_toplam" value="<?php echo $toplam_fiyat; ?>">

					<div align="right">
						<button class="btn btn-success" type="submit" name="addbankorder">Order</button>
					</div>


				</form>

			</div>



		</div>
	</div>

	<div class="spacer"></div>
</div>



<?php
include 'footer.php';


?>