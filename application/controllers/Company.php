<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Auth0\SDK\API\Management;

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class Company extends CI_Controller {

	public function get_branch_list($company_name)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/company/branch/getBranch/".$company_name."/all",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache",
		    "postman-token: 67b57528-3fc4-718d-6efb-1fe6b83a0ea3"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  $array_response = json_decode($response);

		    foreach ($array_response->data as $row) {

			  	$name = $row->branchName;

			  	$block_branch_id = str_replace(' ', '', $row->id);

			  	if (isset($row->status)) {
				  	if ($row->status == 'A') {
				  		$button = '<a href="#" class="acordion-icon" data-toggle="tooltip" data-placement="top" title="Block" id="branch-link-'.$block_branch_id.'" onclick="block_branch(\''.$row->id.'\')"><i class="fa fa-check-circle fa-lg" id="branch-'.$block_branch_id.'" style="color: #89C45B;" aria-hidden="true"></i></a> <a href="#" onclick="delete_branch_modal(\''.$row->id.'\')"><i class="fa fa-trash fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a> <a href="#" onclick="update_branch_modal(\''.$row->id.'\', \''.$company_name.'\')"><i class="fa fa-pencil fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a>';
				  		if ($row->isHeadquarter == 1) {
				  			$button = '<a href="#" onclick="update_branch_modal(\''.$row->id.'\', \''.$company_name.'\')"><i class="fa fa-pencil fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a>';
				  		}
				  	} else {
				  		$button = '<a href="#" class="acordion-icon" data-toggle="tooltip" data-placement="top" title="Block" id="branch-link-'.$block_branch_id.'" onclick="unblock_branch(\''.$row->id.'\')"><i class="fa fa-ban fa-lg" id="branch-'.$block_branch_id.'" style="color: #ff6c60;" aria-hidden="true"></i></a> <a href="#" onclick="delete_branch_modal(\''.$row->id.'\')"><i class="fa fa-trash fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a> <a href="#" onclick="update_branch_modal(\''.$row->id.'\', \''.$company_name.'\')"><i class="fa fa-pencil fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a>';
				  		if ($row->isHeadquarter == 1) {
				  			$button = '<a href="#" onclick="update_branch_modal(\''.$row->id.'\', \''.$company_name.'\')"><i class="fa fa-pencil fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a>';
				  		}
				  	}	
				} else {
					$button = '<a href="#" class="acordion-icon" data-toggle="tooltip" data-placement="top" title="Block" id="branch-link-'.$block_branch_id.'" onclick="block_branch(\''.$row->id.'\')"><i class="fa fa-check-circle fa-lg" id="branch-'.$block_branch_id.'" style="color: #89C45B;" aria-hidden="true"></i></a> <a href="#" onclick="delete_branch_modal(\''.$row->id.'\')"><i class="fa fa-trash fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a> <a href="#" onclick="update_branch_modal(\''.$row->id.'\', \''.$company_name.'\')"><i class="fa fa-pencil fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a>';
					if ($row->isHeadquarter == 1) {
						$button = '<a href="#" onclick="update_branch_modal(\''.$row->id.'\', \''.$company_name.'\')"><i class="fa fa-pencil fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a>';
					}
				}

		  		$delivery_icon = '<a href="#" onclick="branch_delivery_modal(\''.$row->id.'\')"><i class="fa fa-truck fa-2x" aria-hidden="true" style="color: #1FB5AD;"></i></a>';
		  		$hours_icon = '<a href="#" onclick="branch_operating_hour_modal(\''.$row->id.'\')"><i class="fa fa-clock-o fa-2x" aria-hidden="true" style="color: #1FB5AD;"></i></a>';
		  		$staff_icon = '<a href="#" onclick="branch_staff_access_list_modal(\''.$row->id.'\')"><span class="fa-stack"><i class="fa fa-circle fa-stack-2x" style="color: #1FB5AD;"></i><i class="fa fa-users fa-stack-1x fa-inverse"></i></span></a>';
			  	
			  	$street = '';
			  	if (isset($row->street)) {
			  		$street = $row->street;
			  	}

			  	$unit = '';
			  	if (isset($row->unit)) {
			  		$unit = $row->unit;
			  	}

			  	$building = '';
			  	if (isset($row->building)) {
			  		$building = $row->building;
			  	}

			  	$zipCode = '';
			  	if (isset($row->zipCode)) {
			  		$zipCode = $row->zipCode;
			  	}

			  	$city = '';
			  	if (isset($row->city)) {
			  		$city = $row->city;
			  	}

			  	$country = '';
			  	if (isset($row->country)) {
			  		$country = $row->country;
			  	}

			  	$branch_list[] = array(
					'branch_name' 		=> $name,
					'branch_street' 	=> $street,
					'branch_unit'	 	=> $unit,
					'branch_building' 	=> $building,
					'branch_zipcode' 	=> $zipCode,
					'branch_city'	 	=> $city,
					'branch_country' 	=> $country,
					'branch_delivery' 	=> $delivery_icon,
					'hours' 			=> $hours_icon,
					'staffs' 			=> $staff_icon,
					'branch_action' 	=> $button,
				);
		    }

		  echo json_encode($branch_list);
		}
	}
	
	public function get_staff_list($company_name){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/company/staff/getAllStaffByCompany/".$company_name,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache",
		    "postman-token: 67b57528-3fc4-718d-6efb-1fe6b83a0ea3"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {

			$array_response = json_decode($response);

			foreach ($array_response->data as $row) {

				$staff_list[] = array(
				 'email'   => $row->email,
				 'last_login'  => isset($row->last_login)?$row->last_login:"-",
				 'name'   => isset($row->user_metadata->name)?$row->user_metadata->name:"-",
				 'designation'   => isset($row->user_metadata->designation)?$row->user_metadata->designation:"-",
				 'gender'   => isset($row->user_metadata->gender)?$row->user_metadata->gender:"-",
				 'phone'   => isset($row->user_metadata->mobileNumber)?$row->user_metadata->mobileNumber:"-",
				 'action'   => '<a href="#" onclick="delete_staff_modal(\''.$row->identities[0]->user_id.'\')"><i class="fa fa-trash fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a> <a href="#" onclick="update_staff_modal(\''.$row->identities[0]->user_id.'\')"><i class="fa fa-pencil fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a>'
				);

			}

			echo json_encode($staff_list);

		}
	}

	public function choose_staff_page($branch_name)
	{
		if ($this->session->userdata('user_id') != "") {
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$data['branch_name'] = $branch_name;

			$company_name = str_replace('%20', ' ', $this->session->userdata('company_name'));

			$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/company/staff/getAllStaffByCompany/".$company_name,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache",
		    "postman-token: 67b57528-3fc4-718d-6efb-1fe6b83a0ea3"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {

			$array_response = json_decode($response);

			foreach ($array_response->data as $row) {

					$button = '<button class="btn btn-primary btn-xs" onclick="assign_to_branch(\''.$row->identities[0]->user_id.'\');">Assign to branch</button>';

					$staff_list[] = array(
					 'email'   => $row->email,
					 'action'  => $button,
					 'name'   => $row->nickname
					);

			}

			$data['staff_data'] = $staff_list;

		}

			$this->load->view('choose_staff_page_view', $data);
		} else {
			header('location:'.base_url());
		}
	}

	public function messages()
	{
		if ($this->session->userdata('user_id') != "") {
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$access_token = $this->session->userdata('access_token');
			$user_id = $this->session->userdata('user_id');

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/merchant/".$user_id,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "authorization: Bearer ".$access_token,
			    "cache-control: no-cache",
			    "postman-token: e99ed592-db54-51e4-24f5-35e5cd64a34d"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_user_profile = json_decode($response);
			}

			$data['user_profile'] = $array_user_profile;

			$this->load->view('navigation_view', $data);
			$this->load->view('company_message_management_view', $data);
		} else {
			header('location:'.base_url());
		}
	}

	public function add_message()
	{
		if ($this->session->userdata('user_id') != "") {
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$access_token = $this->session->userdata('access_token');

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://cq-merchant.auth0.com/userinfo",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "authorization: Bearer ".$access_token,
			    "cache-control: no-cache",
			    "postman-token: e99ed592-db54-51e4-24f5-35e5cd64a34d"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_user_profile = json_decode($response);
			}

			$data['user_profile'] = $array_user_profile;

			$this->load->view('company_add_message_view', $data);
		} else {
			header('location:'.base_url());
		}
	}

	public function get_message_list($company_name)
	{
		if ($this->session->userdata('user_id') != "") {
			
			$company_name = str_replace('%20', ' ', $company_name);

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/merchant/company/message/".$company_name,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: 4016b88f-29ac-b257-8411-c4151bb2156d"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  	
			  	$array_response = json_decode($response);

				foreach ($array_response->data as $row) {
						
						$buttons = '<a href="'.base_url().'index.php/company/edit_message/'.$company_name.'/'.$row->id.'"><i class="fa fa-pencil fa-lg" aria-hidden="true" style="color:#ACACAC;"></i></a> <a href="#" onclick="delete_message(\''.$row->id.'\', \''.$company_name.'\')"><i class="fa fa-trash fa-lg" aria-hidden="true" style="color:#ACACAC;"></i></a>';

						$message_list[] = array(
						 'id'   => $row->id,
						 'created_date'   => $row->date,
						 'creator'   => $row->creater,
						 'title'   => $row->title,
						 'message'   => $row->message,
						 'action' => $buttons
						);

				}

				echo json_encode($message_list);
			}
			
		} else {
			header('location:'.base_url());
		}
	}

	public function edit_message($company_name, $message_id)
	{
		if ($this->session->userdata('user_id') != "") {
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;
			$data['message_id'] = $message_id;
		
			$company_name = str_replace('%20', ' ', $company_name);

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/merchant/company/message/getById/".$company_name."/".$message_id,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: 404b018e-bff2-85b0-ca8a-5f181835ad58"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {

			  $array_response = json_decode($response);
			  $data['update_data'] = $array_response->data;

			}

			$access_token = $this->session->userdata('access_token');

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://cq-merchant.auth0.com/userinfo",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "authorization: Bearer ".$access_token,
			    "cache-control: no-cache",
			    "postman-token: e99ed592-db54-51e4-24f5-35e5cd64a34d"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_user_profile = json_decode($response);
			}

			$data['user_profile'] = $array_user_profile;
			
			$this->load->view('navigation_view', $data);
			$this->load->view('company_update_message_view', $data);

		} else {
			header('location:'.base_url());
		}
	}

	public function management()
	{
		if ($this->session->userdata('user_id') != "") {
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$access_token = $this->session->userdata('access_token');
			$user_id = $this->session->userdata('user_id');

			$company_name = str_replace('%20', ' ', $this->session->userdata('company_name'));

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/merchant/".$user_id,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "authorization: Bearer ".$access_token,
			    "cache-control: no-cache",
			    "postman-token: e99ed592-db54-51e4-24f5-35e5cd64a34d"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_user_profile = json_decode($response);
			}

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/company/branch/getBranch/".$company_name."/all",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: 67b57528-3fc4-718d-6efb-1fe6b83a0ea3"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_branch = json_decode($response);
			}

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://u71yt1ngo1.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/branch/deliveryOptions/".$company_name,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: 09e7c1ea-41ba-eb09-f56d-401b5afbb945"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_branch_delivery_option = json_decode($response);
			}

			$data['array_branch_delivery'] = $array_branch_delivery_option;
			$data['array_branch'] = $array_branch;
			$data['user_profile'] = $array_user_profile;

			$this->load->view('navigation_view', $data);
			$this->load->view('company_management_view', $data);

		} else {
			header('location:'.base_url());
		}
	}

	function upload_company_logo()
	{
		if (isset($_FILES['file'])) {

			if ( 0 < $_FILES['file']['error'] ) {
		        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
		    } else {

		    	$file = $_FILES['file'];
		    	$name = $file['name'];
				$tmp_name = $file['tmp_name'];

				$tmp_file_name = $name;
				$outputFile = __DIR__ . '/uploads/bank_logo/'.$tmp_file_name;
				move_uploaded_file($tmp_name, $outputFile);

			    $s3 = new Aws\S3\S3Client([
				    'version'     => 'latest',
				    'region'      => 'ap-southeast-1',
				    'credentials' => [
				        'key'    => 'AKIAICP7HTYO3RQ7WVJA',
				        'secret' => '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'
				    ]
				]);

			    try{
					$result = $s3->putObject(array(
					    'Bucket'     => 'cardqueue',
					    'Key'        => 'Merchant/'.$tmp_file_name,
					    'SourceFile'  => $outputFile,
					    'Body' 		 => fopen($outputFile, 'rb'),
					    'ACL' => 'public-read'
					));

				} catch (Exception $e) {
					echo $e->getMessage() . "\n";
				}

				unlink($outputFile);

				echo $result['ObjectURL'];
		    }
		} else {
			echo "";
		}
	}

	function faq()
	{
		if ($this->session->userdata('user_id') != "") {
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://6eat2etcyb.execute-api.ap-southeast-1.amazonaws.com/Prod/faq/merchant",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: 4319c23b-8c45-bd6f-b465-d2dc737d539c"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_response = json_decode($response);

			  $data['merchant_faq_data'] = html_entity_decode(base64_decode($array_response->data));
			}

			$access_token = $this->session->userdata('access_token');
			$user_id = $this->session->userdata('user_id');

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/merchant/".$user_id,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "authorization: Bearer ".$access_token,
			    "cache-control: no-cache",
			    "postman-token: e99ed592-db54-51e4-24f5-35e5cd64a34d"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_user_profile = json_decode($response);
			}

			$data['user_profile'] = $array_user_profile;

			$this->load->view('navigation_view', $data);
			$this->load->view('company_faq_view', $data);

		} else {
			header('location:'.base_url());
		}
	}

	function tos()
	{
		if ($this->session->userdata('user_id') != "") {
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$user_id = $this->session->userdata('user_id');

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://6eat2etcyb.execute-api.ap-southeast-1.amazonaws.com/Prod/tos/merchant",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: 4319c23b-8c45-bd6f-b465-d2dc737d539c"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_response = json_decode($response);
			  $data['merchant_tos_data'] = html_entity_decode(base64_decode($array_response->data));
			}

			$access_token = $this->session->userdata('access_token');

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://szug7heey4.execute-api.ap-southeast-1.amazonaws.com/Prod/api/v1/merchant/".$user_id,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "authorization: Bearer ".$access_token,
			    "cache-control: no-cache",
			    "postman-token: e99ed592-db54-51e4-24f5-35e5cd64a34d"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_user_profile = json_decode($response);
			}

			$data['user_profile'] = $array_user_profile;

			$this->load->view('navigation_view', $data);
			$this->load->view('company_tos_view', $data);

		} else {
			header('location:'.base_url());
		}
	}
}
