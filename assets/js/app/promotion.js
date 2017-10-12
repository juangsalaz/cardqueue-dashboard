$("#create-category-promotion-btn").click(function() {
	$("#overlay").css("display", "block");

	compId 			= $("#category-company-id").val();
	categoryName 	= $("#promotion-category-name").val();

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promotion/category",
		"method": "POST",
		"headers": {
		  "content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"compId\":\""+compId+"\", \r\n\"categoryName\":\""+categoryName+"\", \r\n\"activeInd\":\"A\"}"
	}

	$.ajax(settings).done(function (response) {
		alert("Create promotion category successfuly");
		$("#promotion-category-name").val("");

		var settings = {
			"async": true,
			"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promotion/category/all/"+compId,
			"method": "GET",
			"headers": {
			  "content-type": "application/json"
			},
			"processData": false
		}

		$.ajax(settings).done(function (response) {
			$(".promotion-category-list").remove();

			for (var i = 0; i < response.data.Items.length; i++) {
				if (response.data.Items[i].activeInd == 'A') {
					block_unblock = '<td><a href="#" id="company-promotion-category-link-'+response.data.Items[i]._id+'" onclick="block_promotion_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-check-circle fa-lg" id="company-promotion-category-'+response.data.Items[i]._id+'" aria-hidden="true" style="color: #89C45B;"></i></a></td>';
				} else {
					block_unblock = '<td><a href="#" id="company-promotion-category-link-'+response.data.Items[i]._id+'" onclick="unblock_promotion_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-ban fa-lg" id="company-promotion-category-'+response.data.Items[i]._id+'" aria-hidden="true" style="color: #ff6c60;"></i></a></td>';
				}

				if (response.data.Items[i].totalPromotions == 0) {
					block_unblock = '<td><a href="#" onclick="delete_promotion_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>';
				}

				$("#promotion-category-append").append(
					'<tr class="promotion-category-list">'+
						'<td><input type="text" class="form-control" value="'+response.data.Items[i].categoryName+'" id="input-'+response.data.Items[i]._id+'" style="display: none;"> <span id="span-'+response.data.Items[i]._id+'">'+response.data.Items[i].categoryName+'</span></td>'+
						'<td>'+response.data.Items[i].totalPromotions+'</td>'+
						'<td><a id="update-category-link-'+response.data.Items[i]._id+'" href="#" onclick="update_category(\'' + response.data.Items[i]._id + '\')"><i id="edit-icon-'+response.data.Items[i]._id+'" class="fa fa-pencil" aria-hidden="true"></i></a> <a id="cancel-icon-link-'+response.data.Items[i]._id+'" href="#" onclick="cancel_edit_category(\'' + response.data.Items[i]._id + '\')" style="display: none;"><i id="cancel-icon-'+response.data.Items[i]._id+'" class="fa fa-times" aria-hidden="true"></i></a></td>'+
						block_unblock+
					'</tr>');
			};

			$("#overlay").css("display", "none");
		});

	}).fail(function (response) {
		alert("Create promotion category failed");
		$("#overlay").css("display", "none");
		$btn.button('reset');
	});
});

function add_new_promotion_category_modal(compId) {
	$("#overlay").css("display", "block");

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promotion/category/all/"+compId,
		"method": "GET",
		"headers": {
		  "content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {
		$(".promotion-category-list").remove();

		for (var i = 0; i < response.data.Items.length; i++) {
			if (response.data.Items[i].activeInd == 'A') {
				block_unblock = '<td><a href="#" id="company-promotion-category-link-'+response.data.Items[i]._id+'" onclick="block_promotion_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-check-circle fa-lg" id="company-promotion-category-'+response.data.Items[i]._id+'" aria-hidden="true" style="color: #89C45B;"></i></a></td>';
			} else {
				block_unblock = '<td><a href="#" id="company-promotion-category-link-'+response.data.Items[i]._id+'" onclick="unblock_promotion_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-ban fa-lg" id="company-promotion-category-'+response.data.Items[i]._id+'" aria-hidden="true" style="color: #ff6c60;"></i></a></td>';
			}

			if (response.data.Items[i].totalPromotions == 0) {
				block_unblock = '<td><a href="#" onclick="delete_promotion_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>';
			}

			$("#promotion-category-append").append(
				'<tr class="promotion-category-list">'+
					'<td><input type="text" class="form-control" value="'+response.data.Items[i].categoryName+'" id="input-'+response.data.Items[i]._id+'" style="display: none;"> <span id="span-'+response.data.Items[i]._id+'">'+response.data.Items[i].categoryName+'</span></td>'+
					'<td>'+response.data.Items[i].totalPromotions+'</td>'+
					'<td><a id="update-category-link-'+response.data.Items[i]._id+'" href="#" onclick="update_category(\'' + response.data.Items[i]._id + '\')"><i id="edit-icon-'+response.data.Items[i]._id+'" class="fa fa-pencil" aria-hidden="true"></i></a> <a id="cancel-icon-link-'+response.data.Items[i]._id+'" href="#" onclick="cancel_edit_category(\'' + response.data.Items[i]._id + '\')" style="display: none;"><i id="cancel-icon-'+response.data.Items[i]._id+'" class="fa fa-times" aria-hidden="true"></i></a></td>'+
					block_unblock+
				'</tr>');
		};

		$("#addNewPromotionCategory").modal();
		$("#overlay").css("display", "none");
	});
}

