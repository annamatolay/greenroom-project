<?php
/**
 * Responsible for table creation, generate and insert random data with DbController.
 */
include "controller/DbController.php";

$db = new DbController("mysql");

$sql = "CREATE TABLE tractors(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    brand VARCHAR(30) NOT NULL,
    type VARCHAR(30) NOT NULL,
    price INTEGER NOT NULL,
    performance INTEGER NOT NULL,
    description VARCHAR(250) NOT NULL)";

$db->run_query($sql);

$brands = array('Claas', 'Kubota', 'John Deere', 'Kioti', 'Massey');
$types = array('Axion 900', 'M6S-111', '6230R', 'CK3510SE', '8700');
$descriptions = array('The tractors power, performance and economy make it an ideal solution for cattle producers who 
want a single tractor for a full range of cattle and hay operations, loader work, mowing and more, the company says.',
    'Tractors with technology advancements aimed at improving the accuracy and efficiency of users crop production 
    practices.', 'Tractor series offers more powerful engines with a low-speed concept.');

for($i=0; $i<60; $i++) {
    $sql = "INSERT INTO tractors (brand, type, price, performance, description)
    VALUES ('" . $brands[array_rand($brands)] . "', '" . $types[array_rand($types)] . "', '" . rand(1500, 3000)
        . "', '" . rand(30, 50) . "', '" . $descriptions[array_rand($descriptions)] . "')";
    $db->run_query($sql);
}
echo "Table created and filled with random data successfully!";
unset($db);