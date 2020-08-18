<?php
/*
 *  Develop Site
 *  Developed with Bootstrap.
 * 
 *  @version     v1.0.1, built on 2020-08-16 07:38:43 PM
 *  @author      SoftSystem, LTD.
 *  @copyright   (c) 2013 - SoftSystem, LTD. All rights reserved.
 *  @license     Licensed under the MIT license
 *               Commercial: http://creativecommons.org/license/
 *               Non-commercial: http://creativecommons.org/licenses/by-nc-nd/3.0/
 */
class htmsg {
    public function success($msg) {return '<div class="alert alert-success text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Exito!. </strong>'.$msg.'.</div>';}
    public function danger($msg){return '<div class="alert alert-danger text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Peligro!. </strong>'.$msg.'.</div>';}
    public function dangerEx(){return '<div class="alert alert-danger text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Error!. </strong>Ocurrio un error al realizar la operacion, intente de nuevo mas tarde, estamos trabajando para solucionarlo.</div>';}
    public function info($msg) {return '<div class="alert alert-info text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Aviso!. </strong>'.$msg.'.</div>';}
    public function warning($msg) {return '<div class="alert alert-warning text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><strong>Advertencia!. </strong>'.$msg.'.</div>';}
    public function successSw($msg) {return '{title: "Exito!.",text: "'.$msg.'",icon: "success",buttons: false,timer: 1500}';}
    public function dangerSw($msg){return '{title: "Peligro!.",text: ""'.$msg.'"",icon: "error",buttons: false,timer: 1500}';}
    public function dangerExSw(){return '{title: "Error!.",text: "Ocurrio un error al realizar la operacion, intente de nuevo mas tarde, estamos trabajando para solucionarlo.",icon: "error",buttons: false,timer: 1500}';}
    public function infoSw($msg) {return '{title: "Aviso!.",text: "'.$msg.'",icon: "info",buttons: false,timer: 1500}';}
    public function warningSw($msg) {return '{title: "Advertencia!.",text: "'.$msg.'",icon: "warning",buttons: false,timer: 1500}';}
}
