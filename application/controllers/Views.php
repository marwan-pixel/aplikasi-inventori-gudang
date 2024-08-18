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
        $this->load->view('home');
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
        $tb_barang = $this->model->getDataJoinModel(
            table: 'tb_barang',
            data: [
                'tb_barang.id',
                'tb_barang.kategori_id',
                'tb_kategori.kategori',
                'tb_barang.barang',
                'tb_barang.stok',
                'tb_barang.created_at',
                'tb_barang.updated_at'
            ],
            param: null,
            joins: [['tb_kategori', 'tb_barang.kategori_id = tb_kategori.id']]
        );
        $this->load->view('template/header');
        $this->load->view('dataBarang', ["kategori" => $tb_kategori, 'barang' => $tb_barang]);
        $this->load->view('template/footer');
    }
}
