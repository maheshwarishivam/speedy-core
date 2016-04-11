<?php 
class BasePoPo {
	
	private $data;
	
	public function BasePopo($data = array()) {
		$this->data = $data;
	}

	public final function toJSON() {
		//echo "<pre>"; print_r($reqPoPo); die;
		return json_encode($this->data);
	}

	public final function fromJSON($dataJson) {
		//echo "<pre>"; print_r(json_decode($dataJson)); die;
		return json_decode($dataJson);
	}
}
?>