<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller { 
   
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata['role_id']){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Anda belum login!
              </div>');
            redirect('auth');
        } 
        $this->load->model('siswa_model');
    
        
    }


    public function index() {
        $data['user'] = $this->siswa_model->user();
        $data['siswa'] = $this->siswa_model->allData();
        $data['profil'] = $this->siswa_model->profil();
        $data['title'] = 'Informasi PPDB ONLINE';
        $this->load->view('templates/siswa_header', $data);
        $this->load->view('templates/siswa_sidebar');
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/siswa_footer');
    }
    public function profil() {
        $data['title'] = 'Halaman Profil';
        $data['user'] = $this->siswa_model->user();
        $data['siswa'] = $this->siswa_model->profil();
        $data['profil'] = $this->siswa_model->profil();
        $this->load->view('templates/siswa_header', $data);
        $this->load->view('templates/siswa_sidebar');
        $this->load->view('templates/siswa_topbar', $data);
        $this->load->view('siswa/profil', $data);
        $this->load->view('templates/siswa_footer');
    }

    public function daftar(){
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi!'
        ]);
        $this->form_validation->set_rules('nisn', 'Nisn', 'required|trim|numeric', [
            'required' => 'Nisn harus diisi!'
        ]);
        $this->form_validation->set_rules('sekolah_asal', 'Sekolah Asal', 'required|trim', [
            'required' => 'Sekolah Asal harus diisi!'
        ]);
        $this->form_validation->set_rules('no_hp', 'No_Hp', 'required|trim|numeric|max_length[13]', [
            'required' => 'Nomor HP harus diisi!',
            'numeric' => 'Format nomor handphone salah',
            'max_length' => 'Nomor handphone tidak boleh lebih dari 13 digit'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[data_siswa.email]', [
            'required' => 'Email harus diisi!',
            'valid_email' => 'Format email salah',
            'is_unique' => 'Pendaftaran Gagal, anda sudah pernah melakukan pendaftaran sebelumnya!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat harus diisi!'
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim', [
            'required' => 'Tempat Lahir harus diisi!'
        ]);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim', [
            'required' => 'Tanggal Lahir harus diisi!'
        ]);
        $this->form_validation->set_rules('orang_tua', 'Tanggal Lahir', 'required|trim', [
            'required' => 'Nama Orang Tua/Wali harus diisi!'
        ]);
        $this->form_validation->set_rules('hp_ortu', 'hp_ortu', 'required|trim|numeric|max_length[13]', [
            'required' => 'Nomor HP Orang Tua/Wali harus diisi!',
            'numeric' => 'Format nomor handphone salah',
            'max_length' => 'Nomor handphone tidak boleh lebih dari 13 digit'
        ]);
        // $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim', [
        //     'required' => 'Jurusan harus diisi!'
        // ]);

        if($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Pendaftaran Siswa';
            $data['user'] = $this->siswa_model->user();
            $data['profil'] = $this->siswa_model->profil();
            $this->load->view('templates/siswa_header', $data);
            $this->load->view('templates/siswa_sidebar');
            $this->load->view('templates/siswa_topbar', $data);
            $this->load->view('siswa/daftar', $data);
            $this->load->view('templates/siswa_footer');
        } else {
            $this->siswa_model->daftar();
        }

    }

    public function upload(){
      

            $data['title'] = 'Halaman Pendaftaran Siswa';
            $data['user'] = $this->siswa_model->user();
            $data['siswa'] = $this->siswa_model->siswa();
            $data['profil'] = $this->siswa_model->profil();
            $this->load->view('templates/siswa_header', $data);
            $this->load->view('templates/siswa_sidebar');
            $this->load->view('templates/siswa_topbar', $data);
            $this->load->view('siswa/upload', $data);
            $this->load->view('templates/siswa_footer');

    }

    public function uploadFile(){
        $siswa = $this->siswa_model->siswa(); 
        $upload_pas_foto = $_FILES['pas_foto']['name'];
        $upload_ktp_ortu = $_FILES['ktp_ortu']['name'];
        $upload_kk = $_FILES['kk']['name'];
        $upload_akte = $_FILES['akte']['name'];
        $upload_ijazah = $_FILES['ijazah']['name'];
        
        if($upload_pas_foto) {
            $config['allowed_types'] = 'jpg|png|pdf';
            $config['max_size'] = '2048';
            $config['encrypt_name'] = true;
            $config['upload_path'] = './assets/img/'.$siswa['no_pendaftaran'];

            $this->load->library('upload', $config);
           

            if($this->upload->do_upload('pas_foto')){
                $new_pas_foto = $this->upload->data('file_name');
                $this->db->set('pas_foto', $new_pas_foto);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    KTP Orang Tua gagal di upload!, pastikan ukaran file max 2mb dan jenis file JPG/PNG/PDF!
                    </div>');
                redirect('siswa/upload');
            }
        }

        if($upload_ktp_ortu) {
            $config['allowed_types'] = 'jpg|png|pdf';
            $config['max_size'] = '2048';
            $config['encrypt_name'] = true;
            $config['upload_path'] = './assets/img/'.$siswa['no_pendaftaran'];

            $this->load->library('upload', $config);
           

            if($this->upload->do_upload('ktp_ortu')){
                $new_ktp_ortu = $this->upload->data('file_name');
                $this->db->set('ktp_ortu', $new_ktp_ortu);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    KTP Orang Tua gagal di upload!, pastikan ukaran file max 2mb dan jenis file JPG/PNG/PDF!
                    </div>');
                redirect('siswa/upload');
            }

        }

        if($upload_kk) {
            $config['allowed_types'] = 'jpg|png|pdf';
            $config['max_size'] = '2048';
            $config['encrypt_name'] = true;
            $config['upload_path'] = './assets/img/'.$siswa['no_pendaftaran'];

            $this->load->library('upload', $config);
           

            if($this->upload->do_upload('kk')){
                $new_kk = $this->upload->data('file_name');
                $this->db->set('kk', $new_kk);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Kartu Keluarga gagal di upload!, pastikan ukaran file max 2mb dan jenis file JPG/PNG/PDF!
                    </div>');
                redirect('siswa/upload');
            }

        }
        if($upload_akte) {
            $config['allowed_types'] = 'jpg|png|pdf';
            $config['max_size'] = '2048';
            $config['encrypt_name'] = true;
            $config['upload_path'] = './assets/img/'.$siswa['no_pendaftaran'];

            $this->load->library('upload', $config);
           

            if($this->upload->do_upload('akte')){
                $new_akte = $this->upload->data('file_name');
                $this->db->set('akte', $new_akte);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Akte gagal di upload!, pastikan ukaran file max 2mb dan jenis file JPG/PNG/PDF!
                    </div>');
                redirect('siswa/upload');
            }

        }
        if($upload_ijazah) {
            $config['allowed_types'] = 'jpg|png|pdf';
            $config['max_size'] = '2048';
            $config['encrypt_name'] = true;
            $config['upload_path'] = './assets/img/'.$siswa['no_pendaftaran'];

            $this->load->library('upload', $config);
           

            if($this->upload->do_upload('ijazah')){
                $new_ijazah = $this->upload->data('file_name');
                $this->db->set('ijazah', $new_ijazah);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Ijazah/SKL gagal di upload!, pastikan ukaran file max 2mb dan jenis file JPG/PNG/PDF!
                    </div>');
                redirect('siswa/upload');
            }

        }
        $this->db->where('no_pendaftaran', $siswa['no_pendaftaran']);
        $this->db->update('berkas_siswa');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berkas berhasil di upload, silahkan lanjut ke pembayaran!
              </div>');
        redirect('siswa/bayar');
    }

    public function editFotoProfile(){
        $siswa = $this->siswa_model->siswa(); 
        $upload_pas_foto = $_FILES['pas_foto']['name'];
        
        if($upload_pas_foto) {
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';
            $config['encrypt_name'] = true;
            $config['upload_path'] = './assets/img/'.$siswa['no_pendaftaran'];


            $this->load->library('upload', $config);
           

            if($this->upload->do_upload('pas_foto')){
                $new_image = $this->upload->data('file_name');
                $this->db->set('pas_foto', $new_image);
                $this->db->where('no_pendaftaran', $siswa['no_pendaftaran']);
                $this->db->update('berkas_siswa');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Pas Foto gagal di upload!, pastikan ukaran file max 2mb dan jenis file JPG/PNG!
                    </div>');
                redirect('siswa/upload');
            }

        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Foto Profil Berhasil Di Edit
              </div>');
        redirect('siswa/profil');
    }

    public function bayar(){

            $data['title'] = 'Halaman Pembayaran';
            $data['user'] = $this->siswa_model->user();
            $data['profil'] = $this->siswa_model->profil();
            $this->load->view('templates/siswa_header', $data);
            $this->load->view('templates/siswa_sidebar');
            $this->load->view('templates/siswa_topbar', $data);
            $this->load->view('siswa/bayar', $data);
            $this->load->view('templates/siswa_footer');

    }

    public function konfirmasiPembayaran(){
        $siswa = $this->siswa_model->siswa(); 
        $upload_bukti_bayar = $_FILES['bukti_bayar']['name'];

        if($upload_bukti_bayar) {
            $config['allowed_types'] = 'jpg|png|pdf';
            $config['max_size'] = '2048';
            $config['encrypt_name'] = true;
            $config['upload_path'] = './assets/img/'.$siswa['no_pendaftaran'];

            $this->load->library('upload', $config);
           

            if($this->upload->do_upload('bukti_bayar')){
                $new_bukti_bayar = $this->upload->data('file_name');
                $data = [
                    'no_pendaftaran' => $siswa['no_pendaftaran'],
                    'tanggal_pembayaran' => time(),
                    'bukti_bayar' => $new_bukti_bayar,
                    'status_pembayaran' => 'Menunggu Verifikasi Pembayaran'

                ];
                $this->db->insert('pembayaran', $data);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Berkas gagal di upload!, pastikan ukaran file max 2mb dan jenis file JPG/PNG/PDF!
                    </div>');
                redirect('siswa/bayar');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Bukti Pembayaran Berhasil Di Upload
                  </div>');
            redirect('siswa/bayar');

        }
    }
}
