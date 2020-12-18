<?php
include 'header.php';
$urunsor = $db->prepare("SELECT * FROM urun where urun_id =:id");

$urunsor->execute(array(
	'id' => $_GET['urun_id']
));

$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);

if ($urunsor->rowCount() == 0) {
	header("Location:index.php?durum=1000iq");
}


?>

<head>
	<!-- fancy Style -->
	<link rel="stylesheet" type="text/css" href="js\product\jquery.fancybox.css?v=2.1.5" media="screen">
</head>

<?php
if ($_GET['durum'] == "ok") { ?>
	<script type="text/javascript">
		alert("Yorumunuz eklendi");
	</script>
<?php } ?>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<!--Main content-->
			<div class="title-bg">
				<div class="title"><?php echo $uruncek['urun_ad']; ?></div>
			</div>
			<div class="row">
				<div class="col-md-6">

					<?php
					$urun_id = $uruncek['urun_id'];
					$urunfotosor = $db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id order by urunfoto_sira ASC limit 1");
					$urunfotosor->execute(array(
						'urun_id' => $urun_id
					));
					$urunfotocek = $urunfotosor->fetch(PDO::FETCH_ASSOC);

					?>

					<div class="dt-img">
						<div class="detpricetag">
							<div class="inner"><?php echo $uruncek['urun_fiyat']; ?> TL</div>
						</div>
						<a class="fancybox" href="<?php echo  $urunfotocek['urunfoto_resimyol']; ?>" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="<?php echo  $urunfotocek['urunfoto_resimyol']; ?>" alt="" class="img-responsive"></a>
					</div>



					<?php
					$urun_id = $uruncek['urun_id'];
					$urunfotosor = $db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id order by urunfoto_sira ASC ");
					$urunfotosor->execute(array(
						'urun_id' => $urun_id
					));
					while ($urunfotocek = $urunfotosor->fetch(PDO::FETCH_ASSOC)) { ?>


						<div class="thumb-img">
							<a class="fancybox" href="<?php echo  $urunfotocek['urunfoto_resimyol']; ?>" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="<?php echo  $urunfotocek['urunfoto_resimyol']; ?>" alt="" class="img-responsive"></a>
						</div>

					<?php } ?>


				</div>
				<div class="col-md-6 det-desc">
					<div class="productdata">
						<div class="infospan">Ürün Kodu <span><?php echo $uruncek['urun_id']; ?></span></div>
						<div class="infospan">Ürün Fiyatı <span><?php echo $uruncek['urun_fiyat']; ?> TL</span></div>

						<div class="clearfix"></div>
						<hr>

						<form action="nedmin/netting/islem.php" method="POST">

							<div class="form-group">
								<label for="qty" class="col-sm-2 control-label">Adet</label>
								<div class="col-sm-4">
									<input type="text" class="form-control" value="1" name="urun_adet">
								</div>
								<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">

								<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">
								<div class="col-sm-4">
									<button type="submit" name="sepetekle" class="btn btn-default btn-red btn-sm"><span class="addchart">Sepete Ekle</span></button>
								</div>
								<div class="clearfix"></div>
							</div>

						</form>



						<div class="sharing">
							<div class="share-bt">
								<div class="addthis_toolbox addthis_default_style ">
									<a class="addthis_counter addthis_pill_style"></a>
								</div>
								<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f0d0827271d1c3b"></script>
								<div class="clearfix"></div>
							</div>
							<div class="avatock"><span>
								<?php
								if ($uruncek['urun_stok'] >= 1) {
									echo "Son " . $uruncek['urun_stok'];
								} else {
									echo "Yakında gelecek";
								}
								?>
							</span></div>
						</div>

					</div>
				</div>
			</div>

			<div class="tab-review">
				<ul id="myTab" class="nav nav-tabs shop-tab">
					<li <?php
					if ($_GET['durum'] != "ok") { ?> class="active" <?php } ?>><a href="#desc" data-toggle="tab">Açıklama</a></li>
					<li <?php
					if ($_GET['durum'] == "ok") { ?> class="active" <?php } ?> <?php

						$kullanici_id = $kullanicicek['kullanici_id'];
					$urun_id = $uruncek['urun_id'];

					$yorumsor = $db->prepare("SELECT * FROM yorumlar where urun_id=:urun_id and yorum_onay=:yorum_onay");

					$yorumsor->execute(array(
						'urun_id' => $urun_id,
						'yorum_onay' => 1
					));



					?>><a href="#rev" data-toggle="tab">Yorumlar (<?php echo $yorumsor->rowCount(); ?>)</a></li>
					<li class=""><a href="#video" data-toggle="tab">Ürün Videosu </a></li>
				</ul>
				<div id="myTabContent" class="tab-content shop-tab-ct">
					<div class="tab-pane fade <?php
					if ($_GET['durum'] != "ok") { ?> active in <?php } ?>" id="desc">
					<p>
						<?php echo $uruncek['urun_detay']; ?>
					</p>
				</div>
				<div class="tab-pane fade <?php
				if ($_GET['durum'] == "ok") { ?>
					active in
					<?php } ?>" id="rev">

					<?php



					while ($yorumcek = $yorumsor->fetch(PDO::FETCH_ASSOC)) {

						$yorumyapankullanici_id = $yorumcek['kullanici_id'];

						$yorumyapankullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
						$yorumyapankullanicisor->execute(array(
							'id' => $yorumyapankullanici_id
						));

						$yorumyapankullanicicek = $yorumyapankullanicisor->fetch(PDO::FETCH_ASSOC);
						?>



						<p class="dash">
							<span><?php echo $yorumyapankullanicicek['kullanici_adsoyad'] ?></span> (<?php echo $yorumcek['yorum_zaman'] ?>)<br><br>
							<?php echo $yorumcek['yorum_detay'] ?>
						</p>


					<?php } ?>




					<h4>Siz de görüşünüzü paylaşmak ister misiniz? :)</h4>

					<?php if (isset($_SESSION['userkullanici_mail'])) { ?>

						<form action="nedmin/netting/islem.php" method="POST" role="form">
							<div class="form-group">
								<textarea name="yorum_detay" class="form-control" placeholder="Lütfen yorumunuzu buraya yazınız..." id="text"></textarea>
							</div>

							<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">

							<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']; ?>">

							<input type="hidden" name="gelen_url" value="<?php
							echo "http://" . $_SERVER['HTTP_HOST'] . "" . $_SERVER['REQUEST_URI'] . "";

							?>">


							<button type="submit" name="yorumkaydet" class="btn btn-default btn-red btn-sm">Yorumu Gönder</button>
						</form>

					<?php } else { ?>
						Yorum yapmak için <a href="register.php">kayıt</a> olmalı ya da üye iseniz giriş yapmanız gerekli
					<?php } ?>



				</div>

				<div class="tab-pane fade" id="video">
					<p>
						<?php if (strlen($uruncek['urun_video']) > 0) { ?>
							<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $uruncek['urun_video'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

						<?php } else {
							echo "Bu ürüne ait video bulunmamaktadır.";
						} ?>


					</p>
				</div>


			</div>
		</div>

		<div id="title-bg">
			<div class="title">Bunlar da ilginizi çekebilir..</div>
		</div>
		<div class="row prdct">
			<!--Products-->

			<?php
			$kategori_id = $uruncek['kategori_id'];

			$urunaltsor = $db->prepare("SELECT * FROM urun where kategori_id=:kategori_id order by  rand() limit 3");
			$urunaltsor->execute(array(
				'kategori_id' => $kategori_id
			));

			while ($urunaltcek = $urunaltsor->fetch(PDO::FETCH_ASSOC)) {

				?>

				<div class="col-md-4">
					<div class="productwrap">
						<div class="pr-img">
							<div class="hot"></div>
							<a href="urun-<?= seo($urunaltcek["urun_ad"]) . '-' . ($urunaltcek["urun_id"]) ?>"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag on-sale">
								<div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $urunaltcek['urun_fiyat'] * 1.5; ?></span><?php echo $urunaltcek['urun_fiyat']; ?> TL</span></div>
							</div>
						</div>
						<span class="smalltitle"><a href="urun-<?= seo($uruncek["urun_ad"]) . '-' . ($uruncek["urun_id"]) ?>"><?php echo $urunaltcek['urun_ad']; ?></a></span>
						<span class="smalldesc">Item Kodu: <?php echo $urunaltcek['urun_id']; ?></span>
					</div>
				</div>


			<?php } ?>

		</div>
		<!--Products-->
		<div class="spacer"></div>
	</div>
	<!--Main content-->
	<?php include 'sidebar.php'; ?>
</div>
</div>
<?php include 'footer.php'; ?>