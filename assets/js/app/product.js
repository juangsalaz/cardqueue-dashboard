function update_product_modal (productId) {
	$("#overlay").css("display", "block");

	$(".product-img-append").remove();

	company_id = $("#category-company-id").val();

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
		$(".category-list-combo").remove();
		
		for (var i = 0; i < response.data.Items.length; i++) {

			$("#edit-product-category-id").append(
					'<option value="'+response.data.Items[i]._id+'" class="category-list-combo">'+response.data.Items[i].categoryName+'</option>'
				);
		};

		var settings = {
		  "async": true,
		  "url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/product/"+productId,
		  "method": "GET",
		  "headers": {
		    "content-type": "application/json"
		    },
		  "processData": false
		}

		$.ajax(settings).done(function (response) {
			
			if (response.data.productImage != "") {
				$("#append-product-picture").append('<img class="product-img-append" src="'+response.data.productImage+'" width="100">');
			}

			$("#old_product_picture").val(response.data.productImage);
			
			if (response.data.productIcon != "") {
				$("#append-product-icon").append('<img class="product-img-append" src="'+response.data.productIcon+'" width="100">');
			}
			$("#old_product_icon").val(response.data.productIcon);
			
			$("#edit-product-id").val(response.data._id);
			$("#edit-product-category-id").val(response.data.categoryId);
			$("#edit-product-name").val(response.data.productName);

			description = response.data.desc;
			var regex = /<br\s*[\/]?>/gi;
	    	description = description.replace(/&nbsp;/gi," ");
	    	description = description.replace(regex, "\n");
	    	description = description.replace(/&quot;/g, '\\"');
			
			$("#edit-product-description").val(description);
			$("#edit-product-standart-price").val(response.data.price);
			$("#edit-product-special-price").val(response.data.specialPrice);
			
			if (response.data.isMemberDiscount == 'Yes') {
				$("#member-disc-yes").prop('checked', true);
			} else {
				$("#member-disc-no").prop('checked', true);
			}

			$("#editNewProductModal").modal();
		    $("#overlay").css("display", "none");
		});

		
	}).fail(function (response) {
		alert("Get category data failed.");
	});
}

