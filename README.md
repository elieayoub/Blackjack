# Blackjack Game

This is a Blackjack card game developed using PHP language.

## How it works:
- You have the possibility to enter dealer's and player’s cards and start the game by specifying the Dealer and Player cards and then clicking on the "Start Manual Game" button.
- You can start a game with random Dealer and Player cards by clicking on "Start Automatic Game" button.
- I created an array containing 7 deck card games (52 cards * 7 decks) that the system will get random cards from when user clicks on "Hit Me" button
- After the cards get distrbitued at first, the system checks if the Dealer or the Player has any BlackJack and anounces the winner.
- If neither the Player nor the Dealer have BlackJack, the Game continues normally.
- When the Player clicks on "Hit Me" button the system will distribute a random card to the Player and then checks if the Dealer has sum of cards less than or equal to 16 then it will distribute a random card for the Dealer also.
- When the Player finishes hitting cards, he can click "Stand" button and then the system will check who has the highest sum of cards that will be lower than 21 and then announces the winner.
- In case both Player and Dealer get a BlackJack then no one wins.
- In case both Player and Dealer get a SUM of cards higher than 21 then no one wins.