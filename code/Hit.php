<?php

include "helpers.php";

try {

	session_start();

	if(isset($_SESSION['cards']) &&
		isset($_SESSION['cardsPlayerSum']) &&
		isset($_POST['sessionsumkeyname']) &&
		isset($_POST['playerType'])) {

		$cards = $_SESSION['cards'];
		$cardsPlayerSum = $_SESSION['cardsPlayerSum'];
		$sessionSumKeyName = $_POST['sessionsumkeyname'];
		$playerType = (int)$_POST['playerType'];
		$distributeCard = false;

		//Check if there is still cards available to be distributed in the array
		if (sizeof($cards) > 0)
		{

			//Check if the player to distribute the card to is the Dealer in order to check the sum is valid
			//If the sum of the Dealer is already above 16 then we will not distribute a new card
			if ($playerType == 1)
			{
				//Get the current sum of cards of the dealer
				$cardsDealerSum = (int)$_SESSION[$sessionSumKeyName];

				//If the sum of the Dealer is already above 16 then we will not distribute a new card
				if ($cardsDealerSum <= 16)
				{
					//Get random index from array
					$key = array_rand($cards);
					//Get card name using random index stored in $rand_key
					$randCardName = $cards[$key];

					//Remove card from array
					unset($cards[$key]);
					
					//Get card number from random card name
					$cardDealerValue = getCardNumberFromName($randCardName);
					//Update player sum of cards
					$cardsDealerSum += $cardDealerValue;

					//Update the cards in session after removing the random card
					$_SESSION['cards'] = $cards;
					//Update the dealer cards sum in session after distributing the random card
					$_SESSION[$sessionSumKeyName] = $cardsDealerSum;

					//Set $distributeCard variable to true to reutrn the new card html image
					$distributeCard = true;
				}
				else
				{
					//Set $distributeCard variable to false to reutrn the new card html image
					$distributeCard = false;
				}
			}
			else
			{
				//Get random index from array
				$key = array_rand($cards);
				//Get card name using random index stored in $rand_key
				$randCardName = $cards[$key];

				//Remove card from array
				unset($cards[$key]);
				
				//Get card number from random card name
				$cardPlayerValue = getCardNumberFromName($randCardName);
				//Update player sum of cards
				$cardsPlayerSum += $cardPlayerValue;

				//Update the cards in session after removing the random card
				$_SESSION['cards'] = $cards;
				//Update the player cards sum in session after distributing the random card
				$_SESSION[$sessionSumKeyName] = $cardsPlayerSum;

				//Set $distributeCard variable to true to reutrn the new card html image
				$distributeCard = true;
			}

			//Check if we should distribute the card to return the new html image of the card
			if ($distributeCard)
			{
				echo "<img src='images/cards/$randCardName.png' alt='$randCardName' class='img-card' />";
			}
		}
	}
}
catch(Exception $e) {
	echo '<b>Error:</b> ' .$e->getMessage();
}

?>