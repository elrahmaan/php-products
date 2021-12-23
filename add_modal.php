<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel">Tambah Produk</h4>
				</center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="add.php" enctype="multipart/form-data">
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Produk:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="name" required>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Kategori:</label>
							</div>
							<div class="col-sm-10">
								<select name="category" class="form-control" required="true">
									<option value="Kaos">Kaos</option>
									<option value="Kemeja">Kemeja</option>
									<option value="Jaket">Jaket</option>
									<option value="Celana">Celana</option>
									<option value="Sepatu">Sepatu</option>
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Harga:</label>
							</div>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="price" required>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Image:</label>
							</div>
							<div class="col-sm-10">
								<input type="file" class="form-control" name="image" required>
							</div>
							<img class="img-preview img-fluid mb-3 col-sm-3">
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label modal-label">Stok:</label>
							</div>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="stock" required>
							</div>
						</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Batal</button>
				<button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Tambah</a>
					</form>
			</div>

		</div>
	</div>
</div>
<script>
	function previewImage() {
		const image = document.querySelector('#image');
		const imgPreview = document.querySelector('.img-preview');
		imgPreview.style.display = 'block';
		const ofReader = new FileReader();
		ofReader.readAsDataURL(image.files[0]);
		ofReader.onload = function(oFREvent) {
			imgPreview.src = oFREvent.target.result;
		}
	}
</script>