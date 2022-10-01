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
		position: relative;
	}

	.wrapper-list-meja .meja .loading-state-meja {
		position: absolute;
		top: 0;
		width: 100%;
		display: flex;
		margin: auto;
		height: 100%;
		background: #ffffffa6;
		font-size: 55px;
	}

	.wrapper-list-meja .meja .loading-state-meja .loading-state-meja-inner {
		margin: auto;
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

	.pending {
		box-shadow: rgb(177 26 26 / 20%) 0px 7px 29px 0px;
	}
	
	.not-available {
		box-shadow: rgb(255 193 7 / 20%) 0px 7px 29px 0px;
	}

	.btn-group-flex {
		margin-top: 15px;
		width: 100%;
		text-align: center;
		display: flex;
		justify-content: space-between;
		gap: 2px;
	}
	.btn-group-flex .btn {
		height: 50px;
		width: 100%;
		visibility: hidden;
	}

	.btn-group-flex .btn-start-sewa {
		background-color: #4CAF50;
		color: white;
		display: block;
	}

	.btn-group-flex .btn-tambah-billing {
		background-color: #4CAF50;
		color: white;
		display: block;
	}

	.btn-group-flex .btn-checkout {
		background-color: #f44336;
		color: white;
	}

	.btn-group-flex .btn-order-menu {
		background-color: #2196F3;
		color: white;
	}

	.kotag {
		width: 285px;
		position: absolute;
		background: white;
		border: 1px black solid;
		padding: 10px;
	}

</style>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
									<div id="meja-<?= $i->meja_id ?>" class="meja meja_div <?= $i->in_use ? '' : 'available' ?>">
										<div class="loading-state-meja">
											<div class="loading-state-meja-inner">
												<i class="fa fa-spinner fa-spin"></i>
											</div>
										</div>
										<div class="card">
											<form class="form-meja" data-idmeja="<?= $i->meja_id ?>">
												<div class="card-header">
													<h3 class="card-title" style="font-weight: bold;"><?= $i->nama_meja ?></h3>
												</div>
												<div class="card-body">
													<table class="table">
														<tr>
															<td><b>Bill</b></td>
															<td>:</td>
															<td><span class="bill-id">-</span></td>
														</tr>
														<tr>
															<td style="line-height: 3;"><b>Paket</b></td>
															<td style="line-height: 3;">:</td>
															<td>
																<select class="select-paket" style="width: 100%;">
																	<?php
																		foreach($paket_list as $p) {
																			?>
																			<option value="<?= $p->paket_id ?>" ><?= $p->nama_paket ?></option>
																			<?php
																		}
																	?>
																</select>
															</td>
														</tr>
														<tr>
															<td><b>Mulai</b></td>
															<td>:</td>
															<td><span class="start-time">-</span></td>
														</tr>
														<tr>
															<td><b>Durasi</b></td>
															<td>:</td>
															<td><span class="duration-time">-</span></td>
														</tr>
														<tr>
															<td><b>Sisa</b></td>
															<td>:</td>
															<td><span class="left-time">-</span></td>
														</tr>
													</table>
												</div>
												<div class="card-footer">
													<div class="btn-group-flex">
														<button class="btn btn-start-sewa" type="submit">Start</button>
													</div>
												</div>
											</form>
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

<!-- create modal tambah-billing -->
<div class="modal fade" id="modal-tambah-billing" tabindex="-1" role="dialog" aria-labelledby="modal-tambah-billing" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<form id="form-tambah-billing" class="form">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-tambah-billing">Tambah Billing <span id="id_billing_text"></span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<select class="select-paket" style="width: 100%;" name="id_paket">
							<?php
								foreach($paket_list as $p) {
									?>
									<option value="<?= $p->paket_id ?>" ><?= $p->nama_paket ?> (+<?= $p->menit ?> Menit)</option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<input type="text" name="id_billing" id="id_billing" value="">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" id="tambah-billing-action">Tambah</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script>

	function durasi(start, end) {

		var start = new Date(start);
		var end = new Date(end);

		var diff = end - start;

		var days = Math.floor(diff / (1000 * 60 * 60 * 24));
		var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((diff % (1000 * 60)) / 1000);

		return hours + " Jam " + minutes + " Menit " + seconds + " Detik";
	}

	function totalSeconds(start, end) {
		
		var start = new Date(start);
		var end = new Date(end);

		var diff = end - start;

		var total_seconds = Math.floor(diff / 1000);

		return total_seconds;
	}

	function timeLeft(start, end) {

		var start = new Date(start);
		var end = new Date(end);

		var diff = end - start;

		var days = Math.floor(diff / (1000 * 60 * 60 * 24));
		var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((diff % (1000 * 60)) / 1000);
		var total_seconds = Math.floor(diff / 1000);

		return hours + " Jam " + minutes + " Menit " + seconds + " Detik";
	}

	function hideLoadingState() {
		$('.loading-state-meja').hide();
		$('.btn-group-flex .btn').css('visibility', 'visible');
	}

	function hideSpecifiedLoadingState(id) {
		$('#meja-' + id + ' .loading-state-meja').hide();
		$('#meja-' + id + ' .btn-group-flex .btn').css('visibility', 'visible');
	}

	function showSpecifiedLoadingState(id) {
		$('#meja-' + id + ' .loading-state-meja').show();
		$('#meja-' + id + ' .btn-group-flex .btn').css('visibility', 'hidden');
	}

	arrayTimerDurasi = new Array();
	arrayTimerLeft = new Array();
	// loop through all meja
	$('.meja_div').each(function(index, el) {
		// push null to arrayTimerDurasi
		arrayTimerDurasi.push(null);
		// push null to arrayTimerLeft
		arrayTimerLeft.push(null);
	})

	function removeInterval(id) {
		clearInterval(arrayTimerDurasi[id]);
		clearInterval(arrayTimerLeft[id]);
	}

	function tambahBilling() {
		
	}
	
	function setDurasiAndSisa(index, start, end, meja_id = null) {

		meja_id = meja_id == null ? index : meja_id;
		
		if (arrayTimerDurasi[index] != null) {
			clearInterval(arrayTimerDurasi[index]);
		}
		if (arrayTimerLeft[index] != null) {
			clearInterval(arrayTimerLeft[index]);
		}

		var mejaDiv = $('.meja_div').eq(meja_id);
		var totalseconds = totalSeconds(new Date(), end)

		if(totalseconds <= 0) {
			alert('ADA YANG ABIS! Meja : ' + mejaDiv.find('.card-title').text())
			mejaDiv.addClass('pending');

			durasimaenterakhir = durasi(start, end)

			mejaDiv.find('.duration-time').text(durasimaenterakhir);
			mejaDiv.find('.left-time').text(0 + ' jam ' + 0 + ' menit ' + 0 + ' detik');
			mejaDiv.find('.btn-group-flex').html(`
				<button class="btn btn-tambah-billing" type="button">Tambah</button>
				<button class="btn btn-order-menu" type="button">Order Menu</button>
				<button class="btn btn-checkout" type="button">Checkout</button>
			`)
		} else {
			mejaDiv.removeClass('pending');
			mejaDiv.addClass('not-available')
			arrayTimerDurasi[index] = setInterval(function() {
				mejaDiv.find('.duration-time').text(durasi(start, new Date()));
			}, 1000);

			arrayTimerLeft[index] = setInterval(function() {
				mejaDiv.find('.left-time').text(timeLeft(new Date(), end));
			}, 1000);

			mejaDiv.find('.btn-group-flex').html(`
				<button class="btn btn-tambah-billing" type="button">Tambah</button>
				<button class="btn btn-order-menu" type="button">Order Menu</button>
				<button class="btn btn-checkout" type="button">Checkout</button>
			`)
		}
	}

	function getMejaStatusTimer() {
		$.ajax({
			url: '<?= base_url('meja/getMejaStatusTimer') ?>',
			type: 'GET',
			success: function(data) {
				// console.log(data)
				var dt = JSON.parse(data)

				// loop through dt
				$.each(dt, function(index, val) {
					// console.log(val)
					// set durasi and sisa
					var mejaDiv = $('#meja-' + val.meja_id);
					setDurasiAndSisa(index, val.start_time, val.end_time, val.meja_id - 1);
					
					// find meja div index

					mejaDiv.find('.select-paket').val(val.paket_id).trigger('change');

					mejaDiv.find('.select-paket').prop('disabled', true);

					mejaDiv.find('.bill-id').html(val.bill_id)
					mejaDiv.find('.start-time').html(val.start_time)

				});
				hideLoadingState()
			}
		});
	}

	$(document).ready(function() {
		getMejaStatusTimer()

		$('.select-paket').select2();

		$(document).on('click', '.btn-checkout', function(e) {
			var mejadiv = $(this).parents('.meja_div');
			var meja_id = mejadiv.find('.form-meja').data('idmeja');
			
			// sweetalert confirm checkout
			Swal.fire({
				title: 'Checkout Meja ' + meja_id + '?',
				text: "Pastikan semua beres",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, checkout!'
			}).then((result) => {
				if (result.value) {
					// show loading state
					showSpecifiedLoadingState(meja_id);
					// ajax checkout
					$.ajax({
						url: '<?= base_url('meja/checkout') ?>',
						type: 'POST',
						data: {
							meja_id: meja_id
						},
						success: function(data) {
							// console.log(data)
							var dt = JSON.parse(data)

							// open new tab to print
							var win = window.open('<?= base_url('billing/print/') ?>' + dt.bill_id, '_blank');
							win.focus();

							if (dt.status == 'success') {
								// hide loading state
								hideSpecifiedLoadingState(meja_id);
								// sweetalert success
								Swal.fire(
									'Success!',
									'Checkout meja ' + meja_id + ' berhasil!',
									'success'
								)
								// remove class not available
								mejadiv.removeClass('not-available');
								// remove class pending
								mejadiv.removeClass('pending');
								// set durasi and sisa
								removeInterval(meja_id - 1);
								// set select paket to default
								mejadiv.find('.select-paket').val(null).trigger('change');
								// set select paket to not disabled
								mejadiv.find('.select-paket').prop('disabled', false);
								// set bill id to empty
								mejadiv.find('.bill-id').html('-')
								// set start time to empty
								mejadiv.find('.start-time').html('-')
								mejadiv.find('.duration-time').text('-');
								mejadiv.find('.left-time').text('-');
								mejadiv.find('.btn-group-flex').html(`
									<button class="btn btn-start-sewa" type="submit">Start</button>
								`)
								mejadiv.find('.btn-group-flex .btn').css('visibility', 'visible');
							} else {
								// hide loading state
								hideSpecifiedLoadingState(meja_id);
								// sweetalert error
								Swal.fire(
									'Error!',
									'Checkout meja ' + meja_id + ' gagal!',
									'error'
								)
							}
						}
					});
				}
			})
		})

		$(document).on('click', '.btn-order-menu', function(e) {
			var mejadiv = $(this).parents('.meja_div');
			var meja_id = mejadiv.find('.card-title').text();
			alert('This button belongs to ' + meja_id);
		})

		$(document).on('click', '.btn-tambah-billing', function(e) {
			var mejadiv = $(this).parents('.meja_div');
			var meja_id = mejadiv.find('.card-title').text();
			var billing_id = mejadiv.find('.bill-id').text();
			alert('This button belongs to ' + meja_id);

			// show modal tambah billing
			$('#modal-tambah-billing').modal('show');

			$('#modal-tambah-billing').find('#id_billing_text').text(billing_id);
			$('#modal-tambah-billing').find('#id_billing').val(billing_id);
		})

		$(document).on('submit','.form-meja', function(e) {

			e.preventDefault()
			
			var disform = $(this)

			var bill_id = $(this).find('.bill-id')
			var start_time = $(this).find('.start-time')

			// change button to loading state
			disform.find('.btn-start-meja').html('<i class="fa fa-spinner fa-spin"></i>')
			disform.find('.btn-start-meja').attr('disabled', true)


			var id_meja = $(this).data('idmeja');

			var index_meja = $('.meja_div').index($(this).closest('.meja_div'));
			console.log(index_meja)

			showSpecifiedLoadingState()

			$.ajax({
				url: '<?= base_url('dashboard/start_billing') ?>',
				type: 'POST',
				data: {
					id_meja: id_meja,
					paket_choice: disform.find('.select-paket').val(),
					action: 'baru'
				},
				success: function(data) {
					var data = JSON.parse(data);
					console.log(data)
					
					bill_id.html(data.bill_id)
					start_time.html(data.start_time)
					
					setDurasiAndSisa(index_meja, data.start_time, data.end_time)
					disform.find('.btn-group-flex').html(`
						<button class="btn btn-tambah-billing" type="button">Tambah</button>
						<button class="btn btn-order-menu" type="button">Order Menu</button>
						<button class="btn btn-checkout" type="button">Checkout</button>
					`)
					hideLoadingState()
				},
				error: function() {
					alert('error');
					disform.find('.btn-start-meja').html('Start')
					disform.find('.btn-start-meja').removeAttr('disabled')
				}
			});
		})

		$(document).on('submit', '#form-tambah-billing', function(e) {
			e.preventDefault()

			var disform = $(this)

			disform.find('#tambah-billing-action').html('<i class="fa fa-spinner fa-spin"></i>')
			disform.find('#tambah-billing-action').attr('disabled', true)

			$.ajax({
				url: '<?= base_url('dashboard/tambah_billing') ?>',
				type: 'POST',
				data: disform.serialize(),
				success: function(data) {
					var data = JSON.parse(data);
					console.log(data)
					if (data.status == 'success') {
						// sweetalert success
						Swal.fire(
							'Success!',
							'Tambah billing berhasil!',
							'success'
						)
						// hide modal tambah billing
						$('#modal-tambah-billing').modal('hide');
						// reset form tambah billing
						getMejaStatusTimer()
						disform[0].reset();
						hideLoadingState()
						// change button to normal state
						disform.find('#tambah-billing-action').html('Tambah')
						disform.find('#tambah-billing-action').removeAttr('disabled')
					} else {
						// sweetalert error
						Swal.fire(
							'Error!',
							'Tambah billing gagal!',
							'error'
						)
						// change button to normal state
						disform.find('#tambah-billing-action').html('Tambah')
						disform.find('#tambah-billing-action').removeAttr('disabled')
					}
				},
				error: function() {
					alert('error');
					// change button to normal state
					disform.find('#tambah-billing-action').html('Tambah')
					disform.find('#tambah-billing-action').removeAttr('disabled')
				}
			})
		})
	});
</script>