<?= $this->session->flashdata('pesan'); ?>
<style>
    .thumbnail {
        text-align: center;
        padding-top: 10px;
        min-height: 400px;
        max-width: 320px;
        border-radius: 10px;
        box-shadow: 3px 5px 5px rgba(0, 0, 0, 0.2);
        transition: all 0.3s;
        margin-bottom: 20px;
        /* border-top: 3px solid var(--greencanyon); */
        border-bottom: 3px solid var(--greencanyon);
        /* border-right: 3px solid var(--white);
        border-bottom: 3px solid var(--white); */
        backdrop-filter: blur(9px);
        background: rgba(255, 255, 255, 0.3);
        cursor: pointer;
    }
    .thumbnail:hover {
        transform: translateY(-30px);
        box-shadow: 0 1px 3px var(--info), 0 15px 5px rgba(0, 0, 0, 0.3),0px 30px rgba(0, 0, 0, 0.07);
        /* border-right: 3px solid var(--info);
        border-bottom: 3px solid var(--info); */
    }
    .thumbnail .img-box {
        width: 225px;
        height: 300px;
        border-radius: 5px;
        overflow: hidden;
        margin: auto;
    }
    .thumbnail .img-box img {
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        object-fit: cover;
    }
    .thumbnail .caption {
        margin-top: 10px;
        color: #000;
        text-shadow: 0 1px 2px rgba(255, 255, 255, 0.9);
    }
    .thumbnail .caption h5 {
        padding: 0 15px 7px 15px;
        font-size: 1.1em;
        line-height: 1.4;
        height: 50px;
        width: 100%;
        /* border-bottom: 1px solid var(--white); */
        overflow: hidden;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        text-overflow: ellipsis;
    }
    .thumbnail:hover .caption h5 {
        border-color: var(--info);
    }
    .thumbnail .caption hr {
        background: var(--white);
        box-shadow: 0 0 2px var(--white);
        margin-top: 0 !important;
    }
    .thumbnail:hover .caption hr {
        background: var(--info);
        filter: blur(0.7px);
        box-shadow: 0 0 3px var(--info);
    }
    .thumbnail .button-box {
        display: flex;
        justify-content: space-around;
        margin: 10px;
        margin-left: 0;
        font-size: 0.9em;
        background: var(--greencanyon);
        padding: 7px 0;
        width: 100%;
        margin-bottom: 20px;
    }
    .thumbnail .button-box a {
        padding: 2px 8px; 
        font-weight: 500;
    }
    @media (max-width: 1020px) {
        .col-sm-3 {
            flex: 0 0 33.3333%;
            max-width: 33.3333%;
        }
    }
    @media  (max-width: 777px) {
        .col-sm-3 {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }
    @media (max-width: 570px) {
        .col-sm-3 {
            flex: 50%;
            max-width: 50%;
        }
        .thumbnail {
            margin: 0 calc((100% - 180px)/2);
            margin-bottom: 20px;
            min-height: 190px;
            max-width: 180px
        }
        .thumbnail .img-box {
            width: 130px;
            height: 160px;
        }
        .thumbnail .caption h5 {
            font-size: 0.9em;
            line-height: 1.1;
            height: 33px;
        }
        .thumbnail .button-box {
            margin-bottom: 10px;
            padding: 5px 0;
        }
        .button-box .btn {
            font-size: 0.8em;
        }
    }
</style>
<div>
    <div class="x_panel">
        <div class="x_content">
            <!-- Tampilkan semua produk -->
            <div class="row">
            <!-- looping products -->
                <?php foreach ($buku as $buku) { ?>
                    <div class="col-sm-3 mb-3">
                        <div class="thumbnail thumbnail-buku" data-link="<?= base_url('home/detailBuku/' . $buku->id); ?>">
                            <div class="img-box">
                                <img src="<?php echo base_url(); ?>assets/img/upload/<?= $buku->image; ?>">
                            </div>
                            <div class="caption">
                                <h5><?= $buku->judul_buku ?></h5>
                            </div>
                            <div class="button-box">
                                <?php
                                if ($buku->stok < 1) {
                                    echo "<i class='btn btn-outline-light'><i class='fas fw fa-shopping-cart'></i> Booking&nbsp:&nbsp 0</i>";
                                } else {
                                echo "<a class='btn btn-outline-light' href='" . base_url('booking/tambahBooking/' . $buku->id) . "'><i class='fas fw fa-shopping-cart'></i> Booking</a>";
                                }
                                ?>
                            <a class="btn btn-outline-warning" href="<?= base_url('home/detailBuku/' . $buku->id); ?>"><i class="fas fw fa-search"></i> Detail</a>
                            </div>
                        </div>
                    </div> 
                <?php } ?>
                <!-- End loop -->
            </div>
        </div>
    </div>
</div>
<script>
    let thumbnail_buku = document.querySelectorAll(".thumbnail-buku");

    for (let f = 0; f < thumbnail_buku.length; f++) {
        thumbnail_buku[f].addEventListener("click", function() {
            window.location.href = this.dataset.link;
            // console.log(this.dataset.link);
        });
    }
</script>