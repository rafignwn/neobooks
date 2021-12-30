<?php 

class Member extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(['ModelBuku', 'ModelUser', 'ModelBooking']);
    }

    public function index() {
        $this->__login();
    }

    private function __login() {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);
        $pw_md5 = md5($password);

        $user = $this->ModelUser->cekData(['email' => $email])->row_array();
        // $pw = password_hash($pw_md5, PASSWORD_DEFAULT);
        // var_dump($pw);die();

        // kondisi jika usernya ada
        if ($user) {
            // Jika user sudah aktif
            if ($user['is_active'] == 1) {
                // cek password 
                
                
                if ($pw_md5 == $user['password']) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id_user' => $user['id'],
                        'nama' => $user['nama']
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat Datang ' . $user['nama'] . '</div>');
                    redirect('home');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert- message" role="alert">Password salah!!</div>');
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User belum diaktifasi!!</div>');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>');
            redirect('home');
        }
    }

    public function daftar() {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [ 'required' => 'Nama Belum diis!!']);
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required', [ 'required' => 'Alamat Belum diis!!']);
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[user.ema il]', ['valid_email' => 'Email Tidak Benar!!', 'required' => 'Email Belum diisi!!', 'is_unique' => 'Email Sudah Terdaftar!']);
    
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password 2]', ['matches' => 'Password Tidak Sama!!', 'min_length' => 'Password Terlalu Pendek']);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
        $email = $this->input->post('email', true);
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)), 
            'alamat' => $this->input->post('alamat', true),
            'email' => htmlspecialchars($email), 
            'image' => 'default.jpg',
            'password' => md5($this->input->post('password1')), 
            'role_id' => 2,
            'is_active' => 1, 
            'tanggal_input' => time()
        ];
        $this->ModelUser->simpanData($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun anggota anda sudah dibuat.</div>'); 
        redirect(base_url());
    }

    public function myProfil() {
        $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        
        foreach ($user as $a) {
            $data = [
                'user' => $user, 
                'image' => $user['image'], 
                'nama' => $user['nama'],
                'email' => $user['email'],
                'tanggal_input' => $user['tanggal_input'],
            ];
        }
        $data['title'] = 'Profil Saya';
        
        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('member/index', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer', $data);
    }

    public function ubahProfil() {
        $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        
        foreach ($user as $a) {
            $data = [
                'user' => $user,
                'image' => $user['image'], 
                'nama' => $user['nama'],
                'email' => $user['email'],
                'tanggal_input' => $user['tanggal_input']
            ];
        }
        $data['title'] = 'Ubah Profil';
        
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', ['required' => 'Nama tidak boleh kosong']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('member/ubah-anggota', $data);
            $this->load->view('templates/templates-user/modal');
            $this->load->view('templates/templates-user/footer', $data);
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);

            //jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '3000';
                $config['max_width'] = '1024';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['user']['image'];

                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                } else {

                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
            redirect('member/myprofil');
        }
    }

    public function logout() {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
        redirect('home');
    }
}