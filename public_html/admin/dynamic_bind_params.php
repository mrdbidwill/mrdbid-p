<?php

// https://www.pontikis.net/blog/dynamically-bind_param-array-mysqli
/*
 *
 * A workaround is to use call_user_func_array to pass dynamically the params array.
The solution

In the following code:

    $conn is the connection object
    $a_bind_params is the array of the parameters you want to bind
    $a_param_type is an array with the type of each parameter (Types: s = string, i = integer, d = double, b = blob). This is another disadvantage of MySQLi API. You have to maintain this array some way in your application.

With call_user_func_array, array params must be passed by reference. See notes in manual page.

The code:
 */
/* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
$a_params = array();

$param_type = '';
$n = count($a_param_type);
for($i = 0; $i < $n; $i++) {
    $param_type .= $a_param_type[$i];
}

/* with call_user_func_array, array params must be passed by reference */
$a_params[] = & $param_type;

for($i = 0; $i < $n; $i++) {
    /* with call_user_func_array, array params must be passed by reference */
    $a_params[] = & $a_bind_params[$i];
}
/* Prepare statement */
$stmt = $conn->prepare($sql);
if($stmt === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
}

/* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */
call_user_func_array(array($stmt, 'bind_param'), $a_params);

/* Execute statement */
$stmt->execute();

/* Fetch result to array */
$res = $stmt->get_result();
while($row = $res->fetch_array(MYSQLI_ASSOC)) {
    array_push($a_data, $row);
}