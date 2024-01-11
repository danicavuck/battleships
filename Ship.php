<?php

include_once("Orientation.php");

class Ship {
    private $row;
    private $col;
    private $length;
    private $orientation;
    private $unsunken;

    public function __construct($row, $col, $length, $orientation) {
        $this->row = $row;
        $this->col = $col;
        $this->length = $length;
        $this->orientation = $orientation;
        $this->unsunken = $length;
    }

    public function contains($row, $col) {  
        if ($this->orientation === Orientation::HORIZONTAL) {
            return $row === $this->row && $col >= $this->col && $col < $this->col + $this->length; 
 
        } elseif ($this->orientation === Orientation::VERTICAL) {
            return $col === $this->col && $row >= $this->row && $row < $this->row + $this->length;
        }
    }

    public function is_neighbor($row, $col) {
        $row_start = $this->row - 1;
        $col_start = $this->col - 1;

        if ($this->orientation === Orientation::HORIZONTAL) {
            $row_end = $this->row + 1;
            $col_end = $this->col + $this->length;
        } else {
            $row_end = $this->row + $this->length;
            $col_end = $this->col + 1;
        }

        return ($row >= $row_start && $row <= $row_end) && ($col >= $col_start && $col <= $col_end);
         
    }

    public function hit() {
        $this->unsunken--;
    }

    public function is_sunken() {
        return $this->unsunken === 0;
    }
};
?>