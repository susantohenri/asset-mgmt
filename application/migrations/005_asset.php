<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_asset extends CI_Migration {

  function up () {

    $this->db->query("
      CREATE TABLE `asset` (
        `uuid` varchar(255) NOT NULL,
        `orders` INT(11) UNIQUE NOT NULL AUTO_INCREMENT,
        `createdAt` datetime DEFAULT NULL,
        `updatedAt` datetime DEFAULT NULL,
        `AssetCode` varchar(255) UNIQUE NOT NULL,
        `Name` varchar(255) NOT NULL,
        `Model` varchar(255) NOT NULL,
        `InvoiceNumber` varchar(255) NOT NULL,
        `Category` varchar(255) NOT NULL,
        `DateAcquired` DATE NOT NULL,
        `DateDisposed` DATE NOT NULL,
        `DisposalMethod` varchar(255) NOT NULL,
        `PhotoOfItem` varchar(255) NOT NULL,
        `PhotoOfSerialNumber` varchar(255) NOT NULL,
        `Location` varchar(255) NOT NULL,
        `Active` varchar(255) NOT NULL,
        `Notes` varchar(255) NOT NULL,
        PRIMARY KEY (`uuid`),
        KEY `Category` (`Category`),
        KEY `DisposalMethod` (`DisposalMethod`),
        KEY `Location` (`Location`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

  }

  function down () {
    $this->db->query("DROP TABLE IF EXISTS `asset`");
  }

}