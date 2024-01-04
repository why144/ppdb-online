<?php

use function PHPSTORM_META\type;

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        $this->load->model('Siswa_model');
        
    }
    public function index() {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email harus diisi!',
            'valid_email' => 'Format email salah',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password harus diisi!'
        ]);
        if($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }
    public function coba(){
        $this->load->view('auth/coba');
    }

    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        // jika usernya ada
        if($user) {
            // cek apakan user sudah teraktifasi
            if($user['is_active'] == 1) {
                // cek password
                if(password_verify($password, $user['password'])){
                    // jika password benar
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 1){
                        redirect('admin');
                    } else {
                        redirect('siswa');
                    }

                } else {
                    // jika password salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password salah!
                    </div>');
                    redirect('auth');
                }
                
            } else {
                // jika user belum teraktifasi
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email belum teraktifasi!
                </div>');
                redirect('auth');
            }

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email belum terdaftar!
              </div>');
            redirect('auth');
        }
        
    }


    public function registration(){

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email harus diisi!',
            'valid_email' => 'Format email salah',
            'is_unique' => 'Email telah digunakan'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'required' => 'Password harus diisi!',
            'min_length' => 'Password harus minimal 5 karakter',
            'matches' => 'Konfirmasi password salah',
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password]', [
            'required' => 'Password harus diisi!',
            'matches' => 'Konfirmasi password salah',
        ]);



        if ($this->form_validation->run() == false) {
            
            $data['title'] = 'Halaman Registrasi PPDB ONLINE';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'is_active' => 0,
                'role_id' => 2,
            ];
    
           

            // siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time(),
            ];
            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verifikasi');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Registrasi berhasil, silahkan periksa email anda untuk aktifasi akun!
                  </div>');
            redirect('auth');
            
        }

    }

    private function _sendEmail($token, $type){
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
        $this->email->to($this->input->post('email'));
       
        if($type == 'verifikasi'){
            $this->email->subject('Verifikasi Akun PPDB Online');
            $this->email->message('Klik link berikut untuk verifikasi akun anda! : <a href="' . base_url() .'auth/verifikasi?email='. $this->input->post('email'). '&token=' . urlencode($token).'">Verifikasi</a>');
        }
        if($type == 'lupa'){
            $this->email->subject('Reset Password Akun PPDB Online');
            $this->email->message('Klik link berikut untuk resest password anda! : <a href="' . base_url() .'auth/resetPassword?email='. $this->input->post('email'). '&token=' . urlencode($token).'">Reset Password</a>');
        }

        if($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verifikasi(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if($user){
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if($user_token) {
                $this->db->set('is_active', 1);
                $this->db->where('email', $email);
                $this->db->update('user');

                $this->db->delete('user_token', ['email' => $email]);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Verifikasi akun berhasil, silahkan login!
                  </div>');
                redirect('auth');  

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Verifikasi akun gagal! token salah!
                  </div>');
                redirect('auth');  
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Verifikasi akun gagal! email salah!
                  </div>');
            redirect('auth');
        }
    }

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Anda telah logout!
          </div>');
        redirect('auth');

    }

    public function lupaPassword(){
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email harus diisi!',
            'valid_email' => 'Format email salah',
        ]);
        if($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Reset Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/lupa_password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if($user) {
                 // siapkan token
                    $token = base64_encode(random_bytes(32));
                    $user_token = [
                        'email' => $email,
                        'token' => $token,
                        'date_created' => time(),
                    ];

                    $this->db->insert('user_token', $user_token);
                    $this->_sendEmail($token, 'lupa');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Silahkan periksa email anda untuk reset password!
                    </div>');
                    redirect('auth/lupaPassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email belum terdaftar atau teraktifasi!
                </div>');
                redirect('auth/lupaPassword');
            }
        }
    }

    public function resetPassword() {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if($user_token){
                $this->session->set_userdata('reset_email', $email);
                $this->gantiPassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Reset password gagal, token salah!
                </div>');
                redirect('auth');
            }

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset password gagal, email salah!
            </div>');
            redirect('auth');
        }
    }

    public function gantiPassword(){

        if(!$this->session->userdata('reset_email')) {
            redirect('auth');
        } else {
            $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[5]|matches[password2]', [
                'required' => 'Password harus diisi!',
                'min_length' => 'Password harus minimal 5 karakter',
                'matches' => 'Konfirmasi password salah',
            ]);
            $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]', [
                'required' => 'Password harus diisi!',
                'matches' => 'Konfirmasi password salah',
            ]);
                if($this->form_validation->run() == false){
                    
                    $data['title'] = 'Halaman Ganti Password';
                    $this->load->view('templates/auth_header', $data);
                    $this->load->view('auth/ganti_password');
                    $this->load->view('templates/auth_footer');
                } else {
                    $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
                    $email = $this->session->userdata('reset_email');
    
                    $this->db->set('password', $password);
                    $this->db->where('email', $email);
                    $this->db->update('user');
    
                    $this->session->unset_userdata('reset_email');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password berhasil di ganti, silahkan login!
                    </div>');
                    redirect('auth');
                }
        }

        
    }

    
}

