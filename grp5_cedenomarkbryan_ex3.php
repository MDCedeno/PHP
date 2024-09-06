<?php
// File path to be used in the operations
$filePath = 'example.txt';

// Function to check if the file exists
function checkFileExists($filePath) {
    // Check if the file exists
    if (file_exists($filePath)) {
        echo "File exists: $filePath\n";
        return true;
    } else {
        echo "File does not exist: $filePath\n";
        return false;
    }
}

// Function to write content to the file
function writeFile($filePath, $content) {
    // Write the content to the file
    // file_put_contents() will create the file if it doesn't exist
    file_put_contents($filePath, $content);
    echo "\nContent written to file: $filePath\n";
}

// Function to read the content of the file using file_get_contents
function readFileContent($filePath) {
    // Get the entire file content as a string
    $content = file_get_contents($filePath);
    echo "\nReading file content:\n";
    echo $content . "\n";  // Display the content of the file
}

// Function to read the file into an array using file()
function readFileIntoArray($filePath) {
    // Read the file into an array where each element is a line of the file
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    echo "\nReading file into an array:\n";
    foreach ($lines as $line) {
        echo $line . "\n";  // Display each line of the file
    }
}

// Main execution
$contentToWrite = "Hello, world!\nThis is a sample content for the file.\nLet's learn file operations in PHP.";

// Step 1: Check if the file exists
if (!checkFileExists($filePath)) {
    // Step 2: If the file does not exist, write initial content to the file
    writeFile($filePath, $contentToWrite);
}

// Step 3: Read the file content using file_get_contents()
readFileContent($filePath);

// Step 4: Read the file into an array using file()
readFileIntoArray($filePath);

?>