<?php


class HyFile {

	public $name = "";
	public $handler = "";
	public $filename = "";

	public function __construct($name,$addDocRoot = false) {
		$this -> name = $addDocRoot ? $_SERVER['DOCUMENT_ROOT'] . "/" . $name : $name;
		$this -> filename = $this -> info() -> base;
	}

	private function open($mode = "w") {
		$this -> handler = fopen($this -> name, $mode);
	}

	private function close() {
		fclose($this -> handler);
	}

	public function size() {
		return filesize($this -> name);
	}

	public function exists() {
		return file_exists($this -> name);
	}

	public function write($string = "", $mode = "w") {
		$this -> open($mode);
		$length = strlen($string);
		for ($written = 0; $written < $length;) {
			$written += fwrite($this -> handler, substr($string, $written));
		}
		$this -> close();
		return $written;
	}

	public function read($bytes = 0) {
		$read = "";
		if (!$this -> exists()) {
			echo "File " . $this -> name . " does not exists"; 
			return;
		}
		if (!$bytes) $bytes = $this -> size();
		if ($bytes > 0) {
			$this -> open("r");
			$read = fread($this -> handler, $bytes);
			$this -> close();
			return $read;
		}
		return file_get_contents($this -> name);
	}

	public function info() {
		$info =  pathinfo($this -> name);
		return (object)[
			"dir" => $info['dirname'],
			"base" => $info['basename'],
			"ext" => $info['extension'],
			"name" => $info['filename']
		];
	}

	public function copyTo($path) {
		if (is_dir($path)) {
			$path .= "/" . $this -> filename;
		}
		return copy($this -> name, $path);
	}

	public function rename($newName) {
		rename($this -> name, $newName);
	}

	public function moveTo($path) {
		return $this -> renameTo($this -> name, $path);
	}

	public function delete() {
		if (!$this -> exists()) return;
		unlink($this -> name);
	}

}
