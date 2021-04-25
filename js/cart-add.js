function AddToCart(pid) {

    var catname = "AddCart"

  
    $.ajax({
        url: "/control/cart-data-controller.php",
        type: 'POST',
        data: {
            CartAdd: catname,
            pid:pid
        },
        success: function (data, status) {
            alert(data);
        }
    });
    return false;

}
function ReadCartItems() {
    var record = "record";
    $.ajax({
        url: "/control/cart-data-controller.php",
        type: 'POST',
        data: {
            cartRecord: record
        },
        success: function(data, status) {
            $('#cart-manage').html(data);
        }
    });
}
function CartMinus(uname,pname,ammount) {
    var record = "record";
    if(ammount>1){
        $.ajax({
            url: "/control/cart-data-controller.php",
            type: 'POST',
            data: {
                cartMinus: record,
                uname:uname,
                pname:pname
            },
            success: function(data, status) {
                ReadCartItems();
            }
        });
    }
}
function CartPlus(uname,pname,ammount) {
    var record = "record";
    if(ammount<10){
    $.ajax({
        url: "/control/cart-data-controller.php",
        type: 'POST',
        data: {
            cartPlus: record,
            uname:uname,
            pname:pname
        },
        success: function(data, status) {
            ReadCartItems();
        }
    });
}
}
function DeleteItem(uname,pname) {
    var record = "record";
  
    $.ajax({
        url: "/control/cart-data-controller.php",
        type: 'POST',
        data: {
            DeleteItem: record,
            uname:uname,
            pname:pname
        },
        success: function(data, status) {
            ReadCartItems();
        }
    });
}