<?php
/**
 *
 */

namespace Edoceo\Nuntius;

class IMAP extends \Net_IMAP
{
	function auth($mode='LOGIN', $a, $b)
	{
		switch ($mode) {
			case 'LOGIN':
			case 'PLAIN':
			// case 'PLAIN-CLIENTTOKEN':
			// case 'OAUTHBEARER':
			break;
			case 'XOAUTH':
			case 'XOAUTH2':
				$mode = 'XOAUTH2';

		}
	}

	function getStructure($uid, $use_uid=true)
	{
		if (empty($use_uid)) {
			die("MUST USE UID\n");
		}

		$res = parent::getStructure($uid, $use_uid);
		$message_info = json_decode(json_encode($res), true);

		return $message_info;

	}

	function _get_message_part_tree($uid)
	{
		$message_info = $this->getStructure($uid);
		// print_r($message_info);
		switch ($message_info['type']) {
			case 'MULTIPART':
				switch ($message_info['subType']) {
					case 'MIXED':
						// Stuff
				}
		}

		$message_part_list = _message_get_part_list($message_info);
		// var_dump($message_part_list);
		return $message_part_list;
	}

}
