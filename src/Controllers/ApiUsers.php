<?php
namespace App\Controllers;

class ApiUsers {
    public function view() {
        header('Content-Type: application/json');
        return json_encode([
            "name" => "test",
            "data" => $_GET,
        ]);
    }
}