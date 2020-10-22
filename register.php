<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">User Registration</div>
							<p>You can perform user registration via the form below. </p>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Registration Information</div>
				</div>

				<?php

				if ($_GET['durum'] == "eslesmeyensifre") { ?>

					<div class="alert alert-danger">
						<strong>Hata!</strong> The passwords you entered do not match.
					</div>

				<?php } elseif ($_GET['durum'] == "eksiksifre") { ?>

					<div class="alert alert-danger">
						<strong>Hata!</strong> Your password must be at least 6 characters long.
					</div>

				<?php } elseif ($_GET['durum'] == "kayitlikullanici") { ?>

					<div class="alert alert-danger">
						<strong>Hata!</strong> This user has been registered before.
					</div>

				<?php } elseif ($_GET['durum'] == "basarisiz") { ?>

					<div class="alert alert-danger">
						<strong>Hata!</strong> Failed to Register Consult the System Administrator.
					</div>

				<?php }
				?>





				<div class="form-group dob">
					<div class="col-sm-12">

						<input type="text" class="form-control" required="" name="kullanici_adsoyad" placeholder="Enter Your Name and Surname ...">
					</div>

				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="email" class="form-control" required="" name="kullanici_mail" placeholder="Attention! Your e-mail address will be your username.">
					</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="password" class="form-control" name="kullanici_passwordone" placeholder="Enter your password ...">
					</div>
					<div class="col-sm-6">
						<input type="password" class="form-control" name="kullanici_passwordtwo" placeholder="Re-enter your password ...">
					</div>
				</div>



				<button type="submit" name="kullanicikaydet" class="btn btn-default btn-red">Register</button>
			</div>
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Forgot Your Password?</div>
				</div>


			</div>
		</div>
</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>