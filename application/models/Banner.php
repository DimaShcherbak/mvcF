<?php

namespace application\models;

use application\core\Model;

class Banner extends Model
{
    public function getListActive()
    {
        return $this->db->row('SELECT * FROM banners WHERE status = 1 ORDER BY position');
    }

    public function getList()
    {
        return $this->db->row('SELECT * FROM banners ORDER BY position ASC');
    }

    public function create($title, $position, $url, $status, $image)
    {
        $sql = "INSERT INTO banners (title, position, url, image, status) values (:title, :position, :url, :image,:status)";
        $params = ['title' => $title, 'position' => $position, 'url' => $url, 'image' => $image, 'status' => $status];
        $statement = $this->db->create($sql, $params);
        return $this->db->lastInsertId();
    }

    public function delete($bannerId)
    {
        $sql = "delete from banners where id = :bannerid";
        $params = ['bannerid' => $bannerId];
        $statement = $this->db->create($sql, $params);
        return $this->db->lastInsertId();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM banners where id = :id ";
        $params = ['id' => $id];
        $statement = $this->db->row($sql, $params);
        return $statement[0];

    }

    public function update($data)
    {
        $sql = "UPDATE banners SET 
                title = :title, 
                position = :position, 
                url = :url, 
                image = :image, 
                status = :status 
                WHERE id = :id";

        $statement = $this->db->row($sql, $data);

        return $statement;
    }

    public function checkPosition($position){
        $sql = "SELECT position FROM banners WHERE position = :position";

        $statement = $this->db->row($sql, ['position' => $position]);

        return count($statement);
    }

    public function getDown($position){
        $sql = "SELECT * FROM banners WHERE position > :position LIMIT 1";

        $statement = $this->db->row($sql, ['position' => $position]);

        return count($statement) ? $statement[0] : false;

    }

    public function getUp($position){
        $sql = "SELECT * FROM banners WHERE position < :position LIMIT 1";

        $statement = $this->db->row($sql, ['position' => $position]);

        return count($statement) ? $statement[0] : false;
    }
    public function reversePosition($currentBanner, $nextBanner){

        $sql = "UPDATE banners SET position = :pos  WHERE id = :id";
        $this->db->row($sql, ['pos' => $nextBanner['position'], 'id' => $currentBanner['id']]);
        $this->db->row($sql, ['pos' => $currentBanner['position'], 'id' => $nextBanner['id']]);
        return true;

    }
}
