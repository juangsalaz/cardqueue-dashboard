<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Auth0\SDK\API\Management;

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class Product extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('user_id') != "") {
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$nickname = $this->session->userdata('nickname');

			$company_name = str_replace('%20', ' ', $this->session->userdata('company_name'));
			$data['company_name'] = $company_name;

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
			$this->load->view('company_product_view', $data);
		} else {
			header('location:'.base_url());
		}
	}

	public function get_product_list()
	{
		if ($this->session->userdata('user_id') != "") {
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$nickname = $this->session->userdata('nickname');

			$company_name = str_replace('%20', ' ', $this->session->userdata('company_name'));
			$data['company_name'] = $company_name;

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/product/getAll/".$company_name,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: 7006fe7f-3ce4-61c9-20e8-acd5ca787faa"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_product = json_decode($response);

			  foreach ($array_product->data->Items as $rows) {

			  	$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://cu0hye0rce.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/category/".$rows->categoryId,
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "GET",
				  CURLOPT_HTTPHEADER => array(
				    "cache-control: no-cache",
				    "postman-token: ca85cd9e-df71-79a7-d46a-8a62320845a1"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
				  $array_category_name = json_decode($response);
				  $category_name = $array_category_name->data->categoryName;
				}

			  	

			  	if ($rows->ttlBranchSold == 0) {

			  		$button = '<a href="#" onclick="delete_product_modal(\''.$rows->_id.'\')"><i class="fa fa-trash fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a>
			  				<a href="#" onclick="update_product_modal(\''.$rows->_id.'\')"><i class="fa fa-pencil fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a>';

				} else {

					$button = '<a href="#" id="company-product-link-'.$rows->_id.'" onclick="block_product(\''.$rows->_id.'\')"><i class="fa fa-check-circle fa-lg" id="company-product-'.$rows->_id.'" aria-hidden="true" style="color: #89C45B;"></i></a>
			  				<a href="#" onclick="update_product_modal(\''.$rows->_id.'\')"><i class="fa fa-pencil fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a>';
			  	
				  	if ($rows->activeInd == 'I') {
				  		$button = '<a href="#" id="company-product-link-'.$rows->_id.'" onclick="unblock_product(\''.$rows->_id.'\')"><i class="fa fa-ban fa-lg" id="company-product-'.$rows->_id.'" aria-hidden="true" style="color: #ff6c60;"></i></a>
				  				<a href="#" onclick="update_product_modal(\''.$rows->_id.'\')"><i class="fa fa-pencil fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a>';
				  	}

				}

			  	$branch_icon = '<a href="#" onclick="add_product_branch_modal(\''.$rows->_id.'\', \''.$rows->productName.'\')"><i class="fa fa-sitemap fa-2x" aria-hidden="true"></i></a>';

			  	$balance = $rows->ttlBranchQty - $rows->ttlBranchSold;

			  	$product_list[] = array(
			  			'product_category' => $category_name,
			  			'product_name' => $rows->productName,
			  			'branch_qty' => $rows->ttlBranchQty,
			  			'branch_sold' => $rows->ttlBranchSold,
			  			'branch_balance' => $balance,
			  			'price' => $rows->price,
			  			'special_price' => $rows->specialPrice,
			  			'is_member_discount' => $rows->isMemberDiscount,
			  			'branch_icon' => $branch_icon,
			  			'actions' => $button
			  		);
			  }

			  echo json_encode($product_list);
			}
		} else {
			header('location:'.base_url());
		}
	}

	public function upload_product_picture() {
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
					    'Key'        => 'product/'.$tmp_file_name,
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

}