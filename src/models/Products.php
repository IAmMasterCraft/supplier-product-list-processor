<?php
class Product {
    public $make;
    public $model;
    public $colour;
    public $capacity;
    public $network;
    public $grade;
    public $condition;

    public function __construct(
        $make = null,
        $model = null,
        $colour = null,
        $capacity = null,
        $network = null,
        $grade = null,
        $condition = null
    ) {
        if ($make !== null) {
            $this->make = $make;
        }
        if ($model !== null) {
            $this->model = $model;
        }
        if ($colour !== null) {
            $this->colour = $colour;
        }
        if ($capacity !== null) {
            $this->capacity = $capacity;
        }
        if ($network !== null) {
            $this->network = $network;
        }
        if ($grade !== null) {
            $this->grade = $grade;
        }
        if ($condition !== null) {
            $this->condition = $condition;
        }
    }
}
