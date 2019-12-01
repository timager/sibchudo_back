<?php


namespace App\DatabaseConnector;


use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Database {
    private static Database $self;
    private static bool $init = false;
    /**
     * @var resource|false $dbConnector
     */
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
        self::$init = true;
    }

    public static function getInstance(): Database {
        if(!self::$init) {
            self::init();
        }
        return self::$self;
    }

    public function makeQuery($query, $params = []) {
        try {
            $result = pg_query_params($this->dbConnector, $query, $params);
            return pg_fetch_all($result);
        } catch(Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }
    }
}