function block_promotion_category (categoryId) {
	$("#overlay").css("display", "block");

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promotion/category/update/"+categoryId,
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"activeInd\":\"I\"}"
	}

	$.ajax(settings).done(function (response) {
		$("#company-promotion-category-"+categoryId).attr('class', 'fa fa-ban fa-lg');
		$("#company-promotion-category-"+categoryId).css('color', '#ff6c60');
		
		$("#company-promotion-category-link-"+categoryId).attr("onclick", "unblock_promotion_category('"+categoryId+"')");

		alert("Block promotion category successfuly");
		$("#overlay").css("display", "none");
	});
}

function unblock_promotion_category (categoryId) {
	$("#overlay").css("display", "block");

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promotion/category/update/"+categoryId,
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"activeInd\":\"A\"}"
	}

	$.ajax(settings).done(function (response) {
		$("#company-promotion-category-"+categoryId).attr('class', 'fa fa-check-circle fa-lg');
		$("#company-promotion-category-"+categoryId).css('color', '#89C45B');
		
		$("#company-promotion-category-link-"+categoryId).attr("onclick", "block_promotion_category('"+categoryId+"')");

		alert("Unblock promotion category successfuly");
		$("#overlay").css("display", "none");
	});
}

function delete_promotion_category (category_id) {
	$("#overlay").css("display", "block");

	compId = $("#category-company-id").val();

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promotion/category/"+category_id,
		"method": "DELETE",
		"headers": {
			"content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {
		alert("Delete Promotion Category successfuly");

		var settings = {
			"async": true,
			"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promotion/category/all/"+compId,
			"method": "GET",
			"headers": {
			  "content-type": "application/json"
			},
			"processData": false
		}

		$.ajax(settings).done(function (response) {

			$(".promotion-category-list").remove();

			for (var i = 0; i < response.data.Items.length; i++) {
				if (response.data.Items[i].activeInd == 'A') {
					block_unblock = '<td><a href="#" id="company-promotion-category-link-'+response.data.Items[i]._id+'" onclick="block_promotion_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-check-circle fa-lg" id="company-promotion-category-'+response.data.Items[i]._id+'" aria-hidden="true" style="color: #89C45B;"></i></a></td>';
				} else {
					block_unblock = '<td><a href="#" id="company-promotion-category-link-'+response.data.Items[i]._id+'" onclick="unblock_promotion_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-ban fa-lg" id="company-promotion-category-'+response.data.Items[i]._id+'" aria-hidden="true" style="color: #ff6c60;"></i></a></td>';
				}

				if (response.data.Items[i].totalPromotions == 0) {
					block_unblock = '<td><a href="#" onclick="delete_promotion_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>';
				}

				$("#promotion-category-append").append(
					'<tr class="promotion-category-list">'+
						'<td><input type="text" class="form-control" value="'+response.data.Items[i].categoryName+'" id="input-'+response.data.Items[i]._id+'" style="display: none;"> <span id="span-'+response.data.Items[i]._id+'">'+response.data.Items[i].categoryName+'</span></td>'+
						'<td>'+response.data.Items[i].totalPromotions+'</td>'+
						'<td><a id="update-category-link-'+response.data.Items[i]._id+'" href="#" onclick="update_category(\'' + response.data.Items[i]._id + '\')"><i id="edit-icon-'+response.data.Items[i]._id+'" class="fa fa-pencil" aria-hidden="true"></i></a> <a id="cancel-icon-link-'+response.data.Items[i]._id+'" href="#" onclick="cancel_edit_category(\'' + response.data.Items[i]._id + '\')" style="display: none;"><i id="cancel-icon-'+response.data.Items[i]._id+'" class="fa fa-times" aria-hidden="true"></i></a></td>'+
						block_unblock+
					'</tr>');
			};

			$("#overlay").css("display", "none");
		});
	});
}

function update_category (category_id) {
	$("#input-"+category_id).show();
	$("#span-"+category_id).hide();
	$("#edit-icon-"+category_id).attr('class', 'fa fa-floppy-o fa-lg');
	$("#cancel-icon-link-"+category_id).show();
	$("#update-category-link-"+category_id).attr("onclick", "edit_category('"+category_id+"')");
}

function cancel_edit_category (category_id) {
	$("#cancel-icon-link-"+category_id).hide();
	$("#update-category-link-"+category_id).attr("onclick", "update_category('"+category_id+"')");
	$("#edit-icon-"+category_id).attr('class', 'fa fa-pencil fa-lg');
	$("#input-"+category_id).hide();
	$("#span-"+category_id).show();
}

