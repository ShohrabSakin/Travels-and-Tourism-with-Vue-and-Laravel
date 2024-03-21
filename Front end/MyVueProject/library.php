<?php
class library
{
public $db;
function __construct()
{
$this->db=new MySQLi("localhost","root","","react");
// $this->db->query("SET CHARACTER SET utf8");
// $this->db->query("SET SESSION collation_connection ='utf8_unicode_ci'");
}
}
?>
