function merchant_validation()
{	var company_name 	= $("#company_name").val(),
		license_number	= $("#license_number").val(),
		email			= $("#email").val(),
		password		= $("#password").val();

	if (company_name == "") {
		alert('Company Name is required');
		return false;
	}

	if (license_number == "") {
		alert('License Number is required');
		return false;
	}

	if (email == "") {
		alert('Email is required');
		return false;
	} else {

		var x = email;
	    var atpos = x.indexOf("@");
	    var dotpos = x.lastIndexOf(".");
	    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
	        alert('Please enter valid email address.');
	        return false;
	    }
	}

	if (password == "") {
		alert('Password is required');
		return false;
	}

	return true;
}

function save_merchant() 
{
	if (merchant_validation()) {
		var $btn = $("#submit-new-merchant").button('loading');
		
		var company_name 	= $("#company_name").val(),
			license_number	= $("#license_number").val(),
			email			= $("#email").val(),
			password		= $("#password").val();

		var settings = {
			"async": true,
			"crossDomain": true,
			"url": "https://cq-merchant.auth0.com/dbconnections/signup",
			"method": "POST",
			"headers": {
				"content-type": "application/json"
			},
			"processData": false,
			"data": "{\"client_id\": \"u3C8LZEHthmVJpX2Uw2NcWtKHh883cVB\",\"email\": \""+email+"\",\"password\": \""+password+"\",\"connection\": \"Username-Password-Authentication\",\"user_metadata\": {\"company_name\": \""+company_name+"\",\"license_number\": \""+license_number+"\"}\",\"app_metadata\": {\"status\": \"registered\"}}"
		}

		$.ajax(settings).done(function (response) {
			$("#company_name").val("");
			$("#license_number").val("");
			$("#email").val("");
			$("#password").val("");

			alert('Add new merchant successfuly');
			location.reload();
		});
	}
}

function merchant_signup () 
{
	if (merchant_validation()) {
		var $btn = $("#submit-new-merchant").button('loading');
		
		var company_name 	= $("#company_name").val(),
			license_number	= $("#license_number").val(),
			email			= $("#email").val(),
			password		= $("#password").val();

		$.ajax({
	        url:"https://cq-merchant.auth0.com/dbconnections/signup",
	        type:"POST",
	        data: {
	        	client_id			: 'u3C8LZEHthmVJpX2Uw2NcWtKHh883cVB',
	        	email 				: email,
	        	password 			: password,
	        	id_token 			: '',
	        	connection 			: 'Username-Password-Authentication',
	        	user_metadata : {
	        		company_name 	: company_name,
	        		license_number 	: license_number,
	        		isAdmin		: '1'
	        	},
	        	app_metadata : {
	        		status : '1'
	        	}
	        },
	        cache:false,
	        success:function(data) {
				$btn.button('reset');

				$("#company_name").val("");
				$("#license_number").val("");
				$("#email").val("");
				$("#password").val("");

				window.location.replace("../index.php/signup/success/");
	        },
	        error: function(XMLHttpRequest, textStatus, errorThrown) {
	            var obj = $.parseJSON(XMLHttpRequest.responseText);
	            
	            if (obj.hasOwnProperty('error')) {
	            	alert(obj.error);
	            } 

	            if (obj.hasOwnProperty('description')) {
	            	alert(obj.description);
	            }
	            $btn.button('reset');

	            $("#company_name").val("");
				$("#license_number").val("");
				$("#email").val("");
				$("#password").val("");
			}
	    });
	}
}