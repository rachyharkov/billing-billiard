<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Dashboard</a></li>
		<li class="active">Barang</li>
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
					<h4 class="panel-title">Data BARANG</h4>
				</div>
				<div class="panel-body">
					<form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<!-- text input -->
									<div class="form-group">
										<label class="text-muted">Kode Barang</label>

										<?php if ($this->uri->segment(2) == 'update' || $this->uri->segment(2) == 'update_action') { ?>
											<input type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?= $kode_barang ?>" readonly>
										<?php } else { ?>
											<input type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?php echo $autoNo; ?>" readonly>
										<?php } ?>

										<?php echo form_error('kode_barang') ?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-muted">Nama Barang</label>
										<input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>">
										<?php echo form_error('nama_barang') ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6" data-select2-id="4">
									<!-- text input -->
									<div class="form-group" data-select2-id="3">
										<label class="text-muted">Jenis Barang</label>
										<select name="jenis_barang_id" class="form-control theSelect">
											<option value="">-- Pilih -- </option>
											<?php foreach ($jenis_barang as $key => $data) { ?>
												<?php if ($jenis_barang_id == $data->jenis_barang_id) { ?>
													<option value="<?php echo $data->jenis_barang_id ?>" selected><?php echo $data->nama_jenis_barang ?></option>
												<?php } else { ?>
													<option value="<?php echo $data->jenis_barang_id ?>"><?php echo $data->nama_jenis_barang ?></option>
												<?php } ?>
											<?php } ?>
										</select>
										<?php echo form_error('jenis_barang_id') ?>
									</div>

									<div class="form-group">
										<label class="text-muted">Kondisi Detail Barang</label>
										<textarea class="form-control" id="detail_kondisi" name="detail_kondisi" placeholder="Kondisi Detail Barang" rows="7"><?php echo $detail_kondisi; ?></textarea>
										<?php echo form_error('detail_kondisi') ?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-muted">Kelengkapan Barang</label>
										<div class="row">
											<div class="col-md-4">
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_unit" name="checklist_barang[]" value="CHECKLIST_UNIT" <?= cekChecked($barang_id, 'CHECKLIST_UNIT') ?>>
													<label for="checklist_unit" class="custom-control-label text-muted">Unit</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_kotak" name="checklist_barang[]" value="CHECKLIST_KOTAK" <?= cekChecked($barang_id, 'CHECKLIST_KOTAK') ?>>
													<label for="checklist_kotak" class="custom-control-label text-muted">Kotak</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_charger" name="checklist_barang[]" value="CHECKLIST_CHARGER" <?= cekChecked($barang_id, 'CHECKLIST_CHARGER') ?>>
													<label for="checklist_charger" class="custom-control-label text-muted">Charger</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_headphone" name="checklist_barang[]" value="CHECKLIST_HEADPHONE" <?= cekChecked($barang_id, 'CHECKLIST_HEADPHONE') ?>>
													<label for="checklist_headphone" class="custom-control-label text-muted">Headphone / Headset</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_buku_panduan" name="checklist_barang[]" value="CHECKLIST_BUKU_PANDUAN" <?= cekChecked($barang_id, 'CHECKLIST_BUKU_PANDUAN') ?>>
													<label for="checklist_buku_panduan" class="custom-control-label text-muted">Buku Panduan</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_kartu_garansi" name="checklist_barang[]" value="CHECKLIST_KARTU_GARANSI" <?= cekChecked($barang_id, 'CHECKLIST_KARTU_GARANSI') ?>>
													<label for="checklist_kartu_garansi" class="custom-control-label text-muted">Kartu Garansi</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_nota_beli" name="checklist_barang[]" value="CHECKLIST_NOTA_BELI" <?= cekChecked($barang_id, 'CHECKLIST_NOTA_BELI') ?>>
													<label for="checklist_nota_beli" class="custom-control-label text-muted">Nota Beli</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_tas" name="checklist_barang[]" value="CHECKLIST_TAS" <?= cekChecked($barang_id, 'CHECKLIST_TAS') ?>>
													<label for="checklist_tas" class="custom-control-label text-muted">Tas</label>
												</div>
											</div>
											<div class="col-md-4">
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_battery_cadangan" name="checklist_barang[]" value="CHECKLIST_BATTERY_CADANGAN" <?= cekChecked($barang_id, 'CHECKLIST_BATTERY_CADANGAN') ?>>
													<label for="checklist_battery_cadangan" class="custom-control-label text-muted">Battery Cadangan</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_mouse" name="checklist_barang[]" value="CHECKLIST_MOUSE" <?= cekChecked($barang_id, 'CHECKLIST_MOUSE') ?>>
													<label for="checklist_mouse" class="custom-control-label text-muted">Mouse</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_keyboard" name="checklist_barang[]" value="CHECKLIST_KEYBOARD" <?= cekChecked($barang_id, 'CHECKLIST_KEYBOARD') ?>>
													<label for="checklist_keyboard" class="custom-control-label text-muted">Keyboard</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_remote" name="checklist_barang[]" value="CHECKLIST_REMOTE" <?= cekChecked($barang_id, 'CHECKLIST_REMOTE') ?>>
													<label for="checklist_remote" class="custom-control-label text-muted">Remote</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_bracket" name="checklist_barang[]" value="CHECKLIST_BRACKET" <?= cekChecked($barang_id, 'CHECKLIST_BRACKET') ?>>
													<label for="checklist_bracket" class="custom-control-label text-muted">Bracket</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_kaki" name="checklist_barang[]" value="CHECKLIST_KAKI" <?= cekChecked($barang_id, 'CHECKLIST_KAKI') ?>>
													<label for="checklist_kaki" class="custom-control-label text-muted">Kaki</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_lensa" name="checklist_barang[]" value="CHECKLIST_LENSA" <?= cekChecked($barang_id, 'CHECKLIST_LENSA') ?>>
													<label for="checklist_lensa" class="custom-control-label text-muted">Lensa</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_memory_card" name="checklist_barang[]" value="CHECKLIST_MEMORY_CARD" <?= cekChecked($barang_id, 'CHECKLIST_MEMORY_CARD') ?>>
													<label for="checklist_memory_card" class="custom-control-label text-muted">Memory Card</label>
												</div>
											</div>
											<div class="col-md-4">
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_kabel_data" name="checklist_barang[]" value="CHECKLIST_KABEL_DATA" <?= cekChecked($barang_id, 'CHECKLIST_KABEL_DATA') ?>>
													<label for="checklist_kabel_data" class="custom-control-label text-muted">Kabel Data</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_case" name="checklist_barang[]" value="CHECKLIST_CASE" <?= cekChecked($barang_id, 'CHECKLIST_CASE') ?>>
													<label for="checklist_case" class="custom-control-label text-muted">Case/Casing</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_tripod" name="checklist_barang[]" value="CHECKLIST_TRIPOD" <?= cekChecked($barang_id, 'CHECKLIST_TRIPOD') ?>>
													<label for="checklist_tripod" class="custom-control-label text-muted">Tripod</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_monitor" name="checklist_barang[]" value="CHECKLIST_MONITOR" <?= cekChecked($barang_id, 'CHECKLIST_MONITOR') ?>>
													<label for="checklist_monitor" class="custom-control-label text-muted">Monitor</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_cpu" name="checklist_barang[]" value="CHECKLIST_CPU" <?= cekChecked($barang_id, 'CHECKLIST_CPU') ?>>
													<label for="checklist_cpu" class="custom-control-label text-muted">CPU</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_stick" name="checklist_barang[]" value="CHECKLIST_STICK" <?= cekChecked($barang_id, 'CHECKLIST_STICK') ?>>
													<label for="checklist_stick" class="custom-control-label text-muted">Stick</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_hd_external" name="checklist_barang[]" value="CHECKLIST_HD_EXTERNAL" <?= cekChecked($barang_id, 'CHECKLIST_HD_EXTERNAL') ?>>
													<label for="checklist_hd_external" class="custom-control-label text-muted">HD External</label>
												</div>
												<div class="custom-control custom-checkbox">
													<input class="custom-control-input" type="checkbox" id="checklist_kabel_power" name="checklist_barang[]" value="CHECKLIST_KABEL_POWER" <?= cekChecked($barang_id, 'CHECKLIST_KABEL_POWER') ?>>
													<label for="checklist_kabel_power" class="custom-control-label text-muted">Kabel Power</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<label class="text-muted">Foto Pendukung</label>
							<div class="row">
								<div class="col-sm-3 col-md-3">
									<div class="form-group text-center">
										<?php $query1 = $this->db->query("SELECT * from barang_pic where barang_id='$barang_id' and remark='gambar1'");
										if ($query1->num_rows() > 0) {
											$gambar1 = $query1->row();
											$photo1 = $gambar1->photo;
										} else {
											$photo1 = null;
										} ?>

										<?php if ($photo1 != null || $photo1 != '') { ?>
											<a href="<?= base_url() ?>temp/barang/<?= $photo1 ?>" target="_blank"><img src="<?= base_url() ?>temp/barang/<?= $photo1 ?>" style="width: 100%;height:200px" id="thum_gambar1"></a>
										<?php } else { ?>
											<img src="https://via.placeholder.com/300x200/e9ecef?text=Foto 1" style="width: 100%;height:200px" id="thum_gambar1">
										<?php } ?>


										<span id="preview"></span>
										<input type="file" class="form-control" name="gambar1" id="gambar1" value="" onchange="return validasiEkstensi1()">
									</div>
								</div>
								<div class="col-sm-3 col-md-3">
									<div class="form-group text-center">
										<?php $query2 = $this->db->query("SELECT * from barang_pic where barang_id='$barang_id' and remark='gambar2'");
										if ($query2->num_rows() > 0) {
											$gambar2 = $query2->row();
											$photo2 = $gambar2->photo;
										} else {
											$photo2 = null;
										} ?>

										<?php if ($photo2 != null || $photo2 != '') { ?>
											<a href="<?= base_url() ?>temp/barang/<?= $photo2 ?>" target="_blank"><img src="<?= base_url() ?>temp/barang/<?= $photo2 ?>" style="width: 100%;height:200px" id="thum_gambar2"></a>
										<?php } else { ?>
											<img src="https://via.placeholder.com/300x200/e9ecef?text=Foto 2" style="width: 100%;height:200px" id="thum_gambar2">
										<?php } ?>
										<span id="preview2"></span>
										<input type="file" class="form-control" name="gambar2" id="gambar2" value="" onchange="return validasiEkstensi2()">
									</div>
								</div>
								<div class="col-sm-3 col-md-3">
									<div class="form-group text-center">
										<?php $query3 = $this->db->query("SELECT * from barang_pic where barang_id='$barang_id' and remark='gambar3'");
										if ($query3->num_rows() > 0) {
											$gambar3 = $query3->row();
											$photo3 = $gambar3->photo;
										} else {
											$photo3 = null;
										} ?>

										<?php if ($photo3 != null || $photo3 != '') { ?>
											<a href="<?= base_url() ?>temp/barang/<?= $photo3 ?>" target="_blank"><img src="<?= base_url() ?>temp/barang/<?= $photo3 ?>" style="width: 100%;height:200px" id="thum_gambar3"></a>
										<?php } else { ?>
											<img src="https://via.placeholder.com/300x200/e9ecef?text=Foto 3" style="width: 100%;height:200px" id="thum_gambar3">
										<?php } ?>
										<span id="preview3"></span>
										<input type="file" class="form-control" name="gambar3" id="gambar3" value="" onchange="return validasiEkstensi3()">
									</div>
								</div>
								<div class="col-sm-3 col-md-3">
									<div class="form-group text-center">
										<?php $query4 = $this->db->query("SELECT * from barang_pic where barang_id='$barang_id' and remark='gambar4'");
										if ($query4->num_rows() > 0) {
											$gambar4 = $query4->row();
											$photo4 = $gambar4->photo;
										} else {
											$photo4 = null;
										} ?>

										<?php if ($photo4 != null || $photo4 != '') { ?>
											<a href="<?= base_url() ?>temp/barang/<?= $photo4 ?>" target="_blank"><img src="<?= base_url() ?>temp/barang/<?= $photo4 ?>" style="width: 100%;height:200px" id="thum_gambar4"></a>
										<?php } else { ?>
											<img src="https://via.placeholder.com/300x200/e9ecef?text=Foto 4" style="width: 100%;height:200px" id="thum_gambar4">
										<?php } ?>
										<span id="preview4"></span>
										<input type="file" class="form-control" name="gambar4" id="gambar4" value="" onchange="return validasiEkstensi4()">
									</div>
								</div>
								<div class="col-sm-3 col-md-3">
									<div class="form-group text-center">
										<?php $query5 = $this->db->query("SELECT * from barang_pic where barang_id='$barang_id' and remark='gambar5'");
										if ($query5->num_rows() > 0) {
											$gambar5 = $query5->row();
											$photo5 = $gambar5->photo;
										} else {
											$photo5 = null;
										} ?>

										<?php if ($photo5 != null || $photo5 != '') { ?>
											<a href="<?= base_url() ?>temp/barang/<?= $photo5 ?>" target="_blank"><img src="<?= base_url() ?>temp/barang/<?= $photo5 ?>" style="width: 100%;height:200px" id="thum_gambar5"></a>
										<?php } else { ?>
											<img src="https://via.placeholder.com/300x200/e9ecef?text=Foto 5" style="width: 100%;height:200px" id="thum_gambar5">
										<?php } ?>
										<span id="preview5"></span>
										<input type="file" class="form-control" name="gambar5" id="gambar5" value="" onchange="return validasiEkstensi5()">
									</div>
								</div>
								<div class="col-sm-3 col-md-3">
									<div class="form-group text-center">
										<?php $query6 = $this->db->query("SELECT * from barang_pic where barang_id='$barang_id' and remark='gambar6'");
										if ($query6->num_rows() > 0) {
											$gambar6 = $query6->row();
											$photo6 = $gambar6->photo;
										} else {
											$photo6 = null;
										} ?>

										<?php if ($photo6 != null || $photo6 != '') { ?>
											 <a href="<?= base_url() ?>temp/barang/<?= $photo6 ?>" target="_blank"><img src="<?= base_url() ?>temp/barang/<?= $photo6 ?>" style="width: 100%;height:200px" id="thum_gambar6"></a> 
										<?php } else { ?>
											<img src="https://via.placeholder.com/300x200/e9ecef?text=Foto 6" style="width: 100%;height:200px" id="thum_gambar6">
										<?php } ?>
										<span id="preview6"></span>
										<input type="file" class="form-control" name="gambar6" id="gambar6" value="" onchange="return validasiEkstensi6()">
									</div>
								</div>
								<div class="col-sm-3 col-md-3">
									<div class="form-group text-center">
										<?php $query7 = $this->db->query("SELECT * from barang_pic where barang_id='$barang_id' and remark='gambar7'");
										if ($query7->num_rows() > 0) {
											$gambar7 = $query7->row();
											$photo7 = $gambar7->photo;
										} else {
											$photo7 = null;
										} ?>

										<?php if ($photo7 != null || $photo7 != '') { ?>
											 <a href="<?= base_url() ?>temp/barang/<?= $photo7 ?>" target="_blank"><img src="<?= base_url() ?>temp/barang/<?= $photo7 ?>" style="width: 100%;height:200px" id="thum_gambar7"></a> 
										<?php } else { ?>
											<img src="https://via.placeholder.com/300x200/e9ecef?text=Foto 4" style="width: 100%;height:200px" id="thum_gambar7">
										<?php } ?>
										<span id="preview7"></span>
										<input type="file" class="form-control" name="gambar7" id="gambar7" value="" onchange="return validasiEkstensi7()">
									</div>
								</div>
								<div class="col-sm-3 col-md-3">
									<div class="form-group text-center">
										<?php $query8 = $this->db->query("SELECT * from barang_pic where barang_id='$barang_id' and remark='gambar8'");
										if ($query8->num_rows() > 0) {
											$gambar8 = $query8->row();
											$photo8 = $gambar8->photo;
										} else {
											$photo8 = null;
										} ?>

										<?php if ($photo8 != null || $photo8 != '') { ?>
											 <a href="<?= base_url() ?>temp/barang/<?= $photo8 ?>" target="_blank"><img src="<?= base_url() ?>temp/barang/<?= $photo8 ?>" style="width: 100%;height:200px" id="thum_gambar8"></a> 
										<?php } else { ?>
											<img src="https://via.placeholder.com/300x200/e9ecef?text=Foto 8" style="width: 100%;height:200px" id="thum_gambar8">
										<?php } ?>
										<span id="preview8"></span>
										<input type="file" class="form-control" name="gambar8" id="gambar8" value="" onchange="return validasiEkstensi8()">
									</div>
								</div>
								<!-- <div class="col-sm-3 col-md-3">
									<div class="form-group text-center">
										<img src="https://via.placeholder.com/300x200/e9ecef?text=Foto 9" style="width: 100%;height:200px" id="thum_gambar9">
										<input type="file" class="form-control" name="photo_ktp" id="photo_ktp"  value="" onchange="return validasiEkstensi9()">
									</div>
								</div>
								<div class="col-sm-3 col-md-3">
									<div class="form-group text-center">
										<img src="https://via.placeholder.com/300x200/e9ecef?text=Foto 10" style="width: 100%;height:200px" id="thum_gambar10">
										<input type="file" class="form-control" name="photo_ktp" id="photo_ktp"  value="" onchange="return validasiEkstensi10()">
									</div>
								</div>
								<div class="col-sm-3 col-md-3">
									<div class="form-group text-center">
										<img src="https://via.placeholder.com/300x200/e9ecef?text=Foto 11" style="width: 100%;height:200px" id="thum_gambar11">
										<input type="file" class="form-control" name="photo_ktp" id="photo_ktp"  value="" onchange="return validasiEkstensi11()">
									</div>
								</div>
								<div class="col-sm-3 col-md-3">
									<div class="form-group text-center">
										<img src="https://via.placeholder.com/300x200/e9ecef?text=Foto 12" style="width: 100%;height:200px" id="thum_gambar12">
										<input type="file" class="form-control" name="photo_ktp" id="photo_ktp"  value="" onchange="return validasiEkstensi12()">
									</div>
								</div> -->
							</div>
							<input type="hidden" readonly name="barang_id" value="<?= $barang_id ?>">
							<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
							<a href="<?php echo site_url('barang') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Kembali</a>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<script type="text/javascript">
	function validasiEkstensi1() {
		var inputFile = document.getElementById('gambar1');
		var pathFile = inputFile.value;
		var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
		if (!ekstensiOk.exec(pathFile)) {
			alert('Silakan upload file yang memiliki ekstensi jpeg/jpg/png');
			inputFile.value = '';
			return false;
		} else {
			if (inputFile.files && inputFile.files[0]) {
				document.getElementById("thum_gambar1").style.display = "none";
				var reader = new FileReader();
				reader.onload = function(e) {
					document.getElementById('preview').innerHTML = '<img src="' + e.target.result + '" style="width:100%; height:200px"/>';
				};
				reader.readAsDataURL(inputFile.files[0]);

			}
		}
	}

	function validasiEkstensi2() {
		var inputFile = document.getElementById('gambar2');
		var pathFile = inputFile.value;
		var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
		if (!ekstensiOk.exec(pathFile)) {
			alert('Silakan upload file yang memiliki ekstensi jpeg/jpg/png');
			inputFile.value = '';
			return false;
		} else {
			if (inputFile.files && inputFile.files[0]) {
				document.getElementById("thum_gambar2").style.display = "none";
				var reader = new FileReader();
				reader.onload = function(e) {
					document.getElementById('preview2').innerHTML = '<img src="' + e.target.result + '" style="width:100%; height:200px"/>';
				};
				reader.readAsDataURL(inputFile.files[0]);

			}
		}
	}

	function validasiEkstensi3() {
		var inputFile = document.getElementById('gambar3');
		var pathFile = inputFile.value;
		var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
		if (!ekstensiOk.exec(pathFile)) {
			alert('Silakan upload file yang memiliki ekstensi jpeg/jpg/png');
			inputFile.value = '';
			return false;
		} else {
			if (inputFile.files && inputFile.files[0]) {
				document.getElementById("thum_gambar3").style.display = "none";
				var reader = new FileReader();
				reader.onload = function(e) {
					document.getElementById('preview3').innerHTML = '<img src="' + e.target.result + '" style="width:100%; height:200px"/>';
				};
				reader.readAsDataURL(inputFile.files[0]);

			}
		}
	}

	function validasiEkstensi4() {
		var inputFile = document.getElementById('gambar4');
		var pathFile = inputFile.value;
		var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
		if (!ekstensiOk.exec(pathFile)) {
			alert('Silakan upload file yang memiliki ekstensi jpeg/jpg/png');
			inputFile.value = '';
			return false;
		} else {
			if (inputFile.files && inputFile.files[0]) {
				document.getElementById("thum_gambar4").style.display = "none";
				var reader = new FileReader();
				reader.onload = function(e) {
					document.getElementById('preview4').innerHTML = '<img src="' + e.target.result + '" style="width:100%; height:200px"/>';
				};
				reader.readAsDataURL(inputFile.files[0]);

			}
		}
	}

	function validasiEkstensi5() {
		var inputFile = document.getElementById('gambar5');
		var pathFile = inputFile.value;
		var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
		if (!ekstensiOk.exec(pathFile)) {
			alert('Silakan upload file yang memiliki ekstensi jpeg/jpg/png');
			inputFile.value = '';
			return false;
		} else {
			if (inputFile.files && inputFile.files[0]) {
				document.getElementById("thum_gambar5").style.display = "none";
				var reader = new FileReader();
				reader.onload = function(e) {
					document.getElementById('preview5').innerHTML = '<img src="' + e.target.result + '" style="width:100%; height:200px"/>';
				};
				reader.readAsDataURL(inputFile.files[0]);

			}
		}
	}

	function validasiEkstensi6() {
		var inputFile = document.getElementById('gambar6');
		var pathFile = inputFile.value;
		var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
		if (!ekstensiOk.exec(pathFile)) {
			alert('Silakan upload file yang memiliki ekstensi jpeg/jpg/png');
			inputFile.value = '';
			return false;
		} else {
			if (inputFile.files && inputFile.files[0]) {
				document.getElementById("thum_gambar6").style.display = "none";
				var reader = new FileReader();
				reader.onload = function(e) {
					document.getElementById('preview6').innerHTML = '<img src="' + e.target.result + '" style="width:100%; height:200px"/>';
				};
				reader.readAsDataURL(inputFile.files[0]);

			}
		}
	}

	function validasiEkstensi7() {
		var inputFile = document.getElementById('gambar7');
		var pathFile = inputFile.value;
		var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
		if (!ekstensiOk.exec(pathFile)) {
			alert('Silakan upload file yang memiliki ekstensi jpeg/jpg/png');
			inputFile.value = '';
			return false;
		} else {
			if (inputFile.files && inputFile.files[0]) {
				document.getElementById("thum_gambar7").style.display = "none";
				var reader = new FileReader();
				reader.onload = function(e) {
					document.getElementById('preview7').innerHTML = '<img src="' + e.target.result + '" style="width:100%; height:200px"/>';
				};
				reader.readAsDataURL(inputFile.files[0]);

			}
		}
	}

	function validasiEkstensi8() {
		var inputFile = document.getElementById('gambar8');
		var pathFile = inputFile.value;
		var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
		if (!ekstensiOk.exec(pathFile)) {
			alert('Silakan upload file yang memiliki ekstensi jpeg/jpg/png');
			inputFile.value = '';
			return false;
		} else {
			if (inputFile.files && inputFile.files[0]) {
				document.getElementById("thum_gambar8").style.display = "none";
				var reader = new FileReader();
				reader.onload = function(e) {
					document.getElementById('preview8').innerHTML = '<img src="' + e.target.result + '" style="width:100%; height:200px"/>';
				};
				reader.readAsDataURL(inputFile.files[0]);

			}
		}
	}
</script>
