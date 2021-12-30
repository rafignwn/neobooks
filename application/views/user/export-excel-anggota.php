<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<h3><center>Laporan Data Anggota Perpustakaan Online</center></h3>
<br>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>email</th>
            <th>Member sejak</th>
            <th>Tipe User</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($anggota as $a) {
        ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $a['nama']; ?></td>
                <td><?= $a['alamat']; ?></td>
                <td><?= $a['email']; ?></td>
                <td><?= date('d F Y', $a['tanggal_input']); ?></td>
                <td><?= $a['role_id'] == 1 ? 'Admin' : 'Member'; ?></td>
                <td><?= $a['is_active'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>