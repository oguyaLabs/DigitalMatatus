<?php
/**
 * Created by JetBrains PhpStorm.
 * User: james
 * Date: 29/06/14
 * Time: 19:09
 * To change this template use File | Settings | File Templates.
 */

/**
 * API DESC
 *  - get all routes
 *  - get all trips
 *  - get shape_id of specific route
 *  - get route by route_id
 *  - get shape by shape_id
 *  - get shape by trip_id
 *  - get shape by route_id
 *  - get all route_id matched to shape_id
 */

class DigitalMatatus{
    const DB_USERNAME = "root";
    const DB_HOST_NAME = "localhost";
    const DB_DBANAME = "digitalMatatus";
    const DB_PASSWD = "";

    public static $dbConnection;
    var $logger;

    function __construct(){
        $this->logger = new Logging();
        $this->dbConnect();
    }

    private function dbConnect(){
        self::$dbConnection = mysql_connect(self::DB_HOST_NAME, self::DB_USERNAME, self::DB_PASSWD);

        if(!empty(self::$dbConnection)){

            if(!mysql_select_db(self::DB_DBANAME, self::$dbConnection)){
                $log_str = "Unable to select DB. DB Error: ".mysql_error();
                $this->logger->write_log('databases', 'f', $log_str);
                die();
            }
            $log_str = "Successfully Connected to DB.";
            $this->logger->write_log('databases', 'i', $log_str);
        }else{
            $logs = "Unable to connect to DB. DB Error: ".mysql_error();
            $this->logger->write_log('databases', 'f', $logs);
            die();
        }
    }
}