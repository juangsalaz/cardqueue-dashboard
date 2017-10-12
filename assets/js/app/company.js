$("#create-branch-btn").click(function(){
  $("#overlay").css("display", "block");

  var $btn = $("#create-branch-btn").button('loading');

  var company_name = $("#company-name-new-branch").val(),
    branch_name = $("#branch-name").val(),
    branch_street = $("#branch-street").val(),
    branch_country = $("#branch-country").val(),
    branch_city = $("#branch-city").val(),
    branch_zipcode = $("#branch-zipcode").val(),
    branch_building = $("#branch-building").val(),
    branch_unit = $("#branch-unit").val();

  var settings = {
      "async": true,
      "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/company/branch",
      "method": "POST",
      "headers": {
        "content-type": "application/json"
        },
      "processData": true,
      "data": "{\r\n\"branchName\"  : \""+branch_name+"\",\r\n\"id\"  : \""+company_name+"\"\r\n,\r\n\"street\"  : \""+branch_street+"\"\r\n,\r\n\"latitude\"  : \"75.100\"\r\n,\r\n\"longitude\"  : \"75.100\"\r\n,\r\n\"country\"  : \""+branch_country+"\"\r\n,\r\n\"city\"  : \""+branch_city+"\"\r\n,\r\n\"zipCode\"  : \""+branch_zipcode+"\"\r\n,\r\n\"building\"  : \""+branch_building+"\"\r\n,\r\n\"unit\"  : \""+branch_unit+"\"\r\n}"
    }

    $.ajax(settings).done(function (response) {
      alert('Brance created successfuly');
      location.reload();
    });
});

function create_staff_validation()
{
  var staff_email = $("#email-address").val();

  if (staff_email == "") {
    alert("Staff email is required.");
    return false;
  }

  return true;
}

$("#create-staff-btn").click(function(){
  
  $("#overlay").css("display", "block");

  var $btn = $("#create-staff-btn").button('loading');

  company_name  = $("#new-staff-company").val();
  email         = $("#email-address").val();
  name          = $("#staff-name").val();
  designation   = $("#designation").val();
  gender        = $("#staff_gender").val();
  phone         = $("#staff_phone").val();

  var settings = {
    "async": true,
    "url": "https://5qbun48kuc.execute-api.ap-southeast-1.amazonaws.com/Prod/merchant/staff/create",
    "method": "POST",
    "headers": {
      "content-type": "application/json"
    },
    "processData": true,
    "data": "{\r\n\"compId\":\""+company_name+"\",\r\n\"email\":\""+email+"\",\r\n\"name\":\""+name+"\",\r\n\"imageUrl\":\"-\",\r\n\"gender\":\""+gender+"\",\r\n\"mobileNumber\":\""+phone+"\",\r\n\"designation\":\""+designation+"\"}"
  }

  $.ajax(settings)
    .done(function (response) {
      user_id = response.data;

      var object = {};

      object.staffId = user_id;
      object.company = $("#new-staff-company").val();

      length = $(".branch-access-yes").length;

      for (var i = length - 1; i >= 0; i--) {
        is_checked = $('input[name=radio-branch-'+i+']:checked').val();

        if (is_checked) {
          object.assign = true;
          object.branchName = $('input[name=radio-branch-'+i+']').attr('id');
        } else {
          object.assign = false;
          object.branchName = $('input[name=radio-branch-'+i+']').attr('id');
        }

        data = JSON.stringify(object);
          
        var settings2 = {
          "async": true,
          "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/company/branch/asignStaffToCompany",
          "method": "POST",
          "headers": {
            "content-type": "application/json"
            },
          "processData": true,
          "data": data
        }

        $.ajax(settings2)
        .done(function (response) {
          // alert('Assign Staff to Branch successfuly');
          
        })
        .fail(function(response){
          alert('Assign Staff to Branch failed');
        });

      };

      if ($('input[name=branchDefault]:checked').val() != "") {
        branch_id = $('input[name=branchDefault]:checked').val();

        alert(branch_id);

        var settings3 = {
          "async": true,
          "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/merchant/setDefaultBranch",
          "method": "POST",
          "headers": {
            "content-type": "application/json"
            },
          "processData": true,
          "data": "{\r\n\"auth0UserId\"  : \""+user_id+"\", \r\n\"branch\"  : \""+branch_id+"\"}"
        }

        $.ajax(settings3)
        .done(function (response) {
          // alert('set Branch Default successfuly');
          
        })
        .fail(function(response){
          alert('set Default Branch failed');
        });
      }

      array_access = {};
      array_access.UserRights = {};

      admin_access = false;
      if ($('input[name=admin-radio]:checked').val() == 1) {
        admin_access = true;
      }

      array_access.UserRights.admin = admin_access;

      company_access = false;
      if ($('input[name=company-radio]:checked').val() == 1) {
        company_access = true;
      }

      array_access.UserRights.company = company_access;

      card_access = false;
      if ($('input[name=card-radio]:checked').val() == 1) {
        card_access = true;
      }

      array_access.UserRights.card = card_access;

      queue_access = false;
      if ($('input[name=queue-radio]:checked').val() == 1) {
        queue_access = true;
      }

      array_access.UserRights.queue = queue_access;

      order_access = false;
      if ($('input[name=order-radio]:checked').val() == 1) {
        order_access = true;
      }

      array_access.UserRights.order = order_access;

      payment_access = false;
      if ($('input[name=payment-radio]:checked').val() == 1) {
        payment_access = true;
      }

      array_access.UserRights.payment = payment_access;

      product_access = false;
      if ($('input[name=product-radio]:checked').val() == 1) {
        product_access = true;
      }

      array_access.UserRights.product = product_access;

      kitchen_access = false;
      if ($('input[name=kitchen-radio]:checked').val() == 1) {
        kitchen_access = true;
      }

      array_access.UserRights.kitchen = kitchen_access;

      report_access = false;
      if ($('input[name=report-radio]:checked').val() == 1) {
        report_access = true;
      }

      array_access.UserRights.report = report_access;

      finance_access = false;
      if ($('input[name=finance-radio]:checked').val() == 1) {
        finance_access = true;
      }

      array_access.UserRights.finance = finance_access;

      marketing_access = false;
      if ($('input[name=marketing-radio]:checked').val() == 1) {
        marketing_access = true;
      }

      array_access.UserRights.marketing = marketing_access;

      data = JSON.stringify(array_access);

      console.log(data);

      var settings4 = {
        "async": true,
        "url": "https://5qbun48kuc.execute-api.ap-southeast-1.amazonaws.com/Prod/merchant/profie/"+user_id,
        "method": "PUT",
        "headers": {
          "content-type": "application/json"
          },
        "processData": true,
        "data": data
      }

      $.ajax(settings4)
      .done(function (response) {
        console.log(response)
        alert('Create new staff successfuly');
        location.reload();
        
      })
      .fail(function(response){
        alert('set Access Rights failed');
      });

    })
    .fail(function(response){
      alert('email already exist');
      console.log(response);
    });

});

