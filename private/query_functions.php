<?php

$errors = [];

// Student

function find_all_stage() {
    global $db;

    $sql = "SELECT * FROM lesson_timetable ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_all_squad() {
    global $db;

    $sql = "SELECT * FROM squad_info ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}
function find_top_3_position() {
    global $db;
    $sql = "SELECT DISTINCT CONCAT(U.firstname,' ',U.lastname) As name,MIN(p.best_time) FROM performance p INNER JOIN swimmer s on p.swimmer_id = s.id INNER JOIN user u on s.user_id = u.id GROUP BY CONCAT(U.firstname,' ',U.lastname)  ORDER BY MIN(p.best_time) ASC ,CONCAT(U.firstname,' ',U.lastname)  LIMIT 3 ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}
function find_squad_by_name($name) {
    global $db;

    $user_sql = "SELECT * FROM squad_info ";
    $user_sql .= "WHERE squad_name='" . db_escape($db, $name) . "' ";
    $user_sql .= "LIMIT 1";

    $result = mysqli_query($db, $user_sql);

    confirm_result_set($result);
    $squad = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);

    return $squad; // returns an assoc. array
}


  function find_all_admins() {
      global $db;

      $sql = "SELECT * FROM admin ";
      $sql .= "ORDER BY id";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      return $result;
  }

  function find_admin_by_id($id) {
      global $db;

      $sql = "SELECT * FROM admin ";
      $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
      $sql .= "LIMIT 1";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      $admin = mysqli_fetch_assoc($result); // find first
      mysqli_free_result($result);
      return $admin; // returns an assoc. array
  }

  function find_admin_by_username($username) {
      global $db;

      $sql = "SELECT * FROM admin ";
      $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
      $sql .= "LIMIT 1";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      $admin = mysqli_fetch_assoc($result); // find first
      mysqli_free_result($result);
      return $admin; // returns an assoc. array
  }



function find_user_by_username($username) {
    global $db;

    $user_sql = "SELECT * FROM user ";
    $user_sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $user_sql .= "LIMIT 1";

    $result = mysqli_query($db, $user_sql);

    confirm_result_set($result);
    $user = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);

    return $user; // returns an assoc. array
}


function find_coach_by_username($username) {
    global $db;

    $user_sql = "SELECT * FROM coach ";
    $user_sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $user_sql .= "LIMIT 1";

    $result = mysqli_query($db, $user_sql);

    confirm_result_set($result);
    $user = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);

    return $user; // returns an assoc. array
}



function insert_admin($admin) {
      global $db;

      $errors = validate_admin($admin);
      if (!empty($errors)) {
          return $errors;
      }

      $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

      $sql = "INSERT INTO admin ";
      $sql .= "(username, password,usertype) ";
      $sql .= "VALUES (";
      $sql .= "'" . db_escape($db, $admin['username']) . "',";
      $sql .= "'" . db_escape($db, $hashed_password) . "', ";
      $sql .= "'admin'";
      $sql .= ")";
      $result = mysqli_query($db, $sql);

      // For INSERT statements, $result is true/false
      if($result) {
          return true;
      } else {
          // INSERT failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
      }
  }

  function update_admin($admin) {
      global $db;

      $password_sent = !is_blank($admin['password']);

      $errors = validate_admin($admin, ['password_required' => $password_sent]);
      if (!empty($errors)) {
          return $errors;
      }

      $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

      $sql = "UPDATE admin SET ";
      $sql .= "first_name='" . db_escape($db, $admin['first_name']) . "', ";
      $sql .= "last_name='" . db_escape($db, $admin['last_name']) . "', ";
      $sql .= "email='" . db_escape($db, $admin['email']) . "', ";
      if($password_sent) {
          $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "', ";
      }
      $sql .= "username='" . db_escape($db, $admin['username']) . "' ";
      $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
      $sql .= "LIMIT 1";
      $result = mysqli_query($db, $sql);

      // For UPDATE statements, $result is true/false
      if($result) {
          return true;
      } else {
          // UPDATE failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
      }
  }

  function delete_admin($admin) {
      global $db;

      $sql = "DELETE FROM admin ";
      $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
      $sql .= "LIMIT 1;";
      $result = mysqli_query($db, $sql);

      // For DELETE statements, $result is true/false
      if($result) {
          return true;
      } else {
          // DELETE failed
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
      }
  }

