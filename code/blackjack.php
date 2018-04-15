<?php

include "helpers.php";

function DistributeCards($dealerCardsFirst = null, $dealerCardsSecond = null, $playerCardsFirst = null, $playerCardsSecond = null) {
	try {
		global $cards;

		//Card decks number
		$cardsDecks = 7;

		//Get size of cards array
		$cardsSize = sizeof($cards);

		//Dealer cards array
		$cardsDealer = array("", "");
		//Player cards array
		$cardsPlayer = array("", "");
		//Dealer cards sum
		$cardsDealerSum = 0;
		//Player cards sum
		$cardsPlayerSum = 0;

		//Start gameCardsTable div 
		echo "<div id='gameCardsTable'>";

		if (isset($dealerCardsFirst) && isset($dealerCardsSecond) && isset($playerCardsFirst) && isset($playerCardsSecond))
		{
			//Distribute user specified cards for the players

			//get number from card name
			$cardNumber = getCardNumberFromName($dealerCardsFirst);
			$cardsDealerSum += $cardNumber;
			//Add dealer card to array
			$cardsDealer[0] = $cardNumber;
			//get number from card name
			$cardNumber = getCardNumberFromName($dealerCardsSecond);
			$cardsDealerSum += $cardNumber;
			//Add dealer card to array
			$cardsDealer[1] = $cardNumber; 

			//get number from card name
			$cardNumber = getCardNumberFromName($playerCardsFirst);
			$cardsPlayerSum += $cardNumber;
			//Add player card to array
			$cardsPlayer[0] = $cardNumber;
			//get number from card name
			$cardNumber = getCardNumberFromName($playerCardsSecond);
			$cardsPlayerSum += $cardNumber;
			//Add player card to array
			$cardsPlayer[1] = $cardNumber;

			//Remove cards from array
			if (($key = array_search($dealerCardsFirst, $cards)) !== false) {
			    unset($cards[$key]);
			}
			if (($key = array_search($dealerCardsSecond, $cards)) !== false) {
			    unset($cards[$key]);
			}
			if (($key = array_search($playerCardsFirst, $cards)) !== false) {
			    unset($cards[$key]);
			}
			if (($key = array_search($playerCardsSecond, $cards)) !== false) {
			    unset($cards[$key]);
			}

			//Check if any or both players got a BlackJack from the start of the game
			$isBlackJackWinner = checkBlackJackWinner($cardsDealer, $cardsPlayer);

			//Display dealers cards images using card names from parameters
			//Show the first card of the dealer if the game was won by BlackJack from the start
			echo "<h3>Dealer Cards:</h3>
			      <img src='images/cards/$dealerCardsFirst.png' alt='$dealerCardsFirst' class='img-card " . (!$isBlackJackWinner ? 'card-blocked' : '') . "' />
			      <img src='images/cards/$dealerCardsSecond.png' alt='$dealerCardsSecond' class='img-card' />";
			//Display container for new dealer cards cards sum used for testing the game
			echo "<div class='newDealerCards'></div>
				  <p><u>Dealer Cards SUM (shown for testing the game):</u>" . $cardsDealerSum . "</p>";

			echo "<h3>Player Cards:</h3>
				  <img src='images/cards/$playerCardsFirst.png' alt='$playerCardsFirst' class='img-card' />
			      <img src='images/cards/$playerCardsSecond.png' alt='$playerCardsSecond' class='img-card' />";

			if (!$isBlackJackWinner)
			{
				//Show the game buttons Hit and Stand if it is not a Black Jack win
				echo "<div class='newPlayerCards'></div>
					  <br/>
					  <div id='gameButtonsContainer'>
				      <button id='btnHitMe' class='btnHitMe' name='Hit' 
				       data-newcardplayercontainer='.newPlayerCards' data-newcarddealercontainer='.newDealerCards' 
				       data-sessionplayersumkeyname='cardsPlayerSum' data-sessiondealersumkeyname='cardsDealerSum' 
				       data-playertype='2' data-dealertype='1'>Hit Me</button>
				      <button id='btnStand' name='Stand'>Stand</button>
				      </div>";
			}

		} else 
		{
			$html = "";
			//Distribute random cards for the players
			for($x=0;$x<4;$x++)
			{
				//Get random index from array
				$key = array_rand($cards);
				//Get card name using random index stored in $rand_key
				$randCardName = $cards[$key];

				//display cards title
				if ($x == 0) {
					$html .= "<h3>Dealer Cards:</h3>";
				} else if ($x == 2) {
					$html .= "<h3>Player Cards:</h3>";
				}

				//Store dealer and player cards in arrays and calclute cards sum
				if ($x == 0 || $x == 1) {
					//get number from card name
					$cardDealerValue = getCardNumberFromName($randCardName);
					$cardsDealer[$x] = $cardDealerValue; //dealer cards will be the first 2 random cards
					$cardsDealerSum += $cardDealerValue;

					//display card image using random card name. Block first card of Dealer
					$html .= "<img src='images/cards/$randCardName.png' alt='$randCardName' class='img-card " . ($x == 0 ? 'card-blocked' : '') . "' />";
				} else {
					//get number from card name
					$cardPlayerValue = getCardNumberFromName($randCardName);
					$cardsPlayer[$x - 2] = $cardPlayerValue;  //player cards will be the last 2 random cards
					$cardsPlayerSum += $cardPlayerValue;

					//display card image using random card name 
					$html .= "<img src='images/cards/$randCardName.png' alt='$randCardName' class='img-card' />";
				}

				//display Display container for new dealer cards and cards sum used for testing
				if ($x == 1) {
					$html .= "<div class='newDealerCards'></div>
							  <p><u>Dealer Cards SUM (shown for testing the game):</u> " . $cardsDealerSum . "</p>";
				}

				//Remove card from array
				unset($cards[$key]);
			}

			//Check if any or both players got a BlackJack from the start of the game
			$isBlackJackWinner = checkBlackJackWinner($cardsDealer, $cardsPlayer);
			if (!$isBlackJackWinner)
			{
				//Show the game buttons Hit and Stand if it is not a Black Jack win
				$html .= "<div class='newPlayerCards'></div>
						  <br/>
						  <div id='gameButtonsContainer'>
					      <button id='btnHitMe' class='btnHitMe' name='Hit' 
					       data-newcardplayercontainer='.newPlayerCards' data-newcarddealercontainer='.newDealerCards' 
					       data-sessionplayersumkeyname='cardsPlayerSum' data-sessiondealersumkeyname='cardsDealerSum' 
					       data-playertype='2' data-dealertype='1'>Hit Me</button>
					      <button id='btnStand' name='Stand'>Stand</button>
					      </div>";
			} else {
				//Show the blocked card because it is a BlackJack win by removing the card-blocked class name from the html variable
				$html = str_replace("card-blocked", "", $html);
			}
			//Write html variable
			echo "$html";
		}

		//Close gameCardsTable div 
		echo "</div>";

		//Save cards and players initial card sums in session to be used with Hit button
		session_start();
		$_SESSION['cards'] = $cards;
		$_SESSION['cardsDealerSum'] = $cardsDealerSum;
		$_SESSION['cardsPlayerSum'] = $cardsPlayerSum;
	}
	catch(Exception $e) {
  		echo '<b>Error:</b> ' .$e->getMessage();
	}
}

?>