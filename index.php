<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="icon" href="polinema.png">
	<title>elrahmaan - Products Management</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
	<style>
		.height10 {
			height: 10px;
		}

		.mtop10 {
			margin-top: 10px;
		}

		.modal-label {
			position: relative;
			top: 7px
		}
	</style>
</head>

<body style="background-color: #1e272e;">
	<div class="bg-animation-effect">
	</div>
	<div class="container" style="color: #FFF;">
		<h1 class="page-header text-center" style="color: #36BCF7FF;">Products Management</h1>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="row">
					<?php
					if (isset($_SESSION['error'])) {
						echo
						"
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						" . $_SESSION['error'] . "
					</div>
					";
						unset($_SESSION['error']);
					}
					if (isset($_SESSION['success'])) {
						echo
						"
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						" . $_SESSION['success'] . "
					</div>
					";
						unset($_SESSION['success']);
					}
					?>
				</div>
				<div class="row">
					<a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New</a>
				</div>
				<div class="height10">
				</div>
				<div class="row">
					<table id="myTable" class="table table-bordered">
						<thead>
							<th>No</th>
							<th>Produk</th>
							<th>Kategori</th>
							<th>Harga</th>
							<th>Gambar</th>
							<th>Stok</th>
							<th>Aksi</th>
						</thead>
						<tbody align="center">
							<?php
							$nomor = 1;
							include_once('connection.php');
							$sql = "SELECT * FROM products";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while ($row = $query->fetch_assoc()) {
								echo
								"<tr>
									<td>" . $nomor++ . "</td>
									<td>" . $row['name'] . "</td>
									<td>" . $row['category'] . "</td>
									<td>Rp " . number_format($row['price'], 0, ',', '.') . "</td>
									<td><img src='" . $row['image'] . "' width='40'/></td>
									<td>" . $row['stock'] . "</td>
									<td align='center'>
										<a href='#edit_" . $row['id'] . "' class='btn btn-warning btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
										<a href='#delete_" . $row['id'] . "' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
									</td>
								</tr>";
								include('edit_delete_modal.php');
							}
							/////////////////

							//use for MySQLi Procedural
							// $query = mysqli_query($conn, $sql);
							// while($row = mysqli_fetch_assoc($query)){
							// 	echo
							// 	"<tr>
							// 		<td>".$row['id']."</td>
							// 		<td>".$row['name']."</td>
							// 		<td>".$row['email']."</td>
							// 		<td>".$row['address']."</td>
							// 		<td>
							// 			<a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
							// 			<a href='#delete_".$row['id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
							// 		</td>
							// 	</tr>";
							// 	include('edit_delete_modal.php');
							// }
							/////////////////

							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php include('add_modal.php') ?>

	<script src="jquery/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="datatable/jquery.dataTables.min.js"></script>
	<script src="datatable/dataTable.bootstrap.min.js"></script>
	<script src="bootstrap/js/script.js"></script>
	<!-- generate datatable on our table -->
	<script>
		$(document).ready(function() {
			//inialize datatable
			$('#myTable').DataTable();

			//hide alert
			$(document).on('click', '.close', function() {
				$('.alert').hide();
			})
		});
	</script>

</body>
<footer>
	<div class="PP">
		<p style="color:#FFF;">Developed By:<a href="https://github.com/elrahmaan" target="_blank" style="color: #36BCF7FF;"> <strong>elrahmaan</strong></a></p>
	</div>
</footer>
<style>
	.PP {
		text-align: center;
	}
</style>

</html>