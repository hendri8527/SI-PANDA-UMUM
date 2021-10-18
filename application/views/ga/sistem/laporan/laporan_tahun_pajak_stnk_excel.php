<?php
$totalsemua=0;
	foreach ($data_stnk->result_array()	as $tampil) {

		$totalsemua += $tampil['nominal'];
		
	}

		
?>
Data Pajak STNK Tahun = <?php echo date('Y');?>, Dengan Total Nominal = <?php echo rupiah($totalsemua);?>

<br>
<br>
										
								<table border="1">
									<thead>
										<tr>
											<td colspan="3"><center><b>JANUARI</b></center></td>
										</tr>
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
								</table>

								</br>
								</br>
								</br>
										
								<table border="1">
									<thead>
										<tr>
											<td colspan="3"><center><b>FEBRUARI</b></center></td>
										</tr>
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
							

								<table border="1">
									<thead>
										<tr>
											<td colspan="3"><center><b>MARET</b></center></td>
										</tr>
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
							



									
									
										
								<table border="1">
									<thead>
										<tr>
											<td colspan="3"><center><b>APRIL</b></center></td>
										</tr>
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
							

										
								<table border="1">
									<thead>
										<tr>
											<td colspan="3"><center><b>MEI</b></center></td>
										</tr>
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
							


									
									
										
								<table border="1">
									<thead>
										<tr>
											<td colspan="3"><center><b>JUNI</b></center></td>
										</tr>
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
							


									
									
										
								<table border="1">
									<thead>
										<tr>
											<td colspan="3"><center><b>JULI</b></center></td>
										</tr>
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
							



									
									
										
								<table border="1">
									<thead>
										<tr>
											<td colspan="3"><center><b>AGUSTUS</b></center></td>
										</tr>
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
							



									
									
										
								<table border="1">
									<thead>
										<tr>
											<td colspan="3"><center><b>SEPTEMBER</b></center></td>
										</tr>
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
							

										
								<table border="1">
									<thead>
										<tr>
											<td colspan="3"><center><b>OKTOBER</b></center></td>
										</tr>
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
							



									
									
										
								<table border="1">
									<thead>
										<tr>
											<td colspan="3"><center><b>NOVEMBER</b></center></td>
										</tr>
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
							



									
									
										
								<table border="1">
									<thead>
										<tr>
											<td colspan="3"><center><b>DESEMBER</b></center></td>
										</tr>
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
							
				


				


