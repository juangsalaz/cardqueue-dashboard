<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Auth0\SDK\API\Management;

class Promotion extends CI_Controller {

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
			$this->load->view('company_promotion_view', $data);
		} else {
			header('location:'.base_url());
		}
	}

	public function upload_promotion_picture()
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
					    'Key'        => 'promotion/'.$tmp_file_name,
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

	public function get_promotion_list()
	{
		if ($this->session->userdata('user_id') != "") {
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$nickname = $this->session->userdata('nickname');

			$company_name = str_replace('%20', ' ', $this->session->userdata('company_name'));
			$data['company_name'] = $company_name;

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promo/getAll/".$company_name,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: c3d86b21-6763-6700-55f6-6727337bfd96"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_promotion = json_decode($response);

			  foreach ($array_promotion->data->Items as $rows) {

			 	$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/promotion/category/getById/".$rows->categoryId,
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

			  	if ($rows->promoTotalItemQtySold == 0) {
			  		$button = '<a href="#" onclick="delete_promotion_modal(\''.$rows->_id.'\')"><i class="fa fa-trash fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a>
			  				<a href="#" onclick="update_promotion_modal(\''.$rows->_id.'\')"><i class="fa fa-pencil fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a>';
			  	} else {
			  		$button = '<a href="#" id="company-promotion-link-'.$rows->_id.'" onclick="block_promotion(\''.$rows->_id.'\')"><i class="fa fa-check-circle fa-lg" id="company-promotion-'.$rows->_id.'" aria-hidden="true" style="color: #89C45B;"></i></a>
			  				<a href="#" onclick="update_promotion_modal(\''.$rows->_id.'\')"><i class="fa fa-pencil fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a>';
			  	
				  	if ($rows->activeInd == 'I') {
				  		$button = '<a href="#" id="company-promotion-link-'.$rows->_id.'" onclick="unblock_promotion(\''.$rows->_id.'\')"><i class="fa fa-ban fa-lg" id="company-promotion-'.$rows->_id.'" aria-hidden="true" style="color: #ff6c60;"></i></a>
				  				<a href="#" onclick="update_promotion_modal(\''.$rows->_id.'\')"><i class="fa fa-pencil fa-lg" aria-hidden="true" style="color: #DDDDDD;"></i></a>';
				  	}
			  	}

			  	$balance = $rows->promoTotalItemQty - $rows->promoTotalItemQtySold;
			  	$value_balance = $rows->promoTotalValueQty - $rows->PromoTotalValueSold;

			  	$claimed = $rows->PromoTotalValueClaim;
			  	$branch_icon = '';
			  	if ($rows->promoType == 'item') {
			  		$claimed = $rows->promoTotalItemQtyClaimed;
			  		$branch_icon = '<a href="#" onclick="add_promotion_branch_modal(\''.$rows->_id.'\')"><input type="hidden" id="branch-promotion-name-'.$rows->_id.'" value="'.$rows->promoName.'"><i class="fa fa-sitemap fa-2x" aria-hidden="true"></i></a>';
			  	}

			  	$standardPrice = '';
			  	if (isset($rows->standardPrice)) {
			  		$standardPrice = $rows->standardPrice;
			  	}

			  	$product_list[] = array(
			  			'promo_category' => $category_name,
			  			'promo_name' => $rows->promoName,
			  			'promo_start_date' => $rows->startDate,
			  			'promo_end_date' => $rows->endDate,
			  			'promo_terms' => $rows->validPeriod,
			  			'promo_standard_price' => $standardPrice,
			  			'promo_special_price' => $rows->specialPrice,
			  			'promo_type' => $rows->promoType,
			  			'promo_per_value' => $rows->promoUnitValue,
			  			'promo_total_branch_qty' => $rows->promoTotalItemQty,
			  			'promo_total_branch_sold' => $rows->promoTotalItemQtySold,
			  			'promo_total_branch_claimed' => $rows->promoTotalItemQtyClaimed,
			  			'promo_total_branch_balance' => $balance,
			  			'promo_total_value_qty' => $rows->promoTotalValueQty,
			  			'promo_total_value_sold' => $rows->PromoTotalValueSold,
			  			'promo_total_value_balance' => $value_balance,
			  			'promo_total_value_claim' => $rows->PromoTotalValueClaim,
			  			'promo_relation_branch' => $branch_icon,
			  			'actions' => $button
			  		);
			  }

			  echo json_encode($product_list);
			}
		} else {
			header('location:'.base_url());
		}
	}
}