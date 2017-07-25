<div class="portlet" style="margin-bottom: 5px">
	<div class="portlet-body">
		<div class="row">
			<div class="col-sm-12">
				<!--<h2 style="margin-top:5px">Data Hubungan Keluarga</h2>
				<hr style="color:#000;margin-bottom:10px;margin-top:0px">-->
				<ul class="breadcrumb" style="margin-bottom:10px">
					<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
					<li><a href="#">Proses</a></li>
					<li><a href="#">Absensi</a></li>
				</ul>
				<ul id="myTabs" class="nav nav-tabs" role="tablist">
					<li role="presentation"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><i class="fa fa-edit"></i> Edit Absensi</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledBy="home-tab">
						<!-- <form id="defaultForm" method="POST" data-bv-message="This value is not valid" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"> -->
						<?php echo form_open('absensi/update');?>
							<div class="row">
								<div class="col-sm-2">&nbsp;</div>
								<div class="col-sm-2">
									<div class="form-group" style="margin-top:10px">
										<label><small>Tanggal</small></label>
										<input type="hidden" name="text_id_absensi" id="" class="form-control input-sm" placeholder="" required data-bv-notempty-message="Tanggal Tidak Boleh Kosong" value="<?php echo $record['id'];?>">
										<input type="date" name="text_tanggal" id="" class="form-control input-sm" placeholder="" required data-bv-notempty-message="Tanggal Tidak Boleh Kosong" value="<?php echo $record['tanggal'];?>">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group" style="margin-top:10px">
										<label><small>Nama Karyawan</small></label>
										<input list="list_karyawan" name="text_karyawan" id="" class="form-control input-sm" placeholder="Nama Karyawan" required data-bv-notempty-message="Nama Karyawan Tidak Boleh Kosong" value="<?php echo $record['nama_karyawan'];?>">
									</div>
								</div>
								<div class="col-sm-2">&nbsp;</div>
							</div>
							<div class="row">
								<div class="col-sm-2">&nbsp;</div>
								<div class="col-sm-2">
									<div class="form-group" style="margin-top:10px">
										<label><small>Jam Masuk</small></label>
										<input type="text" name="text_jam_masuk" id="" class="form-control input-sm" placeholder="Jam Masuk" value="<?php echo $record['jam_masuk'];?>">
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group" style="margin-top:10px">
										<label><small>Jam Keluar</small></label>
										<input type="text" name="text_jam_keluar" id="" class="form-control input-sm" placeholder="Jam Keluar" value="<?php echo $record['jam_keluar'];?>">
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group" style="margin-top:10px">
										<label><small>Jam Lembur Masuk</small></label>
										<input type="text" name="text_jam_lembur_masuk" id="" class="form-control input-sm" placeholder="Jam Lembur Masuk" value="<?php echo $record['jam_lembur_masuk'];?>">									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group" style="margin-top:10px">
										<label><small>Jam Lembur Keluar</small></label>
										<input type="text" name="text_jam_lembur_keluar" id="" class="form-control input-sm" placeholder="Jam Lembur Keluar" value="<?php echo $record['jam_lembur_keluar'];?>">
									</div>
								</div>
								<div class="col-sm-2">&nbsp;</div>
							</div>
							<div class="row">
								<div class="col-sm-8">&nbsp;</div>
								<div class="col-sm-1" style="padding-right:1px">
									<button type="submit" name="absensi_submit" id="" class="btn btn-primary btn-sm btn-block">Simpan</button>
								</div>	
								<div class="col-sm-1" style="padding-left:1px">
									<button type="reset" name="" id="" class="btn btn-danger btn-sm btn-block">Batal</button>
								</div>
								<div class="col-sm-2">&nbsp;</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<datalist id="list_karyawan">
	<?php
		foreach ($kata->result() as $value) {
	?>
	<option value="<?php echo $value->nama_karyawan.'-'.$value->nama_posisi;?>"><?php echo $value->nama_karyawan."-".$value->nama_posisi;?></option>
	<?php
		}
	?>
</datalist>