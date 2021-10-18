<div class="row-fluid">
	<div class="span12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption"><i class="icon-edit"></i>Master Type</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>

				</div>
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="btn-group">

						<a class="btn green" href="<?php echo base_url(); ?>ga/master_type_tambah">
							Add New <i class="icon-plus"></i>
						</a>
					</div>
					<?php

					if ($this->session->flashdata('message')) {
						echo "<div class='alert alert-block alert-error show'>
															  <button type='button' class='close' data-dismiss='alert'></button>
																 <span>Master Type Berhasil Dihapus</span>
																</div>";
					} else if ($this->session->flashdata('berhasil')) {
						echo "<div class='alert alert-block alert-success show'>
															  <button type='button' class='close' data-dismiss='alert'></button>
																 <span>Master Type Berhasil Disimpan</span>
																</div>";
					} else if ($this->session->flashdata('update')) {
						echo "<div class='alert alert-block alert-success show'>
															  <button type='button' class='close' data-dismiss='alert'></button>
																 <span>Master Type Berhasil Diupdate</span>
																</div>";
					}

					?>
				</div>
				<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Action</th>


						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						if ($data_master_type->num_rows() > 0) {
							foreach ($data_master_type->result_array() as $tampil) { ?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $tampil['nama_ga_master_type']; ?></td>


									<td><a class="btn green" href="<?php echo base_url(); ?>ga/master_type_edit/<?php echo $tampil['id_ga_master_type']; ?>"><i class="icon-edit"></i> Edit</a>
										<a class="btn red" href="<?php echo base_url(); ?>ga/master_type_delete/<?php echo $tampil['id_ga_master_type']; ?>" onclick="return confirm('Yakin Ingin Menghapus <?php echo $tampil['nama_ga_master_type']; ?>?')"><i class="icon-trash"></i> Delete</a>
									</td>
								</tr>
							<?php
								$no++;
							}
						} else { ?>
							<tr>
								<td colspan="3">No Result Data</td>
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