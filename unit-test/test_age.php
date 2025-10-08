<?php
// File: test_name.php
require_once "validator.php";

// Test Case 1: Nama valid (nama lengkap Anda)
try {
    $result = validateName("ratu ayu"); // ganti dengan nama lengkapmu
    echo "PASS: Nama 'ratu ayu' diterima\n";
} catch (Exception $e) {
    echo "FAIL: Nama 'ratu ayu' tidak diterima. Error: " . $e->getMessage() . "\n";
}

// Test Case 2: Nama berisi angka
try {
    $result = validateName("Irma1212");
    echo "FAIL: Nama 'raty1212' seharusnya ditolak\n";
} catch (Exception $e) {
    echo "PASS: Nama 'ratu1212' ditolak. Error: " . $e->getMessage() . "\n";
}

// Test Case 3: Nama kosong
try {
    $result = validateName("");
    echo "PASS: Nama kosong seharusnya ditolak\n";
} catch (Exception $e) {
    echo "FAIL: Nama kosong ditolak. Error: " . $e->getMessage() . "\n";
}