$("#edit-staff-btn").click(function(){
  
  $("#overlay").css("display", "block");

  var $btn = $("#create-staff-btn").button('loading');

  user_id = $("#edit-staff-id").val();
  company_name = $("#edit-staff-company").val();
  email = $("#edit-staff-email-address").val();
  name = $("#edit-staff-name").val();
  designation = $("#edit-staff-designation").val();
  gender = $("#edit_staff_gender").val();
  phone = $("#edit_staff_phone").val();

  var settings = {
    "async": true,
    "url": "https://5qbun48kuc.execute-api.ap-southeast-1.amazonaws.com/Prod/merchant/profie/"+user_id,
    "method": "PUT",
    "headers": {
      "content-type": "application/json"
    },
    "processData": true,
    "data": "{\r\n\"compId\":\""+company_name+"\",\r\n\"email\":\""+email+"\",\r\n\"name\":\""+name+"\",\r\n\"imageUrl\":\"-\",\r\n\"gender\":\""+gender+"\",\r\n\"mobileNumber\":\""+phone+"\",\r\n\"designation\":\""+designation+"\"}"
  }

  $.ajax(settings)
    .done(function (response) {
      var object = {};

      object.staffId = $("#edit-staff-id").val();
      object.company = $("#edit-staff-company").val();

      length = $(".edit-branch-access-yes").length;

      for (var i = length - 1; i >= 0; i--) {
        is_checked = $('input[name=edit-radio-branch-'+i+']:checked').val();
        
        if (is_checked == 1) {
          object.branchName = $('input[name=edit-radio-branch-'+i+']').attr('branchName');
          object.assign = true;
        } else {
          object.branchName = $('input[name=edit-radio-branch-'+i+']').attr('branchName');
          object.assign = false;
        }

        data = JSON.stringify(object);
          
        var settings2 = {
          "async": true,
          "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/company/branch/asignStaffToCompany",
          "method": "POST",
          "headers": {
            "content-type": "application/json"
            },
          "processData": true,
          "data": data
        }

        $.ajax(settings2)
        .done(function (response) {
          //alert('Assign Staff to Branch successfuly');
          
        })
        .fail(function(response){
          alert('Assign Staff to Branch failed');
        });

      };

      if ($('input[name=edit-branchDefault]:checked').val() != "") {
        branch_id = $('input[name=edit-branchDefault]:checked').val();

        var settings3 = {
          "async": true,
          "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/merchant/setDefaultBranch",
          "method": "POST",
          "headers": {
            "content-type": "application/json"
            },
          "processData": true,
          "data": "{\r\n\"auth0UserId\"  : \""+user_id+"\", \r\n\"branch\"  : \""+branch_id+"\"}"
        }

        $.ajax(settings3)
        .done(function (response) {
          // alert('set Branch Default successfuly');
          
        })
        .fail(function(response){
          alert('set Default Branch failed');
        });
      }

      array_access = {};
      array_access.UserRights = {};

      admin_access = false;
      if ($('input[name=edit-admin-radio]:checked').val() == 1) {
        admin_access = true;
      }

      array_access.UserRights.admin = admin_access;

      company_access = false;
      if ($('input[name=edit-company-radio]:checked').val() == 1) {
        company_access = true;
      }

      array_access.UserRights.company = company_access;

      card_access = false;
      if ($('input[name=edit-card-radio]:checked').val() == 1) {
        card_access = true;
      }

      array_access.UserRights.card = card_access;

      queue_access = false;
      if ($('input[name=edit-queue-radio]:checked').val() == 1) {
        queue_access = true;
      }

      array_access.UserRights.queue = queue_access;

      order_access = false;
      if ($('input[name=edit-order-radio]:checked').val() == 1) {
        order_access = true;
      }

      array_access.UserRights.order = order_access;

      payment_access = false;
      if ($('input[name=edit-payment-radio]:checked').val() == 1) {
        payment_access = true;
      }

      array_access.UserRights.payment = payment_access;

      product_access = false;
      if ($('input[name=edit-product-radio]:checked').val() == 1) {
        product_access = true;
      }

      array_access.UserRights.product = product_access;

      kitchen_access = false;
      if ($('input[name=edit-kitchen-radio]:checked').val() == 1) {
        kitchen_access = true;
      }

      array_access.UserRights.kitchen = kitchen_access;

      report_access = false;
      if ($('input[name=edit-report-radio]:checked').val() == 1) {
        report_access = true;
      }

      array_access.UserRights.report = report_access;

      finance_access = false;
      if ($('input[name=edit-finance-radio]:checked').val() == 1) {
        finance_access = true;
      }

      array_access.UserRights.finance = finance_access;

      marketing_access = false;
      if ($('input[name=edit-marketing-radio]:checked').val() == 1) {
        marketing_access = true;
      }

      array_access.UserRights.marketing = marketing_access;

      data = JSON.stringify(array_access);

      console.log(data);

      var settings4 = {
        "async": true,
        "url": "https://5qbun48kuc.execute-api.ap-southeast-1.amazonaws.com/Prod/merchant/profie/"+user_id,
        "method": "PUT",
        "headers": {
          "content-type": "application/json"
          },
        "processData": true,
        "data": data
      }

      $.ajax(settings4)
      .done(function (response) {
        alert('Edit staff successfuly');
        location.reload();
        
      })
      .fail(function(response){
        alert('set Access Rights failed');
      });

    })
    .fail(function(response){
      alert('edit staff failed');
      console.log(response);
    });

});

