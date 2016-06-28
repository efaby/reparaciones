<?php $title = "Listado Reparaciones";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Reparaciones</h1>
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
	<p>
		<button class="btn btn-primary" id="modalOpen" onclick="location.href='../editar/'">
			<i class="glyphicon glyphicon-plus"></i> Añadir
		</button>
	</p>
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
	    <tr>
	    <th>Identificación</th>
		    <th>Cliente</th>
		    <th>Equipo</th>
		    <th>Causa de Ingreso</th>
		    <th>Técnico</th>
		    <th>Fecha Ingreso</th>
		    <th>Estado</th>
		    <th style="text-align: center;">Acciones</th>
	    </tr>
    </thead>
    <tbody>
    	<?php foreach ($datos as $item) {
    		echo "<tr><td>".$item['identificacion']."</td>";
    		echo "<td>".$item['cliente']."</td>";
    		echo "<td>".$item['nombre']."</td>";
    		echo "<td>".$item['observacion']."</td>";
    		echo "<td>".$item['tecnico']."</td>";
    		echo "<td>".$item['fecha_ingreso']."</td>";
    		echo "<td>".$item['estado']."</td>";
    		echo "<td align='center'>";
			echo "<a href='javascript: loadModal(".$item['id'].")' class='btn btn-warning btn-sm' title='Editar' ><i class='fa fa-pencil'></i></a>";
			echo ($item['estado_id'] == 1)?"&nbsp;<a href='javascript:if(confirm(\"Está seguro que desea eliminar el elemento seleccionado?\")){redirect(".$item['id'].");}' class='btn btn-danger btn-sm' title='Eliminar'><i class='fa fa-trash'></i></a>":'';
			echo "</td>";
    	}?>
    </tbody>
    </table>
</div>

<?php include_once PATH_TEMPLATE.'/footer.php';?>   
<link href="<?php echo PATH_CSS; ?>/dataTables.bootstrap.css" rel="stylesheet">
<script src="<?php echo PATH_JS; ?>/jquery.dataTables.min.js"></script>
<script src="<?php echo PATH_JS; ?>/dataTables.bootstrap.min.js"></script>
<script src="<?php echo PATH_JS; ?>/table.js"></script>
<<script type="text/javascript">
function redirect(id){
	var url = '../eliminar/' + id;
	location.href = url;
}

</script>
</body>
</html>