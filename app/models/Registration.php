<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Registration extends Eloquent
{
 public $table = "registration";
 protected $filetable = array('username','email','password');
}