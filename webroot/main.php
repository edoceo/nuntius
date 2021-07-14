<?php
/**
 * Edoceo Nuntius / Front Controller
 */

require_once(dirname(dirname(__FILE__)) . '/boot.php');

$path = $_SERVER['REQUEST_URI'];
$path = strtok($path, '?');
$path = trim($path, '/');
$path_list = explode('/', $path);

if ('nuntius' == $path_list[0]) {
	array_shift($path_list);
}
// $path = implode('/', $path_list);

switch ($path_list[0]) {
	case 'api':
		require_once(APP_ROOT . '/lib/Controller/API.php');
	break;
	case 'account':
		require_once(APP_ROOT . '/lib/Controller/Account.php');
	break;
	case 'address':
		require_once(APP_ROOT . '/lib/Controller/Message/Address.php');
	case 'compose':
		require_once(APP_ROOT . '/lib/Controller/Message/Compose.php');
	case 'mailbox':
		require_once(APP_ROOT . '/lib/Controller/Mailbox.php');
	break;
	case 'message':
		require_once(APP_ROOT . '/lib/Controller/Message.php');
	break;
	default:
		__exit_text('Not Found', 404);
}

exit(0);
