function InitRoomData()
{
    $.ajax({
        url: "GetRoomData.php",
        type: "GET",
        async: false,
    })
        .done(function (data, textStatus, jqXHR) {
            for (let obj of JSON.parse(data)) {
                RoomData.push(obj);
            }
            for (let obj of RoomData) {
                let DivElement =
                    `<div class="d-flex flex-column room_div" style="padding: 40px; color: #ffffff;">
                                                            <div class="room-box">
                                                                <div style="display: flex; justify-content: space-between; flex-direction: row; align-items: center; flex-wrap: wrap;">
                                                                    <h3 id=` +
                    obj.roomtype +
                    `> ` +
                    obj.name +
                    `</h3>
                                                                    <div style="padding:5px;margin:5px;">
                                                                        <h6>Number of Rooms :</h6>
                                                                        <input class="nmupdown" type="number" placeholder="Number of rooms" style="padding: 0px; margin: 0px;" class="form-control-sm" required min="1" value="1">
                                                                    </div>
                                                                    <button type="button" class="btn btn-primary bookbutton hranim" style="min-width: 165px;">Add to cart</button>
                                                                </div>
                                                                <hr style="background-color: #ffffff;">
                                                                <div class="box-m box-xl">
                                                                    <div>
                                                                        <img src="` +
                    obj.image_url +
                    `" style="min-width: 309px; max-width: 327px; border-radius: 10px;">
                                                                    </div>
                                                                    <div class="room-feature" style="padding: 20px;">
                                                                        <h4>Room Features</h4>
                                                                        <hr style="background-color: #ffffff;">
                                                                        <ul>`;

                for (i in JSON.parse(obj.features)) {
                    DivElement += `<li>` + JSON.parse(obj.features)[i] + `</li>`;
                }

                DivElement +=
                    `<li value="` +
                    obj.price +
                    `">` +
                    `RM ` +
                    obj.price +
                    ` per night</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div id="booking-date-xl">
                                                                        <h4>Booking Date</h4>
                                                                        <hr style="background-color: #ffffff;">
                                                                        <input type="text" class="form-control datetimes" style="text-align: center; background-color: #ffffff; color: #000000; border: 0px solid #00000000;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>`;
                $(".box_container").append(DivElement);
            }
        })
        .fail(function (jqXHR, textStatus, errorThrown) { })
        .always(function (jqXHROrData, textStatus, jqXHROrErrorThrown) { });

}

function InitElement()
{
    $(".cart_content").hide();
    $("#checkoutform").hide();

    $("#backbutton").click(function () {
        $("#checkoutform").hide();
    });

    $(".cart_style").on(
        "click",

        function () {
            cartToggle = !cartToggle;

            if (cartToggle) $(".cart_content").show(350);
            else $(".cart_content").hide(350);
        }
    );

    $(".nmupdown").on(
        "scroll change click focus",

        function () {
            let listsize = $(this).parentsUntil(".d-flex").find("li").length;
            let price = $(this)
                .parentsUntil(".d-flex")
                .find("li")
                .eq(listsize - 1)
                .attr("value");
            let thisvalue = $(this).val();

            $(this)
                .parentsUntil(".d-flex")
                .find("li")
                .eq(listsize - 1)
                .text("RM " + thisvalue * price + " per night.");
            //$(this).parentsUntil(".d-flex").find("#totalholder").attr("value",thisvalue * price);
        }
    );

    $(".datetimes").daterangepicker({
        timePicker: true,
        startDate: moment().hours(12).minutes(0).seconds(0),
        endDate: moment().add(1, 'days').hours(12).minutes(0).seconds(0),
        locale: {
            format: 'DD MMM YYYY hh:mm A'
        },
    });

    
}