$("#edit-product-btn").click(function(){
	$("#overlay").css("display", "block");

	var file_data = $('#edit-product-picture').prop('files')[0];   
	var form_data = new FormData();
	form_data.append('file', file_data);

	$.ajax({
		url:"product/upload_product_picture",
		dataType: 'text',
		    cache: false,
		    contentType: false,
		    processData: false,
		    data: form_data,                         
		    type: 'post',
		success:function(data) {

			productImgUrl = $("#old_product_picture").val();
			if (data != "") {
				productImgUrl = data;
			}

			var file_data = $('#edit-product-icon').prop('files')[0];   
			var form_data = new FormData();
			form_data.append('file', file_data);

			$.ajax({
				url:"product/upload_product_picture",
				dataType: 'text',
				    cache: false,
				    contentType: false,
				    processData: false,
				    data: form_data,                         
				    type: 'post',
				success:function(data) {
					
					productIconUrl = $("#old_product_icon").val();
					if (data != "") {
						productIconUrl = data;
					}

					productId = $("#edit-product-id").val();

					var object = {};

					object.compId = $("#category-company-id").val();
					object.categoryId = $("#edit-product-category-id").val();
					object.productName = $("#edit-product-name").val();

					product_description = $("#edit-product-description").val();
					product_description = product_description.replace(/(?:\r\n|\r|\n)/g, '<br />');
					product_description = product_description.replace(/\s/g, '&nbsp;');
					product_description = product_description.replace(/"/g, "&quot;");

					object.desc = product_description;
					object.productImage = productImgUrl;
					object.productIcon = productIconUrl;
					object.price = $("#edit-product-standart-price").val();
					object.specialPrice = $("#edit-product-special-price").val();

					member_disc = $("input[name=edit_member_disc]:checked").val();

					member = "Yes";
					if (member_disc == 0) {
						member = "No";
					}

					object.isMemberDiscount = member;

					data = JSON.stringify(object);

					var settings = {
						"async": true,
						"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/product/"+productId,
						"method": "PUT",
						"headers": {
						  "content-type": "application/json"
						},
						"processData": true,
						"data": data
					}

					$.ajax(settings).done(function (response) {
						alert("Edit product successfuly");
						location.reload();
					}).fail(function (response) {
						alert("Edit product failed");
						$("#overlay").css("display", "none");
					});
				}
			});
		}
	});
});

function delete_product_modal (productId) 
{
	$("#delete-product-id").val(productId);
	$("#deleteProductModal").modal();
}

$("#delete-product-btn").click(function(){
	var $btn = $("#delete-branch-btn").button('loading');

	$("#overlay").css("display", "block");

	productId = $("#delete-product-id").val();

	var settings = {
		"async": true,
		"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/product/"+productId,
		"method": "DELETE",
		"headers": {
			"content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {
		alert("Delete product successfuly");
		location.reload();
	});
});

function block_product(product_id)
{
	$("#block-product-id").val(product_id);
	$("#blockProductModal").modal();
}

$("#block-product-btn").click(function(){
	var $btn = $("#block-product-btn").button('loading');

	product_id = $("#block-product-id").val();

	var settings = {
		"async": true,
		"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/product/"+product_id,
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"activeInd\":\"I\"}"
	}

	$.ajax(settings).done(function (response) {

		$("#company-product-"+product_id).attr('class', 'fa fa-ban fa-lg');
		$("#company-product-"+product_id).css('color', '#ff6c60');
		
		$("#company-product-link-"+product_id).attr("onclick", "unblock_product('"+product_id+"')");

		alert("block product successfuly");

		$("#blockProductModal").modal('hide');

		$btn.button('reset');
	});
});

function unblock_product(product_id)
{
	$("#unblock-product-id").val(product_id);
	$("#unblockProductModal").modal();
}

$("#unblock-product-btn").click(function(){
	var $btn = $("#unblock-product-btn").button('loading');

	product_id = $("#unblock-product-id").val();

	var settings = {
		"async": true,
		"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/product/"+product_id,
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"activeInd\":\"A\"}"
	}

	$.ajax(settings).done(function (response) {

		$("#company-product-"+product_id).attr('class', 'fa fa-check-circle fa-lg');
		$("#company-product-"+product_id).css('color', '#89C45B');
		
		$("#company-product-link-"+product_id).attr("onclick", "block_product('"+product_id+"')");

		alert("unblock product successfuly");

		$("#unblockProductModal").modal('hide');

		$btn.button('reset');
	});
});

function block_category(category_id)
{
	$("#overlay").css("display", "block");

	var settings = {
		"async": true,
		"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/category/"+category_id,
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"activeInd\":\"I\"}"
	}

	$.ajax(settings).done(function (response) {
		$("#company-category-"+category_id).attr('class', 'fa fa-ban fa-lg');
		$("#company-category-"+category_id).css('color', '#ff6c60');
		
		$("#company-category-link-"+category_id).attr("onclick", "unblock_category('"+category_id+"')");

		alert("block product category successfuly");
		$("#overlay").css("display", "none");
	});
}


function unblock_category(category_id)
{
	$("#overlay").css("display", "block");

	var settings = {
		"async": true,
		"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/category/"+category_id,
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"activeInd\":\"A\"}"
	}

	$.ajax(settings).done(function (response) {
		$("#company-category-"+category_id).attr('class', 'fa fa-check-circle fa-lg');
		$("#company-category-"+category_id).css('color', '#89C45B');
		
		$("#company-category-link-"+category_id).attr("onclick", "block_category('"+category_id+"')");

		alert("unblock product category successfuly");
		$("#overlay").css("display", "none");
	});
}

function add_product_branch_modal (productId, productName) {
	$("#overlay").css("display", "block");

	$(".branch-list-append").remove();

	$("#assign-branch-product-name").text(productName);

	company_id = $("#category-company-id").val();

	var settings = {
	  "async": true,
	  "url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/product/getBranchQty/"+company_id+"/"+productId,
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

		for (var i = 0; i < response.data.length; i++) {
			block_btn = '<td><a href="#" id="company-product-branch-link-'+i+'" onclick="block_product_branch(\''+response.data[i]._id+'\', \''+i+'\')"><i class="fa fa-check-circle fa-lg" id="company-product-branch-'+i+'" aria-hidden="true" style="color: #89C45B;"></i></a></td>';
			if (response.data[i].activeInd == 'I') {
				block_btn = '<td><a href="#" id="company-product-branch-link-'+i+'" onclick="unblock_product_branch(\''+response.data[i]._id+'\', \''+i+'\')"><i class="fa fa-ban fa-lg" id="company-product-branch-'+i+'" aria-hidden="true" style="color: #ff6c60;"></i></a></td>';	
			} 

			stockQty = response.data[i].stockQty;
			stockSold = response.data[i].stockSold;

			balance = parseInt(stockQty) - parseInt(stockSold);
			$("#assign-branch-list").append(
					'<tr class="branch-list-append">'+
                        '<td>'+response.data[i].branchId+'</td>'+
                        '<td><input type="text" id="input-stock-qty-'+i+'" value="'+response.data[i].stockQty+'" class="form-control input-stock-qty-value" style="display: none;"><span id="span-stock-qty-'+i+'">'+response.data[i].stockQty+'</span></td>'+
                        '<td><input type="text" id="input-stock-sold-'+i+'" value="'+response.data[i].stockSold+'" style="display: none;"><span id="span-stock-sold-'+i+'">'+response.data[i].stockSold+'</span></td>'+
                        '<td><input type="text" id="input-stock-balance-'+i+'" value="'+balance+'" style="display: none;"><span id="span-stock-balance-'+i+'">'+balance+'</span></td>'+
                        '<td><a href="#" id="edit-branch-qty-link-'+i+'" onclick="update_branch_qty(\''+i+'\', \''+response.data[i].branchId+'\', \''+response.data[i].activeInd+'\', \''+response.data[i].productId+'\', \''+response.data[i]._id+'\')"><i id="edit-branch-qty-icon-'+i+'" class="fa fa-pencil" aria-hidden="true"></i></a> <a id="cancel-edit-branch-qty-icon-link-'+i+'" href="#" onclick="cancel_edit_branch_qty(\'' +i+ '\')" style="display: none;"><i id="edit-branch-qty-cancel-icon-'+i+'" class="fa fa-times" aria-hidden="true"></i></a></td>'+
                        block_btn+
                    '</tr>'
				);

			branch_qty_value = $("#input-stock-qty-"+i).val();
			total_branch_qty = total_branch_qty + parseInt(branch_qty_value);
			$("#total_of_stock").text(total_branch_qty);

			branch_qty_sold = $("#input-stock-sold-"+i).val();
			total_branch_sold = total_branch_sold + parseInt(branch_qty_sold);
			$("#total_of_sold").text(total_branch_sold);

			branch_balance_value = $("#input-stock-balance-"+i).val();
			total_branch_balance = total_branch_balance + parseInt(branch_balance_value);
			$("#total_of_balance").text(total_branch_balance);
		};

		$("#branchProductModal").modal();
	    $("#overlay").css("display", "none");
	});
	
}

