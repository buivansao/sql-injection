<?php
namespace SqlInjection;

/**
 * MySQL connnection
 */
class MySQLConnection {
	/**
	 * PDO instance
	 * @var $pdo
	 */
	private $pdo;

	/**
	 * return in instance of the PDO object that connects to the SQLite database
	 * @return \PDO
	 */
	public function connect() {
		if ($this->pdo == null) {
			$this->pdo = new \PDO("mysql:host=" . Config::MYSQL_HOST . ";dbname=" . Config::MYSQL_DATABASE,  Config::MYSQL_USER, Config::MYSQL_PASSWD );
		}
		return $this->pdo;
	}
}
