
  paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '<?php echo $totalfin; ?>'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        // Redirigir a pagar.php con los datos
        window.location.href = "./pagar/pagar.php?orderID=" + data.orderID;
      });
    }
  }).render('#paypal-button-container');
