<?php
// libs/user.lib.php students
$tableNameStudent = "students";

function getAllStudents()
{
	global $dbh;
	global $tableNameStudent;

	$sql = "SELECT * FROM $tableNameStudent";

	$stm = $dbh->prepare($sql);

	if ($stm->execute()) {
		return $stm->fetchAll();
	} else {
		return false;
	}
}

//=====================================================
function getStudentById($id)
{
	global $dbh;
	global $tableNameStudent;

	$sql = "SELECT * FROM $tableNameStudent WHERE id=:id";

	$stm = $dbh->prepare($sql);

	$data = [':id'=> $id];

	if ($stm->execute($data)) {
		return $stm->fetch();
	} else {
		return false;
	}
}
//============================================================
function insertStudent($fullname, $username, $password, $email,$bdate)
{
	global $dbh;
	global $tableNameStudent;

	$sql = "
		INSERT INTO $tableNameStudent (fullname, username, password, email,bdate)
		VALUES (:fullname, :username, :password, :email , :bdate)
	";

	$stm = $dbh->prepare($sql);

	$data = [
		':fullname' => $fullname,
		':username' => $username,
		':password' => md5($password),
		':email' => $email,
		':bdate' => $bdate,

	];

	if ($stm->execute($data)) {
		return $dbh->lastInsertId();
	} else {
		return false;
	}
}
//=================================================================================================

function updateStudent($fullname, $username, $password, $email, $bdate , $id)
{
	global $dbh;
	global $tableNameStudent;

	$sql = "
		UPDATE $tableNameStudent SET fullname = :fullname,
								username = :username,
								password = :password,
								email    = :email,
								bdate   = :bdate
						    WHERE id = :id
	";

	$stm = $dbh->prepare($sql);

	$data = [
		':fullname' => $fullname,
		':username' => $username,
		':password' => md5($password),
		':email' => $email,
		':bdate'=>$bdate,
		':id' => $id

	];

	if ($stm->execute($data)) {
		return true;
	} else {
		return false;
	}
}

//=================================================================================
function deleteStudent($id)
{
	global $dbh;
	global $tableNameStudent;

	$sql = "
		DELETE FROM $tableNameStudent WHERE id =:id
	";

	$stm = $dbh->prepare($sql);

	$data = [ ':id' => $id ];

	if ($stm->execute($data)) {
		return true;
	} else {
		return false;
	}
}




//
// function login($username, $password) {
//     global $dbh;
//     global $tableNameStudent;
//
//     $sql = "SELECT fullname, id, username FROM $tableNameStudent
//             WHERE username=:username AND password=:password";
//     $stm = $dbh->prepare($sql);
//
//     $data = [
//         ':username' => $username,
//         ':password' => md5($password)
//     ];
//
//     if ($stm->execute($data)) {
//         return $stm->fetch();
//     } else {
//         return false;
//     }
// }
