<?php
//select users 
 /*function gtable($users){
		foreach ($users as $user) {
				
					echo "<tr><td>{$user->username}</td>
						<td>{$user->first_name}</td>
						<td>{$user->last_name}</td>
						<td>  <button type='button' class='btn btn-default' value={$user->username}>DELETE</button>  </td>
						<td> <input type='button' name='Release' onclick="document.write('<?php hi() ?>');" value='Click to Release'> </td>
						</tr>";
						
				}
				
}*/
function createTable($users){

	 foreach($users as $user){
		echo '<tr><td>'.$user->username.'</td>
		<td>'.$user->first_name.'</td>
		<td>'.$user->last_name.'</td>
		<td> <input type="submit"  name="delete['.$user->username.']" value="Delete" /> </td>
		<td> <input type="submit"  name="update['.$user->username.']" value="Edit" /> </td>
		</tr>';
}	

	
	
}



?>