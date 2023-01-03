class Room {
    constructor(startDate, endDate, roomtype, quantity, price) {
        this.startDate = startDate;
        this.endDate = endDate;
        this.roomtype = roomtype;
        this.quantity = quantity;
        this.price = price;
        this.UpdateTotal();
    }

    UpdateTotal() {
        this.total = this.price * this.quantity;
        return;
    }
}

var InstanceArray = []; //Store Room objects in here (data that will be sent to database)
var RoomData = []; // Room data from database to be displayed to customer
var cartToggle = false; //Cart button state
var totalprice = 0; 

$(function () {
    InitRoomData(); //Initializes room data,uses AJAX/javascript to display room data instead of using vanilla PHP
    InitElement(); //Event handling,default state of elements(e.g hide element on page load)

    // -------More event handling----------
    OnAddToCart(); 
    OnPaymentCheckout();
    OnCheckOutButton();
    OnFilterButtonClick();
    // -------More event handling----------


});

