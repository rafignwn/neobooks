<style>
    .row {
        background: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(9px);
        padding: 10px;
    }
    .data-booking {
        max-width: 100%;
        overflow: auto;
    }
    .data-booking .table tr td {
        white-space: nowrap;
    }
    .data-booking .table tr td:nth-child(3) {
        min-width: 300px;
        white-space: normal;
    }
    .table tr td:nth-child(6),
    .table tr td:nth-child(7),
    .table tr th:nth-child(6),
    .table tr th:nth-child(7) {
        text-align: center;
    }
    .data-booking .table tr td .img-box {
        max-width: 60px;
        max-height: 70px;
        overflow: hidden;
    }
    .data-booking .table tr td .img-box img {
        width: 60px;
        height: 70px;
    }
    .btn-box a.btn {
        margin: 10px;
        padding: 4px 8px;
        font-weight: 700;
        font-size: 0.91em;
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="data-booking">
            <table class="table table-bordered table-striped table-hover" id="table-datatable">
                <tr>
                    <th>No.</th>
                    <th>Buku</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    $no = 1;
                    foreach ($temp as $t) {
                ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td>
                            <div class="img-box">
                                <img src="<?= base_url('assets/img/upload/' . $t['image']); ?>" alt="No Picture">
                            </div>
                        </td>
                        <td><?= $t['judul_buku']; ?></td>
                        <td><?= $t['penulis']; ?></td>
                        <td><?= $t['penerbit']; ?></td>
                        <td><?= substr($t['tahun_terbit'], 0,4); ?></td>
                        <td>
                            <a href="<?= base_url('booking/hapusbooking/' . $t['id_buku']); ?>" class="delete-booking"><i class="btn btn-sm btn-danger fas fw fa-trash"></i></a>
                        </td>
                    </tr>
                <?php 
                $no++;
                } ?>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="btn-box">
            <hr>
            <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>"><span class="fas fw fa-play"></span> Lanjutkan Booking Buku</a>
            <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'booking/bookingSelesai/' . $this->session->userdata('id_user'); ?>"><span class="fas fw fa-stop"></span> Selesaikan Booking</a>
        </div>
    </div>
</div>