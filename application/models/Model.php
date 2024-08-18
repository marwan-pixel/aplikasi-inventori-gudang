<?php

class Model extends CI_Model
{
    public function getDataModel($table, $data, $param = null): array
    {
        $process = $this->db->select(implode(",", $data));
        if ($param !== null) {
            $process = $this->db->where($param);
        }
        $process = $this->db->get($table)->result_array();
        return $process;
    }

    public function insertDataModel($table, $data)
    {
        try {
            $this->db->insert($table, $data);
            if ($this->db->affected_rows() > 0) {
                return [
                    'status' => true,
                    'message' => "Data Berhasil Ditambahkan!"
                ];
            }
        } catch (Exception $e) {
            //throw $th;
            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function updateDataModel($table, $data, $param)
    {
        try {
            $this->db->set($data)->where($param)->update($table, $data);
            if ($this->db->affected_rows() > 0) {
                return [
                    'status' => true,
                    'message' => "Data Berhasil Diubah!"
                ];
            } else {
                return [
                    'status' => false,
                    'message' => "Data Gagal Diubah!"
                ];
            }
        } catch (Exception $e) {
            //throw $th;
            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function deleteDataModel($table, $param)
    {
        try {
            $this->db->delete($table, $param);
            if ($this->db->affected_rows() > 0) {
                return [
                    'status' => true,
                    'message' => "Data Berhasil Dihapus!"
                ];
            } else {
                return [
                    'status' => false,
                    'message' => "Data Gagal Dihapus!"
                ];
            }
        } catch (Exception $e) {
            //throw $th;
            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
