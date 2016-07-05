<? 
	class tables extends sqlHandeling  { 	
		
		function __construct($DbUser, $DbPass, $Database) {
			$this->dbUser = $DbUser;
			$this->dbPass = $DbPass; 
			$this->database = $Database;
		}
		
		function get_simple_table($class, $id) {
			if($class) { $build = ' class="$class" '; }
			if($id) { $build .= ' id="$id" '; }
			echo '
			<table '.$build.'  border="0">
				  <tbody>
				   <tr>
					';
					foreach($this->data as $row => $value){
				   
					echo  '<th>'.$row.'</th>';
					}
					echo'
					</tr>
					
					<tr>
					';
					
					foreach($this->data as $row => $value){
					
					 echo '<td>'.$value.'</td>';
					}
					  
					echo '</tr>
				  </tbody>
				</table>';
	
		}// End of get_simple_table just add an array to the __construct class and select if you want add a class or id
		
	
		function get_table_simple_from_sql($stament,$headerArray, $edit, $goto) {
			
			$servername = "localhost";

			// Create connection
			$conn = new mysqli($servername, $this->dbUser, $this->dbPass, $this->database);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			$sql = $stament;
			$result = $conn->query($sql);
			
			echo '
			<table>
					  <tbody>
						<tr>
      		';
			if($edit):
			echo '
							<th>Edit</th>
							<th>Delete</th>';
			endif;
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
				 	if($edit):
						echo'
						<td>
							<form action="'.$goto.'" method="post">
								<input type="hidden" name="edit" value="1">
								<input type="hidden" name="id" value="'.$v.'">
								
								<button type="submit">Editar</button>
							</form>
						</td>

						<td>
							<form action="'.$goto.'" method="post">
								<input type="hidden" name="delete" value="1">
								<input type="hidden" name="id" value="'.$v.'">
								<button type="submit">Borrar</button>
							</form>
						</td>
						';
					endif;
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
		
		function get_table_from_sql_select_edit($stament,$headerArray, $selectArray, $goto) {
			
			$servername = "localhost";

			// Create connection
			$conn = new mysqli($servername, $this->dbUser, $this->dbPass, $this->database);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			$sql = $stament;
			$result = $conn->query($sql);
			
			echo '
			<table>
					  <tbody>
						<tr>
      		';
			if($selectArray):
			echo '
							<th>View</th>
							<th>Change</th>';
			endif;
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
				 	if($selectArray):
						echo'
						<td>
							<form action="" method="post">
								<input type="hidden" name="edit" value="view">
								<input type="hidden" name="id" value="'.$v.'">
								
								<button type="submit">View</button>
							</form>
						</td>

						<td>
						
							<form action="" method="post" class="selector">
								<select>';
						
						foreach($selectArray as $Arow => $Avalue){
							
						echo'		
									<option value="'.$Avalue.'">'.$Arow.'</option>
							';
						}
						echo '
								</select>
									
								<input type="hidden" name="edit" value="view">
								<input type="hidden" name="id" value="'.$v.'">
							</form>
						
						</td>';
					endif;
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
		
		function get_table_from_sql_select_add($stament,$headerArray, $selectArray, $goto, $type, $class) {
			
			$servername = "localhost";

			// Create connection
			$conn = new mysqli($servername, $this->dbUser, $this->dbPass, $this->database);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			$sql = $stament;
			$result = $conn->query($sql);
			
			echo "
			<table class='".$class."'>
					  <tbody>
						<tr>
      		";
			if($selectArray):
			echo '
							<th>Añadir</th>';
			endif;
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
				 	if($selectArray):
						echo'
						<td>
							<form method="post" id="add">
								<input type="hidden" name="add" value="1">
								<input type="hidden" name="id" value="'.$v.'">
								<input type="hidden" name="type" value="'.$type.'">
								<input type="submit" value="Ayadir">
							</form>
						</td>';
					endif;
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
		
	}// Class Tables creta table using slq data to put the content. Type of table are input tables, display table, add or delete function table, inpute single data table. 
	
	
?>