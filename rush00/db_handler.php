<?php 

	function db_connect(){
		$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
		if (!$conn)
			die("Connection error: " . mysqli_connect_error());
		
		return $conn;
	}

	function db_insert($table_name, $insert_array)
	{
		$insert_array = db_escape($insert_array);
		$table_name = db_escape($table_name);
		$keys = "";
		$values = "";
		foreach($insert_array as $key => $value)
		{
			$keys .= ($keys)? "," . $key : $key;
			$values .= ($values)? ",'{$value}'": "'{$value}'";
		}

		$conn = db_connect();

		mysqli_query($conn, "INSERT INTO $table_name ({$keys}) VALUES ({$values})");
		$id = mysqli_insert_id($conn);

		mysqli_close($conn);
		return $id;
	}

	function db_update($table_name, $update_array, $filter_array)
	{
		$update_array = db_escape($update_array);
		$filter_array = db_escape($filter_array);
		$table_name = db_escape($table_name);
		
		$update = "";
		foreach($update_array as $key => $value)
		{
			$update .= ($update)? ", " : "";
			$update .= "{$key} = '{$value}'";
		}

		$filter = "";
		foreach($filter_array as $key => $value)
		{
			$filter .= ($filter)? " AND " : "";
			$filter .= "{$key} = '{$value}'";
		}

		$conn = db_connect();

		mysqli_query($conn, "UPDATE $table_name SET {$update} WHERE {$filter}");

		mysqli_close($conn);
	}

	function db_get_results($sql){

		$conn = db_connect();

		$results = array();

		if($query = mysqli_query($conn, $sql)){
			while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)){
				$results[] = $row;
			}
			mysqli_free_result($query);
		}

		mysqli_close($conn);
		return $results;

	}

	function db_get_row($sql){

		$conn = db_connect();

		$row = array();

		if($query = mysqli_query($conn, $sql)){
			$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
			mysqli_free_result($query);
		}

		mysqli_close($conn);
		return $row;

	}

	function db_escape($param)
	{
		$conn = db_connect();

		if(is_array($param))
		{
			$escaped_array = array();
			foreach($param as $key => $value)
			{
				$escaped_key = mysqli_real_escape_string($conn, $key);
				$escaped_array[$escaped_key] = mysqli_real_escape_string($conn, $value);
			}

			mysqli_close($conn);
			return $escaped_array;
		}
		
		// if not an array (str/int) e.g. table_name
		$escaped_param = mysqli_real_escape_string($conn, $param);
		mysqli_close($conn);
		return $escaped_param;
	}

 ?>