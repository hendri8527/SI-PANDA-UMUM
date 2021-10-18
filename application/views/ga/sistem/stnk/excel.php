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
									
									
								</div>
								<table border="1px;">
									<thead>
										<tr>
											<th>No</th>
											<th>Plat Nomor</th>
											<th>Merek</th>
											<th>Nomor Rangka</th>
											<th>Nomor Mesin</th>
											<th>Nominal Pajak</th>
											<th>Nama Pemilik</th>
											<th>Alamat</th>
											<th>Tahun Registrasi</th>
											<th>Berlaku S/d</th>
											
											
											
										</tr>
									</thead>
									<tbody>
										<?php
										$no=1;
										if ($data_stnk->num_rows()>0) {
											foreach ($data_stnk->result_array() as $tampil) { ?>
										<tr >
											<td><?php echo $no;?></td>
											<td><?php echo $tampil['nomor_registrasi'];?></td>
											<td><?php echo $tampil['merk'];?></td>
											<td><?php echo $tampil['nomor_rangka'];?></td>
											<td><?php echo $tampil['nomor_mesin'];?></td>
											<td><?php echo $tampil['nominal'];?></td>
											<td><?php echo $tampil['nama_pemilik'];?></td>
											<td><?php echo $tampil['alamat'];?></td>
											<td><?php echo $tampil['tahun_pembuatan'];?></td>
											<td><?php echo $tampil['berlaku_sampai'];?></td>

											
											
										</tr>
										<?php
										$no++;
										}
										}
										
										else { ?>
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

				


				


