<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN VALIDATION STATES-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption"><i class="icon-reorder"></i>Add Master Pegawai</div>
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

					<?php echo form_open_multipart('ga/master_pegawai_simpan/', 'class="form-horizontal"'); ?>

					<div class="control-group">
						<label class="control-label">Nama Pegawai</label>
						<div class="controls">
							<input type="text" name="nama" id="nama" class="span6 m-wrap" placeholder="Nama Pegawai..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">NIP</label>
						<div class="controls">
							<input type="text" name="nip" id="nip" class="span6 m-wrap" placeholder="NIP Pegawai..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Jabatan</label>
						<div class="controls">
							<input type="text" name="jabatan" id="jabatan" class="span6 m-wrap" placeholder="Jabatan Pegawai..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">No HP</label>
						<div class="controls">
							<input type="text" name="no_hp" id="no_hp" class="span6 m-wrap" placeholder="No HP Pegawai..." />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Alamat</label>
						<div class="controls">
							<textarea class="span12 wysihtml5 m-wrap" rows="6" name="alamat" id="alamat"></textarea>

						</div>
					</div>




					<div class="form-actions">
						<button type="submit" id="simpan" class="btn green"><i class="icon-ok"></i> Simpan</button>
						<a href="<?php echo base_url(); ?>ga/master_pegawai" class="btn white"><i class="icon-long-arrow-left"></i> Kembali</a>

					</div>
					<?php echo form_close(); ?>
				</div>

			</div>
		</div>

	</div>
</div>


<script type="text/javascript">
	$(document).ready(function() {

		$('#nama_ga_master_type').focus();

	});
</script>