<?php
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span> Edit Barang</h3>
<a class="btn" href="barang_laku.php"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>

<?php
// Pastikan variabel koneksi sudah didefinisikan dan terkoneksi ke database sebelumnya
$id_brg = $_GET['id'];

// Pastikan variabel koneksi sudah didefinisikan sebelumnya
$det = mysqli_query($koneksi, "select * from barang_laku where id='$id_brg'") or die(mysqli_error($koneksi));
while ($d = mysqli_fetch_array($det)) {
?>
	<form action="update_laku.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>

			<tr>
				<td>Tanggal</td>
				<td><input name="tgl" type="text" class="form-control datepicker" id="tgl" autocomplete="off" value="<?php echo $d['tanggal'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>
					<select class="form-control" name="nama">
						<?php
						$brg = mysqli_query($koneksi, "select * from barang");
						while ($b = mysqli_fetch_array($brg)) {
						?>
							<option <?php if ($d['nama'] == $b['nama']) {
										echo "selected";
									} ?> value="<?php echo $b['nama']; ?>"><?php echo $b['nama'] ?></option>
						<?php
						}
						?>
					</select>
				</td>
			</tr>

			<tr>
				<td>Harga</td>
				<td><input type="text" class="form-control" name="harga" value="<?php echo $d['harga'] ?>"></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td><input type="text" class="form-control" name="jumlah" value="<?php echo $d['jumlah'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.datepicker').datepicker({
			dateFormat: 'yy-mm-dd' // Ubah format tanggal sesuai kebutuhan Anda
		});
	});
</script>
<?php
include 'footer.php';
?>