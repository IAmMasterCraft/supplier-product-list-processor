<?php
require_once(__DIR__ . '/models/Products.php');

class ProductParser {
    public function parseFile($file) {
        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

        switch (strtolower($fileExtension)) {
            case 'csv':
                return $this->parseCSV($file);
            case 'tsv':
                return $this->parseTSV($file);
            case 'json':
                return $this->parseJSON($file);
            case 'xml':
                return $this->parseXML($file);
            default:
                throw new Exception("Unsupported file format: $fileExtension");
        }
    }

    private function parseCSV($file) {
        $products = [];
        if (($handle = fopen($file, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                if (count($data) < 7) {
                    throw new Exception("Incomplete data in CSV");
                }
                $product = new Product();
                $product->make = $data[0];
                $product->model = $data[1];
                $product->colour = $data[2];
                $product->capacity = $data[3];
                $product->network = $data[4];
                $product->grade = $data[5];
                $product->condition = $data[6];
                $products[] = $product;
            }
            fclose($handle);
        }
        return $products;
    }

    private function parseJSON($file) {
        $jsonContent = file_get_contents($file);
        $jsonData = json_decode($jsonContent, true);

        if ($jsonData === null) {
            throw new Exception("Error parsing JSON file");
        }

        $products = [];
        foreach ($jsonData as $item) {
            $product = new Product();
            $product->make = $item['make'];
            $product->model = $item['model'];
            $product->colour = $item['colour'] ?? null;
            $product->capacity = $item['capacity'] ?? null;
            $product->network = $item['network'] ?? null;
            $product->grade = $item['grade'] ?? null;
            $product->condition = $item['condition'] ?? null;
            $products[] = $product;
        }

        return $products;
    }

    private function parseXML($file) {
        $xml = simplexml_load_file($file);

        if ($xml === false) {
            throw new Exception("Error parsing XML file");
        }

        $products = [];
        foreach ($xml as $item) {
            $product = new Product();
            $product->make = (string)$item->make;
            $product->model = (string)$item->model;
            $product->colour = (string)$item->colour;
            $product->capacity = (string)$item->capacity;
            $product->network = (string)$item->network;
            $product->grade = (string)$item->grade;
            $product->condition = (string)$item->condition;
            $products[] = $product;
        }

        return $products;
    }

    private function parseTSV($file) {
        $products = [];

        if (($fileHandle = fopen($file, 'r')) !== false) {
            // Read the TSV file line by line
            while (($line = fgets($fileHandle)) !== false) {
                // Split the line into fields using tabs as the delimiter
                $data = explode("\t", $line);

                // Ensure that the TSV row has the expected number of fields (adjust as needed)
                if (count($data) !== 7) {
                    throw new Exception("Incomplete data in TSV");
                }

                $product = new Product();
                $product->make = $data[0];
                $product->model = $data[1];
                $product->colour = $data[2];
                $product->capacity = $data[3];
                $product->network = $data[4];
                $product->grade = $data[5];
                $product->condition = $data[6];
                $products[] = $product;
            }

            fclose($fileHandle);
        } else {
            throw new Exception("Failed to open the TSV file for reading.");
        }

        return $products;
    }
}