$("#message-post-btn").click(function(){
  var $btn = $("#message-post-btn").button('loading');
  var message_content = $("#message-content").val();
  var message_title = $("#message-title").val();
  var company_name = $("#company-name").val();
  var creator = $("#creator").val();
  var datetime = $("#datetime").val();

  message_content = message_content.replace(/(?:\r\n|\r|\n)/g, '<br />');

  var settings = {
    "async": true,
    "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/merchant/company/message",
    "method": "POST",
    "headers": {
      "content-type": "application/json"
      },
    "processData": true,
    "data": "{\r\n\"comp\":\""+company_name+"\", \r\n\"creater\":\""+creator+"\", \r\n\"creationDate\":\""+datetime+"\", \r\n\"title\":\""+message_title+"\", \r\n\"message\":\""+message_content+"\"}"
  }

  $.ajax(settings).done(function (response) {
      alert("Add Message successfuly");
      location.reload();
  });
});

function delete_message(message_id, company_name)
{
  var settings = {
    "async": true,
    "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/merchant/company/message/"+company_name+"/"+message_id,
    "method": "DELETE",
    "headers": {
      "content-type": "application/json"
      },
    "processData": false
  }

  $.ajax(settings).done(function (response) {
      alert("Delete Message successfuly");
      location.reload();
  });
}

$("#message-update-btn").click(function(){
  var $btn = $("#message-update-btn").button('loading');
  var message_content = $("#message-content").val();
  var message_title = $("#message-title").val();
  var company_name = $("#company-name").val();
  var message_id = $("#message-id").val();
  var creator = $("#creator").val();
  var datetime = $("#datetime").val();

  message_content = message_content.replace(/(?:\r\n|\r|\n)/g, '<br />');

  var settings = {
    "async": true,
    "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/merchant/company/message/"+company_name+"/"+message_id,
    "method": "PUT",
    "headers": {
      "content-type": "application/json"
      },
    "processData": true,
    "data": "{\r\n\"creater\":\""+creator+"\", \r\n\"creationDate\":\""+datetime+"\", \r\n\"title\":\""+message_title+"\", \r\n\"message\":\""+message_content+"\"}"
  }

  $.ajax(settings).done(function (response) {
      alert("Update Message successfuly");
      window.location.href = "../../messages";
  });  
});

function update_hq_management_modal() {

  $("#editHqManagementModal").modal();
}


$(".edit-hq-btn").click(function(){
  var $btn = $("#edit-hq-btn").button('loading');

  $("#overlay").css("display", "block");

  old_company_logo = $("#old_company_logo_url").val();
  old_company_banner_url = $("#old_company_banner_url").val();

  var file_data = $('#company_logo').prop('files')[0];   
  var form_data = new FormData();
  form_data.append('file', file_data);

  $.ajax({
    url:"upload_company_logo",
    dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
    success:function(data) {

      imageUrlLogo = old_company_logo;
      if (data != "") {
        imageUrlLogo = data;
      }

      var file_data = $('#company_banner').prop('files')[0];   
      var form_data = new FormData();
      form_data.append('file', file_data);

      $.ajax({
        url:"upload_company_logo",
        dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
        success:function(data) {

          imageUrlBanner = old_company_banner_url;
          if (data != "") {
            imageUrlBanner = data;
          }

          var settings = {
            "async": true,
            "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/company/"+company_name,
            "method": "PUT",
            "headers": {
              "content-type": "application/json"
              },
            "processData": true,
            "data": "{\r\n\"logo\":\""+imageUrlLogo+"\", \r\n\"banner\":\""+imageUrlBanner+"\"}"
          }

          $.ajax(settings).done(function (response) {
              alert("Update HQ successfuly");
              location.reload();
          });

        }
      });

    }
  });
});

function delete_branch_modal(branch_id)
{
  $("#delete-branch-id").val(branch_id);
  $("#deleteBranchModal").modal();
}

$("#delete-branch-btn").click(function(){
  var $btn = $("#delete-branch-btn").button('loading');

  $("#overlay").css("display", "block");

  branch_id     = $("#delete-branch-id").val();
  company_name  = $("#delete-branch-company-name").val();

  var settings = {
    "async": true,
    "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/company/branch/"+branch_id,
    "method": "DELETE",
    "headers": {
      "content-type": "application/json"
      },
    "processData": true,
    "data": "{\r\n\"compId\":\""+company_name+"\"}"
  }

  $.ajax(settings).done(function (response) {
    alert("Delete branch successfuly");
    location.reload();
  });
});

function update_branch_modal(branch_id, company_name)
{
  $("#overlay").css("display", "block");
  
  var settings = {
    "async": true,
    "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/company/branch/getBranch/"+company_name+"/"+branch_id,
    "method": "GET",
    "headers": {
      "content-type": "application/json"
      },
    "processData": false
  }

  $.ajax(settings).done(function (response) {
    $("#branch-id-edit-branch").val(branch_id);

    if (response.data.isHeadquarter == 1) {
      $("#edit-branch-name").val(response.data.name);
      $("#edit-branch-name").attr("disabled", true);
    } else {
      $("#edit-branch-name").val(response.data.branchName);
      $("#edit-branch-name").attr("disabled", false);
    }

    $("#edit-branch-street").val("");
    if (typeof response.data.street !== 'undefined') {
      $("#edit-branch-street").val(response.data.street);
    }

    $("#edit-branch-country").val("");
    if (typeof response.data.country !== 'undefined') {
      $("#edit-branch-country").val(response.data.country);
    }

    $("#edit-branch-city").val("");
    if (typeof response.data.city !== 'undefined') {
      $("#edit-branch-city").val(response.data.city);
    }

    $("#edit-branch-zipcode").val("");
    if (typeof response.data.zipCode !== 'undefined') {
      $("#edit-branch-zipcode").val(response.data.zipCode);
    }

    $("#edit-branch-building").val("");
    if (typeof response.data.building !== 'undefined') {
      $("#edit-branch-building").val(response.data.building);
    }

    $("#edit-branch-unit").val("");
    if (typeof response.data.unit !== 'undefined') {
      $("#edit-branch-unit").val(response.data.unit);
    }

    $("#editBranchModal").modal();
    $("#overlay").css("display", "none");
  });
  
}

