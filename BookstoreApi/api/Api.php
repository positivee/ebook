<?php 
 
	//getting the dboperation class
	require_once '../includes/DbOperation.php';
 
	//function validating all the paramters are available
	//we will pass the required parameters to this function 
	function isTheseParametersAvailable($params){
		$available = true; 
		$missingparams = ""; 
		
		foreach($params as $param){
			if(!isset($_POST[$param]) || strlen($_POST[$param])<=0){
				$available = false; 
				$missingparams = $missingparams . ", " . $param; 
			}
		}
		
		if(!$available){
			$response = array(); 
			$response['error'] = true; 
			$response['message'] = 'Parameterrs ' 
			. substr($missingparams, 1,
			strlen($missingparams)) . ' missing';
			
			echo json_encode($response);
			die();
		}
	}
	
	$response = array();
	

	if(isset($_GET['apicall'])){
		
		switch($_GET['apicall']){
			
			case 'createUser':
				$db = new DbOperation();
				$result = $db->createUser(
							$_POST['name'],
							$_POST['surname'],
							$_POST['email'],
							$_POST['password'],
				);
				if($result){
					$response = $db->getUserId(
									$_POST['email'],
									$_POST['password']);
				}
				break; 
			case 'getUsers':
				$db = new DbOperation();
				$response = $db->getUsers();
				break; 
			case 'getUserId':
				$db = new DbOperation();
				$response = $db->getUserId($_GET['email'], $_GET['password']);
				break;
			case 'getUser':
				$db = new DbOperation();
				$response = $db->getUser($_GET['id']);
				break; 
			case 'updateUser':
				isTheseParametersAvailable(array( 'userId', 'name', 'surname', 'email'));
				$db = new DbOperation();
				$response = $db->updateUser(
					$_POST['userId'],
					$_POST['login'],
					$_POST['name'],
					$_POST['surname']
				);
				break; 
			case 'changePassword':
				isTheseParametersAvailable(array('password', 'newPassword', 'userId' ));
				$db = new DbOperation();
				$response = $db->changePassword(
					$_POST['password'],
					$_POST['newPassword'],
					$_POST['userId']
				);
				break; 			
				case 'recoverPassword':
				isTheseParametersAvailable(array('password', 'email'));
				$db = new DbOperation();
				$response = $db->recoverPassword(
					$_POST['password'],
					$_POST['email']
				);
				break; 
			case 'getUserQuotes':
				$db = new DbOperation();
				$response = $db->getUserQuotes($_GET['userId']);
				break;
			case 'getBookQuotes':
				$db = new DbOperation();
				$response = $db->getBookQuotes($_GET['userId']);
				break;
			case 'getBooks':
				$db = new DbOperation();
				$response = $db->getBooks($_GET['userId']);
				break;
			case 'getNews':
				$db = new DbOperation();
				$response = $db->getNews();
			break;			
			case 'getBookComments':
				$db = new DbOperation();
				$response = $db->getBookComments($_GET['bookId']);
			break;	
			case 'getAuthorBooks':
				$db = new DbOperation();
				$response = $db->getAuthorBooks($_GET['authorName'], $_GET['authorSurname']);
			break;				
			case 'getPrintBooks':
				$db = new DbOperation();
				$response = $db->getPrintBooks($_GET['printName']);
			break;			
			case 'addBookComment':
				$db = new DbOperation();
				$response = $db->addBookComment($_POST['content'], $_POST['rating'], $_POST['bookId'], $_POST['userId']);
			break;			
			case 'addBookQuote':
				$db = new DbOperation();
				$response = $db->addBookQuote($_POST['content'], $_POST['bookId'], $_POST['userId']);
			break;			
			case 'deleteBook':
				$db = new DbOperation();
				$response = $db->deleteBook($_POST['bookId'], $_POST['userId']);
			break;
			case 'deleteQuote':
				$db = new DbOperation();
				$response = $db->deleteQuote($_POST['quoteId']);
			break;			
			case 'deleteUser':
				$db = new DbOperation();
				$response = $db->deleteUser($_POST['userId']);
			break;
			
		}
		
	}else{
		//if it is not api call 
		//pushing appropriate values to response array 
		$response['error'] = true; 
		$response['message'] = 'Invalid API Call';
	}
	
	//displaying the response in json structure 
	echo json_encode($response);