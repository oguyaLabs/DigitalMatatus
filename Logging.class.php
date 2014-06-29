<?php
/**
 * Created by JetBrains PhpStorm.
 * User: james
 * Date: 29/06/14
 * Time: 19:22
 * To change this template use File | Settings | File Templates.
 */
class Logging {

    const DEFAULT_LOG_DIR = "Logs/";
    const DB_LOG_FILE = "database_logs.txt";
    const WEB_LOG_FILE = "api_logs.txt";
    const LOG_DIR_PERMS = 0755;

    private $overwrite = false;

    public $LOG_FILES = array();
    public $LOG_TAG = array("e" => "ERROR", "i" => 'INFO', "w" => "WARN", "f" => "FATAL");

    function __construct($overwrite = false){

        $this->overwrite = $overwrite;
        $this->LOG_FILES = array(
            "databases" => self::DEFAULT_LOG_DIR . self::DB_LOG_FILE,
            "api" => self::DEFAULT_LOG_DIR . self::WEB_LOG_FILE
        );

        $this->check_log_dir();

    }

    //TODO override php constructors
//    public function __construct($overwrite){
//        $this->overwrite = $overwrite;
//    }

    private function check_log_dir(){
        if(!is_dir(self::DEFAULT_LOG_DIR)){
            mkdir(self::DEFAULT_LOG_DIR, self::LOG_DIR_PERMS);
        }
    }

    private function open_log_file($log_file){
        if(!is_file($this->LOG_FILES[$log_file])){
            touch($this->LOG_FILES[$log_file]);
        }
        return fopen($this->LOG_FILES[$log_file], $this->overwrite ? "w":"a");
    }

    //syntax -> [2013-12-07 22:37:05] [INFO] log msg
    public function write_log($log_file, $log_tag="i", $log_msg){
        $fh = $this->open_log_file($log_file);

        $log_txt = "[".self::timestamp()."]";
        $log_txt .= " ";
        $log_txt .= "[".$this->LOG_TAG[$log_tag]."]";
        $log_txt .= " ";
        $log_txt .= $log_msg;
        $log_txt .= "\n";

        fwrite($fh, $log_txt);
        @flush();
        fclose($fh);
    }

    //return current_timestamp -> YYYY-mm-dd HH:MM:SS ->[2013-12-07 22:37:05]
    private static function timestamp(){
        date_default_timezone_set('Africa/Nairobi');
        $time = time();
        return date("Y-m-d G:i:s", $time);
    }
}