function edit_category (category_id) {
	$("#overlay").css("display", "block");

	company_id = $("#category-company-id").val();
	category_name = $("#input-"+category_id).val();

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promotion/category/update/"+category_id,
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"compId\":\""+company_id+"\", \r\n\"categoryName\":\""+category_name+"\"}"
	}

	$.ajax(settings).done(function (response) {
		alert("Update category successfuly");
		$("#overlay").css("display", "none");
		$("#input-"+category_id).hide();
		$("#span-"+category_id).text(category_name);
		$("#span-"+category_id).show();
		$("#cancel-icon-link-"+category_id).hide();
		$("#update-category-link-"+category_id).attr("onclick", "update_category('"+category_id+"')");
		$("#edit-icon-"+category_id).attr('class', 'fa fa-pencil fa-lg');
	});
}

function add_new_promotion_modal (company_id) {
	$("#overlay").css("display", "block");

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promotion/category/all/"+company_id,
		"method": "GET",
		"headers": {
		  "content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {
		$(".category-list-combo").remove();
		
		for (var i = 0; i < response.data.Items.length; i++) {
			if (response.data.Items[i].activeInd == 'A') {
				$("#create-promotion-category").append(
						'<option value="'+response.data.Items[i]._id+'" class="category-list-combo">'+response.data.Items[i].categoryName+'</option>'
					);
			}
		};

		$("#addNewPromotionModal").modal();
		$("#overlay").css("display", "none");
	}).fail(function (response) {
		alert("Get category data failed.");
	});
}

function create_promotion_validation() {
	if ($("#create-promotion-category").val() == "") {
		alert('Product category is required.');
		return false;
	}

	if ($("#create-promotion-name").val() == "") {
		alert('Product name is required.');
		return false;
	}

	if ($("#create-promotion-description").val() == "") {
		alert('Promotion description is required.');
		return false;
	}
 
 	if (typeof $('#create-promotion-picture').prop('files')[0] == "undefined") {
		alert('Promotion picture is required.');
		return false;
	}

	if (typeof $('#create-promotion-icon').prop('files')[0] == "undefined") {
		alert('Promotion icon is required.');
		return false;
	}

	if ($("#create-promotion-start-date").val() == "") {
		alert('Promotion start date is required.');
		return false;
	}

	if ($("#create-promotion-end-date").val() == "") {
		alert('Promotion end date is required.');
		return false;
	}

	if ($("#create-promotion-validity-period").val() == "") {
		alert('Validity period is required.');
		return false;
	}

	if ($("#create-promotion-type").val() == "") {
		alert('Promotion type is required.');
		return false;
	} else {
		if ($("#create-promotion-type").val() == 'value') {
			if ($("#create-promotion-value").val() == "") {
				alert('Promotion value is required.');
				return false;
			}

			if ($("#create-promotion-quantity").val() == "") {
				alert('Promotion quantity is required.');
				return false;
			}
		} else {
			$("#create-promotion-value").val(0)
			$("#create-promotion-quantity").val(0)
		}
	}

	if ($("#create-promotion-standard-price").val() == "") {
		alert('standard price is required.');
		return false;
	}

	if ($("#create-promotion-special-price").val() == "") {
		alert('Special price is required.');
		return false;
	}

	if ($("#promotion-policy").val() == "") {
		alert('Terms & Policy is required.');
		return false;
	}

	return true;
}

