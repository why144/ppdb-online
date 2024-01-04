<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller { 

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata['role_id']){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Anda belum login!
              </div>');
            redirect('auth');
        }
        if($this->session->userdata['role_id'] == 2){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Anda tidak memiliki akses kehalaman ini!
              </div>');
            redirect('auth');
        }

        $this->load->model('admin_model');

        
    }

    public function index(){
        // $data['user'] = $this->siswa_model->user();
        
        $data['title'] = 'Dashboard Admin PPDB Online';
        $data['siswaTerverifikasi'] = $this->admin_model->siswaTerverifikasi();
        $data['menungguVerifikasi'] = $this->admin_model->menungguVerifikasi();
        $data['pembayaranLunas'] = $this->admin_model->pembayaranLunas();
        $data['pembayaranMenungguVerifikasi'] = $this->admin_model->pembayaranMenungguVerifikasi();
        $data['jumSiswaDiterima'] = $this->admin_model->jumSiswaDiterima();
        $data['userTerdaftar'] = $this->admin_model->userTerdaftar();
        $data['userBelumTerdaftar'] = $this->admin_model->userBelumTerdaftar();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function dataSiswa(){
        $data['title'] = 'Halaman Verifikasi Data Siswa';
        $data['data_siswa'] = $this->admin_model->getAllSiswa();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/data_siswa', $data);
        $this->load->view('templates/admin_footer');
    }

    public function detailSiswa($no_pendaftaran){
        $data['title'] = 'Halaman Detail Data Siswa';
        $data['data_siswa'] = $this->admin_model->getDataSiswaById($no_pendaftaran);
        $data['berkas'] = $this->admin_model->berkasByNoPendaftaran($no_pendaftaran);
        $data['pembayaran'] = $this->admin_model->pembayaranByNoPendaftaran($no_pendaftaran);
        // $data['user'] = $this->admin_model->userByEmail($email);
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/detail_siswa', $data);
        $this->load->view('templates/admin_footer');
    }

    public function verifikasiSiswa($no_pendaftaran){
        $this->admin_model->verifikasiSiswa($no_pendaftaran);
       
    }

    public function terimaSiswa($no_pendaftaran) {
        $this->admin_model->terimaSiswa($no_pendaftaran);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Status Siswa Berhasil Diterima
        </div>');
        redirect('admin/dataSiswa');
    }

    public function tolakSiswa($no_pendaftaran) {
        $this->admin_model->tolakSiswa($no_pendaftaran);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Status Siswa Berhasil Ditolak
                </div>');
        redirect('admin/dataSiswa');
    }

    public function checkKembali($no_pendaftaran) {
        $this->admin_model->checkKembali($no_pendaftaran);
    }

    public function pembayaran(){
        $data['title'] = 'Halaman Verifikasi Pembayaran';
        $data['pembayaran'] = $this->admin_model->getAllPembayaran();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/pembayaran', $data);
        $this->load->view('templates/admin_footer');
    }

    public function verifikasiPembayaran($id_pembayaran){
        $this->admin_model->verifikasiPembayaran($id_pembayaran);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Pembayaran Berhasil Diverifikasi
          </div>');
        redirect('admin/pembayaran');
    }

    public function tolakPembayaran($id_pembayaran) {
        $this->admin_model->tolakPembayaran($id_pembayaran);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Pembayaran Berhasil Ditolak
          </div>');
        redirect('admin/pembayaran');
    }

    

    public function siswaDiTerima(){
        $data['title'] = 'Daftar Siswa Yang Telah Diterima';
        $data['data_siswa'] = $this->admin_model->getAllSiswaDiterima();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/siswa_diterima', $data);
        $this->load->view('templates/admin_footer');
    }

    public function getEdit(){
        // echo json_encode($this->Admin_model->getDataSiswaById($_POST['id']));
        echo json_encode($this->admin_model->getDataSiswaById($_POST['id']));

    }

    public function berkas(){
        $data['title'] = 'Data Berkas Siswa';
        $data['berkas'] = $this->admin_model->getAllBerkas();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/berkas', $data);
        $this->load->view('templates/admin_footer');
    }

    public function user() {
        $data['title'] = 'Manajemen User';
        $data['users'] = $this->admin_model->getAllUser();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/user',$data);
        $this->load->view('templates/admin_footer');
    }

    public function hapusUser($id) {
        $this->admin_model->hapusUserById($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        User Berhasil Dihapus
          </div>');
        redirect('admin/user');
    }

    public function gantiPassword(){
        $data['title'] = 'Form Ganti Password';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/ganti_password', $data);
        $this->load->view('templates/admin_footer');
    }

    public function editPassword(){
        $this->form_validation->set_rules('passSekarang', 'PassSekarang', 'required|trim', [
            'required' => 'Password sekarang harus diisi!'
        ]);
        $this->form_validation->set_rules('passBaru1', 'PassBaru1', 'required|trim|min_length[5]|matches[passbaru2]', [
            'required' => 'Password baru harus diisi!',
            'min_length' => 'Password baru harus minimal 6 karakter',
            'matches' => 'Konfirmasi password tidak sama!'
        ]);
        $this->form_validation->set_rules('passbaru2', 'Passbaru2', 'required|trim|matches[passBaru1]', [
            'required' => 'Konfirmasi password harus diisi!'
        ]);
        if($this->form_validation->run() == false) {
            $data['title'] = 'Form Ganti Password';
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar');
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('admin/ganti_password', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $this->admin_model->gantiPassword();
        }
    }


   
}
