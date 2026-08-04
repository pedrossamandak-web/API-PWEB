<?php
//iusuario.php - serve para cadastrar um novo usuário
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$data = json_decode($json,true);
$nome = strtoupper($data['nome']);
$vlvenda = $data['vlvenda'];
$descricao = $data['descricao'];
$cat = $data['cat'];
$sql = "insert into produtos (pronome,provalorvenda,prodescricao,procatid) values (?,?,?,?);";
$prp = $pdo->prepare($sql);
$prp->execute([$nome,$vlvenda,$descricao,$cat]);
Conexao::desconectar();
//{"nome":"X-SALADA","vlvenda":0.00,"cat":0}
//http://localhost/Projetos_ETEC_PWEB-III_Div1/api/produtos/iproduto.php?jsn={"nome":"X-SALADA","vlvenda":0.00,"cat":0}