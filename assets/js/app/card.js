function block_membership(membership_id) 
{
	$("#block-membership-id").val(membership_id);
	$("#blockMembershipModal").modal();
}

$("#block-membership-btn").click(function(){
	var $btn = $("#block-membership-btn").button('loading');

	company_name = $("#block-company-name").val();
	membership_id = $("#block-membership-id").val();

	var settings = {
		"async": true,
		"url": "https://v9hsp4riqc.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/membershipcard/status/"+company_name+"/"+membership_id+"/I",
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {
		membership_id = $("#block-membership-id").val();

		$("#membership-status-"+membership_id).attr('class', 'fa fa-ban fa-lg');
		$("#membership-status-"+membership_id).css('color', '#ff6c60');
		
		$("#membership-status-link-"+membership_id).attr("onclick", "unblock_membership('"+membership_id+"')");
		$("#membership-status-link-"+membership_id).attr("title", "Click to unblock");

		alert("block membership successfuly");

		$("#blockMembershipModal").modal('hide');

		$btn.button('reset');
	});
});

function unblock_membership(membership_id) 
{
	$("#unblock-membership-id").val(membership_id);
	$("#unblockMembershipModal").modal();
}

$("#unblock-membership-btn").click(function(){
	var $btn = $("#unblock-membership-btn").button('loading');

	company_name = $("#unblock-company-name").val();
	membership_id = $("#unblock-membership-id").val();

	var settings = {
		"async": true,
		"url": "https://v9hsp4riqc.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/membershipcard/status/"+company_name+"/"+membership_id+"/A",
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {
		membership_id = $("#unblock-membership-id").val();

		$("#membership-status-"+membership_id).attr('class', 'fa fa-check-circle fa-lg');
		$("#membership-status-"+membership_id).css('color', '#89C45B');
		
		$("#membership-status-link-"+membership_id).attr("onclick", "block_membership('"+membership_id+"')");
		$("#membership-status-link-"+membership_id).attr("title", "Click to block");

		alert("unblock membership successfuly");

		$("#unblockMembershipModal").modal('hide');

		$btn.button('reset');
	});
});

function update_membership_modal(membership_id, company_name)
{	
	$("#overlay").css("display", "block");
	
	var settings = {
	  "async": true,
	  "url": "https://v9hsp4riqc.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/membershipcard/getById/"+company_name+"/"+membership_id,
	  "method": "GET",
	  "headers": {
	    "content-type": "application/json"
	    },
	  "processData": false
	}

	$.ajax(settings).done(function (response) {
		$("#edit-membership-id").val(response.data.id);
		$("#edit-card-name").val(response.data.name);

		desc = response.data.desc;
	    var regex = /<br\s*[\/]?>/gi;
	    desc = desc.replace(/&nbsp;/gi," ");
	    desc = desc.replace(regex, "\n");
	    desc = desc.replace(/&quot;/g, '\\"');

		$("#edit-membership-status").val(response.data.activeInd);
		$("#edit-membership-description").val(desc);
		$("#edit-offer-start").val(response.data.startDate);
		$("#edit-offer-Ends").val(response.data.endDate);
		$("#edit-membership-terms-input").val(response.data.terms);
		$("#edit-membership-price").val(response.data.price);
		$("#edit-membership-discount").val(response.data.discountPercentage);
		$("#edit-quantity-sales").val(response.data.quantity);
		$("#edit-point-spend").val(response.data.points);
		$("#edit-membership-total-member").val(response.data.soldQty);


		policyTerms = response.data.policyTerms;
	    var regex = /<br\s*[\/]?>/gi;
	    policyTerms = policyTerms.replace(/&nbsp;/gi," ");
	    policyTerms = policyTerms.replace(regex, "\n");
	    policyTerms = policyTerms.replace(/&quot;/g, '\\"');


		$("#edit-membership-policy").val(policyTerms);

		if (response.data.imageUrl != "-")	{
			$("#membership-old-image-url").val(response.data.imageUrl);
			$("#image-membership-append").append('<img src="'+response.data.imageUrl+'" class="img-reponsive" id="membership-card-img-edit" width="150">');
		}

	    $("#updateMembershipModal").modal();
	    $("#overlay").css("display", "none");
	});
}

$('#updateMembershipModal').on('hidden.bs.modal', function () {
	$("#membership-card-img-edit").remove();
})

$('#updateRewardModal').on('hidden.bs.modal', function () {
	$("#reward-card-img-edit").remove();
})

function edit_membership_validate () {
	name             	 = $("#edit-card-name").val();
	description      	 = $("#edit-membership-description").val();
	offer_start      	 = $("#edit-offer-start").val();
	offer_end        	 = $("#edit-offer-end").val();
	terms            	 = $("#edit-membership-terms-input").val();
	price            	 = $("#edit-membership-price").val();
	discount          	 = $("#edit-membership-discount").val();
	quantity_for_sales   = $("#edit-quantity-sales").val();
	point_per_spend  	 = $("#edit-point-per-spend").val();
	membership_policy  	 = $("#edit-membership-policy").val();

	if (name == "") {
		alert("Card name is required");
		return false;
	}

	if (description == "") {
		alert("Description is required");
		return false;
	}

	if (offer_start == "") {
		alert("Offer Start is required");
		return false;
	}

	if (offer_end == "") {
		alert("Offer end is required");
		return false;
	}

	if (terms == "") {
		alert("Terms is required");
		return false;
	}

	if (price == "") {
		alert("Price is required");
		return false;
	}

	if (discount == "") {
		alert("Discount is required");
		return false;
	}

	if (quantity_for_sales == "") {
		alert("Quantity for sales is required");
		return false;
	}

	if (point_per_spend == "") {
		alert("Point per spend is required");
		return false;
	}

	if (membership_policy == "") {
		alert("Terms and policy is required");
		return false;
	}

	return true;
}

