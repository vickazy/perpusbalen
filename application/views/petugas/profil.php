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
								<a href="<?php echo site_url('Petugas/profil/'.$u['id_petugas']) ?>">Profil <?php echo $p['nama_petugas'] ?></a>
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

								<div class="widget-box">
									<div class="widget-header">
										<h4 class="widget-title">EDIT PROFIL <?php echo $p['nama_petugas'] ?></h4>
									</div>
									<div class="widget-body">
										<div class="widget-main no-padding">
											<?php echo form_open('petugas/edit_profil/'.$p['id_petugas']); ?>
												<!-- <legend>Form</legend> -->
												<fieldset class="form-group">
													<label>NIP / NIGNP Petugas</label>
													<input class="form-control" type="text" name="nip" value="<?php echo $p['nip'] ?>" readonly/>
													<?php echo form_error('nip') ?>
													<br>

													<label>Nama Petugas</label>
													<input class="form-control" type="text" name="nama" value="<?php echo $p['nama_petugas'] ?>" />
													<?php echo form_error('nama') ?>
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