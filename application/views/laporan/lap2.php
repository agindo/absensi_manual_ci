<div class="portlet">
	<div class="portlet-body">
		<h2 style="margin-top:0px"><i class="fa fa-file-text-o"></i> Laporan Absensi / Bulan <small style="font-size:13px"><i class="fa fa-clock-o"></i> <span id="jam"></span></small></h2>
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
				<div class="col-sm-2">
					<select name="bulan_lap2" id="" class="form-control input-sm">
						<option value="0">-Bulan-</option>
						<option value="1">Januari</option>
						<option value="2">Februari</option>
						<option value="3">Maret</option>
						<option value="4">April</option>
						<option value="5">Mei</option>
						<option value="6">Juni</option>
						<option value="7">Juli</option>
						<option value="8">Agustus</option>
						<option value="9">September</option>
						<option value="10">Oktober</option>
						<option value="11">November</option>
						<option value="12">Desember</option>
					</select>
				</div>
				<div class="col-sm-1" style="padding-left:2px;padding-right:0px">
					<select name="tahun_lap2" id="" class="form-control input-sm">
						<option value="0">-Tahun-</option>
						<?php
							$now = date('Y');
							for($thn=2000;$thn<=$now;$thn++){
						?>
						<option value="<?php echo $thn;?>"><?php echo $thn;?></option>
						<?php
							}
						?>
					</select>
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
				<?php
					if($ada==1){
				?>
				<table class="table table-condensed table-bordered" style="margin-bottom:10px;margin-top:10px">
					<thead>
						<tr>
							<th width="130"><small>Nama Karyawan</small></th>
							<th width="20" style="text-align:center"><small>:</small></th>
							<td><small><?php echo $pata['nama_karyawan'];?></small></td>
						</tr>
						<tr>
							<th><small>Bulan</small></th>
							<th width="20" style="text-align:center"><small>:</small></th>
							<td><small><?php echo $wata['bln']." ".$wata['thn'];?></small></td>
						</tr>
					</thead>
				</table>
				<?php
					}else{

					}
				?>
				<table class="table table-condensed table-bordered">
					<thead>
						<tr>
							<th width="50" style="text-align:center"><small>No</small></th>
							<th><small>Hari, Tanggal</small></th>
							<th colspan="2" style="text-align:center"><small>Shift I</small></th>
							<th colspan="2" style="text-align:center"><small>Shift II</small></th>
						</tr>
					</thead>
					<tbody>
						<?php
							if($ada==1){
								$no = 1;
								foreach($record->result() as $value){
							?>
						<tr style="<?php if($value->hari == "Sabtu"){echo"background-color:#F0FFC9";}else if($value->hari == "Minggu"){echo"background-color:#F5F7BD";}else{}?>">
							<td style="text-align:center"><small><?php echo $no;?></small></td>
							<td><small><?php echo $value->hari.", ".$value->tgl." ".$value->bln." ".$value->thn;?></small></td>
							<td style="text-align:center"><small><?php echo $value->jam_masuk;?></small></td>
							<td style="text-align:center"><small><?php echo $value->jam_keluar;?></small></td>
							<td style="text-align:center"><small><?php echo $value->jam_lembur_masuk;?></small></td>
							<td style="text-align:center"><small><?php echo $value->jam_lembur_keluar;?></small></td>
						</tr>
							<?php
									$no++;
								}
							}else{
						?>
						<tr>
							<td style="text-align:center"><small></small></td>
							<td style="text-align:center"><small></small></td>
							<td style="text-align:center"><small></small></td>
							<td style="text-align:center"><small></small></td>
							<td style="text-align:center"><small></small></td>
							<td style="text-align:center"><small></small></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>	
			</div>
			<div class="col-sm-3"></div>
		</div>	
	</div>
</div>
<datalist id="list_karyawan">
	<?php
		foreach ($kata->result() as $value) {
	?>
	<option value="<?php echo $value->nama_karyawan.' - '.$value->nama_posisi;?>"><?php echo $value->nama_karyawan." - ".$value->nama_posisi;?></option>
	<?php
		}
	?>
</datalist>