$("#edit-branch-btn").click(function(){
  var $btn = $("#edit-branch-btn").button('loading');

  $("#overlay").css("display", "block");

    company_name = '-';
    if ($("#company-name-edit-branch").val() != "") {
      company_name = $("#company-name-edit-branch").val();
    }

    branch_name = '-';
    if ($("#edit-branch-name").val() != "") {
      branch_name = $("#edit-branch-name").val();
    }

    branch_street = '-';
    if ($("#edit-branch-street").val() != "") {
      branch_street = $("#edit-branch-street").val();
    }

    branch_country = '-';
    if ($("#edit-branch-country").val() != "") {
      branch_country = $("#edit-branch-country").val();
    }

    branch_city = '-';
    if ($("#edit-branch-city").val() != "") {
      branch_city = $("#edit-branch-city").val();
    }

    branch_zipcode = '-';
    if ($("#edit-branch-zipcode").val() != "") {
      branch_zipcode = $("#edit-branch-zipcode").val();
    }

    branch_building = '-';
    if ($("#edit-branch-building").val() != "") {
      branch_building = $("#edit-branch-building").val();
    }

    branch_unit = '-';
    if ($("#edit-branch-unit").val() != "") {
      branch_unit = $("#edit-branch-unit").val();
    }

    branch_id = $("#branch-id-edit-branch").val();

  var settings = {
    "async": true,
    "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/company/branch/editBranch/"+branch_id+"/"+company_name,
    "method": "PUT",
    "headers": {
      "content-type": "application/json"
    },
    "processData": true,
    "data": "{\r\n\"branchName\"  : \""+branch_name+"\",\r\n\"id\"  : \""+company_name+"\"\r\n,\r\n\"street\"  : \""+branch_street+"\"\r\n,\r\n\"latitude\"  : \"75.100\"\r\n,\r\n\"longitude\"  : \"75.100\"\r\n,\r\n\"country\"  : \""+branch_country+"\"\r\n,\r\n\"city\"  : \""+branch_city+"\"\r\n,\r\n\"zipCode\"  : \""+branch_zipcode+"\"\r\n,\r\n\"building\"  : \""+branch_building+"\"\r\n,\r\n\"unit\"  : \""+branch_unit+"\"\r\n}"
  }

  $.ajax(settings).done(function (response) {
      alert("Edit Branch successfuly");
      location.reload();
  });
});

function delete_staff_modal(staff_id)
{
  $("#delete-staff-id").val(staff_id);
  $("#deleteStaffModal").modal();
}

$("#delete-staff-btn").click(function(){
  $("#overlay").css("display", "block");

  staff_id = $("#delete-staff-id").val();

  var settings = {
    "async": true,
    "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/merchant/"+staff_id,
    "method": "DELETE",
    "headers": {
      "content-type": "application/json"
    },
    "processData": false
  }

  $.ajax(settings).done(function (response) {
      alert("Delete staff successfuly");
      location.reload();
  });
});

