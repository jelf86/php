<?
	class sqlHandeling {
		
		public $sqlStament; 
		public $sqlResult;
		public $database; 
		public $dbUser;
		public $dbPass;
		public $result; 
		public $result2 = array(); 
		public $lastID;
		public $rowNumber; 
		
		function __construct($DbUser, $DbPass, $Database) {
			$this->dbUser = $DbUser;
			$this->dbPass = $DbPass; 
			$this->database = $Database;
		}
		function run_sql($stament) {
			
			$servername = "localhost";
			$username = $this->dbUser;
			$password = $this->dbPass;
			$dbname = $this->database;
	
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			$sql = $stament;
			$result = $conn->query($sql);
			
			$this->lastID = $conn->insert_id;
			
			if ($result->num_rows > 0) {
				$this->result  = $result->fetch_assoc();
				
			} else {
				return false;
			}
			$conn->close();	
		}
		
		function run_sql_array($stament) {
			
		mysql_connect("localhost", $this->dbUser, $this->dbPass) or
		    die("Could not connect: " . mysql_error());
		mysql_select_db($this->database);
		
		$result = mysql_query($stament);
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$rows[] = $row;
			}

		$rowTotalNumber = mysql_num_rows($result);
		mysql_free_result($result);
			
			
			$this->result = $rows;
			$this->rowNumber = $rowTotalNumber;
		}
		
		
		function run_sql_table($stament,$headerArray) {
			
			$servername = "localhost";
			$username = $this->dbUser;
			$password = $this->dbPass;
			$dbname = $this->database;
	
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			$sql = $stament;
			$result = $conn->query($sql);
			$this->result = $result->fetch_array(MYSQL_NUM);
			
			echo '
			<table>
					  <tbody>
						<tr>
      		';
			foreach($headerArray as $row => $value){
					echo '
							<th>'.$value.'</th>';
			}
			
			while ($row = $result->fetch_array(MYSQL_NUM)) {
				
    		 foreach ($row as $n => $v){
				if($n == 0): 
					echo '
						</tr>
						<tr>
						';
				endif;
				echo '<td>'.$v.'</td>'; 
			 }
			 
			}
			echo ' 
						</tr>
			  	</tbody>
			</table>
';
			$conn->close();
			
			
		}
		
		function run_sql_update($stament) {
			
			$servername = "localhost";
			$username = $this->dbUser;
			$password = $this->dbPass;
			$dbname = $this->database;
			
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			$sql = $stament;
			
			if ($conn->query($sql) === TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
			
			$conn->close();
			}
			
		function run_sql_to_arrayNUM($stament) {
			
			$servername = "localhost";
			$username = $this->dbUser;
			$password = $this->dbPass;
			$dbname = $this->database;
	
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			$sql = $stament;
			$result = $conn->query($sql);
			$this->result = $result->fetch_array(MYSQL_NUM);
		}// Need to correct
		
		function run_sql_to_array_ASSOC($stament) {
			
			$servername = "localhost";
			$username = $this->dbUser;
			$password = $this->dbPass;
			$dbname = $this->database;
	
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			$sql = $stament;
			$result = $conn->query($sql);
			
			while ($row = $result->fetch_array(MYSQL_ASSOC)){
				$number++; 
			foreach ($row as $n => $v){
				$info[$n] = $v;	
			}
				$this->result[$number] = $info;
			}
			
		}
	}
?>