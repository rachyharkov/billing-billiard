<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Dashboard</a></li>
		<li class="active">Paket</li>
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
					<h4 class="panel-title">Data PAKET</h4>
				</div>
				<div class="panel-body">
					<?php
					if($jenis_paket == 'custom') {
						?>
						<form action="<?php echo $action; ?>" method="post">
							<thead>
								<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
									<tr>
										<td>Nama Paket <?php echo form_error('nama_paket') ?></td>
										<td><input type="text" class="form-control" name="nama_paket" id="nama_paket" placeholder="Nama Paket" value="<?php echo $nama_paket; ?>" /></td>
									</tr>
									<tr>
										<td>Harga <?php echo form_error('harga') ?></td>
										<td><input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /></td>
									</tr>
									<tr>
										<td>Menit <?php echo form_error('menit') ?></td>
										<td><input type="text" class="form-control" name="menit" id="menit" placeholder="Menit" value="<?php echo $menit; ?>" /></td>
									</tr>
	
									<tr>
										<td>Keterangan <?php echo form_error('keterangan') ?></td>
										<td> <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea></td>
									</tr>
									<tr>
										<td></td>
										<td><input type="hidden" name="paket_id" value="<?php echo $paket_id; ?>" />
											<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
											<a href="<?php echo site_url('paket') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Kembali</a>
										</td>
									</tr>
							</thead>
							</table>
						</form>
						<?php
					} else {
						?>
							<form action="<?php echo $action; ?>" method="post">
							<thead>
								<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
									<tr>
										<td>Nama Paket</td>
										<td><?= $nama_paket ?></td>
									</tr>
									<tr>
										<td>Harga <?php echo form_error('harga') ?></td>
										<td>
											<input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /><br>
											<div style="display: flex; line-height: 3;"> <span style="margin-right:3px;">Per-</span><input type="text" class="form-control" name="menit" id="menit" placeholder="Menit" value="<?php echo $menit; ?>" style="width: 40px;" /> <span style="margin-left: 10px;">Menit</span></div>
										</td>
									</tr>
									<tr>
										<td></td>
										<td><input type="hidden" name="paket_id" value="<?php echo $paket_id; ?>" />
											<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
											<a href="<?php echo site_url('paket') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Kembali</a>
										</td>
									</tr>
							</thead>
							</table>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>