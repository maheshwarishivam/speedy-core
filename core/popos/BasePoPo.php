<?php 
class BasePoPo {
	
	private $data;
	
	public function setBasePopo($data = array()) { 
		$this->data = $data;
	}

	public final function toJSON() {
		//echo "<pre>ddddd"; print_r($this->data); die;
		return json_encode($this->data);
	}

	public final function fromJSON($dataJson) {
		//echo "<pre>"; print_r(json_decode($dataJson)); die;
		return json_decode($dataJson);
	}
}
?>