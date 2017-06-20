<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
function ds($ang)
{
    switch ($ang)
    {
        case 1:
            return "SR";
            break;
        case 2:
            return "R";
            break;
        case 3:
            return "S";
            break;
        case 4:
            return "T";
            break;
        case 5:
            return "ST";
            break;
    }
}
function negasi($ang)
{
    switch ($ang)
    {
        case 1:
            return "ST";
            break;
        case 2:
            return "T";
            break;
        case 3:
            return "S";
            break;
        case 4:
            return "R";
            break;
        case 5:
            return "SR";
            break;
    }
}
function negasi_($ang)
{
    switch ($ang)
    {
        case 1:
            return "5";
            break;
        case 2:
            return "4";
            break;
        case 3:
            return "3";
            break;
        case 4:
            return "2";
            break;
        case 5:
            return "1";
            break;
    }
}