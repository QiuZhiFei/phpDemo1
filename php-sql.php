<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	
<?php

// 连接 mysql 的地址
$servername = "localhost";

// sql 的登录 名字和密码
$username = "root";
$password = "";

// 创建连接
$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {

	die("连接错误");
} else {

	echo "连接数据库成功 </br>";
}

$databaseName = "MyDB1";
// 创建数据库
$create_database_str = "create database if not exists " . $databaseName;
if (mysqli_query($conn, $create_database_str)) {

	// 重新创建连接

	$conn = mysqli_connect($servername, $username, $password, $databaseName);

	if ($conn) {
	
			// 创建表
		$create_table_stu_str = "create table if not exists MyDB1.stu1 (
				id int(6) unsigned auto_increment primary key,
				name varchar(60) not null
			)";
		if (mysqli_query($conn, $create_table_stu_str)) {
			
			// 添
			$inser_str = "insert into MyDB1.stu1 (name) values ('zhifei')";

			if (mysqli_query($conn, $inser_str)) {
				
				echo "添加成功";
			}
		} else {
			die("创建表失败");
		}
	} else {

		die("重新连接失败");
	}
	

} else {

	die("数据库连接失败");
}

// 关闭连接

$conn -> close();
$conn = null;

?>

</body>
</html>

