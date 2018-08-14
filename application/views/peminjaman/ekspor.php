<?php 
$tgl = date('Y-m-d--h-i-s');
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=OutputKir".$tgl.".xls");
?>
<title>LAPORAN PEMINJAMAN BUKU</title>
<style>
td {
   vertical-align: middle;
}
th {
   vertical-align: middle;
}
</style>
<!-- <table border="0" style="font-size:15px;border:none;font-family:Arial;"> -->
  <tr>
    <td colspan="9"><center style="font-size:16px;"><strong>LAPORAN PEMINJAMAN BUKU</strong></center></td>
  </tr> 
<!--</table>-->
<br>
<table border="1" style="font-size:13px;border:100px;font-family:Arial;">
    <thead>
    <tr>
        <th width="30" style="background-color:grey;">No</th>
        <th><center>ID Peminjaman</center></th>
        <th><center>Nama Peminjam</center></th>
        <th><center>Nama Petugas</center></th>
        <th><center>Tanggal Pinjam</center></th>
        <th><center>Tanggal Harus Kembali</center></th>
        <th><center>Tanggal Kembali</center></th>
        <th><center>Buku yang dipinjam</center></th>
        <th><center>Denda</center></th>
        <th><center>Status</center></th>
    </tr>
    </thead>
    <tbody>
      <?php $no=0; foreach($all as $row): $no++;?>
      <tr>
        <?php $j = $this->M_peminjaman->get_histori($row->id_peminjaman)->num_rows(); ?>
        <td ><center><?php echo $no; ?></center></td>
        <td ><?php echo $row->id_peminjaman; ?></td>
        <td ><?php echo $row->nama; ?></td>
        <td ><?php echo $row->nama_petugas; ?></td>
        <td ><?php echo $row->tanggal_pinjam; ?></td>
        <td ><?php echo $row->tanggal_kembali; ?></td>
        <td ><?php echo $row->kembali_tanggal; ?></td>
        <td >
          <ol>
            <?php $h = $this->M_peminjaman->get_histori($row->id_peminjaman)->result(); ?>
            <?php foreach ($h as $key) {
              echo "<li>".$key->judul."</li>";
            } ?>
          </ol>
        </td>
        <td >
          <?php 
            $rupiah = number_format($row->denda ,2, '.' , ',' );
            echo "Rp. ".$rupiah; 
          ?>
        </td>
        <td >
          <?php 
                if ($row->ts == 'K') {
                  echo "Sudah Kembali";
                } else {
                  echo "Belum Kembali";
                }
            ?>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>

