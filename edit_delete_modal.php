<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="color:#000;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel">Edit Produk</h4>
				</center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="edit.php">
						<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Produk:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Kategori:</label>
							</div>
							<div class="col-sm-10">
								<select name="category" class="form-control" required="true">
									<option value="Kaos" <?php if ($row['category'] == 'Kaos') { ?> selected <?php } ?>>Kaos</option>
									<option value="Kemeja" <?php if ($row['category'] == 'Kemeja') { ?> selected <?php } ?>>Kemeja</option>
									<option value="Jaket" <?php if ($row['category'] == 'Jaket') { ?> selected <?php } ?>>Jaket</option>
									<option value="Celana" <?php if ($row['category'] == 'Celana') { ?> selected <?php } ?>>Celana</option>
									<option value="Sepatu" <?php if ($row['category'] == 'Sepatu') { ?> selected <?php } ?>>Sepatu</option>
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Harga:</label>
							</div>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="price" value="<?php echo $row['price']; ?>" required>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Image:</label>
							</div>
							<div class="col-sm-10">
								<input type="file" class="form-control" name="image" required>
								<p><?php echo substr($row['image'], 86, 100); ?></p>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Stok:</label>
							</div>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="stock" value="<?php echo $row['stock']; ?>" required>
							</div>
						</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
				<button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
					</form>
			</div>

		</div>
	</div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="color:#000;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel">Hapus Produk</h4>
				</center>
			</div>
			<div class="modal-body">
				<p class="text-center">Are you sure you want to Delete</p>
				<h3 class="text-center"><?php echo $row['name'] . ' | ' . $row['category']; ?></h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
				<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Ya</a>
			</div>

		</div>
	</div>
</div>