$('.calendar-date').datepicker({
});

$('.input-daterange').datepicker({
});

function block_product_branch(_id, id) {
	$("#overlay").css("display", "block");

	var settings = {
		"async": true,
		"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/product/BranchQty/status/"+_id+"/I",
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {

		$("#company-product-branch-"+id).attr('class', 'fa fa-ban fa-lg');
		$("#company-product-branch-"+id).css('color', '#ff6c60');
		
		$("#company-product-branch-link-"+id).attr("onclick", "unblock_product_branch('"+_id+"', '"+id+"')");

		alert("block product branch successfuly");
		$("#overlay").css("display", "none");
	});
}

function unblock_product_branch(_id, id) {
	$("#overlay").css("display", "block");

	var settings = {
		"async": true,
		"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/product/BranchQty/status/"+_id+"/A",
		"method": "PUT",
		"headers": {
			"content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {

		$("#company-product-branch-"+id).attr('class', 'fa fa-check-circle fa-lg');
		$("#company-product-branch-"+id).css('color', '#89C45B');
		
		$("#company-product-branch-link-"+id).attr("onclick", "block_product_branch('"+_id+"', '"+id+"')");

		alert("unblock product branch successfuly");
		$("#overlay").css("display", "none");
	});
}

function update_company_policy(company_id) {
	
	$("#overlay").css("display", "block");

	var settings = {
		"async": true,
		"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/product/policy/"+company_id,
		"method": "GET",
		"headers": {
		  "content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {

		if (response.data != "") {
			company_policy = response.data.Items[0].policyTxt;

			var regex = /<br\s*[\/]?>/gi;
		    company_policy = company_policy.replace(/&nbsp;/gi," ");
		    company_policy = company_policy.replace(regex, "\n");
		    company_policy = company_policy.replace(/&quot;/g, '\\"');

		    $("#company-policy").val(company_policy);

			$("#company-policy-id").val(response.data.Items[0]._id);
			$("#create-product-policy-btn").hide();
			$("#edit-product-policy-btn").show();
		} else {
			$("#create-product-policy-btn").show();
			$("#edit-product-policy-btn").hide();
		}

		$("#addProductPolicyModal").modal();
		$("#overlay").css("display", "none");
	});
}

