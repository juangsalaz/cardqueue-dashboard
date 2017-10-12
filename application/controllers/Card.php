<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Auth0\SDK\API\Management;

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class Card extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('user_id') != "") {
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$nickname = $this->session->userdata('nickname');
			$company_name = str_replace('%20', ' ', $this->session->userdata('company_name'));
			$data['company_name'] = $company_name;

			$user_id = $this->session->userdata('user_id');

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://v9hsp4riqc.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/membershipcard/".$company_name,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: 57d67869-8514-0b02-57bf-881fbe264a43"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_membership = json_decode($response);
			}

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://v9hsp4riqc.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/rewards/".$company_name,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: cba1b4c1-4e7c-81e5-c575-b7c21c657894"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_reward = json_decode($response);
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

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://6eat2etcyb.execute-api.ap-southeast-1.amazonaws.com/Prod/company/bank/getAll",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: 45fa0404-cafc-684e-8ace-d8d94d0c687a"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_bank = json_decode($response);
			}

			$data['banks_data'] = $array_bank;
			$data['user_profile'] = $array_user_profile;

			$data['data_membership'] = $array_membership;
			$data['data_reward'] = $array_reward;

			$this->load->view('navigation_view', $data);
			$this->load->view('company_card_view', $data);
		} else {
			header('location:'.base_url());
		}
	}

	public function membership($membership_id)
	{
		if ($this->session->userdata('user_id') != "") {
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$nickname = $this->session->userdata('nickname');
			$company_name = str_replace('%20', ' ', $this->session->userdata('company_name'));

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

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://v9hsp4riqc.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/membershipcard/getById/".$company_name."/".$membership_id,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: 1e7b6963-6598-292c-383d-7af55405e248"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_membership_details = json_decode($response);
			}

			$data['user_profile'] = $array_user_profile;
			$data['membership_details'] = $array_membership_details;

			$this->load->view('navigation_view', $data);
			$this->load->view('company_membership_detail_view', $data);
		} else {
			header('location:'.base_url());
		}
	}

	public function get_user_member($membership_id)
	{
		if ($this->session->userdata('user_id') != "") {
			
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$nickname = $this->session->userdata('nickname');
			
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://u71yt1ngo1.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/membership/getAllUsers/".$membership_id,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: e024767e-45b2-3943-10c9-ca00b094bc17"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
				$array_user_member = json_decode($response);
				echo json_encode($array_user_member->data);
			}

		} else {
			header('location:'.base_url());
		}
	}

	public function get_user_reward($membership_id, $reward_id)
	{
		if ($this->session->userdata('user_id') != "") {
			
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$nickname = $this->session->userdata('nickname');
			
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://u71yt1ngo1.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/rewards/getAllUsers/".$membership_id."/".$reward_id,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: e024767e-45b2-3943-10c9-ca00b094bc17"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
				$array_user_member = json_decode($response);
				echo json_encode($array_user_member->data);
			}

		} else {
			header('location:'.base_url());
		}
	}

	public function reward($membership_id, $reward_id)
	{
		if ($this->session->userdata('user_id') != "") {
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$nickname = $this->session->userdata('nickname');

			$access_token = $this->session->userdata('access_token');
			$company_name = str_replace('%20', ' ', $this->session->userdata('company_name'));

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

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://v9hsp4riqc.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/rewards/getById/".$company_name."/".$membership_id."/".$reward_id,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: 0f7745d8-d04a-21d5-4b85-129ef10d5778"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $reward_details_data = json_decode($response);
			}

			$data['user_profile'] = $array_user_profile;
			$data['reward_detail'] = $reward_details_data;
			$data['membership_id'] = $membership_id;
			$data['reward_id'] = $reward_id;

			$this->load->view('navigation_view', $data);
			$this->load->view('company_reward_detail_view', $data);
		} else {
			header('location:'.base_url());
		}
	}

	public function upload_reward_picture()
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
					    'Key'        => 'reward/'.$tmp_file_name,
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

	public function upload_membership_picture()
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
					    'Key'        => 'membership/'.$tmp_file_name,
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

	public function get_partnership()
	{
		if ($this->session->userdata('user_id') != "") {
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://u71yt1ngo1.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/partnership/getAll",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: ec972795-4477-9bf7-6bf6-445b8b1b7881"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_partnership = json_decode($response);

			  foreach ($array_partnership->data as $rows) {
			  	
			  	$button = '<a href="#" data-toggle="tooltip" data-placement="top" title="Remove" onclick="delete_partnership_modal(\''.$rows->_id.'\')"><i class="fa fa-trash fa-lg" style="color: #DDDDDD;" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" data-placement="top" title="Edit" onclick="update_partnership_modal(\''.$rows->_id.'\')"><i class="fa fa-pencil fa-lg" style="color: #DDDDDD;" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" data-placement="top" title="Block" id="partnership-status-link-'.$rows->_id.'" onclick="block_partnership(\''.$rows->_id.'\')"><i class="fa fa-check-circle fa-lg" id="partnership-status-'.$rows->_id.'" style="color: #89C45B;" aria-hidden="true"></i></a>';
			  	if ($rows->activeInd == "I") {
			  		$button = '<a href="#" data-toggle="tooltip" data-placement="top" title="Remove" onclick="delete_partnership_modal(\''.$rows->_id.'\')"><i class="fa fa-trash fa-lg" style="color: #DDDDDD;" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" data-placement="top" title="Edit" onclick="update_partnership_modal(\''.$rows->_id.'\')"><i class="fa fa-pencil fa-lg" style="color: #DDDDDD;" aria-hidden="true"></i></a> <a href="#" data-toggle="tooltip" data-placement="top" title="Block" id="partnership-status-link-'.$rows->_id.'" onclick="unblock_partnership(\''.$rows->_id.'\')"><i class="fa fa-ban fa-lg" id="partnership-status-'.$rows->_id.'" style="color: #ff6c60;" aria-hidden="true"></i></a>';
			  	}

			  	$partnership_list[] = array(
					'bank_name'	=> $rows->bankName,
					'card_name'	=> $rows->cardName,
					'partnership_name'	=> $rows->partnershipName,
					'start_date'	=> $rows->startDate,
					'end_date'	=> $rows->endDate,
					'discount'	=> $rows->discount,
					'action'	=> $button
				);
			  }

			  echo json_encode($partnership_list);
			}

		} else {
			header('location:'.base_url());
		}
	}

}