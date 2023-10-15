<?php

require __DIR__ .'/src/ProductParser.php';
require __DIR__ .'/src/UniqueCombinationsGenerator.php';

if ($argc < 3 || $argc > 4) {
    die("Usage: php parser.php --file <input_file> [--unique-combinations <output_file>]\n");
}

$inputFile = null;
$outputFile = null;

for ($i = 1; $i < $argc; $i++) {
    if ($argv[$i] == '--file' && $i + 1 < $argc) {
        $inputFile = $argv[$i + 1];
    } elseif ($argv[$i] == '--unique-combinations' && $i + 1 < $argc) {
        $outputFile = $argv[$i + 1];
    }
}

if ($inputFile === null) {
    die("Input file not provided. Usage: php parser.php --file <input_file> [--unique-combinations <output_file>]\n");
}

$productParser = new ProductParser();

try {
    $products = $productParser->parseFile($inputFile);
    foreach ($products as $product) {
        echo json_encode($product) . "\n";
    }

    if ($outputFile !== null) {
        $uniqueCombinationsGenerator = new UniqueCombinationsGenerator();
        $uniqueCombinations = $uniqueCombinationsGenerator->generate($products);
        $uniqueCombinationsGenerator->saveToFile($uniqueCombinations, $outputFile);
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage() . "\n");
}
