<?php 
namespace App\Models;

use App\Core\Model;

class Usuario extends Model {
    public function getUserData() {
        $sql = "SELECT nome FROM usuarios WHERE id = :id";
        $params = ['id' => 1];
        $result = $this->db->fetch($sql, $params);

        return $result;
    }

    public function createUser($nome) {
        $sql = "INSERT INTO usuarios (nome) VALUES (:nome)";
        $params = ['nome' => $nome];
        $this->db->execute($sql, $params);
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM usuarios";
        return $this->db->fetchAll($sql);
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $params = ['id' => $id];
        return $this->db->fetch($sql, $params);
    }
}


