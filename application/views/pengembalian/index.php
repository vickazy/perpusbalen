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
								<i class="ace-icon fa fa-download user-icon"></i>
								<a href="<?php echo site_url('pengembalian') ?>">Pengembalian</a>
							</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									<!--KONTEN-->
							
								<div class="row">
									<div class="col-sm-12">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">INFO PEMINJAMAN</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding col-sm-6">
													<form>
													<!-- <legend>Form</legend> -->
													<fieldset class="form-group">
														<label>ID Peminjaman</label> 
														<input class="form-control" type="text" name="id_peminjaman" id="id_peminjaman" readonly/>
														<input class="form-control" type="hidden" id="id_petugas" name="id_petugas"/>
														
														&nbsp;

														<label>Tanggal Peminjaman</label>
														<input class="form-control" type="text" name="tanggal_pinjam" id="tanggal_pinjam" readonly/>
													</fieldset>
													</form>
												</div>
												<div class="widget-main no-padding col-sm-6">
													<form>
													<!-- <legend>Form</legend> -->
													<fieldset class="form-group">
														<label>Tanggal Harus Kembali</label>
														<input class="form-control input-mask-dateku" type="text" name="tanggal_kembali" id="tanggal_kembali" readonly />
			                            				
			                            				&nbsp;

														<label>Tanggal Sekarang</label>
														<input class="form-control" type="text" name="tanggal_sekarang" id="tanggal_sekarang" value="<?php echo date('Y-m-d'); ?>" readonly />
													</fieldset>
													</form>
												</div>
											</div>
										</div>
									</div>
										
									<div class="col-sm-3">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">INFO PEMINJAM</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<!-- <legend>Form</legend> -->
													<form>
													<fieldset class="form-group">
							                            <select name="id_anggota" class="chosen-select form-control" id="id_anggota" data-placeholder="Pilih Anggota...">
							                            	<option value="">--Pilih Anggota--</option>
							                            	<?php foreach ($anggota as $row): ?>
							                            	<option value="<?php echo $row->nis.",".$row->id_peminjaman ?>"><?php echo $row->nis.' -- '.$row->nama.' ('.$row->id_peminjaman.')' ?></option>
							                            	<?php endforeach; ?>
							                            </select>
													</fieldset>
													</form>
												</div>
											</div>
										</div>

										<br>

										<input type="hidden" id="id_guru" value="">

									</div>

									<div class="col-sm-9">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">TRANSAKSI</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<fieldset class="form-group">
														<table class="table table-striped table-bordered" id='TabelPengembalian'>
															<thead>
																<th>#</th>
																<th>ID Buku</th>
																<th>Judul Buku</th>
																<th>Penerbit</th>
																<th>Pengarang</th>
																<th>Jumlah</th>
																<th></th>
															</thead>
															<tbody id="tampilkan">
																
															</tbody>
														</table>
													</fieldset>
												</div>

												<div class='alert alert-info TotalBayar'>
													<h2>Denda : <span id='Denda'>Rp. 0</span></h2>
													<input type="hidden" id='TotalDenda'>
												</div>

												<div class="form-horizontal" style="text-align: center;">
													<div class='row'>
														<div class="col-sm-4"></div>
														<div class='col-sm-4'>
															<button type='button' class='btn btn-primary btn-block' id='Simpann'>
																<i class='fa fa-check'></i> Kembali
															</button>
														</div>
														<div class="col-sm-4"></div>
														<div class="col-sm-12"><br></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--END KONTEN-->
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

<!--modal stok-->
<div id="modal-stok" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="ModalHeader">
                
            </div>

            <div class="modal-footer" id="ModalFooter">
                
            </div>
        </div>
    </div> 
</div>

