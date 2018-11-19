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
							Backup somente dados
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

			<form method="post" action="<?php echo base_url('administrador/admin/backup') ?>">
				<h4>Selecione a tabela</h4>

				<div class="form-group <?php echo form_error('table') ? 'has-error' : '' ?>">
					<select class="form-control" name="table" id="table">
						<?php  foreach ($tables as $key => $value): ?>
							<option id="table" name="table" value="<?php echo $value; ?>"><?php echo $value; ?></option>
						<?php  endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info">gerar</button>
				</div>
			</form>

		</div>
	</div>
</div>



<?php include 'template_footer.php' ?>