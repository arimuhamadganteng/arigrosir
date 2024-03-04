<?php
include "config.php";

//persiapan untuk excel
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition:attachment; filename=Transaksi.xls");
header("Pragma: no-cache");
header("Expires:0");
?>
<table border="1">
    <thead>
        <tr>
            <th colspan="6">Data Barang Terjual

            </th>
        </tr>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total Harga</th>
            <th>Laba</th>
        </tr>
    </thead>
    <tbody>
        <?php

        if ($_GET['tanggal']) {
            $tangg = $_GET['tanggal'];
            $tampil = mysqli_query($koneksi, "SELECT * FROM barang_laku WHERE tanggal='$tangg'");
        } else {
            $tampil = mysqli_query($koneksi, "SELECT * FROM barang_laku order by tanggal asc");
        }

        $no = 1;

        while ($data = mysqli_fetch_array($tampil)) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['tanggal'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['jumlah'] ?></td>
                <td><?= $data['harga'] ?></td>
                <td><?= $data['total_harga'] ?></td>
                <td><?= $data['laba'] ?></td>
            </tr>
        <?php } ?>
    </tbody>

</table>