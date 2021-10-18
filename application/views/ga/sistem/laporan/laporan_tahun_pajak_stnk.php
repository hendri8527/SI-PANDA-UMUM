									<div class="btn-group">
										<a  class="btn green" href="<?php echo base_url();?>ga/laporan_tahun_pajak_stnk_excel" >
													Cetak Excel <i class="icon-print"></i>
													</a> 
										
									</div>
								</br>
								</br>
<?php
$totalsemua=0;
	foreach ($data_stnk->result_array()	as $tampil) {

		$totalsemua += $tampil['nominal'];
		
	}

		
?>
<div class='alert alert-block alert-error show'>
		<button type='button' class='close' data-dismiss='alert'></button>
		<span>Data Pajak STNK Tahun = <?php echo date('Y');?>, Dengan Total Nominal = <?php echo rupiah($totalsemua);?></span>
</div>



<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">JANUARI</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">

									
									
										
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<tr>
											<th>Nomer STNK</th>
											<th>Nominal</th>
											<th>Berlaku S/d</th>

										</tr>
										<?php
											$total=0;
											foreach ($data_stnk->result_array() as $tampil) { 

												$bulan =  $tampil['bulan'];

										?>

										<?php
										if ($bulan==1) { 

												$total += $tampil['nominal']; ?>
										<tr>
											
											<td><?php echo $tampil['nomor_registrasi'];?></td>
											<td><?php echo rupiah($tampil['nominal']);?></td>
											<td><?php echo tgl_indo($tampil['berlaku_sampai']);?></td>
										</tr>
										<?php
										}


										?>
												
											<?php
											}

										
										?>

										<tr>
											
											<td style="text-align:right;"><b>Total</b></td>
											<td colspan="2"><b><?php echo rupiah($total);?></b></td>
											
										</tr>
										
									</thead>
									<tbody>

									
										
										
										
									</tbody>
								</table>
							</div>
						</div>
						
					</div>
				</div>

</div>



<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">FEBRUARI</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">

									
									
										
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<tr>
											<th>Nomer STNK</th>
											<th>Nominal</th>
											<th>Berlaku S/d</th>

										</tr>
										<?php
											$total=0;
											foreach ($data_stnk->result_array() as $tampil) { 

												$bulan =  $tampil['bulan'];
										?>

										<?php
										if ($bulan==2) { 
											$total += $tampil['nominal']; ?>
										<tr>
											<td><?php echo $tampil['nomor_registrasi'];?></td>
											<td><?php echo rupiah($tampil['nominal']);?></td>
											<td><?php echo tgl_indo($tampil['berlaku_sampai']);?></td>
										</tr>
										<?php
										}
										

										?>
												
											<?php
											}
										?>
										
									</thead>
									<tr>
											
											<td style="text-align:right;"><b>Total</b></td>
											<td colspan="2"><b><?php echo rupiah($total);?></b></td>
											
										</tr>
								</table>
							</div>
						</div>
						
					</div>
				</div>

</div>

<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">MARET</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">

									
									
										
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<tr>
											<th>Nomer STNK</th>
											<th>Nominal</th>
											<th>Berlaku S/d</th>

										</tr>
										<?php
											$total=0;
											foreach ($data_stnk->result_array() as $tampil) { 

												$bulan =  $tampil['bulan'];
										?>

										<?php
										if ($bulan==3) { 
											$total += $tampil['nominal']; ?>
										<tr>
											<td><?php echo $tampil['nomor_registrasi'];?></td>
											<td><?php echo rupiah($tampil['nominal']);?></td>
											<td><?php echo tgl_indo($tampil['berlaku_sampai']);?></td>
										</tr>
										<?php
										}
										

										?>
												
											<?php
											}
										?>
										
									</thead>
									<tr>
											
											<td style="text-align:right;"><b>Total</b></td>
											<td colspan="2"><b><?php echo rupiah($total);?></b></td>
											
										</tr>
								</table>
							</div>
						</div>
						
					</div>
				</div>

</div>

