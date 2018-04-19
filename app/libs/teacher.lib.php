<?php
// libs/user.lib.php
$tableNameTeacher = "teachers";

function getAllTeachers()
{
	global $dbh;
	global $tableNameTeacher;

	$sql = "SELECT * FROM $tableNameTeacher";

	$stm = $dbh->prepare($sql);

	if ($stm->execute()) {
		return $stm->fetchAll();
	} else {
		return false;
	}
}

//=====================================================
function getTeacherById($id)
{
	global $dbh;
	global $tableNameTeacher;

	$sql = "SELECT * FROM $tableNameTeacher WHERE id=:id";

	$stm = $dbh->prepare($sql);

	$data = [':id'=> $id];

	if ($stm->execute($data)) {
		return $stm->fetch();
	} else {
		return false;
	}
}
//============================================================
function insertTeacher($fullname, $username, $password, $email,$sallery , $subId)
{
	global $dbh;
	global $tableNameTeacher;

	$sql = "
		INSERT INTO $tableNameTeacher (fullname, username, password, email, sallery , sub_id)
		VALUES (:fullname, :username, :password, :email , :sallery ,:sub_id)
	";

	$stm = $dbh->prepare($sql);

	$data = [
		':fullname' => $fullname,
		':username' => $username,
		':password' => md5($password),
		':email' => $email,
		':sallery' => $sallery,
		':sub_id' => $subId
	];

	if ($stm->execute($data)) {
		return $dbh->lastInsertId();
	} else {
		return false;
	}
}

function updateTeacher($fullname, $username, $password, $email, $sallery , $subid, $id)
{
	global $dbh;
	global $tableNameTeacher;

	$sql = "
		UPDATE $tableNameTeacher SET fullname = :fullname,
								username = :username,
								password = :password,
								email    = :email,
								sallery  = :sallery,
								sub_id   = :subid
						    WHERE id = :id
	";

	$stm = $dbh->prepare($sql);

	$data = [
		':fullname' => $fullname,
		':username' => $username,
		':password' => md5($password),
		':email' => $email,
		':sallery'=>$sallery,
		':subid'=>$subid,
		':id' => $id

	];

	if ($stm->execute($data)) {
		return true;
	} else {
		return false;
	}
}


function deleteTeacher($id)
{
	global $dbh;
	global $tableNameTeacher;

	$sql = "
		DELETE FROM $tableNameTeacher WHERE id =:id
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
//     global $tableNameTeacher;
//
//     $sql = "SELECT fullname, id, username FROM $tableNameTeacher
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
