<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
*/
$autoload['packages'] = array();
/*
|	$autoload['libraries'] = array('user_agent' => 'ua');
*/
$autoload['libraries'] = array('database','session','breadcrumbs','form_validation', 'ion_auth',);
/*
|	$autoload['drivers'] = array('cache' => 'cch');
*/
$autoload['drivers'] = array();
/*
|	$autoload['helper'] = array('url', 'file');
*/
$autoload['helper'] = array('url', 'file', 'string');

/*
|	$autoload['config'] = array('config1', 'config2');
*/
$autoload['config'] = array();

/*
|	$autoload['language'] = array('lang1', 'lang2');
*/
$autoload['language'] = array();

/*
|	$autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = array();