function validate_admin($admin, $options=[]):array {
    $errors = [];
    $password_required = $options['password_required'] ?? true;
    if(is_blank($admin['username'])) {
        $errors[] = "Username cannot be blank.";
    } elseif (!has_length($admin['username'], array('min' => 8, 'max' => 255))) {
        $errors[] = "Username must be between 8 and 255 characters.";
    } elseif (!has_unique_adminname($admin['username'], $admin['id'] ?? 0)) {
        $errors[] = "Username not allowed. Try another.";
    }
    if($password_required) {
        if(is_blank($admin['password'])) {
            $errors[] = "Password cannot be Password cannot be blank.";
        } elseif (!has_length($admin['password'], array('min' => 12))) {
            $errors[] = "Password must contain 12 or more characters ";
        } elseif (!preg_match('/[A-Z]/', $admin['password'])) {
            $errors[] = "Password must contain at least 1 uppercase letter ";
        } elseif (!preg_match('/[a-z]/', $admin['password'])) {
            $errors[] = "Password must contain at least 1 lowercase letter ";
        } elseif (!preg_match('/[0-9]/', $admin['password'])) {
            $errors[] = "Password must contain at least 1 number " ;
        } elseif (!preg_match('/[^A-Za-z0-9\s]/', $admin['password'])) {
            $errors[] = "Password must contain at least 1 symbol " ;
        }

        if(is_blank($admin['confirm_password'])) {
            $errors[] = "Confirm password cannot be blank.";
        } elseif ($admin['password'] !== $admin['confirm_password']) {
            $errors[] = "Password and confirm password must match.";
        }
    }

    return $errors;
}

