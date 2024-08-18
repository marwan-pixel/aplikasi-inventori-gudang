<?php

class Model extends CI_Model
{
    public function getDataModel(string $table, array $data, array $param = null): array
    {
        $process = $this->db->select(implode(",", $data));
        if ($param !== null) {
            $process = $this->db->where($param);
        }
        $process = $this->db->get($table)->result_array();
        return $process;
    }

    public function insertDataModel(string $table, array $data): array
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

    public function updateDataModel(string $table, array $data, array $param): array
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

    public function getDataJoinModel(string $table, array $data, array $param = null, array $joins)
    {
        $this->db->select(implode(",", $data));
        foreach ($joins as $join) {
            call_user_func_array([$this->db, 'join'], $join);
        }
        if ($param !== null) {
            $this->db->where($param);
        }
        $query = $this->db->get($table);
        $result = $query->result_array();
        return $result;
    }

    public function deleteDataModel(string $table, array $param)
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
