<?php
function isLoggedIn() {
	if ((isset($_SESSION['user']['id'])) && (trim($_SESSION['user']['id']))) {
		return TRUE;
	} else {
		return FALSE;
	}
}
function getCurrentUserId() {
	if ((isset($_SESSION['user']['id'])) && (trim($_SESSION['user']['id']))) {
		return $_SESSION['user']['id'];
	} else {
		return FALSE;
	}
}
function getCurrentUserFromSession() {
	if ((isset($_SESSION['user']['id'])) && (trim($_SESSION['user']['id']))) {
		return $_SESSION['user'];
	} else {
		return FALSE;
	}
}

function logout() {
	if(isset($_SESSION['user'])) {
		unset($_SESSION['user']);
	}
}
?>