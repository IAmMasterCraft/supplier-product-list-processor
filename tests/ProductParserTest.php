<?php
use PHPUnit\Framework\TestCase;
require_once(__DIR__ . '/../src/ProductParser.php');
require_once(__DIR__ . '/../src/models/Products.php');

class ProductParserTest extends TestCase {
    public function testParseCSV() {
        $csvFile = 'products_comma_separated.csv';
    
        if (!file_exists($csvFile)) {
            $this->markTestSkipped("Test data file '$csvFile' does not exist.");
        }

        $parser = new ProductParser();
        $products = $parser->parseFile('products_comma_separated.csv');

        $this->assertCount(2, $products);
        $this->assertInstanceOf(Product::class, $products[0]);
    }

    public function testParseTSV() {
        $tsvFile = 'products_tab_separated.tsv';
    
        if (!file_exists($tsvFile)) {
            $this->markTestSkipped("Test data file '$tsvFile' does not exist.");
        }

        $parser = new ProductParser();
        $products = $parser->parseFile($tsvFile);

        $this->assertCount(2, $products);
        $this->assertInstanceOf(Product::class, $products[0]);
    }

    public function testParseJSON() {
        $jsonFile = 'test_data.json';
    
        if (!file_exists($jsonFile)) {
            $this->markTestSkipped("Test data file '$jsonFile' does not exist.");
        }

        $parser = new ProductParser();
        $products = $parser->parseFile($jsonFile);

        $this->assertCount(2, $products);
        $this->assertInstanceOf(Product::class, $products[0]);
    }

    public function testParseXML() {
        $xmlFile = 'test_data.xml';
    
        if (!file_exists($xmlFile)) {
            $this->markTestSkipped("Test data file '$xmlFile' does not exist.");
        }

        $parser = new ProductParser();
        $products = $parser->parseFile($xmlFile);

        $this->assertCount(2, $products);
        $this->assertInstanceOf(Product::class, $products[0]);
    }
}
