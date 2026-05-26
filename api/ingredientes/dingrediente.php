<?php
//iusuario.php - serve para cadastrar um novo usuário
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$data = json_decode($json,true);
$id = $data['id'];
$sql = "delete from ingredientes where ingid = ?; ";
$prp = $pdo->prepare($sql);
$prp->execute([$id]);
Conexao::desconectar();
//{"nome":"valor"}
//http://localhost/API-PWEB/api/categorias/dcategoria.php?jsn={"nome":"SABOOOR","ativo":1,"id":1}