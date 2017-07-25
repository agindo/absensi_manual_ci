<div class="portlet">
	<div class="portlet-body">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb" style="margin-bottom:10px">
					<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
					<li><a href="#">Data Master</a></li>
					<li><a href="#">Data Posisi</a></li>
				</ul>
				<ul id="myTabs" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><i class="fa fa-edit"></i> Edit Data Posisi</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="profile" aria-labelledBy="profile-tab">
						<?php echo form_open('posisi/update');?>
							<div class="row">
								<div class="col-sm-2">
									<input type="hidden" name="text_id_posisi" id="" class="form-control input-sm" placeholder="ID Posisi" required data-bv-notempty-message="ID Posisi Tidak Boleh Kosong" value="<?php echo $record['id']?>">
								</div>
								<div class="col-sm-6" style="padding-right:2px">
									<div class="form-group" style="margin-top:10px">
										<label><small>Nama Posisi</small></label>
										<input type="text" name="text_posisi" id="" class="form-control input-sm" placeholder="Nama Posisi" required data-bv-notempty-message="Nama Posisi Tidak Boleh Kosong" value="<?php echo $record['nama_posisi']?>">
									</div>
								</div>
								<div class="col-sm-1" style="padding-right:1px;padding-top:35px">
									<button type="submit" name="posisi_submit" id="" class="btn btn-primary btn-sm btn-block">Update</button>
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