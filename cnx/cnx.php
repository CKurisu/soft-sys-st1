<?php
/* 
 *  Develop Site
 *  Developed with Bootstrap.
 * 
 *  @version     v1.0.1, built on 2020-08-16 07:24:44 PM
 *  @author      SoftSystem, LTD.
 *  @copyright   (c) 2013 - SoftSystem, LTD. All rights reserved.
 *  @license     Licensed under the MIT license
 *               Commercial: http://creativecommons.org/license/
 *               Non-commercial: http://creativecommons.org/licenses/by-nc-nd/3.0/
 */
require 'vls.php';
function cnx()
{
        $servidor=SERVER;
        $usuario=USER;
        $password=PASS_USER;
        $bd=DB_NAME;
        $cnx = mysqli_connect($servidor, $usuario, $password, $bd);
        if($cnx->connect_error)
            die("Connection failed: ".$cnx->connect_error);
        else
            return $cnx;
}

function cerrar(){
        mysqli_close($cnx);
}

function initCnx(){
    try {
        $server=SERVER;
        $dbname=DB_NAME;
        $conn = new PDO("mysql:host=$server;dbname=$dbname", USER, PASS_USER);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $ex) {
        $conn=NULL;
        die();
    }
    return $conn;
}
function closeCnxP($PDO){
    unset($PDO);
}
function closeCnxM($MYSQL){
    mysqli_close($MYSQL);
}