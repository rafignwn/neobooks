<?php

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['ModelBuku', 'ModelUser', 'ModelBooking']);
    }
    
    public function index() {
        $data = [
            'title' => "Katalog Buku",
            'buku' => $this->ModelBuku->getBuku()->result()
        ];
        $email_exist = $this->session->userdata('email');
        // jika sudah login dan jika belum login
        if ($email_exist) {
            $user = $this->ModelUser->cekData(['email' => $email_exist])->row_array();
            $data['user'] = $user;
            if ($user == null) {
                $this->session->unset_userdata('email');
                $this->session->unset_userdata('role_id');
                $data['user'] = 'Pengunjung';
            }
        } else {
            $data['user'] = 'Pengunjung';
        }
        // $data['user'] = 'Pengunjung';
        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('buku/daftarbuku', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer');
    }

    // View Detail Buku 
    function detailBuku() {
        $id = $this->uri->segment(3);
        $kategori = $this->ModelBuku->joinKategoriBuku(['buku.id' => $id])->result();
        $buku = $this->ModelBuku->bukuWhere(['id' => $id])->result();
        // var_dump($buku);die();

        $data['title'] = "Detail Buku";

        // cek login 
        if(!empty($this->session->userdata("email"))){
            $data['user'] = $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        } else {
            $data['user'] = "Pengunjung";
        }

        // Mengambil kategori buku
        foreach ($kategori as $fields) {
            $data['kategori'] = $fields->kategori;
        }

        // Mengambil detail data buku
        foreach ($buku as $fields) {
            $data['judul'] = $fields->judul_buku;
            $data['pengarang'] = $fields->pengarang;
            $data['penerbit'] = $fields->penerbit;
            $data['tahun'] = $fields->tahun_terbit;
            $data['isbn'] = $fields->isbn;
            $data['gambar'] = $fields->image;
            $data['dipinjam'] = $fields->dipinjam;
            $data['dibooking'] = $fields->dibooking;
            $data['stok'] = $fields->stok;
            $data['id'] = $id;
        }
        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('buku/detail-buku', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer');
    }

    public function kategori() {
        $kategori = $this->uri->segment(3);
        $id_kategori = $this->db->get_where('kategori', ['kategori' => $kategori])->row_array()['id'];
        $data['buku'] = $this->ModelBuku->bukuWhere(['id_kategori' => $id_kategori])->result();
        $data['title'] = 'Buku '. $kategori;
        // var_dump($data['buku']);die();

        // jika sudah login dan jika belum login
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user;
        } else {
            $data['user'] = 'Pengunjung';
        }

        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('buku/daftarbuku', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer');
    }

    public function cari_buku() {
        $keyword = $this->input->post('keyword', true);
        $cari_buku = $this->ModelBuku->cariBuku($keyword);
        $data = [
            'title' => 'Hasil Pencarian : "' . $keyword . '"',
            'buku' => $cari_buku->result()
        ];
        // var_dump($data['buku']);die();
        // jika sudah login dan jika belum login
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user;
        } else {
            $data['user'] = 'Pengunjung';
        }

        if ($cari_buku->num_rows() > 0) {
            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('buku/daftarbuku', $data);
            $this->load->view('templates/templates-user/modal');
            $this->load->view('templates/templates-user/footer');
        } else {
            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('buku/not_found');
            $this->load->view('templates/templates-user/modal');
            $this->load->view('templates/templates-user/footer');
        }
    }
}

?>