<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

	public function index()
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
			$this->load->view('company_faq_view', $data);

		} else {
			header('location:'.base_url());
		}
	}
}
