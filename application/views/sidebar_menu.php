			<div id="sidebar" class="sidebar responsive ace-save-state">

				<ul class="nav nav-list">
					<li class="<?php if($menu == "home"){echo "active";} ?>">
						<a href="<?php echo site_url() ?>">
							<i class="menu-icon fa fa-home"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="<?php if($menu == "buku" || $menu == "jenis" || $menu == "anggota" || $menu == "guru" || $menu == "petugas"){echo "open";} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Master Data
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if($menu == "jenis"){echo "active";} ?>">
								<a href="<?php echo site_url('Jenis') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Jenis Buku
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if($menu == "buku"){echo "active";} ?>">
								<a href="<?php echo site_url('Buku') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Buku
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if($menu == "anggota"){echo "active";} ?>">
								<a href="<?php echo site_url('Anggota') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Anggota
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if($menu == "guru"){echo "active";} ?>">
								<a href="<?php echo site_url('Guru') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Guru
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if($menu == "petugas"){echo "active";} ?>">
								<a href="<?php echo site_url('Petugas') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Petugas
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="<?php if($menu == "paket" || $menu == "lainnya"){echo "open";} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-upload"></i>
							<span class="menu-text">
								Peminjaman
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if($menu == "paket"){echo "active";} ?>">
								<a href="<?php echo site_url('Peminjaman/paket') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Buku Paket Pelajaran
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if($menu == "lainnya"){echo "active";} ?>">
								<a href="<?php echo site_url('Peminjaman') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Buku Lainnya
								</a>

								<b class="arrow"></b>
							</li>	
						</ul>
					</li>

					<li class="<?php if($menu == "ppaket" || $menu == "plainnya"){echo "open";} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-download"></i>
							<span class="menu-text">
								Pengembalian
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if($menu == "ppaket"){echo "active";} ?>">
								<a href="<?php echo site_url('Pengembalian/paket') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Buku Paket Pelajaran
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if($menu == "plainnya"){echo "active";} ?>">
								<a href="<?php echo site_url('Pengembalian') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Buku Lainnya
								</a>

								<b class="arrow"></b>
							</li>	
						</ul>
					</li>

					<li class="<?php if($menu == "histori"){echo "active";} ?>">
						<a href="<?php echo site_url('Peminjaman/histori') ?>">
							<i class="menu-icon fa fa-history"></i>
							<span class="menu-text"> Histori </span>
						</a>

						<b class="arrow"></b>
					</li>
				</ul><!-- /.nav-list -->
			</div>