<?php
require_once('../Model/Parse.php');

// API controller for the app to consume json
class Classes
{
	private $Parse;
	private $data = [];

	public function __construct() {
		$this->Parse = new Parse('classes/interview/');
	}

	public function Post() {
		$this->data = $this->Parse->Post();

		return $this;
	}

	public function Get() {
		$this->data = $this->Parse->Get(self::GetID());

		return $this;
	}

	public function Put() {
		$this->data = $this->Parse->Put(self::GetID());

		return $this;
	}

	public function Delete() {
		$this->data = $this->Parse->Delete(self::GetID());

		return $this;
	}

	static private function GetID() {
		$chunks = explode('classes/interview/', $_SERVER['QUERY_STRING']);

		return !empty($chunks[1]) ? $chunks[1] : '';
	}

	public function Dispatch() {
		if (!headers_sent()) {
			header('Content-Type: application/json');
		}

		return  json_encode($this->data, true);
	}
}