$('.remotogler').click(function(){
    db_prod_id = $(this).attr('data-db_prod_id')
     $('#db_prod_id').val(db_prod_id)
     
         
      db_prod_name = $(this).attr('data-db_prod_name')
     $('#db_prod_nameDisplay').text(db_prod_name)
     })

function redirectToRemoveCart(cartId) {
        window.location.href = "singleRemove.php?remove_id=" + cartId;
    }
    
    
    