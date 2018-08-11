			<div id="sidebar" class="sidebar responsive ace-save-state">

				<ul class="nav nav-list">
					<li class="<?php if($menu == "home"){echo "active";} ?>">
						<a href="<?php echo site_url() ?>">
							<i class="menu-icon fa fa-home"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="<?php if($menu == "buku" || $menu == "anggota" || $menu == "guru" || $menu == "petugas"){echo "open";} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Master Data
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

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

					<li class="<?php if($menu == "pengembalian" || $menu == "peminjaman"){echo "open";} ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Transaksi
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="<?php if($menu == "peminjaman"){echo "active";} ?>">
								<a href="<?php echo site_url('Peminjaman') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Peminjaman
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php if($menu == "pengembalian"){echo "active";} ?>">
								<a href="<?php echo site_url('Pengembalian') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Pengembalian
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>