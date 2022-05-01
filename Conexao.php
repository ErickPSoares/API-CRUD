<?php

class Conexao
{
    public function conexao () {
        $pdo = new pdo('mysql:host=localhost;dbname=api', 'root', '');
        return $pdo;
    }
}