function insert_coach($coach)
{
    global $db;

    $errors = validate_user($coach);
    if (!empty($errors)) {
        return $errors;
    }

    $errors = validate_username($coach);
    if (!empty($errors)) {
        return $errors;
    }


    $errors = validate_username_password($coach);
    if (!empty($errors)) {
        return $errors;
    }



    $hashed_password = password_hash($coach['password'], PASSWORD_BCRYPT);



    $sql = "INSERT INTO coach ";
    $sql .= "(firstname,lastname,email,phone_number,qualification,gender,date_of_join,username,password,usertype) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $coach['firstname']) . "', ";
    $sql .= "'" . db_escape($db, $coach['lastname']) . "',";
    $sql .= "'" . db_escape($db, $coach['email']) . "',";
    $sql .= "'" . db_escape($db, $coach['phonenumber']) . "', ";
    $sql .= "'" . db_escape($db, $coach['qualification']) . "', ";
    $sql .= "'" . db_escape($db, $coach['gender']) . "',";
    $sql .= "'" . db_escape($db, $coach['date_of_join']) . "',";
    $sql .= "'" . db_escape($db, $coach['username']) . "', ";
    $sql .= "'" . db_escape($db, $hashed_password) . "', ";
    $sql .= "'" . db_escape($db, $coach['usertype']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if($result ) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function find_all_coach() {
    global $db;

    $sql = "SELECT * FROM coach ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}
function insert_user($user,$parent)
{
    global $db;

    $errors = validate_user($user);
    if (!empty($errors)) {
        return $errors;
    }
    $errors = validate_username($user);
    if (!empty($errors)) {
        return $errors;
    }


    $errors = validate_username_password($user);
    if (!empty($errors)) {
        return $errors;
    }
    if ($user['usertype'] == 'adult'){
        $errors = validate_user_DOB($user);
    if (!empty($errors)) {
        return $errors;
    }
    }else{
        $errors = validate_child_DOB($user);
        if (!empty($errors)) {
            return $errors;
        }
    }

    if(!empty($parent)) {
        $errors = validate_username_password($parent);
        if (!empty($errors)) {
            return $errors;
        }

    }


    $hashed_password = password_hash($user['password'], PASSWORD_BCRYPT);
    if ($user['usertype']=='parent'){
        $user['usertype'] = 'child';
    }


    $sql = "INSERT INTO user ";
    $sql .= "(firstname,lastname,email,phonenumber,address,gender,date_of_birth,username,password,usertype) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $user['firstname']) . "', ";
    $sql .= "'" . db_escape($db, $user['lastname']) . "',";
    $sql .= "'" . db_escape($db, $user['email']) . "',";
    $sql .= "'" . db_escape($db, $user['phonenumber']) . "', ";
    $sql .= "'" . db_escape($db, $user['address']) . "', ";
    $sql .= "'" . db_escape($db, $user['gender']) . "',";
    $sql .= "'" . db_escape($db, $user['date_of_birth']) . "',";
    $sql .= "'" . db_escape($db, $user['username']) . "', ";
    $sql .= "'" . db_escape($db, $hashed_password) . "', ";
    $sql .= "'" . db_escape($db, $user['usertype']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if(!empty($parent)) {
        $hashed_child_password = password_hash($parent['password'], PASSWORD_BCRYPT);

        $sample_sql = "SELECT u.id FROM user u WHERE u.username = '" . $user['username'] ."'";
        $foreign_key = mysqli_query($db, $sample_sql);
        confirm_result_set($foreign_key);
        $parent_FK   = mysqli_fetch_assoc($foreign_key);
        mysqli_free_result($foreign_key);
        $parent_foreign_key = $parent_FK['id'];


        $sql1 = "INSERT INTO parent";
        $sql1 .= "(parent_id,username,password,usertype) ";
        $sql1 .= "VALUES (";
        $sql1 .= "'" . $parent_foreign_key. "', ";
        $sql1 .= "'" . db_escape($db, $parent['username']) . "', ";
        $sql1 .= "'" . db_escape($db, $hashed_child_password) . "', ";
        $sql1 .= "'" . db_escape($db, $parent['usertype']) . "'";
        $sql1 .= ")";


        $result1 = mysqli_query($db, $sql1);


    }


    if($result ) {


           return true;
    } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_user($user) {
    global $db;

    $password_sent = !is_blank($user['password']);

    $errors = validate_user($user, ['password_required' => $password_sent]);
    if (!empty($errors)) {
        return $errors;
    }
    $errors = validate_username_password($user, ['password_required' => $password_sent]);
    if (!empty($errors)) {
            return $errors;
    }

    $hashed_password = password_hash($user['password'], PASSWORD_BCRYPT);

    $edit_sql = "UPDATE user SET ";
    $edit_sql .= "firstname='" . db_escape($db, $user['firstname']) . "', ";
    $edit_sql .= "lastname='" . db_escape($db, $user['lastname']) . "', ";
    $edit_sql .= "email='" . db_escape($db, $user['email']) . "', ";
    $edit_sql .= "phonenumber='" . db_escape($db, $user['phonenumber']) . "', ";
    $edit_sql .= "address='" . db_escape($db, $user['address']) . "', ";
    if($password_sent) {
        $edit_sql .= "password='" . db_escape($db, $hashed_password) . "', ";
    }
    $edit_sql .= "gender='" . db_escape($db, $user['gender']) . "' ";

    $edit_sql .= "WHERE id='" . db_escape($db, $user['id']) . "' ";
    $edit_sql .= " LIMIT 1";



    $result = mysqli_query($db, $edit_sql);

    // For UPDATE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function find_all_user() {
    global $db;

    $sql = "SELECT * FROM user ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}
function find_user_by_id($id) {
    global $db;

    $user_sql = "SELECT * FROM user ";
    $user_sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $user_sql .= "LIMIT 1";
    $result = mysqli_query($db, $user_sql);
    confirm_result_set($result);
    $user= mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $user; // returns an assoc. array
}

function find_user_by_parentId($Id) {
    global $db;

    $user_sql = "SELECT U.* FROM user U join parent P on U.id = P.parent_id ";
    $user_sql .= "WHERE P.id= '" . db_escape($db, $Id) . "' ";
    $result = mysqli_query($db, $user_sql);
    confirm_result_set($result);
    $user= mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $user; // returns an assoc. array
}

function delete_child_by_parentId($id) {
    global $db;

    $sql = "DELETE FROM child ";
    $sql .= "WHERE parent_id='" . $id . "' ";
//    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}


function delete_user($id,$usertype) {
    global $db;

    if ($usertype == 'parent'){
        delete_child_by_parentId($id);
    }

    $sql = "DELETE FROM user ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function validate_user($user, $options=[]) {
    $errors = [];

      if(is_blank($user['firstname'])) {
          $errors[] = "First name cannot be blank";
      } elseif (!has_length($user['firstname'], array('min' => 2, 'max' => 255))) {
          $errors[] = "First name must be between 2 and 255 characters.";
      }

      if(is_blank($user['lastname'])) {
          $errors[] = "Last name cannot be blank.";
      } elseif (!has_length($user['lastname'], array('min' => 2, 'max' => 255))) {
          $errors[] = "Last name must be between 2 and 255 characters.";
      }

    if(is_blank($user['email'])) {
        $errors[] = "Email cannot be blank.";
    } elseif (!has_length($user['email'], array('max' => 255))) {
        $errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($user['email'])) {
        $errors[] = "Email must be a valid format.";
    }

    if(is_blank($user['phonenumber'])) {
        $errors[] = "phone number cannot be blank.";
    } elseif (!has_valid_phone_number_format($user['phonenumber'])) {
        $errors[] = "phone number must be a valid format.";
    }




    return $errors;
}

function validate_user_DOB($user, $options=[]):array {
    $errors = [];

   if (!has_adult_dob($user['date_of_birth'])) {
        $errors[] = "You must be 16 years of age to sign up";
    }

    return $errors;
}
function validate_child_DOB($user, $options=[]):array {
    $errors = [];

    if (has_adult_dob($user['date_of_birth'])) {
        $errors[] = "child's age should be less than 16 years";
    }elseif (!has_child_dob($user['date_of_birth'])){
        $errors[] = "child's age should be greater than 8 years";
    }

    return $errors;
}
function validate_username_password($user, $options=[]):array {
    $errors = [];
    $password_required = $options['password_required'] ?? true;

    if($password_required) {
        if(is_blank($user['password'])) {
            $errors[] = "Password cannot be Password cannot be blank.";
        } elseif (!has_length($user['password'], array('min' => 12))) {
            $errors[] = "Password must contain 12 or more characters ";
        } elseif (!preg_match('/[A-Z]/', $user['password'])) {
            $errors[] = "Password must contain at least 1 uppercase letter ";
        } elseif (!preg_match('/[a-z]/', $user['password'])) {
            $errors[] = "Password must contain at least 1 lowercase letter ";
        } elseif (!preg_match('/[0-9]/', $user['password'])) {
            $errors[] = "Password must contain at least 1 number " ;
        } elseif (!preg_match('/[^A-Za-z0-9\s]/', $user['password'])) {
            $errors[] = "Password must contain at least 1 symbol " ;
        }

        if(is_blank($user['confirm_password'])) {
            $errors[] = "Confirm password cannot be blank.";
        } elseif ($user['password'] !== $user['confirm_password']) {
            $errors[] = "Password and confirm password must match.";
        }
    }

    return $errors;
}
function validate_username($user):array {
    $errors = [];
    $password_required = $options['password_required'] ?? true;

    if(is_blank($user['username'])) {
        $errors[] = "Username cannot be blank.";
    } elseif (!has_length($user['username'], array('min' => 8, 'max' => 255))) {
        $errors[] = "Username must be between 8 and 255 characters.";
    } elseif (!has_unique_username($user['username'], $user['id'] ?? 0)) {
        $errors[] = "Username not allowed. Try another.";
    }

    return $errors;
}



function find_parent_by_username($username) {
    global $db;

    $parent_sql = "SELECT * FROM parent ";
    $parent_sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $parent_sql .= "LIMIT 1";

    $result = mysqli_query($db, $parent_sql);

    confirm_result_set($result);
    $parent = mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);

    return $parent; // returns an assoc. array
}

function find_child_by_Id($Id) {
    global $db;

    $childP_sql = "SELECT * FROM child ";
    $childP_sql .= " WHERE id='" . db_escape($db, $Id) . "' ";

    $result = mysqli_query($db, $childP_sql);
    confirm_result_set($result);
    $child= mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $child;

    // returns an assoc. array
}

function find_child_by_parentId($parentId) {
    global $db;

    $childP_sql = "SELECT C.* FROM user U INNER JOIN child C ON C.parent_id = U.id";
    $childP_sql .= " WHERE U.id='" . db_escape($db, $parentId) . "' ";

    $result = mysqli_query($db, $childP_sql);
    confirm_result_set($result);
    return $result; // returns an assoc. array
}

function count_child_by_parent_id($parentId) {
    global $db;

    $sql = "SELECT COUNT(id) FROM child ";
    $sql .= "WHERE parent_id ='" . db_escape($db, $parentId) . "' ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $row = mysqli_fetch_row($result);
    mysqli_free_result($result);
    $count = $row[0];
    return $count;
}


function insert_child($child,$parentId) {
    global $db;

    $errors = validate_user($child);
    if (!empty($errors)) {
        return $errors;
    }


    $errors = validate_user_username($child);
    if (!empty($errors)) {
        return $errors;
    }


    $hashed_child_password = password_hash($child['password'], PASSWORD_BCRYPT);

    $add_sql1 = "INSERT INTO child ";
    $add_sql1 .= "(parent_id,firstname,lastname,gender,date_of_birth,username,password,usertype) ";
    $add_sql1 .= "VALUES (";
    $add_sql1 .= "'" . $parentId. "', ";
    $add_sql1 .= "'" . db_escape($db, $child['firstname']) . "', ";
    $add_sql1 .= "'" . db_escape($db, $child['lastname']) . "', ";
    $add_sql1 .= "'" . db_escape($db, $child['gender']) . "',";
    $add_sql1 .= "'" . db_escape($db, $child['date_of_birth']) . "',";
    $add_sql1 .= "'" . db_escape($db, $child['username']) . "', ";
    $add_sql1 .= "'" . db_escape($db, $hashed_child_password) . "', ";
    $add_sql1 .= "'" . db_escape($db, $child['usertype']) . "'";
    $add_sql1 .= ")";

    $result = mysqli_query($db, $add_sql1);


    // For INSERT statements, $result is true/false
    if($result ) {
        return true;
    } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_child($child) {
    global $db;

    $password_sent = !is_blank($child['password']);

    $errors = validate_user($child, ['password_required' => $password_sent]);
    if (!empty($errors)) {
        return $errors;
    }


    $hashed_password = password_hash($child['password'], PASSWORD_BCRYPT);

    $edit_sql = "UPDATE child SET ";
    $edit_sql .= "firstname='" . db_escape($db, $child['firstname']) . "', ";
    $edit_sql .= "lastname='" . db_escape($db, $child['lastname']) . "', ";
    if($password_sent) {
        $edit_sql .= "password='" . db_escape($db, $hashed_password) . "', ";
    }
    $edit_sql .= "gender='" . db_escape($db, $child['gender']) . "' ";

    $edit_sql .= "WHERE id='" . db_escape($db, $child['id']) . "' ";
    $edit_sql .= " LIMIT 1";


    $result = mysqli_query($db, $edit_sql);

    // For UPDATE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function delete_child($id) {
    global $db;

    $sql = "DELETE FROM child ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function find_all_galas() {
    global $db;

    $sql = "SELECT * FROM gala ";
    $sql .= "ORDER BY id";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}
function insert_gala_event($gala,$event)
{
    global $db;
    $errors = validate_gala($gala);
    if (!empty($errors)) {
        return $errors;
    }

    $sql = "INSERT INTO gala ";
    $sql .= "(name,location,date,time) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $gala['name']) . "', ";
    $sql .= "'" . db_escape($db, $gala['location']) . "',";
    $sql .= "'" . db_escape($db, $gala['date']) . "',";
    $sql .= "'" . db_escape($db, $gala['time']) . "' ";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if($result ) {
        $sample_sql = "SELECT g.id FROM gala g WHERE g.name = '" . $gala['name'] ."'";
        $foreign_key = mysqli_query($db, $sample_sql);
        confirm_result_set($foreign_key);
        $event_FK   = mysqli_fetch_assoc($foreign_key);
        mysqli_free_result($foreign_key);
        $event_foreign_key = $event_FK['id'];



        $sql1 = "INSERT INTO events";
        $sql1 .= "(gala_id,name,location,time,age_group,distance,stroke,gender) ";
        $sql1 .= "VALUES (";
        $sql1 .= "'" . $event_foreign_key. "', ";
        $sql1 .= "'" . db_escape($db, $event['name']) . "', ";
        $sql1 .= "'" . db_escape($db, $event['location']) . "', ";
        $sql1 .= "'" . db_escape($db, $event['time']) . "', ";
        $sql1 .= "'" . db_escape($db, $event['age_group']) . "', ";
        $sql1 .= "'" . db_escape($db, $event['distance']) . "', ";
        $sql1 .= "'" . db_escape($db, $event['stroke']) . "', ";
        $sql1 .= "'" . db_escape($db, $event['gender']) . "'";
        $sql1 .= ")";


        $result1 = mysqli_query($db, $sql1);
        if ($result1) {

            return true;
        }
        else{
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    } else {
        // INSERT failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function insert_event($event,$galaId){
    global $db;





        $sql1 = "INSERT INTO events";
        $sql1 .= "(gala_id,name,location,time,age_group,distance,stroke,gender) ";
        $sql1 .= "VALUES (";
        $sql1 .= "'" . $galaId. "', ";
        $sql1 .= "'" . db_escape($db, $event['name']) . "', ";
        $sql1 .= "'" . db_escape($db, $event['location']) . "', ";
        $sql1 .= "'" . db_escape($db, $event['time']) . "', ";
        $sql1 .= "'" . db_escape($db, $event['age_group']) . "', ";
        $sql1 .= "'" . db_escape($db, $event['distance']) . "', ";
        $sql1 .= "'" . db_escape($db, $event['stroke']) . "', ";
        $sql1 .= "'" . db_escape($db, $event['gender']) . "'";
        $sql1 .= ")";


        $result1 = mysqli_query($db, $sql1);
        if ($result1) {

            return true;
        }
        else{
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }

}
function validate_gala($gala):array {
    $errors = [];

    if (!has_unique_galaname($gala['name'], $gala['id'] ?? 0)) {
        $errors[] = "Gala name not allowed. Try another.";
    }
    $date_now = date("Y-m-d");
    if ($gala['date']< $date_now) {
        $errors[] = "Date should be future date ";
    }

    return $errors;
}

function find_gala_by_name($name) {
    global $db;

    $user_sql = "SELECT * FROM gala ";
    $user_sql .= "WHERE name='" . db_escape($db, $name) . "' ";
    $user_sql .= "LIMIT 1";
    $result = mysqli_query($db, $user_sql);
    confirm_result_set($result);
    $user= mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $user; // returns an assoc. array
}

function find_event_by_galaId($galaId) {
    global $db;

    $sql = "SELECT E.* FROM events E  INNER JOIN gala G ON E.gala_id = G.id";
    $sql .= " WHERE G.id='" . db_escape($db, $galaId) . "' ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result; // returns an assoc. array
}

function count_event_by_gala_id($galaId) {
    global $db;

    $sql = "SELECT COUNT(id) FROM events ";
    $sql .= "WHERE gala_id ='" . db_escape($db, $galaId) . "' ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $row = mysqli_fetch_row($result);
    mysqli_free_result($result);
    $count = $row[0];
    return $count;
}

function update_gala($gala) {
    global $db;



    $errors = validate_gala($gala);
    if (!empty($errors)) {
        return $errors;
    }


    $edit_sql = "UPDATE gala SET ";
    $edit_sql .= "name='" . db_escape($db, $gala['name']) . "', ";
    $edit_sql .= "location='" . db_escape($db, $gala['location']) . "', ";
    $edit_sql .= "date='" . db_escape($db, $gala['date']) . "', ";
    $edit_sql .= "time='" . db_escape($db, $gala['time']) . "' ";
    $edit_sql .= "WHERE id='" . db_escape($db, $gala['id']) . "' ";
    $edit_sql .= " LIMIT 1";


    $result = mysqli_query($db, $edit_sql);

    // For UPDATE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}


function find_gala_by_Id($Id) {
    global $db;

    $sql = "SELECT * FROM gala ";
    $sql .= " WHERE id='" . db_escape($db, $Id) . "' ";


    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $gala= mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $gala;

    // returns an assoc. array
}
function delete_gala($id)
{
    global $db;


    $result1 = delete_event_by_galaId($id);

    if ($result1) {

        $sql = "DELETE FROM gala ";
        $sql .= "WHERE id='" . $id . "' ";
        $sql .= "LIMIT 1;";
        $result = mysqli_query($db, $sql);

        // For DELETE statements, $result is true/false
        if ($result) {
            return true;
        } else {
            // DELETE failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }
}

function delete_event_by_galaId($id) {
    global $db;

    $sql = "DELETE FROM events ";
    $sql .= "WHERE gala_id='" . $id . "' ";
    $result = mysqli_query($db, $sql);


    if($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_event($event) {
    global $db;



    $edit_sql = "UPDATE events SET ";
    $edit_sql .= "name='" . db_escape($db, $event['name']) . "', ";
    $edit_sql .= "location='" . db_escape($db, $event['location']) . "', ";
    $edit_sql .= "time='" . db_escape($db, $event['time']) . "', ";
    $edit_sql .= "age_group='" . db_escape($db, $event['age_group']) . "', ";
    $edit_sql .= "distance='" . db_escape($db, $event['distance']) . "', ";
    $edit_sql .= "stroke='" . db_escape($db, $event['stroke']) . "', ";
    $edit_sql .= "gender='" . db_escape($db, $event['gender']) . "' ";
    $edit_sql .= "WHERE id='" . db_escape($db, $event['id']) . "' ";
    $edit_sql .= " LIMIT 1";


    $result = mysqli_query($db, $edit_sql);

    // For UPDATE statements, $result is true/false
    if($result) {
        return true;
    } else {

        db_disconnect($db);
        exit;
    }
}

function find_event_by_Id($Id) {
    global $db;

    $sql = "SELECT * FROM events ";
    $sql .= " WHERE id='" . db_escape($db, $Id) . "' ";


    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $gala= mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $gala;

    // returns an assoc. array
}

function delete_event($Id) {
    global $db;

    $sql = "DELETE FROM events ";
    $sql .= "WHERE id='" . db_escape($db, $Id) . "' ";
    $result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function insert_swimmer($swimmer,$userId,$squadId){
    global $db;

    $errors = validate_swimmer($userId);
    if (!empty($errors)) {
        return $errors;
    }


    $sql = "INSERT INTO swimmer ";
    $sql .= "(user_id,squad_id,stroke) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $userId) . "', ";
    $sql .= "'" . db_escape($db, $squadId) . "',";
    $sql .= "'" . db_escape($db, $swimmer['stroke']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if($result ) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function validate_swimmer($userId):array {
    $errors = [];

    if (!has_unique_userid($userId,  0)) {
        $errors[] = "swimmer details already added.try another .";
    }


    return $errors;
}
function find_swimmer_by_username($username){
    global $db;

    $sql = "SELECT S.* FROM user U INNER JOIN swimmer S on U.id = S.user_id";
    $sql .= " WHERE U.username='" . db_escape($db, $username) . "' ";


    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $swimmer= mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $swimmer;
}

function insert_performance($performance,$swimmerId,$seconds){
    global $db;

    $errors = validate_date($performance);
    if (!empty($errors)) {
        return $errors;
    }


    $sql = "INSERT INTO performance ";
    $sql .= "(swimmer_id,date,best_time) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $swimmerId) . "', ";
    $sql .= "'" . db_escape($db, $performance['date']) . "', ";
    $sql .= "'" . db_escape($db, $seconds) . "' ";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if($result ) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
function validate_date($performance):array {
    $errors = [];


    $date_now = date("Y-m-d");
    if ($performance['date'] > $date_now) {
        $errors[] = "Date should not be future date ";
    }

    return $errors;
}
function register_event($username,$gala_id,$event_id)
{
    global $db;


    $errors = validate_galaDate($gala_id);
    if (!empty($errors)) {
        return $errors;
    }
    $swimmer_set = find_swimmer_by_username($username);
    $errors = validate_swimmerId($swimmer_set['id'],$event_id);
    if (!empty($errors)) {
        return $errors;
    }


    if ($swimmer_set != '') {
        $sql = "INSERT INTO register ";
        $sql .= "(gala_id,event_id,swimmer_id) ";
        $sql .= "VALUES (";
        $sql .= "'" . db_escape($db, $gala_id) . "', ";
        $sql .= "'" . db_escape($db, $event_id) . "', ";
        $sql .= "'" . db_escape($db, $swimmer_set['id']) . "' ";
        $sql .= ")";
        $result = mysqli_query($db, $sql);

        if ($result) {
            return true;
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
function validate_swimmerId($swimmerId,$eventId):array {
    $errors = [];

    if (!has_unique_swimmerId($swimmerId,  0,$eventId)) {
        $errors[] = "Already Registered";
    }


    return $errors;
}

function validate_galaDate($galaid):array {
    $errors = [];

    if (!has_gala_date($galaid)) {
        $errors[] = "Registration closed";
    }


    return $errors;
}


function find_all_registers(){
    global $db;

    $sql = "SELECT r.id,g.name as Gala_name,e.name AS Event_Name,e.age_group AS Event_age_group,e.gender AS Event_gender,S.stroke AS Swimmer_Stroke,u.firstname AS Swimmer_first_name,U.lastname AS Swimmer_last_name, U.username AS Swimmer_Username,u.gender AS Swimmer_Gender,SI.squad_name AS Swimmer_Squad  FROM register r INNER JOIN gala g on r.gala_id = g.id INNER JOIN events e on g.id = e.gala_id INNER JOIN swimmer s on r.swimmer_id = s.id INNER JOIN user u on s.user_id = u.id INNER JOIN squad_info si on s.squad_id = si.Id";
    $sql .= " WHERE register_status=' ' ";


    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;


}

function delete_register_by_id($id) {
    global $db;

    $sql = "DELETE FROM register ";
    $sql .= "WHERE id='" . $id . "' ";
    $result = mysqli_query($db, $sql);


    if($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_register_by_id($id) {
    global $db;



    $edit_sql = "UPDATE register SET ";
    $edit_sql .= "register_status='accept' ";
    $edit_sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $edit_sql .= " LIMIT 1";



    $result = mysqli_query($db, $edit_sql);

    // For UPDATE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}


function find_all_participant(){
    global $db;

    $sql = "SELECT r.id,g.name as Gala_name,e.name AS Event_Name,e.age_group AS Event_age_group,e.gender AS Event_gender,S.stroke AS Swimmer_Stroke,u.firstname AS Swimmer_first_name,U.lastname AS Swimmer_last_name, U.username AS Swimmer_Username,u.gender AS Swimmer_Gender,SI.squad_name AS Swimmer_Squad  FROM register r INNER JOIN gala g on r.gala_id = g.id INNER JOIN events e on g.id = e.gala_id INNER JOIN swimmer s on r.swimmer_id = s.id INNER JOIN user u on s.user_id = u.id INNER JOIN squad_info si on s.squad_id = si.Id";
    $sql .= " WHERE register_status='accept' ";


    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;


}

function chart_query($id){
    global $db;

    $sql = "SELECT P.date AS Date,P.best_time AS Time FROM  user U INNER JOIN swimmer s on U.id = s.user_id INNER JOIN performance p on s.id = p.swimmer_id";
    $sql .= " WHERE U.id='" . db_escape($db, $id) . "' ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}



function find_swimmer_by_eventName($eventName,$galaid) {
    global $db;


    $sql = "SELECT U.* FROM register R INNER JOIN events e on R.event_id = e.id INNER JOIN swimmer s on R.swimmer_id = s.id INNER JOIN user u on s.user_id = u.id";
    $sql .= " WHERE e.name='" . db_escape($db, $eventName) . "' ";
    $sql .= " AND R.gala_id='" . db_escape($db, $galaid) . "' ";
    $sql .= " AND R.register_status= 'accept' ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result; // returns an assoc. array
}



function find_register_by_eventName_swimmerName($eventName,$swimmerName) {
    global $db;


    $sql = "SELECT R.id FROM register R INNER JOIN events e on R.event_id = e.id INNER JOIN swimmer s on R.swimmer_id = s.id INNER JOIN user u on s.user_id = u.id";
    $sql .= " WHERE e.name='" . db_escape($db, $eventName) . "' ";
    $sql .= " AND u.username='" . db_escape($db, $swimmerName) . "' ";
    $sql .= " AND R.register_status= 'accept' ";


        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $result_set = mysqli_fetch_assoc($result);
        mysqli_free_result($result);

        return $result_set; // returns an assoc. array


}

function validate_swimmerName($swimmerId,$eventId):array {
    $errors = [];

    if (!has_unique_swimmerName($eventName,$swimmerName)) {
        $errors[] = "Already Registered";
    }


    return $errors;
}
function insert_gala_result($result,$registerId,$seconds){
    global $db;
    $errors = validate_result($registerId);
    if (!empty($errors)) {
        return $errors;
    }


    $sql = "INSERT INTO result ";
    $sql .= "(register_id,finished_time,position) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $registerId) . "', ";
    $sql .= "'" . db_escape($db, $seconds) . "', ";
    $sql .= "'" . db_escape($db, $result['position']) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if($result ) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function validate_result($register_id):array {
    $errors = [];

    if (!has_unique_Register_result($register_id)) {
        $errors[] = "Already Enter the result";
    }


    return $errors;
}
function find_all_swimmers() {
    global $db;

    $sql = "SELECT * FROM user ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}
function find_all_result($galaname) {
    global $db;

    $sql = "SELECT result.id, concat(u.firstname,'',u.lastname) AS swimmer, e.name As event,result.finished_time,result.position FROM result INNER JOIN register r on result.register_id = r.id INNER JOIN swimmer s on r.swimmer_id = s.id INNER JOIN user u on s.user_id = u.id INNER JOIN events e on r.event_id = e.id INNER JOIN gala g on r.gala_id = g.id";
    $sql .= " WHERE g.name ='" . db_escape($db, $galaname) . "' ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}
function update_result($result) {
    global $db;

    $edit_sql = "UPDATE result SET ";
    $edit_sql .= "finished_time='" . db_escape($db, $result['finished_time']) . "', ";
    $edit_sql .= "position='" . db_escape($db, $result['position']) . "' ";
    $edit_sql .= " LIMIT 1";


    $result = mysqli_query($db, $edit_sql);

    // For UPDATE statements, $result is true/false
    if($result) {
        return true;
    } else {

        db_disconnect($db);
        exit;
    }
}
function find_result_by_Id($Id) {
    global $db;

    $sql = "SELECT * FROM result ";
    $sql .= " WHERE id='" . db_escape($db, $Id) . "' ";


    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $gala= mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $gala;

    // returns an assoc. array
}

function delete_result($id) {
    global $db;

    $sql = "DELETE FROM result ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}
function find_all_performance($column,$sort_order) {
    global $db;

    if ($column == 'swimmer'){
        $column_value = 'u.firstname';
    }elseif ($column == 'squad'){
        $column_value = 'SI.squad_name';
    }elseif ($column == 'stroke'){
        $column_value = 's.stroke';
    }elseif ($column == 'time'){
        $column_value = 'p.best_time';
    } elseif ($column == 'date'){
        $column_value = 'p.date';
    }

    $sql = " SELECT CONCAT(U.firstname ,' ', U.lastname) as swimmer,SI.squad_name AS squad,S.stroke, p.best_time As time,p.date  FROM performance p INNER JOIN swimmer s on p.swimmer_id = s.id INNER JOIN user u on s.user_id = u.id INNER JOIN squad_info si on s.squad_id = si.Id";
    $sql .=" ORDER BY  " .  $column_value . "  $sort_order";



    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}
function find_prformance_by_id($name) {
    global $db;

    $firstname = explode(' ', $name);



    $sql = " SELECT CONCAT(U.firstname ,' ', U.lastname) as swimmer,SI.squad_name AS squad,S.stroke, p.best_time As time,p.date  FROM performance p INNER JOIN swimmer s on p.swimmer_id = s.id INNER JOIN user u on s.user_id = u.id INNER JOIN squad_info si on s.squad_id = si.Id";
    $sql .=" WHERE u.firstname LIKE '%".db_escape($db, $firstname[0]) ."%' " ;



    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_performance_by_user_id($userId) {
    global $db;



    $sql = " SELECT CONCAT(U.firstname ,' ', U.lastname) as swimmer,SI.squad_name AS squad,S.stroke, p.best_time As time,p.date  FROM performance p INNER JOIN swimmer s on p.swimmer_id = s.id INNER JOIN user u on s.user_id = u.id INNER JOIN squad_info si on s.squad_id = si.Id";
    $sql .=" WHERE u.id='" . db_escape($db, $userId) . "' ";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function update_swimmer($swimmer,$userId,$squadId) {
    global $db;


    $edit_sql = "UPDATE swimmer SET ";
    $edit_sql .= "squad_id='" . db_escape($db, $squadId) . "', ";
    $edit_sql .= "stroke='" . db_escape($db, $swimmer['stroke']) . "' ";
    $edit_sql .= "WHERE user_id='" . db_escape($db, $userId) . "' ";
    $edit_sql .= " LIMIT 1";


    $result = mysqli_query($db, $edit_sql);

    // For UPDATE statements, $result is true/false
    if($result) {
        return true;
    } else {

        db_disconnect($db);
        exit;
    }
}

function find_swimmer_by_id($id) {
    global $db;

    $user_sql = "SELECT * FROM swimmer ";
    $user_sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $user_sql .= "LIMIT 1";
    $result = mysqli_query($db, $user_sql);
    confirm_result_set($result);
    $user= mysqli_fetch_assoc($result); // find first
    mysqli_free_result($result);
    return $user; // returns an assoc. array
}
function find_all_swimmer_details() {
    global $db;



    $sql = " SELECT CONCAT(U.firstname ,' ', U.lastname) as swimmer,SI.squad_name AS squad,S.stroke  FROM  swimmer s INNER JOIN user u on s.user_id = u.id INNER JOIN squad_info si on s.squad_id = si.Id";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}
