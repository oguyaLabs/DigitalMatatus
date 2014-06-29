<?php
/**
 * Created by JetBrains PhpStorm.
 * User: james
 * Date: 29/06/14
 * Time: 19:25
 * To change this template use File | Settings | File Templates.
 */

include_once 'DigitalMatatus.class.php';
class DBOps extends DigitalMatatus{

    const TBL_AGENCY = "agency";
    const TBL_CALENDAR = "calendar";
    const TBL_ROUTES = "routes";
    const TBL_SHAPES = "shapes";
    const TBL_STOP_TIMES = "stop_times";
    const TBL_STOPS = "stops";
    const TBL_TRIPS = "trips";

    public function __construct() {
        parent::__construct();
        $this->logger = new Logging();
    }

    public function runQuery($sql){
        return mysql_query($sql);
    }

    //get all routes
    public function getAllRoutes(){

    }

    //get all trips
    public function getAllTrips(){

    }

    //get shape_id of specific route
    public function getShapeID($routeID){

    }

    //get route by route_id
    public function getRoute($routeID){

    }

    //get shape by shape_id
    public function getShapeByShapeID($shapeID){

    }

    //get shape by trip_id
    public function getShapeByTripID($tripID){

    }

    //get shape by route_id
    public function getShapeByRouteID($routeID){}

    //get all route_id matched to shape_id
    public function getRouteIDByShapeID($shapeID){}
}