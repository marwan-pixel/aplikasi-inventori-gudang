<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Views extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->library('session');
        $this->response = array(
            'success' => false,
            'errors' => null,
            'redirect' => null,
        );
        $this->load->model('model');
    }
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/footer');
    }
    public function dataKategori()
    {
        $process = $this->model->getDataModel('tb_kategori', ['id', 'kategori', 'created_at', 'updated_at']);
        $kategori = array();

        foreach ($process as $data) {
            $row   = array();
            $row['id'] = $data['id'];
            $row['kategori'] = $data['kategori'];
            $row['created_at'] = $data['created_at'];
            $row['updated_at'] = $data['updated_at'];
            $kategori[] = $row;
        }
        $this->load->view('template/header');
        $this->load->view('dataKategori', ["data" => $kategori]);
        $this->load->view('template/footer');
    }
    public function dataBarang()
    {
        $tb_kategori = $this->model->getDataModel('tb_kategori', ['id', 'kategori']);
        $tb_barang = $this->model->getDataModel('tb_barang', ['id', 'kategori_id', 'barang', 'stok', 'created_at', 'updated_at']);
        $this->load->view('template/header');
        $this->load->view('dataBarang', ["kategori" => $tb_kategori, 'barang' => $tb_barang]);
        $this->load->view('template/footer');
    }
}