<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">APRIL</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">

									
									
										
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<tr>
											<th>Nomer STNK</th>
											<th>Nominal</th>
											<th>Berlaku S/d</th>

										</tr>
										<?php
											$total=0;
											foreach ($data_stnk->result_array() as $tampil) { 

												$bulan =  $tampil['bulan'];
										?>

										<?php
										if ($bulan==4) { 
											$total += $tampil['nominal']; ?>
										<tr>
											<td><?php echo $tampil['nomor_registrasi'];?></td>
											<td><?php echo rupiah($tampil['nominal']);?></td>
											<td><?php echo tgl_indo($tampil['berlaku_sampai']);?></td>
										</tr>
										<?php
										}
										

										?>
												
											<?php
											}
										?>
										
									</thead>
									<tr>
											
											<td style="text-align:right;"><b>Total</b></td>
											<td colspan="2"><b><?php echo rupiah($total);?></b></td>
											
										</tr>
								</table>
							</div>
						</div>
						
					</div>
				</div>

</div>

<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">MEI</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">

									
									
										
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<tr>
											<th>Nomer STNK</th>
											<th>Nominal</th>
											<th>Berlaku S/d</th>

										</tr>
										<?php
											$total=0;
											foreach ($data_stnk->result_array() as $tampil) { 

												$bulan =  $tampil['bulan'];
										?>

										<?php
										if ($bulan==5) { 
											$total += $tampil['nominal']; ?>
										<tr>
											<td><?php echo $tampil['nomor_registrasi'];?></td>
											<td><?php echo rupiah($tampil['nominal']);?></td>
											<td><?php echo tgl_indo($tampil['berlaku_sampai']);?></td>
										</tr>
										<?php
										}
										

										?>
												
											<?php
											}
										?>
										
									</thead>
									<tr>
											
											<td style="text-align:right;"><b>Total</b></td>
											<td colspan="2"><b><?php echo rupiah($total);?></b></td>
											
										</tr>
								</table>
							</div>
						</div>
						
					</div>
				</div>

</div>

<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">JUNI</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">

									
									
										
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<tr>
											<th>Nomer STNK</th>
											<th>Nominal</th>
											<th>Berlaku S/d</th>

										</tr>
										<?php
											$total=0;
											foreach ($data_stnk->result_array() as $tampil) { 

												$bulan =  $tampil['bulan'];
										?>

										<?php
										if ($bulan==6) {
											$total += $tampil['nominal']; ?>
										<tr>
											<td><?php echo $tampil['nomor_registrasi'];?></td>
											<td><?php echo rupiah($tampil['nominal']);?></td>
											<td><?php echo tgl_indo($tampil['berlaku_sampai']);?></td>
										</tr>
										<?php
										}
										

										?>
												
											<?php
											}
										?>
										
									</thead>
									<tr>
											
											<td style="text-align:right;"><b>Total</b></td>
											<td colspan="2"><b><?php echo rupiah($total);?></b></td>
											
										</tr>
								</table>
							</div>
						</div>
						
					</div>
				</div>

</div>

<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">JULI</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">

									
									
										
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<tr>
											<th>Nomer STNK</th>
											<th>Nominal</th>
											<th>Berlaku S/d</th>

										</tr>
										<?php
											$total=0;
											foreach ($data_stnk->result_array() as $tampil) { 

												$bulan =  $tampil['bulan'];
										?>

										<?php
										if ($bulan==7) { 
											$total += $tampil['nominal']; ?>
										<tr>
											<td><?php echo $tampil['nomor_registrasi'];?></td>
											<td><?php echo rupiah($tampil['nominal']);?></td>
											<td><?php echo tgl_indo($tampil['berlaku_sampai']);?></td>
										</tr>
										<?php
										}
										

										?>
												
											<?php
											}
										?>
										
									</thead>
									<tr>
											
											<td style="text-align:right;"><b>Total</b></td>
											<td colspan="2"><b><?php echo rupiah($total);?></b></td>
											
										</tr>
								</table>
							</div>
						</div>
						
					</div>
				</div>

</div>

<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">AGUSTUS</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">

									
									
										
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<tr>
											<th>Nomer STNK</th>
											<th>Nominal</th>
											<th>Berlaku S/d</th>

										</tr>
										<?php
											$total=0;
											foreach ($data_stnk->result_array() as $tampil) { 

												$bulan =  $tampil['bulan'];
										?>

										<?php
										if ($bulan==8) { 
											$total += $tampil['nominal']; ?>
										<tr>
											<td><?php echo $tampil['nomor_registrasi'];?></td>
											<td><?php echo rupiah($tampil['nominal']);?></td>
											<td><?php echo tgl_indo($tampil['berlaku_sampai']);?></td>
										</tr>
										<?php
										}
										

										?>
												
											<?php
											}
										?>
										
									</thead>
									<tr>
											
											<td style="text-align:right;"><b>Total</b></td>
											<td colspan="2"><b><?php echo rupiah($total);?></b></td>
											
										</tr>
								</table>
							</div>
						</div>
						
					</div>
				</div>

