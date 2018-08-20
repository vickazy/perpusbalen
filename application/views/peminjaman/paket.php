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
								<i class="ace-icon fa fa-upload user-icon"></i>
								<a href="<?php echo site_url('peminjaman') ?>">Peminjaman</a>
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
												<div class="widget-main no-padding">
													<form>
													<!-- <legend>Form</legend> -->
													<fieldset class="form-inline">
														<label>ID Peminjaman</label> 
														<input class="form-control" type="text" name="id_peminjaman" id="id_peminjaman" value="<?php echo $id_p; ?>" readonly/>
														<?php 
															$userdata = $this->session->userdata('userdata');
															$id_petugas = $userdata['id_petugas'];
														?>
														<input class="form-control" type="hidden" id="id_petugas" name="id_petugas" value="<?php echo $id_petugas ?>"/>
														
														&nbsp;

														<label>Tanggal Peminjaman</label>
														<input class="form-control" type="text" name="tanggal_pinjam" id="tanggal_pinjam" value="<?php echo date('Y-m-d') ?>" readonly/>

														&nbsp;

														<label>Tanggal Kembali</label>
														<?php 
															$thn = date('Y');
															$blnhr = date('m-d');
															$t = $thn+1;
														?>
														<input class="form-control" type="text" name="tanggal_kembali" id="tanggal_kembali" value="<?php echo $t.'-'.$blnhr ?>" readonly/>
			                            				
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
							                            <select name="id_anggota" class="chosen-select form-control id_anggota" id="form-field-select-3" data-placeholder="Pilih Anggota...">
							                            	<option value="">--Pilih Anggota--</option>
							                            	<?php foreach ($anggota as $row): ?>
							                            	<option value="<?php echo $row->nis ?>"><?php echo $row->nis.' -- '.$row->nama ?></option>
							                            	<?php endforeach; ?>
							                            </select>
													</fieldset>
													</form>
												</div>
											</div>
										</div>

										<br>

										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">INFO GURU</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<!-- <legend>Form</legend> -->
													<form>
													<fieldset class="form-group">
							                            <select name="id_guru" class="chosen-select form-control id_guru" id="id_guru" data-placeholder="Pilih Guru..." required>
							                            	<option value="">--Pilih Guru--</option>
							                            	<?php foreach ($guru as $row): ?>
							                            	<option value="<?php echo $row->id_guru ?>"><?php echo $row->id_guru.' -- '.$row->nama_guru ?></option>
							                            	<?php endforeach; ?>
							                            </select>

													</fieldset>
													</form>
												</div>
											</div>
										</div>
									</div>

									<div class="col-sm-9">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">TRANSAKSI</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<fieldset class="form-group">
														<table class="table table-striped table-bordered" id='TabelTransaksi'>
															<thead>
																<th>#</th>
																<th>ID Buku</th>
																<th>Judul Buku</th>
																<th>Penerbit</th>
																<th>Pengarang</th>
																<th>Jumlah</th>
																<th></th>
															</thead>
															<tbody></tbody>
														</table>
														<div class="form-actions center">
															<a id='BarisBaru' class="btn btn-sm btn-primary" href="#">
																<i class='ace-icon fa fa-plus icon-on-right bigger-110'></i> Baris Baru
															</a>
														</div>
													</fieldset>
												</div>

												<div class="form-horizontal" style="text-align: center;">
													<div class='row'>
														<div class="col-sm-4"></div>
														<div class='col-sm-4'>
															<button type='button' class='btn btn-primary btn-block' id='Simpann'>
																<i class='fa fa-floppy-o'></i> Simpan
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
	$(document).ready(function(){

		for(B=1; B<=1; B++){
			BarisBaru();
		}

		$('#BarisBaru').click(function(){
			BarisBaru();
		});
		$("#TabelTransaksi tbody").find('input[type=text],textarea,select').filter(':visible:first').focus();

	});

	function BarisBaru()
	{
		var Nomor = $('#TabelTransaksi tbody tr').length + 1;
		var Baris = "<tr>";

			Baris += "<td>"+Nomor+"</td>";

			Baris += "<td>";
				Baris += "<input type='text' class='form-control' name='kode_buku[]' id='pencarian_kode' placeholder='Ketik Kode / Judul Buku'>";
				Baris += "<div id='hasil_pencarian'></div>";
			Baris += "</td>";

			Baris += "<td>";
				Baris += "<span></span>";
			Baris += "</td>";

			Baris += "<td>";
				Baris += "<span></span>";
			Baris += "</td>";

			Baris += "<td>";
				Baris += "<span></span>";
			Baris += "</td>";

			Baris += "<td width='50px'>";
			Baris += "<input type='text' class='form-control' id='jumlah' name='jumlah[]' onkeypress='return check_int(event)' readonly";
			Baris += "</td>";

			Baris += "<td><button class='btn btn-sm btn-default' id='HapusBaris'><i class='fa fa-times' style='color:red;'></i></button></td>";
			Baris += "</tr>";

		$('#TabelTransaksi tbody').append(Baris);

		$('#TabelTransaksi tbody tr').each(function(){
			$(this).find('td:nth-child(2) input').focus();
		});
	}

	$(document).on('click', '#HapusBaris', function(e){
		e.preventDefault();
		$(this).parent().parent().remove();

		var Nomor = 1;
		$('#TabelTransaksi tbody tr').each(function(){
			$(this).find('td:nth-child(1)').html(Nomor);
			Nomor++;
		});
	});

	function AutoCompleteGue(Lebar, KataKunci, Indexnya)
	{
		$('div#hasil_pencarian').hide();
		var Lebar = Lebar + 25;

		$.ajax({
			url: "<?php echo site_url('Peminjaman/ajax_kode_paket'); ?>",
			type: "POST",
			cache: false,
			data:'keyword=' + KataKunci,
			dataType:'json',
			success: function(json){
				if(json.status == 1)
				{
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2)').find('div#hasil_pencarian').css({ 'width' : Lebar+'px' });
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2)').find('div#hasil_pencarian').show('fast');
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2)').find('div#hasil_pencarian').html(json.datanya);
				}
				if(json.status == 0)
				{
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(3) span').html('');
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) input').val('');
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) span').html('');
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) input').prop('disabled', true).val('');
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) input').val(0);
					$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) span').html('');
				}
			}
		});
	}
	
	$(document).on('keyup', '#pencarian_kode', function(e){
		if($(this).val() !== '')
		{
			var charCode = e.which || e.keyCode;
			if(charCode == 40)
			{
				if($('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').length > 0)
				{
					var Selanjutnya = $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').next();
					$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').removeClass('autocomplete_active');

					Selanjutnya.addClass('autocomplete_active');
				}
				else
				{
					$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li:first').addClass('autocomplete_active');
				}
			} 
			else if(charCode == 38)
			{
				if($('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').length > 0)
				{
					var Sebelumnya = $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').prev();
					$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li.autocomplete_active').removeClass('autocomplete_active');
				
					Sebelumnya.addClass('autocomplete_active');
				}
				else
				{
					$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian li:first').addClass('autocomplete_active');
				}
			}
			else if(charCode == 13)
			{
				var Field = $('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)');
				var Kodenya = Field.find('div#hasil_pencarian li.autocomplete_active span#kodenya').html();
				var Bukunya = Field.find('div#hasil_pencarian li.autocomplete_active span#bukunya').html();
				var Penerbit = Field.find('div#hasil_pencarian li.autocomplete_active span#penerbit').html();
				var Pengarang = Field.find('div#hasil_pencarian li.autocomplete_active span#pengarang').html();
				
				Field.find('div#hasil_pencarian').hide();
				Field.find('input').val(Kodenya);

				$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(3)').html(Bukunya);
				$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(4)').html(Penerbit);
				$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(5)').html(Pengarang);
				$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(6) input').removeAttr('disabled').val(1);
				
				var IndexIni = $(this).parent().parent().index() + 1;
				var TotalIndex = $('#TabelTransaksi tbody tr').length;
				if(IndexIni == TotalIndex){
					BarisBaru();

					$('html, body').animate({ scrollTop: $(document).height() }, 0);
				}
				else {
					$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(5) input').focus();
				}
			}
			else 
			{
				AutoCompleteGue($(this).width(), $(this).val(), $(this).parent().parent().index());
			}
		}
		else
		{
			$('#TabelTransaksi tbody tr:eq('+$(this).parent().parent().index()+') td:nth-child(2)').find('div#hasil_pencarian').hide();
		}
	});


	$(document).on('click', '#daftar-autocomplete li', function(){
		$(this).parent().parent().parent().find('input').val($(this).find('span#kodenya').html());
		
		var Indexnya = $(this).parent().parent().parent().parent().index();
		var Buku = $(this).find('span#bukunya').html();
		var Penerbit = $(this).find('span#penerbit').html();
		var Pengarang = $(this).find('span#pengarang').html();

		$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(2)').find('div#hasil_pencarian').hide();
		$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(3) span').html(Buku);
		$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(4) span').html(Penerbit);
		$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) span').html(Pengarang);
		$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(6) input').removeAttr('disabled').val(1);

		var IndexIni = Indexnya + 1;
		var TotalIndex = $('#TabelTransaksi tbody tr').length;
		if(IndexIni == TotalIndex){
			BarisBaru();
			$('html, body').animate({ scrollTop: $(document).height() }, 0);
		}
		else {
			$('#TabelTransaksi tbody tr:eq('+Indexnya+') td:nth-child(5) input').focus();
		}
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
		FormData += "&tanggal_pinjam="+encodeURI($('#tanggal_pinjam').val());
		FormData += "&tanggal_kembali="+encodeURI($('#tanggal_kembali').val());
		FormData += "&id_anggota="+$('.id_anggota').val();
		FormData += "&id_petugas="+$('#id_petugas').val();
		FormData += "&id_guru="+$('#id_guru').val();
		FormData += "&id_gurup="+$('#id_guru').val();
		FormData += "&" + $('#TabelTransaksi tbody input').serialize();

		$.ajax({
			url: "<?php echo site_url('Peminjaman/tambah_proses'); ?>",
			type: "POST",
			cache: false,
			data: FormData,
			dataType:'json',
			success: function(data){
				if(data.status == 1){
					alert(data.pesan); 
					window.location.href="<?php echo site_url('Peminjaman/paket'); ?>";
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