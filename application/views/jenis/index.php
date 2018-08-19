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
								<i class="ace-icon fa fa-user home-icon"></i>
								<a href="<?php echo site_url('Jenis') ?>">Jenis Buku</a>
							</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->


                  <div class="table-header">
                  LIST JENIS BUKU
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
                        Tambah Jenis
                      </a>
                      <br>
                      <div class="pull-right tableTools-container"></div>
                  </div>
                  <div id="table-responsive">
                      <table id="jenis" class="table table-striped table-bordered table-hover" width="100%">
                          <thead>
                              <tr>
                                  <th width="10px">No</th>
                                  <th>Jenis Buku</th>
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
        <form action="<?php echo site_url('Jenis/tambah') ?>" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger">Tambah Jenis</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">

                        <div class="form-group">
                            <label>Jenis Buku</label>
                            <div>
                                 <input class="form-control" type="text" name="jenis_buku" placeholder="Jenis" required>
                                <?php echo form_error('jenis_buku') ?>
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
    var table = $('#jenis').DataTable({

      "processing":true,
      "serverSide":true,
      "lengthMenu":[[5,10,25,50,100,-1],[5,10,25,50,100,"All"]],
      "ajax":{
        url : "<?php echo site_url('Jenis/data_server') ?>",
        type : "POST"
      },

      "columnDefs":
      [
        {
          "targets":0,
          "data":"id_jenis",
          "searchable": false,
        },
        {
          "targets":1,
          "data":"jenis_buku"
        },
        {
          "targets":2,
          "data": null,
          "searchable": false,
          "render":function(data,tipe,full,meta){
            return '<a href="<?php echo site_url("Jenis/edit/") ?>'+data["id_jenis"]+'" class="btn btn-success btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>&nbsp; <form action="<?=site_url('Jenis/hapus')?>" method="POST" style="display: inline;" accept-charset="utf-8"><input type="text" name="id_Jenis" value='+data["id_jenis"]+' hidden ><button class="btn btn-danger btn-rounded btn-sm" type="submit" onclick="clicked(event)"><span class="fa fa-trash"></span></button></form>'
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