$("#create-promotion-btn").click(function(){
	if (create_promotion_validation()) {
		$("#overlay").css("display", "block");

		var file_data = $('#create-promotion-picture').prop('files')[0];   
		var form_data = new FormData();
		form_data.append('file', file_data);

		$.ajax({
			url:"promotion/upload_promotion_picture",
			dataType: 'text',
			    cache: false,
			    contentType: false,
			    processData: false,
			    data: form_data,                         
			    type: 'post',
			success:function(data) {

				promotionImgUrl = data;

				var file_data = $('#create-promotion-icon').prop('files')[0];   
				var form_data = new FormData();
				form_data.append('file', file_data);

				$.ajax({
					url:"promotion/upload_promotion_picture",
					dataType: 'text',
					    cache: false,
					    contentType: false,
					    processData: false,
					    data: form_data,                         
					    type: 'post',
					success:function(data) {
						
						promotionIconUrl = data;

						promotion_policy = $("#promotion-policy").val();

						var object = {};

						object.compId = $("#category-company-id").val();
						object.categoryId = $("#create-promotion-category").val();
						object.promoName = $("#create-promotion-name").val();

						promotion_description = $("#create-promotion-description").val();
						promotion_description = promotion_description.replace(/(?:\r\n|\r|\n)/g, '<br />');
						promotion_description = promotion_description.replace(/\s/g, '&nbsp;');
						promotion_description = promotion_description.replace(/"/g, "&quot;");

						object.promoDesc = promotion_description;
						object.promoImage = promotionImgUrl;
						object.promoIcon = promotionIconUrl;
						object.startDate = $("#create-promotion-start-date").val();
						object.endDate = $("#create-promotion-end-date").val();
						object.validPeriod = $("#create-promotion-validity-period").val();
						object.standardPrice = $("#create-promotion-standard-price").val();
						object.specialPrice = $("#create-promotion-special-price").val();
						object.promoType = $("#create-promotion-type").val();
						
						promotion_policy = promotion_policy.replace(/(?:\r\n|\r|\n)/g, '<br />');
						promotion_policy = promotion_policy.replace(/\s/g, '&nbsp;');
						promotion_policy = promotion_policy.replace(/"/g, "&quot;");

						object.policyTxt = promotion_policy;

						member_disc = $("input[name=member_disc]:checked").val();

						member = "Yes";
						if (member_disc == 0) {
							member = "No";
						}

						object.isMemberDiscount = member;
						object.promoUnitValue = $("#create-promotion-value").val();
						object.promoTotalValueQty = $("#create-promotion-quantity").val();

						//note : this method is missing value and isDiscountMember payload

						data = JSON.stringify(object);

						var settings = {
							"async": true,
							"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promo",
							"method": "POST",
							"headers": {
							  "content-type": "application/json"
							},
							"processData": true,
							"data": data
						}

						$.ajax(settings).done(function (response) {
							alert("Create promotion successfuly");
							location.reload();
						}).fail(function (response) {
							alert("Create promotion failed");
							$("#overlay").css("display", "none");
						});
					}
				});
			}
		});
	}
});

function block_promotion(promotion_id)
{
	$("#block-promotion-id").val(promotion_id);
	$("#blockPromotionModal").modal();
}

$("#block-promotion-btn").click(function(){
	var $btn = $("#block-promotion-btn").button('loading');

	promotion_id = $("#block-promotion-id").val();

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promo/update/"+promotion_id,
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"activeInd\":\"I\"}"
	}

	$.ajax(settings).done(function (response) {

		$("#company-promotion-"+promotion_id).attr('class', 'fa fa-ban fa-lg');
		$("#company-promotion-"+promotion_id).css('color', '#ff6c60');
		
		$("#company-promotion-link-"+promotion_id).attr("onclick", "unblock_promotion('"+promotion_id+"')");

		alert("block promotion successfuly");

		$("#blockPromotionModal").modal('hide');

		$btn.button('reset');
	});
});

function unblock_promotion(promotion_id)
{
	$("#unblock-promotion-id").val(promotion_id);
	$("#unblockPromotionModal").modal();
}

$("#unblock-promotion-btn").click(function(){
	var $btn = $("#unblock-promotion-btn").button('loading');

	promotion_id = $("#unblock-promotion-id").val();

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promo/update/"+promotion_id,
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"activeInd\":\"A\"}"
	}

	$.ajax(settings).done(function (response) {

		$("#company-promotion-"+promotion_id).attr('class', 'fa fa-check-circle fa-lg');
		$("#company-promotion-"+promotion_id).css('color', '#89C45B');
		
		$("#company-promotion-link-"+promotion_id).attr("onclick", "block_promotion('"+promotion_id+"')");

		alert("unblock promotion successfuly");

		$("#unblockPromotionModal").modal('hide');

		$btn.button('reset');
	});
});

function delete_promotion_modal (promotion_id) 
{
	$("#delete-promotion-id").val(promotion_id);
	$("#deletePromotionModal").modal();
}

$("#delete-promotion-btn").click(function(){
	var $btn = $("#delete-promotion-btn").button('loading');

	$("#overlay").css("display", "block");

	promotion_id = $("#delete-promotion-id").val();

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promo/delete/"+promotion_id,
		"method": "DELETE",
		"headers": {
			"content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {
		alert("Delete promotion successfuly");
		location.reload();
	});
});

