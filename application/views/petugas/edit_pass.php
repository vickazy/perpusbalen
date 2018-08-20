<?php $this->load->view('header'); ?>

	<body class="no-skin">
		<?php $this->load->view('profil'); ?>

		<div class="main-container ace-save-state" id="main-container">

			<?php $this->load->view('sidebar_menu'); ?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-user user-icon"></i>
								<?php
									$u = $this->session->userdata('userdata');
									$p = $this->M_petugas->get_by_id($u['id_petugas'])->row_array();
								?>
								<a href="<?php echo site_url('Petugas/profil/'.$u['id_petugas']) ?>">Edit Password <?php echo $p['nama_petugas'] ?></a>
							</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<?php 
		                          	if($this->session->flashdata('sukses_edit') != "") {
		                              	echo '<div class="alert alert-success alert-dismissable">
		                                	      	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                                    	  	<strong>Sukses</strong> Data Berhasil Diedit
		                                    	</div>';
		                          	}
		                      	?>

		                      	<?php 
		                          	if($this->session->flashdata('gagal_edit') != "") {
		                              	echo '<div class="alert alert-danger alert-dismissable">
		                                	      	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                                    	  	<strong>Error</strong> Data Gagal Diedit
		                                    	</div>';
		                          	}
		                      	?>

								<div class="widget-box">
									<div class="widget-header">
										<h4 class="widget-title">EDIT PASSWORD <?php echo $p['nama_petugas'] ?></h4>
									</div>
									<div class="widget-body">
										<div class="widget-main no-padding">
											<?php echo form_open('petugas/edit_pass_proses/'.$p['id_petugas']); ?>
												<!-- <legend>Form</legend> -->
												<fieldset class="form-group">
													<label>Password Lama</label>
													<input class="form-control" type="password" name="password"/>
													<?php echo form_error('password') ?>
													<br>

													<label>Password Baru</label>
													<input class="form-control" type="password" name="password_baru"/>
													<?php echo form_error('password_baru') ?>
													<br>

													<label>Konfirmasi Password Baru</label>
													<input class="form-control" type="password" name="password_baru_k"/>
													<?php echo form_error('password_baru_k') ?>
													<br>

												</fieldset>

												<div class="form-actions center">
													<button type="submit" class="btn btn-sm btn-success">
														<i class="ace-icon fa fa-pencil icon-on-right bigger-110"></i>
														Edit
													</button>
												</div>
											<?php echo form_close(); ?>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

<?php $this->load->view('footer'); ?>