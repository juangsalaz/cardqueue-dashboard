<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Auth0\SDK\API\Management;

class Order extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('user_id') != "") {
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$nickname = $this->session->userdata('nickname');

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
			$this->load->view('company_order_view', $data);
		} else {
			header('location:'.base_url());
		}
	}

	public function get_pos_order($value='')
	{
		if ($this->session->userdata('user_id') != "") {
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$nickname = $this->session->userdata('nickname');

			$company_name = str_replace('%20', ' ', $this->session->userdata('company_name'));

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/order/getAllOrder/".$company_name."/POS",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: e3addcea-aa13-7639-2da1-9920ed1c5c62"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_pos_order = json_decode($response);

				foreach ($array_pos_order->data as $value) {	

					$button = '<a href="#" onclick="view_order_details(\''.$value->_id.'\')"><i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i></a>';

					if ($value->orderStatus == 'complete') {
						$order_status = '<span style="color: green;">Complete</span>';
					} elseif ($value->orderStatus == 'active') {
						$order_status = '<span style="color: orange;">Active</span>';
					} elseif ($value->orderStatus == 'process') {
						$order_status = '<span style="color: blue;">Process</span>';
					} elseif ($value->orderStatus == 'reject') {
						$order_status = '<span style="color: red;">Reject</span>';
					}

					$isPaid = '-';
					if ($value->isPaid == 'true') {
						$isPaid = '<span style="color: green;">Approved</span>';
					}

			  		$order_list[] = array(
			  			'order_number' => $value->orderNumber,
			  			'date' => $value->orderDate,
			  			'branch_name' => $value->branchId,
			  			'name' => $value->userName,
			  			'delivery' => $value->deliveryType,
			  			'order_status' => $order_status,
			  			'amount' => $value->ttlAmount,
			  			'payment_status' => $isPaid,
			  			'action' => $button,
			  		);
				}

				echo json_encode($order_list);
			}

		} else {
			header('location:'.base_url());
		}
	}

	public function get_promotion_order()
	{
		if ($this->session->userdata('user_id') != "") {
			$nickname = $this->session->userdata('nickname');
			$data['nickname'] = $nickname;

			$nickname = $this->session->userdata('nickname');

			$company_name = str_replace('%20', ' ', $this->session->userdata('company_name'));

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://rpdrxpb48f.execute-api.ap-southeast-1.amazonaws.com/Prod/comp/order/getAllOrder/".$company_name."/PROMOTION",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "cache-control: no-cache",
			    "postman-token: e3addcea-aa13-7639-2da1-9920ed1c5c62"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $array_pos_order = json_decode($response);

				foreach ($array_pos_order->data as $value) {	

					$button = '<a href="#" onclick="view_order_promotion_details(\''.$value->_id.'\')"><i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i></a>';

					$balance_value = $value->promotionDetail->promoTotalValueQty - $value->promotionDetail->PromoTotalValueSold;
					$balance_item = $value->promotionDetail->promoTotalItemQty - $value->promotionDetail->promoTotalItemQtySold;

			  		$order_list[] = array(
			  			'order_number' => $value->orderNumber,
			  			'date' => $value->orderDate,
			  			'promo_name' => $value->promotionDetail->promoName,
			  			'name' => $value->userName,
			  			'type' => $value->promotionDetail->promoType,
			  			'order_qty' => $value->qty,
			  			'amount' => $value->ttlAmount,
			  			'expired_date' => $value->promotionDetail->endDate,
			  			'balance_value' => $balance_value,
			  			'balance_item_qty' => $balance_item,
			  			'action' => $button,
			  		);
				}

				echo json_encode($order_list);
			}

		} else {
			header('location:'.base_url());
		}
	}

}