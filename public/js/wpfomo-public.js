jQuery(function() {

  getProduct();
  // getTime();
  // Get and bind the values
  function getProduct() {
    var num = Math.floor(Math.random() * settings.buyer_name.length);

    jQuery(".wpfomo-buyer-name").text( (settings.buyer_name[num]) );
    jQuery(".wpfomo-product-name").text( (settings.product_name[num]) );
    jQuery(".wpfomo-secondary-text").text( (settings.purchase_time[num]) );
    jQuery(".wpfomo-product-thumb").attr('src',settings.product_image[num]);
    jQuery(".wpfomo-product-name").attr('href', (settings.custom_url[num]) );
    
    
  }
  
  // Random time (temp)
  // function getTime() {
  //   var type    = [ "seconds", "minutes" ];
  //   var typeNo  = Math.floor( Math.random() * type.length );
  //   var time    = Math.round( Math.random() * 60 ) + 1;
    
  //   jQuery(".number").text( time );
  //   jQuery(".type").text( type[typeNo] );
  // }

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
      // getTime();
    }, 500)
  }

});