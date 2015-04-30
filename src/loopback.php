<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');
	?>
<?php
	/* Server Handler for processing GET & POST- 
			http://us2.php.net/manual/en/reserved.variables.request.php */
	class JSONOut {
		public $Type = "";
		public $parameters;
	}
	$J = new JSONOut();

	switch($_SERVER['REQUEST_METHOD'])
	{
		case 'GET':
			$J->Type = "GET";

			foreach ($_GET as $key => $value) {
				$J->parameters[$key]=$value;
			}
		break;

		case 'POST':
			$J->Type = "POST";

			foreach ($_POST as $key => $value) {
				$J->parameters[$key]=$value;
			}
		break;

		default:
	}
	echo json_encode($J);
