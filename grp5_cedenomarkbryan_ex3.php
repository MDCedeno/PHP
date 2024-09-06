<?php
// File path to be used in the operations
$filePath = 'example.txt';

// Function to check if the file exists
function checkFileExists($filePath) {
    // Check if the file exists
    if (file_exists($filePath)) {
        echo "File already exists: $filePath\n";
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
    echo "\n\nContent written to file: $filePath\n";
}

// Function to read the content of the file using file_get_contents
function readFileContent($filePath) {
    // Get the entire file content as a string
    $content = file_get_contents($filePath);
    echo "\nReading file content: $filePath\n";
    echo $content . "\n";  // Display the content of the file
}

// Function to read the file into an array using file()
function readFileIntoArray($filePath) {
    // Read the file into an array where each element is a line of the file
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    echo "\nReading file into an array: $filePath\n";
    foreach ($lines as $line) {
        echo $line . "\n";  // Display each line of the file
    }
}

// Main execution
// Step 1: Check if the file exists
checkFileExists($filePath);
echo ("\nDo you want to change the data in the file? \nType 'yes' to change the current file, type 'no' if not.\n\n");
$response = readline('Please enter a response: ');

if ($response == "yes") {
    unlink($filePath);

    $contentToWrite = readline('Please enter a string to the new file: ');

    // Default content if no input is provided
    if ($contentToWrite == '') {    
        $contentToWrite = "Sup, world!\nThis is a sample content for the file.\nChillin like a villain.";
    }
    echo ($contentToWrite);

    writeFile($filePath, $contentToWrite);

    // Read the file content using file_get_contents()
    readFileContent($filePath);

    // Read the file into an array using file()
    readFileIntoArray($filePath);
}

if ($response == "no") {
    // Read the file content using file_get_contents()
    readFileContent($filePath);

    // Read the file into an array using file()
    readFileIntoArray($filePath);
}

?>