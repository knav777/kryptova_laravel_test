<?php 

namespace App\Traits;

use Exception;

trait ToolsTrait{

    public static $ENDPOINT = 'http://dummy.restapiexample.com/api/v1/employees';

    public function getDataEmployees(){

        $ch = curl_init();

        curl_setopt( $ch, CURLOPT_URL, ToolsTrait::$ENDPOINT );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        $headers   = [];
        $headers[] = 'Content-Type: application/json';
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );

        $result = json_decode( curl_exec( $ch ) );
        if ( curl_errno( $ch ) ) {
            throw new Exception( curl_error( $ch ), true );
        }

        curl_close( $ch );

        if( empty( $result ) ){
            return [];
        }

        if( $result->status === 'success' ){
            return $result->data;
        }
    }
}

?>