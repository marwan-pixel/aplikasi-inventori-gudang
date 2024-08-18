<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InventarisController extends CI_Controller
{
    private array $data = [];
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
    public function getData()
    {
        return $this->data;
    }
    public function setData($data)
    {
        $this->data = $data;
    }

    public function insertDataKategori()
    {
        $this->setData(
            array(
                'table' => 'tb_kategori',
                'config' => array(
                    array(
                        'field' => 'kategori',
                        'label' => 'Kategori',
                        'rules' => 'required|trim',
                        'errors' =>
                        [
                            'required' => 'Data kategori wajib diisi!'
                        ]
                    ),
                ),
                'value' => array(
                    'kategori' => htmlspecialchars($this->input->post('kategori')),
                    'created_at' => date('Y-m-d h:m:s'),
                )
            )
        );

        $dataKategori = $this->getData();
        $response = $this->response;
        $this->form_validation->set_rules($dataKategori['config']);
        if ($this->form_validation->run() == true) {
            $process = $this->model->insertDataModel($dataKategori['table'], $dataKategori['value']);
            if ($process['status'] == true) {
                $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>
                                        {$process['message']}
                                        </div>");
            } else {
                $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>
                                        {$process['message']}
                                        </div>");
            }
            $response['redirect'] = base_url('data_kategori');
            $response['success'] = true;
        } else {
            $response['errors'] =  array(
                'kategori' => form_error('kategori'),
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

    public function updateDataKategori()
    {
        $this->setData(
            array(
                'table' => 'tb_kategori',
                'config' => array(
                    array(
                        'field' => 'kategori',
                        'label' => 'Kategori',
                        'rules' => 'required|trim',
                        'errors' =>
                        [
                            'required' => 'Data kategori wajib diisi!'
                        ]
                    ),
                ),
                'value' => array(
                    'kategori' => htmlspecialchars($this->input->post('kategori')),
                    'updated_at' => date('Y-m-d h:m:s'),
                ),
                'param' => array(
                    'id' => htmlspecialchars($this->input->post('idKategori'))
                )
            )
        );
        $dataKategori = $this->getData();
        $response = $this->response;
        $this->form_validation->set_rules($dataKategori['config']);
        if ($this->form_validation->run() == true) {
            $existingData = $this->model->getDataModel('tb_kategori', ['kategori'], $dataKategori['param']);
            if ($existingData[0]['kategori'] == $dataKategori['value']['kategori']) {
                $response['errors'] = array('kategori' => "<p>Data harus berbeda saat ingin diubah!</p>");
            } else {
                $process = $this->model->updateDataModel($dataKategori['table'], $dataKategori['value'], $dataKategori['param']);
                if ($process['status'] == true) {
                    $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>
                                            {$process['message']}
                                            </div>");
                } else {
                    $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>
                                            {$process['message']}
                                            </div>");
                }
                $response['success'] = true;
                $response['redirect'] = base_url('data_kategori');
            }
        } else {
            $response['errors'] =  array(
                'kategori' => form_error('kategori'),
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

    public function deleteDataKategori()
    {
        $this->setData(
            array(
                'table' => 'tb_kategori',
                'param' => array(
                    'id' => htmlspecialchars($this->input->post('id'))
                )
            )
        );
        $dataKategori = $this->getData();
        $response = $this->response;
        $process = $this->model->deleteDataModel($dataKategori['table'], $dataKategori['param']);
        if ($process['status'] == true) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>
                                    {$process['message']}
                                    </div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>
                                    {$process['message']}
                                    </div>");
        }
        $response['success'] = true;
        $response['redirect'] = base_url('data_kategori');

        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

    public function insertDataBarang()
    {
        $this->setData(
            array(
                'table' => 'tb_barang',
                'config' => array(
                    array(
                        'field' => 'idkategori',
                        'label' => 'ID Kategori',
                        'rules' => 'required|trim',
                        'errors' =>
                        [
                            'required' => 'Data kategori wajib diisi!'
                        ]
                    ),
                    array(
                        'field' => 'barang',
                        'label' => 'Barang',
                        'rules' => 'required|trim',
                        'errors' =>
                        [
                            'required' => 'Data barang wajib diisi!'
                        ]
                    ),
                    array(
                        'field' => 'stok',
                        'label' => 'Stok',
                        'rules' => 'required|trim',
                        'errors' =>
                        [
                            'required' => 'Data Stok wajib diisi!'
                        ]
                    ),
                ),
                'value' => array(
                    'kategori_id' => htmlspecialchars($this->input->post('idkategori')),
                    'barang' => htmlspecialchars($this->input->post('barang')),
                    'stok' => htmlspecialchars($this->input->post('stok')),
                    'created_at' => date('Y-m-d h:m:s'),
                )
            )
        );

        $dataBarang = $this->getData();
        $response = $this->response;
        $this->form_validation->set_rules($dataBarang['config']);
        if ($this->form_validation->run() == true) {
            $process = $this->model->insertDataModel($dataBarang['table'], $dataBarang['value']);
            if ($process['status'] == true) {
                $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>
                                        {$process['message']}
                                        </div>");
            } else {
                $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>
                                        {$process['message']}
                                        </div>");
            }
            $response['redirect'] = base_url('data_barang');
            $response['success'] = true;
        } else {
            $response['errors'] =  array(
                'idkategori' => form_error('idkategori'),
                'barang' => form_error('barang'),
                'stok' => form_error('stok'),
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

    public function updateDataBarang()
    {
        $this->setData(
            array(
                'table' => 'tb_barang',
                'config' => array(
                    array(
                        'field' => 'barang',
                        'label' => 'Barang',
                        'rules' => 'required|trim',
                        'errors' =>
                        [
                            'required' => 'Data barang wajib diisi!'
                        ]
                    ),
                    array(
                        'field' => 'stok',
                        'label' => 'Stok',
                        'rules' => 'required|trim',
                        'errors' =>
                        [
                            'required' => 'Data Stok wajib diisi!'
                        ]
                    ),
                ),
                'value' => array(
                    'kategori_id' => htmlspecialchars($this->input->post('idkategori')),
                    'barang' => htmlspecialchars($this->input->post('barang')),
                    'stok' => htmlspecialchars($this->input->post('stok')),
                    'updated_at' => date('Y-m-d h:m:s'),
                ),
                'param' => array(
                    'id' => htmlspecialchars($this->input->post('id'))
                )
            )
        );
        $dataBarang = $this->getData();
        $response = $this->response;
        $this->form_validation->set_rules($dataBarang['config']);
        if ($this->form_validation->run() == true) {
            $existingData = $this->model->getDataModel('tb_barang', ['kategori_id', 'barang', 'stok'], $dataBarang['param']);
            if ($existingData[0] == $dataBarang['value']) {
                $response['errors'] = array('kategori' => "<p>Data harus berbeda saat ingin diubah!</p>");
            } else {
                $process = $this->model->updateDataModel($dataBarang['table'], $dataBarang['value'], $dataBarang['param']);
                if ($process['status'] == true) {
                    $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>
                                            {$process['message']}
                                            </div>");
                } else {
                    $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>
                                            {$process['message']}
                                            </div>");
                }
                $response['success'] = true;
                $response['redirect'] = base_url('data_barang');
            }
        } else {
            $response['errors'] =  array(
                'kategori' => form_error('kategori'),
            );
        }
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

    public function deleteDataBarang()
    {
        $this->setData(
            array(
                'table' => 'tb_barang',
                'param' => array(
                    'id' => htmlspecialchars($this->input->post('id'))
                )
            )
        );
        $dataBarang = $this->getData();
        $response = $this->response;
        $process = $this->model->deleteDataModel($dataBarang['table'], $dataBarang['param']);
        if ($process['status'] == true) {
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>
                                    {$process['message']}
                                    </div>");
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>
                                    {$process['message']}
                                    </div>");
        }
        $response['success'] = true;
        $response['redirect'] = base_url('data_barang');

        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }
}