function update_staff_modal(user_id)
{
  $("#overlay").css("display", "block");

  var settings = {
    "async": true,
    "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/merchant/"+user_id,
    "method": "GET",
    "headers": {
      "content-type": "application/json"
    },
    "processData": false
  }

  $.ajax(settings).done(function (response) {
    $("#edit-staff-id").val(response.data.identities[0].user_id);
    $("#edit-staff-email-address").val(response.data.email);
    $("#edit-staff-name").val(response.data.user_metadata.name);
    $("#edit-staff-designation").val(response.data.user_metadata.designation);
    $("#edit_staff_gender").val(response.data.user_metadata.gender);
    $("#edit_staff_phone").val(response.data.user_metadata.mobileNumber);

    if (response.data.allowedBranches != "") {
      length = $(".edit-branch-access-yes").length;
      length_allowed = response.data.allowedBranches.length;

      for (var i = 0; i < length; i++) {
        for (var j = 0; j < length_allowed; j++) {
          allowed_branch = response.data.allowedBranches[j].branchName;
          branch_name = $('input[name=edit-radio-branch-'+i+']').attr("branchName");

          if (allowed_branch == branch_name) {
            $('input[name=edit-radio-branch-'+i+']').prop("checked", true);
            $("#edit-default-edit-radio-branch-"+i).prop("disabled", false);
            break;
          } else {
            $('input[name=edit-radio-branch-'+i+']').prop("checked", false);
            $("#edit-default-edit-radio-branch-"+i).prop("disabled", true);
          }
        };
      }
    }

    var setBranchDefault = {
      "async": true,
      "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/merchant/getDefaultBranch/"+response.data.identities[0].user_id,
      "method": "GET",
      "headers": {
        "content-type": "application/json"
      },
      "processData": false
    }

    $.ajax(setBranchDefault).done(function (response) {
      length = $(".edit-branch-access-yes").length;
      default_name = response.data;

      if (default_name != "undefined") {
        for (var i = 0; i < length; i++) {
          branch_name = $("#edit-default-edit-radio-branch-"+i).attr("branchName");

          if (branch_name == default_name) {
            $("#edit-default-edit-radio-branch-"+i).prop("checked", true);
            $("#edit-default-edit-radio-branch-"+i).prop("disabled", false);
            break;
          } else {
            $("#edit-default-edit-radio-branch-"+i).prop("checked", false);
            $("#edit-default-edit-radio-branch-"+i).prop("disabled", true);
          }
        }
      } else {
        $(".edit-default-branch-class").prop("checked", false);
      }
    });
    

    if (typeof response.data.user_metadata.UserRights !== 'undefined') {

      if (typeof response.data.user_metadata.UserRights.admin !== 'undefined') {
        if (response.data.user_metadata.UserRights.admin == true) {
          $("#edit-admin-radio-true").prop("checked", true);
        } else {
          $("#edit-admin-radio-true").prop("checked", false);
        }
      }

      if (typeof response.data.user_metadata.UserRights.company !== 'undefined') {
        if (response.data.user_metadata.UserRights.company == true) {
          $("#edit-company-radio-true").prop("checked", true);
        } else {
          $("#edit-company-radio-true").prop("checked", false);
        }
      }

      if (typeof response.data.user_metadata.UserRights.card !== 'undefined') {
        if (response.data.user_metadata.UserRights.card == true) {
          $("#edit-card-radio-true").prop("checked", true);
        } else {
          $("#edit-card-radio-true").prop("checked", false);
        }
      }

      if (typeof response.data.user_metadata.UserRights.queue !== 'undefined') {
        if (response.data.user_metadata.UserRights.queue == true) {
          $("#edit-queue-radio-true").prop("checked", true);
        } else {
          $("#edit-queue-radio-true").prop("checked", false);
        }
      }

      if (typeof response.data.user_metadata.UserRights.order !== 'undefined') {
        if (response.data.user_metadata.UserRights.order == true) {
          $("#edit-order-radio-true").prop("checked", true);
        } else {
          $("#edit-order-radio-true").prop("checked", false);
        }
      }

      if (typeof response.data.user_metadata.UserRights.payment !== 'undefined') {
        if (response.data.user_metadata.UserRights.payment == true) {
          $("#edit-payment-radio-true").prop("checked", true);
        } else {
          $("#edit-payment-radio-true").prop("checked", false);
        }
      }

      if (typeof response.data.user_metadata.UserRights.product !== 'undefined') {
        if (response.data.user_metadata.UserRights.product == true) {
          $("#edit-product-radio-true").prop("checked", true);
        } else {
          $("#edit-product-radio-true").prop("checked", false);
        }
      }

      if (typeof response.data.user_metadata.UserRights.kitchen !== 'undefined') {
        if (response.data.user_metadata.UserRights.kitchen == true) {
          $("#edit-kitchen-radio-true").prop("checked", true);
        } else {
          $("#edit-kitchen-radio-true").prop("checked", false);
        }
      }

      if (typeof response.data.user_metadata.UserRights.report !== 'undefined') {
        if (response.data.user_metadata.UserRights.report == true) {
          $("#edit-report-radio-true").prop("checked", true);
        } else {
          $("#edit-report-radio-true").prop("checked", false);
        }
      }

      if (typeof response.data.user_metadata.UserRights.finance !== 'undefined') {
        if (response.data.user_metadata.UserRights.finance == true) {
          $("#edit-finance-radio-true").prop("checked", true);
        } else {
          $("#edit-finance-radio-true").prop("checked", false);
        }
      }

      if (typeof response.data.user_metadata.UserRights.marketing !== 'undefined') {
        if (response.data.user_metadata.UserRights.marketing == true) {
          $("#edit-marketing-radio-true").prop("checked", true);
        } else {
          $("#edit-marketing-radio-true").prop("checked", false);
        }
      }
    }

    $("#editStaffModal").modal();
    $("#overlay").css("display", "none");
  }); 
}

function branch_operating_hour_modal(branch_id)
{
  $("#overlay").css("display", "block");

  company_name = $("#operating-hours-company-name").val();
  $("#operating-hours-branch-id").val(branch_id);
  
  var settings = {
    "async": true,
    "url": "https://5qbun48kuc.execute-api.ap-southeast-1.amazonaws.com/Prod/merchant/branch/branchHours/"+company_name+"/"+branch_id,
    "method": "GET",
    "headers": {
      "content-type": "application/json"
      },
    "processData": false
  }

  $.ajax(settings).done(function (response) {
    $("#operating-hours-branch-name").text(branch_id);

    if (typeof response.data.Items[0] !== 'undefined') {

      $("#open-monday").val(response.data.Items[0].branchHoursData.Monday.startHours);
      $("#close-monday").val(response.data.Items[0].branchHoursData.Monday.endHours);
      $("#profile-monday").val(response.data.Items[0].branchHoursData.Monday.addTxt);
    }

    if (typeof response.data.Items[0] !== 'undefined') {
      $("#open-tuesday").val(response.data.Items[0].branchHoursData.Tuesday.startHours);
      $("#close-tuesday").val(response.data.Items[0].branchHoursData.Tuesday.endHours);
      $("#profile-tuesday").val(response.data.Items[0].branchHoursData.Tuesday.addTxt);
    }

    if (typeof response.data.Items[0] !== 'undefined') {
      $("#open-wednesday").val(response.data.Items[0].branchHoursData.Wednesday.startHours);
      $("#close-wednesday").val(response.data.Items[0].branchHoursData.Wednesday.endHours);
      $("#profile-wednesday").val(response.data.Items[0].branchHoursData.Wednesday.addTxt);
    }

    if (typeof response.data.Items[0] !== 'undefined') {
      $("#open-thursday").val(response.data.Items[0].branchHoursData.Thursday.startHours);
      $("#close-thursday").val(response.data.Items[0].branchHoursData.Thursday.endHours);
      $("#profile-thursday").val(response.data.Items[0].branchHoursData.Thursday.addTxt);
    }

    if (typeof response.data.Items[0] !== 'undefined') {
      $("#open-friday").val(response.data.Items[0].branchHoursData.Friday.startHours);
      $("#close-friday").val(response.data.Items[0].branchHoursData.Friday.endHours);
      $("#profile-friday").val(response.data.Items[0].branchHoursData.Friday.addTxt);
    }

    if (typeof response.data.Items[0] !== 'undefined') {
      $("#open-saturday").val(response.data.Items[0].branchHoursData.Saturday.startHours);
      $("#close-saturday").val(response.data.Items[0].branchHoursData.Saturday.endHours);
      $("#profile-saturday").val(response.data.Items[0].branchHoursData.Saturday.addTxt);
    }

    if (typeof response.data.Items[0] !== 'undefined') {
      $("#open-sunday").val(response.data.Items[0].branchHoursData.Sunday.startHours);
      $("#close-sunday").val(response.data.Items[0].branchHoursData.Sunday.endHours);
      $("#profile-sunday").val(response.data.Items[0].branchHoursData.Sunday.addTxt);
    }

    if (typeof response.data.Items[0] !== 'undefined') {
      if (typeof response.data.Items[0].branchHoursData.Holiday !== 'undefined') {
        $("#open-holiday").val(response.data.Items[0].branchHoursData.Holiday.startHours);
        $("#close-holiday").val(response.data.Items[0].branchHoursData.Holiday.endHours);
        $("#profile-holiday").val(response.data.Items[0].branchHoursData.Holiday.addTxt);
      }
    }

    $("#setBranchOperatingHourModal").modal();
    $("#overlay").css("display", "none");
  });
}

