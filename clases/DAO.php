<?php

class Dao{
	
	var $server_ip = '';
	var $server_user = '';
	var $server_password = '';
	var $server_db = '';
	
	var $cnn;
	
	public function __construct($params = array()){
		if (count($params) > 0){			
			$this->initialize($params);			
		}
		$this->open();
	}
	
	function __destruct() {
       $this->close();
    }
	
	public function initialize($params = array()){
		if (count($params) > 0){
			foreach ($params as $key => $val){
				if (isset($this->$key)){
					$this->$key = $val;
				}
			}
		}
	}
	
	public function close(){
		if($this->cnn)
			mysqli_close($this->cnn);
	}
	
	private function show_error(){
		die('ERROR: '.mysqli_error($this->cnn));
	}
	
	public function open(){
		$this->cnn = mysqli_connect($this->server_ip,$this->server_user,$this->server_password,$this->server_db);
		if(!$this->cnn){
			$this->show_error();
		}
	}
	
	public function query($query){
		$result = mysqli_query($this->cnn,$query);
		if(!$result){
			$this->show_error();
		}else
			return $result;
	}
	
	public function query_array($query){
		$res = $this->query($query);
		$data = array();
		while($fila = mysqli_fetch_array($res,MYSQLI_ASSOC)){
			$data[] = $fila;
		}
		return $data;
	}
	
}

?>