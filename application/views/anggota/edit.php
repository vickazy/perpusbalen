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
								<i class="ace-icon fa fa-users home-icon"></i>
								<a href="<?php echo site_url('Anggota') ?>">Anggota</a>
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
										<h4 class="widget-title">EDIT ANGGOTA <?php echo $anggota['nama'] ?></h4>
									</div>
									<div class="widget-body">
										<div class="widget-main no-padding">
											<?php echo form_open('anggota/edit_proses/'.$anggota['nis']); ?>
												<!-- <legend>Form</legend> -->
												<fieldset class="form-group">
													<label>NIS</label>
													<input class="form-control" type="text" name="nis" value="<?php echo $anggota['nis'] ?>" readonly/>
													<?php echo form_error('nis') ?>
													<br>

													<label>Nama Anggota</label>
													<input class="form-control" type="text" name="nama" value="<?php echo $anggota['nama'] ?>" />
													<?php echo form_error('nama') ?>
													<br>

													<label>Jenis Kelamin</label>
						                            <div>
						                                <select name="jk" id="" class="form-control">
						                                  <option value="">--Pilih Jenis Kelamin--</option>
						                                  <option value="L" <?php if($anggota['jk'] == 'L'){echo "selected";} ?> >Laki - laki</option>
						                                  <option value="P" <?php if($anggota['jk'] == 'P'){echo "selected";} ?> >Perempuan</option>
						                                </select>
						                                <?php echo form_error('jk') ?>
						                            </div>
						                            <br>

						                            <label>Kelas</label>
						                            <div>
						                                 <input class="form-control" type="text" name="kelas" value="<?php echo $anggota['kelas'] ?>" required>
						                                <?php echo form_error('kelas') ?>
						                            </div>

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