<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Authpesanan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		 // $this->load->model('Hakakses_model');
		
	 
	}
	public function index() {
		
		if($this->session->userdata("email") !=''){
	 	 
			redirect("welcome");
		 }
		$data = array('judul' => 'Login PrintAja');
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
		$nama = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$tlp1 = $this->input->post('tlp1');
		$tlp2 = $this->input->post('tlp2');
	 
		$data = array(
			'name' => $nama ,
		'email' => $email,
		'tlp1' => $tlp1,
		'tlp2' =>$tlp2,
		'password' =>$password,
		'create_date' => date('d-m-y'),
		  );
		   $datacek =  $this->db->insert('orders',$data);
           if ( $datacek ) {
           echo json_encode(array('status'=>"true"));
               
           } else {
            echo json_encode(array('status' => "false"));
           }
          
    }
    
	public function prosesUpdateakun(){
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$tlp1 = $this->input->post('tlp1');
		$tlp2 = $this->input->post('tlp2');
	 
		$data = array(
			'name' => $nama ,
		'email' => $email,
		'tlp1' => $tlp1,
		'tlp2' =>$tlp2,
		'password' =>$password,
		'modif_date' => date('d-m-y'),
          );
          $this->db->where('email',$email);
		   $datacek =  $this->db->update('orders',$data);
           if ( $datacek ) {
           echo json_encode(array('status'=>"true"));
               
           } else {
            echo json_encode(array('status' => "false"));
           }
          
    }


    public function detilakun(){
        $email = $this->session->userdata('email');
        $dataquery = $this->db->query('select * from orders where email='.'"'.$email.'"')->result();

        echo json_encode($dataquery);
    }
 


	public function cek_login() {
		$email    = $this->input->post('email');
 
		// $email = $this->input->post('email', TRUE);
		$password = $this->input->post('password');
	 
		$dataquery = $this->db->query('select * from orders where email="'.$email.'"
			and password="'.$password.'"')->row();
		$dataquerys = $this->db->query('select * from orders where email="'.$email.'"
			and password="'.$password.'"')->num_rows();
			
 
		//$hasil = $this->hakakses_model->cek_user($data);
  
				
			 
			if ($dataquerys  >0 ) {
				
				$sess_data['name'] 		= $dataquery->name;
				$sess_data['email'] 	= $dataquery->email;
                $sess_data['password'] 	= $dataquery->password;
            $sess_data['idorder']     = $dataquery->idorder;
				 
		 
				$this->session->set_userdata($sess_data);
				$hasil = array( 'status' => 'true', 
								'data'	 =>  $sess_data );
				echo json_encode($hasil);
			}else {
				   
				   $ee = array( 'status' => 'gagal',
								'data'   => '');
				   	echo json_encode($ee);
			}
	}
 
	
    private function AutonumberPrint(){
        $number = "";
        $data = $this->db->query("select max(idpesanan) as getmax from pesanan")->row();
       
        if($data->getmax < 1){
            $number = "Printaja1".date("my");
        }else{
            $number = "Printaja".$data->getmax.date("my");
        }
        return  $number;
    }
    private function AutonumberPrintShow()
    {
        $number = "";
        $data = $this->db->query("select max(idpesanan-1) as getmaxshow from pesanan")->row();
        if ($data->getmaxshow < 1) {
            $number = "Printaja1" . date("My");
        } else {
            $number = "Printaja" . $data->getmaxshow . date("my");
        }
        return  $number;
    }
    public function _uploadImage()
    {
        $config['upload_path']          = './assets/img';
        $config['allowed_types']        = '*';
        $config['file_name']            = 'printaja_' . date('dMy H i s');
        $config['overwrite']            = true;
        // $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('fileprint') == "") {
            return null;
        } else {
            return $this->upload->data("file_name");
        }
    }
    public function create_action()
    {
        $autonum = "";

        $email = $this->session->userdata('email');
        $dataquery = $this->db->query("
        SELECT  p.idpesananduplicate, p.dateorder,o.email
        FROM pesanan p 
        JOIN orders o ON p.idorder = o.idorder
        WHERE DATE(p.dateorder) = DATE(NOW())
        AND o.email = '" . $email . " and p.status = 0'
        ")->row();

        if ($dataquery !="") {
            $autonum =  $dataquery->idpesananduplicate;
        }else{
            $autonum = $this->AutonumberPrint();
        } 



        $tglambil = $this->input->post('tglambil');
        $jamambil = $this->input->post('jamambil');
        $simpan = array(
            'idpesananduplicate' => $autonum,
            'idorder' =>   $this->session->userdata('idorder'),
            'dateorder' => $tglambil." ".$jamambil,
            // 'datefinish' => ,
            'status' => 0,
            'idkategori' => $this->input->post('idkategori'),
            'qty' => $this->input->post('qty'),
            'warna' => $this->input->post('warna'),
            'hitamputih' => $this->input->post('hitamputih'),
            'datafilecetak' => 1,
            'total' => $this->input->post('total'),
            'keterangan' => $this->input->post('keterangan'),
            'fileprint' => $this->_uploadImage(),
            
           
        );
        // unlink('./assets/img/thumb/'. $gbr['file_name']);
        $this->db->insert('pesanan',$simpan); //kirim value ke model m_upload
        $email = $this->session->userdata('email');
      $db = $this->db->query(" 
                SELECT k.idpesananduplicate,k.idpesanan,m.email FROM pesanan k
                JOIN orders m ON k.idorder = m.idorder
                WHERE k.idpesanan =
                (select max(idpesanan) as maksimal  
                                                from pesanan p )
                and  m.email = '".$email."'   AND k.STATUS = 0 ")->row();
      
        echo json_encode(array('idpesananduplicate'=>   $db->idpesananduplicate));
    }

    public function registlogin(){
        if ($this->session->userdata('email') == "") {
            echo json_encode(array('result' => "true"));
        }else{
            echo json_encode(array('result' => "false"));
        }
      
    }
    public function JsonKategori($id)
    {
       
        $data = $this->db->query('select   *  from kategori where idkategori = ' . $id . '  ')->result();
        echo json_encode($data);
    }	

    public function JsonCekstatus($id)
    {
        $this->db->where('idpesananduplicate', $id);
        $data = $this->db->get('pesanan');
        if ($data->num_rows() > 0) {
            $row = $data->row();
            $pesan = array('status' => $row->status);
            echo json_encode($pesan);
        } else {
            $pesan = array('status' => "kosong");
            echo json_encode($pesan);
        }
        // echo json_encode(array('status' => $data->status));
    }
    public function JsonFitur()
    {
        $data = $this->db->query('select 
                                idkategori, 
                                nama_kategori,
                                 status,hargaBW,
                                 hargaColor,hargajilid 
                                 from kategori   ')->result();
        echo json_encode($data);
    }
 

    public function jsonAbout()
    {
        header('Content-Type: application/json');
        $data = $this->db->get("about")->result();
        echo json_encode(array('data' => $data));
    }
    public function jsonContact()
    {
        header('Content-Type: application/json');
        $data = $this->db->get("contact")->result();
        echo json_encode(array('data' => $data));
    }
    public function jsonBantuan()
    {
        header('Content-Type: application/json');
        $data = array(
            'judul' => $this->input->post('judul'),
            'keterangan' => $this->input->post('ket'),
        );
        $this->db->insert('faq', $data);
        echo json_encode(array('status' => 'sukses', 'data' => $data));
    }
    public function jsonBantuanGetAll()
    {
        $data =  $this->db->get('faq')->result();
        echo json_encode($data);
    }
   


	public function logout() {
	 
        $this->session->sess_destroy();
        echo json_encode(array("status"=>"ok"));
		// redirect('fronweb');
	}
}
