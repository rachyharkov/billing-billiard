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
					<h4 class="panel-title">Data Paket</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="box-body">
									<div class='row'>
										<div class='col-md-9'>
											<div style="padding-bottom: 10px;">
												<?php echo anchor(site_url('paket/create'), '<i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
											</div>
										</div>
									</div>
									<div class="box-body" style="overflow-x: scroll; ">
										<table id="data-table" class="table table-bordered table-hover table-td-valign-middle">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Paket</th>
													<th>Harga</th>
													<th>Menit</th>
													<th>Keterangan</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 2;

													// length of $paket_data
													$length = count($paket_data);
													?>
													<tr>
														<td>0</td>
														<td><?= $paket_data[$length - 1]->nama_paket ?></td>
														<td><?= rupiah($paket_data[$length - 1]->harga) ?></td>
														<td>Per-<?= $paket_data[$length - 1]->menit ?> Menit</td>
														<td><?= $paket_data[$length - 1]->keterangan ?></td>
														<td style="text-align:center" width="200px">
															<?php
																echo anchor(site_url('paket/update/'.encrypt_url(0)), '<i class="fa fa-pencil" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm update_data"');
															?>
														</td>
													</tr>
													<tr>
														<td>1</td>
														<td><?= $paket_data[$length - 2]->nama_paket ?></td>
														<td><?= rupiah($paket_data[$length - 2]->harga) ?></td>
														<td>Per-<?= $paket_data[$length - 2]->menit ?> Menit</td>
														<td><?= $paket_data[$length - 2]->keterangan ?></td>
														<td style="text-align:center" width="200px">
															<?php
																echo anchor(site_url('paket/update/'.encrypt_url(1)), '<i class="fa fa-pencil" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm update_data"');
															?>
														</td>
													</tr>
													<?php

													foreach ($paket_data as $paket) {
														if($paket->paket_id > 1) {
															?>
															<tr>
																<td><?= $no++ ?></td>
																<td><?php echo $paket->nama_paket ?></td>
																<td><?php echo rupiah($paket->harga)  ?></td>
																<td><?php echo $paket->menit ?> Menit</td>
																<td><?php echo $paket->keterangan ?></td>
																<td style="text-align:center" width="200px">
																	<?php
																	echo anchor(site_url('paket/update/' . encrypt_url($paket->paket_id)), '<i class="fa fa-pencil" aria-hidden="true"></i>', 'class="btn btn-primary btn-sm update_data"');
																	echo '  ';
																	echo anchor(site_url('paket/delete/' . encrypt_url($paket->paket_id)), '<i class="fa fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm delete_data" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
																	?>
																</td>
															</tr>
															<?php
														}
													?>
												<?php } ?>
											</tbody>
										</table>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
