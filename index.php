<! DOCTYPE html>
<html>
<head>
</head>
	<title>Blackjack Game</title>
	<link rel="stylesheet" href="styles/blackjack.css" />
<body>

	<h1>Blackjack Game</h1>

	<?php
		//Initial cards array to be used dealers and players cards selection combo boxes
		$initialCards = array("ace_of_clubs", "ace_of_diamonds", "ace_of_hearts", "ace_of_spades",
						"2_of_clubs", "2_of_diamonds", "2_of_hearts", "2_of_spades",
						"3_of_clubs", "3_of_diamonds", "3_of_hearts", "3_of_spades",
						"4_of_clubs", "4_of_diamonds", "4_of_hearts", "4_of_spades",
						"5_of_clubs", "5_of_diamonds", "5_of_hearts", "5_of_spades",
						"6_of_clubs", "6_of_diamonds", "6_of_hearts", "6_of_spades",
						"7_of_clubs", "7_of_diamonds", "7_of_hearts", "7_of_spades",
						"8_of_clubs", "8_of_diamonds", "8_of_hearts", "8_of_spades",
						"9_of_clubs", "9_of_diamonds", "9_of_hearts", "9_of_spades",
						"10_of_clubs", "10_of_diamonds", "10_of_hearts", "10_of_spades",
						"jack_of_clubs", "jack_of_diamonds", "jack_of_hearts", "jack_of_spades",
						"queen_of_clubs", "queen_of_diamonds", "queen_of_hearts", "queen_of_spades",
						"king_of_clubs", "king_of_diamonds", "king_of_hearts", "king_of_spades");

		//Cards array based on a 7 decks card game
		$cards = array("ace_of_clubs", "ace_of_diamonds", "ace_of_hearts", "ace_of_spades",
						"2_of_clubs", "2_of_diamonds", "2_of_hearts", "2_of_spades",
						"3_of_clubs", "3_of_diamonds", "3_of_hearts", "3_of_spades",
						"4_of_clubs", "4_of_diamonds", "4_of_hearts", "4_of_spades",
						"5_of_clubs", "5_of_diamonds", "5_of_hearts", "5_of_spades",
						"6_of_clubs", "6_of_diamonds", "6_of_hearts", "6_of_spades",
						"7_of_clubs", "7_of_diamonds", "7_of_hearts", "7_of_spades",
						"8_of_clubs", "8_of_diamonds", "8_of_hearts", "8_of_spades",
						"9_of_clubs", "9_of_diamonds", "9_of_hearts", "9_of_spades",
						"10_of_clubs", "10_of_diamonds", "10_of_hearts", "10_of_spades",
						"jack_of_clubs", "jack_of_diamonds", "jack_of_hearts", "jack_of_spades",
						"queen_of_clubs", "queen_of_diamonds", "queen_of_hearts", "queen_of_spades",
						"king_of_clubs", "king_of_diamonds", "king_of_hearts", "king_of_spades",
						"ace_of_clubs", "ace_of_diamonds", "ace_of_hearts", "ace_of_spades",
						"2_of_clubs", "2_of_diamonds", "2_of_hearts", "2_of_spades",
						"3_of_clubs", "3_of_diamonds", "3_of_hearts", "3_of_spades",
						"4_of_clubs", "4_of_diamonds", "4_of_hearts", "4_of_spades",
						"5_of_clubs", "5_of_diamonds", "5_of_hearts", "5_of_spades",
						"6_of_clubs", "6_of_diamonds", "6_of_hearts", "6_of_spades",
						"7_of_clubs", "7_of_diamonds", "7_of_hearts", "7_of_spades",
						"8_of_clubs", "8_of_diamonds", "8_of_hearts", "8_of_spades",
						"9_of_clubs", "9_of_diamonds", "9_of_hearts", "9_of_spades",
						"10_of_clubs", "10_of_diamonds", "10_of_hearts", "10_of_spades",
						"jack_of_clubs", "jack_of_diamonds", "jack_of_hearts", "jack_of_spades",
						"queen_of_clubs", "queen_of_diamonds", "queen_of_hearts", "queen_of_spades",
						"king_of_clubs", "king_of_diamonds", "king_of_hearts", "king_of_spades",
						"ace_of_clubs", "ace_of_diamonds", "ace_of_hearts", "ace_of_spades",
						"2_of_clubs", "2_of_diamonds", "2_of_hearts", "2_of_spades",
						"3_of_clubs", "3_of_diamonds", "3_of_hearts", "3_of_spades",
						"4_of_clubs", "4_of_diamonds", "4_of_hearts", "4_of_spades",
						"5_of_clubs", "5_of_diamonds", "5_of_hearts", "5_of_spades",
						"6_of_clubs", "6_of_diamonds", "6_of_hearts", "6_of_spades",
						"7_of_clubs", "7_of_diamonds", "7_of_hearts", "7_of_spades",
						"8_of_clubs", "8_of_diamonds", "8_of_hearts", "8_of_spades",
						"9_of_clubs", "9_of_diamonds", "9_of_hearts", "9_of_spades",
						"10_of_clubs", "10_of_diamonds", "10_of_hearts", "10_of_spades",
						"jack_of_clubs", "jack_of_diamonds", "jack_of_hearts", "jack_of_spades",
						"queen_of_clubs", "queen_of_diamonds", "queen_of_hearts", "queen_of_spades",
						"king_of_clubs", "king_of_diamonds", "king_of_hearts", "king_of_spades",
						"ace_of_clubs", "ace_of_diamonds", "ace_of_hearts", "ace_of_spades",
						"2_of_clubs", "2_of_diamonds", "2_of_hearts", "2_of_spades",
						"3_of_clubs", "3_of_diamonds", "3_of_hearts", "3_of_spades",
						"4_of_clubs", "4_of_diamonds", "4_of_hearts", "4_of_spades",
						"5_of_clubs", "5_of_diamonds", "5_of_hearts", "5_of_spades",
						"6_of_clubs", "6_of_diamonds", "6_of_hearts", "6_of_spades",
						"7_of_clubs", "7_of_diamonds", "7_of_hearts", "7_of_spades",
						"8_of_clubs", "8_of_diamonds", "8_of_hearts", "8_of_spades",
						"9_of_clubs", "9_of_diamonds", "9_of_hearts", "9_of_spades",
						"10_of_clubs", "10_of_diamonds", "10_of_hearts", "10_of_spades",
						"jack_of_clubs", "jack_of_diamonds", "jack_of_hearts", "jack_of_spades",
						"queen_of_clubs", "queen_of_diamonds", "queen_of_hearts", "queen_of_spades",
						"king_of_clubs", "king_of_diamonds", "king_of_hearts", "king_of_spades",
						"ace_of_clubs", "ace_of_diamonds", "ace_of_hearts", "ace_of_spades",
						"2_of_clubs", "2_of_diamonds", "2_of_hearts", "2_of_spades",
						"3_of_clubs", "3_of_diamonds", "3_of_hearts", "3_of_spades",
						"4_of_clubs", "4_of_diamonds", "4_of_hearts", "4_of_spades",
						"5_of_clubs", "5_of_diamonds", "5_of_hearts", "5_of_spades",
						"6_of_clubs", "6_of_diamonds", "6_of_hearts", "6_of_spades",
						"7_of_clubs", "7_of_diamonds", "7_of_hearts", "7_of_spades",
						"8_of_clubs", "8_of_diamonds", "8_of_hearts", "8_of_spades",
						"9_of_clubs", "9_of_diamonds", "9_of_hearts", "9_of_spades",
						"10_of_clubs", "10_of_diamonds", "10_of_hearts", "10_of_spades",
						"jack_of_clubs", "jack_of_diamonds", "jack_of_hearts", "jack_of_spades",
						"queen_of_clubs", "queen_of_diamonds", "queen_of_hearts", "queen_of_spades",
						"king_of_clubs", "king_of_diamonds", "king_of_hearts", "king_of_spades",
						"ace_of_clubs", "ace_of_diamonds", "ace_of_hearts", "ace_of_spades",
						"2_of_clubs", "2_of_diamonds", "2_of_hearts", "2_of_spades",
						"3_of_clubs", "3_of_diamonds", "3_of_hearts", "3_of_spades",
						"4_of_clubs", "4_of_diamonds", "4_of_hearts", "4_of_spades",
						"5_of_clubs", "5_of_diamonds", "5_of_hearts", "5_of_spades",
						"6_of_clubs", "6_of_diamonds", "6_of_hearts", "6_of_spades",
						"7_of_clubs", "7_of_diamonds", "7_of_hearts", "7_of_spades",
						"8_of_clubs", "8_of_diamonds", "8_of_hearts", "8_of_spades",
						"9_of_clubs", "9_of_diamonds", "9_of_hearts", "9_of_spades",
						"10_of_clubs", "10_of_diamonds", "10_of_hearts", "10_of_spades",
						"jack_of_clubs", "jack_of_diamonds", "jack_of_hearts", "jack_of_spades",
						"queen_of_clubs", "queen_of_diamonds", "queen_of_hearts", "queen_of_spades",
						"king_of_clubs", "king_of_diamonds", "king_of_hearts", "king_of_spades",
						"ace_of_clubs", "ace_of_diamonds", "ace_of_hearts", "ace_of_spades",
						"2_of_clubs", "2_of_diamonds", "2_of_hearts", "2_of_spades",
						"3_of_clubs", "3_of_diamonds", "3_of_hearts", "3_of_spades",
						"4_of_clubs", "4_of_diamonds", "4_of_hearts", "4_of_spades",
						"5_of_clubs", "5_of_diamonds", "5_of_hearts", "5_of_spades",
						"6_of_clubs", "6_of_diamonds", "6_of_hearts", "6_of_spades",
						"7_of_clubs", "7_of_diamonds", "7_of_hearts", "7_of_spades",
						"8_of_clubs", "8_of_diamonds", "8_of_hearts", "8_of_spades",
						"9_of_clubs", "9_of_diamonds", "9_of_hearts", "9_of_spades",
						"10_of_clubs", "10_of_diamonds", "10_of_hearts", "10_of_spades",
						"jack_of_clubs", "jack_of_diamonds", "jack_of_hearts", "jack_of_spades",
						"queen_of_clubs", "queen_of_diamonds", "queen_of_hearts", "queen_of_spades",
						"king_of_clubs", "king_of_diamonds", "king_of_hearts", "king_of_spades");

		//Load the php functions for the blackjack game from external blackjack.php file
		include 'code/blackjack.php';

		//Used to show/hide the instructions section. 
		//We will hide the instructions section when we click on "Start Automatic Game" or "Start Manual Game" buttons
		$displayInstructionsClass = "show";
		//Used to show/hide the New Game button. 

		//Read selected game and other parameters from url query string
		if (isset($_GET["game"])) {
			//Game = 1 means automatic game
			if ($_GET['game'] == 1)
			{
				$displayInstructionsClass = "hide";
				$displayNewGameButtonClass = "show";
				startAutomaticGame();
			} else if ($_GET['game'] == 2) // Game = 2 means manual game
			{
				$displayInstructionsClass = "hide";
				$displayNewGameButtonClass = "show";
		   		startManualGame();
			}
		}

		function startAutomaticGame() {
			//Call distributeCards function with empty parameters to start the game with random cards
			DistributeCards();
		}

		function startManualGame() {
			if (isset($_GET["dealerCardsFirst"]) && isset($_GET["dealerCardsSecond"]) && isset($_GET["playerCardsFirst"]) && isset($_GET["playerCardsSecond"]))
			{
				//Get the dealer cards
				$dealerCardsFirst = $_GET["dealerCardsFirst"];
				$dealerCardsSecond = $_GET["dealerCardsSecond"];
				//Get the player cards
				$playerCardsFirst = $_GET["playerCardsFirst"];
				$playerCardsSecond = $_GET["playerCardsSecond"];
				//Call distributeCards function with specifc parameters to start the game with user specified cards
				DistributeCards($dealerCardsFirst, $dealerCardsSecond, $playerCardsFirst, $playerCardsSecond);
			}
		}
	?>
	<div id="instructions" class='<?php echo $displayInstructionsClass ?>'>
		<h3>Instructions:</h3>
		<ol>
			<li>If you want to start a game without manually specifying the cards, then click on "Start Automatic Game" button.</li>
			<li>If you want to manually enter dealer's and player’s cards, then specify the dealer and player cards using the combo boxes below and then click on "Start Manual Game" button.</li>
		</ol>
		<form id="frmInstructions">
			<button id="btnAutomaticGame" name="game" value="1">Start Automatic Game</button>
			<br /><br />
			<fieldset>
				<label>
					Specify Dealer Cards:
				</label>
				<select name="dealerCardsFirst" id="selDealerCardsFirst">
					<?php 
					foreach ($initialCards as $card) {
						$cardName = str_replace('_', ' ', $card );
					    echo '<option value="' . $card . '">' . $cardName . '</option>';
					}
					?>
				</select>
				<select name="dealerCardsSecond" id="selDealerCardsSecond">
					<?php 
					foreach ($initialCards as $card) {
						$cardName = str_replace('_', ' ', $card );
					    echo '<option value="' . $card . '">' . $cardName . '</option>';
					}
					?>
				</select>
			</fieldset>
			<fieldset>
			<label for="playerCards">
				Specify Player Cards:
			</label>
			<select name="playerCardsFirst" id="selPlayerCardsFirst">
				<?php 
				foreach ($initialCards as $card) {
					$cardName = str_replace('_', ' ', $card );
				    echo '<option value="' . $card . '">' . $cardName . '</option>';
				}
				?>
			</select>
			<select name="playerCardsSecond" id="selPlayerCardsSecond">
				<?php 
				foreach ($initialCards as $card) {
					$cardName = str_replace('_', ' ', $card );
				    echo '<option value="' . $card . '">' . $cardName . '</option>';
				}
				?>
			</select>
			</fieldset>
			<button id="btnManualGame" name="game" value="2" onclick="return validateForm()">Start Manual Game</button>
		</form>
	</div>

	<script src="scripts/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="scripts/blackjack.js" type="text/javascript"></script>
</body>
</html>