function branch_staff_access_list_modal(branch_id)
{
  $("#overlay").css("display", "block");

  company_name = $("#staff-listing-company-id").val();
  $("#staff-list-branch-name").val(branch_id);

  var settings = {
    "async": true,
    "url": "https://u71yt1ngo1.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/branch/getEmployees/"+company_name+"/"+branch_id,
    "method": "GET",
    "headers": {
      "content-type": "application/json"
    },
    "processData": false
  }

  $.ajax(settings).done(function (response) {

    for (var i = 0; i < response.data.length; i++) {
      if (response.data[i].statusCode == 200) {
        var obj = JSON.parse(response.data[i].body);
        $("#staff-list-table").append(
            "<tr class='access-list-staff'>"+
              "<td>"+branch_id+"</td>"+
              "<td>"+obj.email+"</td>"+
              "<td>"+obj.user_metadata.gender+"</td>"+
              "<td>"+obj.user_metadata.name+"</td>"+
              "<td>"+obj.user_metadata.designation+"</td>"+
              "<td>"+obj.user_metadata.mobileNumber+"</td>"+
              "<td style='text-align: center;'>"+
                  "<i class='fa fa-check fa-lg' aria-hidden='true' style='color:#89C45B;'></i>"+
              "</td>"+
              "<td>-</td>"+
            "</tr>"
          );
      }
    };

    $("#staffAccessListModal").modal();
    $("#overlay").css("display", "none");
  });
}

$("#staff-list-branch-name").change(function(){
  branch_id = $("#staff-list-branch-name").val();

  $("#overlay").css("display", "block");
  $(".access-list-staff").remove();

  company_name = $("#staff-listing-company-id").val();
  $("#staff-list-branch-name").val(branch_id);

  var settings = {
    "async": true,
    "url": "https://u71yt1ngo1.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/branch/getEmployees/"+company_name+"/"+branch_id,
    "method": "GET",
    "headers": {
      "content-type": "application/json"
    },
    "processData": false
  }

  $.ajax(settings).done(function (response) {

    for (var i = 0; i < response.data.length; i++) {
      if (response.data[i].statusCode == 200) {
        var obj = JSON.parse(response.data[i].body);
        $("#staff-list-table").append(
            "<tr class='access-list-staff'>"+
              "<td>"+branch_id+"</td>"+
              "<td>"+obj.email+"</td>"+
              "<td>"+obj.user_metadata.gender+"</td>"+
              "<td>"+obj.user_metadata.name+"</td>"+
              "<td>"+obj.user_metadata.designation+"</td>"+
              "<td>"+obj.user_metadata.mobileNumber+"</td>"+
              "<td style='text-align: center;'>"+
                  "<i class='fa fa-check fa-lg' aria-hidden='true' style='color:#89C45B;'></i>"+
              "</td>"+
              "<td>-</td>"+
            "</tr>"
          );
      }
    };

    $("#overlay").css("display", "none");
  });
});

$('#radio_branch input').on('change', function() {
   name_val = $(this).attr('name');

   radio_value = $('input[name='+name_val+']:checked', '#radio_branch').val();

   if (radio_value == 1) {
    $("#default-"+name_val).prop('disabled', false);
   } else {
    $("#default-"+name_val).prop('disabled', true);
    $("#default-"+name_val).prop('checked', false);
   }

});

$('#edit_radio_branch input').on('change', function() {
   name_val = $(this).attr('name');

   radio_value = $('input[name='+name_val+']:checked', '#edit_radio_branch').val();

   if (radio_value == 1) {
    $("#edit-default-"+name_val).prop('disabled', false);
   } else {
    $("#edit-default-"+name_val).prop('disabled', true);
    $("#edit-default-"+name_val).prop('checked', false);
   }

});

function branch_delivery_modal(branch_id) {

  $("#brachDeliveryModal").modal();
}

function block_branch_delivery(branch_id) {

  

  $("#branch-delivery-"+branch_id).attr('class', 'fa fa-ban fa-lg');
  $("#branch-delivery-"+branch_id).css('color', '#ff6c60');
  
  $("#branch-delivery-link-"+branch_id).attr('onclick', 'unblock_branch_delivery('+branch_id+')');

  alert("block branch delivery type successfuly");

}

function unblock_branch_delivery(branch_id) {

  //TO DO : CALLING API HERE

  $("#branch-delivery-"+branch_id).attr('class', 'fa fa-check-circle fa-lg');
  $("#branch-delivery-"+branch_id).css('color', '#89C45B');
  
  $("#branch-delivery-link-"+branch_id).attr('onclick', 'block_branch_delivery('+branch_id+')');

  alert("unblock branch delivery type successfuly");

}

function block_branch(branch_id) {
  $("#block-branch-id").val(branch_id);
  $("#blockBranchModal").modal();
}

$("#block-branch-btn").click(function(){
  var $btn = $("#block-branch-btn").button('loading');

  company_name = $("#block-branch-company-name").val();
  branch_id = $("#block-branch-id").val();


  var settings = {
    "async": true,
    "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/company/branch/editBranch/"+branch_id+"/"+company_name,
    "method": "PUT",
    "headers": {
      "content-type": "application/json"
    },
    "processData": true,
    "data": "{\r\n\"status\"  : \"I\"}"

  }

  $.ajax(settings).done(function (response) {
    branch_block_id = $("#block-branch-id").val();

    branch_block_id = branch_block_id.replace(/\s/g, '');

    $("#branch-"+branch_block_id).attr('class', 'fa fa-ban fa-lg');
    $("#branch-"+branch_block_id).css('color', '#ff6c60');
    
    $("#branch-link-"+branch_block_id).attr('onclick', 'unblock_branch('+branch_id+')');

    alert("block branch successfuly");

    $("#blockBranchModal").modal('hide');

    $btn.button('reset');
  });
});

