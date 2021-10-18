<div class="row-fluid">
	<div class="span12">

		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption"><i class="icon-reorder"></i>DETAIL STNK</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>

				</div>
			</div>
			<div class="portlet-body form">

				<div id="form_sample_2" class="form-horizontal">

					<?php echo form_open('', 'class="form-horizontal"'); ?>

					<?php

					foreach ($data_stnk->result() as  $value) { ?>

						<div class="control-group">
							<label class="control-label">Status Kendaraan</label>
							<div class="controls">
								<?php
								if ($value->status_kendaraan == "0") { ?>

									<input type="text" name="status_kendaraan" id="status_kendaraan" class="span6 m-wrap" value="Truk" disabled="true" />
								<?php
								} else { ?>
									<input type="text" name="status_kendaraan" id="status_kendaraan" class="span6 m-wrap" value="Operasional" disabled="true" />

								<?php
								}
								?>
							</div>
						</div>
						<!-- <div class="control-group">
										<label class="control-label">Lokasi</label>
										<div class="controls">
											<input type="text" name="lokasi" id="lokasi" class="span6 m-wrap" value="<?php echo $value->lokasi; ?>" disabled="true"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Box</label>
										<div class="controls">
											<input type="text" name="box" id="box" class="span6 m-wrap" value="<?php echo $value->box; ?>" disabled="true"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">User Komersial</label>
										<div class="controls">
											<input type="text" name="komersil" id="komersil" class="span6 m-wrap" value="<?php echo $value->komersil; ?>" disabled="true"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Nomor Kontrak</label>
										<div class="controls">
											<input type="text" name="nomor_kontrak" id="nomor_kontrak" class="span6 m-wrap" value="<?php echo $value->nomor_kontrak; ?>" disabled="true"/>
										</div>
									</div>
									 -->
						<div class="control-group">
							<label class="control-label">Plat Nomor</label>
							<div class="controls">
								<input type="text" name="nomor_registrasi" id="nomor_registrasi" class="span6 m-wrap" value="<?php echo $value->nomor_registrasi; ?>" disabled="true" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Nama Pemilik</label>
							<div class="controls">
								<input type="text" name="nama_pemilik" id="nama_pemilik" class="span6 m-wrap" value="<?php echo $value->nama_pemilik; ?>" disabled="true" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Alamat</label>
							<div class="controls">
								<textarea class="span12 wysihtml5 m-wrap" rows="6" name="alamat" id="alamat" value="<?php echo $value->alamat_stnk; ?>" disabled="true"><?php echo $value->alamat_stnk; ?></textarea>

							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Merk</label>
							<div class="controls">
								<input type="text" name="merk" id="merk" class="span6 m-wrap" value="<?php echo $value->merk; ?>" disabled="true" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Type</label>
							<div class="controls">
								<input type="text" name="type" id="type" class="span6 m-wrap" value="<?php echo $value->nama_ga_master_type; ?>" disabled="true" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Jenis</label>
							<div class="controls">
								<input type="text" name="jenis" id="jenis" class="span6 m-wrap" value="<?php echo $value->nama_ga_master_jenis; ?>" disabled="true" />
							</div>
						</div>


						<div class="control-group">
							<label class="control-label">Model</label>
							<div class="controls">
								<input type="text" name="model" id="model" class="span6 m-wrap" value="<?php echo $value->model; ?>" disabled="true" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Tahun Pembuatan</label>
							<div class="controls">
								<input type="text" name="tahun_pembuatan" id="tahun_pembuatan" class="span6 m-wrap" value="<?php echo $value->tahun_pembuatan; ?>" disabled="true" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Isi Silinder</label>
							<div class="controls">
								<input type="text" name="isi_silinder" id="isi_silinder" class="span6 m-wrap" value="<?php echo $value->isi_silinder; ?>" disabled="true" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Nomor Rangka</label>
							<div class="controls">
								<input type="text" name="nomor_rangka" id="nomor_rangka" class="span6 m-wrap" value="<?php echo $value->nomor_rangka; ?>" disabled="true" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Nomor Mesin</label>
							<div class="controls">
								<input type="text" name="nomor_mesin" id="nomor_mesin" class="span6 m-wrap" value="<?php echo $value->nomor_mesin; ?>" disabled="true" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Warna</label>
							<div class="controls">
								<input type="text" name="warna" id="warna" class="span6 m-wrap" value="<?php echo $value->warna; ?>" disabled="true" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Bahan Bakar</label>
							<div class="controls">
								<input type="text" name="bahan_bakar" id="bahan_bakar" class="span6 m-wrap" value="<?php echo $value->bahan_bakar; ?>" disabled="true" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Warna TNKB</label>
							<div class="controls">
								<input type="text" name="warna_tnkb" id="warna_tnkb" class="span6 m-wrap" value="<?php echo $value->warna_tnkb; ?>" disabled="true" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Tahun Registrasi</label>
							<div class="controls">
								<input type="text" name="tahun_registrasi" id="tahun_registrasi" class="span6 m-wrap" value="<?php echo $value->tahun_registrasi; ?>" disabled="true" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Nomor BPKB</label>
							<div class="controls">
								<input type="text" name="nomor_bpkb" id="nomor_bpkb" class="span6 m-wrap" value="<?php echo $value->nomor_bpkb; ?>" disabled="true" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Kode Lokasi</label>
							<div class="controls">
								<input type="text" name="kode_lokasi" id="kode_lokasi" class="span6 m-wrap" value="<?php echo $value->kode_lokasi; ?>" disabled="true" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Nomor Urut Pendaftaran</label>
							<div class="controls">
								<input type="text" name="no_urut_pendaftaran" id="no_urut_pendaftaran" class="span6 m-wrap" value="<?php echo $value->no_urut_pendaftaran; ?>" disabled="true" />
							</div>
						</div>


						<div class="control-group">
							<label class="control-label">Berlaku Sampai</label>
							<div class="controls">
								<div class="input-append date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
									<input class="m-wrap m-ctrl-medium date-picker" name="berlaku_sampai" type="text" id="berlaku_sampai" value="<?php echo $value->berlaku_sampai; ?>" data-date="<?php echo date('Y-m-d'); ?>" data-date-format="yyyy-mm-dd" disabled="true">
									<span class="add-on"><i class="icon-calendar" disabled="true"></i></span>
								</div>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label">Nominal</label>
							<div class="controls">
								<input type="text" name="nominal" id="nominal" class="span6 m-wrap" value="<?php echo $value->nominal; ?>" disabled="true" />
							</div>
						</div>

					<?php
					}
					?>



					<div class="form-actions">

						<a href="<?php echo base_url(); ?>ga/stnk" class="btn white"><i class="icon-long-arrow-left"></i> Kembali</a>

					</div>

				</div>

			</div>
		</div>

	</div>
</div>