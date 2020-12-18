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
		<div class="title">Sepetim</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered chart">
			<thead>
				<tr>
					<th>Kaldır</th>
					<th>Ürün</th>
					<th>Ürün Adı</th>
					<th>Ürün Kodu</th>
					<th>Adet</th>
					<th>Birim Fiyat</th>
					<th>Toplam Fiyat</th>
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

					$urunsor = $db->prepare("SELECT * FROM urun u where urun_id =:id group by urun_id");

					$urunsor->execute(array(
						'id' => $urun_id
					));

					$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);

					$toplam_fiyat += $uruncek['urun_fiyat'] * $uruncek['urun_adet'];

					?>

					<tr>
						<td>
							<form><input type="checkbox"></form>
						</td>
						<td><img src="images\demo-img.jpg" width="100" alt=""></td>
						<td><?php echo $uruncek['urun_ad']; ?></td>
						<td><?php echo $uruncek['urun_id']; ?></td>
						<td>
							<form action="nedmin/netting/islem.php" method="POST">
								<div class="form-group">
									<label for="qty" class="col-sm-2 control-label"></label>
									<div class="col-sm-4">
										<form><input type="text" value="<?php echo $sepetcek['urun_adet']; ?>" class="form-control quantity" name="urun_adet"></form>
									</div>
									<input type="hidden" name="kullanici_id" value="<?php echo $sepetcek['kullanici_id'] ?>">
									<input type="hidden" name="sepet_id" value="<?php echo $sepetcek['sepet_id'] ?>">
									<input type="hidden" name="urun_id" value="<?php echo $sepetcek['urun_id'] ?>">
									<div class="col-sm-4">
										<button type="submit" name="updatecount" class="btn btn-default btn-red btn-sm"><span class="addchart">Update</span></button>
									</div>
								</div>
							</form>




							<!-- <form><input type="text" value="<?php echo $sepetcek['urun_adet']; ?>" class="form-control quantity"></form> -->
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
				<a href="odeme.php" class="btn btn-default btn-yellow">Ödeme Sayfası</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="spacer"></div>
</div>



<?php
include 'footer.php';


?>