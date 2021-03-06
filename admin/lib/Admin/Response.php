<?php

namespace Admin;

/**
 * HTTP response object.
 */
class Response {

	/**
	 * @var string Response content
	 */
	private $content;
	
	/**
	 * @var array  Response headers
	 */
	private $headers;
	
	/**
	 * @var integer Response http status code
	 */
	private $status;

	/**
	 * @var array HTTP status codes
	 */
	static private $statusText = array(
		100 => 'Continue',
		101 => 'Switching Protocols',
		200 => 'OK',
		201 => 'Created',
		202 => 'Accepted',
		203 => 'Non-Authoritative Information',
		204 => 'No Content',
		205 => 'Reset Content',
		206 => 'Partial Content',
		300 => 'Multiple Choices',
		301 => 'Moved Permanently',
		302 => 'Found',
		303 => 'See Other',
		304 => 'Not Modified',
		305 => 'Use Proxy',
		307 => 'Temporary Redirect',
		400 => 'Bad Request',
		401 => 'Unauthorized',
		402 => 'Payment Required',
		403 => 'Forbidden',
		404 => 'Not Found',
		405 => 'Method Not Allowed',
		406 => 'Not Acceptable',
		407 => 'Proxy Authentication Required',
		408 => 'Request Timeout',
		409 => 'Conflict',
		410 => 'Gone',
		411 => 'Length Required',
		412 => 'Precondition Failed',
		413 => 'Request Entity Too Large',
		414 => 'Request-URI Too Long',
		415 => 'Unsupported Media Type',
		416 => 'Requested Range Not Satisfiable',
		417 => 'Expectation Failed',
		418 => 'I\'m a teapot',
		500 => 'Internal Server Error',
		501 => 'Not Implemented',
		502 => 'Bad Gateway',
		503 => 'Service Unavailable',
		504 => 'Gateway Timeout',
		505 => 'HTTP Version Not Supported',
	);

	/**
	 * Constructor.
	 * 
	 * @param string  $content
	 * @param integer $status
	 * @param array   $headers
	 */
	public function __construct($content, $status = 200, array $headers = array()) {
		$this->content = $content;
		$this->headers = $headers;
		$this->status = $status;
	}

	/**
	 * Sends http status, headers and than content to output.
	 * 
	 * @return void
	 */
	public function send() {
		header(sprintf('HTTP/1.1 %s %s', $this->status, self::$statusText[$this->status]));

		foreach ($this->headers as $name => $value) {
			header($name . ': ' . $value);
		}

		echo $this->content;
	}
	
	public function getStatusCode() {
		return $this->status;
	}
	
	public function getContent() {
		return $this->content;
	}
	
	public function getHeaders() {
		return $this->headers;
	}
}