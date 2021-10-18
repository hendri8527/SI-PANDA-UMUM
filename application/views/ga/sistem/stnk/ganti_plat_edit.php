<div class="row-fluid">
					<div class="span12">
						
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-reorder"></i>PERPANJANG PLAT STNK</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body form">
								
								<div id="form_sample_2" class="form-horizontal">
								
									<?php echo form_open('ga/ganti_plat_update/','class="form-horizontal"'); ?>
									<input type="hidden" name='id_ga_stnk' value="<?php echo $id_ga_stnk;?>"> 
									
									
									<div class="control-group">
										<label class="control-label">Nomor Registrasi</label>
										<div class="controls">
											<input type="text" name="nomor_registrasi" id="nomor_registrasi" class="span6 m-wrap" value="<?php echo $nomor_registrasi;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Nama Pemilik</label>
										<div class="controls">
											<input type="text" name="nama_pemilik" id="nama_pemilik" class="span6 m-wrap" value="<?php echo $nama_pemilik;?>" readonly="true"/>
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label">Alamat</label>
										<div class="controls">
											<textarea class="span12 wysihtml5 m-wrap" rows="6" name="alamat" id="alamat" value="<?php echo $alamat;?>" readonly="true"><?php echo $alamat;?></textarea>
											
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Merk</label>
										<div class="controls">
											<input type="text" name="merk" id="merk" class="span6 m-wrap" value="<?php echo $merk;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Type</label>
										<div class="controls">
											<input type="text" name="type" id="type" class="span6 m-wrap" value="<?php echo $nama_ga_master_type;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Jenis</label>
										<div class="controls">
											<input type="text" name="jenis" id="jenis" class="span6 m-wrap" value="<?php echo $nama_ga_master_jenis;?>" readonly="true"/>
										</div>
									</div>


									<div class="control-group">
										<label class="control-label">Model</label>
										<div class="controls">
											<input type="text" name="model" id="model" class="span6 m-wrap" value="<?php echo $model;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Tahun Pembuatan</label>
										<div class="controls">
											<input type="text" name="tahun_pembuatan" id="tahun_pembuatan" class="span6 m-wrap" value="<?php echo $tahun_pembuatan;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Isi Silinder</label>
										<div class="controls">
											<input type="text" name="isi_silinder" id="isi_silinder" class="span6 m-wrap" value="<?php echo $isi_silinder;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Nomor Rangka</label>
										<div class="controls">
											<input type="text" name="nomor_rangka" id="nomor_rangka" class="span6 m-wrap" value="<?php echo $nomor_rangka;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Nomor Mesin</label>
										<div class="controls">
											<input type="text" name="nomor_mesin" id="nomor_mesin" class="span6 m-wrap" value="<?php echo $nomor_mesin;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Warna</label>
										<div class="controls">
											<input type="text" name="warna" id="warna" class="span6 m-wrap" value="<?php echo $warna;?>" readonly="true" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Bahan Bakar</label>
										<div class="controls">
											<input type="text" name="bahan_bakar" id="bahan_bakar" class="span6 m-wrap" value="<?php echo $bahan_bakar;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Warna TNKB</label>
										<div class="controls">
											<input type="text" name="warna_tnkb" id="warna_tnkb" class="span6 m-wrap" value="<?php echo $warna_tnkb;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Tahun Registrasi</label>
										<div class="controls">
											<input type="text" name="tahun_registrasi" id="tahun_registrasi" class="span6 m-wrap" value="<?php echo $tahun_registrasi;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Nomor BPKB</label>
										<div class="controls">
											<input type="text" name="nomor_bpkb" id="nomor_bpkb" class="span6 m-wrap" value="<?php echo $nomor_bpkb;?>" readonly="true"/>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Kode Lokasi</label>
										<div class="controls">
											<input type="text" name="kode_lokasi" id="kode_lokasi" class="span6 m-wrap" value="<?php echo $kode_lokasi;?>" readonly="true" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Nomor Urut Pendaftaran</label>
										<div class="controls">
											<input type="text" name="no_urut_pendaftaran" id="no_urut_pendaftaran" class="span6 m-wrap" value="<?php echo $no_urut_pendaftaran;?>" readonly="true"/>
										</div>
									</div>
									

									<div class="control-group">
										<label class="control-label">Berlaku Sampai</label>
										<div class="controls">
											<div class="input-append date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
												<input  class="m-wrap m-ctrl-medium date-picker" name="berlaku_sampai"  type="text"  id="berlaku_sampai" value="<?php echo $berlaku_sampai;?>"  data-date="<?php echo date ('Y-m-d');?>" data-date-format="yyyy-mm-dd" > 
             									<span class="add-on"><i class="icon-calendar"></i></span>
											</div>
										</div>
									</div>
									
									<div class="form-actions">
										<button type="submit" id="simpan" class="btn green"><i class="icon-ok"></i> Update</button>
										<a href="<?php echo base_url();?>ga/ganti_plat" class="btn white"><i class="icon-long-arrow-left"></i> Kembali</a>
										
									</div>
									<?php echo form_close(); ?>
								</div>
								
							</div>
						</div>
						
					</div>
				</div>


