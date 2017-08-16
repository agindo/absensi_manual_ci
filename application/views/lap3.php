<div class="container">
	<div class="portlet">
		<div class="portlet-body">
			<h2 style="margin-top:0px"><i class="fa fa-file-text-o"></i> Laporan Absensi / Tanggal <small style="font-size:13px"><i class="fa fa-clock-o"></i> <span id="jam"></span></small></h2>
			<hr style="color:#000;margin-bottom:10px;margin-top:0px">
			<br>
			<?php echo form_open('laporan/lap2');?>
				<div class="row" style="margin-bottom:10px;margin-top:10px">
					<div class="col-sm-3"></div>
					<div class="col-sm-3" style="padding-left:0px;padding-right:1px">
						<div class="input-group">
							<input list="list_karyawan" name="text_karyawan_lap2" id="" class="form-control input-sm" placeholder="Nama Karyawan">
							<span class="input-group-btn">
								<button type="submit" name="lap2_submit" id="" class="btn btn-primary btn-sm">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</div>
					<div class="col-sm-3" style="padding-right:0px">
						<div class="input-group input-daterange">
						    <input type="text" class="form-control input-sm" name="text_date_lap3" id="text_date_lap3" value="yyyy-mm-dd">
						    <div class="input-group-addon">to</div>
						    <input type="text" class="form-control input-sm" name="text_date_lap4" id="text_date_lap4" value="yyyy-mm-dd">
						</div>
					</div>
					<div class="col-sm-1">
						<button type="submit" name="cetak_lap2_submit" class="btn btn-danger btn-sm btn-block"><i class="fa fa-download"></i> PDF</button>
					</div>
					<div class="col-sm-2"></div>
				</div>
			</form>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6" style="padding-right:0px;padding-left:0px">

					<table class="table table-condensed table-bordered" style="margin-bottom:10px;margin-top:10px">
						<thead>
							<tr>
								<th width="130"><small>Nama Karyawan</small></th>
								<th width="20" style="text-align:center"><small>:</small></th>
								<td><small></small></td>
							</tr>
							<tr>
								<th><small>Bulan</small></th>
								<th width="20" style="text-align:center"><small>:</small></th>
								<td><small></small></td>
							</tr>
						</thead>
					</table>

					<table class="table table-condensed table-bordered">
						<thead>
							<tr>
								<th width="50" style="text-align:center"><small>No</small></th>
								<th><small>Hari, Tanggal</small></th>
								<th colspan="2" style="text-align:center"><small>Shift I</small></th>
								<th colspan="2" style="text-align:center"><small>Shift II</small></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>	
				</div>
				<div class="col-sm-3"></div>
			</div>	
		</div>
	</div>
</div>