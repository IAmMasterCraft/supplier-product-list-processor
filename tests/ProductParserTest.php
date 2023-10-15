<?php
use PHPUnit\Framework\TestCase;

class ProductParserTest extends TestCase {
    public function testParseCSV() {
        $parser = new ProductParser();
        $products = $parser->parseFile('test_data.csv');

        $this->assertCount(2, $products);
        $this->assertInstanceOf(Product::class, $products[0]);
    }

    public function testParseJSON() {
        $parser = new ProductParser();
        $products = $parser->parseFile('test_data.json');

        $this->assertCount(2, $products);
        $this->assertInstanceOf(Product::class, $products[0]);
    }

    public function testParseXML() {
        $parser = new ProductParser();
        $products = $parser->parseFile('test_data.xml');

        $this->assertCount(2, $products);
        $this->assertInstanceOf(Product::class, $products[0]);
    }
}
