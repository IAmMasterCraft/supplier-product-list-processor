<?php
class UniqueCombinationsGenerator {
    public function generate($products) {
        $uniqueCombinations = [];
        
        foreach ($products as $product) {
            $combinationKey = $this->getCombinationKey($product);
            
            if (!isset($uniqueCombinations[$combinationKey])) {
                $uniqueCombinations[$combinationKey] = [
                    'make' => $product->make,
                    'model' => $product->model,
                    'colour' => $product->colour,
                    'capacity' => $product->capacity,
                    'network' => $product->network,
                    'grade' => $product->grade,
                    'condition' => $product->condition,
                    'count' => 1,
                ];
            } else {
                $uniqueCombinations[$combinationKey]['count']++;
            }
        }

        return array_values($uniqueCombinations);
    }

    public function saveToFile($uniqueCombinations, $outputFile) {
        $output = [];

        foreach ($uniqueCombinations as $combination) {
            $output[] = json_encode($combination);
        }

        file_put_contents($outputFile, implode("\n", $output));
    }

    private function getCombinationKey($product) {
        return "{$product->make}-{$product->model}-{$product->colour}-{$product->capacity}-{$product->network}-{$product->grade}-{$product->condition}";
    }
}
