<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 // $this->load->model('Hakakses_model');
		
	 
	}

	public function index() {

		
		if($this->session->userdata("email") !=''){
	 	 
			redirect("welcome");
		 }

		$data = array('judul' => 'Login HadiTerpal');
		$this->load->view('login',$data);
	}

		public function regist() {
		$this->load->view('regist');
	}


function home(){
	$this->load->view('webpage/templatepage');
}


    function acakangkahuruf($panjang)
{
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($karakter)-1);
  $string .= $karakter{$pos};
    }
    return $string;
} 
	public function prosesregist(){

		$nama = $this->input->post('nama_lengkap');
		$email = $this->input->post('email');
		$tlp = $this->input->post('telepon');
		$nik = $this->input->post('nik');
		$nokk = $this->input->post('nokk');
		$jeniskelamin = $this->input->post('jeniskelamin');

		$data = array(
			'nama_lengkap' => $nama ,
		'email' => $email,
		'no_tlp' => $tlp,
		'username' =>$this->acakangkahuruf(5),
		'password' =>$this->acakangkahuruf(7),
		'status' => 'TIDAK',
		'tgl_register' => date('d-m-y'),
	 	'register_by' => $nama,
		'akses' => 'MEMBER',
		'jeniskelamin' => $jeniskelamin );
		   $datacek =  $this->Hakakses_model->insert($data);
           if ( $datacek ) {
             $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Data Berhasil Tersimpan (* Hubungi Admin untuk mendapatkan Username dan Password Anda) <br/>  <a href="'.base_url('auth/index').'">Klik disini Untuk Login !<a>
              </div>');
               # code...
           } else {
               # code...
             $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Data Gagal Tersimpan, Coba lagi !
              </div>');
           }

            redirect(site_url('auth/regist'));
	}

	public function cek_login() {
		$email    = $this->input->post('email');
 
		// $email = $this->input->post('email', TRUE);
		$password = $this->input->post('password');
	 

		$dataquery = $this->db->query('select * from users where email="'.$email.'"
			and password="'.$password.'"')->row();

		$dataquerys = $this->db->query('select * from users where email="'.$email.'"
			and password="'.$password.'"')->num_rows();
			
 
		//$hasil = $this->hakakses_model->cek_user($data);
  
				
			 
			if ($dataquerys  >0 ) {
				
				$sess_data['name'] 		= $dataquery->name;
				$sess_data['email'] 	= $dataquery->email;
				$sess_data['password'] 	= $dataquery->password;
				 
		 
				$this->session->set_userdata($sess_data);

				$hasil = array( 'status' => 'berhasil', 
								'data'	 =>  $sess_data );
				echo json_encode($hasil);
			}else {
				   
				   $ee = array( 'status' => 'gagal',
								'data'   => '');
				   	echo json_encode($ee);
			}
	}
 
		
 

	public function logout() {
	 
		$this->session->sess_destroy();
		redirect('Auth');
	}

}

 