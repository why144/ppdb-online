<?php

use JetBrains\PhpStorm\NoReturn;

class Admin_model extends CI_Model{ 


    public function getAllSiswa() {
        return $this->db->get('data_siswa')->result_array();
    }
    public function getAllPembayaran(){
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->join('data_siswa', 'data_siswa.no_pendaftaran = pembayaran.no_pendaftaran');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function berkasByNoPendaftaran($no_pendaftaran){
        return $this->db->get_where('berkas_siswa', ['no_pendaftaran' => $no_pendaftaran])->row_array();
    }

    public function pembayaranByNoPendaftaran($no_pendaftaran) {
        return $this->db->get_where('pembayaran', ['no_pendaftaran' => $no_pendaftaran])->row_array();
    }

    public function getAllBerkas() {
        $this->db->select('*');
        $this->db->from('berkas_siswa');
        $this->db->join('data_siswa', 'data_siswa.no_pendaftaran = berkas_siswa.no_pendaftaran');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getDataSiswaById($no_pendaftaran){
        return $this->db->get_where('data_siswa', ['no_pendaftaran' => $no_pendaftaran])->row_array();
    }
    public function verifikasiPembayaran($id_pembayaran){
        $this->db->set('status_pembayaran', 'Lunas');
        $this->db->where('id_pembayaran', $id_pembayaran);
        $this->db->update('pembayaran');

        $data_pembayaran = $this->db->get_where('pembayaran', ['id_pembayaran' => $id_pembayaran])->row_array();
        $no_pendaftaran = $data_pembayaran['no_pendaftaran'];
        $data = $this->db->get_where('data_siswa', ['no_pendaftaran' => $no_pendaftaran])->row_array();

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'ppdbsmkexcellent1@gmail.com',
            'smtp_pass' => 'zzokwulwwttvxdnp',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('ppdbsmkexcellent1@gmail.com', 'Admin PPDB Online');
        $this->email->to($data['email']);
        $this->email->subject('Pembayaran Berhasil Diterima');
        $this->email->message('Yth.'. $data['nama'].'<br><br> Pembayaran anda sebesar Rp.150.000 berhasil diproses <br> <br> Salam hangat, <br> Admin PPDB SMK Excellent 1 Kota Tangerang');
        
        if($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
    public function tolakPembayaran($id_pembayaran){
        $this->db->set('status_pembayaran', 'Ditolak');
        $this->db->where('id_pembayaran', $id_pembayaran);
        $this->db->update('pembayaran');

        $data_pembayaran = $this->db->get_where('pembayaran', ['id_pembayaran' => $id_pembayaran])->row_array();
        $no_pendaftaran = $data_pembayaran['no_pendaftaran'];
        $data = $this->db->get_where('data_siswa', ['no_pendaftaran' => $no_pendaftaran])->row_array();

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'ppdbsmkexcellent1@gmail.com',
            'smtp_pass' => 'zzokwulwwttvxdnp',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('ppdbsmkexcellent1@gmail.com', 'Admin PPDB Online');
        $this->email->to($data['email']);
        $this->email->subject('Pembayaran Gagal Diproses!');
        $this->email->message('Yth.'. $data['nama'].'<br><br> Pembayaran anda sebesar Rp.150.000 gagal diproses! silahkan hubungi tim PPDB melalui Whatsapp atau lakukan pembayaran ulang <br> <br> Salam hangat, <br> Admin PPDB SMK Excellent 1 Kota Tangerang');
        
        if($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function getAllSiswaDiterima(){
        // return $this->db->get_where('status_pendaftaran', 'Berhasil Diverfikasi' && 'status_pembayaran', 'Lunas')->result_array();
        $this->db->where('status_pendaftaran', 'Diterima');
        return $this->db->get('data_siswa')->result_array();

    }

    public function getAllUser(){
        $this->db->where('role_id', 2);
        return $this->db->get('user')->result_array();
    }

    public function siswaDiTerima($id){
        $this->db->set('status_pendaftaran', 'Di Terima');
        $this->db->where('id', $id);
        $this->db->update('data_siswa');
    }

    public function hapusUserById($id){
        $this->db->delete('user', ['id' => $id]);
    }

    public function siswaTerverifikasi() {
            $this->db->where('status_pendaftaran', 'Diverifikasi');
            $this->db->or_where('status_pendaftaran', 'Diterima');
            $query = $this->db->get('data_siswa');
            if($query->num_rows()>0){
                return $query->num_rows();
            } else {
                return 0;
            }
    }
    public function menungguVerifikasi() {
            $this->db->where('status_pendaftaran', 'Menunggu Diverifikasi');
            $query = $this->db->get('data_siswa');
            if($query->num_rows()>0){
                return $query->num_rows();
            } else {
                return 0;
            }
    }
    public function pembayaranLunas() {
            $this->db->where('status_pembayaran', 'Lunas');
            $query = $this->db->get('pembayaran');
            if($query->num_rows()>0){
                return $query->num_rows();
            } else {
                return 0;
            }
    }
    public function pembayaranMenungguVerifikasi() {
            $this->db->where('status_pembayaran', 'Menunggu Verifikasi Pembayaran');
            $query = $this->db->get('pembayaran');
            if($query->num_rows()>0){
                return $query->num_rows();
            } else {
                return 0;
            }
    }
    public function jumSiswaDiterima() {
            $this->db->where('status_pendaftaran', 'Diterima');
            $query = $this->db->get('data_siswa');
            if($query->num_rows()>0){
                return $query->num_rows();
            } else {
                return 0;
            }
    }
    public function userTerdaftar() {
           $this->db->select('*');
           $this->db->from('user');
           $this->db->join('data_siswa', 'data_siswa.email = user.email');
           $query = $this->db->get();
           if($query->num_rows() > 0) {
            return $query->num_rows();
           } else {
            return 0;
           }
    }
    public function userBelumTerdaftar() {
            $userTerdaftar = $this->userTerdaftar();
            $user = $this->db->get('user')->num_rows();
            $userBelumTerdaftar = $user - $userTerdaftar;
            return $userBelumTerdaftar;
    }

    public function gantiPassword(){
        $user = $this->db->get_where('user', ['role_id' => 1])->row_array();
        $passSekarang = $this->input->post('passSekarang');
        $passbaru = $this->input->post('passBaru1');
        if(!password_verify($passSekarang, $user['password'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Password Sekarang Salah!
            </div>');
            redirect('admin/gantiPassword');
        } else {
            if($passSekarang == $passbaru){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password Baru Tidak Boleh Sama Dengan Password Sekarang!
                </div>');
                redirect('admin/gantiPassword');
            } else {
                $password_hash = password_hash($passbaru, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
                $this->db->where('role_id', 1);
                $this->db->update('user');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Password Berhasil Diganti!
                </div>');
                redirect('admin/gantiPassword');
            }
        }
    }

    public function verifikasiSiswa($no_pendaftaran){
        $this->db->set('status_pendaftaran', 'Diverifikasi');
        $this->db->where('no_pendaftaran', $no_pendaftaran);
        $this->db->update('data_siswa');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Status Siswa Berhasil Diverifikasi
                </div>');
        redirect('admin/dataSiswa');
    }

    public function terimaSiswa($no_pendaftaran){
        $this->db->set('status_pendaftaran', 'Diterima');
        $this->db->where('no_pendaftaran', $no_pendaftaran);
        $this->db->update('data_siswa');
        $data = $this->db->get_where('data_siswa', ['no_pendaftaran' => $no_pendaftaran])->row_array();

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'ppdbsmkexcellent1@gmail.com',
            'smtp_pass' => 'zzokwulwwttvxdnp',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('ppdbsmkexcellent1@gmail.com', 'Admin PPDB Online');
        $this->email->to($data['email']);
        $this->email->subject('Pengumuman Hasil PPDB Online SMK Excellent 1 Kota Tangerang');
        $this->email->message('Yth.'. $data['nama'].'<br><br> Selamat Anda Telah Diterima Di SMK Excellent 1 Kota Tangerang <br> <br> No Pendaftaran : '.$data['no_pendaftaran'].'<br> Nama : '.$data['nama'].'<br> Jurusan : '.$data['jurusan'].'<br> Status Pendaftaran : '.$data['status_pendaftaran'].' <br> <br>Harap menunggu informasi selanjutnya mengenai jadwal MPLS dari admin PPDB. <br><br> Salam hangat, <br> Admin PPDB SMK Excellent 1 Kota Tangerang');
        
        if($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
       
    }

    public function tolakSiswa($no_pendaftaran){
        $this->db->set('status_pendaftaran', 'Ditolak');
        $this->db->where('no_pendaftaran', $no_pendaftaran);
        $this->db->update('data_siswa');
        $data = $this->db->get_where('data_siswa', ['no_pendaftaran' => $no_pendaftaran])->row_array();

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'ppdbsmkexcellent1@gmail.com',
            'smtp_pass' => 'zzokwulwwttvxdnp',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('ppdbsmkexcellent1@gmail.com', 'Admin PPDB Online');
        $this->email->to($data['email']);
        $this->email->subject('Pengumuman Hasil PPDB Online SMK Excellent 1 Kota Tangerang');
        $this->email->message('Yth.'. $data['nama'].'<br><br> Maaf Pendaftaran Anda Ditolak<br> <br> No Pendaftaran : '.$data['no_pendaftaran'].'<br> Nama : '.$data['nama'].'<br> Jurusan : '.$data['jurusan'].'<br> Status Pendaftaran : '.$data['status_pendaftaran'].' <br><br> Salam hangat, <br> Admin PPDB SMK Excellent 1 Kota Tangerang');
        
        if($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
        
    }
    
    public function checkKembali($no_pendaftaran) {
        $this->db->set('status_pendaftaran', 'Menunggu Diverifikasi');
        $this->db->where('no_pendaftaran', $no_pendaftaran);
        $this->db->update('data_siswa');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Status Siswa Berhasil Dikembalikan Untuk Diverifikasi
                </div>');
        redirect('admin/siswaDiterima');
    }


}