jQuery(function() {

  var products = [
    {
      "name": "Mike",
      "product_name": "A cool product",
      "image": "https://cdn.shopify.com/s/files/1/1585/6515/files/smart_thumb.png?11104563487023119969",
      "url": "#"
    },
    {
      "buyer_name": "Tom",
      "product_name": "Another cool product",
      "image": "https://cdn.shopify.com/s/files/1/1585/6515/files/boost_thumb.png",
      "url": "#"
    },
    {
      "buyer_name": "Vito",
      "product_name": "Something great",
      "image": "https://cdn.shopify.com/s/files/1/1585/6515/files/relax_thumb.png",
      "url": "#"
    },
    {
      "buyer_name": "Anthony",
      "product_name": "One year membership",
      "image": "https://cdn.shopify.com/s/files/1/1585/6515/files/sleep_thumb.png",
      "url": "#"
    }
  ];   
  
  getProduct();
  getTime();
  
  function getProduct() {
    var num = Math.floor(Math.random() * products.length);
    jQuery(".wpfomo-buyer-name").text( (products[num].buyer_name) );
    jQuery(".wpfomo-product-name").text( (products[num].product_name) );
    jQuery(".wpfomo-product-thumb").attr('src',products[num].image);
    jQuery(".wpfomo-product-name").attr('href', (products[num].url) );
  }
  
  
  function getTime() {
    var type    = [ "seconds", "minutes" ];
    var typeNo  = Math.floor( Math.random() * type.length );
    var time    = Math.round( Math.random() * 60 ) + 1;
    
    jQuery(".number").text( time );
    jQuery(".type").text( type[typeNo] );
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
    jQuery("#wpfomo").addClass("is-visible");
  }
  
  function hideNotification() {
    jQuery("#wpfomo").removeClass("is-visible");
    setTimeout(function() {
      getProduct();
      getTime();
    }, 500)
  }
  
});