function unblock_branch(branch_id) {
  $("#unblock-branch-id").val(branch_id);
  $("#unblockBranchModal").modal();
}

$("#unblock-branch-btn").click(function(){
  var $btn = $("#unblock-branch-btn").button('loading');

  company_name = $("#unblock-branch-company-name").val();
  branch_id = $("#unblock-branch-id").val();

  var settings = {
    "async": true,
    "url": "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/company/branch/editBranch/"+branch_id+"/"+company_name,
    "method": "PUT",
    "headers": {
      "content-type": "application/json"
    },
    "processData": true,
    "data": "{\r\n\"status\"  : \"A\"}"

  }

  $.ajax(settings).done(function (response) {
    branch_block_id = $("#unblock-branch-id").val();

    branch_block_id = branch_block_id.replace(/\s/g, '');

    $("#branch-"+branch_block_id).attr('class', 'fa fa-check-circle fa-lg');
    $("#branch-"+branch_block_id).css('color', '#89C45B');
    
    $("#branch-link-"+branch_block_id).attr('onclick', 'block_branch('+branch_id+')');

    alert("unblock branch successfuly");

    $("#unblockBranchModal").modal('hide');

    $btn.button('reset');
  });

});

$('.timepicker-default').timepicker();

$("#set-branch-operating-hours-btn").click(function(){
  $("#overlay").css("display", "block");

  var $btn = $("#set-branch-operating-hours-btn").button('loading');
  
  company_name = "-";
  if ($("#operating_hours_company_name").val() != "") {
    company_name    = $("#operating_hours_company_name").val();
  }

  branch_id = "-";
  if ($("#operating-hours-branch-id").val() != "") {
    branch_id    = $("#operating-hours-branch-id").val();
  }

  open_monday = "-";
  if ($("#open-monday").val() != "") {
    open_monday    = $("#open-monday").val();
  }

  close_monday = "-";
  if ($("#close-monday").val() != "") {
    close_monday    = $("#close-monday").val();
  }

  profile_monday = "-";
  if ($("#profile-monday").val() != "") {
    profile_monday    = $("#profile-monday").val();
  }

  open_tuesday = "-";
  if ($("#open-tuesday").val() != "") {
    open_tuesday    = $("#open-tuesday").val();
  }

  close_tuesday = "-";
  if ($("#close-tuesday").val() != "") {
    close_tuesday    = $("#close-tuesday").val();
  }

  profile_tuesday = "-";
  if ($("#profile-tuesday").val() != "") {
    profile_tuesday    = $("#profile-tuesday").val();
  }

  open_wednesday = "-";
  if ($("#open-wednesday").val() != "") {
    open_wednesday    = $("#open-wednesday").val();
  }

  close_wednesday = "-";
  if ($("#close-wednesday").val() != "") {
    close_wednesday    = $("#close-wednesday").val();
  }

  profile_wednesday = "-";
  if ($("#profile-wednesday").val() != "") {
    profile_wednesday    = $("#profile-wednesday").val();
  }

  open_thursday = "-";
  if ($("#open-thursday").val() != "") {
    open_thursday    = $("#open-thursday").val();
  }

  close_thursday = "-";
  if ($("#close-thursday").val() != "") {
    close_thursday    = $("#close-thursday").val();
  }

  profile_thursday = "-";
  if ($("#profile-thursday").val() != "") {
    profile_thursday    = $("#profile-thursday").val();
  }

  open_friday = "-";
  if ($("#open-friday").val() != "") {
    open_friday    = $("#open-friday").val();
  }

  close_friday = "-";
  if ($("#close-friday").val() != "") {
    close_friday    = $("#close-friday").val();
  }

  profile_friday = "-";
  if ($("#profile-friday").val() != "") {
    profile_friday    = $("#profile-friday").val();
  }

  open_saturday = "-";
  if ($("#open-saturday").val() != "") {
    open_saturday    = $("#open-saturday").val();
  }

  close_saturday = "-";
  if ($("#close-saturday").val() != "") {
    close_saturday    = $("#close-saturday").val();
  }

  profile_saturday = "-";
  if ($("#profile-saturday").val() != "") {
    profile_saturday    = $("#profile-saturday").val();
  }

  open_sunday = "-";
  if ($("#open-sunday").val() != "") {
    open_sunday    = $("#open-sunday").val();
  }

  close_sunday = "-";
  if ($("#close-sunday").val() != "") {
    close_sunday    = $("#close-sunday").val();
  }

  profile_sunday = "-";
  if ($("#profile-sunday").val() != "") {
    profile_sunday    = $("#profile-sunday").val();
  }

  open_holiday = "-";
  if ($("#open-holiday").val() != "") {
    open_holiday    = $("#open-holiday").val();
  }

  close_holiday = "-";
  if ($("#close-holiday").val() != "") {
    close_holiday    = $("#close-holiday").val();
  }

  profile_holiday = "-";
  if ($("#profile-holiday").val() != "") {
    profile_holiday    = $("#profile-holiday").val();
  }

  data = "{\r\n\"compId\":\""+company_name+"\", \r\n\"branchId\":\""+branch_id+"\",\r\n\"branchHoursData\":{\r\n\"Monday\":{\r\n\"startHours\":\""+open_monday+"\",\r\n\"endHours\":\""+close_monday+"\",\r\n\"addTxt\":\""+profile_monday+"\",\r\n\"isOpen\":\"true\"\r\n},\r\n\"Tuesday\":{\r\n\"startHours\":\""+open_tuesday+"\",\r\n\"endHours\":\""+close_tuesday+"\",\r\n\"addTxt\":\""+profile_tuesday+"\",\r\n\"isOpen\":\"true\"\r\n},\r\n\"Wednesday\":{\r\n\"startHours\":\""+open_wednesday+"\",\r\n\"endHours\":\""+close_wednesday+"\",\r\n\"addTxt\":\""+profile_wednesday+"\",\r\n\"isOpen\":\"true\"\r\n},\r\n\"Thursday\":{\r\n\"startHours\":\""+open_thursday+"\",\r\n\"endHours\":\""+close_thursday+"\",\r\n\"addTxt\":\""+profile_thursday+"\",\r\n\"isOpen\":\"true\"\r\n},\r\n\"Friday\":{\r\n\"startHours\":\""+open_friday+"\",\r\n\"endHours\":\""+close_friday+"\",\r\n\"addTxt\":\""+profile_friday+"\",\r\n\"isOpen\":\"true\"\r\n},\r\n\"Saturday\":{\r\n\"startHours\":\""+open_saturday+"\",\r\n\"endHours\":\""+close_saturday+"\",\r\n\"addTxt\":\""+profile_saturday+"\",\r\n\"isOpen\":\"true\"\r\n},\r\n\"Sunday\":{\r\n\"startHours\":\""+open_sunday+"\",\r\n\"endHours\":\""+close_sunday+"\",\r\n\"addTxt\":\""+profile_sunday+"\",\r\n\"isOpen\":\"false\"\r\n},\r\n\"Holiday\":{\r\n\"startHours\":\""+open_holiday+"\",\r\n\"endHours\":\""+close_holiday+"\",\r\n\"addTxt\":\""+profile_holiday+"\",\r\n\"isOpen\":\"false\"\r\n}\r\n}\r\n}";
  if ($("#operating-hours-all-branch:checked").val()) {
    data = "{\r\n\"compId\":\""+company_name+"\", \r\n\"all\":\"true\",\r\n\"branchId\":\""+branch_id+"\",\r\n\"branchHoursData\":{\r\n\"Monday\":{\r\n\"startHours\":\""+open_monday+"\",\r\n\"endHours\":\""+close_monday+"\",\r\n\"addTxt\":\""+profile_monday+"\",\r\n\"isOpen\":\"true\"\r\n},\r\n\"Tuesday\":{\r\n\"startHours\":\""+open_tuesday+"\",\r\n\"endHours\":\""+close_tuesday+"\",\r\n\"addTxt\":\""+profile_tuesday+"\",\r\n\"isOpen\":\"true\"\r\n},\r\n\"Wednesday\":{\r\n\"startHours\":\""+open_wednesday+"\",\r\n\"endHours\":\""+close_wednesday+"\",\r\n\"addTxt\":\""+profile_wednesday+"\",\r\n\"isOpen\":\"true\"\r\n},\r\n\"Thursday\":{\r\n\"startHours\":\""+open_thursday+"\",\r\n\"endHours\":\""+close_thursday+"\",\r\n\"addTxt\":\""+profile_thursday+"\",\r\n\"isOpen\":\"true\"\r\n},\r\n\"Friday\":{\r\n\"startHours\":\""+open_friday+"\",\r\n\"endHours\":\""+close_friday+"\",\r\n\"addTxt\":\""+profile_friday+"\",\r\n\"isOpen\":\"true\"\r\n},\r\n\"Saturday\":{\r\n\"startHours\":\""+open_saturday+"\",\r\n\"endHours\":\""+close_saturday+"\",\r\n\"addTxt\":\""+profile_saturday+"\",\r\n\"isOpen\":\"true\"\r\n},\r\n\"Sunday\":{\r\n\"startHours\":\""+open_sunday+"\",\r\n\"endHours\":\""+close_sunday+"\",\r\n\"addTxt\":\""+profile_sunday+"\",\r\n\"isOpen\":\"false\"\r\n},\r\n\"Holiday\":{\r\n\"startHours\":\""+open_holiday+"\",\r\n\"endHours\":\""+close_holiday+"\",\r\n\"addTxt\":\""+profile_holiday+"\",\r\n\"isOpen\":\"false\"\r\n}\r\n}\r\n}";
  }
      
  var settings = {
    "async": true,
    "url": "https://5qbun48kuc.execute-api.ap-southeast-1.amazonaws.com/Prod/merchant/branch/branchHours",
    "method": "POST",
    "headers": {
      "content-type": "application/json"
      },
    "processData": true,
    "data": data
  }

  $.ajax(settings).done(function (response) {
    alert('Operating hours setup successfuly');
    // location.reload();
  });
});

