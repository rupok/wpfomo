jQuery(function() {

  var products = [
    {
      "buyer_name": "Mike",
      "purchase_time": "2017/10/18",
      "product_name": "A cool product",
      "product_image": "https://cdn.shopify.com/s/files/1/1585/6515/files/smart_thumb.png",
      "url": "#"
    },
    {
      "buyer_name": "Tom",
      "purchase_time": "2017/10/18",
      "product_name": "Another cool product",
      "product_image": "https://cdn.shopify.com/s/files/1/1585/6515/files/boost_thumb.png",
      "url": "#"
    },
    {
      "buyer_name": "Vito",
      "purchase_time": "2017/10/18",
      "product_name": "Something great",
      "product_image": "https://cdn.shopify.com/s/files/1/1585/6515/files/relax_thumb.png",
      "url": "#"
    },
    {
      "buyer_name": "Anthony",
      "purchase_time": "2017/10/18",
      "product_name": "One year membership",
      "product_image": "https://cdn.shopify.com/s/files/1/1585/6515/files/sleep_thumb.png",
      "url": "#"
    }
  ];   
  
  getProduct();
  getTime();
  
  // Get and bind the values
  function getProduct() {
    var num = Math.floor(Math.random() * products.length);
    jQuery(".wpfomo-buyer-name").text( (products[num].buyer_name) );
    jQuery(".wpfomo-product-name").text( (products[num].product_name) );
    jQuery(".wpfomo-product-thumb").attr('src',products[num].product_image);
    jQuery(".wpfomo-product-name").attr('href', (products[num].url) );
  }
  
  // Random time (temp)
  function getTime() {
    var type    = [ "seconds", "minutes" ];
    var typeNo  = Math.floor( Math.random() * type.length );
    var time    = Math.round( Math.random() * 60 ) + 1;
    
    jQuery(".number").text( time );
    jQuery(".type").text( type[typeNo] );
  }

  // Loop the notification
  (function loop() {
      var rand = Math.round(Math.random() * 5000 ) + 8000;
      setTimeout(function() {
        changeNotification();
        loop();  
      }, rand);
  }());

  // Change notification
  function changeNotification() {
    showNotification();
    setTimeout(function() {
      hideNotification();
    }, 5000) // duration
  }
  
  // Show notification
  function showNotification() {
    jQuery("#wpfomo").addClass("is-visible");
  }
  
  // Hide notification
  function hideNotification() {
    jQuery("#wpfomo").removeClass("is-visible");
    setTimeout(function() {
      getProduct();
      getTime();
    }, 500)
  }
  
});