function update_promotion_modal (promotion_id) 
{
	$("#overlay").css("display", "block");

	company_id = $("#category-company-id").val()

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promotion/category/all/"+company_id,
		"method": "GET",
		"headers": {
		  "content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {
		$(".edit-category-list-combo").remove();
		
		for (var i = 0; i < response.data.Items.length; i++) {
			if (response.data.Items[i].activeInd == 'A') {
				$("#edit-promotion-category").append(
						'<option value="'+response.data.Items[i]._id+'" class="edit-category-list-combo">'+response.data.Items[i].categoryName+'</option>'
					);
			}
		};

		var settings = {
		  "async": true,
		  "url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promo/getById/"+promotion_id,
		  "method": "GET",
		  "headers": {
		    "content-type": "application/json"
		    },
		  "processData": false
		}

		$.ajax(settings).done(function (response) {

			console.log(response);

			$(".edit-promotion-img-append").remove();
			
			if (response.data.promoImage != "") {
				$("#append-promotion-picture").append('<img class="edit-promotion-img-append" src="'+response.data.promoImage+'" width="100">');
			}

			$("#old_promotion_picture").val(response.data.promoImage);
			
			if (response.data.promoIcon != "") {
				$("#append-promotion-icon").append('<img class="edit-promotion-img-append" src="'+response.data.promoIcon+'" width="100">');
			}
			$("#old_promotion_icon").val(response.data.promoIcon);
			
			$("#edit-promotion-id").val(response.data._id);
			$("#edit-promotion-category").val(response.data.categoryId);
			$("#edit-promotion-name").val(response.data.promoName);

			description = response.data.promoDesc;
		    var regex = /<br\s*[\/]?>/gi;
		    description = description.replace(/&nbsp;/gi," ");
		    description = description.replace(regex, "\n");
		    description = description.replace(/&quot;/g, '\\"');
			
			standardPrice = '';
		    if (typeof response.data.standardPrice != "undefined") {
		    	standardPrice = response.data.standardPrice;
		    }

			$("#edit-promotion-start-date").val(response.data.startDate);
			$("#edit-promotion-end-date").val(response.data.endDate);
			$("#edit-promotion-validity-period").val(response.data.validPeriod);
			$("#edit-promotion-type").val(response.data.promoType);

			if (response.data.promoType == 'value') {
				$("#edit-promotion-value").val(response.data.promoUnitValue);
				$("#edit-promotion-quantity").val(response.data.promoTotalValueQty);
			} else {
				$("#edit-promotion-value-div").hide();
				$("#edit-promotion-value").val(0);
				$("#edit-promotion-quantity").val(0);
			}
			
			$("#edit-promotion-description").val(description);
			$("#edit-promotion-standard-price").val(standardPrice);
			$("#edit-promotion-special-price").val(response.data.specialPrice);

			policyTerms = response.data.policyTxt;
			var regex = /<br\s*[\/]?>/gi;
		    policyTerms = policyTerms.replace(/&nbsp;/gi," ");
		    policyTerms = policyTerms.replace(regex, "\n");
		    policyTerms = policyTerms.replace(/&quot;/g, '\\"');

			$("#edit-promotion-policy").val(policyTerms);
			
			if (typeof response.data.isMemberDiscount != "undefined") {
				if (response.data.isMemberDiscount == 'Yes') {
					$("#edit-member-disc-yes").prop('checked', true);
				} else {
					$("#edit-member-disc-no").prop('checked', true);
				}
			}

			$("#editPromotionModal").modal();
			$("#overlay").css("display", "none");
		});

	}).fail(function (response) {
		alert("Get category data failed.");
	});
}

