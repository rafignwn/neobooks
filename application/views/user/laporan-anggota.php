<!-- Begin page content -->
<style>
 tr td span.status-user {
    font-size: 0.9em;
    font-weight: 500;
    color: #fff;
    border-radius: 4px;
    display:inline-block;
    padding: 2px 6px; 
 }
 tr th:nth-child(6), 
 tr td:nth-child(6),
 tr th:nth-child(7), 
 tr td:nth-child(7) {
     text-align: center;
 }
</style>
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if(validation_errors()){?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors();?>
                </div>
            <?php }?>
            <?= $this->session->flashdata('pesan'); ?>
                <a href="<?= base_url('laporan/cetak_laporan_anggota'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
                <a href="<?= base_url('laporan/laporan_anggota_pdf'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>
                <a href="<?= base_url('laporan/export_excel_anggota'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Export ke Excel</a>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">email</th>
                            <th scope="col">Member sejak</th>
                            <th scope="col">Tipe User</th>
                            <th scope="col">status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach ($anggota as $a) { ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $a['nama']; ?></td>
                            <td><?= $a['alamat']; ?></td>
                            <td><?= $a['email']; ?></td>
                            <td><?= date('d F Y', $a['tanggal_input']); ?></td>
                            <td><?= $a['role_id'] == 1 ? 'Admin' : 'Member'; ?></td>
                            <td><?= $a['is_active'] == 1 ? '<span class="status-user" style="background:#1cc880;">Active</span>' : '<span class="status-user" style="background:#ff0000;">Tidak Active</span>'; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End -->