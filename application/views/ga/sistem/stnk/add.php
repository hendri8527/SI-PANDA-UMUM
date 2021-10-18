<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption"><i class="icon-reorder"></i>Add STNK</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>

				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<?php if (validation_errors()) { ?>
					<div class="alert alert-block alert-error">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<?php echo validation_errors(); ?>
					</div>
				<?php
				}
				?>

				<div id="form_sample_2" class="form-horizontal">

					<?php echo form_open('ga/stnk_simpan/', 'class="form-horizontal"'); ?>


					<div class="control-group">
						<label class="control-label">Status Kendaraan</label>
						<div class="controls">
							<select id="select2_sample33" name="status_kendaraan" class="span6 select2">
								<option value=""></option>
								<option value="0">Truk</option>
								<option value="1">Operasional</option>
								<option value="2">Komersial</option>

							</select>
						</div>
					</div>

					<div id="pilihanlokasi">
						<div class="control-group">
							<label class="control-label">Lokasi</label>
							<div class="controls">
								<input type="text" name="lokasi" id="lokasi" class="span6 m-wrap" placeholder="Lokasi..." />
							</div>
						</div>
					</div>
					<div id="pilihanlambung">
						<div class="control-group">
							<label class="control-label">Nomor Lambung</label>
							<div class="controls">
								<input type="text" name="nomor_lambung" id="nomor_lambung" class="span6 m-wrap" placeholder="Nomor Lambung..." />
							</div>
						</div>
					</div>
					<div id="boksijalak">
						<div class="control-group">
							<label class="control-label">Box</label>
							<div class="controls">
								<input type="text" name="box" id="box" class="span6 m-wrap" placeholder="Box..." />
							</div>
						</div>
					</div>
					<div id="userkomersil">
						<div class="control-group">
							<label class="control-label">User</label>
							<div class="controls">
								<input type="text" name="komersil" id="komersil" class="span6 m-wrap" placeholder="User..." />
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Nomor Kontrak</label>
						<div class="controls">
							<input type="text" name="nomor_kontrak" id="nomor_kontrak" class="span6 m-wrap" placeholder="Nomer Kontrak..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Plat Nomor</label>
						<div class="controls">
							<input type="text" name="nomor_registrasi" id="nomor_registrasi" class="span6 m-wrap" placeholder="Plat Nomor..." />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Berlaku Sampai</label>
						<div class="controls">
							<div class="input-append date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
								<input class="m-wrap m-ctrl-medium date-picker" name="berlaku_sampai" type="text" id="berlaku_sampai" placeholder="Berlaku Sampai..." data-date="<?php echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd">
								<span class="add-on"><i class="icon-calendar"></i></span>
							</div>
						</div>
					</div>


					<div class="control-group">
						<label class="control-label">Nominal Pajak</label>
						<div class="controls">
							<input type="text" name="nominal" id="nominal" class="span6 m-wrap" placeholder="Nominal Pajak..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">NIP</label>
						<div class="controls">
							<input type="text" name="nip" id="nip" class="span6 m-wrap" placeholder="NIP" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Nama Pemilik</label>
						<div class="controls">
							<select id="select2_sample1" name="nama_pemilik" class="span6 select2">
								<option value=""></option>
								<?php
								foreach ($data_master_pegawai->result_array() as $tampil) { ?>
									<option value="<?php echo $tampil['nama']; ?>"><?php echo $tampil['nama']; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Unit Kerja</label>
						<div class="controls">
							<select id="select2_sample2" name="unit_kerja" class="span6 select2">
								<option value=""></option>
								<?php
								foreach ($data_master_bagian->result_array() as $tampil) { ?>
									<option value="<?php echo $tampil['nama_bagian']; ?>"><?php echo $tampil['nama_bagian']; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Alamat</label>
						<div class="controls">
							<textarea class="span12 wysihtml5 m-wrap" rows="6" name="alamat" id="alamat"></textarea>

						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Merk</label>
						<div class="controls">
							<input type="text" name="merk" id="merk" class="span6 m-wrap" placeholder="Merk..." />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Type</label>
						<div class="controls">
							<select id="select2_sample3" name="type" class="span6 select2">
								<option value=""></option>
								<?php
								foreach ($data_master_type->result_array() as $tampil) { ?>
									<option value="<?php echo $tampil['id_ga_master_type']; ?>"><?php echo $tampil['nama_ga_master_type']; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Jenis</label>
						<div class="controls">
							<select id="select2_sample5" name="jenis" class="span6 select2">
								<option value=""></option>
								<?php
								foreach ($data_master_jenis->result_array() as $tampil) { ?>
									<option value="<?php echo $tampil['id_ga_master_jenis']; ?>"><?php echo $tampil['nama_ga_master_jenis']; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>


					<div class="control-group">
						<label class="control-label">Model</label>
						<div class="controls">
							<input type="text" name="model" id="model" class="span6 m-wrap" placeholder="Model..." />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Tahun Pembuatan</label>
						<div class="controls">
							<input type="text" name="tahun_pembuatan" id="tahun_pembuatan" class="span6 m-wrap" placeholder="Tahun Pembuatan..." />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Isi Silinder</label>
						<div class="controls">
							<input type="text" name="isi_silinder" id="isi_silinder" class="span6 m-wrap" placeholder="Isi Silinder..." />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Nomor Rangka</label>
						<div class="controls">
							<input type="text" name="nomor_rangka" id="nomor_rangka" class="span6 m-wrap" placeholder="Nomor Rangka..." />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Nomor Mesin</label>
						<div class="controls">
							<input type="text" name="nomor_mesin" id="nomor_mesin" class="span6 m-wrap" placeholder="Nomor Mesin..." />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Warna</label>
						<div class="controls">
							<input type="text" name="warna" id="warna" class="span6 m-wrap" placeholder="Warna..." />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Bahan Bakar</label>
						<div class="controls">
							<input type="text" name="bahan_bakar" id="bahan_bakar" class="span6 m-wrap" placeholder="Bahan Bakar..." />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Warna TNKB</label>
						<div class="controls">
							<input type="text" name="warna_tnkb" id="warna_tnkb" class="span6 m-wrap" placeholder="Warna TNKB..." />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Tahun Registrasi</label>
						<div class="controls">
							<input type="text" name="tahun_registrasi" id="tahun_registrasi" class="span6 m-wrap" placeholder="Tahun Registrasi..." />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Nomor BPKB</label>
						<div class="controls">
							<input type="text" name="nomor_bpkb" id="nomor_bpkb" class="span6 m-wrap" placeholder="Nomor BPKB..." />
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Kode Lokasi</label>
						<div class="controls">
							<input type="text" name="kode_lokasi" id="kode_lokasi" class="span6 m-wrap" placeholder="Kode Lokasi..." />
						</div>
					</div>

					<!-- <div class="control-group">
										<label class="control-label">Nomor Urut Pendaftaran</label>
										<div class="controls">
											<input type="text" name="no_urut_pendaftaran" id="no_urut_pendaftaran" class="span6 m-wrap" placeholder="Nomor Urut Pendaftaran..." />
										</div>
									</div> -->










					<div class="form-actions">
						<button type="submit" id="simpan" class="btn green"><i class="icon-ok"></i> Simpan</button>
						<a href="<?php echo base_url(); ?>ga/stnk" class="btn white"><i class="icon-long-arrow-left"></i> Kembali</a>

					</div>
					<?php echo form_close(); ?>
				</div>

			</div>
		</div>

	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

		$('#ga_master_lising_id').focus();
		$('#pilihanlokasi').hide(true);
		$('#pilihanlambung').hide(true);
		$('#boksijalak').hide(true);
		$('#userkomersil').hide(true);

	});

	$('#select2_sample33').click(function() {

		var status = $('#select2_sample33').val();

		if (status == "1") {
			$('#pilihanlokasi').show(true);
			$('#pilihanlambung').show(true);
			$('#boksijalak').hide(true);
		} else if (status == "0") {
			$('#boksijalak').show(true);
			$('#pilihanlokasi').hide(true);
			$('#pilihanlambung').hide(true);
		} else {
			$('#boksijalak').hide(true);
			$('#pilihanlokasi').hide(true);
			$('#pilihanlambung').hide(true);
			$('#userkomersil').show(true);
		}


	})
</script>