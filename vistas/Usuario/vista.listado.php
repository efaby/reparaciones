<?php $title = "Listado Usuarios";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<!-- Main row -->
<div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Usuarios</h1>
   	</div>
</div>
<div class="row">
	<p>
		<button class="btn btn-primary" onclick="javascript:location.href='editar'">
			<i class="glyphicon glyphicon-plus"></i> Añadir
		</button>
	</p>
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
	    <tr>
		    <th>Nombres</th>
		    <th>Apellidos</th>
		    <th>email</th>
		    <th>Tipo Usuario</th>
		    <th style="text-align: center;">Acciones</th>
	    </tr>
    </thead>
    <tbody>
    	<?php foreach ($datos as $item) {
    		echo "<tr><td>".$item['nombres']."</td>";
    		echo "<td>".$item['apellidos']."</td>";
    		echo "<td>".$item['email']."</td>";
    		echo "<td>".$item['tipo_usuario']."</td>";
    		echo "<td align='center'><a href='editar/".$item['id']."' class='btn btn-warning btn-sm' title='Editar' ><i class='fa fa-pencil'></i></a>
					  <a href='eliminar/".$item['id']."' class='btn btn-danger btn-sm' title='Eliminar'><i class='fa fa-trash'></i></a></td>";
    	}?>
    </tbody>
    </table>
</div>

<?php include_once PATH_TEMPLATE.'/footer.php';?>   
<link href="<?php echo PATH_CSS; ?>/dataTables.bootstrap.css" rel="stylesheet">
<script src="<?php echo PATH_JS; ?>/jquery.dataTables.min.js"></script>
<script src="<?php echo PATH_JS; ?>/dataTables.bootstrap.min.js"></script>
<script src="<?php echo PATH_JS; ?>/table.js"></script>
</body>
</html>