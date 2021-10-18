<div class="row-fluid">
					<div class="span12">
						
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-reorder"></i>Edit Master Jenis</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body form">
								
								<div id="form_sample_2" class="form-horizontal">
								
									<?php echo form_open_multipart('ga/master_jenis_update/','class="form-horizontal"'); ?>
									<input type="hidden" name='id_ga_master_jenis' value="<?php echo $id_ga_master_jenis;?>"> 
									
									<div class="control-group">
										<label class="control-label">Nama Jenis</label>
										<div class="controls">
											<input jenis="text" name="nama_ga_master_jenis" id="nama_ga_master_jenis" class="span6 m-wrap" value="<?php echo $nama_ga_master_jenis;?>" />
										</div>
									</div>

									

									<div class="form-actions">
										<button jenis="submit" id="simpan" class="btn green"><i class="icon-ok"></i> Update</button>
										<a href="<?php echo base_url();?>ga/master_jenis" class="btn white"><i class="icon-long-arrow-left"></i> Kembali</a>
										
									</div>
									<?php echo form_close(); ?>
								</div>
								
							</div>
						</div>
						
					</div>
				</div>


