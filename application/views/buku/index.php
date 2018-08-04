<?php $this->load->view('header'); ?>
<?php $this->load->view('js_form'); ?>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
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
								<img class="nav-user-photo" src="<?php echo base_url() ?>assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									Jason
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="#">
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

		<div class="main-container ace-save-state" id="main-container">

			<?php $this->load->view('sidebar_menu'); ?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo site_url('') ?>">AppusBa</a>
							</li>
							<li class="active">Buku</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->


                  <div class="table-header">
                  LIST BUKU
                  </div>
                  <div class="clearfix">
                      <br>
                      <?php 
                          if($this->session->flashdata('sukses_tambah') != "") {
                              echo '<div class="alert alert-success alert-dismissable">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <strong>Sukses</strong> Data Berhasil Disimpan
                                    </div>';
                          }
                      ?>
                      <?php 
                          if($this->session->flashdata('sukses_edit') != "") {
                              echo '<div class="alert alert-success alert-dismissable">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <strong>Sukses</strong> Data Berhasil Diedit
                                    </div>';
                          }
                      ?>
                      <?php 
                          if($this->session->flashdata('sukses_hapus') != "") {
                              echo '<div class="alert alert-success alert-dismissable">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <strong>Sukses</strong> Data Berhasil Dihapus
                                    </div>';
                          }
                      ?>
                      <?php 
                          if($this->session->flashdata('gagal_hapus') != "") {
                              echo '<div class="alert alert-danger alert-dismissable">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <strong>Gagal</strong> Data Gagal Dihapus
                                    </div>';
                          }
                      ?>
                      <br>
                      <a class="btn btn-primary btn-sm" href="#modal-form" role="button" class="blue" data-toggle="modal">
                        <i class="ace-icon fa fa-plus align-top bigger-125"></i>
                        Tambah Barang
                      </a>
                      <a class="btn btn-success btn-sm" href="#modal-import" role="button" class="blue" data-toggle="modal">
                        <i class="ace-icon fa fa-plus align-top bigger-125"></i>
                        Import Excel
                      </a>
                      <br>
                      <div class="pull-right tableTools-container"></div>
                  </div>
                  <div id="table-responsive">
                      <table id="buku" class="table table-striped table-bordered table-hover" width="100%">
                          <thead>
                              <tr>
                                  <th width="10px">No</th>
                                  <th>Judul</th>
                                  <th>Tanggal</th>
                                  <th>No. Inventaris</th>
                                  <th>Jumlah Stok</th>
                                  <th width="60px">Aksi</th>
                              </tr>
                          </thead>

                          <tbody>
                                
                          </tbody>
                      </table>
                  </div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

<!--modal-->
<div id="modal-form" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <form action="<?php echo site_url('Buku/tambah') ?>" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger">Tambah Buku</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>Judul</label>
                            <div>
                                 <input class="form-control" type="text" name="judul" placeholder="Judul Buku" required>
                                <?php echo form_error('judul') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <div>
                                <input class="form-control input-mask-date" type="text" id="form-field-mask-1" name="tanggal" required>
                                <?php echo form_error('tanggal') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Penerbit</label>
                            <div>
                                <input class="form-control" type="text" name="penerbit" placeholder="Stok Barang" required>
                                <?php echo form_error('penerbit') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <a class="btn btn-sm" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                        Batal
                </a>

                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="ace-icon fa fa-check"></i>
                        Simpan
                </button>
            </div>
        </div>
        </form>
    </div> 
</div>

<!--modal-->
<div id="modal-import" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <form action="<?php echo site_url('Buku/import') ?>" enctype="multipart/form-data" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger">Import Buku</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>Import Data</label>
                            <div>
                                <input class="form-control" type="file" name="filenya"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Jenis Buku</label>
                            <div>
                                <select name="" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                  <option value="">--Pilih Jenis--</option>
                                  <option value=""></option>
                                  <option value=""></option>
                                  <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <a class="btn btn-sm" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                        Batal
                </a>

                <button class="btn btn-sm btn-primary" type="submit">
                    <i class="ace-icon fa fa-check"></i>
                        Simpan
                </button>
            </div>
        </div>
        </form>
    </div> 
</div>

<script type='text/javascript' src='<?php echo base_url();?>assets/jquery.autocomplete/bootstrap3-typeahead.js'></script>

<script type="text/javascript">
  $(document).ready(function(){
    var dataSrc = [];
    var table = $('#buku').DataTable({

      "processing":true,
      "serverSide":true,
      "lengthMenu":[[5,10,25,50,100,-1],[5,10,25,50,100,"All"]],
      "ajax":{
        url : "<?php echo site_url('Buku/data_server') ?>",
        type : "POST"
      },

      "columnDefs":
      [
        {
          "targets":0,
          "data":"kode_buku",
          "searchable": false,
        },
        {
          "targets":1,
          "data":"judul"
        },
        {
          "targets":2,
          "data":"tanggal"
        },
        {
          "targets":3,
          "data":"no_inventaris"
        },
        {
          "targets":4,
          "data":"jumlah",
          "searchable": false,
        },
        {
          "targets":5,
          "data": null,
          "searchable": false,
          "render":function(data,tipe,full,meta){
            return '<a href="<?php echo site_url("buku/edit/") ?>'+data["kode_buku"]+'" class="btn btn-success btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>&nbsp;<form action="<?=site_url('buku/hapus/')?>" method="POST" style="display: inline;" accept-charset="utf-8"><input type="text" name="kode_buku" value='+data["kode_buku"]+' hidden ><button class="btn btn-danger btn-rounded btn-sm" type="submit" onclick="clicked(event)"><span class="fa fa-trash"></span></button></form>'
          }
        }
      ],

      'initComplete': function(){
             var api = this.api();

             // Populate a dataset for autocomplete functionality
             // using data from first, second and third columns
             api.cells('tr', [0, 1, 2]).every(function(){
                var data = this.data();
                if(dataSrc.indexOf(data) === -1){ dataSrc.push(data); }
             });
            
             // Initialize Typeahead plug-in
             $('.dataTables_filter input[type="search"]', api.table().container())
                .typeahead({
                   source: dataSrc,
                   afterSelect: function(value){
                      api.search(value).draw();
                   }
                }
             );
          }


    });
  });
</script>

<script>
    function clicked(e)
    {
        if(!confirm('Anda Yakin?'))e.preventDefault();
    }
</script>

<?php $this->load->view('footer'); ?>