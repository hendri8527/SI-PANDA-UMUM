<?php

class ga extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ga_model');
	}

	public function index()
	{
		$this->load->view('ga/login/index');
	}

	public function home()
	{
		$this->template_dua->load('template_dua', 'ga/sistem/home/index');
	}



	//AWAL STNK

	public function stnk()
	{


		$data['data_stnk'] = $this->ga_model->GetStnk();
		$this->template_dua->load('template_dua', 'ga/sistem/stnk/index', $data);
	}

	public function stnk_tambah()
	{


		$data['data_master_type'] = $this->ga_model->GetMasterType();
		$data['data_master_jenis'] = $this->ga_model->GetMasterJenis();
		$data['data_master_pegawai'] = $this->ga_model->GetMasterPegawai();
		$data['data_master_bagian'] = $this->ga_model->GetMasterBagian();


		$this->template_dua->load('template_dua', 'ga/sistem/stnk/add', $data);
	}

	public function stnk_simpan()
	{


		$this->form_validation->set_rules('nomor_registrasi', 'Plat Nomor', 'required');
		$this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required');
		$this->form_validation->set_rules('nominal', 'Nominal Pajak', 'required');
		$this->form_validation->set_rules('berlaku_sampai', 'Berlaku Sampai Dengan', 'required');


		if ($this->form_validation->run() == FALSE) {
			$data['data_master_type'] = $this->ga_model->GetMasterType();
			$data['data_master_jenis'] = $this->ga_model->GetMasterJenis();

			$this->template_dua->load('template_dua', 'ga/sistem/stnk/add', $data);
		} else {

			$nomor_registrasi = $this->input->post("nomor_registrasi");
			$cek = $this->ga_model->NomorRegistrasiSama($nomor_registrasi);

			if ($cek->num_rows() > 0) {

				$this->session->set_flashdata('sama', 'STNK Sudah Dimasukkan');
				redirect("ga/stnk");
			} else {

				$in_data['nomor_registrasi'] 		= $this->input->post('nomor_registrasi');
				$in_data['nama_pemilik'] 			= $this->input->post('nama_pemilik');
				$in_data['alamat'] 					= $this->input->post('alamat');
				$in_data['merk'] 					= $this->input->post('merk');
				$in_data['type'] 					= $this->input->post('type');
				$in_data['jenis'] 					= $this->input->post('jenis');
				$in_data['model'] 					= $this->input->post('model');
				$in_data['tahun_pembuatan'] 		= $this->input->post('tahun_pembuatan');
				$in_data['isi_silinder'] 			= $this->input->post('isi_silinder');
				$in_data['nomor_rangka'] 			= $this->input->post('nomor_rangka');
				$in_data['nomor_mesin'] 			= $this->input->post('nomor_mesin');
				$in_data['warna'] 					= $this->input->post('warna');
				$in_data['bahan_bakar'] 			= $this->input->post('bahan_bakar');
				$in_data['warna_tnkb'] 				= $this->input->post('warna_tnkb');
				$in_data['tahun_registrasi'] 		= $this->input->post('tahun_registrasi');
				$in_data['nomor_bpkb'] 				= $this->input->post('nomor_bpkb');
				$in_data['kode_lokasi'] 			= $this->input->post('kode_lokasi');
				$in_data['no_urut_pendaftaran'] 	= $this->input->post('no_urut_pendaftaran');
				$in_data['berlaku_sampai'] 			= $this->input->post('berlaku_sampai');
				$in_data['status_kendaraan'] 		= $this->input->post('status_kendaraan');
				$in_data['lokasi'] 					= $this->input->post('lokasi');
				// $in_data['box'] 					= $this->input->post('box');
				$in_data['nomor_kontrak'] 			= $this->input->post('nomor_kontrak');
				$in_data['nomor_lambung'] 			= $this->input->post('nomor_lambung');
				$in_data['komersil'] 				= $this->input->post('komersil');
				$in_data['nominal'] 				= $this->input->post('nominal');
				$in_data['nip']					= $this->input->post('nip');
				$in_data['unit_kerja']			= $this->inpit->post('unit_kerja');
				$this->db->insert("tbl_ga_stnk", $in_data);



				$this->session->set_flashdata('berhasil', 'STNK Berhasil Disimpan');
				redirect("ga/stnk");
			}
		}
	}

	public function stnk_edit()
	{
		$id_ga_stnk = $this->uri->segment(3);

		$query  = $this->ga_model->EditStnkId($id_ga_stnk);

		foreach ($query->result_array() as $value) {
			$data['id_ga_stnk']				= $value['id_ga_stnk'];
			$data['nomor_registrasi']		= $value['nomor_registrasi'];
			$data['nama_pemilik']			= $value['nama_pemilik'];
			$data['alamat']					= $value['alamat_stnk'];
			$data['merk'] 					= $value['merk'];
			$data['type'] 					= $value['type'];
			$data['jenis'] 					= $value['jenis'];
			$data['model'] 					= $value['model'];
			$data['tahun_pembuatan'] 		= $value['tahun_pembuatan'];
			$data['isi_silinder'] 			= $value['isi_silinder'];
			$data['nomor_rangka'] 			= $value['nomor_rangka'];
			$data['nomor_mesin'] 			= $value['nomor_mesin'];
			$data['warna'] 					= $value['warna'];
			$data['bahan_bakar'] 			= $value['bahan_bakar'];
			$data['warna_tnkb'] 			= $value['warna_tnkb'];
			$data['tahun_registrasi'] 		= $value['tahun_registrasi'];
			$data['nomor_bpkb'] 			= $value['nomor_bpkb'];
			$data['kode_lokasi'] 			= $value['kode_lokasi'];
			$data['no_urut_pendaftaran'] 	= $value['no_urut_pendaftaran'];
			$data['berlaku_sampai'] 		= $value['berlaku_sampai'];
			$data['status_kendaraan'] 		= $value['status_kendaraan'];
			$data['lokasi'] 				= $value['lokasi'];
			// $data['box'] 					= $value['box'];
			$data['nomor_kontrak'] 			= $value['nomor_kontrak'];
			$data['nomor_lambung'] 			= $value['nomor_lambung'];
			$data['komersil'] 				= $value['komersil'];
			$data['nominal'] 				= $value['nominal'];
		}
		$data['data_master_type'] = $this->ga_model->GetMasterType();
		$data['data_master_jenis'] = $this->ga_model->GetMasterJenis();

		$this->template_dua->load('template_dua', 'ga/sistem/stnk/edit', $data);
	}

	public function stnk_update()
	{
		$id['id_ga_stnk'] = $this->input->post("id_ga_stnk");

		$in_data['nomor_registrasi'] 		= $this->input->post('nomor_registrasi');
		$in_data['nama_pemilik'] 			= $this->input->post('nama_pemilik');
		$in_data['alamat'] 					= $this->input->post('alamat');
		$in_data['merk'] 					= $this->input->post('merk');
		$in_data['type'] 					= $this->input->post('type');
		$in_data['jenis'] 					= $this->input->post('jenis');
		$in_data['model'] 					= $this->input->post('model');
		$in_data['tahun_pembuatan'] 		= $this->input->post('tahun_pembuatan');
		$in_data['isi_silinder'] 			= $this->input->post('isi_silinder');
		$in_data['nomor_rangka'] 			= $this->input->post('nomor_rangka');
		$in_data['nomor_mesin'] 			= $this->input->post('nomor_mesin');
		$in_data['warna'] 					= $this->input->post('warna');
		$in_data['bahan_bakar'] 			= $this->input->post('bahan_bakar');
		$in_data['warna_tnkb'] 				= $this->input->post('warna_tnkb');
		$in_data['tahun_registrasi'] 		= $this->input->post('tahun_registrasi');
		$in_data['nomor_bpkb'] 				= $this->input->post('nomor_bpkb');
		$in_data['kode_lokasi'] 			= $this->input->post('kode_lokasi');
		$in_data['no_urut_pendaftaran'] 	= $this->input->post('no_urut_pendaftaran');
		$in_data['berlaku_sampai'] 			= $this->input->post('berlaku_sampai');
		$in_data['status_kendaraan'] 		= $this->input->post('status_kendaraan');
		$in_data['lokasi'] 					= $this->input->post('lokasi');
		// $in_data['box'] 				= $this->input->post('box');
		$in_data['nomor_kontrak'] 			= $this->input->post('nomor_kontrak');
		$in_data['nomor_lambung'] 			= $this->input->post('nomor_lambung');
		$in_data['komersil'] 				= $this->input->post('komersil');
		$in_data['nominal'] 				= $this->input->post('nominal');


		$this->db->update("tbl_ga_stnk", $in_data, $id);

		$this->session->set_flashdata('update', 'STNK Berhasil Diupdate');
		redirect("ga/stnk");
	}

	public function stnk_detail()
	{
		$id_ga_stnk = $this->uri->segment(3);

		$data['data_stnk']  = $this->ga_model->EditStnkId($id_ga_stnk);


		$this->template_dua->load('template_dua', 'ga/sistem/stnk/show', $data);
	}

	public function stnk_delete()
	{
		$id_ga_stnk  = $this->uri->segment(3);

		$this->ga_model->DeleteStnkId($id_ga_stnk);

		$this->session->set_flashdata('message', 'STNK Berhasil Dihapus');
		redirect('ga/stnk');
	}
	public function stnk_cetak_excel()
	{



		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=cetak_all_stnk.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$data['data_stnk'] = $this->ga_model->GetStnk();
		$this->load->view('ga/sistem/stnk/excel', $data);
	}

	public function master_asuransi()
	{



		$data['data_master_asuransi'] = $this->ga_model->GetMasterAsuransi();
		$this->template_dua->load('template_dua', 'ga/sistem/master_asuransi/index', $data);
	}

	public function stnk_perpanjangan_pajak_excel()
	{



		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=cetak_perpanjangan_stnk.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$bulan =  date('m', strtotime("+2 month"));
		$bulan1 =  date('m', strtotime("+1 month"));
		$bulan2 =  date('m');

		$data['data_stnk'] 					= $this->ga_model->GetStnkPerpanjangPajak($bulan2, $bulan1, $bulan);
		$data['data_total_nominal_pajak'] 	= $this->ga_model->GetStnkPerpanjangPajakTotalNominal($bulan2, $bulan1, $bulan);

		$this->load->view('ga/sistem/stnk/cetak_perpanjangan_stnk', $data);
	}

	//AKHIR STNK

	public function master_asuransi_tambah()
	{



		// $data['data_master_jenis_asuransi'] = $this->ga_model->GetMasterJenisAsuransi();
		$this->template_dua->load('template_dua', 'ga/sistem/master_asuransi/add');
	}

	public function master_asuransi_simpan()
	{


		$this->form_validation->set_rules('nama_ga_master_asuransi', 'Nama Asuransi', 'required');
		$this->form_validation->set_rules('alamat_ga_master_asuransi', 'Alamat', 'required');
		$this->form_validation->set_rules('telp_ga_master_asuransi', 'Telp', 'required');
		// $this->form_validation->set_rules('ga_master_jenis_asuransi_id', 'Jenis Asuransi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['data_master_jenis_asuransi'] = $this->ga_model->GetMasterJenisAsuransi();
			$this->template_dua->load('template_dua', 'ga/sistem/master_asuransi/add', $data);
		} else {

			$in_data['nama_ga_master_asuransi'] 	= $this->input->post('nama_ga_master_asuransi');
			$in_data['alamat_ga_master_asuransi'] 	= $this->input->post('alamat_ga_master_asuransi');
			$in_data['telp_ga_master_asuransi'] 	= $this->input->post('telp_ga_master_asuransi');
			// $in_data['ga_master_jenis_asuransi_id'] 	= $this->input->post('ga_master_jenis_asuransi_id');

			$this->db->insert("tbl_ga_master_asuransi", $in_data);

			$this->session->set_flashdata('berhasil', 'Master Asuransi Berhasil Disimpan');
			redirect("ga/master_asuransi");
		}
	}

	public function master_asuransi_edit()
	{
		$id_ga_master_asuransi = $this->uri->segment(3);

		$query  = $this->ga_model->EditMasterAsuransiID($id_ga_master_asuransi);

		foreach ($query->result_array() as $value) {
			$data['id_ga_master_asuransi']  		= $value['id_ga_master_asuransi'];
			$data['nama_ga_master_asuransi']  		= $value['nama_ga_master_asuransi'];
			$data['alamat_ga_master_asuransi']  	= $value['alamat_ga_master_asuransi'];
			$data['telp_ga_master_asuransi']  		= $value['telp_ga_master_asuransi'];
			// 	$data['ga_master_jenis_asuransi_id']  	= $value['ga_master_jenis_asuransi_id'];
			// 
		}

		// $data['data_master_jenis_asuransi'] =  $this->ga_model->GetMasterJenisAsuransi();

		$this->template_dua->load('template_dua', 'ga/sistem/master_asuransi/edit', $data);
	}

	public function master_asuransi_update()
	{



		$id['id_ga_master_asuransi'] =  $this->input->post('id_ga_master_asuransi');

		$in_data['nama_ga_master_asuransi'] 		= $this->input->post('nama_ga_master_asuransi');
		$in_data['alamat_ga_master_asuransi'] 		= $this->input->post('alamat_ga_master_asuransi');
		$in_data['telp_ga_master_asuransi'] 		= $this->input->post('telp_ga_master_asuransi');
		// $in_data['ga_master_jenis_asuransi_id'] 	= $this->input->post('ga_master_jenis_asuransi_id');

		$this->db->update("tbl_ga_master_asuransi", $in_data, $id);

		$this->session->set_flashdata('update', 'Master Asuransi Berhasil Diupdate');
		redirect("ga/master_asuransi");
	}

	public function master_asuransi_delete()
	{


		$id_ga_master_asuransi = $this->uri->segment(3);

		$this->ga_model->DeleteMasterId($id_ga_master_asuransi);

		$this->session->set_flashdata('message', 'Master Asuransi Berhasil Dihapus');
		redirect('ga/master_asuransi');
	}

	//Awal Ga Asuransi

	public function asuransi()
	{


		$data['data_asuransi'] =  $this->ga_model->GetAsuransi();
		$this->template_dua->load('template_dua', 'ga/sistem/asuransi/index', $data);
	}

	public function asuransi_tambah()
	{


		$data['data_master_asuransi'] 				=  $this->ga_model->GetMasterAsuransi();
		$data['data_stnk'] 							=  $this->ga_model->GetStnk();
		$data['data_master_jenis_asuransi'] 		=  $this->ga_model->GetMasterJenisAsuransi();
		$data['data_master_jenis_asuransi_view'] 	=  $this->ga_model->GetMasterJenisAsuransiView();

		// echo $this->db->last_query();
		// die();
		$this->template_dua->load('template_dua', 'ga/sistem/asuransi/add', $data);
	}

	public function asuransi_simpan()
	{


		$this->form_validation->set_rules('no_polis', 'Nomor Polis', 'required');
		$this->form_validation->set_rules('ga_master_asuransi_id', 'Asuransi', 'required');
		$this->form_validation->set_rules('ga_stnk_id', 'STNK', 'required');
		$this->form_validation->set_rules('tgl_join', 'Tanggal Join', 'required');
		$this->form_validation->set_rules('tgl_berakhir', 'Tanggal Berakhir', 'required');
		$this->form_validation->set_rules('pic', 'PIC', 'required');
		$this->form_validation->set_rules('pic_telp', 'PIC Telp', 'required');
		$this->form_validation->set_rules('nominal', 'Nominal Asuransi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['data_master_asuransi'] 	=  $this->ga_model->GetMasterAsuransi();
			$data['data_stnk'] 				=  $this->ga_model->GetStnk();
			$this->template_dua->load('template_dua', 'ga/sistem/asuransi/add', $data);
		} else {

			$in_data['no_polis'] 							= $this->input->post('no_polis');
			$in_data['pic'] 								= $this->input->post('pic');
			$in_data['pic_telp'] 							= $this->input->post('pic_telp');
			$in_data['tgl_join'] 							= $this->input->post('tgl_join');
			$in_data['tgl_berakhir'] 						= $this->input->post('tgl_berakhir');
			$in_data['ga_master_asuransi_id'] 				= $this->input->post('ga_master_asuransi_id');
			$in_data['ga_master_jenis_asuransi_id'] 		= $this->input->post('ga_master_jenis_asuransi_id');
			$in_data['view_ga_master_jenis_asuransi_id'] 	= $this->input->post('view_ga_master_jenis_asuransi_id');
			$in_data['ga_stnk_id'] 							= $this->input->post('ga_stnk_id');
			$in_data['master_login_id'] 					= $this->session->userdata("id_master_login");
			$in_data['nominal'] 							= $this->input->post('nominal');
			$in_data['status'] 								= "0";

			$this->db->insert("tbl_ga_asuransi", $in_data);

			$this->session->set_flashdata('berhasil', 'Asuransi Berhasil Disimpan');
			redirect("ga/asuransi");
		}
	}

	public function asuransi_edit()
	{


		$id_ga_asuransi = $this->uri->segment(3);

		$query =  $this->ga_model->EditAsuransiId($id_ga_asuransi);

		foreach ($query->result_array() as $value) {
			$data['id_ga_asuransi']  				= $value['id_ga_asuransi'];
			$data['no_polis']  						= $value['no_polis'];
			$data['pic']  							= $value['pic'];
			$data['pic_telp']  						= $value['pic_telp'];
			$data['tgl_join']  						= $value['tgl_join'];
			$data['tgl_berakhir']  					= $value['tgl_berakhir'];
			$data['ga_master_asuransi_id']  		= $value['ga_master_asuransi_id'];
			$data['ga_master_jenis_asuransi_id']  	= $value['ga_master_jenis_asuransi_id'];
			$data['view_ga_master_jenis_asuransi_id']  	= $value['view_ga_master_jenis_asuransi_id'];
			$data['ga_stnk_id']  					= $value['ga_stnk_id'];
			$data['nominal']  						= $value['nominal'];
		}

		$data['data_master_asuransi'] 				=  $this->ga_model->GetMasterAsuransi();
		$data['data_stnk'] 							=  $this->ga_model->GetStnk();
		$data['data_master_jenis_asuransi'] 		=  $this->ga_model->GetMasterJenisAsuransi();
		$data['data_master_jenis_asuransi_view'] 	=  $this->ga_model->GetMasterJenisAsuransiView();
		$this->template_dua->load('template_dua', 'ga/sistem/asuransi/edit', $data);
	}

	public function asuransi_update()
	{


		$id['id_ga_asuransi'] =  $this->input->post('id_ga_asuransi');

		$in_data['no_polis'] 							= $this->input->post('no_polis');
		$in_data['pic'] 								= $this->input->post('pic');
		$in_data['pic_telp'] 							= $this->input->post('pic_telp');
		$in_data['tgl_join'] 							= $this->input->post('tgl_join');
		$in_data['tgl_berakhir'] 						= $this->input->post('tgl_berakhir');
		$in_data['ga_master_asuransi_id'] 				= $this->input->post('ga_master_asuransi_id');
		$in_data['ga_master_jenis_asuransi_id'] 		= $this->input->post('ga_master_jenis_asuransi_id');
		$in_data['view_ga_master_jenis_asuransi_id'] 	= $this->input->post('view_ga_master_jenis_asuransi_id');
		$in_data['ga_stnk_id'] 							= $this->input->post('ga_stnk_id');
		$in_data['nominal'] 							= $this->input->post('nominal');

		$this->db->update("tbl_ga_asuransi", $in_data, $id);

		$this->session->set_flashdata('update', 'Asuransi Berhasil Diupdate');
		redirect("ga/asuransi");
	}

	public function asuransi_delete()
	{


		$id_ga_asuransi =  $this->uri->segment(3);

		$this->ga_model->DeleteAsuransiId($id_ga_asuransi);

		$this->session->set_flashdata('message', 'Asuransi Berhasil Dihapus');
		redirect('ga/asuransi');
	}

	public function asuransi_detail()
	{


		$id_ga_asuransi =  $this->uri->segment(3);

		$data['data_asuransi'] =  $this->ga_model->DetailAsuransiId($id_ga_asuransi);

		$this->template_dua->load('template_dua', 'ga/sistem/asuransi/show', $data);
	}

	public function asuransi_batas()
	{


		$bulan =  date('m', strtotime("+2 month"));
		$bulan1 =  date('m', strtotime("+1 month"));
		$bulan2 =  date('m');
		$tahun = date('Y');

		$data['data_asuransi'] =  $this->ga_model->GetAsuransiExpired($bulan2, $bulan1, $bulan, $tahun);
		// echo $this->db->last_query();
		// die();
		$data['data_asuransi_total']  =  $this->ga_model->GetAsuransiExpiredTotal($bulan2, $bulan1, $bulan, $tahun);

		$this->template_dua->load('template_dua', 'ga/sistem/asuransi/exspired', $data);
	}

	public function asuransi_batas_edit()
	{


		$id_ga_asuransi = $this->uri->segment(3);

		$query =  $this->ga_model->EditAsuransiId($id_ga_asuransi);

		foreach ($query->result_array() as $value) {
			$data['id_ga_asuransi']  		= $value['id_ga_asuransi'];
			$data['no_polis']  		= $value['no_polis'];
			$data['tgl_join']  				= $value['tgl_join'];
			$data['tgl_berakhir']  			= $value['tgl_berakhir'];
			$data['ga_master_asuransi_id']  = $value['ga_master_asuransi_id'];
			$data['ga_stnk_id']  			= $value['ga_stnk_id'];
			$data['nominal']  				= $value['nominal'];
		}

		$data['data_master_asuransi'] 	=  $this->ga_model->GetMasterAsuransi();
		$data['data_stnk'] 				=  $this->ga_model->GetStnk();
		$this->template_dua->load('template_dua', 'ga/sistem/asuransi/exspired_edit', $data);
	}

	public function asuransi_batas_update()
	{


		$id['id_ga_asuransi'] =  $this->input->post('id_ga_asuransi');


		$in_data['tgl_berakhir'] 			= $this->input->post('tgl_berakhir');


		$this->db->update("tbl_ga_asuransi", $in_data, $id);

		$this->session->set_flashdata('update', 'Asuransi Berhasil Diperpanjang');
		redirect("ga/asuransi_batas");
	}

	public function asuransi_batas_excel()
	{


		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=cetak_asuransi_expired.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$bulan =  date('m', strtotime("+2 month"));
		$bulan1 =  date('m', strtotime("+1 month"));
		$bulan2 =  date('m');
		$tahun = date('Y');

		$data['data_asuransi'] =  $this->ga_model->GetAsuransiExpired($bulan2, $bulan1, $bulan, $tahun);

		$data['data_asuransi_total']  =  $this->ga_model->GetAsuransiExpiredTotal($bulan2, $bulan1, $bulan, $tahun);



		$this->load->view('ga/sistem/asuransi/cetak_asuransi', $data);
	}

	//Akhir asuransi

	public function ganti_plat()
	{


		$bulan =  date('m', strtotime("+2 month"));
		$bulan1 =  date('m', strtotime("+1 month"));
		$bulan2 =  date('m');
		$tahun = date('Y');

		$data['data_stnk'] = $this->ga_model->GetStnkGantiPlat($bulan2, $bulan1, $tahun, $bulan);
		$data['data_stnk_total'] = $this->ga_model->GetStnkGantiPlatTotal($bulan2, $bulan1, $tahun, $bulan);
		$this->template_dua->load('template_dua', 'ga/sistem/stnk/ganti_plat', $data);
	}

	public function ganti_plat_excel()
	{



		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=cetak_ganti_plat.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$bulan =  date('m', strtotime("+2 month"));
		$bulan1 =  date('m', strtotime("+1 month"));
		$bulan2 =  date('m');
		$tahun = date('Y');

		$data['data_stnk'] = $this->ga_model->GetStnkGantiPlat($bulan2, $bulan1, $tahun, $bulan);
		$data['data_stnk_total'] = $this->ga_model->GetStnkGantiPlatTotal($bulan2, $bulan1, $tahun, $bulan);

		$this->load->view('ga/sistem/stnk/cetak_ganti_plat', $data);
	}

	public function ganti_plat_edit()
	{
		$id_ga_stnk = $this->uri->segment(3);

		$query  = $this->ga_model->EditStnkId($id_ga_stnk);

		foreach ($query->result_array() as $value) {
			$data['id_ga_stnk']				= $value['id_ga_stnk'];
			$data['nomor_registrasi']		= $value['nomor_registrasi'];
			$data['nama_pemilik']			= $value['nama_pemilik'];
			$data['alamat']					= $value['alamat'];
			$data['merk'] 					= $value['merk'];
			$data['type'] 					= $value['type'];
			$data['jenis'] 					= $value['jenis'];
			$data['model'] 					= $value['model'];
			$data['tahun_pembuatan'] 		= $value['tahun_pembuatan'];
			$data['isi_silinder'] 			= $value['isi_silinder'];
			$data['nomor_rangka'] 			= $value['nomor_rangka'];
			$data['nomor_mesin'] 			= $value['nomor_mesin'];
			$data['warna'] 					= $value['warna'];
			$data['bahan_bakar'] 			= $value['bahan_bakar'];
			$data['warna_tnkb'] 			= $value['warna_tnkb'];
			$data['tahun_registrasi'] 		= $value['tahun_registrasi'];
			$data['nomor_bpkb'] 			= $value['nomor_bpkb'];
			$data['kode_lokasi'] 			= $value['kode_lokasi'];
			$data['no_urut_pendaftaran'] 	= $value['no_urut_pendaftaran'];
			$data['berlaku_sampai'] 		= $value['berlaku_sampai'];
			$data['nama_ga_master_type'] 	= $value['nama_ga_master_type'];
			$data['nama_ga_master_jenis'] 	= $value['nama_ga_master_jenis'];
		}

		$this->template_dua->load('template_dua', 'ga/sistem/stnk/ganti_plat_edit', $data);
	}

	public function ganti_plat_update()
	{
		$id['id_ga_stnk'] = $this->input->post("id_ga_stnk");


		$in_data['berlaku_sampai'] 			= $this->input->post('berlaku_sampai');


		$this->db->update("tbl_ga_stnk", $in_data, $id);

		$this->session->set_flashdata('update', 'STNK Berhasil Diupdate');
		redirect("ga/ganti_plat");
	}

	public function perpanjang_pajak()
	{


		$bulan =  date('m', strtotime("+2 month"));
		$bulan1 =  date('m', strtotime("+1 month"));
		$bulan2 =  date('m');


		$data['data_stnk'] 					= $this->ga_model->GetStnkPerpanjangPajak($bulan2, $bulan1, $bulan);
		$data['data_total_nominal_pajak'] 	= $this->ga_model->GetStnkPerpanjangPajakTotalNominal($bulan2, $bulan1, $bulan);
		$this->template_dua->load('template_dua', 'ga/sistem/stnk/perpanjang_pajak', $data);
	}

	public function perpanjang_pajak_edit()
	{


		$in_data['tanggal_perpanjangan_pajak'] 	= date('Y-m-d');
		$in_data['bulan_pajak'] 				= date('Y-m-d', strtotime("+2 month"));
		$in_data['ga_stnk_id'] 					= $this->uri->segment(3);
		$in_data['master_login_id'] 			= $this->session->userdata("id_master_login");

		$id['id_ga_stnk'] 					= $this->uri->segment(3);
		$update['status_perpanjang_pajak'] 	= "0";

		$this->db->insert("tbl_ga_stnk_perpanjangan_pajak", $in_data);
		$this->db->update("tbl_ga_stnk", $update, $id);

		$this->session->set_flashdata('message', 'Pajak STNK Berhasil Diperpanjang');
		redirect('ga/perpanjang_pajak');
	}

	public function master_type()
	{



		$data['data_master_type'] = $this->ga_model->GetMasterType();
		$this->template_dua->load('template_dua', 'ga/sistem/master_type/index', $data);
	}

	public function master_type_tambah()
	{



		$this->template_dua->load('template_dua', 'ga/sistem/master_type/add');
	}

	public function master_type_simpan()
	{


		$this->form_validation->set_rules('nama_ga_master_type', 'Type', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->template_dua->load('template_dua', 'ga/sistem/master_type/add');
		} else {

			$in_data['nama_ga_master_type'] 	= $this->input->post('nama_ga_master_type');

			$this->db->insert("tbl_ga_master_type", $in_data);

			$this->session->set_flashdata('berhasil', 'Master Type Berhasil Disimpan');
			redirect("ga/master_type");
		}
	}

	public function master_type_edit()
	{
		$id_ga_master_type = $this->uri->segment(3);

		$query  = $this->ga_model->EditMasterTypeID($id_ga_master_type);

		foreach ($query->result_array() as $value) {
			$data['id_ga_master_type']  	= $value['id_ga_master_type'];
			$data['nama_ga_master_type']  	= $value['nama_ga_master_type'];
		}

		$this->template_dua->load('template_dua', 'ga/sistem/master_type/edit', $data);
	}

	public function master_type_update()
	{



		$id['id_ga_master_type'] =  $this->input->post('id_ga_master_type');

		$in_data['nama_ga_master_type'] 	= $this->input->post('nama_ga_master_type');


		$this->db->update("tbl_ga_master_type", $in_data, $id);

		$this->session->set_flashdata('update', 'Master Type Berhasil Diupdate');
		redirect("ga/master_type");
	}

	public function master_type_delete()
	{


		$id_ga_master_type = $this->uri->segment(3);

		$this->ga_model->DeleteMasterTypeId($id_ga_master_type);

		$this->session->set_flashdata('message', 'Master Type Berhasil Dihapus');
		redirect('ga/master_type');
	}

	//Awal Jenis

	public function master_jenis()
	{



		$data['data_master_jenis'] = $this->ga_model->GetMasterJenis();
		$this->template_dua->load('template_dua', 'ga/sistem/master_jenis/index', $data);
	}

	public function master_jenis_tambah()
	{



		$this->template_dua->load('template_dua', 'ga/sistem/master_jenis/add');
	}

	public function master_jenis_simpan()
	{


		$this->form_validation->set_rules('nama_ga_master_jenis', 'Jenis', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->template_dua->load('template_dua', 'ga/sistem/master_jenis/add');
		} else {

			$in_data['nama_ga_master_jenis'] 	= $this->input->post('nama_ga_master_jenis');

			$this->db->insert("tbl_ga_master_jenis", $in_data);

			$this->session->set_flashdata('berhasil', 'Master Jenis Berhasil Disimpan');
			redirect("ga/master_jenis");
		}
	}

	public function master_jenis_edit()
	{
		$id_ga_master_jenis = $this->uri->segment(3);

		$query  = $this->ga_model->EditMasterJenisID($id_ga_master_jenis);

		foreach ($query->result_array() as $value) {
			$data['id_ga_master_jenis']  	= $value['id_ga_master_jenis'];
			$data['nama_ga_master_jenis']  	= $value['nama_ga_master_jenis'];
		}

		$this->template_dua->load('template_dua', 'ga/sistem/master_jenis/edit', $data);
	}

	public function master_jenis_update()
	{



		$id['id_ga_master_jenis'] =  $this->input->post('id_ga_master_jenis');

		$in_data['nama_ga_master_jenis'] 	= $this->input->post('nama_ga_master_jenis');


		$this->db->update("tbl_ga_master_jenis", $in_data, $id);

		$this->session->set_flashdata('update', 'Master Jenis Berhasil Diupdate');
		redirect("ga/master_jenis");
	}

	public function master_jenis_delete()
	{


		$id_ga_master_jenis = $this->uri->segment(3);

		$this->ga_model->DeleteMasterJenisId($id_ga_master_jenis);

		$this->session->set_flashdata('message', 'Master Jenis Berhasil Dihapus');
		redirect('ga/master_jenis');
	}

	//Akhir Jenis



	public function master_jenis_asuransi()
	{



		$data['data_master_jenis_asuransi'] = $this->ga_model->GetMasterJenisAsuransi();
		$this->template_dua->load('template_dua', 'ga/sistem/master_jenis_asuransi/index', $data);
	}

	public function master_jenis_asuransi_tambah()
	{



		$this->template_dua->load('template_dua', 'ga/sistem/master_jenis_asuransi/add');
	}

	public function master_jenis_asuransi_simpan()
	{


		$this->form_validation->set_rules('nama_ga_master_jenis_asuransi', 'Jenis', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->template_dua->load('template_dua', 'ga/sistem/master_jenis_asuransi/add');
		} else {

			$in_data['nama_ga_master_jenis_asuransi'] 	= $this->input->post('nama_ga_master_jenis_asuransi');

			$this->db->insert("tbl_ga_master_jenis_asuransi", $in_data);

			$this->session->set_flashdata('berhasil', 'Master Jenis Asuransi Berhasil Disimpan');
			redirect("ga/master_jenis_asuransi");
		}
	}

	public function master_jenis_asuransi_edit()
	{
		$id_ga_master_jenis_asuransi = $this->uri->segment(3);

		$query  = $this->ga_model->EditMasterJenisAsuransiID($id_ga_master_jenis_asuransi);

		foreach ($query->result_array() as $value) {
			$data['id_ga_master_jenis_asuransi']  	= $value['id_ga_master_jenis_asuransi'];
			$data['nama_ga_master_jenis_asuransi']  = $value['nama_ga_master_jenis_asuransi'];
		}

		$this->template_dua->load('template_dua', 'ga/sistem/master_jenis_asuransi/edit', $data);
	}

	public function master_jenis_asuransi_update()
	{



		$id['id_ga_master_jenis_asuransi'] =  $this->input->post('id_ga_master_jenis_asuransi');

		$in_data['nama_ga_master_jenis_asuransi'] 	= $this->input->post('nama_ga_master_jenis_asuransi');


		$this->db->update("tbl_ga_master_jenis_asuransi", $in_data, $id);

		$this->session->set_flashdata('update', 'Master Jenis Asuransi Berhasil Diupdate');
		redirect("ga/master_jenis_asuransi");
	}

	public function master_jenis_asuransi_delete()
	{


		$id_ga_master_jenis_asuransi = $this->uri->segment(3);

		$this->ga_model->DeleteMasterJenisId($id_ga_master_jenis_asuransi);

		$this->session->set_flashdata('message', 'Master Jenis Asuransi Berhasil Dihapus');
		redirect('ga/master_jenis_asuransi');
	}

	public function master_lising()
	{



		$data['data_master_lising'] = $this->ga_model->GetMasterLising();
		$this->template_dua->load('template_dua', 'ga/sistem/master_lising/index', $data);
	}

	public function master_lising_tambah()
	{



		$this->template_dua->load('template_dua', 'ga/sistem/master_lising/add');
	}

	public function master_lising_simpan()
	{


		$this->form_validation->set_rules('nama_ga_master_lising', 'Lising', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->template_dua->load('template_dua', 'ga/sistem/master_lising/add');
		} else {

			$in_data['nama_ga_master_lising'] 	= $this->input->post('nama_ga_master_lising');
			$in_data['alamat'] 					= $this->input->post('alamat');
			$in_data['telp'] 					= $this->input->post('telp');

			$this->db->insert("tbl_ga_master_lising", $in_data);

			$this->session->set_flashdata('berhasil', 'Master Lising Berhasil Disimpan');
			redirect("ga/master_lising");
		}
	}

	public function master_lising_edit()
	{
		$id_ga_master_lising = $this->uri->segment(3);

		$query  = $this->ga_model->EditMasterLisingID($id_ga_master_lising);

		foreach ($query->result_array() as $value) {
			$data['id_ga_master_lising']  	= $value['id_ga_master_lising'];
			$data['nama_ga_master_lising']  	= $value['nama_ga_master_lising'];
			$data['alamat']  					= $value['alamat'];
			$data['telp']  						= $value['telp'];
		}

		$this->template_dua->load('template_dua', 'ga/sistem/master_lising/edit', $data);
	}

	public function master_lising_update()
	{



		$id['id_ga_master_lising'] =  $this->input->post('id_ga_master_lising');

		$in_data['nama_ga_master_lising'] 	= $this->input->post('nama_ga_master_lising');
		$in_data['alamat'] 					= $this->input->post('alamat');
		$in_data['telp'] 					= $this->input->post('telp');


		$this->db->update("tbl_ga_master_lising", $in_data, $id);

		$this->session->set_flashdata('update', 'Master Lising Berhasil Diupdate');
		redirect("ga/master_lising");
	}

	public function master_lising_delete()
	{


		$id_ga_master_lising = $this->uri->segment(3);

		$this->ga_model->DeleteMasterLisingId($id_ga_master_lising);

		$this->session->set_flashdata('message', 'Master Lising Berhasil Dihapus');
		redirect('ga/master_lising');
	}

	//Awal Ga GPS

	public function gps()
	{


		$data['data_gps'] =  $this->ga_model->GetGps();
		$this->template_dua->load('template_dua', 'ga/sistem/gps/index', $data);
	}

	public function gps_tambah()
	{


		// $data['data_master_asuransi'] 	=  $this->ga_model->GetMasterAsuransi();
		$data['data_stnk'] 				=  $this->ga_model->GetStnk();
		$this->template_dua->load('template_dua', 'ga/sistem/gps/add', $data);
	}

	public function gps_simpan()
	{


		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');
		$this->form_validation->set_rules('ga_stnk_id', 'STNK', 'required');
		$this->form_validation->set_rules('tgl_join', 'Tanggal Join', 'required');
		$this->form_validation->set_rules('tgl_berakhir', 'Tanggal Berakhir', 'required');
		$this->form_validation->set_rules('nominal', 'Nominal Pulsa GPS', 'required');


		if ($this->form_validation->run() == FALSE) {

			$data['data_stnk'] 				=  $this->ga_model->GetStnk();
			$this->template_dua->load('template_dua', 'ga/sistem/gps/add', $data);
		} else {

			$in_data['no_telp'] 				= $this->input->post('no_telp');
			$in_data['tgl_join'] 				= $this->input->post('tgl_join');
			$in_data['tgl_berakhir'] 			= $this->input->post('tgl_berakhir');
			$in_data['ga_stnk_id'] 				= $this->input->post('ga_stnk_id');
			$in_data['master_login_id'] 		= $this->session->userdata("id_master_login");
			$in_data['status'] 					= "0";
			$in_data['nominal'] 				= $this->input->post('nominal');

			$this->db->insert("tbl_ga_gps", $in_data);

			$this->session->set_flashdata('berhasil', 'GPS Berhasil Disimpan');
			redirect("ga/gps");
		}
	}

	public function gps_edit()
	{


		$id_ga_gps = $this->uri->segment(3);

		$query =  $this->ga_model->EditGpsId($id_ga_gps);

		foreach ($query->result_array() as $value) {
			$data['id_ga_gps']  			= $value['id_ga_gps'];
			$data['no_telp']  				= $value['no_telp'];
			$data['tgl_join']  				= $value['tgl_join'];
			$data['tgl_berakhir']  			= $value['tgl_berakhir'];
			$data['ga_stnk_id']  			= $value['ga_stnk_id'];
			$data['nominal']  				= $value['nominal'];
		}

		$data['data_stnk'] 				=  $this->ga_model->GetStnk();
		$this->template_dua->load('template_dua', 'ga/sistem/gps/edit', $data);
	}

	public function gps_update()
	{


		$id['id_ga_gps'] =  $this->input->post('id_ga_gps');

		$in_data['no_telp'] 				= $this->input->post('no_telp');
		$in_data['tgl_join'] 				= $this->input->post('tgl_join');
		$in_data['tgl_berakhir'] 			= $this->input->post('tgl_berakhir');
		$in_data['ga_stnk_id'] 				= $this->input->post('ga_stnk_id');
		$in_data['nominal'] 				= $this->input->post('nominal');

		$this->db->update("tbl_ga_gps", $in_data, $id);

		$this->session->set_flashdata('update', 'Gps Berhasil Diupdate');
		redirect("ga/gps");
	}

	public function gps_delete()
	{


		$id_ga_gps =  $this->uri->segment(3);

		$this->ga_model->DeleteGpsId($id_ga_gps);

		$this->session->set_flashdata('message', 'Gps Berhasil Dihapus');
		redirect('ga/gps');
	}

	public function gps_detail()
	{


		$id_ga_gps =  $this->uri->segment(3);

		$data['data_gps'] =  $this->ga_model->DetailGpsId($id_ga_gps);

		$this->template_dua->load('template_dua', 'ga/sistem/gps/show', $data);
	}

	public function gps_batas()
	{


		$bulan =  date('m', strtotime("+2 month"));
		$bulan1 =  date('m', strtotime("+1 month"));
		$tahun = date('Y');

		$data['data_gps'] =  $this->ga_model->GetGpsExpired($bulan1, $bulan, $tahun);
		$data['data_gps_total'] =  $this->ga_model->GetGpsExpiredTotal($bulan1, $bulan, $tahun);

		$this->template_dua->load('template_dua', 'ga/sistem/gps/exspired', $data);
	}

	public function gps_batas_edit()
	{


		$id_ga_gps = $this->uri->segment(3);

		$query =  $this->ga_model->EditGpsId($id_ga_gps);

		foreach ($query->result_array() as $value) {
			$data['id_ga_gps']  			= $value['id_ga_gps'];
			$data['no_telp']  				= $value['no_telp'];
			$data['tgl_join']  				= $value['tgl_join'];
			$data['tgl_berakhir']  			= $value['tgl_berakhir'];
			$data['ga_stnk_id']  			= $value['ga_stnk_id'];
			$data['nominal']  			= $value['nominal'];
		}

		$data['data_stnk'] 				=  $this->ga_model->GetStnk();
		$this->template_dua->load('template_dua', 'ga/sistem/gps/exspired_edit', $data);
	}

	public function gps_batas_update()
	{


		$id['id_ga_gps'] =  $this->input->post('id_ga_gps');


		$in_data['tgl_berakhir'] 			= $this->input->post('tgl_berakhir');


		$this->db->update("tbl_ga_gps", $in_data, $id);

		$this->session->set_flashdata('update', 'GPS Berhasil Diperpanjang');
		redirect("ga/gps_batas");
	}

	public function gps_batas_excel()
	{



		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=cetak_perpanjangan_gps.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$bulan =  date('m', strtotime("+2 month"));
		$bulan1 =  date('m', strtotime("+1 month"));
		$bulan2 =  date('m');
		$tahun = date('Y');

		$data['data_gps'] =  $this->ga_model->GetGpsExpired($bulan2, $bulan1, $bulan, $tahun);
		$data['data_gps_total'] =  $this->ga_model->GetGpsExpiredTotal($bulan2, $bulan1, $bulan, $tahun);

		$this->load->view('ga/sistem/gps/cetak_perpanjangan_gps', $data);
	}

	//Akhir Ga GPS


	//Awal Ga KIR

	public function kir()
	{


		$data['data_kir'] =  $this->ga_model->GetKir();
		$this->template_dua->load('template_dua', 'ga/sistem/kir/index', $data);
	}

	public function kir_tambah()
	{


		// $data['data_master_asuransi'] 	=  $this->ga_model->GetMasterAsuransi();
		$data['data_stnk'] 				=  $this->ga_model->GetStnk();
		$this->template_dua->load('template_dua', 'ga/sistem/kir/add', $data);
	}

	public function kir_simpan()
	{


		$this->form_validation->set_rules('no_kir', 'Nomor Kir', 'required');
		$this->form_validation->set_rules('ga_stnk_id', 'STNK', 'required');
		$this->form_validation->set_rules('tgl_join', 'Tanggal Join', 'required');
		$this->form_validation->set_rules('tgl_berakhir', 'Tanggal Berakhir', 'required');
		$this->form_validation->set_rules('nominal', 'Nominal KIR', 'required');


		if ($this->form_validation->run() == FALSE) {

			$data['data_stnk'] 				=  $this->ga_model->GetStnk();
			$this->template_dua->load('template_dua', 'ga/sistem/kir/add', $data);
		} else {

			$in_data['no_kir'] 					= $this->input->post('no_kir');
			$in_data['tgl_join'] 				= $this->input->post('tgl_join');
			$in_data['tgl_berakhir'] 			= $this->input->post('tgl_berakhir');
			$in_data['ga_stnk_id'] 				= $this->input->post('ga_stnk_id');
			$in_data['master_login_id'] 		= $this->session->userdata("id_master_login");
			$in_data['nominal'] 				= $this->input->post('nominal');
			$in_data['status'] 					= "0";

			$this->db->insert("tbl_ga_kir", $in_data);

			$this->session->set_flashdata('berhasil', 'KIR Berhasil Disimpan');
			redirect("ga/kir");
		}
	}

	public function kir_edit()
	{


		$id_ga_kir = $this->uri->segment(3);

		$query =  $this->ga_model->EditKirId($id_ga_kir);

		foreach ($query->result_array() as $value) {
			$data['id_ga_kir']  			= $value['id_ga_kir'];
			$data['no_kir']  				= $value['no_kir'];
			$data['tgl_join']  				= $value['tgl_join'];
			$data['tgl_berakhir']  			= $value['tgl_berakhir'];
			$data['ga_stnk_id']  			= $value['ga_stnk_id'];
			$data['nominal']  				= $value['nominal'];
		}

		$data['data_stnk'] 				=  $this->ga_model->GetStnk();
		$this->template_dua->load('template_dua', 'ga/sistem/kir/edit', $data);
	}

	public function kir_update()
	{


		$id['id_ga_kir'] =  $this->input->post('id_ga_kir');

		$in_data['no_kir'] 				= $this->input->post('no_kir');
		$in_data['tgl_join'] 				= $this->input->post('tgl_join');
		$in_data['tgl_berakhir'] 			= $this->input->post('tgl_berakhir');
		$in_data['ga_stnk_id'] 				= $this->input->post('ga_stnk_id');
		$in_data['nominal'] 				= $this->input->post('nominal');

		$this->db->update("tbl_ga_kir", $in_data, $id);

		$this->session->set_flashdata('update', 'Kir Berhasil Diupdate');
		redirect("ga/kir");
	}

	public function kir_delete()
	{


		$id_ga_kir =  $this->uri->segment(3);

		$this->ga_model->DeleteKirId($id_ga_kir);

		$this->session->set_flashdata('message', 'Kir Berhasil Dihapus');
		redirect('ga/kir');
	}

	public function kir_detail()
	{


		$id_ga_kir =  $this->uri->segment(3);

		$data['data_kir'] =  $this->ga_model->DetailKirId($id_ga_kir);

		$this->template_dua->load('template_dua', 'ga/sistem/kir/show', $data);
	}

	public function kir_batas()
	{


		$bulan =  date('m', strtotime("+2 month"));
		$bulan1 =  date('m', strtotime("+1 month"));
		$bulan2 =  date('m');
		$tahun = date('Y');

		$data['data_kir'] =  $this->ga_model->GetKirExpired($bulan2, $bulan1, $bulan, $tahun);
		$data['data_kir_total'] =  $this->ga_model->GetKirExpiredTotal($bulan2, $bulan1, $bulan, $tahun);

		$this->template_dua->load('template_dua', 'ga/sistem/kir/exspired', $data);
	}

	public function kir_batas_edit()
	{


		$id_ga_kir = $this->uri->segment(3);

		$query =  $this->ga_model->EditKirId($id_ga_kir);

		foreach ($query->result_array() as $value) {
			$data['id_ga_kir']  			= $value['id_ga_kir'];
			$data['no_kir']  				= $value['no_kir'];
			$data['tgl_join']  				= $value['tgl_join'];
			$data['tgl_berakhir']  			= $value['tgl_berakhir'];
			$data['ga_stnk_id']  			= $value['ga_stnk_id'];
			$data['nominal']  				= $value['nominal'];
		}

		$data['data_stnk'] 				=  $this->ga_model->GetStnk();
		$this->template_dua->load('template_dua', 'ga/sistem/kir/exspired_edit', $data);
	}

	public function kir_batas_update()
	{


		$id['id_ga_kir'] =  $this->input->post('id_ga_kir');


		$in_data['tgl_berakhir'] 			= $this->input->post('tgl_berakhir');


		$this->db->update("tbl_ga_kir", $in_data, $id);

		$this->session->set_flashdata('update', 'KIR Berhasil Diperpanjang');
		redirect("ga/kir_batas");
	}

	public function kir_batas_excel()
	{



		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=cetak_perpanjangan_kir.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$bulan =  date('m', strtotime("+2 month"));
		$bulan1 =  date('m', strtotime("+1 month"));
		$bulan2 =  date('m');
		$tahun = date('Y');

		$data['data_kir'] =  $this->ga_model->GetKirExpired($bulan2, $bulan1, $bulan, $tahun);
		$data['data_kir_total'] =  $this->ga_model->GetKirExpiredTotal($bulan2, $bulan1, $bulan, $tahun);

		$this->load->view('ga/sistem/kir/cetak_perpanjangan_kir', $data);
	}

	//Akhir Ga KIR

	//Awal Backup Database

	public function database()
	{


		$this->load->helper('download');
		$tanggal = date('Ymd-His');
		$namaFile = $tanggal . '.sql.zip';
		$this->load->dbutil();
		$backup = &$this->dbutil->backup();
		force_download($namaFile, $backup);
	}
	//Akhir Backup Database

	//Awal GA Perolehan

	public function perolehan()
	{


		$data['data_perolehan'] =  $this->ga_model->GetPerolehan();
		$this->template_dua->load('template_dua', 'ga/sistem/perolehan/index', $data);
	}

	public function perolehan_tambah()
	{


		// $data['data_master_asuransi'] 	=  $this->ga_model->GetMasterAsuransi();
		$data['data_stnk'] 					=  $this->ga_model->GetStnk();
		$data['data_klasifikasi_kendaraan'] =  $this->ga_model->GetKlasifikasiKendaraan();
		$this->template_dua->load('template_dua', 'ga/sistem/perolehan/add', $data);
	}

	public function perolehan_simpan()
	{



		$this->form_validation->set_rules('ga_stnk_id', 'STNK', 'required');
		$this->form_validation->set_rules('ga_master_klasifikasi_kendaraan_id', 'Klasifikasi Kendaraan', 'required');
		$this->form_validation->set_rules('tgl_perolehan', 'Tanggal Perolehan', 'required');
		$this->form_validation->set_rules('nilai_perolehan', 'Nilai Perolehan', 'required');



		if ($this->form_validation->run() == FALSE) {

			$data['data_stnk'] 				=  $this->ga_model->GetStnk();
			$this->template_dua->load('template_dua', 'ga/sistem/perolehan/add', $data);
		} else {


			$in_data['tgl_perolehan'] 						= $this->input->post('tgl_perolehan') . '-00';
			$in_data['nilai_perolehan'] 					= $this->input->post('nilai_perolehan');
			$in_data['ga_stnk_id'] 							= $this->input->post('ga_stnk_id');
			$in_data['ga_master_klasifikasi_kendaraan_id'] 	= $this->input->post('ga_master_klasifikasi_kendaraan_id');


			$this->db->insert("tbl_ga_stnk_perolehan", $in_data);

			// echo $this->db->last_query();
			// die;

			$this->session->set_flashdata('berhasil', 'Perolehan STNK Berhasil Disimpan');
			redirect("ga/perolehan");
		}
	}

	public function perolehan_edit()
	{


		$id_ga_stnk_perolehan = $this->uri->segment(3);

		$query =  $this->ga_model->EditPerolehanId($id_ga_stnk_perolehan);

		foreach ($query->result_array() as $value) {
			$data['id_ga_stnk_perolehan']  				= $value['id_ga_stnk_perolehan'];
			$data['tgl_perolehan']  					= $value['tgl_perolehan'];
			$data['nilai_perolehan']  					= $value['nilai_perolehan'];
			$data['ga_stnk_id']  						= $value['ga_stnk_id'];
			$data['ga_master_klasifikasi_kendaraan_id'] = $value['ga_master_klasifikasi_kendaraan_id'];
		}

		$data['data_stnk'] 					=  $this->ga_model->GetStnk();
		$data['data_klasifikasi_kendaraan'] =  $this->ga_model->GetKlasifikasiKendaraan();
		$this->template_dua->load('template_dua', 'ga/sistem/perolehan/edit', $data);
	}

	public function perolehan_update()
	{


		$id['id_ga_stnk_perolehan'] =  $this->input->post('id_ga_stnk_perolehan');

		$in_data['tgl_perolehan'] 						= $this->input->post('tgl_perolehan');
		$in_data['tgl_perolehan'] 						= $this->input->post('tgl_perolehan');
		$in_data['nilai_perolehan'] 					= $this->input->post('nilai_perolehan');
		$in_data['ga_stnk_id'] 							= $this->input->post('ga_stnk_id');
		$in_data['ga_master_klasifikasi_kendaraan_id'] 	= $this->input->post('ga_master_klasifikasi_kendaraan_id');


		$this->db->update("tbl_ga_stnk_perolehan", $in_data, $id);

		$this->session->set_flashdata('update', 'Perolehan STNK Berhasil Diupdate');
		redirect("ga/perolehan");
	}

	public function perolehan_delete()
	{


		$id_ga_stnk_perolehan =  $this->uri->segment(3);

		$this->ga_model->DeletePerolehanId($id_ga_stnk_perolehan);

		$this->session->set_flashdata('message', 'Perolehan STNK Berhasil Dihapus');
		redirect('ga/perolehan');
	}

	public function perolehan_detail()
	{


		$id_ga_stnk_perolehan =  $this->uri->segment(3);

		$data['data_perolehan'] =  $this->ga_model->DetailPerolehanId($id_ga_stnk_perolehan);

		$this->template_dua->load('template_dua', 'ga/sistem/perolehan/show', $data);
	}

	public function perolehan_cetak_excel()
	{



		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=cetak_perolehan_stnk.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$data['data_perolehan'] =  $this->ga_model->GetPerolehan();
		$this->load->view('ga/sistem/perolehan/excel', $data);
	}

	//Awal Klasifikasi Kendaraan

	public function klasifikasi_kendaraan()
	{



		$data['data_klasifikasi_kendaraan'] = $this->ga_model->GetKlasifikasiKendaraan();
		$this->template_dua->load('template_dua', 'ga/sistem/klasifikasi_kendaraan/index', $data);
	}

	public function klasifikasi_kendaraan_tambah()
	{



		$this->template_dua->load('template_dua', 'ga/sistem/klasifikasi_kendaraan/add');
	}

	public function klasifikasi_kendaraan_simpan()
	{


		$this->form_validation->set_rules('nama_ga_master_klasifikasi_kendaraan', 'Klasifikasi Kendaraan', 'required');
		$this->form_validation->set_rules('nilai', 'Nilai', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->template_dua->load('template_dua', 'ga/sistem/klasifikasi_kendaraan/add');
		} else {

			$in_data['nama_ga_master_klasifikasi_kendaraan'] 	= $this->input->post('nama_ga_master_klasifikasi_kendaraan');
			$in_data['nilai'] 									= $this->input->post('nilai');

			$this->db->insert("tbl_ga_master_klasifikasi_kendaraan", $in_data);

			$this->session->set_flashdata('berhasil', 'KlasifikasiKendaraan Berhasil Disimpan');
			redirect("ga/klasifikasi_kendaraan");
		}
	}

	public function klasifikasi_kendaraan_edit()
	{
		$id_ga_master_klasifikasi_kendaraan = $this->uri->segment(3);

		$query  = $this->ga_model->EditKlasifikasiKendaraanID($id_ga_master_klasifikasi_kendaraan);

		foreach ($query->result_array() as $value) {
			$data['id_ga_master_klasifikasi_kendaraan']  	= $value['id_ga_master_klasifikasi_kendaraan'];
			$data['nama_ga_master_klasifikasi_kendaraan']  	= $value['nama_ga_master_klasifikasi_kendaraan'];
			$data['nilai']  								= $value['nilai'];
		}

		$this->template_dua->load('template_dua', 'ga/sistem/klasifikasi_kendaraan/edit', $data);
	}

	public function klasifikasi_kendaraan_update()
	{



		$id['id_ga_master_klasifikasi_kendaraan'] =  $this->input->post('id_ga_master_klasifikasi_kendaraan');

		$in_data['nama_ga_master_klasifikasi_kendaraan'] 	= $this->input->post('nama_ga_master_klasifikasi_kendaraan');
		$in_data['nilai'] 									= $this->input->post('nilai');


		$this->db->update("tbl_ga_master_klasifikasi_kendaraan", $in_data, $id);

		$this->session->set_flashdata('update', 'Klasifikasi Kendaraan Berhasil Diupdate');
		redirect("ga/klasifikasi_kendaraan");
	}

	public function klasifikasi_kendaraan_delete()
	{


		$id_ga_master_klasifikasi_kendaraan = $this->uri->segment(3);

		$this->ga_model->DeleteKlasifikasiKendaraanId($id_ga_master_klasifikasi_kendaraan);

		$this->session->set_flashdata('message', 'Klasifikasi Kendaraan Berhasil Dihapus');
		redirect('ga/klasifikasi_kendaraan');
	}

	public function perolehan_cek()
	{

		$data['data_perolehan'] =  $this->ga_model->GetPerolehan();
		$data['pilihan']	=  $this->input->post("pilihan");
		$this->load->view('ga/sistem/perolehan/pilih', $data);
	}

	//Akhir Klasifikasi Kendaraan





	//Awal Laporan

	public function laporan_tahun_pembuatan()
	{



		$data['data_tahun'] =  $this->ga_model->GetTahunPembuatan();
		// $data['data_lising'] =  $this->ga_model->GetMasterLising();
		$this->template_dua->load('template_dua', 'ga/sistem/laporan/laporan_tahun_pembuatan', $data);
	}

	public function laporan_tahun_pembuatan_cek()
	{



		$tahun = $this->input->post("tahun");
		$data['data_tahun'] =  $tahun;

		$data['data_stnk'] =  $this->ga_model->GetTahunPembuatanTahun($tahun);
		$this->load->view('ga/sistem/laporan/laporan_tahun_pembuatan_cek', $data);
	}

	public function laporan_tahun_pembuatan_excel()
	{



		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=laporan_tahun_pembuatan_stnk.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$tahun = $this->uri->segment(3);
		$data['data_tahun'] =  $tahun;
		$data['data_stnk'] =  $this->ga_model->GetTahunPembuatanTahun($tahun);
		$this->load->view('ga/sistem/laporan/laporan_tahun_pembuatan_cetak', $data);
	}

	public function laporan_tahun_pembuatan_status_cek()
	{


		$status = $this->input->post("status");
		$data['data_status'] =  $status;

		$data['data_stnk'] =  $this->ga_model->GetStatusStnk($status);
		$this->load->view('ga/sistem/laporan/laporan_status_kendaraan_cek', $data);
	}

	public function laporan_status_kendaraan_excel()
	{



		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=laporan_status_kendaraan_excel.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$status = $this->uri->segment(3);

		$data['data_status'] =  $status;

		$data['data_stnk'] =  $this->ga_model->GetStatusStnk($status);
		$this->load->view('ga/sistem/laporan/laporan_status_kendaraan_cetak', $data);
	}

	public function laporan_lising_stnk_cek()
	{



		$lising = $this->input->post("lising");
		$data['data_lising'] =  $this->ga_model->GetMasterLisingID($lising);

		$data['data_stnk'] =  $this->ga_model->GetStnkLising($lising);
		$this->load->view('ga/sistem/laporan/laporan_lising_stnk_cek', $data);
	}

	public function laporan_lising_stnk_excel()
	{


		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=laporan_leasing_stnk_excel.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$lising = $this->uri->segment(3);

		$data['data_lising'] =  $this->ga_model->GetMasterLisingID($lising);

		$data['data_stnk'] =  $this->ga_model->GetStnkLising($lising);
		$this->load->view('ga/sistem/laporan/laporan_lising_stnk_cetak', $data);
	}

	public function laporan_tahun_status_lising_cek()
	{


		$tahun 	=  $this->input->post("tahun");
		$status =  $this->input->post("status");
		$lising =  $this->input->post("lising");

		$data['data_tahun'] =  $tahun;
		$data['data_status'] =  $status;
		$data['data_lising'] =  $this->ga_model->GetMasterLisingID($lising);

		$data['data_stnk'] =  $this->ga_model->GetStnkTahunStatusLising($tahun, $status, $lising);
		$this->load->view('ga/sistem/laporan/laporan_tahun_status_lising_stnk_cek', $data);
	}

	public function laporan_tahun_status_lising_stnk_excel()
	{


		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=laporan_tahun_status_leasing_stnk_excel.xls");
		header("Pragma: no-cache");
		header("Expires: 0");



		$tahun 	=  $this->uri->segment(3);
		$status =  $this->uri->segment(4);
		$lising =  $this->uri->segment(5);

		$data['data_tahun'] =  $tahun;
		$data['data_status'] =  $status;
		$data['data_lising'] =  $this->ga_model->GetMasterLisingID($lising);

		$data['data_stnk'] =  $this->ga_model->GetStnkTahunStatusLising($tahun, $status, $lising);
		$this->load->view('ga/sistem/laporan/laporan_tahun_status_lising_stnk_cetak', $data);
	}

	public function laporan_tahun_status_cek()
	{


		$tahun 	=  $this->input->post("tahun");
		$status =  $this->input->post("status");


		$data['data_tahun'] =  $tahun;
		$data['data_status'] =  $status;


		$data['data_stnk'] =  $this->ga_model->GetStnkTahunStatus($tahun, $status);
		$this->load->view('ga/sistem/laporan/laporan_tahun_status_stnk_cek', $data);
	}

	public function laporan_tahun_status_stnk_excel()
	{


		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=laporan_tahun_status_stnk_excel.xls");
		header("Pragma: no-cache");
		header("Expires: 0");



		$tahun 	=  $this->uri->segment(3);
		$status =  $this->uri->segment(4);


		$data['data_tahun'] =  $tahun;
		$data['data_status'] =  $status;


		$data['data_stnk'] =  $this->ga_model->GetStnkTahunStatus($tahun, $status);
		$this->load->view('ga/sistem/laporan/laporan_tahun_status_stnk_cetak', $data);
	}

	public function laporan_tahun_lising_cek()
	{


		$tahun 	=  $this->input->post("tahun");
		$lising =  $this->input->post("lising");

		$data['data_tahun'] =  $tahun;
		$data['data_lising'] =  $this->ga_model->GetMasterLisingID($lising);

		$data['data_stnk'] =  $this->ga_model->GetStnkTahunLising($tahun, $lising);
		$this->load->view('ga/sistem/laporan/laporan_tahun_lising_stnk_cek', $data);
	}

	public function laporan_tahun_lising_stnk_excel()
	{


		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=laporan_tahun_leasing_stnk_excel.xls");
		header("Pragma: no-cache");
		header("Expires: 0");



		$tahun 	=  $this->uri->segment(3);
		$lising =  $this->uri->segment(4);

		$data['data_tahun'] =  $tahun;
		$data['data_lising'] =  $this->ga_model->GetMasterLisingID($lising);

		$data['data_stnk'] =  $this->ga_model->GetStnkTahunLising($tahun, $lising);
		$this->load->view('ga/sistem/laporan/laporan_tahun_lising_stnk_cetak', $data);
	}

	public function laporan_status_lising_cek()
	{




		$status =  $this->input->post("status");
		$lising =  $this->input->post("lising");


		$data['data_status'] =  $status;
		$data['data_lising'] =  $this->ga_model->GetMasterLisingID($lising);

		$data['data_stnk'] =  $this->ga_model->GetStnkStatusLising($status, $lising);
		$this->load->view('ga/sistem/laporan/laporan_status_lising_stnk_cek', $data);
	}

	public function laporan_status_lising_stnk_excel()
	{


		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=laporan_status_leasing_stnk_excel.xls");
		header("Pragma: no-cache");
		header("Expires: 0");




		$status =  $this->uri->segment(3);
		$lising =  $this->uri->segment(4);

		$data['data_status'] =  $status;
		$data['data_lising'] =  $this->ga_model->GetMasterLisingID($lising);

		$data['data_stnk'] =  $this->ga_model->GetStnkStatusLising($status, $lising);
		$this->load->view('ga/sistem/laporan/laporan_status_lising_stnk_cetak', $data);
	}
	//Akhir Laporannnn



	//Awal Laporan Kir Tahun
	public function laporan_tahun_kir()
	{




		$tahun = date('Y');

		$data['data_kir'] =  $this->ga_model->GetTahunKir($tahun);
		$this->template_dua->load('template_dua', 'ga/sistem/laporan/laporan_tahun_kir', $data);
	}

	public function laporan_tahun_kir_excel()
	{



		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=cetak_kir.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$tahun = date('Y');

		$data['data_kir'] =  $this->ga_model->GetTahunKir($tahun);

		$this->load->view('ga/sistem/laporan/laporan_tahun_kir_excel', $data);
	}
	//Akhir Laporan Kir Tahun

	//Awal Laporan Asuransi Tahun
	public function laporan_tahun_asuransi()
	{




		$tahun = date('Y');

		$data['data_asuransi'] =  $this->ga_model->GetTahunAsuransi($tahun);
		$this->template_dua->load('template_dua', 'ga/sistem/laporan/laporan_tahun_asuransi', $data);
	}

	public function laporan_tahun_asuransi_excel()
	{



		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=cetak_asuransi.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$tahun = date('Y');

		$data['data_asuransi'] =  $this->ga_model->GetTahunAsuransi($tahun);

		$this->load->view('ga/sistem/laporan/laporan_tahun_asuransi_excel', $data);
	}
	//Akhir Laporan Asuransi Tahun

	//Awal Laporan PAJAK STNK Tahun
	public function laporan_tahun_pajak_stnk()
	{




		$tahun = date('Y');

		$data['data_stnk'] 	= $this->ga_model->GetPajakStnkTahun($tahun);
		$data['total']		= $this->ga_model->GetPajakStnkTahunTotal($tahun);

		$this->template_dua->load('template_dua', 'ga/sistem/laporan/laporan_tahun_pajak_stnk', $data);
	}

	public function laporan_tahun_pajak_stnk_excel()
	{



		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=cetak_pajak_stnk.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		$tahun = date('Y');

		$data['data_stnk'] 	= $this->ga_model->GetPajakStnkTahun($tahun);

		$this->load->view('ga/sistem/laporan/laporan_tahun_pajak_stnk_excel', $data);
	}
	//Akhir Laporan PAJAK STNK Tahun

	// Master Pegawai
	public function master_pegawai()
	{

		$data['data_master_pegawai'] = $this->ga_model->GetMasterPegawai();
		$this->template_dua->load('template_dua', 'ga/sistem/master_pegawai/index', $data);
	}

	public function master_pegawai_tambah()
	{

		$this->template_dua->load('template_dua', 'ga/sistem/master_pegawai/add');
	}

	public function master_pegawai_simpan()
	{

		$this->form_validation->set_rules('nama', 'nip', 'jabatan', 'no_hp', 'alamat', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->template_dua->load('template_dua', 'ga/sistem/master_pegawai/add');
		} else {

			$in_data['nama'] 	= $this->input->post('nama');
			$in_data['nip'] 	= $this->input->post('nip');
			$in_data['jabatan'] 	= $this->input->post('jabatan');
			$in_data['no_hp'] 	= $this->input->post('no_hp');
			$in_data['alamat'] 	= $this->input->post('alamat');

			$this->db->insert("tbl_pegawai", $in_data);

			$this->session->set_flashdata('berhasil', 'Master Jenis Berhasil Disimpan');
			redirect("ga/master_pegawai");
		}
	}

	public function master_pegawai_edit()
	{
		$id_ga_master_pegawai = $this->uri->segment(3);

		$query  = $this->ga_model->EditMasterpegawaiID($id_ga_master_pegawai);

		foreach ($query->result_array() as $value) {
			$data['id_ga_master_pegawai']  	= $value['id_ga_master_pegawai'];
			$data['nama_ga_master_pegawai']  	= $value['nama_ga_master_pegawai'];
		}

		$this->template_dua->load('template_dua', 'ga/sistem/master_jenis/edit', $data);
	}

	public function master_pegawai_update()
	{



		$id['id_ga_master_pegawai'] =  $this->input->post('id_ga_master_pegawai');

		$in_data['nama_ga_master_pegawai'] 	= $this->input->post('nama_ga_master_pegawai');


		$this->db->update("tbl_ga_master_pegawai", $in_data, $id);

		$this->session->set_flashdata('update', 'Master Jenis Berhasil Diupdate');
		redirect("ga/master_pegawai");
	}

	public function master_pegawai_delete()
	{


		$id_ga_master_pegawai = $this->uri->segment(3);

		$this->ga_model->DeleteMasterPegawaiId($id_ga_master_pegawai);

		$this->session->set_flashdata('message', 'Master Jenis Berhasil Dihapus');
		redirect('ga/master_pegawai');
	}
}
