<?php $this->load->view('header'); ?>
<?php $this->load->model('M_peminjaman'); ?>

  <body class="no-skin">
    <?php $this->load->view('profil'); ?>

    <div class="main-container ace-save-state" id="main-container">

      <?php $this->load->view('sidebar_menu'); ?>

      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-upload home-icon"></i>
                <a href="<?php echo site_url('Peminjaman/histori') ?>">Histori</a>
              </li>
            </ul><!-- /.breadcrumb -->
          </div>

          <div class="page-content">

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->


                  <div class="table-header">
                  LIST TRANSAKSI
                  </div>
                  <div class="clearfix">
                      <br>
                      <a class="btn btn-success btn-sm" href="<?php echo site_url('Peminjaman/ekspor') ?>" onclick="return confirm('Apakah Anda Akan Mengekpor Laporan?');">
                        <i class="ace-icon fa fa-plus align-top bigger-125"></i>
                        Ekspor Excel
                      </a>
                      <br>
                      <div class="pull-right tableTools-container"></div>
                  </div>
                  <div id="table-responsive">
                      <table id="transaksi" class="table table-striped table-bordered table-hover" width="100%">
                          <thead>
                              <tr>
                                  <th width="10px">ID. Peminjaman</th>
                                  <th>Tanggal Peminjaman</th>
                                  <th>Nama Peminjam</th>
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

<?php foreach ($peminjaman as $row) { ?>
<div id="modal-form<?php echo $row->id_peminjaman ?>" class="modal" tabindex="-1">
    <div class="modal-dialog">        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger">Detail Histori Peminjaman</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <table class="table table-striped tablstronge-bordered" width="100%">
                                    <tr>
                                      <td>NIS</td>
                                      <td>:</td>
                                      <td><?php echo $row->nis ?></td>
                                    </tr>

                                    <tr>
                                      <td>Nama Peminjam</td>
                                      <td>:</td>
                                      <td><?php echo $row->nama ?></td>
                                    </tr>

                                    <tr>
                                      <td>Tanggal Pinjam</td>
                                      <td>:</td>
                                      <td><?php echo $row->tanggal_pinjam ?></td>
                                    </tr>

                                    <tr>
                                      <td>Tanggal Harus Kembali</td>
                                      <td>:</td>
                                      <td><?php echo $row->tanggal_kembali ?></td>
                                    </tr>

                                    <tr>
                                      <td>Tanggal Kembali</td>
                                      <td>:</td>
                                      <td><?php echo $row->kembali_tanggal ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div id="table-responsive">
                            <table id="penjualan" class="table table-striped tablstronge-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Buku</th>
                                        <th>Judul Buku</th>
                                        <th>Penerbit</th>
                                        <th>Pengarang</th>
                                        <th>Jumlah Pinjam</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $histori = $this->M_peminjaman->get_histori($row->id_peminjaman)->result(); ?>
                                    <?php $no=0; foreach ($histori as $key): $no++ ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $key->kode_buku ?></td>
                                        <td><?php echo $key->judul ?></td>
                                        <td><?php echo $key->penerbit ?></td>
                                        <td><?php echo $key->pengarang ?></td>
                                        <td><?php echo $key->jumlah ?></td>
                                        <td>
                                          <?php if ($key->status == 'K') {
                                            echo "Kembali";
                                          }else{
                                            echo "Dipinjam";
                                          } ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                      <th colspan="4"></th>
                                      <th>Denda</th>
                                      <th><?php echo rupiah($row->denda) ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>

            <div class="modal-footer">
                <button class="btn btn-sm" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                        Close
                </button>
            </div>
        </div>
    </div> 
</div>
<?php } ?>

<!--modal-->
<div id="modal-ekspor" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <form action="<?php echo site_url('Peminjaman/import') ?>" enctype="multipart/form-data" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger">Ekspor Laporan</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>Import Data</label>
                            <div>
                                <select name="" class="form-control">
                                  <option value="">Semua</option>
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
    var table = $('#transaksi').DataTable({

      "processing":true,
      "serverSide":true,
      "lengthMenu":[[5,10,25,50,100,-1],[5,10,25,50,100,"All"]],
      "ajax":{
        url : "<?php echo site_url('Peminjaman/data_server') ?>",
        type : "POST"
      },

      "columnDefs":
      [
        {
          "targets":0,
          "data":"id_peminjaman"
        },
        {
          "targets":1,
          "data":"tanggal_pinjam"
        },
        {
          "targets":2,
          "data":"nama"
        },
        {
          "targets":3,
          "data": null,
          "searchable": false,
          "render":function(data,tipe,full,meta){
            return '<a href="#modal-form'+data["id_peminjaman"]+'" role="button" data-toggle="modal" class="btn btn-warning btn-rounded btn-sm"><span class="fa fa-search"></span></a>'
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
<?php 
  function rupiah($angka) {
      $rupiah = number_format($angka ,2, ',' , '.' );
      return "Rp. ".$rupiah;
  }
?>