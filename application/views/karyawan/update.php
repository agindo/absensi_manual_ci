<div class="portlet">
	<div class="portlet-body">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb" style="margin-bottom:10px">
					<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
					<li><a href="#">Data Master</a></li>
					<li><a href="#">Data Karyawan</a></li>
				</ul>
				<ul id="myTabs" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><i class="fa fa-edit"></i> Edit Data Karyawan</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="profile" aria-labelledBy="profile-tab">
						<?php echo form_open('karyawan/update');?>
							<div class="row">
								<div class="col-sm-2">&nbsp;</div>
								<div class="col-sm-4" style="padding-right:2px">
									<div class="form-group" style="margin-top:10px">
										<label><small>Nama Karyawan</small></label>
										<input type="hidden" name="text_id_karyawan" id="" class="form-control input-sm" placeholder="ID Karyawan" required data-bv-notempty-message="ID Karyawan Tidak Boleh Kosong" value="<?php echo $record['id'];?>">
										<input type="text" name="text_karyawan" id="" class="form-control input-sm" placeholder="Nama Karyawan" required data-bv-notempty-message="Nama Karyawan Tidak Boleh Kosong" value="<?php echo $record['nama_karyawan'];?>">
									</div>
								</div>
								<div class="col-sm-2" style="padding-right:2px">
									<div class="form-group" style="margin-top:10px">
										<label><small>Posisi</small></label>
										<select name="text_posisi" id="" class="form-control input-sm">
											<option value="0">-Pilih Posisi-</option>
											<?php
												foreach ($kata->result() as $value) {
											?>
											<option value="<?php echo $value->nama_posisi;?>" <?php if($record['nama_posisi']==$value->nama_posisi){echo"selected";}else{echo"";}?>><?php echo $value->nama_posisi;?></option>
											<?php
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-sm-1" style="padding-right:1px;padding-top:35px">
									<button type="submit" name="karyawan_submit" id="" class="btn btn-primary btn-sm btn-block">Simpan</button>
								</div>	
								<div class="col-sm-1" style="padding-left:1px;padding-top:35px">
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