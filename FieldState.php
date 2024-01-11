<?php
    enum FieldState {
        case HIT;
        case MISS;
        case EMPTY;
        case SUNKEN;
        
        public function print() {
            switch($this) {
                case FieldState::HIT:
                    echo"HIT!" . PHP_EOL;
                    break;
                case FieldState::MISS;
                    echo"MISS!". PHP_EOL;
                    break;
                case FieldState::SUNKEN;
                    echo"SUNK!". PHP_EOL;
                    break;
            }
        }

    }

?>