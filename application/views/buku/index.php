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
                        Tambah Buku
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
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <label>Judul</label>
                            <div>
                                 <input class="form-control" type="text" name="judul" placeholder="Judul Buku" required>
                                <?php echo form_error('judul') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Jenis Buku</label>
                            <div>
                                <select name="id_jenis" class="form-control" >
                                  <option value="">--Pilih Jenis--</option>
                                  <?php foreach ($jenis as $key) : ?>
                                  <option value="<?php echo $key->id_jenis ?>"><?php echo $key->jenis_buku ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <div>
                                <input class="form-control input-mask-date" type="text" id="form-field-mask-1" name="tanggal" placeholder="tgl/bln/thn" required>
                                <?php echo form_error('tanggal') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Penerbit</label>
                            <div>
                                <input class="form-control" type="text" name="penerbit" placeholder="Penerbit" required>
                                <?php echo form_error('penerbit') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Bahasa</label>
                            <div>
                                <input class="form-control" type="text" name="bahasa" placeholder="Bahasa" required>
                                <?php echo form_error('bahasa') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Jumlah</label>
                            <div>
                                <input class="form-control" type="text" name="jumlah" placeholder="Jumlah" required>
                                <?php echo form_error('jumlah') ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>No. Inventaris</label>
                            <div>
                                <input class="form-control" type="text" name="no_inventaris" placeholder="No Inventaris" required>
                                <?php echo form_error('no_inventaris') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Pengarang</label>
                            <div>
                                <input class="form-control" type="text" name="pengarang" placeholder="Pengarang" required>
                                <?php echo form_error('pengarang') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Asal Buku</label>
                            <div>
                                <input class="form-control" type="text" name="asal" placeholder="Asal" required>
                                <?php echo form_error('asal') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <div>
                                <input class="form-control" type="text" name="harga" placeholder="Harga" required>
                                <?php echo form_error('harga') ?>
                            </div>
                        </div>


                    </div>

                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <div>
                                <textarea class="form-control" name="keterangan" id="" cols="10" rows="5"></textarea>
                                <?php echo form_error('keterangan') ?>
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
                                <select name="id_jenis" class="form-control">
                                  <option value="">--Pilih Jenis--</option>
                                  <?php foreach ($jenis as $key) : ?>
                                  <option value="<?php echo $key->id_jenis ?>"><?php echo $key->jenis_buku ?></option>
                                  <?php endforeach; ?>
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
             api.cells('tr', [0, 1, 2, 3, 4]).every(function(){
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

<?php $this->load->view('js_form'); ?>
<?php $this->load->view('footer'); ?>