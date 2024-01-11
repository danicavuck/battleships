<?php
include("Board.php");

$game = new Board();
$game->place_ship(0, 2, 5, Orientation::HORIZONTAL);
$game->place_ship(5, 3, 3, Orientation::VERTICAL);
$game->place_ship(5, 4, 3, Orientation::VERTICAL);
$game->place_ship(5, 5, 3, Orientation::VERTICAL);

$result = $game->make_move(3, 4);
$result->print();

$result = $game->make_move(0, 3);
$result->print();

$result = $game->make_move(6, 0);
$result->print();

$result = $game->make_move(5, 5);
$result->print();
$result = $game->make_move(6, 5);
$result->print();
$result = $game->make_move(7, 5);
$result->print();

$game->show_board();

?>