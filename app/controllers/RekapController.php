<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Rekap;
use App\Core\FlashMessage;

class RekapController {

    public function index() {
        $rekaps = Rekap::findAll();

        View::render("rekap/index.html", [
            "rekaps" => $rekaps
        ]);
    }
    
    public function show($params) {

        $id = $params[0];

        $rekap = Rekap::findRekapById($id);
        
        View::render("rekap/show.html", [
            "rekap" => $rekap
        ]);
    }
    
    public function add() {

        // Jika insert berhasil
        if(Donasi::insert($_POST) > 0) {
            FlashMessage::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/donasi');
        } else {
            FlashMessage::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASE_URL . '/donasi');
        }
    }

    public function delete($params) {

        $id = $params[0];
        // Jika insert berhasil
        if(Donasi::delete($id) > 0) {
            FlashMessage::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASE_URL . '/donasi');
        } else {
            FlashMessage::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASE_URL . '/donasi');
        }
    }
}