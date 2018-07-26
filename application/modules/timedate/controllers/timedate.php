<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Timedate extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function get_nice_date($timestamp, $format) {
        switch($format) {
            case 'full':
                //FULL // Friday 18th of February 2011 at 10:00:00 AM
                $the_date = date('l\, jS \of F\, Y \a\t h:i:s A', $timestamp);
                break;
            case 'datetime':
                $the_date = date('m\/d\/Y @ h:i A', $timestamp);
                break;
            case 'cool':
                //COOL // Friday 18th of February 2011
                $the_date = date('l\, jS \of F\, Y', $timestamp);
                break;
            case 'shorter':
                //SHORTER // 18th of February 2011
                $the_date = date('jS \of F\, Y', $timestamp);
                break;
            case 'mini':
                //mini // 18th Feb 2011
                $the_date = date('jS M Y', $timestamp);
                break;
            case 'oldschool':
                //oldschool // 2/18/11
                $the_date = date('n\/j\/y', $timestamp);
                break;
            case 'datepicker':
                //datepicker // 2-18-2011
                $the_date = date('m\/d\/Y', $timestamp);
                break;
            case 'monyear':
                //monyear // Feb 2011
                $the_date = date('M Y', $timestamp);
                break;
        }

        return $the_date;
    }

    function get_time($timestamp) {
        $time = date('h:i A', $timestamp);
        return $time;
    }

    function make_timestamp_from_datepicker($date, $time = NULL) {
        if($time == NULL) {
            $hour = 0;
            $minute = 0;
            $second = 0;
        } else {
            $hour = substr($time, 0, 2);
            $minute = substr($time, 3, 2);
            $second = 0;

            $ampm = substr($time, 6, 2);

            if ($hour == 12) {
                $hour = 0;
            }

            if ($ampm == 'PM') {
                $hour += 12;
            }
        }

        $month = substr($date, 0, 2);
        $day = substr($date, 3, 2);
        $year = substr($date, 6, 4);

        $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
        return $timestamp;
    }

    function make_timestamp($day, $month, $year, $hour = 0, $minute = 0, $second = 0) {
        $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
        return $timestamp;
    }

}
