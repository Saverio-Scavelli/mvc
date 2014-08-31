<?php
class T {
        static $results=array();
 
        static function insert( $number ) { //Inserts a number into the array
                array_push( self::$results, $number );
                return new static;
        }
 
        static function add( $number ) { //Adds to the last inserted number
                self::$results[] = array_pop(self::$results) + $number;
                return new static;
        }
        static function results() { //Display results
                foreach(self::$results as $k=>$v) {
                        echo "{$k} : {$v}<BR>\n";
                }
        }
}

T::insert(4)->
        add(2)->
        insert(12)->
        insert(2)->
        add(1)->
        results();