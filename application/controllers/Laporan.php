<?php
defined('BASEPATH') or exit('No Direct script access allowed');

class Laporan extends CI_Controller {
    function __construct() {
        parent:: __construct();
        $this->load->model(['ModelUser', 'ModelBuku', 'ModelPinjam']);
    }

    // Laporan anggota
    public function laporan_anggota() {
        $data['judul'] = 'Laporan Daftar Anggota';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->ModelUser->getAllUser();
        // var_dump($data['anggota']);die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/laporan-anggota', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_anggota() {
        $data['anggota'] = $this->ModelUser->getAllUser();
        $this->load->view('user/laporan-print-anggota', $data);
    }
    
    public function laporan_anggota_pdf() {
        $this->load->library('dompdf_gen');
        $data['anggota'] = $this->ModelUser->getAllUser();
        $this->load->view('user/laporan-pdf-anggota', $data);
        
        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();
        
        $this->dompdf->set_paper($paper_size, $orientation);
        
        //Convert to PDF
        
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan Daftar Anggota.pdf", array('Attachment' => 0));
        // nama file pdf yang di hasilkan
    }
    
    public function export_excel_anggota() {
        $data['title'] = 'laporan data anggota';
        $data['anggota'] = $this->ModelUser->getAllUser();
        $this->load->view('user/export-excel-anggota', $data);
    }
    // Akhir laporan anggota

    // Laporan Pinjam
    public function laporan_pinjam() {
        $data['judul'] = 'Laporan Data Peminjaman';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['laporan'] = $this->db->query("select * from pinjam p,detail_pinjam d,buku b,user u where d.id_buku=b.id and p.id_user=u.id and p.no_pinjam=d.no_pinjam")->result_array();
        // var_dump($data['laporan']);die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('pinjam/laporan-pinjam', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_pinjam() {
        $data['laporan'] = $this->db->query("select * from pinjam p,detail_pinjam d,buku b,user u where d.id_buku=b.id and p.id_user=u.id and p.no_pinjam=d.no_pinjam")->result_array();
        $this->load->view('pinjam/laporan-print-pinjam', $data);
    }

    public function laporan_pinjam_pdf() {
        {
            $this->load->library('dompdf_gen');
            $data['laporan'] = $this->db->query("select * from pinjam p,detail_pinjam d,buku b,user u where d.id_buku=b.id and p.id_user=u.id and p.no_pinjam=d.no_pinjam")->result_array();
            
            $this->load->view('pinjam/laporan-pdf-pinjam', $data);

            $paper_size = 'A4'; // ukuran kertas
            $orientation = 'landscape'; //tipe format kertas potrait atau landscape
            $html = $this->output->get_output();

            $this->dompdf->set_paper($paper_size, $orientation);

            //Convert to PDF
            
            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream("laporan data peminjaman.pdf", array('Attachment' => 0));
            // nama file pdf yang di hasilkan
        }
    }
    
    public function export_excel_pinjam() {
        $data = array( 'title' => 'Laporan Data Peminjaman Buku','laporan' => $this->db->query("select * from pinjam p,detail_pinjam d, buku b,user u where d.id_buku=b.id and p.id_user=u.id and p.no_pinjam=d.no_pinjam")->result_array());
        $this->load->view('pinjam/export-excel-pinjam', $data);
    }
    // Akhir laporan pinjam

    // Laporan buku
    public function laporan_buku() {
        $data['judul'] = 'Laporan Data Buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/laporan_buku', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_buku() {
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

        $this->load->view('buku/laporan_print_buku', $data);
    }

    public function laporan_buku_pdf() {
        $this->load->library('dompdf_gen');

        $data['buku'] = $this->ModelBuku->getBuku()->result_array();

        $this->load->view('buku/laporan_pdf_buku', $data);

        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_buku.pdf", array('Attachment' => 0));
    }

    public function export_excel() {
        $data = array(
            'title' => 'Laporan Buku',
            'buku' => $this->ModelBuku->getBuku()->result_array()
        );
        $this->load->view('buku/export_excel_buku', $data);
    }
    // Akhir laporan buku
}