<?php
	class Model_Absensi extends CI_Model{

		function show(){
			return $this->db->query("SELECT id, nama_karyawan, jam_masuk, jam_keluar, jam_lembur_masuk, jam_lembur_keluar, CASE DAYOFWEEK(tanggal) WHEN 1 THEN 'Minggu' WHEN 2 THEN 'Senin' WHEN 3 THEN 'Selasa' WHEN 4 THEN 'Rabu' WHEN 5 THEN 'Kamis' WHEN 6 THEN 'Jumat' WHEN 7 THEN 'Sabtu' END AS hari, DAY(tanggal) AS tgl, CASE MONTH(tanggal) WHEN 1 THEN 'Januari' WHEN 2 THEN 'Febuari' WHEN 3 THEN 'Maret' WHEN 4 THEN 'April' WHEN 5 THEN 'Mei' WHEN 6 THEN 'Juni' WHEN 7 THEN 'Juli' WHEN 8 THEN 'Agustus' WHEN 9 THEN 'September' WHEN 10 THEN 'Oktober' WHEN 11 THEN 'November' WHEN 12 THEN 'Desember' END AS bln, YEAR(tanggal) AS thn FROM absensi ORDER BY id DESC");
		}

		function show_lap1(){
			return $this->db->query("SELECT id, nama_karyawan, jam_masuk, jam_keluar, jam_lembur_masuk, jam_lembur_keluar, CASE DAYOFWEEK(tanggal) WHEN 1 THEN 'Minggu' WHEN 2 THEN 'Senin' WHEN 3 THEN 'Selasa' WHEN 4 THEN 'Rabu' WHEN 5 THEN 'Kamis' WHEN 6 THEN 'Jumat' WHEN 7 THEN 'Sabtu' END AS hari, DAY(tanggal) AS tgl, CASE MONTH(tanggal) WHEN 1 THEN 'Januari' WHEN 2 THEN 'Febuari' WHEN 3 THEN 'Maret' WHEN 4 THEN 'April' WHEN 5 THEN 'Mei' WHEN 6 THEN 'Juni' WHEN 7 THEN 'Juli' WHEN 8 THEN 'Agustus' WHEN 9 THEN 'September' WHEN 10 THEN 'Oktober' WHEN 11 THEN 'November' WHEN 12 THEN 'Desember' END AS bln, YEAR(tanggal) AS thn FROM absensi WHERE tanggal=CURDATE() ORDER BY tanggal DESC");
		}

		function search1($date){
			return $this->db->query("SELECT id, nama_karyawan, jam_masuk, jam_keluar, jam_lembur_masuk, jam_lembur_keluar, CASE DAYOFWEEK(tanggal) WHEN 1 THEN 'Minggu' WHEN 2 THEN 'Senin' WHEN 3 THEN 'Selasa' WHEN 4 THEN 'Rabu' WHEN 5 THEN 'Kamis' WHEN 6 THEN 'Jumat' WHEN 7 THEN 'Sabtu' END AS hari, DAY(tanggal) AS tgl, CASE MONTH(tanggal) WHEN 1 THEN 'Januari' WHEN 2 THEN 'Febuari' WHEN 3 THEN 'Maret' WHEN 4 THEN 'April' WHEN 5 THEN 'Mei' WHEN 6 THEN 'Juni' WHEN 7 THEN 'Juli' WHEN 8 THEN 'Agustus' WHEN 9 THEN 'September' WHEN 10 THEN 'Oktober' WHEN 11 THEN 'November' WHEN 12 THEN 'Desember' END AS bln, YEAR(tanggal) AS thn FROM absensi WHERE tanggal='$date' ORDER BY tanggal DESC");	
		}

		function search2($nama, $bulan, $tahun){
			return $this->db->query("SELECT id, nama_karyawan, jam_masuk, jam_keluar, jam_lembur_masuk, jam_lembur_keluar, tanggal, CASE DAYOFWEEK(tanggal) WHEN 1 THEN 'Minggu' WHEN 2 THEN 'Senin' WHEN 3 THEN 'Selasa' WHEN 4 THEN 'Rabu' WHEN 5 THEN 'Kamis' WHEN 6 THEN 'Jumat' WHEN 7 THEN 'Sabtu' END AS hari, DAY(tanggal) AS tgl, CASE MONTH(tanggal) WHEN 1 THEN 'Januari' WHEN 2 THEN 'Febuari' WHEN 3 THEN 'Maret' WHEN 4 THEN 'April' WHEN 5 THEN 'Mei' WHEN 6 THEN 'Juni' WHEN 7 THEN 'Juli' WHEN 8 THEN 'Agustus' WHEN 9 THEN 'September' WHEN 10 THEN 'Oktober' WHEN 11 THEN 'November' WHEN 12 THEN 'Desember' END AS bln, YEAR(tanggal) AS thn FROM absensi WHERE nama_karyawan='$nama' AND MONTH(tanggal)='$bulan' AND YEAR(tanggal)='$tahun' ORDER BY tanggal");	
		}

		function search3($parameter){	
			return $this->db->get_where('absensi', $parameter);
		}

	}
