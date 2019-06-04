<?php
/*
Title:      func.php
Date:       13.03.2019
Author:     Eskil Uhlving Larsen
*/

$siteName = "Website Name";

/*
	Connect to the database
	die if any error occure
*/
function connectDB($dbName = "xxx") {
	$host = "xxx";
	$usr = "xxx";
	$pwd = "xxx";

	$db = new mysqli($host, $usr, $pwd, $dbName);

    if ($db->connect_errno > 0) { // die if any error occure
        die('Unable to connect to database [' . $db->connect_error . ']');
    }
	 // No error
	return $db;
} // connectDB


/*
	Check if the email and password combo is valid
	If valid, return the userID. Else return false.

	Search db for email
	if search got 0 results, email is wrong, return flase
	go through the search-results and test the password hash, is there is a match return the userID
	if not returned yet, close up and return flase, password mush be wrong
*/
function login_test($email, $password) {
    $db = connectDB();
    $sql = <<<SQL
    	SELECT userID, password
    	FROM users
    	WHERE email = ?
SQL;

    $statement = $db->prepare($sql);
    $statement->bind_param("s", $email);
    $statement->execute();
    $statement->store_result();
    $statement->bind_result($userID, $hashFromDB);

    if ($statement->num_rows === 0) { // Invalid email
		$statement->close();
		$db->close();
    	return false;
    }

    while ($statement->fetch()) {
        //echo "userID: $userID - hash: $hashFromDB"; // debug, prints userID and hash checked
        if (password_verify($password, $hashFromDB)) {
			$statement->close();
			$db->close();
            return $userID; // Success! both email & password is correct
        }
    }
    // Invalid password
    $statement->close();
	$db->close();
    return false;

} // login_test


/*
	Return the number of user in db with this email (max 1, db collum must be unique)
*/
function emailTaken($email) {
	$db = connectDB();
    $sql = <<<SQL
    	SELECT userID
    	FROM users
    	WHERE email = ?
SQL;

    $statement = $db->prepare($sql);
    $statement->bind_param("s", $email);
    $statement->execute();
    $statement->store_result();
	$res = $statement->num_rows;

	$statement->close();
	$db->close();

    return $res;
} // emailTaken


/*
	Gets a username and password, adds the user to the db
	Hash the password before adding it to the db
	Return the number of rows affected (should be 0 for failure and 1 for success)
*/
function createNewUser($username, $password) {
	$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

	$db = connectDB();
    $sql = <<<SQL
    	INSERT INTO users (email, password)
    	VALUES (?, ?)
SQL;

	$stmt = $db->prepare($sql);
	$stmt->bind_param("ss", $username, $hashedPassword);
	$stmt->execute();
	if ($stmt->affected_rows === 0) {
		return 0;
	}
	// else
	$res = $stmt->affected_rows;
	$stmt->close();
	$db->close();
	return $res;
} // createNewUser


/*
	Return true if password matches the rules, return false if the password is too weak
	Current rules are:
		- no rules
*/
function passwordValid($password) {
	return true;
}


/*
	Save bill to db
*/
function saveBill($date, $destination, $description, $cost, $isPaid, $userID) {
	$db = connectDB();
    $sql = <<<SQL
    	INSERT INTO bills (startDate, destination, description, cost, isPaid, userID)
    	VALUES (?, ?, ?, ?, ?, ?)
SQL;

	$stmt = $db->prepare($sql);
	$stmt->bind_param("sssdii", $date, $destination, $description, $cost, $isPaid, $userID);
	$stmt->execute();
	if ($stmt->affected_rows === 0) {
		return 0;
	}
	// else
	$res = $stmt->affected_rows;
	$stmt->close();
	$db->close();
	return $res;
} // saveBill


/*
	Get all the bills from a spesific user
	if a dest is given, the query will filter on this arg
*/
function getBillsByUser($userID, $filterDest="any") {
	$db = connectDB();
    $sql = <<<SQL
    	SELECT billID, startDate, destination, description, cost, isPaid, userID
    	FROM bills
		WHERE userID = ?
SQL;

	if ($filterDest != "any") {
		$sql .= " AND destination = ?";
		$stmt = $db->prepare($sql);
		$stmt->bind_param("ss", $userID, $filterDest);

	} else {
		$stmt = $db->prepare($sql);
		$stmt->bind_param("s", $userID);
	}


	$stmt->execute();

	$res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

	$stmt->close();
	$db->close();
	return $res;
} // getBillsByUser


