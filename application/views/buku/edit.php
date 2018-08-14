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
								<i class="ace-icon fa fa-book home-icon"></i>
								<a href="<?php echo site_url('Buku') ?>">Buku</a>
							</li>
							<li class="active">Edit</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">

						<div class="row">
							<div class="col-xs-6">
								<!-- PAGE CONTENT BEGINS -->

								<div class="widget-box">
									<div class="widget-header">
										<h4 class="widget-title">EDIT BUKU <?php echo $buku['judul'] ?></h4>
									</div>
									<div class="widget-body">
										<div class="widget-main no-padding">
										<?php echo form_open('buku/edit_proses/'.$buku['kode_buku']); ?>
											<!-- <legend>Form</legend> -->
											<fieldset class="form-group">

												<label>Judul Buku</label>
												<input class="form-control" type="text" name="judul" value="<?php echo $buku['judul'] ?>" />
												<?php echo form_error('judul') ?>
												<br>
						                            
					                            <label>Jenis Buku</label>
					                            <div>
					                                <select name="id_jenis" class="form-control" >
					                                  	<option value="">--Pilih Jenis--</option>
					                                  	<?php foreach ($jenis as $key) : ?>
					                                  	<option value="<?php echo $key->id_jenis ?>" <?php if($key->id_jenis == $buku['id_jenis']){echo "selected";} ?> >
					                                  		<?php echo $key->jenis_buku ?>
				                                  	  	</option>
					                                  	<?php endforeach; ?>
					                                </select>
					                            </div>
						                        <br>

												<label>Tanggal</label>
					                            <div>
					                                <input class="form-control input-mask-date" type="text" id="form-field-mask-1" name="tanggal" placeholder="tgl/bln/thn" value="<?php echo $buku['tanggal'] ?>">
					                                <?php echo form_error('tanggal') ?>
					                            </div>
					                            <br>

					                            <label>Penerbit</label>
					                            <div>
					                                <input class="form-control" type="text" name="penerbit" placeholder="Penerbit" value="<?php echo $buku['penerbit'] ?>">
					                                <?php echo form_error('penerbit') ?>
				                            	</div>
												<br>

												<label>Pengarang</label>
					                            <div>
					                                <input class="form-control" type="text" name="pengarang" placeholder="Pengarang" value="<?php echo $buku['pengarang'] ?>">
					                                <?php echo form_error('pengarang') ?>
					                            </div>
					                            <br>

												<label>Bahasa</label>
					                            <div>
					                                <input class="form-control" type="text" name="bahasa" placeholder="Bahasa" value="<?php echo $buku['bahasa'] ?>">
					                                <?php echo form_error('bahasa') ?>
					                            </div>
					                            <br>

					                            <label>Jumlah</label>
					                            <div>
					                                <input class="form-control" type="text" name="jumlah" placeholder="Jumlah" value="<?php echo $buku['jumlah'] ?>">
					                                <?php echo form_error('jumlah') ?>
					                            </div>
					                            <br>

					                            <label>No. Inventaris</label>
					                            <div>
					                                <input class="form-control" type="text" name="no_inventaris" placeholder="No Inventaris" value="<?php echo $buku['no_inventaris'] ?>">
					                                <?php echo form_error('no_inventaris') ?>
					                            </div>
					                            <br>

					                            <label>Asal Buku</label>
					                            <div>
					                                <input class="form-control" type="text" name="asal" placeholder="Asal" value="<?php echo $buku['asal'] ?>">
					                                <?php echo form_error('asal') ?>
					                            </div>
					                            <br>

					                            <label>Harga</label>
					                            <div>
					                                <input class="form-control" type="text" name="harga" placeholder="Harga" value="<?php echo $buku['harga'] ?>">
					                                <?php echo form_error('harga') ?>
					                            </div>
					                            <br>

												<label>Keterangan</label>
					                            <div>
					                                <textarea class="form-control" name="keterangan" id="" cols="10" rows="5">
					                                	<?php echo $buku['keterangan'] ?>
				                                	</textarea>
					                                <?php echo form_error('keterangan') ?>
					                            </div>

												<div class="form-actions center">
													<button type="submit" class="btn btn-sm btn-success">
														<i class="ace-icon fa fa-pencil icon-on-right bigger-110"></i>
														Edit
													</button>
												</div>
											</fieldset>
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