<div class="container">
	<div class="portlet" style="margin-bottom: 5px">
		<div class="portlet-body">
			<div class="row">
				<div class="col-sm-12">
					<div class="" style="">
						<div class="col-md-10" style="padding-left:0px"><h4 style="font-family:Lucida Sans Unicode">DATA KARYAWAN</h4></div>
						<div class="col-md-1" style="padding-top:5px"><button class="btn btn-sm btn-success" onclick="add_data()"><i class="glyphicon glyphicon-plus"></i> Add Data</button></div>
						<div class="col-md-1" style="padding-top:5px"><button class="btn btn-sm btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button></div>
					</div>
					<table class="table table-condensed table-hover" id="table">
						<thead>
							<tr>
								<th width="20"><small>&nbsp;</small></th>
								<th><small>Nama Karyawan</small></th>
								<th><small>Nama Posisi</small></th>
								<th width="10"><small>&nbsp;</small></th>
								<th width="10"><small>&nbsp;</small></th>
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
	          		<div class="form-group" style="margin-top:10px">
						<label><small>Nama Karyawan</small></label>
						<input type="hidden" name="text_id" id="text_id" class="form-control input-sm" placeholder="Nama Posisi" required data-bv-notempty-message="Nama Posisi Tidak Boleh Kosong">
						<input type="text" name="text_karyawan" id="text_karyawan" class="form-control input-sm" placeholder="Nama Posisi" required data-bv-notempty-message="Nama Posisi Tidak Boleh Kosong">
					</div>	          	
	          		<div class="form-group" style="margin-top:10px">
						<label><small>Nama Posisi</small></label>
						<!-- <input type="text" name="text_posisi" id="text_posisi" class="form-control input-sm" placeholder="Nama Posisi" required data-bv-notempty-message="Nama Posisi Tidak Boleh Kosong"> -->
						<select name="text_posisi" id="text_posisi" class="form-control input-sm">
							<option>-Pilih Posisi-</option>
							<?php 
								foreach ($record->result() as $value) {
							?>
							<option value="<?php echo $value->nama_posisi;?>"><?php echo $value->nama_posisi;?></option>
							<?php
								}
							?>
						</select>
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

