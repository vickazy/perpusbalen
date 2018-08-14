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
								<a href="<?php echo site_url('guru') ?>">Guru</a>
							</li>
							<li class="active">Edit</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="widget-box">
									<div class="widget-header">
										<h4 class="widget-title">EDIT guru <?php echo $guru['nama_guru'] ?></h4>
									</div>
									<div class="widget-body">
										<div class="widget-main no-padding">
											<?php echo form_open('guru/edit_proses/'.$guru['id_guru']); ?>
												<!-- <legend>Form</legend> -->
												<fieldset class="form-group">
													<label>NIP / NIGNP guru</label>
													<input class="form-control" type="text" name="nip" value="<?php echo $guru['nip'] ?>" readonly/>
													<?php echo form_error('nip') ?>
													<br>

													<label>Nama guru</label>
													<input class="form-control" type="text" name="nama" value="<?php echo $guru['nama_guru'] ?>" />
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