$("#edit-promotion-btn").click(function(){
	$("#overlay").css("display", "block");

	old_promotion_picture = $("#old_promotion_picture").val();

	var file_data = $('#edit-promotion-picture').prop('files')[0];   
	var form_data = new FormData();
	form_data.append('file', file_data);

	$.ajax({
		url:"promotion/upload_promotion_picture",
		dataType: 'text',
		    cache: false,
		    contentType: false,
		    processData: false,
		    data: form_data,                         
		    type: 'post',
		success:function(data) {

			promotionImgUrl = old_promotion_picture;
			if (data != "") {
				promotionImgUrl = data;
			}

			old_promotion_icon = $("#old_promotion_icon").val();
			var file_data = $('#edit-promotion-icon').prop('files')[0];   
			var form_data = new FormData();
			form_data.append('file', file_data);

			$.ajax({
				url:"promotion/upload_promotion_picture",
				dataType: 'text',
				    cache: false,
				    contentType: false,
				    processData: false,
				    data: form_data,                         
				    type: 'post',
				success:function(data) {
					
					promotionIconUrl = old_promotion_icon;
					if (data != "") {
						promotionIconUrl = data;
					}

					promotion_policy = $("#edit-promotion-policy").val();

					var object = {};

					object.compId = $("#category-company-id").val();
					object.categoryId = $("#edit-promotion-category").val();
					object.promoName = $("#edit-promotion-name").val();

					promotion_description = $("#edit-promotion-description").val();
					promotion_description = promotion_description.replace(/(?:\r\n|\r|\n)/g, '<br />');
					promotion_description = promotion_description.replace(/\s/g, '&nbsp;');
					promotion_description = promotion_description.replace(/"/g, "&quot;");

					object.promoDesc = promotion_description;
					object.promoImage = promotionImgUrl;
					object.promoIcon = promotionIconUrl;
					object.startDate = $("#edit-promotion-start-date").val();
					object.endDate = $("#edit-promotion-end-date").val();
					object.validPeriod = $("#edit-promotion-validity-period").val();
					object.standardPrice = $("#edit-promotion-standard-price").val();
					object.specialPrice = $("#edit-promotion-special-price").val();
					object.promoType = $("#edit-promotion-type").val();
					
					promotion_policy = promotion_policy.replace(/(?:\r\n|\r|\n)/g, '<br />');
					promotion_policy = promotion_policy.replace(/\s/g, '&nbsp;');
					promotion_policy = promotion_policy.replace(/"/g, "&quot;");

					object.policyTxt = promotion_policy;

					member_disc = $("input[name=edit_promo_member_disc]:checked").val();

					member = "Yes";
					if (member_disc == 0) {
						member = "No";
					}

					object.isMemberDiscount = member;
					object.promoUnitValue = $("#edit-promotion-value").val();
					object.promoTotalValueQty = $("#edit-promotion-quantity").val();

					promotion_id = $("#edit-promotion-id").val();

					data = JSON.stringify(object);

					var settings = {
						"async": true,
						"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promo/update/"+promotion_id,
						"method": "PUT",
						"headers": {
						  "content-type": "application/json"
						},
						"processData": true,
						"data": data
					}

					$.ajax(settings).done(function (response) {
						alert("Edit promotion successfuly");
						location.reload();
					}).fail(function (response) {
						alert("Edit promotion failed");
						$("#overlay").css("display", "none");
					});
				}
			});
		}
	});
});

function add_promotion_branch_modal (promotionId) {
	$("#overlay").css("display", "block");

	$(".branch-list-append").remove();
	$("#branch-promotion-id").val(promotionId);

	productName = $("#branch-promotion-name-"+promotionId).val();

	$("#assign-branch-promotion-name").text(productName);

	company_id = $("#category-company-id").val();

	var settings = {
	  "async": true,
	  "url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promo/getBranchQty/"+company_id+"/"+promotionId,
	  "method": "GET",
	  "headers": {
	    "content-type": "application/json"
	    },
	  "processData": false
	}

	$.ajax(settings).done(function (response) {
		total_branch_qty = 0;
		total_branch_sold = 0;
		total_branch_balance = 0;
		total_branch_claimed = 0;

		for (var i = 0; i < response.data.length; i++) {
			block_btn = '<td><a href="#" id="company-promotion-branch-link-'+i+'" onclick="block_promotion_branch(\''+response.data[i]._id+'\', \''+i+'\')"><i class="fa fa-check-circle fa-lg" id="company-promotion-branch-'+i+'" aria-hidden="true" style="color: #89C45B;"></i></a></td>';
			if (response.data[i].activeInd == 'I') {
				block_btn = '<td><a href="#" id="company-promotion-branch-link-'+i+'" onclick="unblock_promotion_branch(\''+response.data[i]._id+'\', \''+i+'\')"><i class="fa fa-ban fa-lg" id="company-promotion-branch-'+i+'" aria-hidden="true" style="color: #ff6c60;"></i></a></td>';	
			} 

			stockQty = response.data[i].promoQty;
			// stockSold = response.data[i].stockSold;
			stockSold = 0;

			//balance = parseInt(stockQty) - parseInt(stockSold);
			balance = stockQty;
			$("#assign-promotion-branch-list").append(
					'<tr class="branch-list-append">'+
                        '<td>'+response.data[i].branchId+'</td>'+
                        '<td><input type="text" id="input-promotion-stock-qty-'+i+'" value="'+response.data[i].promoQty+'" class="form-control input-promotion-stock-qty-value" style="display: none;"><span id="span-promotion-stock-qty-'+i+'">'+response.data[i].promoQty+'</span></td>'+
                        '<td><input type="text" id="input-promotion-stock-sold-'+i+'" value="0" style="display: none;"><span id="span-promotion-stock-sold-'+i+'">0</span></td>'+
                        '<td><input type="text" id="input-claimed-'+i+'" value="0" style="display: none;"><span id="span-claimed-'+i+'">0</span></td>'+
                        '<td><input type="text" id="input-promotion-stock-balance-'+i+'" value="'+balance+'" style="display: none;"><span id="span-promotion-stock-balance-'+i+'">'+balance+'</span></td>'+
                        '<td><a href="#" id="edit-promotion-branch-qty-link-'+i+'" onclick="update_promotion_branch_qty(\''+i+'\', \''+response.data[i].branchId+'\', \''+response.data[i].activeInd+'\', \''+response.data[i].promoId+'\', \''+response.data[i]._id+'\')"><i id="edit-promotion-branch-qty-icon-'+i+'" class="fa fa-pencil fa-lg" aria-hidden="true"></i></a> <a id="cancel-edit-promotion-branch-qty-icon-link-'+i+'" href="#" onclick="cancel_edit_promotion_branch_qty(\'' +i+ '\')" style="display: none;"><i id="edit-promotion-branch-qty-cancel-icon-'+i+'" class="fa fa-times" aria-hidden="true"></i></a></td>'+
                        block_btn+
                    '</tr>'
				);

			branch_qty_value = $("#input-promotion-stock-qty-"+i).val();
			total_branch_qty = total_branch_qty + parseInt(branch_qty_value);
			$("#total_promotion_quantity").text(total_branch_qty);

			branch_qty_sold = $("#input-promotion-stock-sold-"+i).val();
			total_branch_sold = total_branch_sold + parseInt(branch_qty_sold);
			$("#total_promotion_sold").text(total_branch_sold);

			branch_balance_value = $("#input-promotion-stock-balance-"+i).val();
			total_branch_balance = total_branch_balance + parseInt(branch_balance_value);
			$("#total_promotion_balance").text(total_branch_balance);

			branch_claimed_value = $("#input-claimed-"+i).val();
			total_branch_claimed = total_branch_claimed + parseInt(branch_claimed_value);
			$("#total_promotion_claimed").text(total_branch_claimed);
		};

		var settings = {
			"async": true,
			"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/category/all/"+company_id,
			"method": "GET",
			"headers": {
			  "content-type": "application/json"
			},
			"processData": false
		}

		$.ajax(settings).done(function (response) {
			$(".promotion-category-list-combo").remove();
			
			for (var i = 0; i < response.data.Items.length; i++) {

				$("#promotion-category-product").append(
						'<option value="'+response.data.Items[i]._id+'" class="promotion-category-list-combo">'+response.data.Items[i].categoryName+'</option>'
					);
			};
		});

		var settings = {
			"async": true,
			"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promo/product/getProducts/"+promotionId,
			"method": "GET",
			"headers": {
				"content-type": "application/json"
			},
			"processData": false
		}

		$.ajax(settings).done(function (response) {
			$(".product-promotion-list").remove();
			for (var i = 0; i < response.data.Items.length; i++) {
				$("#append-product-promotion").append(
						'<tr class="product-promotion-list">'+
							'<td>'+response.data.Items[i].categoryName+'</td>'+
							'<td>'+response.data.Items[i].productName+'</td>'+
							'<td>'+response.data.Items[i].productItemQty+'</td>'+
							'<td><a href="#" onclick="delete_promotion_product(\''+response.data.Items[i]._id+'\', \''+response.data.Items[i].promoId+'\')"><i class="fa fa-trash fa-lg"></i></a></td>'+
						'</tr>'
					);
			};
		});

		$("#assignQtyBranchModal").modal();
	    $("#overlay").css("display", "none");
	});
	
}

$("#promotion-category-product").change(function(){
	$("#overlay").css("display", "block");

	categoryId = $("#promotion-category-product").val();

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/product/getByCategory/"+categoryId,
		"method": "GET",
		"headers": {
		  "content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {
		$(".promotion-product-list-combo").remove();
		
		for (var i = 0; i < response.data.Items.length; i++) {

			$("#promotion-product-name").append(
					'<option value="'+response.data.Items[i]._id+'" class="promotion-product-list-combo">'+response.data.Items[i].productName+'</option>'
				);
		};

		$("#overlay").css("display", "none");
	}).fail(function (response) {
		alert('get product failed.');
	});
});

function block_promotion_branch(_id, id) {
	$("#overlay").css("display", "block");

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promo/BranchQty/status/"+_id+"/I",
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {

		$("#company-promotion-branch-"+id).attr('class', 'fa fa-ban fa-lg');
		$("#company-promotion-branch-"+id).css('color', '#ff6c60');
		
		$("#company-promotion-branch-link-"+id).attr("onclick", "unblock_promotion_branch('"+_id+"', '"+id+"')");

		alert("block promotion branch successfuly");
		$("#overlay").css("display", "none");
	});
}

