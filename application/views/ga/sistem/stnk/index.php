<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption"><i class="icon-edit"></i>STNK</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>

				</div>
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="btn-group">

						<a class="btn green" href="<?php echo base_url(); ?>ga/stnk_tambah">
							Add New <i class="icon-plus"></i>
						</a>
					</div>
					<div class="btn-group">

						<a class="btn green" href="<?php echo base_url(); ?>ga/stnk_cetak_excel">
							Cetak Excel <i class="icon-print"></i>
						</a>
					</div>
					<?php

					if ($this->session->flashdata('message')) {
						echo "<div class='alert alert-block alert-error show'>
															  <button type='button' class='close' data-dismiss='alert'></button>
																 <span>STNK Berhasil Dihapus</span>
																</div>";
					} else if ($this->session->flashdata('berhasil')) {
						echo "<div class='alert alert-block alert-success show'>
															  <button type='button' class='close' data-dismiss='alert'></button>
																 <span>STNK Berhasil Disimpan</span>
																</div>";
					} else if ($this->session->flashdata('update')) {
						echo "<div class='alert alert-block alert-success show'>
															  <button type='button' class='close' data-dismiss='alert'></button>
																 <span>STNK Berhasil Diupdate</span>
																</div>";
					} else if ($this->session->flashdata('sama')) {
						echo "<div class='alert alert-block alert-error show'>
															  <button type='button' class='close' data-dismiss='alert'></button>
																 <span>STNK Sudah Dimasukkan</span>
																</div>";
					}

					?>
				</div>
				<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
					<thead>
						<tr>
							<th>No</th>
							<th>Plat Nomor</th>
							<th>Merk</th>
							<th>Nominal Pajak</th>
							<th>Nama Pemilik</th>
							<th>Alamat</th>
							<th>Tahun Registrasi</th>
							<th>Berlaku S/d</th>
							<th>Status</th>
							<th>Foto Kendaraan</th>
							<th>Action</th>


						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						if ($data_stnk->num_rows() > 0) {
							foreach ($data_stnk->result_array() as $tampil) {
								$masaBerlaku  = "";
								$berlakuSampai = $tampil['berlaku_sampai'];
								$sekarang = date('Y-m-d');
								$SebelumJatuhTempo1Bulan  = date("Y-m-d", strtotime('-30 days', strtotime($berlakuSampai)));
								$SebelumJatuhTempo2Minggu = date("Y-m-d", strtotime('-14 days', strtotime($berlakuSampai)));
								$SebelumJatuhTempo1Minggu = date("Y-m-d", strtotime('-7 days', strtotime($berlakuSampai)));

								if ($sekarang == $SebelumJatuhTempo) {
									$masaBerlaku = 'Kurang 1 Bulan Jatuh Tempo';
								} elseif ($sekarang == $SebelumJatuhTempo2Minggu) {
									$masaBerlaku = "Kurang 2 Minggu Jatuh Tempo";
								} elseif ($sekarang == $SebelumJatuhTempo1Minggu) {
									$masaBerlaku = "Kurang 1 Minggu Jatuh Tempo";
								} elseif (strtotime($berlakuSampai) <=  strtotime($sekarang)) {
									$JatuhTempo = new DateTime($berlakuSampai);
									$hariIni = new DateTime($sekarang);
									$diff = $hariIni->diff($JatuhTempo);
									$masaBerlaku = "Terlambat " . $diff->days . " Hari";
									if ($diff->days == 0) {
										$masaBerlaku = "Hari ini Terakhir";
									}
								} else {
									$masaBerlaku = "Masih Berlaku";
								}
						?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $tampil['nomor_registrasi']; ?></td>
									<td><?php echo $tampil['merk']; ?></td>
									<td><?php echo "Rp " . number_format($tampil['nominal']); ?> </td>
									<td><?php echo $tampil['nama_pemilik']; ?></td>
									<td><?php echo $tampil['alamat']; ?></td>
									<td><?php echo $tampil['tahun_pembuatan']; ?></td>
									<td><?php echo date('d F Y', strtotime($berlakuSampai)); ?></td>
									<td><?php echo $masaBerlaku; ?></td>
									<td><a href="<?= base_url() . 'assets/img/gambar_kendaraan/' . $tampil['gambar_kendaraan']; ?>" target="_blank"><img src="<?= base_url() . 'assets/img/gambar_kendaraan/' . $tampil['gambar_kendaraan']; ?>" width="200"></a></td>



									<td>
										<a class="btn green" href="<?php echo base_url(); ?>ga/stnk_edit/<?php echo $tampil['id_ga_stnk']; ?>"><i class="icon-edit"></i> Edit</a>
										<a class="btn blue" href="<?php echo base_url(); ?>ga/stnk_detail/<?php echo $tampil['id_ga_stnk']; ?>"><i class="icon-search"></i> Detail</a>
										<a class="btn red" href="<?php echo base_url(); ?>ga/stnk_delete/<?php echo $tampil['id_ga_stnk']; ?>" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['nama_pemilik']; ?>?')"><i class="icon-trash"></i> Delete</a>


									</td>
								</tr>
							<?php
								$no++;
							}
						} else { ?>
							<tr>
								<td colspan="10">No Result Data</td>
							</tr>
						<?php

						}
						?>

					</tbody>
				</table>
			</div>
		</div>

	</div>
</div>