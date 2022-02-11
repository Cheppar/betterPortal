<?php
//*****POSTGRESQL******
$dsn = "pgsql:host=localhost;dbname=goldberger;port=5432";
$opt = [
    PDO:: ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO:: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO:: ATTR_EMULATE_PREPARES   => false
];
$pdo = new PDO($dsn, 'postgres','amaEchi#11947', $opt);
echo "connected To Database";
?>
