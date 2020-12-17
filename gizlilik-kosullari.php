<?php include 'header.php';


$privacyTermssor = $db->prepare("SELECT * FROM privacy_terms where privacyTerms_durum=:durum order by privacyTerms_sira ASC");

$privacyTermssor->execute(array(
	'durum' => '1'
));

?>



<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bigtitle"> Privacy terms </div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-9">
			<!--Main content-->
			<hr>
			<?php
			$sat = 0;
			while ($privacyTermscek = $privacyTermssor->fetch(PDO::FETCH_ASSOC)) { $say++;
				?>

				<div class="page-content">
						<?php
						echo $say .". " . $privacyTermscek['privacy_terms_content'];
						?>
					
				</div>
			<?php } ?>


		</div>

		<?php include 'sidebar.php'; ?>

	</div>
	<div class="spacer"></div>
</div>

<?php include 'footer.php' ?>