<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SolutionController extends Controller
{
    

    /*
     * ---------------------------------------
     * SOLUTION 1
     * ---------------------------------------
     */
    public function solution1()
    {
        $ch = curl_init('http://103.219.147.17/api/json.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $response = curl_exec($ch);
        curl_close($ch);


        $response = str_replace('{', '', str_replace('}', '', $response));
        $string = str_replace('"data":', '', $response);
        $string = str_replace('"', '', $string);
        $pattern = '!\d+!';

        preg_match_all($pattern, $string, $matches);

        $values = [];
        foreach ($matches[0] as $key => $value) {
            if ($value > '60') {
                $values[] = $value;
            }
        }
        return view('solution1', compact('values'));

    }

    /*
     * ---------------------------------------
     * SOLUTION 2
     * ---------------------------------------
     */
    public function solution2()
    {
        $array = array('0'=>'z1', '1'=>'Z10', '2'=>'z12', '3'=>'Z2', '4'=>'z3');
        natcasesort($array);
        return $array;

    }


    /*
     * ---------------------------------------
     * SOLUTION 3
     * ---------------------------------------
     */
    public function solution3()
    {
        $validate_ip = '';
        if (request()->filled('ip_address')) {
            $validate_ip = preg_match('/^(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)(?:[.](?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)){3}$/', request('ip_address'));
        }
        return view('solution3', compact('validate_ip'));
    }
    
}
