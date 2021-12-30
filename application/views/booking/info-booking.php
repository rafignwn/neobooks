<div class="container" style="background: rgba(255, 255, 255, 0.5); backdrop-filter: blur(9px); padding: 20px;">
    <div style="width: 100%; overflow: auto; max-width: 600px;">
        <table>
            <tr>
                <td nowrap>
                    Terima Kasih <b><?= $nama_user ?></b>
                </td>
            </tr>
            <tr>
                <td>Buku yang anda pinjam adalah sebagai berikut: </td>
            </tr>
            <tr>
                <td>
                    <div class="table-responsive" >
                        <table class="table table-bordered table-striped table-hover" style="width: 100%;" id="table-datatable">
                            <tr>
                                <th>No.</th>
                                <th>Buku</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun</th>
                            </tr>
                            <?php 
                            $no = 1;
                            foreach ($items as $i) {
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td>
                                        <img src="<?= base_url('assets/img/upload/' . $i['image']); ?>" class="rounded" alt="No Picture" width="60px">
                                    </td>
                                    <td nowrap><?= $i['pengarang']; ?></td>
                                    <td nowrap><?= $i['penerbit']; ?></td>
                                    <td nowrap><?= $i['tahun_terbit']; ?></td>
                                </tr>
                            <?php $no++;
                            }
                            ?>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <hr>
    <a class="btn btn-sm btn-outline-danger" onclick="information('Waktu Pengambilan Buku 1x24 jam dari Booking!!!')" href="<?php echo base_url() . 'booking/exportToPdf/' . $this->session->userdata('id_user'); ?>"><span class="far fa-lg fa-fw fa-file-pdf"></span> Pdf</a>
</div>