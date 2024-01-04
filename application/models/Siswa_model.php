<?php 
class Siswa_model extends CI_Model{

    public function user(){
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function siswa() {
        return $this->db->get_where('data_siswa', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function berkas() {
        return $this->db->get_where('berkas_siswa', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function bayar() {
        return $this->db->get_where('pembayaran', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function allData() {
        $email = $this->session->userdata('email');
        $this->db->select('*');
        $this->db->from('data_siswa');
        $this->db->join('berkas_siswa', 'berkas_siswa.no_pendaftaran = data_siswa.no_pendaftaran');
        $this->db->join('pembayaran', 'pembayaran.no_pendaftaran = data_siswa.no_pendaftaran');
        $this->db->where('data_siswa.email', $email);
        $query = $this->db->get()->row_array();
        return $query;

    }
    public function profil() {
        $email = $this->session->userdata('email');
        $this->db->select('*');
        $this->db->from('data_siswa');
        $this->db->join('berkas_siswa', 'berkas_siswa.no_pendaftaran = data_siswa.no_pendaftaran');
        $this->db->where('data_siswa.email', $email);
        $query = $this->db->get()->row_array();
        return $query;
        
        
    }

    public function daftar(){

        $data_siswa = $this->siswa();
        $ket = 'PPDB' . date('Y');
        $no_pendaftar = $ket . mt_rand(100,1000);

        $data = [
            'no_pendaftaran' => $no_pendaftar,
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'nisn' => htmlspecialchars($this->input->post('nisn', true)),
            'sekolah_asal' => htmlspecialchars($this->input->post('sekolah_asal', true)),
            'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
            'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
            'orang_tua' => htmlspecialchars($this->input->post('orang_tua', true)),
            'hp_ortu' => htmlspecialchars($this->input->post('hp_ortu', true)),
            'tanggal_pendaftaran' => time(),
            'status_pendaftaran' => 'Menunggu Diverifikasi',
        ];

        $data2 = [
            'no_pendaftaran' => $no_pendaftar,
            'ktp_ortu' => ' ',
            'kk' => ' ',
            'akte' => ' ',
            'pas_foto' => ' ',
            'ijazah' => ' ',
        ];
        if($data_siswa) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Pendaftaran gagal, anda sudah pernah melakukan penadftaran!
              </div>');
            redirect('siswa/upload');
        } else {
            $this->db->insert('data_siswa', $data);
        $this->db->insert('berkas_siswa', $data2);
        mkdir("./assets/img/".$no_pendaftar, 0700);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Pendaftaran berhasil, silahkan lengkapi berkas anda!
              </div>');
        redirect('siswa/upload');
        }

        

    }

    
}

?>