$("#change-company-logo").click(function(){
  $("#changeCompanyLogoModal").modal();
});

$("#change-company-banner").click(function(){
  $("#changeCompanyBannerModal").modal();
});

$("#submit-delivery-status").click(function(){
  $("#overlay").css("display", "block");
  
  count_branch = $("#count-branch-delivery").val();
  company_name = $("#branch-delivery-company-name").val();

  var array_data = [];
  for (var i = 0; i < count_branch; i++) {
    branch_id = $("#branch-delivery-name-"+i).val();
    
    self_collect = false;
    if($("#self-collect-"+i).prop('checked') == true){
      self_collect = true;
    }

    take_away = false;
    if($("#take-away-"+i).prop('checked') == true){
      take_away = true;
    }

    serve_table = false;
    if($("#serve-to-table-"+i).prop('checked') == true){
      serve_table = true;
    }

    delivery = false;
    if($("#delivery-"+i).prop('checked') == true){
      delivery = true;
    }

    array_data.push({
      branchId:branch_id,
      deliverOptionsData:{
        deliver:delivery,
        selfCollect:self_collect,
        tableDeliver:serve_table,
        takeAway:take_away
      }
    });

  };

  var data = JSON.stringify(array_data);

  var setting = {
    "async": true,
    "url": "https://u71yt1ngo1.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/branch/deliveryOptions/"+company_name,
    "method": "POST",
    "headers": {
      "content-type": "application/json"
      },
    "processData": true,
    "data": data
  }

  $.ajax(setting).done(function (response) {
    alert('Setup delivery option successfuly');
    location.reload();
  });
});

$('#staffAccessListModal').on('hidden.bs.modal', function () {
  $(".access-list-staff").remove();
})