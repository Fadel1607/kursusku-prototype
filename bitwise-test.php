<?php
$READ = 1;
$WRITE = 2;
$DELETE = 4;

$permission = $READ | $WRITE; 
$canDelete = ($permission & $DELETE) !== 0; // Hasilnya false karena DELETE (4) tidak ada di $permission (3)

var_dump($canDelete);