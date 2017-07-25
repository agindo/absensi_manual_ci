<div class="portlet">
	<div class="portlet-body">
		<h2 style="margin-top:0px"><i class="fa fa-file-text-o"></i> Laporan Absensi / Hari <small style="font-size:13px"><i class="fa fa-clock-o"></i> <span id="jam"></span></small></h2>
		<hr style="color:#000;margin-bottom:10px;margin-top:0px">		
		<?php echo form_open('laporan/lap1');?>
			<div class="row">
				<div class="col-sm-2" style="margin-bottom:0px;margin-top:10px">
					<div class="input-group">
						<input type="date" name="text_date_lap1" id="" class="form-control input-sm">
						<span class="input-group-btn">
							<button type="submit" name="lap1_submit" id="" class="btn btn-primary btn-sm">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</div>
				<div class="col-sm-9"></div>
					<div class="col-sm-1" style="margin-bottom:0px;margin-top:10px">
						<button type="submit" name="cetak_lap1_submit" class="btn btn-danger btn-sm btn-block">
							<i class="fa fa-download"></i> PDF
						</button>
					</div>
				</div>
			</form>
			<br>
			<table class="table table-condensed table-bordered">
				<tr>
					<th width="50" style="text-align: center"><small>No</small></th>
					<th><small>Nama Karyawan</small></th>
					<th style="text-align: center" colspan="2"><small>Shift I</small></th>
					<th style="text-align: center" colspan="2"><small>Shift II</small></th>
				</tr>
				<?php
					$no = 1;
					foreach ($record->result() as $value) {
				?>
				<tr>
					<td style="text-align: center"><small><?php echo $no;?></small></td>
					<td><small><?php echo $value->nama_karyawan?></small></td>
					<td width="100" style="text-align: center"><small><?php echo $value->jam_masuk;?></small></td>
					<td width="100" style="text-align: center"><small><?php echo $value->jam_keluar;?></small></td>
					<td width="100" style="text-align: center"><small><?php echo $value->jam_lembur_masuk;?>
					<td width="100" style="text-align: center"><small><?php echo $value->jam_lembur_keluar;?>
					</small></td>
				</tr>
				<?php
						$no++;
					}
				?>
			</table>
		</div>
	</div>
</div>