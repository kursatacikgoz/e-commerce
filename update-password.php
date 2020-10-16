<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Update Password</div>
							<p >You can edit your password below ...</p>
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
					<div class="title">Update Password</div>
				</div>

				<?php 

				if ($_GET['durum']=="failmatch") {?>

				<div class="alert alert-danger">
					<strong>Fail!</strong> The passwords you entered do not match.
				</div>
					
				<?php } elseif ($_GET['durum']=="oldpasswordwrong") {?>

				<div class="alert alert-danger">
					<strong>Fail!</strong> Your old password is wrong.
				</div>
					
				<?php } elseif ($_GET['durum']=="mukerrerkayit") {?>

				<div class="alert alert-danger">
					<strong>Fail!</strong> This user has been registered before.
				</div>

				<?php } elseif ($_GET['durum']=="fail") {?>

				<div class="alert alert-danger">
					<strong>Fail!</strong> Failed to Update Consult the System Administrator.
				</div>

				<?php } elseif ($_GET['durum']=="passwordupdated") {?>

				<div class="alert alert-success">
					<strong>Successful!</strong> Successful to Update Password.
				</div>
					
				<?php }?>


				 


				


				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="password" class="form-control"  required="" name="kullanici_oldpassword" placeholder="your old password">
					</div>
					
				</div>

				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="password" class="form-control" name="kullanici_passwordone" placeholder="your new password">
					</div>
					<div class="col-sm-6">
						<input type="password" class="form-control" name="kullanici_passwordtwo" placeholder="your new password again">
					</div>
				</div>

				<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">

				<button type="submit" name="userupdatepasssword" class="btn btn-default btn-red">Update Password</button>
			</div>
		</div>
	</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>