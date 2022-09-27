<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Dashboard</a></li>
		<li class="active">Produk</li>
	</ol>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Data PRODUK</h4>
				</div>
				<div class="panel-body">

					<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
						<thead>
							<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
								<tr>
									<td>Nama Produk <?php echo form_error('nama_produk') ?></td>
									<td><input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Nama Produk" value="<?php echo $nama_produk; ?>" /></td>
								</tr>
								<tr>
									<td>Jenis Produk<?php echo form_error('jenis_produk') ?></td>
									<td><select name="jenis_produk" class="form-control theSelect" value="<?= $jenis_produk ?>">
											<option value="">-- Pilih --</option>
											<option value="Makanan" <?php echo $jenis_produk == 'Makanan' ? 'selected' : 'null' ?>>Makanan</option>
											<option value="Minuman" <?php echo $jenis_produk == 'Minuman' ? 'selected' : 'null' ?>>Minuman</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Unit<?php echo form_error('unit_id') ?></td>
									<td>
										<select name="unit_id" class="form-control theSelect">
											<option value="">-- Pilih -- </option>
											<?php foreach ($data_unit as $key => $data) { ?>
												<?php if ($unit_id == $data->unit_id) { ?>
													<option value="<?php echo $data->unit_id ?>" selected><?php echo $data->nama_unit ?> </option>
												<?php } else { ?>
													<option value="<?php echo $data->unit_id ?>"><?php echo $data->nama_unit ?> </option>
												<?php } ?>
											<?php } ?>
										</select>
									</td>
								</tr>

								<tr>
									<td>Harga <?php echo form_error('harga') ?></td>
									<td><input type="number" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /></td>
								</tr>
								<?php if ($this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'create_action') { ?>
									<tr>
										<td>Photo <?php echo form_error('photo') ?></td>
										<td><input type="file" class="form-control" name="photo" id="photo" placeholder="photo" required="" value="" onchange="return validasiEkstensi()" />
											<!-- <div id="preview"></div> -->
										</td>
									</tr>
								<?php } else { ?>
									<div class="form-group">
										<tr>
											<td>Photo <?php echo form_error('photo') ?></td>
											<td>
												<a href="#modal-dialog" data-bs-toggle="modal"><img src="<?php echo base_url(); ?>temp/assets/img/produk/<?= $photo ?>" style="width: 150px;height: 150px;border-radius: 5%;"></img></a>
												<input type="hidden" name="photo_lama" value="<?= $photo ?>">
												<p style="color: red">Note :Pilih photo Jika Ingin Merubah photo</p>
												<input type="file" class="form-control" name="photo" id="photo" placeholder="photo" value="" onchange="return validasiEkstensi()" />
												<!-- <div id="preview"></div> -->
											</td>

										</tr>
									</div>
								<?php } ?>
								<tr>
									<td></td>
									<td><input type="hidden" name="produk_id" value="<?php echo $produk_id; ?>" />
										<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('produk') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Kembali</a>
									</td>
								</tr>
						</thead>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
