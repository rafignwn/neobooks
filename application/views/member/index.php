<style>
    .card.user {
        min-width: 100%;
        background: rgba(255, 255, 255, 0.5); 
        backdrop-filter: blur(9px);
        margin-bottom: 20px;
    }
    @media (min-width: 750px) {
        .card.user {
            width: 700px;
        }
    }
</style>

<div class="container-fluid" style="display: flex; justify-content: center;">
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
        <div class="col-lg-12">
            <div class="card mb3 user">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $image; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $nama; ?></h5>
                            <p class="card-text"><?= $email; ?></p>
                            <p class="card-text"><small class="text-muted">Jadi member sejak: <br><b><?= date('d F Y', $tanggal_input); ?></b></small></p>
                        </div>
                        <div class="btn btn-info ml-3 my-3">
                            <a href="<?= base_url('member/ubahprofil'); ?>" style="text-decoration: none;" class="text text-white"><i class="fas fa-user-edit"></i> Ubah Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->