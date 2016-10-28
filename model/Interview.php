<?php
class Interview
{
	public $object_id;
	public $first_name;
	public $last_name;
	public $intrested;
	public $date;
	public $number;
	public $created_at;
	public $updated_at;

	public function __construct($data) {

		// TODO: do some data validation here

		$this->object_id = $data['objectID'];
		$this->first_name = $data['firstName'];
		$this->last_name = $data['lastName'];
		$this->intrested = $data['intrested'];
		$this->date = $data['interviewDate'];
		$this->number = $data['interviewNumber'];
		$this->created_at = $data['createdAt'];
		$this->updated_at = $data['updatedAt'];

		return $this;
	}


	static public function Create($fName, $lName, $intrested, $date = null, $number = null) {
		if (empty($fName) || empty($lName) || !is_bool($intrested)) {
			throw new Exception("Invalid argument given");		
		}

		return new self([
			// TODO complete me
		]);
	}

	public function Update(array $data) {

	}

	public function Delete() {

	}

	static public function DeleteList(array $idList) {

	}

	public function __toString() {
		return [
			'objectId' => $this->object_id,
			'firstName' => $this->first_name;
		]
	}
}