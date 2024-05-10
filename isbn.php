<?php

function generateUniqueNumber() {
    // Generate a random 4-digit number
    $randomPart = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
    
    // Generate a timestamp
    $timestamp = time();
    
    // Combine timestamp and random part
    $uniqueNumber = $timestamp . $randomPart;
    
    // Ensure length is exactly 13 digits
    $uniqueNumber = str_pad($uniqueNumber, 13, '0', STR_PAD_RIGHT);
    
    return $uniqueNumber;
}

// Generate a unique number
$uniqueNumber = generateUniqueNumber();

echo "Unique 13-digit number: " . $uniqueNumber;
?>
