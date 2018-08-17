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
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="space-6"></div>

									<div class="col-sm-12 infobox-container">
										<div class="infobox infobox-green infobox-dark">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-book"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">
													<?php echo $buku ?>
												</span>
												<div class="infobox-content"><b>Buku</b></div>
											</div>
										</div>

										<div class="infobox infobox-blue infobox-dark">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-users"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">
													<?php echo $anggota ?>
												</span>
												<div class="infobox-content"><b>Siswa</b></div>
											</div>
										</div>

										<div class="infobox infobox-pink infobox-dark">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-download"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">
													<?php echo $transaksi ?>
												</span>
												<div class="infobox-content"><b>Transaksi</b></div>
											</div>
										</div>

									</div>
								</div>

								<!-- <script src="https://code.highcharts.com/highcharts.js"></script>
								<script src="https://code.highcharts.com/modules/series-label.js"></script>
								<script src="https://code.highcharts.com/modules/exporting.js"></script>
								<script src="https://code.highcharts.com/modules/export-data.js"></script> -->

								<script src="<?php echo base_url() ?>assets/highcharts.js"></script>
								<script src="<?php echo base_url() ?>assets/modules/series-label.js"></script>
								<script src="<?php echo base_url() ?>assets/modules/exporting.js"></script>
								<script src="<?php echo base_url() ?>assets/modules/export-data.js"></script>

								<div class="row">
									<br>
									<div id="container" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
		  							<br/>

									<div class="vspace-12-sm"></div>

								</div><!-- /.row -->

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->



<script>
	Highcharts.chart('container', {
	    chart: {
	        type: 'line'
	    },
	    title: {
	        text: 'Peminjaman Per Bulan'
	    },
	    subtitle: {
	        text: 'Perpustakaan MTs Negeri Balen'
	    },
	    xAxis: {
	        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
	    },
	    yAxis: {
	        title: {
	            text: 'Jumlah Peminjaman'
	        }
	    },
	    plotOptions: {
	        line: {
	            dataLabels: {
	                enabled: true
	            },
	            enableMouseTracking: true
	        }
	    },
	    series: 
	    [
        	<?php foreach ($jenis as $key): ?>
	    	{
		        name: '<?php echo $key->jenis_buku ?>',
		        data: 
		        
		        [
		        	<?php 
		        		for ($i = 1; $i <= 12; $i++) {
        					$fr = $this->M_peminjaman->get_buku_per_bln($key->id_jenis, $i)->row_array();
        					echo $fr['jum'].", ";	
		        		}
		        	?>

		        ]
		    }, 
		    <?php endforeach; ?>
		]
	});
</script>

<?php $this->load->view('footer'); ?>