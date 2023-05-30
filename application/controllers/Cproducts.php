<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cproducts extends CI_Controller
{
    protected $tb_products = 'products';

    function __construct(){
        parent::__construct();
        $this->load->model('msqlbasic');
    }

    public function index()
    {   
        $this->load->view('_layout/header');
        $this->load->view('page/products.php');
        $this->load->view('_layout/footer');
    }

    public function get_products_api()
    {
        $post = $this->input->post();
        $urlproducts = $post['urlproducts'];
        
        $curl = $this->restapi->get_products($urlproducts);

        if( $this->cek_db_products() ){
            $this->db->empty_table($this->tb_products);
        }

        if( !empty($curl) ){
            foreach($curl->products as $row){
                $data = (array) $row;
                $data['images'] = serialize($data['images']);

                $query  = $this->msqlbasic->add_db($this->tb_products,$data);
                if( $query ){
                    $return = ['msg'=>'success','txt'=>'Data Berhasil Di Simpan'];
                }else{
                    $return = ['msg'=>'danger','txt'=>'Data Gagal Di Simpan'];
                }
            }
        }else{
            $return = ['msg'=>'danger','txt'=>'Data Tidak ditemukan'];
        }

        echo json_encode( $return );

    }

    public function cek_db_products()
    {
        $query = $this->msqlbasic->show_db($this->tb_products);

        if( !empty($query) ){
            $return = TRUE;
        }else{
            $return = FALSE;
        }

        return $return;
    }

}
