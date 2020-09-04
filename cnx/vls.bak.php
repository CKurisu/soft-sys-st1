<?php
/* 
 *  Develop Site
 *  Developed with Bootstrap.
 * 
 *  @version     v1.0.1, built on 2020-08-16 07:24:26 PM
 *  @author      SoftSystem, LTD.
 *  @copyright   (c) 2013 - SoftSystem, LTD. All rights reserved.
 *  @license     Licensed under the MIT license
 *               Commercial: http://creativecommons.org/license/
 *               Non-commercial: http://creativecommons.org/licenses/by-nc-nd/3.0/
 */
//LOCAL SERVER CONECTION VARIABLES
//define("SERVER", "localhost");
//define("USER", "root");
//define("PASS_USER", "");
//define("PORT", "3306");
//define("SOCKET", "TCP");
//define("U_PASS", "");
//define("DB_NAME", "corpo133_sii");

//REMOTE SERVER CONECTION VARIABLES
define("SERVER", "localhost");
define("USER", "softsys_admnsii");
define("PASS_USER", "otDr4sG8R){N");
//define("PORT", "3306");
//define("SOCKET", "TCP");
//define("U_PASS", "");
define("DB_NAME", "softsys_corpo133_sii");

$tbl_prefix = ""; //Prefix for all database tables
$tbl_clinter = $tbl_prefix."intermediarios";
$tbl_cli = $tbl_prefix."clientes";
$tbl_dtcli = $tbl_prefix."detcli";
$tbl_user = $tbl_prefix."usuario";
$tbl_users = $tbl_prefix."usuarios";