<?php

include 'index_admin_tpl.php'; 

?>

<style>
.classe {
	background: #f8f8f8;
}
</style>

<div class="container">
	<div class="row">
		<div class="col-md-12 ">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">
							Backup Full
						</a>
					</div>
				</div>
			</nav>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-6   classe">

			<form method="post" action="<?php echo base_url('administrador/admin/backupFull') ?>">
				<div class="form-group">
					<button type="submit" class="btn btn-info">Gerar</button>
				</div>
			</form>

		</div>
	</div>
</div>



<?php include 'template_footer.php' ?>