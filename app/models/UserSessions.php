<?php

	class UserSessions extends Model {

		public function __construct() {
			$table = 'user_sessions';
			parent::__construct($table);
		}

		public static function getFromCookie() {
			$userSession = new self();
			if(Cookie::exists(REMEMBER_ME_COOKIE_NAME)) {
				$userSession = $userSession->findFirst([
					'conditins' => "user_agent = ? AND session = ?",
					'bind' => [Session::uagent_no_version(), Cookie::get(REMEMBER_ME_COOKIE_NAME)]
				]);
			}
			if(!$userSession) return false;
			return $userSession;
		}
		}