	    <footer class="footer">
	      <div class="container">
	        <p class="text-muted">&copy; HRD 2017 <small><?php echo base_url()."index.php/".$url."/list_data";?></small></p>
	      </div>
	    </footer>
	  
	    <script src="<?php echo base_url();?>assets/jquery/jquery-2.1.4.min.js"></script>
	    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/datatables/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/datatables/js/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url();?>assets/datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url();?>assets/clockpicker/js/bootstrap-clockpicker.js"></script>
		<!-- <script src="<?php //echo base_url();?>assets/custom/app.js"></script> -->
		<script type="text/javascript">
var table;

$(document).ready(function() {

	table = $('#table').DataTable({ 

		"processing": true,
		"serverSide": true, 
		"order": [], 
		"ajax": {
		        	"url": "<?php echo base_url().'index.php/'.$url.'/list_data';?>",
		            "type": "POST"
		        },
		"columnDefs": [
		        { 
		            "targets": [ -1 ], //last column
		            "orderable": false, //set not orderable
		        },
		],
    });

});

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function add_data()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Data'); // Set Title to Bootstrap modal title
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo base_url().'index.php/'.$url.'/add';?>";
    } else {
        url = "<?php echo base_url().'index.php/'.$url.'/update';?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
			


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function edit(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo base_url().'index.php/'.$url.'/edit/';?>" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="text_id"]').val(data.id);
            $('[name="text_tanggal"]').val(data.tanggal);
            $('[name="text_karyawan"]').val(data.nama_karyawan);
            $('[name="text_jam_masuk"]').val(data.jam_masuk);
            $('[name="text_jam_keluar"]').val(data.jam_keluar);
            $('[name="text_jam_lembur_masuk"]').val(data.jam_lembur_masuk);
            $('[name="text_jam_lembur_keluar"]').val(data.jam_lembur_keluar);
            $('[name="text_posisi"]').val(data.nama_posisi);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Data'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function del(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url().'index.php/'.$url.'/delete/';?>"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                //$('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

$(function(){
    $("#text_tanggal").datepicker({
        format:'yyyy-mm-dd'
    });

    $("#text_date_lap1").datepicker({
        format:'yyyy-mm-dd',
        orientation: 'auto top'
    });

    $("#text_date_lap3").datepicker({
        format:'yyyy-mm-dd',
        orientation: 'auto top'
    });

    $("#text_date_lap4").datepicker({
        format:'yyyy-mm-dd',
        orientation: 'auto top'
    });

    $('#text_jam_masuk').clockpicker({
        placement: 'bottom',
        align: 'left',
        donetext: 'Done'
    });

    $('#text_jam_keluar').clockpicker({
        placement: 'bottom',
        align: 'left',
        donetext: 'Done'
    });

    $('#text_jam_lembur_masuk').clockpicker({
        placement: 'bottom',
        align: 'left',
        donetext: 'Done'
    });

    $('#text_jam_lembur_keluar').clockpicker({
        placement: 'bottom',
        align: 'left',
        donetext: 'Done'
    });                 
});


		</script>
  	</body>
</html>