function OnAddToCart()
{
    $(".bookbutton").click(function () {
        let startDate = $(this)
            .parentsUntil(".d-flex")
            .find(".datetimes")
            .data("daterangepicker").startDate.format("YYYY-MM-DD"); //Ascend until main box div's and find the date picker.
        let endDate = $(this)
            .parentsUntil(".d-flex")
            .find(".datetimes")
            .data("daterangepicker").endDate.format("YYYY-MM-DD"); //Ascend until main box div's and find the date picker.
        let roomtype = $(this).siblings("h3").attr("id"); // Store roomtype in the header.
        let quantity = Number($(this).prev().find("input").val());
        let listsize = $(this).parentsUntil(".d-flex").find("li").length;
        let price = $(this)
            .parentsUntil(".d-flex")
            .find("li")
            .eq(listsize - 1)
            .attr("value");
        //let total = $(this).parentsUntil(".d-flex").find("#totalholder").attr("value"); // Do calculation on script instead relying on stored value at element
        let elementExist = false;
        let existingIndex;
        for (i in InstanceArray) {
            //if there is a roomtype that's the same as the one we're inserting,
            //just increment the 'quantity' field of that existing object
            if (
                InstanceArray[i].roomtype == roomtype &&
                InstanceArray[i].startDate == startDate &&
                InstanceArray[i].endDate == endDate
            ) {
                // 3 attributes need to be the same to be appended to same object
                elementExist = true; // flag for if statement later
                existingIndex = i; // store the index to access later
            }
        }
        console.log(typeof startDate);
        if (elementExist) {
            InstanceArray[existingIndex].quantity += quantity;
            InstanceArray[existingIndex].UpdateTotal();
        } else InstanceArray.push(new Room(startDate, endDate, roomtype, quantity, price));

        InitCart();
    });
}

function InitCart()
{
    $("#cart_list").empty();

        for (i in InstanceArray) {
            $("#cart_list").append(
                "<li>Room type : " + InstanceArray[i].roomtype.toUpperCase() + "</li>"
            );
            $("#cart_list").append(
                "<li>Start Date : " +
                InstanceArray[i].startDate.toUpperCase() +
                "</li>"
            );
            $("#cart_list").append(
                "<li>End Date : " +
                InstanceArray[i].endDate.toUpperCase() +
                "</li>"
            );
            $("#cart_list").append(
                "<li>Quantity : " +
                InstanceArray[i].quantity.toString().toUpperCase() +
                "</li>"
            );
            $("#cart_list").append('<hr style="background-color: #ffffff;">');
        }
}

function OnPaymentCheckout()
{
    $("#payment_checkout").on("click", function () {
        for (let obj of InstanceArray) {
            $.ajax({
                url: "booking.php",
                type: "POST",
                async: false,
                data: {
                    Object: JSON.stringify(obj),
                },
            })
                .done(function (data, textStatus, jqXHR) { })
                .fail(function (jqXHR, textStatus, errorThrown) { })
                .always(function (jqXHROrData, textStatus, jqXHROrErrorThrown) { });
        }

        $.ajax({
            url: "InsertInvoice.php",
            type: "POST",
            async: false,
            data: {
                fname: $("#fname").val(),
                email: $("#email").val(),
                adr: $("#adr").val(),
                city: $("#city").val(),
                state: $("#state").val(),
                zip: $("#zip").val(),
                cname: $("#cname").val(),
                ccnum: $("#ccnum").val(),
                expmonth: $("#expmonth").val(),
                expyear: $("#expyear").val(),
                cvv: $("#cvv").val(),
                total: totalprice,
            },
        })
            .done(function (data, textStatus, jqXHR) {
                alert("You have booked successfully!");
            })
            .fail(function (jqXHR, textStatus, errorThrown) { })
            .always(function (jqXHROrData, textStatus, jqXHROrErrorThrown) { });
    });
}

