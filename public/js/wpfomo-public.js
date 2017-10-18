(function( $ ) {
  'use strict';

var locations = [ "New York", "Florida", "Washington", "London", "Cape Town" ]
  
  var products = [
    {
      "name": "A cool product",
      "image": "https://cdn.shopify.com/s/files/1/1585/6515/files/smart_thumb.png?11104563487023119969",
      "url": "#"
    },
    {
      "name": "Another cool product",
      "image": "https://cdn.shopify.com/s/files/1/1585/6515/files/boost_thumb.png?11104563487023119969",
      "url": "#"
    },
    {
      "name": "Something great",
      "image": "https://cdn.shopify.com/s/files/1/1585/6515/files/relax_thumb.png?11104563487023119969",
      "url": "#"
    },
    {
      "name": "One year membership",
      "image": "https://cdn.shopify.com/s/files/1/1585/6515/files/sleep_thumb.png?11104563487023119969",
      "url": "#"
    }
  ];   
  
  getProduct();
  getLocation();
  getTime();
  
  function getProduct() {
    var num = Math.floor(Math.random() * products.length);
    $(".product_name").text( (products[num].name) );
    $(".product_image").attr('src',products[num].image);
    $(".product_name").attr('href', (products[num].url) );
  }
  
  function getLocation() {
    var num = Math.floor(Math.random() * locations.length);
    $(".location").text( (locations[num]) );
  }
  
  function getTime() {
    var type    = [ "seconds", "minutes" ];
    var typeNo  = Math.floor( Math.random() * type.length );
    var time    = Math.round( Math.random() * 60 ) + 1;
    
    $(".number").text( time );
    $(".type").text( type[typeNo] );
  }
 
  (function loop() {
      var rand = Math.round(Math.random() * 5000 ) + 8000;
      setTimeout(function() {
        changeNotification();
        loop();  
      }, rand);
  }());
  
  function changeNotification() {
    showNotification();
    setTimeout(function() {
      hideNotification();
    }, 6000)
  }
  
  function showNotification() {
    $("#fomo").addClass("is-visible");
  }
  
  function hideNotification() {
    $("#fomo").removeClass("is-visible");
    setTimeout(function() {
      getProduct();
      getLocation();
      getTime();
    }, 500)
  }
  

})( jQuery );
