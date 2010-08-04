<?php
/**
 * @version      $Id$
 * @package      Appleseed.Framework
 * @subpackage   System
 * @copyright    Copyright (C) 2004 - 2010 Michael Chisari. All rights reserved.
 * @link         http://opensource.appleseedproject.org
 * @license      GNU General Public License version 2.0 (See LICENSE.txt)
 */

// Temporary
$start_time = (float) array_sum(explode(' ',microtime())); 
$start_mem = memory_get_usage(); 

define ( 'APPLESEED', true );
define ( 'DS', DIRECTORY_SEPARATOR );
define ( 'ASD_PATH', $_SERVER['DOCUMENT_ROOT'] . DS);

require_once ( ASD_PATH . DS . 'system' . DS . 'base.php' );
require_once ( ASD_PATH . 'system' . DS . 'application.php' );

/** 
 * Entry Point
 * 
 */
 
global $zApp;
$zApp = new cApplication ( );

$zApp->Initialize ( );

$zApp->Router->Route ( );

echo $zApp->Buffer->Process ();

$end_mem = memory_get_usage(); 
$end_time = (float) array_sum(explode(' ',microtime())); 
 

echo "<h1>Memory Usage: ", sprintf ( "%2.2f", ( $end_mem - $start_mem ) / 1024 / 1024 ) . " mb</h1>";
echo "<h1>Execution Time: ", sprintf("%.4f", ($end_time-$start_time)) . " seconds</h1>";