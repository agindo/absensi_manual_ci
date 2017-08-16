<div class="container">
	<div class="portlet" style="margin-bottom: 5px">
		<div class="portlet-body">
			<div class="row">
				<div class="col-sm-12">
					<div class="" style="">
						<div class="col-md-10" style="padding-left:0px"><h4 style="font-family:Lucida Sans Unicode">DATA ABSENSI</h4></div>
						<div class="col-md-1" style="padding-top:5px"><button class="btn btn-sm btn-success" onclick="add_data()"><i class="glyphicon glyphicon-plus"></i> Add Data</button></div>
						<div class="col-md-1" style="padding-top:5px"><button class="btn btn-sm btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button></div>
					</div>
					<table class="table table-condensed table-hover" id="table">
						<thead>
							<tr>
								<th width="20"><small>&nbsp;</small></th>
								<th><small>Tanggal</small></th>
								<th><small>Nama Karyawan - Posisi</small></th>
								<th width="50" class="info"><small></small></th>
								<th width="50" class="info"><small></small></th>
								<th width="50" class="warning"><small></small></th>
								<th width="50" class="warning"><small></small></th>
								<th width="10"><small></small></th>
								<th width="10"><small></small></th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            	<h4 class="modal-title">Konfirmasi</h4>
          	</div>
          	<div class="modal-body form">
	          	<form action="#" id="form">
	                <input type="hidden" value="" name="text_id" id="text_id" /> 
					<div class="row">
						<div class="col-sm-1">&nbsp;</div>
						<div class="col-sm-3" style="padding-right:0px">
							<div class="form-group" style="margin-top:10px">
								<label><small>Tanggal</small></label>
								<input type="text" name="text_tanggal" id="text_tanggal" class="form-control input-sm" placeholder="Tanggal" required data-bv-notempty-message="Nama Karyawan Tidak Boleh Kosong">
							</div>
						</div>
						<div class="col-sm-7">
							<div class="form-group" style="margin-top:10px">
								<label><small>Nama Karyawan</small></label>
								<input list="list_karyawan" name="text_karyawan" id="text_karyawan" class="form-control input-sm" placeholder="Nama Karyawan" required data-bv-notempty-message="Nama Karyawan Tidak Boleh Kosong">
							</div>
						</div>
						<div class="col-sm-1">&nbsp;</div>
					</div>
					<div class="row">
						<div class="col-sm-2">&nbsp;</div>
						<div class="col-sm-2" style="padding-right:2px">
							<div class="form-group" style="margin-top:10px">
								<label><small>Shift</small></label>
								<input type="text" name="text_jam_masuk" id="text_jam_masuk" class="form-control input-sm" placeholder="00.00">
							</div>
						</div>
						<div class="col-sm-2" style="padding-left:2px">
							<div class="form-group" style="margin-top:10px">
								<label><small>I</small></label>
								<input type="text" name="text_jam_keluar" id="text_jam_keluar" class="form-control input-sm" placeholder="00.00">
							</div>
						</div>
						<div class="col-sm-2" style="padding-right:2px">
							<div class="form-group" style="margin-top:10px">
								<label><small>Shift</small></label>
								<input type="text" name="text_jam_lembur_masuk" id="text_jam_lembur_masuk" class="form-control input-sm" placeholder="00.00">
							</div>
						</div>
						<div class="col-sm-2" style="padding-left:2px">
							<div class="form-group" style="margin-top:10px">
								<label><small>II</small></label>
								<input type="text" name="text_jam_lembur_keluar" id="text_jam_lembur_keluar" class="form-control input-sm" placeholder="00.00">
							</div>
						</div>
						<div class="col-sm-2">&nbsp;</div>
					</div>
				</form>
          	</div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-sm btn-primary">Save</button>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<datalist id="list_karyawan">
	<?php
		foreach ($record->result() as $value) {
	?>
	<option value="<?php echo $value->nama_karyawan." - ".$value->nama_posisi;?>"><?php echo $value->id;?></option>
	<?php
		}
	?>
</datalist>