<script>
	$(document).on('change', '#id_anggota', function(){
		var id = $(this).find(":selected").val();
		var tanggal_sekarang = encodeURI($('#tanggal_sekarang').val());
		var id_guru 		 = encodeURI($('#id_guru').val());

		$.ajax({
			url: "<?php echo site_url('Pengembalian/cari_kode'); ?>",
			type: "POST",
			cache: false,
			data: "id_anggota="+id+"&tanggal_sekarang="+tanggal_sekarang+"&id_guru="+id_guru,
			dataType:'json',
			success: function(data){
				if(data.status == 1)
				{
					$('#tampilkan').html(data.hasil);
					$('#id_peminjaman').val(data.id_peminjaman);
					$('#id_petugas').val(data.petugas);
					$('#tanggal_kembali').val(data.tanggal_kembali);
					$('#tanggal_pinjam').val(data.tanggal_pinjam);
					$('#Denda').html(to_rupiah(data.denda));
					$('#TotalDenda').val(data.denda);
				}
				if(data.status == 0)
				{
					$('.modal-dialog').removeClass('modal-lg');
					$('.modal-dialog').addClass('modal-sm');
					$('#ModalHeader').html(data.pesan);
					$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
					$('#modal-stok').modal('show');
				}
			}
		});
	});

	$(document).on('click', '#HapusBaris', function(e){
		e.preventDefault();
		$(this).parent().parent().remove();

		var Nomor = 1;
		$('#TabelPengembalian tbody tr').each(function(){
			$(this).find('td:nth-child(1)').html(Nomor);
			Nomor++;
		});
	});
	
	$(document).on('keyup', '#jumlah', function(){
		var Indexnya = $(this).parent().parent().index();
		var Harga = $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) input').val();
		var JumlahPinjam = $(this).val();
		var KodeBuku = $('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2) input').val();

		$.ajax({
			url: "<?php echo site_url('Buku/cek_jumlah'); ?>",
			type: "POST",
			cache: false,
			data: "kode_buku="+encodeURI(KodeBuku)+"&jumlah="+JumlahPinjam,
			dataType:'json',
			success: function(data){
				if(data.status == 1)
				{
					
				}
				if(data.status == 0)
				{
					$('.modal-dialog').removeClass('modal-lg');
					$('.modal-dialog').addClass('modal-sm');
					$('#ModalHeader').html(data.pesan);
					$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
					$('#modal-stok').modal('show');

					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) input').val('1');
				}
			}
		});
	});

	$(document).on('keyup', '#UangCash', function(){
		HitungTotalKembalian();
	});

	function HitungTotalKembalian()
	{
		var Cash = $('#UangCash').val();
		var TotalBayar = $('#TotalBayarHidden').val();

		if(parseInt(Cash) >= parseInt(TotalBayar)){
			var Selisih = parseInt(Cash) - parseInt(TotalBayar);
			$('#UangKembali').val(to_rupiah(Selisih));
			$('#UangKembalian').val(Selisih);
		} else {
			$('#UangKembali').val('');
			$('#UangKembalian').val('');
		}
	}

	function HitungTotalBayar()
	{
		var Total = 0;

		$('#TabelTransaksi tbody tr').each(function(){
			if($(this).find('td:nth-child(6) input').val() > 0)
			{
				var SubTotal = $(this).find('td:nth-child(6) input').val();
				Total = parseInt(Total) + parseInt(SubTotal);
			}
		});

		$('#TotalBayar').html(to_rupiah(Total));
		$('#TotalBayarHidden').val(Total);	


		$('#UangCash').val('');
		$('#UangKembali').val('');
	}

	$(document).on('click', '#Simpann', function(){
		$('.modal-dialog').removeClass('modal-lg');
		$('.modal-dialog').addClass('modal-sm');
		// $('#ModalHeader').html('Konfirmasi');
		$('#ModalHeader').html("Apakah anda yakin ingin menyimpan transaksi ini ?");
		$('#ModalFooter').html("<button type='button' class='btn btn-primary' id='SimpanTransaksi'>Ya</button><button type='button' class='btn btn-default' data-dismiss='modal'>Batal</button>");
		$('#modal-stok').modal('show');

		setTimeout(function(){ 
	   		$('button#SimpanTransaksi').focus();
	    }, 500);
	});

	$(document).on('click', 'button#SimpanTransaksi', function(){
		SimpanTransaksi();
	});

	function SimpanTransaksi()
	{
		var FormData = "id_peminjaman="+encodeURI($('#id_peminjaman').val());
		FormData += "&tanggal_sekarang="+encodeURI($('#tanggal_sekarang').val());
		FormData += "&id_anggota="+encodeURI($('#id_anggota').val());
		FormData += "&id_guru="+encodeURI($('#id_guru').val());
		FormData += "&denda="+encodeURI($('#TotalDenda').val());
		// FormData += "&jumlah="+encodeURI($('#jumlah').val());
		FormData += "&" + $('#TabelPengembalian tbody input').serialize();

		$.ajax({
			url: "<?php echo site_url('Pengembalian/proses'); ?>",
			type: "POST",
			cache: false,
			data: FormData,
			dataType:'json',
			success: function(data){
				if(data.status == 1){
					alert(data.pesan); 
					window.location.href="<?php echo site_url('Pengembalian'); ?>";
				}
				if(data.status == 0){
					$('.modal-dialog').removeClass('modal-lg');
					$('.modal-dialog').addClass('modal-sm');
					$('#ModalHeader').html(data.pesan);
					$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok</button>");
					$('#modal-stok').modal('show');
				}	
			}
		});
	}

	function to_rupiah(angka){
	    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
	    var rev2    = '';
	    for(var i = 0; i < rev.length; i++){
	        rev2  += rev[i];
	        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
	            rev2 += '.';
	        }
	    }
	    return 'Rp. ' + rev2.split('').reverse().join('');
	}
</script>

<?php $this->load->view('js_form'); ?>
<?php $this->load->view('footer'); ?>