$("#edit-membership-btn").click(function(){

	if (edit_membership_validate ()) {

		membership_id     	 = $("#edit-membership-id").val();
		company_name     	 = $("#edit-membership-company-name").val();
		name             	 = $("#edit-card-name").val();
		description      	 = $("#edit-membership-description").val();
		offer_start      	 = $("#edit-offer-start").val();
		offer_end        	 = $("#edit-offer-Ends").val();
		terms            	 = $("#edit-membership-terms-input").val();
		price            	 = $("#edit-membership-price").val();
		discount          	 = $("#edit-membership-discount").val();
		quantity_for_sales   = $("#edit-quantity-sales").val();
		point_per_spend  	 = $("#edit-point-spend").val();
		membership_policy  	 = $("#edit-membership-policy").val();
		old_membership_image = $("#membership-old-image-url").val();
		membership_status = $("#edit-membership-status").val();
		total_member = $("#edit-membership-total-member").val();

		if (quantity_for_sales >= total_member) {
			var $btn = $("#edit-membership1").button('loading');

			$("#overlay").css("display", "block");

			statusId = 'A';
			if (membership_status != "") {
				statusId = $("#edit-membership-status").val();
			}

			description = description.replace(/(?:\r\n|\r|\n)/g, '<br />');
			description = description.replace(/\s/g, '&nbsp;');
			description = description.replace(/"/g, "&quot;");

			membership_policy = membership_policy.replace(/(?:\r\n|\r|\n)/g, '<br />');
			membership_policy = membership_policy.replace(/\s/g, '&nbsp;');
			membership_policy = membership_policy.replace(/"/g, "&quot;");

		  	var file_data = $('#edit-card-image').prop('files')[0];   
		    var form_data = new FormData();
		    form_data.append('file', file_data);

			$.ajax({
				url:"card/upload_membership_picture",
				dataType: 'text',
		        cache: false,
		        contentType: false,
		        processData: false,
		        data: form_data,                         
		        type: 'post',
				success:function(data) {

					url = old_membership_image;

					if (data != "") {
						url = data;
					}

					var settings = {
					    "async": true,
					    "url": "https://v9hsp4riqc.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/membershipcard/edit/"+company_name+"/"+membership_id,
					    "method": "PUT",
					    "headers": {
					      "content-type": "application/json"
					      },
					    "processData": true,
					    "data": "{\r\n\"discountPercentage\":\""+discount+"\", \r\n\"quantity\":\""+quantity_for_sales+"\", \r\n\"endDate\":\""+offer_end+"\", \r\n\"compName\":\""+company_name+"\", \r\n\"terms\":\""+terms+"\", \r\n\"policyTerms\":\""+membership_policy+"\", \r\n\"price\":\""+price+"\", \r\n\"imageUrl\":\""+url+"\", \r\n\"name\":\""+name+"\", \r\n\"startDate\":\""+offer_start+"\", \r\n\"desc\":\""+description+"\", \r\n\"points\":\""+point_per_spend+"\", \r\n\"activeInd\":\""+statusId+"\"}"
					  }

					  $.ajax(settings).done(function (response) {
					      alert("Edit New Membership successfuly");
					      location.reload();
					  });
				}
			});
		} else {
			alert("Invalid quantity for sale");
			$("#edit-quantity-sales").focus();
		}
	}
});

function delete_membership_modal(membership_id)
{
	$("#delete-membership-id").val(membership_id);
	$("#deleteMembershipModal").modal();
}

$("#delete-membership-btn").click(function(){
	$("#overlay").css("display", "block");

	var $btn = $("#delete-membership-btn").button('loading');

	membership_id 	= $("#delete-membership-id").val();
	company_name 	= $("#delete-company-name").val();

	var settings = {
	    "async": true,
	    "url": "https://v9hsp4riqc.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/membershipcard/delete/"+company_name+"/"+membership_id,
	    "method": "DELETE",
	    "headers": {
	      "content-type": "application/json"
	      },
	    "processData": false
	  }

	  $.ajax(settings).done(function (response) {
	      alert("Delete Membership successfuly");
	      location.reload();
	  });
});


function delete_reward_modal(membership_id, reward_id, company_name)
{
	$("#delete-reward-membership-id").val(membership_id);
	$("#delete-reward-reward-id").val(reward_id);
	$("#delete-reward-company-name").val(company_name);
	$("#deleteRewardModal").modal();
}

$("#delete-rewards-btn").click(function(){
	var $btn = $("#delete-rewards-btn").button('loading');

	membership_id 	= $("#delete-reward-membership-id").val();
	reward_id 		= $("#delete-reward-reward-id").val();
	company_name 	= $("#delete-reward-company-name").val();

	var settings = {
		"async": true,
		"url": "https://v9hsp4riqc.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/rewards/status/"+company_name+"/"+membership_id+"/"+reward_id,
		"method": "DELETE",
		"headers": {
			"content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {
		alert("delete reward successfuly");
		location.reload();
	});
});

function update_reward_modal(membership_id, reward_id, company_name)
{	
	$("#overlay").css("display", "block");
	
	var settings = {
	  "async": true,
	  "url": "https://v9hsp4riqc.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/rewards/getById/"+company_name+"/"+membership_id+"/"+reward_id,
	  "method": "GET",
	  "headers": {
	    "content-type": "application/json"
	    },
	  "processData": false
	}

	$.ajax(settings).done(function (response) {
		
		$("#edit-reward-status").val(response.data.activeInd);
		$("#edit-reward-reward-id").val(reward_id);
		$("#edit-reward-membership-id2").val(membership_id);
		$("#edit-reward-membership-id").val(membership_id);
		$("#edit-reward-name").val(response.data.name);
		$("#edit-reward-type").val(response.data.rewardType);

		desc = response.data.desc;
	    var regex = /<br\s*[\/]?>/gi;
	    desc = desc.replace(/&nbsp;/gi," ");
	    desc = desc.replace(regex, "\n");
	    desc = desc.replace(/&quot;/g, '\\"');

		$("#edit-reward-desc").val(desc);

		$("#edit-reward-redeem-start").val(response.data.startDate);
		$("#edit-reward-redeem-end").val(response.data.endDate);
		$("#edit-reward-point-needed").val(response.data.pointsRequired);
		$("#edit-reward-redeem-quantity").val(response.data.rewardQuantity);
		$("#edit-reward-redeem-address").val(response.data.address);
		$("#edit-reward-redeem-day").val(response.data.dayTime);
		$("#old_reward_picture_url").val(response.data.imageUrl);
		$("#edit-reward-value-amount").val(response.data.value);

		terms = response.data.terms;
	    var regex = /<br\s*[\/]?>/gi;
	    terms = terms.replace(/&nbsp;/gi," ");
	    terms = terms.replace(regex, "\n");
	    terms = terms.replace(/&quot;/g, '\\"');

		$("#edit-reward-policy").val(terms);
		
		if (response.data.imageUrl != "-")	{
			$("#image-reward-append").append('<img src="'+response.data.imageUrl+'" class="img-reponsive" id="reward-card-img-edit" width="150">');
		}

	    $("#updateRewardModal").modal();
	    $("#overlay").css("display", "none");
	});
}

function edit_reward_validation() {

	membership_id     	= $("#edit-reward-membership-id").val();
	reaward_name       	= $("#edit-reward-name").val(); 
	reward_type       	= $("#edit-reward-type").val();
	value_amount       	= $("#edit-reward-value-amount").val();
	point_needed      	= $("#edit-reward-point-needed").val();
	redeem_quantity   	= $("#edit-reward-redeem-quantity").val();
	reward_description 	= $("#edit-reward-desc").val();
	redeem_start        = $("#edit-reward-redeem-start").val();
	redeem_end          = $("#edit-reward-redeem-end").val();
	redeem_datetime  	= $("#edit-reward-redeem-day").val();
	redeem_address   	= $("#edit-reward-redeem-address").val();
	reward_policy  	 	= $("#edit-reward-policy").val();

	if (membership_id == "") {
		alert("Membership is required.");
		return false;
	}

	if (reaward_name == "") {
		alert("Reward name is required.");
		return false;
	}

	if (reward_type == "") {
		alert("Reward type is required.");
		return false;
	}


	if (reward_type == "Off-set Value") {
		if (value_amount == "") {
			alert("Value amount is required.");
			return false;
		}
	}

	if (point_needed == "") {
		alert("Point needed is required.");
		return false;
	}

	if (redeem_quantity == "") {
		alert("Reedem quantity is required.");
		return false;
	}

	if (reward_description == "") {
		alert("Reedem description is required.");
		return false;
	}

	if (redeem_start == "") {
		alert("Redeem start is required.");
		return false;
	}

	if (redeem_end == "") {
		alert("Redeem end is required.");
		return false;
	}

	if (redeem_datetime == "") {
		alert("Redeem day is required.");
		return false;
	}

	if (redeem_address == "") {
		alert("Redeem address is required.");
		return false;
	}

	if (reward_policy == "") {
		alert("Reward Policy is required.");
		return false;
	}

	return true;
}

$("#edit-reward-btn").click(function(){
	if (edit_reward_validation()) {

		var $btn = $("#edit-reward-btn").button('loading');

		$("#overlay").css("display", "block");

		company_name		= $("#edit-reward-company-name").val();
		membership_id2		= $("#edit-reward-membership-id2").val();
		reward_id			= $("#edit-reward-reward-id").val();
		membership_id     	= $("#edit-reward-membership-id").val();
		reaward_name       	= $("#edit-reward-name").val(); 
		reward_type       	= $("#edit-reward-type").val();
		value_amount       	= $("#edit-reward-value-amount").val();
		point_needed      	= $("#edit-reward-point-needed").val();
		redeem_quantity   	= $("#edit-reward-redeem-quantity").val();
		reward_description 	= $("#edit-reward-desc").val();
		redeem_start        = $("#edit-reward-redeem-start").val();
		redeem_end          = $("#edit-reward-redeem-end").val();
		redeem_datetime  	= $("#edit-reward-redeem-day").val();
		redeem_address   	= $("#edit-reward-redeem-address").val();
		reward_policy  	 	= $("#edit-reward-policy").val();
		reward_status  	 	= $("#edit-reward-status").val();

		if (value_amount == "") {
			value_amount = 0;
		}

		statusId = "A";
		if (reward_status != "") {
			statusId = $("#edit-reward-status").val()
		}

		old_reward_picture_url = $("#old_reward_picture_url").val();

		reward_description = reward_description.replace(/(?:\r\n|\r|\n)/g, '<br />');
		reward_description = reward_description.replace(/\s/g, '&nbsp;');
		reward_policy = reward_policy.replace(/"/g, "&quot;");

		reward_policy = reward_policy.replace(/(?:\r\n|\r|\n)/g, '<br />');
		reward_policy = reward_policy.replace(/\s/g, '&nbsp;');
		reward_policy = reward_policy.replace(/"/g, "&quot;");

		var file_data = $('#edit-reward-picture').prop('files')[0];   
	    var form_data = new FormData();
	    form_data.append('file', file_data);

		$.ajax({
			url:"card/upload_reward_picture",
			dataType: 'text',
	        cache: false,
	        contentType: false,
	        processData: false,
	        data: form_data,                         
	        type: 'post',
			success:function(data) {

				url = old_reward_picture_url;
				if (data != "") {
					url = data;
				}

				var settings = {
					"async": true,
					"url": "https://v9hsp4riqc.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/rewards/edit/"+company_name+"/"+membership_id2+"/"+reward_id,
					"method": "PUT",
					"headers": {
					  "content-type": "application/json"
					},
					"processData": true,
					"data": "{\r\n\"compName\":\""+company_name+"\", \r\n\"name\":\""+reaward_name+"\", \r\n\"startDate\":\""+redeem_start+"\", \r\n\"endDate\":\""+redeem_end+"\", \r\n\"imageUrl\":\""+url+"\", \r\n\"memberShipCardId\":\""+membership_id+"\", \r\n\"pointsRequired\":\""+point_needed+"\", \r\n\"rewardType\":\""+reward_type+"\", \r\n\"address\":\""+redeem_address+"\", \r\n\"dayTime\":\""+redeem_datetime+"\", \r\n\"lastDate\":\""+redeem_end+"\", \r\n\"policyTerms\":\""+reward_policy+"\", \r\n\"desc\":\""+reward_description+"\", \r\n\"rewardQuantity\":\""+redeem_quantity+"\", \r\n\"terms\":\""+reward_policy+"\", \r\n\"value\":\""+value_amount+"\", \r\n\"activeInd\":\""+statusId+"\"}"
				}

				$.ajax(settings).done(function (response) {
					alert("Edit Reward successfuly");
					location.reload();
				}).fail(function (response) {
					alert("Edit Reward failed");
					$("#overlay").css("display", "none");
					$btn.button('reset');
				});
				
			}
		});
	}
});

function block_reward(reward_id, membership_id)
{
	$("#block-reward-id").val(reward_id);
	$("#block-reward-membership-id").val(membership_id);
	$("#blockRewardModal").modal();
}

$("#block-reward-btn").click(function(){
	var $btn = $("#block-reward-btn").button('loading');

	reward_id 		= $("#block-reward-id").val();
	membership_id 	= $("#block-reward-membership-id").val();
	company_name 	= $("#block-reward-company-name").val();

	var settings = {
		"async": true,
		"url": "https://v9hsp4riqc.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/rewards/status/"+company_name+"/"+membership_id+"/"+reward_id+"/I",
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {
		reward_id = $("#block-reward-id").val();

		$("#reward-status-"+reward_id).attr('class', 'fa fa-ban fa-lg');
		$("#reward-status-"+reward_id).css('color', '#ff6c60');
		
		$("#reward-status-link-"+reward_id).attr("onclick", "unblock_reward('"+reward_id+"', '"+membership_id+"')");
		$("#reward-status-link-"+reward_id).attr("title", "Click to unblock");

		alert("block reward successfuly");

		$("#blockRewardModal").modal('hide');

		$btn.button('reset');
	});
});

function unblock_reward(reward_id, membership_id)
{
	$("#unblock-reward-id").val(reward_id);
	$("#unblock-reward-membership-id").val(membership_id);
	$("#unblockRewardModal").modal();
}

$("#unblock-reward-btn").click(function(){
	var $btn = $("#unblock-reward-btn").button('loading');

	reward_id 		= $("#unblock-reward-id").val();
	membership_id 	= $("#unblock-reward-membership-id").val();
	company_name 	= $("#unblock-reward-company-name").val();

	var settings = {
		"async": true,
		"url": "https://v9hsp4riqc.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/rewards/status/"+company_name+"/"+membership_id+"/"+reward_id+"/A",
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {
		reward_id = $("#unblock-reward-id").val();

		$("#reward-status-"+reward_id).attr('class', 'fa fa-check-circle fa-lg');
		$("#reward-status-"+reward_id).css('color', '#89C45B');
		
		$("#reward-status-link-"+reward_id).attr("onclick", "block_reward('"+reward_id+"', '"+membership_id+"')");
		$("#reward-status-link-"+reward_id).attr("title", "Click to block");

		alert("unblock reward successfuly");

		$("#unblockRewardModal").modal('hide');

		$btn.button('reset');
	});
});


function block_partnership(partnership_id)
{	
	$("#block-partnership-id").val(partnership_id);
	$("#blockPartnershipModal").modal();
}

$("#block-partnership-btn").click(function(){
	var $btn = $("#block-partnership-btn").button('loading');

	partnership_id = $("#block-partnership-id").val();

	var settings = {
		"async": true,
		"url": "https://u71yt1ngo1.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/partnership/status/"+partnership_id,
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"status\":\"I\"}"
	}

	$.ajax(settings).done(function (response) {

		$("#partnership-status-"+partnership_id).attr('class', 'fa fa-ban fa-lg');
		$("#partnership-status-"+partnership_id).css('color', '#ff6c60');
		
		$("#partnership-status-link-"+partnership_id).attr("onclick", "unblock_partnership('"+partnership_id+"')");

		alert("Block partnership successfuly");

		$("#blockPartnershipModal").modal('hide');

		$btn.button('reset');
	});
});


function unblock_partnership(partnership_id)
{
	$("#unblock-partnership-id").val(partnership_id);
	$("#unblockPartnershipModal").modal();
}

$("#unblock-partnership-btn").click(function(){
	var $btn = $("#unblock-partnership-btn").button('loading');

	partnership_id = $("#unblock-partnership-id").val();

	var settings = {
		"async": true,
		"url": "https://u71yt1ngo1.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/partnership/status/"+partnership_id,
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"status\":\"A\"}"
	}

	$.ajax(settings).done(function (response) {
		$("#partnership-status-"+partnership_id).attr('class', 'fa fa-check-circle fa-lg');
		$("#partnership-status-"+partnership_id).css('color', '#89C45B');
		
		$("#partnership-status-link-"+partnership_id).attr("onclick", "block_partnership('"+partnership_id+"')");

		alert("block partnership successfuly");

		$("#unblockPartnershipModal").modal('hide');

		$btn.button('reset');
	});
});

function delete_partnership_modal(partnership_id)
{
	$("#delete-partnership-id").val(partnership_id);
	$("#deletePartnershipModal").modal();
}

$("#delete-partnership-btn").click(function () {
	$("#overlay").css("display", "block");

	var $btn = $("#delete-partnership-btn").button('loading');

	partnership_id 	= $("#delete-partnership-id").val();

	var settings = {
		"async": true,
		"url": "https://u71yt1ngo1.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/partnership/delete/"+partnership_id,
		"method": "DELETE",
		"headers": {
			"content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {
		alert("Delete Partnership successfuly");
		location.reload();
	});
});

function update_partnership_modal(partnership_id)
{
	$("#overlay").css("display", "block");
	
	var settings = {
	  "async": true,
	  "url": "https://u71yt1ngo1.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/partnership/getById/"+partnership_id,
	  "method": "GET",
	  "headers": {
	    "content-type": "application/json"
	    },
	  "processData": false
	}

	$.ajax(settings).done(function (response) {
		$("#edit-bank-id").val(response.data.bankId);
		$("#edit-partnership-id").val(response.data._id);

		var settings = {
			"async": true,
			"url": "https://6eat2etcyb.execute-api.ap-southeast-1.amazonaws.com/Prod/company/bank/card/getAllCards/"+response.data.bankId,
			"method": "GET",
			"headers": {
			  "content-type": "application/json"
			},
			"processData": false
		}

		$.ajax(settings).done(function (response2) {

			for (var i = 0; i < response2.data.length; i++) {
				if (response.data.cardId == response2.data[i].id) {
					$("#edit-credit-cards").append('<option class="credit-cards-append" value='+response2.data[i].id+' selected="selected">'+response2.data[i].name+'</option>');
				} else {
					$("#edit-credit-cards").append('<option class="credit-cards-append" value='+response2.data[i].id+'>'+response2.data[i].name+'</option>');
				}
			};

		}).fail(function (response) {
			// alert('get card data is failed.');
		});

		$("#edit-partnership-name").val(response.data.partnershipName);

		desc = response.data.desc;
	    var regex = /<br\s*[\/]?>/gi;
	    desc = desc.replace(/&nbsp;/gi," ");
	    desc = desc.replace(regex, "\n");
	    desc = desc.replace(/&quot;/g, '\\"');
		$("#edit-partnershoip-desc").val(desc);
		
		$("#edit-partnership-discount").val(response.data.discount);
		$("#edit-partnership-start-date").val(response.data.startDate);
		$("#edit-partnership-end-date").val(response.data.endDate);

		terms = response.data.terms;
	    var regex = /<br\s*[\/]?>/gi;
	    terms = terms.replace(/&nbsp;/gi," ");
	    terms = terms.replace(regex, "\n");
	    terms = terms.replace(/&quot;/g, '\\"');


		$("#edit-partnership-policy").val(terms);
		
	    $("#updatePartnershipModal").modal();
	    $("#overlay").css("display", "none");
	});
}

function edit_partnership_validation() {
	bank_id 				= $("#edit-bank-id").val();
	card_id 				= $("#edit-credit-cards").val();
	partnership_name 		= $("#edit-partnership-name").val();
	partnership_description = $("#edit-partnershoip-desc").val();
	partnership_discount 	= $("#edit-partnership-discount").val();
	start_date 				= $("#edit-partnership-start-date").val();
	end_date 				= $("#edit-partnership-end-date").val();
	partnership_policy 		= $("#edit-partnership-policy").val();

	if (bank_id == "") {
		alert("Bank name is required.");
		return false;
	}

	if (card_id == "") {
		alert("Card name is required.");
		return false;
	}

	if (partnership_name == "") {
		alert("Partnership name is required.");
		return false;
	}

	if (partnership_description == "") {
		alert("Partnership description is required.");
		return false;
	}

	if (partnership_discount == "") {
		alert("Partnership discount is required.");
		return false;
	}

	if (start_date == "") {
		alert("Partnership start date is required.");
		return false;
	}

	if (end_date == "") {
		alert("Partnership end date is required.");
		return false;
	}

	if (partnership_policy == "") {
		alert("Partnership policy is required.");
		return false;
	}

	return true;
}

$("#edit-partnership-btn").click(function(){

	if (edit_partnership_validation()) {
		var $btn = $("#edit-partnership-btn").button('loading');
		$("#overlay").css("display", "block");

		partnership_id 			= $("#edit-partnership-id").val();
		bank_id 				= $("#edit-bank-id").val();
		card_id 				= $("#edit-credit-cards").val();
		partnership_name 		= $("#edit-partnership-name").val();
		partnership_description = $("#edit-partnershoip-desc").val();
		partnership_discount 	= $("#edit-partnership-discount").val();
		start_date 				= $("#edit-partnership-start-date").val();
		end_date 				= $("#edit-partnership-end-date").val();
		partnership_policy 		= $("#edit-partnership-policy").val();

		partnership_description = partnership_description.replace(/(?:\r\n|\r|\n)/g, '<br />');
		partnership_description = partnership_description.replace(/\s/g, '&nbsp;');
		partnership_description = partnership_description.replace(/"/g, '\\"');

		partnership_policy = partnership_policy.replace(/(?:\r\n|\r|\n)/g, '<br />');
		partnership_policy = partnership_policy.replace(/\s/g, '&nbsp;');
		partnership_policy = partnership_policy.replace(/"/g, '\\"');

		var settings = {
			"async": true,
			"url": "https://u71yt1ngo1.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/partnership/edit/"+partnership_id,
			"method": "PUT",
			"headers": {
			  "content-type": "application/json"
			},
			"processData": true,
			"data": "{\r\n\"bankId\":\""+bank_id+"\", \r\n\"cardId\":\""+card_id+"\", \r\n\"partnershipName\":\""+partnership_name+"\", \r\n\"desc\":\""+partnership_description+"\", \r\n\"discount\":\""+partnership_discount+"\", \r\n\"startDate\":\""+start_date+"\", \r\n\"endDate\":\""+end_date+"\", \r\n\"terms\":\""+partnership_policy+"\"}"
		}

		$.ajax(settings).done(function (response) {
			alert("Edit Partnership successfuly");
			location.reload();
		}).fail(function (response) {
			alert("Edit Partnership failed");
			$("#overlay").css("display", "none");
			$btn.button('reset');
		});
	}
});

$("#reward-type").change(function(){
  reawrd_type = $("#reward-type").val();

  if (reawrd_type == 'Off-set Value') {
  	$("#value-amount").prop("disabled", false);
  } else {
  	$("#value-amount").prop("disabled", true);
  }
});

$("#edit-reward-type").change(function(){
  reawrd_type = $("#edit-reward-type").val();

  if (reawrd_type == 'Off-set Value') {
  	$("#edit-reward-value-amount").prop("disabled", false);
  } else {
  	$("#edit-reward-value-amount").prop("disabled", true);
  	$("#edit-reward-value-amount").val("");
  }
});

$('.calendar-date').datepicker({
});

function create_membership_validate () {
	name             	 = $("#card-name").val();
	description      	 = $("#membership-description").val();
	offer_start      	 = $("#offer-start").val();
	offer_end        	 = $("#offer-end").val();
	terms            	 = $("#membership-terms").val();
	price            	 = $("#membership-price").val();
	discount          	 = $("#membership-discount").val();
	quantity_for_sales   = $("#quantity-for-sales").val();
	point_per_spend  	 = $("#point-per-spend").val();
	membership_policy  	 = $("#membership-policy").val();
	file_data			 = $('#card-image').prop('files')[0];

	if (name == "") {
		alert("Card name is required");
		return false;
	}

	if (typeof file_data == 'undefined') {
		alert("Card Image is required");
		return false;
	}

	if (description == "") {
		alert("Description is required");
		return false;
	}

	if (offer_start == "") {
		alert("Offer Start is required");
		return false;
	}

	if (offer_end == "") {
		alert("Offer end is required");
		return false;
	}

	if (terms == "") {
		alert("Terms is required");
		return false;
	}

	if (price == "") {
		alert("Price is required");
		return false;
	}

	if (discount == "") {
		alert("Discount is required");
		return false;
	}

	if (quantity_for_sales == "") {
		alert("Quantity for sales is required");
		return false;
	}

	if (point_per_spend == "") {
		alert("Point per spend is required");
		return false;
	}

	if (membership_policy == "") {
		alert("Terms and policy is required");
		return false;
	}

	return true;
}

$("#create-membership-btn").click(function(){

	if (create_membership_validate ()) {

		var $btn = $("#create-membership-btn").button('loading');

		$("#overlay").css("display", "block");

		company_name = '-';
		if ($("#membership-company-name").val() != "") {
			company_name = $("#membership-company-name").val();
		}
		
		name             	 = $("#card-name").val();
		description      	 = $("#membership-description").val();
		offer_start      	 = $("#offer-start").val();
		offer_end        	 = $("#offer-end").val();
		terms            	 = $("#membership-terms").val();
		price            	 = $("#membership-price").val();
		discount          	 = $("#membership-discount").val();
		quantity_for_sales   = $("#quantity-for-sales").val();
		point_per_spend  	 = $("#point-per-spend").val();
		membership_policy  	 = $("#membership-policy").val();

		description = description.replace(/(?:\r\n|\r|\n)/g, '<br />');
		description = description.replace(/\s/g, '&nbsp;');
		description = description.replace(/"/g, "&quot;");
		
		membership_policy = membership_policy.replace(/(?:\r\n|\r|\n)/g, '<br />');
		membership_policy = membership_policy.replace(/\s/g, '&nbsp;');
		membership_policy = membership_policy.replace(/"/g, "&quot;");

	  	var file_data = $('#card-image').prop('files')[0];   
	    var form_data = new FormData();
	    form_data.append('file', file_data);

		$.ajax({
			url:"card/upload_membership_picture",
			dataType: 'text',
	        cache: false,
	        contentType: false,
	        processData: false,
	        data: form_data,                         
	        type: 'post',
			success:function(data) {
				var settings = {
				    "async": true,
				    "url": "https://v9hsp4riqc.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/membershipcard",
				    "method": "POST",
				    "headers": {
				      "content-type": "application/json"
				      },
				    "processData": true,
				    "data": "{\r\n\"compName\":\""+company_name+"\", \r\n\"name\":\""+name+"\", \r\n\"startDate\":\""+offer_start+"\", \r\n\"endDate\":\""+offer_end+"\", \r\n\"price\":\""+price+"\", \r\n\"quantity\":\""+quantity_for_sales+"\", \r\n\"imageUrl\":\""+data+"\", \r\n\"discountPercentage\":\""+discount+"\", \r\n\"desc\":\""+description+"\", \r\n\"points\":\""+point_per_spend+"\", \r\n\"terms\":\""+terms+"\", \r\n\"policyTerms\":\""+membership_policy+"\"}"
				  }

				  $.ajax(settings).done(function (response) {
				      alert("Create New Membership successfuly");
				      location.reload();
				  });
			}
		});
	}
});

function create_reward_validation() {

	membership_id     	= $("#membership-id").val();
	reaward_name       	= $("#reward-name").val(); 
	reward_type       	= $("#reward-type").val();
	value_amount       	= $("#value-amount").val();
	point_needed      	= $("#point-needed").val();
	redeem_quantity   	= $("#redeem-quantity").val();
	reward_description 	= $("#reward-description").val();
	redeem_start        = $("#redeem-start").val();
	redeem_end          = $("#redeem-end").val();
	redeem_datetime  	= $("#redeem-datetime").val();
	redeem_address   	= $("#redeem-address").val();
	reward_policy  	 	= $("#reward-policy").val();
	file_data			 = $('#reward-picture').prop('files')[0];

	if (membership_id == "") {
		alert("Membership is required.");
		return false;
	}

	if (reaward_name == "") {
		alert("Reward name is required.");
		return false;
	}

	if (typeof file_data == 'undefined') {
		alert("Reward Picture is required");
		return false;
	}

	if (reward_type == "") {
		alert("Reward type is required.");
		return false;
	}


	if (reward_type == "Off-set Value") {
		if (value_amount == "") {
			alert("Value amount is required.");
			return false;
		}
	}

	if (point_needed == "") {
		alert("Point needed is required.");
		return false;
	}

	if (redeem_quantity == "") {
		alert("Reedem quantity is required.");
		return false;
	}

	if (reward_description == "") {
		alert("Reedem description is required.");
		return false;
	}

	if (redeem_start == "") {
		alert("Redeem start is required.");
		return false;
	}

	if (redeem_end == "") {
		alert("Redeem end is required.");
		return false;
	}

	if (redeem_datetime == "") {
		alert("Redeem day is required.");
		return false;
	}

	if (redeem_address == "") {
		alert("Redeem address is required.");
		return false;
	}

	if (reward_policy == "") {
		alert("Reward Policy is required.");
		return false;
	}

	return true;
}

$("#create-reward-btn").click(function(){

	if (create_reward_validation()) {

		var $btn = $("#create-reward-btn").button('loading');

		$("#overlay").css("display", "block");

		company_name		= $("#reward-company-name").val();
		membership_id     	= $("#membership-id").val();
		reaward_name       	= $("#reward-name").val(); 
		reward_type       	= $("#reward-type").val();
		value_amount       	= $("#value-amount").val();
		point_needed      	= $("#point-needed").val();
		redeem_quantity   	= $("#redeem-quantity").val();
		reward_description 	= $("#reward-description").val();
		redeem_start        = $("#redeem-start").val();
		redeem_end          = $("#redeem-end").val();
		redeem_datetime  	= $("#redeem-datetime").val();
		redeem_address   	= $("#redeem-address").val();
		reward_policy  	 	= $("#reward-policy").val();

		if (value_amount == "") {
			value_amount = 0;
		}

		reward_description = reward_description.replace(/(?:\r\n|\r|\n)/g, '<br />');
		reward_description = reward_description.replace(/\s/g, '&nbsp;');
		reward_description = reward_description.replace(/"/g, "&quot;");

		reward_policy = reward_policy.replace(/(?:\r\n|\r|\n)/g, '<br />');
		reward_policy = reward_policy.replace(/\s/g, '&nbsp;');
		reward_policy = reward_policy.replace(/"/g, "&quot;");

		var file_data = $('#reward-picture').prop('files')[0];   
	    var form_data = new FormData();
	    form_data.append('file', file_data);

		$.ajax({
			url:"card/upload_reward_picture",
			dataType: 'text',
	        cache: false,
	        contentType: false,
	        processData: false,
	        data: form_data,                         
	        type: 'post',
			success:function(data) {
				var settings = {
					"async": true,
					"url": "https://v9hsp4riqc.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/rewards",
					"method": "POST",
					"headers": {
					  "content-type": "application/json"
					},
					"processData": true,
					"data": "{\r\n\"compName\":\""+company_name+"\", \r\n\"name\":\""+reaward_name+"\", \r\n\"startDate\":\""+redeem_start+"\", \r\n\"endDate\":\""+redeem_end+"\", \r\n\"imageUrl\":\""+data+"\", \r\n\"memberShipCardId\":\""+membership_id+"\", \r\n\"pointsRequired\":\""+point_needed+"\", \r\n\"rewardType\":\""+reward_type+"\", \r\n\"address\":\""+redeem_address+"\", \r\n\"dayTime\":\""+redeem_datetime+"\", \r\n\"lastDate\":\""+redeem_end+"\", \r\n\"terms\":\""+reward_policy+"\", \r\n\"desc\":\""+reward_description+"\", \r\n\"rewardQuantity\":\""+redeem_quantity+"\", \r\n\"value\":\""+value_amount+"\"}"
				}

				$.ajax(settings).done(function (response) {
					alert("Create New Reward successfuly");
					location.reload();
				}).fail(function (response) {
					alert("Create New Reward failed");
					$("#overlay").css("display", "none");
					$btn.button('reset');
				});
				
			}
		});
	}
});

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

$('#updateRewardModal').on('shown.bs.modal', function() {
	reawrd_type = $("#edit-reward-type").val();

	if (reawrd_type == 'Off-set Value') {
		$("#edit-reward-value-amount").prop("disabled", false);
	} else {
		$("#edit-reward-value-amount").prop("disabled", true);
	}
})

$("#partnership-select-bank").change(function(){
	bank_id = $("#partnership-select-bank").val();
	$(".credit-cards-append").remove();

	var settings = {
		"async": true,
		"url": "https://6eat2etcyb.execute-api.ap-southeast-1.amazonaws.com/Prod/company/bank/card/getAllCards/"+bank_id,
		"method": "GET",
		"headers": {
		  "content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {

		for (var i = 0; i < response.data.length; i++) {
			$("#credit-cards").append('<option class="credit-cards-append" value='+response.data[i].id+'>'+response.data[i].name+'</option>');
		};

	}).fail(function (response) {
		// alert('get card data is failed.');
	});
});

function create_partnership_validation() {
	bank_id 				= $("#partnership-select-bank").val();
	card_id 				= $("#credit-cards").val();
	partnership_name 		= $("#partnership-name").val();
	partnership_description = $("#partnership-description").val();
	partnership_discount 	= $("#partnership-discount").val();
	start_date 				= $("#partnership-start-date").val();
	end_date 				= $("#partnership-end-date").val();
	partnership_policy 		= $("#partnership-policy").val();

	if (bank_id == "") {
		alert("Bank name is required.");
		return false;
	}

	if (card_id == "") {
		alert("Card name is required.");
		return false;
	}

	if (partnership_name == "") {
		alert("Partnership name is required.");
		return false;
	}

	if (partnership_description == "") {
		alert("Partnership description is required.");
		return false;
	}

	if (partnership_discount == "") {
		alert("Partnership discount is required.");
		return false;
	}

	if (start_date == "") {
		alert("Partnership start date is required.");
		return false;
	}

	if (end_date == "") {
		alert("Partnership end date is required.");
		return false;
	}

	if (partnership_policy == "") {
		alert("Partnership policy is required.");
		return false;
	}

	return true;
}

$("#create-partnership-btn").click(function () {

	if (create_partnership_validation()) {
		var $btn = $("#create-partnership-btn").button('loading');
		$("#overlay").css("display", "block");

		company_name 			= $("#partnership-company-name").val();
		bank_id 				= $("#partnership-select-bank").val();
		card_id 				= $("#credit-cards").val();
		partnership_name 		= $("#partnership-name").val();
		partnership_description = $("#partnership-description").val();
		partnership_discount 	= $("#partnership-discount").val();
		start_date 				= $("#partnership-start-date").val();
		end_date 				= $("#partnership-end-date").val();
		partnership_policy 		= $("#partnership-policy").val();

		partnership_description = partnership_description.replace(/(?:\r\n|\r|\n)/g, '<br />');
		partnership_description = partnership_description.replace(/\s/g, '&nbsp;');
		partnership_description = partnership_description.replace(/"/g, "&quot;");

		partnership_policy = partnership_policy.replace(/(?:\r\n|\r|\n)/g, '<br />');
		partnership_policy = partnership_policy.replace(/\s/g, '&nbsp;');
		partnership_policy = partnership_policy.replace(/"/g, "&quot;");

		var settings = {
			"async": true,
			"url": "https://u71yt1ngo1.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/partnership/add",
			"method": "POST",
			"headers": {
			  "content-type": "application/json"
			},
			"processData": true,
			"data": "{\r\n\"compId\":\""+company_name+"\", \r\n\"bankId\":\""+bank_id+"\", \r\n\"cardId\":\""+card_id+"\", \r\n\"partnershipName\":\""+partnership_name+"\", \r\n\"desc\":\""+partnership_description+"\", \r\n\"discount\":\""+partnership_discount+"\", \r\n\"startDate\":\""+start_date+"\", \r\n\"endDate\":\""+end_date+"\", \r\n\"terms\":\""+partnership_policy+"\"}"
		}

		$.ajax(settings).done(function (response) {
			alert("Create New Partnership successfuly");
			location.reload();
		}).fail(function (response) {
			alert("Create New Partnership failed");
			$("#overlay").css("display", "none");
			$btn.button('reset');
		});
	}
});

$("#edit-bank-id").change(function(){
	bank_id = $("#edit-bank-id").val();
	$(".credit-cards-append").remove();

	var settings = {
		"async": true,
		"url": "https://6eat2etcyb.execute-api.ap-southeast-1.amazonaws.com/Prod/company/bank/card/getAllCards/"+bank_id,
		"method": "GET",
		"headers": {
		  "content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {

		for (var i = 0; i < response.data.length; i++) {
			$("#edit-credit-cards").append('<option class="credit-cards-append" value='+response.data[i].id+'>'+response.data[i].name+'</option>');
		};

	}).fail(function (response) {
		// alert('get card data is failed.');
	});
});