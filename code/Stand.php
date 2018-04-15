<?php

include "helpers.php";

try {
	session_start();

	if(isset($_SESSION['cardsPlayerSum']) && isset($_SESSION['cardsDealerSum'])) {
		$cardsPlayerSum = (int)$_SESSION['cardsPlayerSum'];
		$cardsDealerSum = (int)$_SESSION['cardsDealerSum'];

		//Call function to check who has higher number when Player clicks on Stand button
		$standStatus = checkNormalWinner($cardsDealerSum, $cardsPlayerSum);
		if ($standStatus == 1)
		{
			//Dealer wins
			echo "<div class='winner-notification'>Dealer Wins!! <button name='restart' id='btnRestart' onclick='newGame()'>New Game</button></div>";
		} else if ($standStatus == 2) {
			//Player wins
			echo "<div class='winner-notification'>Player Wins!! <button name='restart' id='btnRestart' onclick='newGame()'>New Game</button></div>";
		} else if ($standStatus == 3) {
			//It is equal => on one wins
			echo "<div class='winner-notification'>No one Wins!! both players got 21 <button name='restart' id='btnRestart' onclick='newGame()'>New Game</button></div>";
		} else if ($standStatus == 4) {
			//Cards higher than 21 => on one wins
			echo "<div class='winner-notification'>No one Wins!! both players got cards higher than 21 <button name='restart' id='btnRestart' onclick='newGame()'>New Game</button></div>";
		}
	}
}
catch(Exception $e) {
	echo '<b>Error:</b> ' .$e->getMessage();
}
?>