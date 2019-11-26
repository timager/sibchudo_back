<?php


namespace App\DatabaseConnector;


use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Database {
    private static $self;
    private $dbConnector;

    private static function init() {
        self::$self = new Database();
        $file = file_get_contents(__DIR__ . "/config/connection.json");
        $connection = json_decode($file, true);
        $password = $connection['password'];
        $user = $connection['user'];
        $host = $connection['host'];
        $dbName = $connection['db_name'];
        self::$self->dbConnector = pg_connect("host=" . $host . " dbname=" . $dbName . " user=" . $user . " password=" . $password);
    }

    public static function getInstance(): Database {
        if(self::$self == null) {
            self::init();
        }
        return self::$self;
    }

    public function makeQuery($query, $params = []) {
        try {
            $result = pg_query_params($this->dbConnector, $query, $params);
            $data = pg_fetch_all($result);
            return $data;
        } catch(Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }
}