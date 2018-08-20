		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?php echo site_url('') ?>" class="navbar-brand">
						<small>
							<i class="fa fa-book"></i>
							AppusBa
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url() ?>assets/images/avatars/avatar2.png" alt="Jason's Photo" />
								<span class="user-info">
									<small>Selamat Datang,</small>
									<?php
										$u = $this->session->userdata('userdata');
										$p = $this->M_petugas->get_by_id($u['id_petugas'])->row_array();
										echo $p['nama_petugas'];
									?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

								<li>
									<a href="<?php echo site_url('Petugas/profil/'.$u['id_petugas']) ?>">
										<i class="ace-icon fa fa-user"></i>
										Profil
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo site_url('Petugas/edit_pass/'.$u['id_petugas']) ?>">
										<i class="ace-icon fa fa-key"></i>
										Edit Password
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo site_url('Login/logout') ?>" onclick="return confirm('Apakah Anda Yakin?');">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>