function unblock_promotion_branch(_id, id) {
	$("#overlay").css("display", "block");

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promo/BranchQty/status/"+_id+"/A",
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {

		$("#company-promotion-branch-"+id).attr('class', 'fa fa fa-check-circle fa-lg');
		$("#company-promotion-branch-"+id).css('color', '#89C45B');
		
		$("#company-promotion-branch-link-"+id).attr("onclick", "block_promotion_branch('"+_id+"', '"+id+"')");

		alert("unblock promotion branch successfuly");
		$("#overlay").css("display", "none");
	});
}

function update_promotion_branch_qty(id, branchId, activeInd, promoId, _id) {
	$("#input-promotion-stock-qty-"+id).show();
	$("#span-promotion-stock-qty-"+id).hide();
	$("#edit-promotion-branch-qty-icon-"+id).attr('class', 'fa fa-floppy-o fa-lg');
	$("#cancel-edit-promotion-branch-qty-icon-link-"+id).show();
	$("#edit-promotion-branch-qty-link-"+id).attr("onclick", "edit_promotion_branch_qty_process('"+id+"', '"+branchId+"', '"+activeInd+"', '"+promoId+"', '"+_id+"')");
}

function cancel_edit_promotion_branch_qty(id) {
	$("#cancel-edit-promotion-branch-qty-icon-link-"+id).hide();
	$("#edit-promotion-branch-qty-link-"+id).attr("onclick", "update_promotion_branch_qty('"+id+"')");
	$("#edit-promotion-branch-qty-icon-"+id).attr('class', 'fa fa-pencil fa-lg');
	$("#input-promotion-stock-qty-"+id).hide();
	$("#span-promotion-stock-qty-"+id).show();
}

