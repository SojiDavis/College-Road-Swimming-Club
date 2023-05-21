<?php

  // is_blank('abcd')
  // * validate data presence
  // * uses trim() so empty spaces don't count
  // * uses === to avoid false positives
  // * better than empty() which considers "0" to be empty
  function is_blank($value) :bool
  {
    return !isset($value) || trim($value) === '';
  }

  // has_presence('abcd')
  // * validate data presence
  // * reverse of is_blank()
  // * I prefer validation names with "has_"
  function has_presence($value) {
    return !is_blank($value);
  }

  // has_length_greater_than('abcd', 3)
  // * validate string length
  // * spaces count towards length
  // * use trim() if spaces should not count
  function has_length_greater_than($value, $min) : bool
  {
    $length = strlen($value);
    return $length > $min;
  }

  // has_length_less_than('abcd', 5)
  // * validate string length
  // * spaces count towards length
  // * use trim() if spaces should not count
  function has_length_less_than($value, $max) :bool
  {
    $length = strlen($value);
    return $length < $max;
  }

  // has_length_exactly('abcd', 4)
  // * validate string length
  // * spaces count towards length
  // * use trim() if spaces should not count
  function has_length_exactly($value, $exact):bool
  {
    $length = strlen($value);
    return $length == $exact;
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  // * validate string length
  // * combines functions_greater_than, _less_than, _exactly
  // * spaces count towards length
  // * use trim() if spaces should not count
  function has_length($value, $options):bool
  {
    if(isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
      return false;
    } elseif(isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
      return false;
    } elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_inclusion_of( 5, [1,3,5,7,9] )
  // * validate inclusion in a set
  function has_inclusion_of($value, $set) {
  	return in_array($value, $set);
  }

  // has_exclusion_of( 5, [1,3,5,7,9] )
  // * validate exclusion from a set
  function has_exclusion_of($value, $set) {
    return !in_array($value, $set);
  }

  // has_string('nobody@nowhere.com', '.com')
  // * validate inclusion of character(s)
  // * strpos returns string start position or false
  // * uses !== to prevent position 0 from being considered false
  // * strpos is faster than preg_match()
  function has_string($value, $required_string) {
    return strpos($value, $required_string) !== false;
  }

  // has_valid_email_format('nobody@nowhere.com')
  // * validate correct format for email addresses
  // * format: [chars]@[chars].[2+ letters]
  // * preg_match is helpful, uses a regular expression
  //    returns 1 for a match, 0 for no match
  //    http://php.net/manual/en/function.preg-match.php
  function has_valid_email_format($value) :bool
  {
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;
  }

  function validating_phone_number($value){

    return filter_var($value, FILTER_SANITIZE_NUMBER_INT);
  }
  function has_valid_phone_number_format($value): bool
  {
    $phone_regex = '/^[0-9]{10}+$/';
    $phone_regex1 = '/\+[0-9]{2}+[0-9]{10}/s';
    if(
        preg_match($phone_regex,$value) ||
        preg_match($phone_regex1,$value)
    ) {
      return true;
    }
    return false;
  }

  function has_valid_dob_format($value):bool
  {


      if (!preg_match('/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/', $value)){
        return false;
      }

    return true;
  }

function has_valid_dob ($value):bool
{

  preg_match('~^([0-9]{4})-([0-9]{2})-([0-9]{2})$~', $value, $parts);

  if (!checkdate($parts[2],$parts[3],$parts[1])){
    return false;
  }

  return true;
}

/**
 * @throws Exception
 */
function has_adult_dob($value):bool
  {
    $dob = new DateTime($value);
    $minDobLimit = date_create(date("Y-m-d"));
//    echo  date_format($minDobLimit,"Y-m-d");
    date_sub($minDobLimit,date_interval_create_from_date_string("16 years"));
//    echo  date_format($minDobLimit,"Y-m-d");
    if ($dob > $minDobLimit)
    {
      return false;
    }
    return true;
  }

function has_child_dob($value):bool
{
    $dob = new DateTime($value);
    $minDobLimit = date_create(date("Y-m-d"));
//    echo  date_format($minDobLimit,"Y-m-d");
    date_sub($minDobLimit,date_interval_create_from_date_string("8 years"));
//    echo  date_format($minDobLimit,"Y-m-d");
    if ($dob > $minDobLimit)
    {
        return false;
    }
    return true;
}

  // has_unique_page_menu_name('History')
  // * Validates uniqueness of pages.menu_name
  // * For new records, provide only the menu_name.
  // * For existing records, provide current ID as second arugment
  //   has_unique_page_menu_name('History', 4)
  function has_unique_page_menu_name($menu_name, $current_id="0") {
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE menu_name='" . db_escape($db, $menu_name) . "' ";
    $sql .= "AND id != '" . db_escape($db, $current_id) . "'";

    $page_set = mysqli_query($db, $sql);
    $page_count = mysqli_num_rows($page_set);
    mysqli_free_result($page_set);

    return $page_count === 0;
  }

function has_unique_username($username, $current_id="0") {
  global $db;

  $sql = "SELECT * FROM user ";
  $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
  $sql .= "AND id != '" . db_escape($db, $current_id) . "'";

  $result = mysqli_query($db, $sql);
  $user_count = mysqli_num_rows($result);
  mysqli_free_result($result);

  return $user_count === 0;
}
function has_unique_galaname($name, $current_id="0") {
    global $db;

    $sql = "SELECT * FROM gala ";
    $sql .= "WHERE name='" . db_escape($db, $name) . "' ";
    $sql .= "AND id != '" . db_escape($db, $current_id) . "'";

    $result = mysqli_query($db, $sql);
    $user_count = mysqli_num_rows($result);
    mysqli_free_result($result);

    return $user_count === 0;
}
function has_unique_adminname($username, $current_id="0") {
    global $db;

    $sql = "SELECT * FROM admin ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "AND id != '" . db_escape($db, $current_id) . "'";

    $result = mysqli_query($db, $sql);
    $user_count = mysqli_num_rows($result);
    mysqli_free_result($result);

    return $user_count === 0;
}
function has_gala_date($galaid):bool
{
//    $date_now = date("Y-m-d");
    $gala_date = find_gala_by_Id($galaid);
    $gala_date_dtl = new DateTime($gala_date['date']);
    $mindateLimit = date_create(date("Y-m-d"));
//    echo  date_format($minDobLimit,"Y-m-d");
    date_sub($gala_date_dtl,date_interval_create_from_date_string("5 days"));
//    echo  date_format($minDobLimit,"Y-m-d");
    if ($mindateLimit > $gala_date_dtl)
    {
        return false;
    }
    return true;
////    echo  date_format($minDobLimit,"Y-m-d");
//    $minDateLimit = date_add($date_now,date_interval_create_from_date_string("5 days"));
//    echo $minDateLimit;
//    if ($minDateLimit > $gala_date['date'])
//    {
//        return false;
//    }
//    return true;
}
function has_unique_userid($userid, $current_id="0") {
    global $db;

    $sql = "SELECT * FROM swimmer ";
    $sql .= "WHERE user_id='" . db_escape($db, $userid) . "' ";
    $sql .= "AND id != '" . db_escape($db, $current_id) . "'";

    $result = mysqli_query($db, $sql);
    $user_count = mysqli_num_rows($result);
    mysqli_free_result($result);

    return $user_count === 0;
}

function has_unique_swimmerId($swimmerid, $current_id="0",$eventid) {
    global $db;

    $sql = "SELECT * FROM register ";
    $sql .= "WHERE swimmer_id='" . db_escape($db, $swimmerid) . "' ";
    $sql .= "AND event_id= '" . db_escape($db, $eventid) . "' ";
    $sql .= "AND id != '" . db_escape($db, $current_id) . "'";

    $result = mysqli_query($db, $sql);
    $user_count = mysqli_num_rows($result);
    mysqli_free_result($result);

    return $user_count === 0;
}

function has_unique_register_result($registerId) {
    global $db;

    $sql = "SELECT position FROM result ";
    $sql .= "WHERE register_id ='" . db_escape($db, $registerId) . "' ";

    $result = mysqli_query($db, $sql);
    if ($result != ''){
        return  false;
    }else {
        return true;
    }

}