$("#create-product-policy-btn").click(function(){
	$("#overlay").css("display", "block");

	compId 			= $("#category-company-id").val();
	comapnyPolicy = $("#company-policy").val();

	comapnyPolicy = comapnyPolicy.replace(/(?:\r\n|\r|\n)/g, '<br />');
	comapnyPolicy = comapnyPolicy.replace(/\s/g, '&nbsp;');
	comapnyPolicy = comapnyPolicy.replace(/"/g, '\\"');

	var settings = {
		"async": true,
		"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/product/policy",
		"method": "POST",
		"headers": {
		  "content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"compId\":\""+compId+"\", \r\n\"policyTxt\":\""+comapnyPolicy+"\"}"
	}

	$.ajax(settings).done(function (response) {
		alert("Submit company policy successfuly");
		$("#overlay").css("display", "none");
	}).fail(function (response) {
		alert("Submit company policy failed");
		$("#overlay").css("display", "none");
	});
});

$("#edit-product-policy-btn").click(function(){
	$("#overlay").css("display", "block");

	compId 			= $("#category-company-id").val();
	companyPlolicyId = $("#company-policy-id").val();
	comapnyPolicy = $("#company-policy").val();

	comapnyPolicy = comapnyPolicy.replace(/(?:\r\n|\r|\n)/g, '<br />');
	comapnyPolicy = comapnyPolicy.replace(/\s/g, '&nbsp;');
	comapnyPolicy = comapnyPolicy.replace(/"/g, '\\"');

	var settings = {
		"async": true,
		"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/product/policy/"+companyPlolicyId,
		"method": "PUT",
		"headers": {
		  "content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"compId\":\""+compId+"\", \r\n\"policyTxt\":\""+comapnyPolicy+"\"}"
	}

	$.ajax(settings).done(function (response) {
		alert("Submit company policy successfuly");
		$("#addProductPolicyModal").modal('hide');
		$("#overlay").css("display", "none");
	}).fail(function (response) {
		alert("Submit company policy failed");
		$("#overlay").css("display", "none");
	});
});

function company_category_modal (compId) {
	$("#overlay").css("display", "block");

	var settings = {
		"async": true,
		"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/category/all/"+compId,
		"method": "GET",
		"headers": {
		  "content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {
		$(".category-list").remove();
		
		for (var i = 0; i < response.data.Items.length; i++) {

			if (response.data.Items[i].activeInd == 'A') {
				block_unblock = '<td><a href="#" id="company-category-link-'+response.data.Items[i]._id+'" onclick="block_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-check-circle fa-lg" id="company-category-'+response.data.Items[i]._id+'" aria-hidden="true" style="color: #89C45B;"></i></a></td>';
			} else {
				block_unblock = '<td><a href="#" id="company-category-link-'+response.data.Items[i]._id+'" onclick="unblock_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-ban fa-lg" id="company-category-'+response.data.Items[i]._id+'" aria-hidden="true" style="color: #ff6c60;"></i></a></td>';
			}

			if (response.data.Items[i].totalProducts == 0) {
				block_unblock = '<td><a href="#" onclick="delete_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>';
			}

			$("#category-append").append(
				'<tr class="category-list">'+
					'<td><input type="text" class="form-control" value="'+response.data.Items[i].categoryName+'" id="input-'+response.data.Items[i]._id+'" style="display: none;"> <span id="span-'+response.data.Items[i]._id+'">'+response.data.Items[i].categoryName+'</span></td>'+
					'<td>'+response.data.Items[i].totalProducts+'</td>'+
					'<td><a id="update-category-link-'+response.data.Items[i]._id+'" href="#" onclick="update_category(\'' + response.data.Items[i]._id + '\')"><i id="edit-icon-'+response.data.Items[i]._id+'" class="fa fa-pencil" aria-hidden="true"></i></a> <a id="cancel-icon-link-'+response.data.Items[i]._id+'" href="#" onclick="cancel_edit_category(\'' + response.data.Items[i]._id + '\')" style="display: none;"><i id="cancel-icon-'+response.data.Items[i]._id+'" class="fa fa-times" aria-hidden="true"></i></a></td>'+
					block_unblock+
				'</tr>');
		};

		$("#overlay").css("display", "none");
	}).fail(function (response) {
		alert("Get category data failed.");
	});
	$("#addNewProductCategoryModal").modal();
}

function update_branch_qty(id, branchId, activeInd, productId, _id) {
	$("#input-stock-qty-"+id).show();
	$("#span-stock-qty-"+id).hide();
	$("#edit-branch-qty-icon-"+id).attr('class', 'fa fa-floppy-o fa-lg');
	$("#cancel-edit-branch-qty-icon-link-"+id).show();
	$("#edit-branch-qty-link-"+id).attr("onclick", "edit_branch_qty_process('"+id+"', '"+branchId+"', '"+activeInd+"', '"+productId+"', '"+_id+"')");
}

function cancel_edit_branch_qty(id) {
	$("#cancel-edit-branch-qty-icon-link-"+id).hide();
	$("#edit-branch-qty-link-"+id).attr("onclick", "update_branch_qty('"+id+"')");
	$("#edit-branch-qty-icon-"+id).attr('class', 'fa fa-pencil fa-lg');
	$("#input-stock-qty-"+id).hide();
	$("#span-stock-qty-"+id).show();
}

function edit_branch_qty_process(id, branchId, activeInd, productId, _id) {
	$("#overlay").css("display", "block");

	company_id = $("#category-company-id").val();
	stockQty = $("#input-stock-qty-"+id).val();

	var settings = {
		"async": true,
		"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/product/setBranchQty",
		"method": "POST",
		"headers": {
			"content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"compId\":\""+company_id+"\", \r\n\"branchId\":\""+branchId+"\", \r\n\"activeInd\":\""+activeInd+"\", \r\n\"productId\":\""+productId+"\", \r\n\"stockQty\":\""+stockQty+"\", \r\n\"_id\":\""+_id+"\"}"
	}

	$.ajax(settings).done(function (response) {
		alert("Update branch stock successfuly");
		$("#cancel-edit-branch-qty-icon-link-"+id).hide();
		$("#edit-branch-qty-link-"+id).attr("onclick", "update_branch_qty('"+id+"')");
		$("#edit-branch-qty-icon-"+id).attr('class', 'fa fa-pencil fa-lg');
		$("#input-stock-qty-"+id).hide();
		$("#span-stock-qty-"+id).text(stockQty);
		$("#span-stock-qty-"+id).show();

		stockSold = $("#input-stock-sold-"+id).val();
		balance = parseInt(stockQty) - parseInt(stockSold);
		$("#span-stock-balance-"+id).text(balance);
		$("#input-stock-balance-"+id).val(balance);

		total_branch_qty = 0;
		total_branch_sold = 0;
		total_branch_balance = 0;
		for (var i = 0; i < $(".input-stock-qty-value").length; i++) {
			branch_qty_value = $("#input-stock-qty-"+i).val();
			total_branch_qty = total_branch_qty + parseInt(branch_qty_value);
			$("#total_of_stock").text(total_branch_qty);

			branch_qty_sold = $("#input-stock-sold-"+i).val();
			total_branch_sold = total_branch_sold + parseInt(branch_qty_sold);
			$("#total_of_sold").text(total_branch_sold);

			branch_balance_value = $("#input-stock-balance-"+i).val();
			total_branch_balance = total_branch_balance + parseInt(branch_balance_value);
			$("#total_of_balance").text(total_branch_balance);
		};

		$("#overlay").css("display", "none");
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
		"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/category/"+category_id,
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

$("#create-category-btn").click(function(){
	$("#overlay").css("display", "block");

	compId 			= $("#category-company-id").val();
	categoryName 	= $("#create-category-name").val();

	var settings = {
		"async": true,
		"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/category",
		"method": "POST",
		"headers": {
		  "content-type": "application/json"
		},
		"processData": true,
		"data": "{\r\n\"compId\":\""+compId+"\", \r\n\"categoryName\":\""+categoryName+"\"}"
	}

	$.ajax(settings).done(function (response) {
		alert("Create product category successfuly");
		$("#create-category-name").val("");

		var settings = {
			"async": true,
			"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/category/all/"+compId,
			"method": "GET",
			"headers": {
			  "content-type": "application/json"
			},
			"processData": false
		}

		$.ajax(settings).done(function (response) {
			$(".category-list").remove();

			for (var i = 0; i < response.data.Items.length; i++) {
				if (response.data.Items[i].activeInd == 'A') {
					block_unblock = '<td><a href="#" id="company-category-link-'+response.data.Items[i]._id+'" onclick="block_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-check-circle fa-lg" id="company-category-'+response.data.Items[i]._id+'" aria-hidden="true" style="color: #89C45B;"></i></a></td>';
				} else {
					block_unblock = '<td><a href="#" id="company-category-link-'+response.data.Items[i]._id+'" onclick="unblock_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-ban fa-lg" id="company-category-'+response.data.Items[i]._id+'" aria-hidden="true" style="color: #ff6c60;"></i></a></td>';
				}

				if (response.data.Items[i].totalProducts == 0) {
					block_unblock = '<td><a href="#" onclick="delete_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>';
				}

				$("#category-append").append(
					'<tr class="category-list">'+
						'<td>'+response.data.Items[i].categoryName+'</td>'+
						'<td>'+response.data.Items[i].totalProducts+'</td>'+
						'<td><a class="javascript:;" href="javascript:;"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>'+
						block_unblock+
					'</tr>');
			};

			$("#overlay").css("display", "none");
		});

	}).fail(function (response) {
		alert("Create product category failed");
		$("#overlay").css("display", "none");
		$btn.button('reset');
	});
});

function delete_category (category_id) {
	$("#overlay").css("display", "block");

	compId 			= $("#category-company-id").val();

	var settings = {
		"async": true,
		"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/category/"+category_id,
		"method": "DELETE",
		"headers": {
			"content-type": "application/json"
		},
		"processData": false
	}

	$.ajax(settings).done(function (response) {
		alert("Delete Category successfuly");

		var settings = {
			"async": true,
			"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/category/all/"+compId,
			"method": "GET",
			"headers": {
			  "content-type": "application/json"
			},
			"processData": false
		}

		$.ajax(settings).done(function (response) {
			$(".category-list").remove();

			for (var i = 0; i < response.data.Items.length; i++) {
				if (response.data.Items[i].activeInd == 'A') {
					block_unblock = '<td><a href="#" id="company-category-link-'+response.data.Items[i]._id+'" onclick="block_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-check-circle fa-lg" id="company-category-'+response.data.Items[i]._id+'" aria-hidden="true" style="color: #89C45B;"></i></a></td>';
				} else {
					block_unblock = '<td><a href="#" id="company-category-link-'+response.data.Items[i]._id+'" onclick="unblock_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-ban fa-lg" id="company-category-'+response.data.Items[i]._id+'" aria-hidden="true" style="color: #ff6c60;"></i></a></td>';
				}

				if (response.data.Items[i].totalProducts == 0) {
					block_unblock = '<td><a href="#" onclick="delete_category(\'' + response.data.Items[i]._id + '\')"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a></td>';
				}

				$("#category-append").append(
					'<tr class="category-list">'+
						'<td>'+response.data.Items[i].categoryName+'</td>'+
						'<td>'+response.data.Items[i].totalProducts+'</td>'+
						'<td><a class="javascript:;" href="javascript:;"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>'+
						block_unblock+
					'</tr>');
			};

			$("#overlay").css("display", "none");
		});
	});
}

function add_new_product_modal(company_id) {
	$("#overlay").css("display", "block");

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
		$(".category-list-combo").remove();
		
		for (var i = 0; i < response.data.Items.length; i++) {
			if (response.data.Items[i].activeInd == 'A') {
				$("#product-category-id").append(
						'<option value="'+response.data.Items[i]._id+'" class="category-list-combo">'+response.data.Items[i].categoryName+'</option>'
					);
			}
		};

		$("#addNewProductModal").modal();
		$("#overlay").css("display", "none");
	}).fail(function (response) {
		alert("Get category data failed.");
	});
}

function create_product_validation() {
	if ($("#product-category-id").val() == "") {
		alert('Product category is required.');
		return false;
	}

	if ($("#create-product-name").val() == "") {
		alert('Product name is required.');
		return false;
	}

	if ($("#create-product-description").val() == "") {
		alert('Product description is required.');
		return false;
	}
 
 	if (typeof $('#create-product-picture').prop('files')[0] == "undefined") {
		alert('Product picture is required.');
		return false;
	}

	if (typeof $('#create-product-icon').prop('files')[0] == "undefined") {
		alert('Product icon is required.');
		return false;
	}

	if ($("#create-product-standart-price").val() == "") {
		alert('standard price is required.');
		return false;
	}

	if ($("#create-product-special-price").val() == "") {
		alert('Special price is required.');
		return false;
	}

	return true;
}

$("#create-product-btn").click(function() {

	if (create_product_validation()) {
		$("#overlay").css("display", "block");

		var file_data = $('#create-product-picture').prop('files')[0];   
		var form_data = new FormData();
		form_data.append('file', file_data);

		$.ajax({
			url:"product/upload_product_picture",
			dataType: 'text',
			    cache: false,
			    contentType: false,
			    processData: false,
			    data: form_data,                         
			    type: 'post',
			success:function(data) {

				productImgUrl = data;

				var file_data = $('#create-product-icon').prop('files')[0];   
				var form_data = new FormData();
				form_data.append('file', file_data);

				$.ajax({
					url:"product/upload_product_picture",
					dataType: 'text',
					    cache: false,
					    contentType: false,
					    processData: false,
					    data: form_data,                         
					    type: 'post',
					success:function(data) {
						
						productIconUrl = data;

						var object = {};

						object.compId = $("#category-company-id").val();
						object.categoryId = $("#product-category-id").val();
						object.productName = $("#create-product-name").val();

						product_description = $("#create-product-description").val();
						product_description = product_description.replace(/(?:\r\n|\r|\n)/g, '<br />');
						product_description = product_description.replace(/\s/g, '&nbsp;');
						product_description = product_description.replace(/"/g, "&quot;");

						object.desc = product_description;
						object.productImage = productImgUrl;
						object.productIcon = productIconUrl;
						object.price = $("#create-product-standart-price").val();
						object.specialPrice = $("#create-product-special-price").val();

						member_disc = $("input[name=member_disc]:checked").val();

						member = "Yes";
						if (member_disc == 0) {
							member = "No";
						}

						object.isMemberDiscount = member;

						data = JSON.stringify(object);

						var settings = {
							"async": true,
							"url": "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/product",
							"method": "POST",
							"headers": {
							  "content-type": "application/json"
							},
							"processData": true,
							"data": data
						}

						$.ajax(settings).done(function (response) {
							alert("Create product successfuly");
							location.reload();
						}).fail(function (response) {
							alert("Create product failed");
							$("#overlay").css("display", "none");
						});
					}
				});
			}
		});
	}
});

$('#branchProductModal').on('hidden.bs.modal', function () {
    var $table = $('#products-table');
    $table.bootstrapTable('refresh');
})

function assign_promotion_branch() {
    $("#assignQtyBranchModal").modal();
}