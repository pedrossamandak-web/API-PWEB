<?php
//iusuario.php - serve para cadastrar um novo usuário
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$data = json_decode($json,true);
$nome = strtoupper($data['nome']);
$vlunitario = $data['vlunitario'];
$sql = "insert into ingredientes (ingnome,ingvalorunitario) values (?,?);";
$prp = $pdo->prepare($sql);
$prp->execute([$nome,$vlunitario]);
Conexao::desconectar();
//{"nome":"valor"}
//http://localhost/Projetos_ETEC_PWEB-III_Div1/api/icategoria.php?jsn={"nome":"LANCHE"}