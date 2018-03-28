<?php

class DB{
	public function fetch(){
		$pdo = new PDO('mysql:host=localhost;dbname=fyls;','root','');
		$strSql = "select * from transfer where id = 61";
		$pdo->query($strSql);//返回影响了多少行数据
		$arrData = $pdo->fetch();//获取找到的数据
		print_r($arrData);//输出找到的数据

	}
}