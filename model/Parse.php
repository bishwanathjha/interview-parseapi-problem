<?php
class Parse
{
	const API_BASE_URL = 'https://api.parse.com/1/';

	const APP_ID = '';
	const API_KEY = '';

	private $endpoint;
	
	function __construct($endpoint = 'classes/interview/')
	{
		if (self::APP_ID == '' || self::API_KEY == '') {
			throw new Exception("Please configure App id and API key in file " . __FILE__ . ' at line no 6' );
			
		}
		
		// TODO: Add validation
		$this->endpoint = self::API_BASE_URL . $endpoint;
	}

	public function Post() {
		return $this->Send('POST', '', $_POST);
	}

	public function Get($id = '') {
		return $this->Send('GET', $id);
	}

	public function Put($id) {
		return $this->Send('PUT', $id, $_POST);
	}

	public function Delete($id) {
		return $this->Send('DELETE', $id);
	}

	private function Send($action, $url = '', $data = null) {
		$handle = curl_init($this->endpoint . $url);
		if ($action == 'POST') {
			curl_setopt($handle, CURLOPT_POST, true);
			curl_setopt($handle, CURLOPT_POSTFIELDS, json_encode($data));
		} elseif ($action == 'DELETE') {
			curl_setopt($handle, CURLOPT_CUSTOMREQUEST, "DELETE");
		} elseif ($action == 'PUT') {
			curl_setopt($handle, CURLOPT_CUSTOMREQUEST, "PUT");
		}

		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLINFO_HEADER_OUT, true);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->GetHeader());

		$respone = curl_exec($handle);

		curl_close($handle);

		return $respone;
	}

	private function GetHeader() {
		return [
			'X-Parse-Application-Id: ' . self::APP_ID,
			'X-Parse-REST-API-Key: ' . self::API_KEY,
			'Content-Type: application/json'
		];
	}
}