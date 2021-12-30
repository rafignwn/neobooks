<style>
    .row {
        display: flex;
        justify-content: center;
        padding-bottom: 35px;
    }
    .cover-buku, .col-sm-7{
        background: rgba(255, 255, 255, 0.4);
        border-radius: 10px;
    }
    .col-sm-7 {
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(9px);
    }
    .thumbnail {
        overflow: auto;
    }
    .btn-box {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 5px 0 10px 0;
        width: 100%;
    }
    .cover-buku {
        min-width: 350px;
        min-height: 450px;
        max-width: 100%;
        max-height: 800px;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 15px 0;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(9px);
    }
    .cover-buku .content {
        width: 80%;
        min-height: 450px;
        height: 100%;
        max-height: 100%;
        text-align: center;
        padding: 5px;
    }
    .cover-buku .content h4 {
        margin-bottom: 30px;
    }
    .cover-buku .content img {
        max-width: 300px;
        max-height: 450px;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    @media (max-width: 900px) {
        .col-sm-5, .col-sm-7 {
            flex: 100%;
            max-width: 100%;
            margin-bottom: 15px;
        }
        .col-sm-5 {
            margin-bottom: 40px;
        }
        .cover-buku {
            padding: 0;
        }
        .thumbnail {
            padding: 0;
        }
    }
    @media (min-width: 600px) {
        .thumbnail {
            display: flex;
            justify-content: center;
        }
    }
    .table {
        margin-top: 1.5rem;
        max-width: 600px;
    }
    .table th, .table td, .table tr:first-child {
        border: none;
        padding: 0.5rem;
        white-space: nowrap;
    }
    .table tr {
        border-top: 1px solid rgba(0, 0, 0, 0.2);
        cursor: default;
    }
    .table tr td p .btn.btn-primary,
    .table tr td p .btn.btn-light {
        margin-right: 30px;
        margin-top: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="row">
    <div class="col-sm-5">
        <div class="cover-buku">
            <div class="content">
                <img src="<?php echo base_url(); ?>assets/img/upload/<?= $gambar; ?>">
            </div>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="thumbnail">
            <table class="table table-stripped">
                <tr>
                    <th>Judul</th>
                    <td>: <?= $judul; ?></td>
                </tr>
                <tr>
                    <th>Pengarang</th>
                    <td>: <?= $pengarang ?></td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>: <?= $kategori ?></td>
                </tr>
                <tr>
                    <th>Penerbit</th>
                    <td>: <?= $penerbit ?></td>
                </tr>
                <tr>
                    <th>Dipinjam</th>
                    <td>: <?= $dipinjam ?></td>
                </tr>
                <tr>
                    <th>Tahun Terbit</th>
                    <td>: <?= substr($tahun, 0, 4) ?></td>
                </tr>
                <tr>
                    <th>Dibooking</th>
                    <td>: <?= $dibooking ?></td>
                </tr>
                <tr>
                    <th>ISBN</th>
                    <td>: <?= $isbn ?></td>
                </tr>
                <tr>
                    <th>Tersedia</th>
                    <td>: <?= $stok ?></td>
                </tr>
            </table>
        </div>
        <div class="btn-box" style="margin-bottom: 15px;">
            <a style="margin-right: 20px;" class="btn btn-primary" href="<?= base_url('booking/tambahBooking/' . $id); ?>"><i class="fas fw fa-shopping-cart"></i> Booking</a>
            <span style="margin-left: 20px;" class="btn btn-light" onclick="window.history.go(-1)"><i class="fas fw fa-reply"></i> Kembali</span>
        </div>
    </div>
</div>