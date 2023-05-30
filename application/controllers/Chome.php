<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chome extends CI_Controller
{
    protected $tb_products = 'products';

    function __construct(){
        parent::__construct();
        $this->load->model('msqlbasic');
    }

    public function index()
    {   

        $data = [
            'title' => 'List Products',
            'data' => $this->msqlbasic->show_db($this->tb_products),
        ];
        $this->load->view('_layout/header');
        $this->load->view('page/home.php',$data);
        $this->load->view('_layout/footer');
    }

    public function lihat($id=null)
    {
        $data = [
            'title'=>'Detail Data',
            'rowdata'=>$this->msqlbasic->row_db($this->tb_products,['id'=>$id])
        ];

        $this->load->view('_layout/header');
        $this->load->view('page/_home/lihat',$data);
        $this->load->view('_layout/footer');
    }

    public function edit($id=null){

        $data = [
            'title'=>'Detail Data',
            'rowdata'=>$this->msqlbasic->row_db($this->tb_products,['id'=>$id])
        ];  
        $this->load->view('_layout/header');
        $this->load->view('page/_home/edit',$data);
        $this->load->view('_layout/footer');
    }

    public function simpan()
    {
        $post = $this->input->post();
        $title = $post['title'];
        $stock = $post['stock'];
        $price = $post['price'];
        $discountPercentage = $post['discountPercentage'];
        $brand = $post['brand'];
        $category = $post['category'];
        $description = $post['description'];

        $data = compact('title','stock','price','discountPercentage','brand','category','description');

        $hiddenid = $post['hiddenid'];

        $query = $this->msqlbasic->update_db($this->tb_products,['id'=>$hiddenid],$data);

        echo json_encode( ['msg'=>'success','txt'=>'Data Berhasil di Update','url'=>base_url()] );
    }
}
