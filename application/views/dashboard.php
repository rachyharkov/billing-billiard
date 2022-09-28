<style>

	.wrapper-list-meja {
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		justify-content: center;
	}

	.wrapper-list-meja .meja {
		width: 300px;
		margin: 10px;
	}

	.card {
		padding: 1rem;
		border-radius: 15px;
		margin-bottom: 15px;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
		height: 100%;
    	width: 100%;
	}

	.available {
		box-shadow: rgb(26 177 58 / 20%) 0px 7px 29px 0px;
	}

	.not-available {
		box-shadow: rgb(177 26 26 / 20%) 0px 7px 29px 0px;
	}

	.btn-group-flex {
		margin-top: 15px;
		width: 100%;
		text-align: center;
		display: flex;
		justify-content: space-between;
	}
	.btn-group-flex .btn {
		height: 50px;
		width: 100%;
	}

	.btn-group-flex .btn:nth-child(1) {
		background-color: #4CAF50;
		color: white;
		display: block;
	}

	.btn-group-flex .btn:nth-child(2) {
		background-color: #f44336;
		color: white;
	}

	.btn-group-flex .btn:nth-child(3) {
		background-color: #2196F3;
		color: white;
	}


</style>

<div id="content" class="content">
	<div class="row">
		<center>
			<script type="text/javascript">
				//fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
				function tampilkanwaktu() {
					//buat object date berdasarkan waktu saat ini
					var waktu = new Date();
					//ambil nilai jam, 
					//tambahan script + "" supaya variable sh bertipe string sehingga bisa dihitung panjangnya : sh.length
					var sh = waktu.getHours() + "";
					//ambil nilai menit
					var sm = waktu.getMinutes() + "";
					//ambil nilai detik
					var ss = waktu.getSeconds() + "";
					//tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
					document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
				}
			</script>

			<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
				<center>
					<h1>
						<span id="clock"></span>
					</h1>
				</center>
				<?php
				$hari = date('l');
				/*$new = date('l, F d, Y', strtotime($Today));*/
				if ($hari == "Sunday") {
					echo "Minggu";
				} elseif ($hari == "Monday") {
					echo "Senin";
				} elseif ($hari == "Tuesday") {
					echo "Selasa";
				} elseif ($hari == "Wednesday") {
					echo "Rabu";
				} elseif ($hari == "Thursday") {
					echo ("Kamis");
				} elseif ($hari == "Friday") {
					echo "Jum'at";
				} elseif ($hari == "Saturday") {
					echo "Sabtu";
				}
				?>,
				<?php
				$tgl = date('d');
				echo $tgl;
				$bulan = date('F');
				if ($bulan == "January") {
					echo " Januari ";
				} elseif ($bulan == "February") {
					echo " Februari ";
				} elseif ($bulan == "March") {
					echo " Maret ";
				} elseif ($bulan == "April") {
					echo " April ";
				} elseif ($bulan == "May") {
					echo " Mei ";
				} elseif ($bulan == "June") {
					echo " Juni ";
				} elseif ($bulan == "July") {
					echo " Juli ";
				} elseif ($bulan == "August") {
					echo " Agustus ";
				} elseif ($bulan == "September") {
					echo " September ";
				} elseif ($bulan == "October") {
					echo " Oktober ";
				} elseif ($bulan == "November") {
					echo " November ";
				} elseif ($bulan == "December") {
					echo " Desember ";
				}
				$tahun = date('Y');
				echo $tahun;
				?>
		</center>
	</div>

	<ol class="breadcrumb pull-right">
		<li class="active">Dashboard</li>
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
					<h4 class="panel-title">Dashboard</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="wrapper-list-meja">
							<?php
								foreach($meja_list as $i) {
									?>
									<div class="meja <?= $i->in_use == 1 ? 'not-available' : 'available' ?>">
										<div class="card">
											<div class="card-header">
												<h3 class="card-title" style="font-weight: bold;"><?= $i->nama_meja ?></h3>
											</div>
											<div class="card-body">
												<table class="table">
													<tr>
														<td><b>Bill</b></td>
														<td>:</td>
														<td>-</td>
													</tr>
													<tr>
														<td style="line-height: 3;"><b>Paket</b></td>
														<td style="line-height: 3;">:</td>
														<td>
															<select class="form-control">
																<option value="">Pilih Paket</option>
																<?php
																	foreach($paket_list as $p) {
																		?>
																		<option value="<?= $p->paket_id ?>"><?= $p->nama_paket ?></option>
																		<?php
																	}
																?>
														</td>
													</tr>
													<tr>
														<td><b>Mulai</b></td>
														<td>:</td>
														<td>-</td>
													</tr>
													<tr>
														<td><b>Durasi</b></td>
														<td>:</td>
														<td>-</td>
													</tr>
													<tr>
														<td><b>Sisa</b></td>
														<td>:</td>
														<td>-</td>
													</tr>
												</table>
											</div>
											<div class="card-footer">
												<div class="btn-group-flex">
													<button class="btn btn-start-meja" data-idmeja="<?= $i->meja_id ?>" type="button">Start</button>
													<!-- <button class="btn" type="button">Order Menu</button>
													<button class="btn" type="button">Checkout</button> -->
												</div>
											</div>
										</div>
									</div>
									<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$(document).on('click','.btn-start-meja', function() {
			var id_meja = $(this).data('idmeja');
			alert('Meja ' + id_meja + ' telah diaktifkan');
			// $.ajax({
			// 	url: '<?= base_url('dashboard/start_meja') ?>',
			// 	type: 'POST',
			// 	data: {
			// 		id_meja: id_meja
			// 	},
			// 	success: function(data) {
			// 		console.log(data);
			// 	}
			// });
		})
	});
</script>