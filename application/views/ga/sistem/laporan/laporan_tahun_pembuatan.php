
<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN VALIDATION STATES-->
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-reorder"></i>Cetak Laporan Kebutuhan STNK</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"></a>
									
								</div>
							</div>
							<div class="portlet-body form">
								

								<div id="form_sample_2" class="form-horizontal">
								
									
									

								<div class="form-horizontal">

									<div class="control-group">
												<label class="control-label">Tahun pembuatan <input type="checkbox" name="tahun" id="tahun" value="tahun"></label>
												<div class="controls">
												

												</div>
												<div id="pilihantahun">
												<div class="controls">
													<select id="select2_sample22" name="tahun_pembuatan" class="span6 select2">
														<option value=""></option>
														<?php
														foreach ($data_tahun->result_array() as $tampil) { ?>
															<option value="<?php echo $tampil['tahun_pembuatan'];?>"><?php echo $tampil['tahun_pembuatan'];?> </option>
														<?php
														}
														?>
													</select>
												</div>
												</div>
									</div>

									<div class="control-group">
												<label class="control-label">Status Kendaraan <input type="checkbox" name="status" id="status" value="status"></label>
												<div id="pilihanstatus">
												<div class="controls">
													<select id="select2_sample33" name="status_kendaraan" class="span6 select2">
														<option value=""></option>
														<option value="0">Truk</option>
														<option value="1">Operasional</option>
														<option value="2">Komersial</option>
														
													</select>
												</div>
												</div>
									</div>

									

								


									
									<div class="control-group">
										<div class="controls">
											<button id="cek" class="btn green"><i class="icon-ok"></i> Tampil</button>
										
										</div>
									</div>
									
									</div>
									
								</div>

								<div id="tampil">

								</div>
								
							</div>
						</div>
						
					</div>
				</div>


<script type="text/javascript">
	$(document).ready(function(){
		
		$("#pilihantahun").hide(true);
		$("#pilihanstatus").hide(true);
		


		$("#tahun").live('click',function(){

			if ($('#tahun').is(':checked')) {
			$("#pilihantahun").show(true);
			
			} else {
				$("#pilihantahun").hide(true);
			}

		});

		$("#status").live('click',function(){

			if ($('#status').is(':checked')) {
			$("#pilihanstatus").show(true);
			
			} else {
				$("#pilihanstatus").hide(true);
			}

		});

		

		$("#cek").click(function() {

			if ($('#tahun').is(':checked') && $('#status').is(':checked')) {
				var tahun = $("#select2_sample22").val();
				var status = $("#select2_sample33").val();

				if (tahun=="" && status=="") {
					alert("Tahun Dan Status Belum Terpilih");
				}

				else if (tahun=="" && status!="") {
					alert("Tahun Belum Terpilih");
				}
				else if (tahun!="" && status=="") {
					alert("Status Kendaraan Belum Terpilih");
				}
				else {

					var tahun = $("#select2_sample22").val();
					var status = $("#select2_sample33").val();
					

					$.ajax({
			            type:"POST",
			            url :"<?php echo base_url();?>ga/laporan_tahun_status_cek",
			            data:"tahun="+tahun+"&status="+status,
			            success : function (data) {

			            	
			            	$("#tampil").html(data);
			                  
			                          
			            }
		             });

				}


			}


			else if ($('#tahun').is(':checked')) {
			
				var tahun = $("#select2_sample22").val();

				if (tahun=="") {

					alert("Tahun Pembuatan Belum Dipilih!");

				}
				else {

					$.ajax({
			            type:"POST",
			            url :"<?php echo base_url();?>ga/laporan_tahun_pembuatan_cek",
			            data:"tahun="+tahun,
			            success : function (data) {

			            	
			            	$("#tampil").html(data);
			                  
			                          
			            }
		             });

				}
					
			
			}
			else if ($('#status').is(':checked')) {
				var status = $("#select2_sample33").val();

				if (status=="") {

					alert("Status Kendaraan Belum Dipilih!");

				}
				else {

					$.ajax({
			            type:"POST",
			            url :"<?php echo base_url();?>ga/laporan_tahun_pembuatan_status_cek",
			            data:"status="+status,
			            success : function (data) {
			            	
			            	$("#tampil").html(data);
			                  
			                          
			            }
		             });

				}
			}
			
		});



	});
</script>
