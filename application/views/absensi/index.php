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
					<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><i class="fa fa-clipboard"></i> Absensi</a></li>
					<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><i class="fa fa-plus"></i></a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledBy="home-tab">
						<!-- <div id="data-merk" style="margin-top:10px"></div> -->
<br>
<table class="table table-condensed table-bordered table-hovered" id="example1">
	<thead>
		<tr>
			<th width="20"><small>&nbsp;</small></th>
			<th width="150"><small>Tanggal</small></th>
			<th><small>Nama Karyawan</small></th>
			<th width="50"><small>Shift I</small></th>
			<th width="50"><small></small></th>
			<th width="50"><small>Shift II</small></th>
			<th width="50"><small></small></th>
			<th width="10"><small>&nbsp;</small></th>
			<th width="10"><small>&nbsp;</small></th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no = 1;
			foreach ($record->result() as $value) {
		?>
		<tr style="<?php if($value->hari == "Sabtu"){echo"background-color:#F0FFC9";}else if($value->hari == "Minggu"){echo"background-color:#F5F7BD";}else{}?>">
			<td style="text-align:center"><small><?php echo $no;?></small></td>
			<td><small><?php echo $value->hari.", ".$value->tgl." ".$value->bln." ".$value->thn;?></small></td>
			<td><small><?php echo $value->nama_karyawan;?></small></td>
			<td style="text-align:center"><small><?php echo $value->jam_masuk;?></small></td>
			<td style="text-align:center"><small><?php echo $value->jam_keluar;?></small></td>
			<td style="text-align:center"><small><?php echo $value->jam_lembur_masuk;?></small></td>
			<td style="text-align:center"><small><?php echo $value->jam_lembur_keluar;?></small></td>
			<td><small><?php echo anchor('absensi/update/'.$value->id, '<i class="fa fa-pencil"></i>', array("class"=>"btn btn-info btn-xs btn-block"));?></small></td>
			<td><small><?php echo anchor('absensi/delete/'.$value->id, '<i class="fa fa-remove"></i>', array("class"=>"btn btn-danger btn-xs btn-block"));?></small></td>
		</tr>
		<?php
				$no++;
			}
		?>
	</tbody>
</table>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledBy="profile-tab">
						<!-- <form id="defaultForm" method="POST" data-bv-message="This value is not valid" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"> -->
						<?php echo form_open('absensi/add');?>
							<div class="row">
								<div class="col-sm-2">&nbsp;</div>
								<div class="col-sm-2">
									<div class="form-group" style="margin-top:10px">
										<label><small>Tanggal</small></label>
										<input type="date" name="text_tanggal" id="" class="form-control input-sm" placeholder="Nama Karyawan" required data-bv-notempty-message="Nama Karyawan Tidak Boleh Kosong">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group" style="margin-top:10px">
										<label><small>Nama Karyawan</small></label>
										<input list="list_karyawan" name="text_karyawan" id="" class="form-control input-sm" placeholder="Nama Karyawan" required data-bv-notempty-message="Nama Karyawan Tidak Boleh Kosong">
									</div>
								</div>
								<div class="col-sm-2">&nbsp;</div>
							</div>
							<div class="row">
								<div class="col-sm-2">&nbsp;</div>
								<div class="col-sm-2">
									<div class="form-group" style="margin-top:10px">
										<label><small>Jam Masuk</small></label>
										<input type="text" name="text_jam_masuk" id="" class="form-control input-sm" placeholder="Jam Masuk">
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group" style="margin-top:10px">
										<label><small>Jam Keluar</small></label>
										<input type="text" name="text_jam_keluar" id="" class="form-control input-sm" placeholder="Jam Keluar">
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group" style="margin-top:10px">
										<label><small>Jam Lembur Masuk</small></label>
										<input type="text" name="text_jam_lembur_masuk" id="" class="form-control input-sm" placeholder="Jam Lembur Masuk">
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group" style="margin-top:10px">
										<label><small>Jam Lembur Keluar</small></label>
										<input type="text" name="text_jam_lembur_keluar" id="" class="form-control input-sm" placeholder="Jam Lembur Keluar">
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
<div id="upd-merk" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            	<h4 class="modal-title">Konfirmasi</h4>
          	</div>
          	<div class="modal-body"></div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
            	<button id="up-merk" class="btn btn-primary btn-sm">Update</button>
          	</div>
        </div>
    </div>
</div>
<datalist id="list_karyawan">
	<?php
		foreach ($kata->result() as $value) {
	?>
	<option value="<?php echo $value->nama_karyawan." - ".$value->nama_posisi;?>"><?php echo $value->id;?></option>
	<?php
		}
	?>
</datalist>