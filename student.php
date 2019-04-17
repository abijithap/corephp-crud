<?php 
 /**
 * Created by Abijith.
 * User: vinam
 * Date: 11/4/19
 * Time: 3pm
 */
include_once "Mysqldatabase.php";
class student extends Mysqldatabase{
	var $id;
	var $name;
	var $email;
	var $dob;
	var $status;

	function __construct(){
		parent::__construct(); 
	}
}
?>