function OnCheckOutButton()
{
    $("#checkout_btn").on("click", function () {
        let arrObj = [];
        let loopidx = 0;

        for (let obj of InstanceArray) {
            $.ajax({
                url: "CheckRoom.php",
                type: "POST",
                async: false,
                data: {
                    Object: JSON.stringify(obj),
                },
            })
                .done(function (data, textStatus, jqXHR) {
                    if (data == 1) {
                        alert("Cart contained a room with no availability!");
                        arrObj.push(loopidx);
                    }
                })
                .fail(function (jqXHR, textStatus, errorThrown) { })
                .always(function (jqXHROrData, textStatus, jqXHROrErrorThrown) { });

            loopidx++;
        }

        for (i in arrObj) {
            InstanceArray.splice(arrObj[i], 1);
        }

        InitCart();

        $("#checkout_list").empty();
        totalprice = 0;
        for (i in InstanceArray) {
            $("#checkout_list").append(
                "<p><a>" +
                InstanceArray[i].roomtype.toUpperCase() +
                '</a> <span class="price">$' +
                InstanceArray[i].total.toString().toUpperCase() +
                "</span></p>"
            );
            totalprice += InstanceArray[i].total;
        }

        $("#cart_row_num").text(InstanceArray.length);

        $("#cart_total").text("$" + totalprice);

        if (InstanceArray.length > 0) $("#checkoutform").show();
    });
}

function OnFilterButtonClick()
{
    $("#filter_btn").on("click", function () {
        $(".box_container").empty();
        
        for (let room of RoomData) {
            let isAvailable = 0;
            $.ajax({
                url: "CheckRoomScript.php",
                type: "POST",
                async: false,
                data: {
                    roomType: room.roomtype,
                    startDate: $("#bookingdate_filter")
                        .data("daterangepicker")
                        .startDate.format("YYYY-MM-DD"),
                    endDate: $("#bookingdate_filter")
                        .data("daterangepicker")
                        .endDate.format("YYYY-MM-DD"),
                },
            })
                .done(function (data, textStatus, jqXHR) {
                    isAvailable = data;
                })
                .fail(function (jqXHR, textStatus, errorThrown) { })
                .always(function (jqXHROrData, textStatus, jqXHROrErrorThrown) { });

            if (
                (room.roomtype == $("#room_dropdown option:selected").attr("value") &&
                    isAvailable == 0) ||
                ($("#room_dropdown option:selected").attr("value") == "all" &&
                    isAvailable == 0)
            ) {
                let DivElement =
                    `<div class="d-flex flex-column room_div" style="padding: 40px; color: #ffffff;">
                                                                <div class="room-box">
                                                                    <div style="display: flex; justify-content: space-between; flex-direction: row; align-items: center; flex-wrap: wrap;">
                                                                        <h3 id=` +
                    room.roomtype +
                    `> ` +
                    room.name +
                    `</h3>
                                                                        <div style="padding:5px;margin:5px;">
                                                                            <h6>Number of Rooms :</h6>
                                                                            <input class="nmupdown" type="number" placeholder="Number of rooms" style="padding: 0px; margin: 0px;" class="form-control-sm" required min="1" value="1">
                                                                        </div>
                                                                        <button type="button" class="btn btn-primary bookbutton hranim" style="min-width: 165px;">Add to cart</button>
                                                                    </div>
                                                                    <hr style="background-color: #ffffff;">
                                                                    <div class="box-m box-xl">
                                                                        <div>
                                                                            <img src="` +
                    room.image_url +
                    `" style="min-width: 309px; max-width: 327px; border-radius: 10px;">
                                                                        </div>
                                                                        <div class="room-feature" style="padding: 20px;">
                                                                            <h4>Room Features</h4>
                                                                            <hr style="background-color: #ffffff;">
                                                                            <ul>`;

                for (i in JSON.parse(room.features)) {
                    DivElement += `<li>` + JSON.parse(room.features)[i] + `</li>`;
                }

                DivElement +=
                    `<li value="` +
                    room.price +
                    `">` +
                    `RM ` +
                    room.price +
                    ` per night</li>
                                                                            </ul>
                                                                        </div>
                                                                        <div id="booking-date-xl">
                                                                            <h4>Booking Date</h4>
                                                                            <hr style="background-color: #ffffff;">
                                                                            <input type="text" class="form-control datetimes" style="text-align: center; background-color: #ffffff; color: #000000; border: 0px solid #00000000;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>`;
                $(".box_container").append(DivElement);
            }
        }
        InitElement();
        OnAddToCart();
    });
}
