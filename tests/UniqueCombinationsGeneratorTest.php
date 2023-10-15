<?php
use PHPUnit\Framework\TestCase;

class UniqueCombinationsGeneratorTest extends TestCase {
    public function testGenerate() {
        $generator = new UniqueCombinationsGenerator();
        $products = [
            new Product('Apple', 'iPhone 6s', 'Red', '256GB', 'Unlocked', 'Grade A', 'Working'),
            new Product('Samsung', 'Galaxy S10', 'Blue', '128GB', 'Verizon', 'Grade B', 'Refurbished'),
        ];

        $uniqueCombinations = $generator->generate($products);

        $this->assertCount(2, $uniqueCombinations);
        $this->assertEquals('Apple', $uniqueCombinations[0]['make']);
        $this->assertEquals(1, $uniqueCombinations[0]['count']);
    }

    public function testSaveToFile() {
        $generator = new UniqueCombinationsGenerator();
        $uniqueCombinations = [
            [
                'make' => 'Apple',
                'model' => 'iPhone 6s',
                'count' => 3
            ],
            [
                'make' => 'Samsung',
                'model' => 'Galaxy S10',
                'count' => 2
            ],
        ];

        $outputFile = 'test_output.json';
        $generator->saveToFile($uniqueCombinations, $outputFile);

        $this->assertFileExists($outputFile);

        $fileContents = file_get_contents($outputFile);
        $decodedContents = json_decode($fileContents, true);

        $this->assertNotNull($decodedContents);
        $this->assertCount(2, $decodedContents);

        $this->assertEquals('Apple', $decodedContents[0]['make']);
        $this->assertEquals(3, $decodedContents[0]['count']);
    }
}
