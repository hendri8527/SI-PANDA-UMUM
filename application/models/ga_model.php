<?php

class ga_model extends CI_Model
{

	function loginMe($email, $password)
	{
		$this->db->select('BaseTbl.userId, BaseTbl.password, BaseTbl.name, BaseTbl.roleId, Roles.role');
		$this->db->from('tbl_users as BaseTbl');
		$this->db->join('tbl_roles as Roles', 'Roles.roleId = BaseTbl.roleId');
		$this->db->where('BaseTbl.email', $email);
		$this->db->where('BaseTbl.isDeleted', 0);
		$query = $this->db->get();

		$user = $query->result();

		if (!empty($user)) {
			if (verifyHashedPassword($password, $user[0]->password)) {
				return $user;
			} else {
				return array();
			}
		} else {
			return array();
		}
	}

	//Awal STNK

	function GetStnk()
	{

		return $this->db->query("select a.* from tbl_ga_stnk a order by a.id_ga_stnk desc");
	}

	function EditStnkId($id_ga_stnk)
	{
		return $this->db->query("select a.*,a.alamat as alamat_stnk,b.*,c.* 
		from tbl_ga_stnk a 
		left join tbl_ga_master_type b on a.type=b.id_ga_master_type
		left join tbl_ga_master_jenis c on a.jenis=c.id_ga_master_jenis 
		
		where a.id_ga_stnk='$id_ga_stnk' ");
	}

	function DeleteStnkId($id_ga_stnk)
	{
		return $this->db->query("delete from tbl_ga_stnk where id_ga_stnk='$id_ga_stnk'");
	}



	function NomorRegistrasiSama($nomor_registrasi)
	{

		return $this->db->query("select * from tbl_ga_stnk where binary(nomor_registrasi)='$nomor_registrasi' ");
	}

	//AKHIR SATNK

	function GetMasterAsuransi()
	{
		return $this->db->query("select a.* from tbl_ga_master_asuransi a  order by a.id_ga_master_asuransi desc");
	}

	function EditMasterAsuransiID($id_ga_master_asuransi)
	{
		return $this->db->query("select * from tbl_ga_master_asuransi where id_ga_master_asuransi='$id_ga_master_asuransi' ");
	}

	function DeleteMasterId($id_ga_master_asuransi)
	{
		return $this->db->query("delete from tbl_ga_master_asuransi where id_ga_master_asuransi='$id_ga_master_asuransi' ");
	}

	//Awal Asuransi

	function GetAsuransi()
	{
		return $this->db->query("select a.*,a.nominal as nominal_asuransi,b.*,c.*,d.* from tbl_ga_asuransi a 
		join tbl_ga_master_asuransi b on a.ga_master_asuransi_id=b.id_ga_master_asuransi
		join tbl_ga_stnk c on a.ga_stnk_id=c.id_ga_stnk join tbl_master_login d on a.master_login_id=d.id_master_login order by a.id_ga_asuransi desc");
	}

	function EditAsuransiId($id_ga_asuransi)
	{
		return $this->db->query("select * from tbl_ga_asuransi where id_ga_asuransi='$id_ga_asuransi' ");
	}

	function DeleteAsuransiId($id_ga_asuransi)
	{
		return $this->db->query("delete from tbl_ga_asuransi where id_ga_asuransi='$id_ga_asuransi' ");
	}

	function DetailAsuransiId($id_ga_asuransi)
	{
		return $this->db->query("select a.*,a.nominal as nominal_asuransi,b.*,c.*,d.*,e.*,f.* from tbl_ga_asuransi a join tbl_ga_master_asuransi b on a.ga_master_asuransi_id=b.id_ga_master_asuransi
		join tbl_ga_stnk c on a.ga_stnk_id=c.id_ga_stnk 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		join tbl_ga_master_type e on c.type=e.id_ga_master_type
		join tbl_ga_master_jenis f on c.jenis=f.id_ga_master_jenis
		where a.id_ga_asuransi='$id_ga_asuransi' ");
	}

	function GetAsuransiExpired($bulan2, $bulan1, $bulan, $tahun)
	{
		return $this->db->query("select a.*,a.nominal as nominal_asuransi,b.*,c.*,d.* from tbl_ga_asuransi a join tbl_ga_master_asuransi b on a.ga_master_asuransi_id=b.id_ga_master_asuransi
		join tbl_ga_stnk c on a.ga_stnk_id=c.id_ga_stnk join tbl_master_login d on a.master_login_id=d.id_master_login 
		where year(a.tgl_berakhir)='$tahun' and (month(a.tgl_berakhir)='$bulan2' or month(a.tgl_berakhir)='$bulan1' or month(a.tgl_berakhir)='$bulan')");
	}

	function GetAsuransiExpiredTotal($bulan2, $bulan1, $bulan, $tahun)
	{
		return $this->db->query("select sum(a.nominal) as total_asuransi from tbl_ga_asuransi a join tbl_ga_master_asuransi b on a.ga_master_asuransi_id=b.id_ga_master_asuransi
		join tbl_ga_stnk c on a.ga_stnk_id=c.id_ga_stnk join tbl_master_login d on a.master_login_id=d.id_master_login 
		where year(a.tgl_berakhir)='$tahun' and (month(a.tgl_berakhir)='$bulan2' or month(a.tgl_berakhir)='$bulan1' or month(a.tgl_berakhir)='$bulan')");
	}

	//Asuransi

	function GetStnkgantiPlat($bulan2, $bulan1, $tahun, $bulan)
	{
		return $this->db->query("select * from tbl_ga_stnk where year(berlaku_sampai)='$tahun' and (month(berlaku_sampai)='$bulan2' or month(berlaku_sampai)='$bulan1' or month(berlaku_sampai)='$bulan') order by id_ga_stnk desc");
	}

	function GetStnkgantiPlatTotal($bulan2, $bulan1, $tahun, $bulan)
	{
		return $this->db->query("select sum(nominal) as total from tbl_ga_stnk where year(berlaku_sampai)='$tahun' and (month(berlaku_sampai)='$bulan2' or month(berlaku_sampai)='$bulan1' or month(berlaku_sampai)='$bulan') order by id_ga_stnk desc");
	}

	function GetStnkPerpanjangPajak($bulan2, $bulan1, $bulan)
	{
		return $this->db->query("select * from tbl_ga_stnk where status_perpanjang_pajak='1' and (month(berlaku_sampai)='$bulan2' or month(berlaku_sampai)='$bulan1' or month(berlaku_sampai)='$bulan') order by id_ga_stnk desc");
	}
	function GetStnkPerpanjangPajakTotalNominal($bulan2, $bulan1, $bulan)
	{
		return $this->db->query("select sum(nominal) as total from tbl_ga_stnk where status_perpanjang_pajak='1' and (month(berlaku_sampai)='$bulan2' or month(berlaku_sampai)='$bulan1' or month(berlaku_sampai)='$bulan') order by id_ga_stnk desc");
	}

	//Awal Type 

	function GetMasterType()
	{
		return $this->db->query("select * from tbl_ga_master_type order by id_ga_master_type desc");
	}

	function EditMasterTypeID($id_ga_master_type)
	{
		return $this->db->query("select * from tbl_ga_master_type where id_ga_master_type='$id_ga_master_type' ");
	}

	function DeleteMasterTypeId($id_ga_master_type)
	{
		return $this->db->query("delete from tbl_ga_master_type where id_ga_master_type='$id_ga_master_type' ");
	}

	//Akhir Type

	//Awal Jenis 

	function GetMasterJenis()
	{
		return $this->db->query("select * from tbl_ga_master_jenis order by id_ga_master_jenis desc");
	}

	function EditMasterJenisID($id_ga_master_jenis)
	{
		return $this->db->query("select * from tbl_ga_master_jenis where id_ga_master_jenis='$id_ga_master_jenis' ");
	}

	function DeleteMasterJenisId($id_ga_master_jenis)
	{
		return $this->db->query("delete from tbl_ga_master_jenis where id_ga_master_jenis='$id_ga_master_jenis' ");
	}

	//Akhir Jenis


	//Awal Jenis Asuransi

	function GetMasterJenisAsuransi()
	{
		return $this->db->query("select * from tbl_ga_master_jenis_asuransi order by id_ga_master_jenis_asuransi desc");
	}

	function EditMasterJenisAsuransiID($id_ga_master_jenis_asuransi)
	{
		return $this->db->query("select * from tbl_ga_master_jenis_asuransi where id_ga_master_jenis_asuransi='$id_ga_master_jenis_asuransi' ");
	}

	function DeleteMasterJenisAsuransivId($id_ga_master_jenis_asuransi)
	{
		return $this->db->query("delete from tbl_ga_master_jenis_asuransi where id_ga_master_jenis_asuransi='$id_ga_master_jenis_asuransi' ");
	}

	function GetMasterJenisAsuransiView()
	{
		return $this->db->query("select * from tbl_ga_master_jenis_asuransi_view order by id_ga_master_jenis_asuransi desc");
	}

	//Akhir Jenis

	//Awal Lising 

	function GetMasterLising()
	{
		return $this->db->query("select * from tbl_ga_master_lising order by id_ga_master_lising desc");
	}

	function EditMasterLisingID($id_ga_master_lising)
	{
		return $this->db->query("select * from tbl_ga_master_lising where id_ga_master_lising='$id_ga_master_lising' ");
	}

	function DeleteMasterLisingId($id_ga_master_lising)
	{
		return $this->db->query("delete from tbl_ga_master_lising where id_ga_master_lising='$id_ga_master_lising' ");
	}

	//Akhir Lising


	//Awal GPS
	function GetGps()
	{
		return $this->db->query("select a.*,a.nominal as nominal_gps,c.*,d.* from tbl_ga_gps a 
		join tbl_ga_stnk c on a.ga_stnk_id=c.id_ga_stnk 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		order by a.id_ga_gps desc");
	}

	function EditGpsId($id_ga_gps)
	{
		return $this->db->query("select * from tbl_ga_gps where id_ga_gps='$id_ga_gps' ");
	}

	function DeleteGpsId($id_ga_gps)
	{
		return $this->db->query("delete from tbl_ga_gps where id_ga_gps='$id_ga_gps' ");
	}

	function DetailGpsId($id_ga_gps)
	{
		return $this->db->query("select a.*,a.nominal as nominal_gps,c.*,d.*,e.*,f.*
		from tbl_ga_gps a 
		join tbl_ga_stnk c on a.ga_stnk_id=c.id_ga_stnk 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		join tbl_ga_master_type e on c.type=e.id_ga_master_type
		join tbl_ga_master_jenis f on c.jenis=f.id_ga_master_jenis
		where a.id_ga_gps='$id_ga_gps' ");
	}

	function GetGpsExpired($bulan2, $bulan1, $bulan, $tahun)
	{
		return $this->db->query("select a.*,a.nominal as nominal_gps,c.*,d.* 
		from tbl_ga_gps a 
		join tbl_ga_stnk c on a.ga_stnk_id=c.id_ga_stnk 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		where year(a.tgl_berakhir)='$tahun' and month(a.tgl_berakhir)='$bulan2' or month(a.tgl_berakhir)='$bulan1' or month(a.tgl_berakhir)='$bulan'");
	}
	function GetGpsExpiredTotal($bulan2, $bulan1, $bulan, $tahun)
	{
		return $this->db->query("select sum(a.nominal) as total 
		from tbl_ga_gps a 
		join tbl_ga_stnk c on a.ga_stnk_id=c.id_ga_stnk 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		where year(a.tgl_berakhir)='$tahun' and month(a.tgl_berakhir)='$bulan2' or month(a.tgl_berakhir)='$bulan1' or month(a.tgl_berakhir)='$bulan'");
	}
	//Akhir GPS

	//Awal KIR
	function GetKir()
	{
		return $this->db->query("select a.*,a.nominal as nominal_kir,c.*,d.* from tbl_ga_kir a 
		join tbl_ga_stnk c on a.ga_stnk_id=c.id_ga_stnk 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		order by a.id_ga_kir desc");
	}

	function EditKirId($id_ga_kir)
	{
		return $this->db->query("select * from tbl_ga_kir where id_ga_kir='$id_ga_kir' ");
	}

	function DeleteKirId($id_ga_kir)
	{
		return $this->db->query("delete from tbl_ga_kir where id_ga_kir='$id_ga_kir' ");
	}

	function DetailKirId($id_ga_kir)
	{
		return $this->db->query("select a.*,a.nominal as nominal_kir,c.*,d.*,e.*,f.*
		from tbl_ga_kir a 
		join tbl_ga_stnk c on a.ga_stnk_id=c.id_ga_stnk 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		join tbl_ga_master_type e on c.type=e.id_ga_master_type
		join tbl_ga_master_jenis f on c.jenis=f.id_ga_master_jenis
		where a.id_ga_kir='$id_ga_kir' ");
	}

	function GetKirExpired($bulan2, $bulan1, $bulan, $tahun)
	{
		return $this->db->query("select a.*,a.nominal as nominal_kir,c.*,d.* 
		from tbl_ga_kir a 
		join tbl_ga_stnk c on a.ga_stnk_id=c.id_ga_stnk 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		where year(a.tgl_berakhir)='$tahun' and month(a.tgl_berakhir)='$bulan2' or month(a.tgl_berakhir)='$bulan1' or month(a.tgl_berakhir)='$bulan'");
	}

	function GetKirExpiredTotal($bulan2, $bulan1, $bulan, $tahun)
	{
		return $this->db->query("select sum(a.nominal) as total 
		from tbl_ga_kir a 
		join tbl_ga_stnk c on a.ga_stnk_id=c.id_ga_stnk 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		where year(a.tgl_berakhir)='$tahun' and month(a.tgl_berakhir)='$bulan2' or month(a.tgl_berakhir)='$bulan1' or month(a.tgl_berakhir)='$bulan'");
	}
	//Akhir KIR

	//Awal Perolehan
	function GetPerolehan()
	{
		return $this->db->query("select a.*,((year(curdate())-year(tgl_perolehan)) 
- (right(curdate(),5) < right(tgl_perolehan,5))) as tahun, 
((month(curdate())-month(tgl_perolehan)) 
- (right(curdate(),5) < right(tgl_perolehan,5))) as bulan,c.*,d.* from tbl_ga_stnk_perolehan a 
		join tbl_ga_stnk c on a.ga_stnk_id=c.id_ga_stnk  
		join tbl_ga_master_klasifikasi_kendaraan d on a.ga_master_klasifikasi_kendaraan_id=d.id_ga_master_klasifikasi_kendaraan
		order by a.id_ga_stnk_perolehan desc");
	}

	function GetPerolehanPilhan($pilihan)
	{
		return $this->db->query("select a.*,((year(curdate())-year(tgl_perolehan)) 
- (right(curdate(),5) < right(tgl_perolehan,5))) as tahun, 
((month(curdate())-month(tgl_perolehan)) 
- (right(curdate(),5) < right(tgl_perolehan,5))+$pilihan) as bulan,c.*,d.* from tbl_ga_stnk_perolehan a 
		join tbl_ga_stnk c on a.ga_stnk_id=c.id_ga_stnk  
		join tbl_ga_master_klasifikasi_kendaraan d on a.ga_master_klasifikasi_kendaraan_id=d.id_ga_master_klasifikasi_kendaraan
		order by a.id_ga_stnk_perolehan desc");
	}

	function EditPerolehanId($id_ga_stnk_perolehan)
	{
		return $this->db->query("select * from tbl_ga_stnk_perolehan where id_ga_stnk_perolehan='$id_ga_stnk_perolehan' ");
	}

	function DeletePerolehanId($id_ga_stnk_perolehan)
	{
		return $this->db->query("delete from tbl_ga_stnk_perolehan where id_ga_stnk_perolehan='$id_ga_stnk_perolehan' ");
	}

	function DetailPerolehanId($id_ga_stnk_perolehan)
	{
		return $this->db->query("select a.*,c.*,e.*,f.*
		from tbl_ga_stnk_perolehan a 
		join tbl_ga_stnk c on a.ga_stnk_id=c.id_ga_stnk 
		left join tbl_ga_master_type e on c.type=e.id_ga_master_type
		left join tbl_ga_master_jenis f on c.jenis=f.id_ga_master_jenis
		where a.id_ga_stnk_perolehan='$id_ga_stnk_perolehan' ");
	}

	//Akhir Perolehan

	//Awal Klasifikasi Kendaraan 

	function GetKlasifikasiKendaraan()
	{
		return $this->db->query("select * from tbl_ga_master_klasifikasi_kendaraan order by id_ga_master_klasifikasi_kendaraan desc");
	}

	function EditKlasifikasiKendaraanID($id_ga_master_klasifikasi_kendaraan)
	{
		return $this->db->query("select * from tbl_ga_master_klasifikasi_kendaraan where id_ga_master_klasifikasi_kendaraan='$id_ga_master_klasifikasi_kendaraan' ");
	}

	function DeleteKlasifikasiKendaraanId($id_ga_master_klasifikasi_kendaraan)
	{
		return $this->db->query("delete from tbl_ga_master_klasifikasi_kendaraan where id_ga_master_klasifikasi_kendaraan='$id_ga_master_klasifikasi_kendaraan' ");
	}

	//Akhir Klasifikasi Kendaraan


	//Awal Laporanfff
	// function GetTahunPembuatan () {
	// 	return $this->db->query("select tahun_pembuatan from tbl_ga_stnk group by tahun_pembuatan order by tahun_pembuatan asc");
	// }

	// function GetTahunPembuatanTahun ($tahun) {
	// 	return $this->db->query("select * from tbl_ga_stnk where tahun_pembuatan='$tahun' order by id_ga_stnk desc");
	// }

	// function GetStatusStnk($status) {
	// 	return $this->db->query("select * from tbl_ga_stnk where status_kendaraan='$status' order by id_ga_stnk desc");
	// }

	// function GetMasterLisingID($lising) {
	// 	return $this->db->query("select * from tbl_ga_master_lising where id_ga_master_lising='$lising' ");
	// }

	// function GetStnkLising($lising) {
	// 	return $this->db->query("select * from tbl_ga_stnk where ga_master_lising_id='$lising' ");
	// }

	// function GetStnkTahunStatusLising($tahun,$status,$lising) {
	// 	return $this->db->query("select * from tbl_ga_stnk where tahun_pembuatan='$tahun' 
	// 		and status_kendaraan='$status'
	// 		and ga_master_lising_id='$lising' 
	// 		order by id_ga_stnk desc");
	// }


	//Akhir Laporan


	//Awal Laporan
	function GetTahunPembuatan()
	{
		return $this->db->query("select tahun_pembuatan from tbl_ga_stnk group by tahun_pembuatan order by tahun_pembuatan asc");
	}

	function GetTahunPembuatanTahun($tahun)
	{
		return $this->db->query("select a.*,b.*,c.*
		 from tbl_ga_stnk a
		 join tbl_ga_master_type b on a.type=b.id_ga_master_type
		 join tbl_ga_master_jenis c on a.jenis=c.id_ga_master_jenis
		 where a.tahun_pembuatan='$tahun' order by a.id_ga_stnk desc");
	}

	function GetStatusStnk($status)
	{
		return $this->db->query("select a.*,b.*,c.*
		 from tbl_ga_stnk a
		 join tbl_ga_master_type b on a.type=b.id_ga_master_type
		 join tbl_ga_master_jenis c on a.jenis=c.id_ga_master_jenis 
		 where a.status_kendaraan='$status' order by a.id_ga_stnk desc");
	}

	function GetMasterLisingID($lising)
	{
		return $this->db->query("select * from tbl_ga_master_lising where id_ga_master_lising='$lising' ");
	}

	function GetStnkLising($lising)
	{
		return $this->db->query("select a.*,b.*,c.*
		 from tbl_ga_stnk a
		 join tbl_ga_master_type b on a.type=b.id_ga_master_type
		 join tbl_ga_master_jenis c on a.jenis=c.id_ga_master_jenis
		  where a.ga_master_lising_id='$lising' ");
	}

	function GetStnkTahunStatusLising($tahun, $status, $lising)
	{
		return $this->db->query("select a.*,b.*,c.*
		 from tbl_ga_stnk a
		 join tbl_ga_master_type b on a.type=b.id_ga_master_type
		 join tbl_ga_master_jenis c on a.jenis=c.id_ga_master_jenis
		 where a.tahun_pembuatan='$tahun' 
			and a.status_kendaraan='$status'
			and a.ga_master_lising_id='$lising' 
			order by a.id_ga_stnk desc");
	}

	function GetStnkTahunStatus($tahun, $status)
	{
		return $this->db->query("select a.*,b.*,c.*
		 from tbl_ga_stnk a
		 join tbl_ga_master_type b on a.type=b.id_ga_master_type
		 join tbl_ga_master_jenis c on a.jenis=c.id_ga_master_jenis 
		 where a.tahun_pembuatan='$tahun' 
			and a.status_kendaraan='$status'
			order by a.id_ga_stnk desc");
	}

	function GetStnkTahunLising($tahun, $lising)
	{
		return $this->db->query("select a.*,b.*,c.*
		 from tbl_ga_stnk a
		 join tbl_ga_master_type b on a.type=b.id_ga_master_type
		 join tbl_ga_master_jenis c on a.jenis=c.id_ga_master_jenis
		 where a.tahun_pembuatan='$tahun' 
			and a.ga_master_lising_id='$lising' 
			order by a.id_ga_stnk desc");
	}

	function GetStnkStatusLising($status, $lising)
	{
		return $this->db->query("select a.*,b.*,c.*
		 from tbl_ga_stnk a
		 join tbl_ga_master_type b on a.type=b.id_ga_master_type
		 join tbl_ga_master_jenis c on a.jenis=c.id_ga_master_jenis 
		 where a.status_kendaraan='$status'
			and a.ga_master_lising_id='$lising' 
			order by a.id_ga_stnk desc");
	}


	//Akhir Laporan


	//Awal Laporan tahun KIR
	function GetTahunKir($tahun)
	{

		return $this->db->query("select a.*,a.nominal as nominal_kir,month(a.tgl_berakhir) as bulan,c.*,d.* 
		from tbl_ga_kir a 
		join tbl_ga_stnk c on a.ga_stnk_id=c.id_ga_stnk 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		where year(a.tgl_berakhir)='$tahun'
		order by a.tgl_berakhir asc");
	}
	//Akhir Laporan Tahun Kir

	//Awal Laporan tahun Asuransi
	function GetTahunAsuransi($tahun)
	{

		return $this->db->query("select a.*,a.nominal as nominal_asuransi,month(tgl_berakhir) as bulan,b.*,c.*,d.* from tbl_ga_asuransi a 
		join tbl_ga_master_asuransi b on a.ga_master_asuransi_id=b.id_ga_master_asuransi
		join tbl_ga_stnk c on a.ga_stnk_id=c.id_ga_stnk 
		join tbl_master_login d on a.master_login_id=d.id_master_login 
		where year(a.tgl_berakhir)='$tahun'
		order by a.tgl_berakhir asc");
	}
	//Akhir Laporan Tahun Asuransi

	//Awal Laporan tahun Pajak Stnk
	function GetPajakStnkTahun($tahun)
	{

		return $this->db->query("select *,month(berlaku_sampai) as bulan from tbl_ga_stnk where year(berlaku_sampai)='$tahun'
		order by month(berlaku_sampai) asc");
	}

	function GetPajakStnkTahunTotal($tahun)
	{

		return $this->db->query("select count(id_ga_stnk) as total from tbl_ga_stnk where year(berlaku_sampai)='$tahun'
		order by berlaku_sampai asc");
	}
	//Akhir Laporan Tahun Pajak Stnk

	//Data Pegawai
	function GetMasterPegawai()
	{
		return $this->db->query("select * from  tbl_pegawai order by nama asc");
	}

	//Data Bagian
	function GetMasterBagian()
	{
		return $this->db->query("select * from  tbl_bagian order by nama_bagian asc");
	}
}
