--TEST--
JSON (http://www.crockford.com/JSON/JSOND_checker/test/pass3.jsond)
--SKIPIF--
<?php
  if (!extension_loaded('jsond')) die('skip: jsond extension not available');
?>
--FILE--
<?php
    
$test = '
{
    "JSON Test Pattern pass3": {
        "The outermost value": "must be an object or array.",
        "In this test": "It is an object."
    }
}
';

echo 'Testing: ' . $test . "\n";
echo "DECODE: AS OBJECT\n";
$obj = jsond_decode($test);
var_dump($obj);
echo "DECODE: AS ARRAY\n";
$arr = jsond_decode($test, true);
var_dump($arr);

echo "ENCODE: FROM OBJECT\n";
$obj_enc = jsond_encode($obj);
echo $obj_enc . "\n";
echo "ENCODE: FROM ARRAY\n";
$arr_enc = jsond_encode($arr);
echo $arr_enc . "\n";

echo "DECODE AGAIN: AS OBJECT\n";
$obj = jsond_decode($obj_enc);
var_dump($obj);
echo "DECODE AGAIN: AS ARRAY\n";
$arr = jsond_decode($arr_enc, true);
var_dump($arr);

?>
--EXPECTF--
Testing: 
{
    "JSON Test Pattern pass3": {
        "The outermost value": "must be an object or array.",
        "In this test": "It is an object."
    }
}

DECODE: AS OBJECT
object(stdClass)#%d (1) {
  ["JSON Test Pattern pass3"]=>
  object(stdClass)#%d (2) {
    ["The outermost value"]=>
    string(27) "must be an object or array."
    ["In this test"]=>
    string(16) "It is an object."
  }
}
DECODE: AS ARRAY
array(1) {
  ["JSON Test Pattern pass3"]=>
  array(2) {
    ["The outermost value"]=>
    string(27) "must be an object or array."
    ["In this test"]=>
    string(16) "It is an object."
  }
}
ENCODE: FROM OBJECT
{"JSON Test Pattern pass3":{"The outermost value":"must be an object or array.","In this test":"It is an object."}}
ENCODE: FROM ARRAY
{"JSON Test Pattern pass3":{"The outermost value":"must be an object or array.","In this test":"It is an object."}}
DECODE AGAIN: AS OBJECT
object(stdClass)#%d (1) {
  ["JSON Test Pattern pass3"]=>
  object(stdClass)#%d (2) {
    ["The outermost value"]=>
    string(27) "must be an object or array."
    ["In this test"]=>
    string(16) "It is an object."
  }
}
DECODE AGAIN: AS ARRAY
array(1) {
  ["JSON Test Pattern pass3"]=>
  array(2) {
    ["The outermost value"]=>
    string(27) "must be an object or array."
    ["In this test"]=>
    string(16) "It is an object."
  }
}
