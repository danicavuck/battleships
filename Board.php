<?php

include("Ship.php");
include_once("Orientation.php");
include_once("FieldState.php");

class Board {
    private $hit_miss_matrix;
    private $ships;

    function __construct() {
        $this->hit_miss_matrix = array_fill(0, 10, array_fill(0, 10, FieldState::EMPTY));
        $this->ships = array();     
    }   

    public function place_ship($row, $col, $length, $orientation) {
        foreach ($this->ships as $ship) {
            if ($ship->is_neighbor($row, $col)) {
                return false;
            }
        }
        $ship = new Ship($row, $col, $length, $orientation);
        $this->ships[] = $ship;
    }

    public function make_move($row, $col) {
        foreach ($this->ships as $ship) {
            if ($ship->contains($row, $col)) {
                $this->hit_miss_matrix[$row][$col] = FieldState::HIT;
                $ship->hit();
                if ($ship->is_sunken()) {
                    return FieldState::SUNKEN;
                }
                return FieldState::HIT;
            }
        }
        $this->hit_miss_matrix[$row][$col] = FieldState::MISS;
        return FieldState::MISS;
    }

    public function show_board() {
        for ($row = 0; $row < 10; $row++) {
            for ($col = 0; $col < 10; $col++) {
                if ($this->hit_miss_matrix[$row][$col] === FieldState::MISS) {
                    echo"O";
                } elseif ($this->hit_miss_matrix[$row][$col] === FieldState::HIT) {
                    echo"X";
                } elseif ($this->is_inside_ship($row, $col)) {
                    echo"#";
                } elseif ($this->is_around_ship($row, $col)) {
                    echo".";
                } else {
                    echo"-";
                }
            }
        echo PHP_EOL;
        }
    }

    public function is_inside_ship($row, $col) {
        foreach ($this->ships as $ship) {
            if ($ship->contains($row, $col)) {
                return true;
            }
        }
        return false;
    }

    public function is_around_ship($row, $col) {
        foreach ($this->ships as $ship) {
            if ($ship->is_neighbor($row, $col)) {
                return true;
            }
        }
        return false;
    }

}
?>
