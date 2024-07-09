<?php
// Check if the correct number of arguments are provided
if ($argc != 3 && $argc != 2 && $argc != 1) {
    echo "Usage: php ccwc.php [-c|-l|-w|-m] [<test.txt>]\n";
    exit(1);
}

// Get the option and filename from the arguments
$option = $argc >= 2 ? $argv[1] : '';
$filename = $argc == 3 ? $argv[2] : null;

// Function to read content from file or standard input
function readContent($filename) {
    if ($filename) {
        $content = file_get_contents($filename);
        if ($content === false) {
            echo "Error reading file: $filename\n";
            exit(1);
        }
    } else {
        $content = stream_get_contents(STDIN);
        if ($content === false) {
            echo "Error reading from standard input\n";
            exit(1);
        }
    }
    return $content;
}

// Function to count lines
function countLines($content) {
    return substr_count($content, "\n");
}

// Function to count words
function countWords($content) {
    return str_word_count($content);
}

// Function to count characters
function countCharacters($content) {
    return mb_strlen($content, 'UTF-8');
}

// Handle the -c option to count bytes
if ($option == '-c') {
    $content = readContent($filename);
    echo strlen($content) . ' ' . $filename .  "\n";
}
// Handle the -l option to count lines
elseif ($option == '-l') {
    $content = readContent($filename);
    echo countLines($content) . ' ' . $filename .  "\n";
}
// Handle the -w option to count words
elseif ($option == '-w') {
    $content = readContent($filename);
    echo countWords($content) . ' ' . $filename .  "\n";
}
// Handle the -m option to count characters
elseif ($option == '-m') {
    $content = readContent($filename);
    echo countCharacters($content) . ' ' . $filename . "\n";
}
// Handle the default option to count bytes, lines, and words
elseif ($option == '' && $filename) {
    $content = readContent($filename);
    $lineCount = countLines($content);
    $wordCount = countWords($content);
    $byteCount = strlen($content);
    echo " $lineCount $wordCount $byteCount $filename\n";
} elseif ($option == '') {
    $content = readContent($filename);
    $lineCount = countLines($content);
    $wordCount = countWords($content);
    $byteCount = strlen($content);
    echo " $lineCount $wordCount $byteCount\n";
}
// Handle invalid options
else {
    echo "Invalid option. Use -c to count bytes, -l to count lines, -w to count words, or -m to count characters.\n";
    exit(1);
}
?>
