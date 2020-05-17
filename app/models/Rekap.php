<?php

namespace App\Models;

use App\Core\Model;

use PDO;
use PDOException;

class Rekap extends Model
{

    public static function findAll()
    {
        try {
            $db = static::getDb();
            
            $stmt = $db->query('SELECT SUM(jumlah_donasi),jenis_donasi FROM donasi GROUP BY jenis_donasi');

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;

        } catch (PDOException $e) {
            //echo $e->getMessage();
            echo "Terjadi kegagalan koneksi ke database.";
        }
    }

    public static function findRekapById($id)
    {
        try {
            $db = static::getDb();
            
            $stmt = $db->prepare('SELECT * FROM donasi where id = :id');
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $results = $stmt->fetch(PDO::FETCH_ASSOC);

            return $results;

        } catch (PDOException $e) {
            //echo $e->getMessage();
            echo "Terjadi kegagalan koneksi ke database.";
        }
    }

    
    
}
