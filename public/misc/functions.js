

function orderInfo(){


    $.post( "pastorders.php")
	.done(function( past ) {
		console.log ( past );
		var past = JSON.parse(past);
		console.log ( past );
		var text = "";
		var i;
		var max = past.orders.length;
		console.log ( max );
		for (i = 0; i < max; i++) { 
   			text += past.orders[i].type + "</br>";
   			var date = new Date(past.orders[i].create_date);
   			text += date + "</br>";
   			text += "average price: " + past.orders[i].avg_price + "</br>";
   			text += "deal amount: " + past.orders[i].deal_amount + "</br>" ;
   			var total = past.orders[i].avg_price * past.orders[i].deal_amount;
   			text += "net total: " + total.toFixed(2) + "</br></br>" ;
		}

	    $("#orders").html( text );
	});
}






$(document).ready(function() {
    $.post( "userinfo.php")
	.done(function( data ) {
		var data = JSON.parse(data);

	    $("#net").html( "Net: " + data.info.funds.asset.net );
	    $("#total").html( "Total: " + data.info.funds.asset.total );

	    $("#btcFree").html( "Btc Available: " +data.info.funds.free.btc );
	    $("#cnyFree").html( "Cny Available: " +data.info.funds.free.cny );

	    $("#btcFreezed").html( "Btc In Trade: " +data.info.funds.freezed.btc );
	    $("#cnyFreezed").html( "Cny In Trade: " +data.info.funds.freezed.cny );
	    
	});
   
  	orderInfo();
});
