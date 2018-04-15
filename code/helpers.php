<?php

function getCardNumberFromName($cardName) {
	$value = explode("_", $cardName);
	if ($value[0] == "ace") {
		return 11;
	} else if ($value[0] == "queen" || $value[0] == "king" || $value[0] == "jack") {
		return 10;
	} else {
		return (int)$value[0];
	}
}

function checkNormalWinner($cardsDealerSum, $cardsPlayerSum) {
	//If dealer has the higher sum and it is less than or equal to 21
	if (($cardsDealerSum > $cardsPlayerSum && $cardsDealerSum <= 21) || ($cardsPlayerSum > 21 && $cardsDealerSum <= 21))	
	{
		return 1;
	} 
	//If player has the higher sum and it is less than or equal to 21
	else if (($cardsPlayerSum > $cardsDealerSum && $cardsPlayerSum <= 21) || ($cardsDealerSum > 21 && $cardsPlayerSum <= 21))	
	{
		return 2;
	}  
	//If both Dealer and Player gets SUM of cards of 21 then it is equal then no one wins
	else if ($cardsPlayerSum == 21 && $cardsDealerSum == 21)	
	{
		return 3;
	}
	//No one wins if both players have cards higher than 21
	else
	{
		return 4;
	}
	//Destroy session when game finishes
	if (isset($_SESSION)){
		session_destroy();
	}
}

function checkBlackJackWinner($cardsDealer, $cardsPlayer) {
	//If both Dealer and Player gets Blackjack or SUM of cards of 21 then it is equal then no one wins
	if (((int)$cardsDealer[0] + (int)$cardsDealer[1] == 21) && ((int)$cardsPlayer[0] + (int)$cardsPlayer[1] == 21))
	{
		echo "<div class='winner-notification'>No one wins!! Both players got 21 <button name='restart' id='btnRestart' onclick='newGame()'>New Game</button></div>";
		//Destroy session when game finishes
		if (isset($_SESSION)){
			session_destroy();
		}
		return true;
	} 
	//If dealer gets Ace + either King, Queen or 10 then he wins a BlackJack
	else if (($cardsDealer[0] == 11 && $cardsDealer[1] == 10) || ($cardsDealer[0] == 10 && $cardsDealer[1] == 11))
	{
		echo "<div class='winner-notification'>Dealer Wins a BlackJack!! <button name='restart' id='btnRestart' onclick='newGame()'>New Game</button></div>";
		//Destroy session when game finishes
		if (isset($_SESSION)){
			session_destroy();
		}
		return true;
	} 
	//If player gets Ace + either King, Queen or 10 then he wins a BlackJack
	else if (($cardsPlayer[0] == 11 && $cardsPlayer[1] == 10) || ($cardsPlayer[0] == 10 && $cardsPlayer[1] == 11))
	{
		echo "<div class='winner-notification'>Player Wins a BlackJack!! <button name='restart' id='btnRestart' onclick='newGame()'>New Game</button></div>";
		//Destroy session when game finishes
		if (isset($_SESSION)){
			session_destroy();
		}
		return true;
	}
	//The 2 players didn't get a BlackJack. Game will continue
	else
	{
		return false;
	}
}

?>