function edit_promotion_branch_qty_process(id, branchId, activeInd, promoId, _id) {

	$("#overlay").css("display", "block");

	company_id = $("#category-company-id").val();
	promoQty = $("#input-promotion-stock-qty-"+id).val();

	total_branch_qty = 0;
	for (var i = 0; i < $(".input-promotion-stock-qty-value").length; i++) {
		branch_qty_value = $("#input-promotion-stock-qty-"+i).val();
		total_branch_qty = total_branch_qty + parseInt(branch_qty_value);
	};

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promo/setBranchQty",
		"method": "POST",
		"headers": {
			"content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"compId\":\""+company_id+"\", \r\n\"branchId\":\""+branchId+"\", \r\n\"activeInd\":\""+activeInd+"\", \r\n\"promoId\":\""+promoId+"\", \r\n\"promoQty\":\""+promoQty+"\", \r\n\"_id\":\""+_id+"\", \r\n\"promoTotalItemQty\":\""+total_branch_qty+"\"}"
	}

	$.ajax(settings).done(function (response) {
		alert("Update promotion branch stock successfuly");
		$("#cancel-edit-promotion-branch-qty-icon-link-"+id).hide();
		$("#edit-promotion-branch-qty-link-"+id).attr("onclick", "update_promotion_branch_qty('"+id+"')");
		$("#edit-promotion-branch-qty-icon-"+id).attr('class', 'fa fa-pencil fa-lg');
		$("#input-promotion-stock-qty-"+id).hide();
		$("#span-promotion-stock-qty-"+id).text(promoQty);
		$("#span-promotion-stock-qty-"+id).show();

		stockSold = $("#input-promotion-stock-sold-"+id).val();
		balance = parseInt(promoQty) - parseInt(stockSold);
		$("#span-promotion-stock-balance-"+id).text(balance);
		$("#input-promotion-stock-balance-"+id).val(balance);

		total_branch_qty = 0;
		total_branch_sold = 0;
		total_branch_balance = 0;
		total_branch_claimed = 0;

		for (var i = 0; i < $(".input-promotion-stock-qty-value").length; i++) {
			branch_qty_value = $("#input-promotion-stock-qty-"+i).val();
			total_branch_qty = total_branch_qty + parseInt(branch_qty_value);
			$("#total_promotion_quantity").text(total_branch_qty);

			branch_qty_sold = $("#input-promotion-stock-sold-"+i).val();
			total_branch_sold = total_branch_sold + parseInt(branch_qty_sold);
			$("#total_promotion_sold").text(total_branch_sold);

			branch_balance_value = $("#input-promotion-stock-balance-"+i).val();
			total_branch_balance = total_branch_balance + parseInt(branch_balance_value);
			$("#total_promotion_balance").text(total_branch_balance);

			branch_claimed_value = $("#input-claimed-"+i).val();
			total_branch_claimed = total_branch_claimed + parseInt(branch_claimed_value);
			$("#total_promotion_claimed").text(total_branch_claimed);
		};

		$("#overlay").css("display", "none");

		var $table = $('#promotion-table');
    	$table.bootstrapTable('refresh');
	});
}

$("#add-promotion-product-btn").click(function(){
	$("#overlay").css("display", "block");

	promotionId = $("#branch-promotion-id").val();
	productId = $("#promotion-product-name").val();
	productItemQty = $("#promotion-product-qty").val();

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promo/product",
		"method": "POST",
		"headers": {
			"content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"promoId\":\""+promotionId+"\", \r\n\"productId\":\""+productId+"\", \r\n\"productItemQty\":\""+productItemQty+"\"}"
	}

	$.ajax(settings).done(function (response) {
		alert('add promotion product successfuly');

		var settings = {
			"async": true,
			"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promo/product/getProducts/"+promotionId,
			"method": "GET",
			"headers": {
				"content-type": "application/json"
			},
			"processData": false
		}

		$.ajax(settings).done(function (response) {
			$(".product-promotion-list").remove();
			for (var i = 0; i < response.data.Items.length; i++) {
				$("#append-product-promotion").append(
						'<tr class="product-promotion-list">'+
							'<td>'+response.data.Items[i].categoryName+'</td>'+
							'<td>'+response.data.Items[i].productName+'</td>'+
							'<td>'+response.data.Items[i].productItemQty+'</td>'+
							'<td><a href="#" onclick="delete_promotion_product(\''+response.data.Items[i]._id+'\', \''+response.data.Items[i].promoId+'\')"><i class="fa fa-trash fa-lg"></i></a></td>'+
						'</tr>'
					);
			};

			$("#promotion-product-qty").val("");
			$("#overlay").css("display", "none");
		});
	});
});

function delete_promotion_product (productPromotionId, promotionId) {
	$("#overlay").css("display", "block");

	var settings = {
		"async": true,
		"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promo/product/delete/"+productPromotionId,
		"method": "DELETE",
		"headers": {
			"content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {
		alert("Delete product promotion successfuly");

		var settings = {
			"async": true,
			"url": "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promo/product/getProducts/"+promotionId,
			"method": "GET",
			"headers": {
				"content-type": "application/json"
			},
			"processData": false
		}

		$.ajax(settings).done(function (response) {
			$(".product-promotion-list").remove();
			for (var i = 0; i < response.data.Items.length; i++) {
				$("#append-product-promotion").append(
						'<tr class="product-promotion-list">'+
							'<td>'+response.data.Items[i].categoryName+'</td>'+
							'<td>'+response.data.Items[i].productName+'</td>'+
							'<td>'+response.data.Items[i].productItemQty+'</td>'+
							'<td><a href="#" onclick="delete_promotion_product(\''+response.data.Items[i]._id+'\', \''+response.data.Items[i].promoId+'\')"><i class="fa fa-trash fa-lg"></i></a></td>'+
						'</tr>'
					);
			};

			$("#overlay").css("display", "none");
		});
	});
}