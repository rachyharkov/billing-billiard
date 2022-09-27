<div id="content" class="content">
	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-inverse">
				<div class="panel-heading">

					<h4 class="panel-title">Filter Tanggal</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="box-body">
									<div class="box-body">
										<form class="form-horizontal" action="/" method="POST">
											<div class="form-group">
												<label class="col-md-4 control-label">Start Date</label>
												<div class="col-md-8">
													<input type="date" class="form-control" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label">End Date</label>
												<div class="col-md-8">
													<input type="date" class="form-control" placeholder="">
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-8 col-md-offset-4">
													<button type="submit" class="btn btn-sm btn-primary m-r-5"><i class="fa fa-search" aria-hidden="true"></i> Filter</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="panel panel-inverse">
				<div class="panel-heading">

					<h4 class="panel-title">List Transaksi</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="box-body">
									<div class="box-body">
										<table id="data-table" class="table table-bordered table-hover table-td-valign-middle">
											<thead>
												<tr>
													<th>No</th>
													<th>Bill</th>
													<th>Tanggal</th>
													<th>Detail Paket</th>
													<th>Mulai</th>
													<th>Selesai</th>
													<th>Total Harga</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>00127092022</td>
													<td>27/09/2022</td>
													<td> - Paket Niko A1 <br>
														- Paket Niko A1
													</td>
													<td>27/09/2022 17:00:00</td>
													<td>27/09/2022 19:00:00</td>
													<td>Rp.100.000</td>
													<td>
														<button type="submit" class="btn btn-sm btn-success m-r-5"><i class="fa fa-eye" aria-hidden="true"></i> Detail</button>
														<button type="submit" class="btn btn-sm btn-danger m-r-5"><i class="fa fa-print" aria-hidden="true"></i> Invoice</button>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
