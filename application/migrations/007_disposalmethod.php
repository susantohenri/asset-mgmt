<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_disposalmethod extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `disposalmethod` (
        `uuid` varchar(255) NOT NULL,
        `orders` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        `createdAt` datetime DEFAULT NULL,
        `updatedAt` datetime DEFAULT NULL,
        `Name` varchar(255) NOT NULL,
        PRIMARY KEY (`uuid`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `disposalmethod`");
  }

}