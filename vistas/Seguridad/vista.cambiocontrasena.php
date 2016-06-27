<?php $title = "Cambiar contraseña";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>
<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Cambiar Contraseña</h1>
   	</div>
</div>
<?php if (isset($_SESSION['message'])&& ($_SESSION['message'] != '')):?>
		<div class="alert alert-success fade in alert-dismissable">
				<button type="button" class="close" data-dismiss="alert"
					aria-hidden="true">&times;</button>
								  <?php echo $_SESSION['message'];$_SESSION['message'] = ''?>
								</div>
		<?php endif;?>
<div class="row">
			
	<form method="post" action="../cambiarContraseñaDatos/" id="frmUsuario" name="frmUsuario">
		
		
		<div class="form-group col-sm-12 rows">
		<div class="form-group col-sm-4">
			<label class="control-label">Contraseña Actual</label>
			<input type="password"
				name='passwordAnterior' class='form-control'
				value="">	
		</div>
		<div class="form-group col-sm-4">
			<label class="control-label">Nueva Contraseña</label>
			<input type="password"
				name='password' class='form-control'
				value="">
	
		</div>
		<div class="form-group col-sm-4">
			<label class="control-label">Repetir Contraseña</label>
			<input type="password"
				name='password1' class='form-control'
				value="">	
		</div>
	</div>
		
		<div class="form-group rowBottom" >
		<button type="submit" class="btn btn-info">Cambiar Contraseña</button>
	</div>
		
	</form>
	</div>
	
	
<?php include_once PATH_TEMPLATE.'/footer.php';?>

<script src="<?php echo PATH_JS; ?>/bootstrapValidator.min.js"></script>
<link href="<?php echo PATH_CSS; ?>/bootstrapValidator.min.css" rel="stylesheet">

<script type="text/javascript">

$(document).ready(function() {
    $('#frmUsuario').bootstrapValidator({
    	message: 'This value is not valid',
		feedbackIcons: {
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {			
			passwordAnterior: {
				message: 'La Contraseña Anterior no es válida',
				validators: {
					notEmpty: {
						message: 'La Contraseña Anterior no puede ser vacía.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9-_ \.]+$/,
						message: 'Ingrese una Contraseña Anterior válida.'
					}
				}
			},
			password: {
				message: 'La Contraseña no es válida',
				validators: {
					notEmpty: {
						message: 'La Contraseña no puede ser vacía.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9-_ \.]+$/,
						message: 'Ingrese una Contraseña válida.'
					}
				}
			},
			password1: {
				validators: {
					notEmpty: {
						message: 'La contraseña no puede ser vacia.'
					},
					identical: {
						field: 'password',
						message: 'La contraseña debe ser la misma'
					}
				}
			},
			
		}
	});

});
</script>
<style>
.col-sm-6, .col-sm-4 {
	padding-left: 0px;
}
.rows{
	padding-right: 0px;
	}
	.rowBottom{
		padding-left: 15px;
	}
</style>
</body>
</html>