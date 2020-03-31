<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('template','database','table','form_validation','session','cart','datatables','pagination');
$autoload['drivers'] = array();


$autoload['helper'] = array('file','form','url','autonumber','autonumber1','checklogin','cheksession');


$autoload['config'] = array();


$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['model'] = array('first_model', 'second_model');
|
| You can also supply an alternative model name to be assigned
| in the controller:
|
|	$autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = array();
