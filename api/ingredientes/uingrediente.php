<?php

require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$data = json_decode($json,true);
$id = $data['id'];
$nome = strtoupper($data['nome']);
$vlunitario = $data['vlunitario'];
$sql = "update  ingredientes set ingnome = ?,  ingvalorunitario = ? where ingid = ?;";
$prp = $pdo->prepare($sql);
$prp->execute([$nome,$vlunitario,$id]);
Conexao::desconectar();
