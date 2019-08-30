<div class="row">
	<div class="col-md-12">
		<form action="<?= base_url() ?>jabatan/edit/<?= $jabatan['jabatan_id'] ?>" method="post">
					
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Nama Jabatan</label>
								<input type="text" class="form-control" name="jabatan_nama" value="<?= $jabatan['jabatan_nama'] ?>">
							</div>
							<button class="btn btn-success btn-sm float-right" type="submit" name="submit">Update</button>
							<a class="btn btn-light btn-sm mr-2 float-right" href="javascript:history.back()">Cancel</a>
						</div>


		</form>
	</div>
</div>