</div>

<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">SEPTEMBER</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">

									
									
										
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<tr>
											<th>Nomer STNK</th>
											<th>Nominal</th>
											<th>Berlaku S/d</th>

										</tr>
										<?php
											$total=0;
											foreach ($data_stnk->result_array() as $tampil) { 

												$bulan =  $tampil['bulan'];
										?>

										<?php
										if ($bulan==9) { 
											$total += $tampil['nominal']; ?>
										<tr>
											<td><?php echo $tampil['nomor_registrasi'];?></td>
											<td><?php echo rupiah($tampil['nominal']);?></td>
											<td><?php echo tgl_indo($tampil['berlaku_sampai']);?></td>
										</tr>
										<?php
										}
										

										?>
												
											<?php
											}
										?>
										
									</thead>
									<tr>
											
											<td style="text-align:right;"><b>Total</b></td>
											<td colspan="2"><b><?php echo rupiah($total);?></b></td>
											
										</tr>
								</table>
							</div>
						</div>
						
					</div>
				</div>

</div>

<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">OKTOBER</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">

									
									
										
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<tr>
											<th>Nomer STNK</th>
											<th>Nominal</th>
											<th>Berlaku S/d</th>

										</tr>
										<?php
											$total=0;
											foreach ($data_stnk->result_array() as $tampil) { 

												$bulan =  $tampil['bulan'];
										?>

										<?php
										if ($bulan==10) { 
											$total += $tampil['nominal']; ?>
										<tr>
											<td><?php echo $tampil['nomor_registrasi'];?></td>
											<td><?php echo rupiah($tampil['nominal']);?></td>
											<td><?php echo tgl_indo($tampil['berlaku_sampai']);?></td>
										</tr>
										<?php
										}
										

										?>
												
											<?php
											}
										?>
										
									</thead>
									<tr>
											
											<td style="text-align:right;"><b>Total</b></td>
											<td colspan="2"><b><?php echo rupiah($total);?></b></td>
											
										</tr>	
								</table>
							</div>
						</div>
						
					</div>
				</div>

</div>

<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">NOVEMBER</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">

									
									
										
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<tr>
											<th>Nomer STNK</th>
											<th>Nominal</th>
											<th>Berlaku S/d</th>

										</tr>
										<?php
											$total=0;
											foreach ($data_stnk->result_array() as $tampil) { 

												$bulan =  $tampil['bulan'];
										?>

										<?php
										if ($bulan==11) { 
											$total += $tampil['nominal']; ?>
										<tr>
											<td><?php echo $tampil['nomor_registrasi'];?></td>
											<td><?php echo rupiah($tampil['nominal']);?></td>
											<td><?php echo tgl_indo($tampil['berlaku_sampai']);?></td>
										</tr>
										<?php
										}
										

										?>
												
											<?php
											}
										?>
										
									</thead>
									<tr>
											
											<td style="text-align:right;"><b>Total</b></td>
											<td colspan="2"><b><?php echo rupiah($total);?></b></td>
											
										</tr>	
								</table>
							</div>
						</div>
						
					</div>
				</div>

</div>

<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption">DESEMBER</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-toolbar">

									
									
										
								<table class="table table-striped table-hover table-bordered">
									<thead>
										<tr>
											<tr>
											<th>Nomer STNK</th>
											<th>Nominal</th>
											<th>Berlaku S/d</th>

										</tr>
										<?php
											$total=0;
											foreach ($data_stnk->result_array() as $tampil) { 

												$bulan =  $tampil['bulan'];
										?>

										<?php
										if ($bulan==12) { 
											$total += $tampil['nominal']; ?>
										<tr>
											<td><?php echo $tampil['nomor_registrasi'];?></td>
											<td><?php echo rupiah($tampil['nominal']);?></td>
											<td><?php echo tgl_indo($tampil['berlaku_sampai']);?></td>
										</tr>
										<?php
										}
										

										?>
												
											<?php
											}
										?>
										
									</thead>
									<tr>
											
											<td style="text-align:right;"><b>Total</b></td>
											<td colspan="2"><b><?php echo rupiah($total);?></b></td>
											
										</tr>		
								</table>
							</div>
						</div>
						
					</div>
				</div>

</div>

				


				