/*
	Get all the travel destinations from a spesific user
*/
function getDestinationsByUser($userID) {
	$db = connectDB();
    $sql = <<<SQL
    	SELECT DISTINCT destination
		FROM bills WHERE userID = ?
SQL;



	$stmt = $db->prepare($sql);
	$stmt->bind_param("s", $userID);
	$stmt->execute();

	$res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

	$stmt->close();
	$db->close();
	return $res;
} // getDestinationsByUser



/*
	Get spesific bill from billID
*/
function getBillByID($billID) {
	$db = connectDB();
    $sql = <<<SQL
    	SELECT billID, startDate, destination, description, cost, isPaid, userID
    	FROM bills
		WHERE billID = ?
SQL;

	$stmt = $db->prepare($sql);
	$stmt->bind_param("i", $billID);
	$stmt->execute();

	$res = $stmt->get_result()->fetch_assoc();

	$stmt->close();
	$db->close();
	return $res;
} // getBillByID


/*
	Update a bill
*/
function updateBill($billID, $date, $destination, $description, $cost, $isPaid) {
	$db = connectDB();
    $sql = <<<SQL
    	UPDATE bills
		SET startDate = ?, destination = ?,
		description = ?, cost = ?, isPaid = ?
		WHERE billID = ?;
SQL;

	$stmt = $db->prepare($sql);
	$stmt->bind_param("sssdii", $date, $destination, $description, $cost, $isPaid, $billID);
	$stmt->execute();

	/*if ($stmt->affected_rows === 0) {
		return 0;
	}*/
	// else
	$res = $stmt->affected_rows;
	$stmt->close();
	$db->close();
	return $res;
} // updateBill


/*
	getBillsTotalCost
*/
function getBillsTotalCost($userID) {
	$db = connectDB();
    $sql = <<<SQL
		SELECT SUM(cost) as cost
		FROM bills
		WHERE userID = ?;
SQL;

	$stmt = $db->prepare($sql);
	$stmt->bind_param("i", $userID);
	$stmt->execute();

	$res = $stmt->get_result()->fetch_assoc();

	$stmt->close();
	$db->close();
	return $res['cost'];
} // getBillsTotalCost


/*
	getBillsAvgCost
*/
function getBillsAvgCost($userID) {
	$db = connectDB();
    $sql = <<<SQL
		SELECT AVG(cost) as cost
		FROM bills
		WHERE userID = ?;
SQL;

	$stmt = $db->prepare($sql);
	$stmt->bind_param("i", $userID);
	$stmt->execute();

	$res = $stmt->get_result()->fetch_assoc();

	$stmt->close();
	$db->close();
	//return $res['cost'];
	return round($res['cost'],2); // return avg with 2 decimals

} // getBillsAvgCost


/*
	getBillsTotalPaid
*/
function getBillsTotalPaid($userID) {
	$db = connectDB();
    $sql = <<<SQL
		SELECT SUM(cost) as cost
		FROM bills
		WHERE userID = ? AND isPaid = 1;
SQL;

	$stmt = $db->prepare($sql);
	$stmt->bind_param("i", $userID);
	$stmt->execute();

	$res = $stmt->get_result()->fetch_assoc();

	$stmt->close();
	$db->close();
	//return $res['cost'];
	return round($res['cost'],2); // return avg with 2 decimals

} // getBillsTotalPaid


/*
	getBillsTotalNotPaid
*/
function getBillsTotalNotPaid($userID) {
	$db = connectDB();
    $sql = <<<SQL
		SELECT SUM(cost) as cost
		FROM bills
		WHERE userID = ? AND isPaid = 0;
SQL;

	$stmt = $db->prepare($sql);
	$stmt->bind_param("i", $userID);
	$stmt->execute();

	$res = $stmt->get_result()->fetch_assoc();

	$stmt->close();
	$db->close();
	//return $res['cost'];
	return round($res['cost'],2); // return avg with 2 decimals

} // getBillsTotalNotPaid


/*
	getBillsTotalCostMonthly
*/
function getBillsTotalCostMonthly($userID) {

	$bills = getBillsByUser($userID);
	$monthCost = array();

	foreach ($bills as $index => $bill) {
		$billDate = $bill["startDate"];
		$month = date('M', strtotime($billDate));

		$billCost = $bill["cost"];

		//echo "$month-$billCost , ";
		$monthCost[$month] += $billCost;
	}

	return $monthCost;
} // getBillsTotalCostMonthly($userID

 ?>
