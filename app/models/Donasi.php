<?php

namespace App\Models;

use App\Core\Model;

use PDO;
use PDOException;

class Donasi extends Model
{

    public static function findAll()
    {
        try {
            $db = static::getDb();
            
            $stmt = $db->query('SELECT * FROM donasi');

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;

        } catch (PDOException $e) {
            //echo $e->getMessage();
            echo "Terjadi kegagalan koneksi ke database.";
        }
    }

    public static function findDonasiById($id)
    {
        try {
            $db = static::getDb();
            
            $stmt = $db->prepare('SELECT * FROM donasi WHERE id = :id');
            $stmt->bindParam(":id", $id);
            
            $stmt->execute();

            $results = $stmt->fetch(PDO::FETCH_ASSOC);

            return $results;

        } catch (PDOException $e) {
            //echo $e->getMessage();
            echo "Terjadi kegagalan koneksi ke database.";
        }
    }

    public static function insert($data)
    {

        try {

            $db = static::getDb();
            $sql = "INSERT INTO donasi (nama,nama_donasi, jenis_donasi, jumlah_donasi)
            VALUES(:nama, :nama_donasi, :jenis_donasi, :jumlah_donasi)";

            $stmt = $db->prepare($sql);
            
            $stmt->bindParam(":nama", $data['nama']);
            $stmt->bindParam(":nama_donasi", $data['nama_donasi']);
            $stmt->bindParam(":jenis_donasi", $data['jenis_donasi']);
            $stmt->bindParam(":jumlah_donasi", $data['jumlah_donasi']);

            $stmt->execute();

            return $stmt->rowCount();

        } catch (PDOException $e) {
            echo "Terjadi kegagalan saat menyimpan data";
        }
    }

    public static function delete($id)
    {

        try {

            $db = static::getDb();
            $sql = "DELETE FROM donasi WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "Terjadi kegagalan saat menghapus data";
        }
    }
    
    
}
