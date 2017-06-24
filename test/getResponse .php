<?php 
/**
 * @author Martin Slavov 
 * 
 * @desc Get data for Employee
 * 
 */
class Rest{


	/**
	* Get All employee by name action - GET.
    *
    * @return string
    */
	function httpRequestGetAll($serviceUrl){
		
		$responseRequest = '';
		$this->$serviceUrl = $serviceUrl;	

		$response = file_get_contents($this->$serviceUrl);
		$response = json_decode($response, true);

		foreach ($response as $key => $value) {
			if (is_array($value)) {
			    foreach ($value as $k => $v) {
			    	$responseRequest .= '<br >';
			    	$responseRequest .=  'This is information for ' . $v['emp_name'];
			    	$responseRequest .=  '<br >';
			    	$responseRequest .=   $v['id'];
			    	$responseRequest .= '<br >';
			    	$responseRequest .=  $v['emp_name'];
			    	$responseRequest .=  '<br >';
			    	$responseRequest .=  $v['emp_email'];
			    	$responseRequest .=  '<br >';
			    	$responseRequest .=   $v['emp_company'];
			    	$responseRequest .=  '<br >';
			    	$responseRequest .=   $v['emp_salary'];
			    	$responseRequest .=  '<br >';
			    	$responseRequest .=  '<br >';
			    }

			}
		}

		return $responseRequest;
	}

	/**
	* Get employee by name action - GET.
    *
    * @return string
    */
	function httpRequestGet($serviceUrl, $data = ''){
		
		$responseRequest = '';
		$this->$serviceUrl = $serviceUrl;	

		$response = file_get_contents($this->$serviceUrl);
		$response = json_decode($response, true);

		foreach ($response as $key => $value) {
			if (is_array($value)) {
			    foreach ($value as $k => $v) {
			    	$responseRequest .= '<br >';
			    	$responseRequest .=  'This is information for ' . $v['id'];
			    	$responseRequest .=  '<br >';
			    	$responseRequest .=   $v['id'];
			    	$responseRequest .= '<br >';
			    	$responseRequest .=  $v['emp_name'];
			    	$responseRequest .=  '<br >';
			    	$responseRequest .=  $v['emp_email'];
			    	$responseRequest .=  '<br >';
			    	$responseRequest .=   $v['emp_company'];
			    	$responseRequest .=  '<br >';
			    	$responseRequest .=   $v['emp_salary'];
			    	$responseRequest .=  '<br >';
			    	$responseRequest .=  '<br >';
			    }

			}
		}

		return $responseRequest;
	}

	/**
	* Get employee by name action - POST.
    *
    * @return string
    */
	public function httpRequestPost($serviceUrlPost, $dataPost)
	{

		$responseRequest = '';
		$this->serviceUrlPost = $serviceUrlPost;
		$this->dataPost = $dataPost;

		$curl = curl_init($this->serviceUrlPost);
		$curl_post_data = $this->dataPost;

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
		$response = curl_exec($curl);
		curl_close($curl);
		$response = json_decode($response, true);

		foreach ($response as $key => $value) {
			if (is_array($value)) {
			    foreach ($value as $k => $v) {
			    	$responseRequest .= '<br >';
			    	$responseRequest .= 'This is information for ' . $v['id'];
			    	$responseRequest .= '<br >';
			    	$responseRequest .= $v['id'];
			    	$responseRequest .= '<br >';
			    	$responseRequest .= $v['emp_name'];
			    	$responseRequest .= '<br >';
			    	$responseRequest .= $v['emp_email'];
			    	$responseRequest .= '<br >';
			    	$responseRequest .= $v['emp_company'];
			    	$responseRequest .= '<br >';
			    	$responseRequest .= $v['emp_salary'];
			    	$responseRequest .= '<br >';
			    	$responseRequest .= '<br >';
			    }

			}
		}

	    return $responseRequest;
	}

	/**
	* Create employee by name action - GET.
    *
    * @return string
    */
	function httpRequestCreate($serviceUrlGetCreate, $dataPostCreate)
	{

		$responseRequest = '';
		$this->serviceUrlGetCreate = $serviceUrlGetCreate;
		$this->dataPostCreate = $dataPostCreate;

		$curl = curl_init($this->serviceUrlGetCreate);
		$curl_post_data = $this->dataPostCreate;

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
		$response = curl_exec($curl);
		curl_close($curl);
		$response = json_decode($response, true);
		
		foreach ($response as $key => $value) {
			if($key != 'status')
				return $value;
		}
		if($value)
			return $value;
		else
			return $response;
	}

}

	$serviceUrlGetAll = 'http://gallery.linux-sys-adm.com/api/employee/employee-list?csrf=gG773Am6J7MZW8NYsx9LPKV0P2Z4l8JynSgKquPTzQMJiJb7ee6Wyeu2QDZu4zIiiEcumzAOkfezCzXY7hUNdA==';

	$serviceUrlGet = 'http://gallery.linux-sys-adm.com/api/employee/employee-company?company=MyCompany&csrf=gG773Am6J7MZW8NYsx9LPKV0P2Z4l8JynSgKquPTzQMJiJb7ee6Wyeu2QDZu4zIiiEcumzAOkfezCzXY7hUNdA==';
	// $serviceUrlGet = file_get_contents('http://gallery.linux-sys-adm.com/admin/api/employee/employee-list');

	// POST Param
	$serviceUrlPost = 'http://gallery.linux-sys-adm.com/api/employee/employee-name';
	$dataPost = ['name' => 'Martin Slavov', 
				 'email' => 'mslavov@linux-sys-adm.com',
				 'csrf' => 'gG773Am6J7MZW8NYsx9LPKV0P2Z4l8JynSgKquPTzQMJiJb7ee6Wyeu2QDZu4zIiiEcumzAOkfezCzXY7hUNdA=='
				 ];
	// $service_url = 'http://gallery.linux-sys-adm.com/api/employee/employee-first';

	// Get Param - Create
	$serviceUrlGetCreate = 'http://gallery.linux-sys-adm.com/api/employee/employee-create';
	$dataPostCreate =  ['emp_name' => 'Martin Slavov', 
				 	    'emp_email' => 'mslavov@linux-sys-adm.com',
				 	    'emp_company' => 'Linux-sys-adm LTD',
				 	    'emp_salary' => 1000000,
				 	    'csrf' => 'gG773Am6J7MZW8NYsx9LPKV0P2Z4l8JynSgKquPTzQMJiJb7ee6Wyeu2QDZu4zIiiEcumzAOkfezCzXY7hUNdA=='];
 

    ############ Testing ################		 	    
	// Get All Employee  - GET
	// $rest = new Rest();
	// $requestPost = $rest->httpRequestGetAll($serviceUrlGetAll);
	// echo $requestPost;
	
	// Get Name Employee by Company - GET
	// $rest = new Rest();
	// $requestPost = $rest->httpRequestGet($serviceUrlGet);
	// echo $requestPost;

	// Get Name of Employee - POST
	$rest = new Rest();
	$requestPost = $rest->httpRequestPost($serviceUrlPost, $dataPost);
	echo $requestPost;

	// Create Employee - POST
	// $rest = new Rest();
	// $requestPost = $rest->httpRequestCreate($serviceUrlGetCreate, $dataPostCreate);
	// print_r( $requestPost );


?>



