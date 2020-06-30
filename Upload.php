<?php 
class Upload extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_upload');
        $this->load->library('upload');
        $this->load->helper(array('form', 'url'));
	} 

	function index(){
		$this->load->view('v_upload');
    }
    
    function upload_image()
    {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '10000';
        $config['file_name'] = $_FILES['filefoto']['name'];
        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
        $this->upload->do_upload('filefoto');
        $gbr = $this->upload->data();
        //print_r($gbr);
        $data = array(
            'gambar' => $config['file_name']
        );

        $path = './assets/images/'.$gbr['file_name'];

        $upload_data = $this->upload->data();
        $upload_img_data = getimagesize($upload_data['full_path']);
        $water_mark = "";
        $configrez['image_library'] = 'gd2';
        $configrez['source_image'] = $path;
        $configrez['create_thumb'] = false;
        $configrez['maintain_ratio'] = false;
        
        if ($upload_img_data[0] > $upload_img_data[1]) {
            
            $configrez['width'] = $upload_img_data[1];
            $configrez['height'] = $upload_img_data[1];
            $configrez['x_axis'] = ($upload_img_data[0] - $upload_img_data[1]) / 2;
            $configrez['y_axis'] = 0;
            $water_mark = $upload_img_data[1];
            
        } else {
            
            $configrez['width'] = $upload_img_data[0];
            $configrez['height'] = $upload_img_data[0];
            $configrez['x_axis'] = 0;
            $configrez['y_axis'] = ($upload_img_data[1] - $upload_img_data[0]) / 2;
            $water_mark = $upload_img_data[0];
            
        }
        $this->load->library('image_lib');
        $this->image_lib->initialize($configrez);
        $this->image_lib->crop();

        $gambar=$gbr['file_name'];
        $judul=$this->input->post('xjudul');
        $this->m_upload->simpan_upload($judul,$gambar);
        echo "Image berhasil diupload";
        }
    }

	// function upload_image(){
	// 	$config['upload_path'] = './assets/images/'; //path folder
    //     $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
    //     $config['encrypt_name'] = false; //Enkripsi nama yang terupload
 
    //     $this->upload->initialize($config);
    //     if(!empty($_FILES['filefoto']['name'])){
 
    //             $this->upload->do_upload('filefoto');
    //             $gbr = $this->upload->data();
    //             //Compress Image
    //             // $config['image_library']='gd2';
    //             // $config['source_image']='./assets/images/'.$gbr['file_name'];
    //             // $config['create_thumb']= FALSE;
    //             // $config['maintain_ratio']= FALSE;
    //             // $config['quality']= '50%';
    //             // $config['width']= 600;
    //             // $config['height']= 400;
	// 			// $config['new_image']= './assets/images/'.$gbr['file_name'];
	// 			// $config['image_library'] = 'gd2';
    //             // $config['source_image'] = './assets/images/'.$gbr['file_name'];
    //             // $config['create_thumb'] = false;
    //             // $config['maintain_ratio'] = TRUE;
    //             // $config['x_axis']         = 75;
    //             // $config['y_axis']       = 50;
	// 			// // $this->image_lib->clear();
	// 			// $this->image_lib->initialize($config);
    //             // $this->image_lib->crop();
    //             //list($width, $height, $type, $attr) = getimagesize($gbr);

    //             //$CI->load->library('image_lib');
        
    //             $config['image_library'] = 'gd2';
    //             $config['source_image'] = './assets/images/'.$gbr['file_name'];
    //             $config['x_axis'] = '100';
    //             $config['y_axis'] = '60';
    //             $config['maintain_ratio'] = FALSE;
    //             $config['width'] = '500';
    //             $config['height'] = '500';
    //             $this->load->library('image_lib', $config);
    //             $this->image_lib->crop();
 
    //             $gambar=$gbr['file_name'];
    //             $judul=$this->input->post('xjudul');
    //             $this->m_upload->simpan_upload($judul,$gambar);
    //             echo "Image berhasil diupload";
                      
    //     }else{
    //         echo "Image yang diupload kosong";
    //     }
	// }

}