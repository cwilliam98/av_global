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
				<div class="col-md-10 col-md-offset-2">
					<nav class="navbar navbar-default">
						<div class="container-fluid">
							<div class="navbar-header">
								<a class="navbar-brand" href="#">
									Backup
								</a>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
		


		
		<div class="container">
			<div class="row">
				<div class="col-md-6  col-md-offset-3 classe">
					
					<form method="post" action="<?php echo base_url('administrador/admin/backup') ?>">
						
						<div class="form-group">
							<button type="submit" class="btn btn-info">gerar</button>
						</div>
					</form>

				</div>
			</div>
		</div>
		
		
		
<?php include 'template_footer.php' ?>