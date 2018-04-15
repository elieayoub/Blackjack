$(document).on('click','.btnHitMe',function() {
	//Get the container value where to append the new distributed card
	var newCardPlayerContainer = $(this).attr("data-newcardplayercontainer");
	var newCardDealerContainer = $(this).attr("data-newcarddealercontainer");
	//Get the session key name of the sum cards
	var sessionPlayerSumKeyName =  $(this).attr("data-sessionplayersumkeyname");
	var sessionDealerSumKeyName =  $(this).attr("data-sessiondealersumkeyname");
	//Get the player type: 1=>dealer 2=>player
	var playerType =  ($(this).attr("data-playertype") != null ? parseInt($(this).attr("data-playertype")) : null);
	var dealerType =  ($(this).attr("data-dealertype") != null ? parseInt($(this).attr("data-dealertype")) : null);

	//Get new Card from external php and load inside a div container next to player cards
	$.ajax({
      type: "POST",
      url: 'code/Hit.php',
      data: ({sessionsumkeyname: sessionPlayerSumKeyName, playerType: playerType}),
      success: function(data) {
        if (data != null && data != "")
		{
			$(newCardPlayerContainer).append(data);

			//Call the Hit php file again for the Dealer to distribute a new card
			//The Hit php file will validate if the Dealer cards are less than or to 16 then we will distribute a new card, else nothing will happen
			$.ajax({
		      type: "POST",
		      url: 'code/Hit.php',
		      data: ({sessionsumkeyname: sessionDealerSumKeyName, playerType: dealerType}),
		      success: function(data) {
		        if (data != null && data != "")
				{
					$(newCardDealerContainer).append(data);
					
				}
		      }
		    });
		} else {
			alert("No more cards available!")
		}
      }
    });

});

$(document).on('click','#btnStand',function() {
	//Get new Card from external php and load inside a div container next to player cards
	$.get("code/Stand.php", function( data ) {
	  //Append results html messaage to the body of the page
	  $("body").append(data);
	  //Remove first blocked card of the dealer
	  $(".img-card").removeClass("card-blocked");
  	  //Hide Hit and Stand buttons container
  	  $("#gameButtonsContainer").addClass("hide");
	});

});

function newGame() {
	location = "/blackjack";
}

function validateForm() {
	var message = "";
	var selDealerCardsFirst = $("#selDealerCardsFirst").val();
	var selDealerCardsSecond = $("#selDealerCardsSecond").val();
	var selPlayerCardsFirst = $("#selPlayerCardsFirst").val();
	var selPlayerCardsSecond = $("#selPlayerCardsSecond").val();
	
	//Validate the 2 Dealer cards are not the same
	if (selDealerCardsFirst == selDealerCardsSecond)
	{
		message = "Please select different dealer cards in the 2 Dealer Cards combo boxes";
	}
	//Validate the 2 Player cards are not the same
	if (selPlayerCardsFirst == selPlayerCardsSecond)
	{
		message += "\nPlease select different player cards in the 2 Player Cards combo boxes";
	}

	if (message != null && message != "")
	{
		alert(message);
		return false;
	}
	else
		return true;
}
