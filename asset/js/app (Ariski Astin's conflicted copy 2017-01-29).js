(function($){
	$(document).ready(function(e){

	//MERK
		var data_merk = "app/merk.data.php";
        $('#data-merk').load(data_merk);

        $('.upd-merk').live("click", function(){
            var url = "app/merk.form.php";
            id_merk = this.id;
            if(id_merk!=0) {
                $(".modal-title").html("Edit Data Merk");
            }
            $.post(url, {merk_id: id_merk}, function(data){
                $(".modal-body").html(data).show();
            });
        });

        $("#up-merk").bind("click", function(event) {
            var url = "app/merk.update.php";

            var text_id_merk = $('#text_id_merk').val();
            var text_merk = $('#text_merk').val();

            $.post(url, {id_merk: text_id_merk, merk: text_merk} ,function() {
                $('#data-merk').load(data_merk);
                $('#upd-merk').modal('hide');
            });
        });

    //JENIS BARANG
        var data_jenis_barang = "app/jenis_barang.data.php";
        $('#data-jenis-barang').load(data_jenis_barang);

        $('.upd-jenis-barang').live("click", function(){
            var url = "app/jenis_barang.form.php";
            id_jenis_barang = this.id;
            if(id_jenis_barang!=0) {
                $(".modal-title").html("Edit Data Jenis Barang");
            }
            $.post(url, {jenis_barang_id: id_jenis_barang}, function(data){
                $(".modal-body").html(data).show();
            });
        });

        $("#up-jenis-barang").bind("click", function(event) {
            var url = "app/jenis_barang.update.php";

            var text_id_jenis_barang = $('#text_id_jenis_barang').val();
            var text_nama_jenis_barang = $('#text_nama_jenis_barang').val();

            $.post(url, {id_jenis_barang: text_id_jenis_barang, nama_jenis_barang: text_nama_jenis_barang} ,function() {
                $('#data-jenis-barang').load(data_jenis_barang);
                $('#upd-jenis-barang').modal('hide');
            });
        });

    //BARANG
        var data_barang = "app/barang.data.php";
        $('#data-barang').load(data_barang);

        $('.upd-barang').live("click", function(){
            var url = "app/barang.form.php";
            id_barang = this.id;
            if(id_barang!=0) {
                $(".modal-title").html("Edit Data Barang");
            }
            $.post(url, {barang_id: id_barang}, function(data){
                $(".modal-body").html(data).show();
            });
        });

        $("#up-barang").bind("click", function(event) {
            var url = "app/barang.update.php";

            var text_kode_barang = $('#text_kode_barang_0').val();
            var text_nama_barang = $('#text_nama_barang').val();
            var select_jenis_barang = $('#select_jenis_barang').val();
            var select_merk = $('#select_merk').val();
            var text_harga_beli = $('#text_harga_beli').val();
            var text_harga_jual = $('#text_harga_jual').val();
            var text_stok = $('#text_stok').val();
            var text_id_barang = $('#text_id_barang').val();

            $.post(url, {kode_barang: text_kode_barang, nama_barang: text_nama_barang, harga_beli: text_harga_beli, jenis_barang: select_jenis_barang, merk: select_merk, harga_jual: text_harga_jual, stok: text_stok, id_barang: text_id_barang} ,function() {
                $('#data-barang').load(data_barang);
                $('#upd-barang').modal('hide');
            });
        });

        $('#text_kode_barang').on('input',function(e){
            var text_kode_barang = $('#text_kode_barang').val();
            if(text_kode_barang!="") {
                $.post("app/barang.cek.php", {kode_barang: text_kode_barang} ,function(data) {
                    $("#cek-barang").html(data).show();
                });
            } else {
                $("#cek-barang").load("app/barang.cek.php");
            }
        });

    //PEMBELIAN
        var data_pembelian = "app/pembelian.data.php";
        $('#data-pembelian').load(data_pembelian);

        $("#cek-pembelian").load("app/pembelian.cek.php");

        $('#text_kode_barang').on('input',function(e){
            var kode_barang = $('#text_kode_barang').val();
            if(kode_barang!="") {
                $.post("app/pembelian.cek.php", {id_barang: kode_barang} ,function(data) {
                    $("#cek-pembelian").html(data).show();
                });
            } else {
                $("#cek-pembelian").load("app/pembelian.cek.php");
            }
        });

        $("#pembelian-submit").bind("click", function(event) {
            var url = "app/pembelian.input.php";

            var text_kode_barang = $('#text_kode_barang').val();
            //var text_harga = $('#text_harga').val();
            var text_qty = $('#text_qty').val();

            $.post(url, {kode_barang: text_kode_barang, qty: text_qty} ,function() {
                $('#text_kode_barang').val("");
                $('#text_nama_barang').val("");
                $('#text_harga').val("");
                $('#text_qty').val("");
                $('#data-pembelian').load(data_pembelian);      
            });
        });

        $("#pembelian-selesai").bind("click", function(event) {
            var url = "app/pembelian.selesai.php";

            $.post(url, {} ,function() {
                $('#data-pembelian').load(data_pembelian);     
            });
        });

        $('.upd-pembelian').live("click", function(){
            var url = "app/pembelian.form.php";
            id_detail_pembelian = this.id;
            if(id_detail_pembelian!=0) {
                $(".modal-title").html("Edit Data Pembelian");
            }
            $.post(url, {detail_pembelian_id: id_detail_pembelian}, function(data){
                $(".modal-body").html(data).show();
            });
        });

    //PENJUALAN
        var data_penjualan = "app/penjualan.data.php";
        $('#data-penjualan').load(data_penjualan); 

        $("#cek-penjualan").load("app/penjualan.cek.php");

        $('#text_kode_barang').on('input',function(e){
            var kode_barang = $('#text_kode_barang').val();
            if(kode_barang!="") {
                $.post("app/penjualan.cek.php", {id_barang: kode_barang} ,function(data) {
                    $("#cek-penjualan").html(data).show();
                });
            } else {
                $("#cek-penjualan").load("app/penjualan.cek.php");
            }
        });

        $('#text_kode_barang').on('input',function(e){
            var kode_barang = $('#text_kode_barang').val();
            if(kode_barang!="") {
                $.post("app/sisa_stok.cek.php", {id_barang: kode_barang} ,function(data) {
                    $("#cek-sisa-stok").html(data).show();
                });
            } else {
                $("#cek-sisa-stok").load("app/sisa_stok.cek.php");
            }
        });

        $("#penjualan-submit").bind("click", function(event) {
            var url = "app/penjualan.input.php";

            var text_kode_barang = $('#text_kode_barang').val();
            var text_harga = $('#text_harga').val();
            var text_qty = $('#text_qty').val();

            $.post(url, {kode_barang: text_kode_barang, qty: text_qty, harga: text_harga} ,function() {
                $('#text_kode_barang').val("");
                $('#text_nama_barang').val("");
                $('#text_harga').val("");
                $('#text_qty').val("");
                $('#data-penjualan').load(data_penjualan);      
            });
        });

        $("#penjualan-selesai").bind("click", function(event) {
            var url = "app/penjualan.selesai.php";

            $.post(url, {} ,function() {
                $('#data-penjualan').load(data_penjualan);      
            });
        });

        $('.upd-penjualan').live("click", function(){
            var url = "app/penjualan.form.php";
            id_detail_penjualan = this.id;
            if(id_detail_penjualan!=0) {
                $(".modal-title").html("Edit Data Penjualan");
            }
            $.post(url, {detail_penjualan_id: id_detail_penjualan}, function(data){
                $(".modal-body").html(data).show();
            });
        });

    //LAP1
        var data_lap1_hari = "app/lap1.hari.php";
        $('#data-lap1-hari').load(data_lap1_hari);

        var data_lap1_bulan = "app/lap1.bulan.php";
        $('#data-lap1-bulan').load(data_lap1_bulan);

        var data_lap1_tahun = "app/lap1.tahun.php";
        $('#data-lap1-tahun').load(data_lap1_tahun);

        $('#cari-lap1-hari').bind("click", function(event){
            var date_lap1_hari = $('#date_lap1_hari').val();
            
            if(date_lap1_hari!="") {
                $.post(data_lap1_hari, {tanggal_lap1_hari: date_lap1_hari} ,function(data) {
                    $("#data-lap1-hari").html(data).show();
                });
            } else {
                $('#data-lap1-hari').load(data_lap1_hari);
            }
        });

        $('#cari-lap1-bulan').bind("click", function(event){
            var select_bln_lap1_bulan = $('#select_bln_lap1_bulan').val();
            var select_thn_lap1_bulan = $('#select_thn_lap1_bulan').val();
            
            if(select_bln_lap1_bulan!="") {
                $.post(data_lap1_bulan, {bln_lap1_bulan: select_bln_lap1_bulan, thn_lap1_bulan: select_thn_lap1_bulan} ,function(data) {
                    $('#data-lap1-bulan').html(data).show();
                });
            } else {
                $('#data-lap1-bulan').load(data_lap1_bulan);
            }
        });

    //LAP2
        var data_lap2_hari = "app/lap2.hari.php";
        $('#data-lap2-hari').load(data_lap2_hari);

        var data_lap2_bulan = "app/lap2.bulan.php";
        $('#data-lap2-bulan').load(data_lap2_bulan);

        var data_lap2_tahun = "app/lap2.tahun.php";
        $('#data-lap2-tahun').load(data_lap2_tahun); 

        $('#cari-lap2-hari').bind("click", function(event){
            var date_lap2_hari = $('#date_lap2_hari').val();
            
            if(date_lap2_hari!="") {
                $.post(data_lap2_hari, {tanggal_lap2_hari: date_lap2_hari} ,function(data) {
                    $("#data-lap2-hari").html(data).show();
                });
            } else {
                $('#data-lap2-hari').load(data_lap2_hari);
            }
        });

        $('#cari-lap2-bulan').bind("click", function(event){
            var select_bln_lap2_bulan = $('#select_bln_lap2_bulan').val();
            var select_thn_lap2_bulan = $('#select_thn_lap2_bulan').val();
            
            if(select_bln_lap2_bulan!="") {
                $.post(data_lap2_bulan, {bln_lap2_bulan: select_bln_lap2_bulan, thn_lap2_bulan: select_thn_lap2_bulan} ,function(data) {
                    $('#data-lap2-bulan').html(data).show();
                });
            } else {
                $('#data-lap2-bulan').load(data_lap2_bulan);
            }
        });

    //LAP3
        var data_lap3_all = "app/lap3.all.php";
        $('#data-lap3-all').load(data_lap3_all);

        var data_lap3_jenis = "app/lap3.jenis.php";
        $('#data-lap3-jenis').load(data_lap3_jenis);

        var data_lap3_merk = "app/lap3.merk.php";
        $('#data-lap3-merk').load(data_lap3_merk);

        $('#cari-lap3-all').bind("click", function(event){
            var cari_lap3_all = $('#cari_lap3_all').val();
            
            if(cari_lap3_all!="") {
                $.post(data_lap3_all, {text_lap3_all: cari_lap3_all} ,function(data) {
                    $('#data-lap3-all').html(data).show();
                });
            } else {
                $('#data-lap3-all').load(data_lap3_all);
            }
        });

    //LAP4
        var data_lap4_hari = "app/lap4.hari.php";
        $('#data-lap4-hari').load(data_lap4_hari);

        var data_lap4_bulan = "app/lap4.bulan.php";
        $('#data-lap4-bulan').load(data_lap4_bulan);

        $('#cari-lap4-hari').bind("click", function(event){
            var date_lap4_hari = $('#date_lap4_hari').val();
            
            if(date_lap4_hari!="") {
                $.post(data_lap4_hari, {tanggal_lap4_hari: date_lap4_hari} ,function(data) {
                    $("#data-lap4-hari").html(data).show();
                });
            } else {
                $('#data-lap4-hari').load(data_lap4_hari);
            }
        });

        $('#cari-lap4-bulan').bind("click", function(event){
            var select_bln_lap4_bulan = $('#select_bln_lap4_bulan').val();
            var select_thn_lap4_bulan = $('#select_thn_lap4_bulan').val();
            
            if(select_bln_lap4_bulan!="") {
                $.post(data_lap4_bulan, {bln_lap4_bulan: select_bln_lap4_bulan, thn_lap4_bulan: select_thn_lap4_bulan} ,function(data) {
                    $('#data-lap4-bulan').html(data).show();
                });
            } else {
                $('#data-lap4-bulan').load(data_lap4_bulan);
            }
        });

    //USER
        var data_user = "app/user.data.php";
        $('#data-user').load(data_user);

        $('.upd-user').live("click", function(){
            var url = "app/user.form.php";
            id_user = this.id;
            if(id_user!=0) {
                $(".modal-title").html("Edit Data User");
            }
            $.post(url, {user_id: id_user}, function(data){
                $(".modal-body").html(data).show();
            });
        });

        $("#up-user").bind("click", function(event) {
            var url = "app/user.update.php";

            var text_id_lengkap = $('#text_id_lengkap').val();
            var text_nama_lengkap = $('#text_nama_lengkap').val();
            var text_username = $('#text_username').val();
            var select_level = $('#select_level').val();
            var text_sandi = $('#text_sandi').val();

            $.post(url, {id_lengkap: text_id_lengkap, nama_lengkap: text_nama_lengkap, username: text_username, level: select_level, sandi: text_sandi} ,function() {
                $('#data-user').load(data_user);
                $('#upd-user').modal('hide');
            });
        });


	});
}) (jQuery);
