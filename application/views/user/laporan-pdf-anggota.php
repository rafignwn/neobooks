<style type="text/css">
.table-data{ width: 100%;
    border-collapse: collapse;
}
.table-data tr th,
.table-data tr td{ 
    border:1px solid black; font-size: 11pt;
    font-family:Verdana; padding: 10px 10px 10px 10px;
}
h3{
    font-family:Verdana;
}
</style>
<h3><center>Laporan Data Anggota Perputakaan Online</center></h3>
<br/>
<br>
<br>
<table class="table-data">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>email</th>
        <th>Member sejak</th>
        <th>Tipe User</th>
        <th>status</th>
    </tr>
    <?php
    $no = 1; foreach($anggota as $a){
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
</table>>