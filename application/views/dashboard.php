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
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
		padding: 1rem;
		border-radius: 15px;
		margin-bottom: 15px;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
		height: 100%;
    	width: 100%;
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
	}

	.btn-group-flex .btn:nth-child(1) {
		background-color: #4CAF50;
		color: white;
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
		<div class="col-md-12">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Billing</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="wrapper-list-meja">
							<?php
								foreach($meja_list as $i) {
									?>
									<div class="meja" >
										<div class="card">
											<div class="card-header">
												<h3 class="card-title" style="font-weight: bold;"><?= $i->nama_meja ?></h3>
											</div>
											<div class="card-body">
												<table class="table" >
													<tr>
														<td><b>Bill</b></td>
														<td>:</td>
														<td>Dummy</td>
													</tr>
													<tr>
														<td><b>Paket</b></td>
														<td>:</td>
														<td>Loss</td>
													</tr>
													<tr>
														<td><b>Mulai</b></td>
														<td>:</td>
														<td>13:34:11</td>
													</tr>
													<tr>
														<td><b>Durasi</b></td>
														<td>:</td>
														<td>01.45.00</td>
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
													<button class="btn" type="button">Start</button>
													<button class="btn" type="button">Order Menu</button>
													<button class="btn" type="button">Checkout</button>
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
