function view_order_details (orderId) {
	$("#overlay").css("display", "block");

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/order/getOrderDetail/"+orderId,
		"method": "GET",
		"headers": {
		  "content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {
		console.log(response);

		userDetails = jQuery.parseJSON(response.data.userDetail);

		$(".pos-product-list").remove();
		$(".pos-order-user-img").remove();

		$("#pos-order-user-img").append('<img class="pos-order-user-img" src="'+userDetails.picture+'" alt="" style="border-radius: 50%;" width="80">');
		$("#pos-order-user-name").text(response.data.userName);
		$("#pos-order-user-mobile").text(userDetails.phone_number);

		$("#order-number-pos").text(response.data.orderNumber);
		$("#order-delivery-type").text(response.data.deliveryType);

		totalAmount = 0;
		for (var i = 0; i < response.data.orderFromDetails.length; i++) {

			price = response.data.orderFromDetails[i].productDetail.price;
			qty = response.data.qty;

			amount = parseInt(price) * parseInt(qty);
			totalAmount = totalAmount + amount;

			status = "<i class='fa fa-times-circle fa-lg' style='color: #ff6c60;' aria-hidden='true'></i>";
			if (response.data.orderFromDetails[i].productDetail.activeInd == "A") {
				status = "<i class='fa fa-check-circle fa-lg' style='color: #89C45B;' aria-hidden='true'></i>";
			}
			number = parseInt(i)+1;
			$("#pos-order-product-list-append").append(
					"<tr class='pos-product-list'>"+
                        "<td>"+number+"</td>"+
                        "<td>"+response.data.orderFromDetails[i].productDetail.productName+"</td>"+
                        "<td>"+response.data.orderFromDetails[i].productDetail.price+"</td>"+
                        "<td>"+response.data.qty+"</td>"+
                        "<td>"+amount+"</td>"+
                        "<td>"+status+"</td>"+
                    "</tr>"
				);
		};

		payable = parseInt(totalAmount)+parseInt(response.data.serviceFee)+parseInt(response.data.gst)

		$("#pos-order-total-amount").text(totalAmount);
		$("#pos-order-service-fee").text(response.data.serviceFee);
		$("#pos-order-gst").text(response.data.gst);
		$("#pos-order-payable").text(payable);
		$("#pos-order-top-amount").text(payable);

		$("#viewOrderDetailsModal").modal();
		$("#overlay").css("display", "none");
	});
}

function view_order_promotion_details (orderId) {
	$("#viewOrderPromotionDetailsModal").modal();
}