<?php
// File Name:  class_member.php
/**
 * Creates member class and functions
 * @author Will Johnston
 * @version 1.0
 * @since 1.0
 * @access public
 * @copyright Will Johnston
 * edited 4-5-2024
 */

require_once("class_db.php");

class member
{

    function check_name_available($link, $name)
    {
        $checkNameQuery = $link->prepare("SELECT * FROM member WHERE member.member_name = ?");
        $checkNameQuery->bind_param("s", $name);
        $checkNameQuery->execute();
        $resultName = $checkNameQuery->get_result(); // get the mysqli result

        $rowCt = mysqli_num_rows($resultName);

        if ($rowCt > 0)   // already used this one
        {
            return 0;
        } else {
            return 1;
        }

    }   // close     function check_name_available( $link, $name )

    function check_email_available($link, $email)
    {

        // check if email is already taken

        $checkEmailQuery = $link->prepare("SELECT * FROM member WHERE member.member_email = ?");
        $checkEmailQuery->bind_param("s", $email);
        $checkEmailQuery->execute();
        $resultEmail = $checkEmailQuery->get_result(); // get the mysqli result

        $rowEmailCt = mysqli_num_rows($resultEmail);

        if ($rowEmailCt > 0) {
            return 0;
        } else {
            return 1;
        }
    }   // close     function check_email_available( $email ) ---------------

    function add_member($link): int
    {
        $id = '';   // avoid fatal incorrect int value
        $name = $this->test_input($_POST['registerMemberName']);
        $password = $this->test_input($_POST['registerMemberPassword']);
        $email = $this->test_input($_POST['registerMemberEmail']);

        $options = [
            'cost' => 10,
        ];

        $password = password_hash($password, PASSWORD_DEFAULT, $options);

        $member_type = '2';

        $insertQuery = $link->prepare("INSERT INTO member   (   member_id,
                                               member_type,
                                               member_name,
                                               member_password,
                                               member_email,
                                               member_date_entered )
                                         VALUES (  ?,
                                                   ?,
                                                   ?,
                                                   ?,
                                                   ?,
                                                  now() )");

        // echo "<br>insertQuery:  $insertQuery on line ".__LINE__.".<br>";

        $insertQuery->bind_param("issss", $id, $member_type, $name, $password, $email);
        $insertQuery->execute();

        // $resultName = $insertQuery->get_result(); // get the mysqli result

        $resultName = mysqli_affected_rows($link);

        if ($resultName) {
            // echo "Successfully inserted " . mysqli_affected_rows($link) . " row";
            return 1;
        } else {
            echo "Error occurred: ".mysqli_error($link)." line ".__LINE__." of ".__FILE__."<br>";
            return 0;
        }
    }   // close     function add_member( $link )

function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }  // close    function login($membername, $password, $link)

function login($link, $password, $email) //----------------------------------
    {
        // check email and password with db
        // if yes, return true
        // else return false

        $password = $this->test_input($password);
        $email = $this->test_input($email);

        // echo "password is $password and email is $email on line ".__LINE__.".<br>";

        // use same options and hash as when originally entered Line 100 above
        //$options = [
        //'cost' => 10,
        //];
        // $password = password_hash($password, PASSWORD_DEFAULT, $options);

        // echo "After hash, password is $password and email is $email on line ".__LINE__.".<br>";

        $queryName = $link->prepare("SELECT member_password, member_responded, member_valid FROM member WHERE member_email = ?");
        $queryName->bind_param("s", $email);
        $queryName->execute();
        $resultName = $queryName->get_result(); // get the mysqli result
        //

        if ($resultName == false) {
            echo "Database not available, try again later L".__LINE__." of ".__FILE__.".</br>";
        } else {
            $rowCt = mysqli_num_rows($resultName);
            if ($rowCt > 0) {
                $rowAnswers = mysqli_fetch_row($resultName);
                $passwordHash = $rowAnswers[0];

                $responded = $rowAnswers[1];
                $valid = $rowAnswers[2];

                if ($responded == "y" && $valid == "y") {
                    if (password_verify($password, $passwordHash)) {
                        // echo "Password matched on Line ".__LINE__." of ".__FILE__.".<br>";
                        return 1;
                    } else {
                        // echo "Password DID NOT match on Line ".__LINE__." of ".__FILE__." password:  $password - passwordHash:  $passwordHash .<br>";

                        return 0;
                    }
                } else {
                    echo "This is not a valid account - Line ".__LINE__." of ".__FILE__." .<br>";
                    return 0;
                }
            } else {
                echo "No match for that email - Line ".__LINE__." of ".__FILE__.".<br>";
                return 0;
            }

        }

    }  // close check_member_session

    function check_member_session()
    {
        // see if somebody is logged in and notify them if not

        if (isset($_SESSION['member'])) {
            return true;
        } else {
            return false;
        }
    }   // close display_registration_form

function display_registration_form($edit)
    {
        // display form asking for member name email and password
        // all required
        // edit is zero first time meaning NO edit
        // 1 is issue with name - so do not fill it in
        // 2 is issue with pass word
        // 3 is issue with email

        //echo "edit is $edit on line ".__LINE__." of ".__FILE__.".<br>";

        if ($edit == 1) {
            $name = "";
            $pw = $_POST['registerMemberPassword'];
            $pw2 = $_POST['registerConfirmMemberPassword'];
            $email = $_POST['registerMemberEmail'];
        }

        if ($edit == 2) {
            $name = $_POST['registerMemberName'];
            $pw = "";
            $pw2 = "";
            $email = $_POST['registerMemberEmail'];
        }

        if ($edit == 3) {
            $name = $_POST['registerMemberName'];
            $pw = $_POST['registerMemberPassword'];
            $pw2 = $_POST['registerConfirmMemberPassword'];
            $email = "";
        }
        ?>

        <br><br>

        <form method="post" name="registerForm" action="member.php">
            <div class="center">
                <table>
                    <tr>
                        <td>
                            Member Name:<br>
                        </td>

                        <td>
                            <input type="text" name="registerMemberName" size="48" maxlength="65"
                                   value="<?php if ($edit) {
                                       echo htmlspecialchars($name);
                                   } ?>"/>
                        </td>
                    <tr>
                        <td colspan="2">
                            <p class="smallFont">(Name will be displayed in discussions if you participate.)</p>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Member Password:<br>
                        </td>

                        <td>
                            <input type="password" name="registerMemberPassword" size="48" maxlength="65"
                                   value="<?php if ($edit) {
                                       echo htmlspecialchars($pw);
                                   } ?>"/>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Confirm Member Password:<br>
                        </td>

                        <td>
                            <input type="password" name="registerConfirmMemberPassword" size="48" maxlength="65"
                                   value="<?php if ($edit) {
                                       echo htmlspecialchars($pw2);
                                   } ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p class="smallFont">(Password must be at least 8 characters long including uppercase,
                                lowercase, and number )</p>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Email:
                        </td>

                        <td>
                            <input type="text" name="registerMemberEmail" size="48" maxlength="65"
                                   value="<?php if ($edit) {
                                       echo htmlspecialchars($email);
                                   } ?>"/>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <p class="smallFont">(You will receive one email to this address to validate your
                                registration.)</p>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">

                            <!-- prevent robots from form submission -->
                            <?php
                            $nowTime = time();
                            ?>
                            <input type="hidden" name="timestamp" value="<?php echo $nowTime; ?>"/>

                            <div class="g-recaptcha" data-sitekey="6LdWriwUAAAAAGH8LiiILOMJG6iRr5bU-wTNu3kR"></div>

                            <div class="center">
                                <input type="submit" name="submitRegister" value="Register"/>
                            </div>
                        </td>
                    </tr>

                </table>
            </div>
        </form>
        <?php
    }    // close display_secure_login_form

function display_secure_login_form($indexIn)
    {
        // display form asking for name and password

        //echo "indexIn is $indexIn.<br>";

        if ($indexIn == 1)             // index page
        {
            $libAddress = "_lib";
            $imageAddress = "images";
            $linkAddress = "";
        } elseif ($indexIn == 2)         // one deep
        {
            $libAddress = "../_lib";
            $imageAddress = "../images";
            $linkAddress = "../";
        } elseif ($indexIn == 3)         // two deep
        {
            $libAddress = "../../_lib";
            $imageAddress = "../../images";
            $linkAddress = "../../";
        } elseif ($indexIn == 4)         // above public_html - info
        {
            $libAddress = "../public_html/_lib";
            $imageAddress = "../public_html/images";
            $linkAddress = "../public_html/";
        } else {
            echo "Could not process your request right now. Please try again later L".__LINE__." of ".__FILE__.".<br>";
        }
        ?>

        <form method="post" action="../site/member.php">
            <table class="compare">

                <tr class="compare">

                    <td class="compare">
                        <label> Email: <input type="text" name="memberEmail" size="100" maxlength="100"/> </label>
                    </td>
                </tr>

                <tr class="compare">
                    <td class="compare">
                        <label> Password: <input type="password" name="memberPassword" size="100" maxlength="100"/>
                        </label>
                    </td>
                </tr>

                <tr>
                    <td class="compare">
                        <label> Remember Me ( Do not check this box on public devices.) <input type="checkbox"
                                                                                               name="rememberMe"
                                                                                               value="1"> </label>
                    </td>
                </tr>

                <tr class="compare">
                    <td class="compare">
                        <input type="submit" name="submitLogin" value="Log In"/>
                    </td>
                </tr>

                <tr class="compare">
                    <td>
                        <div class="center">
                            <a href="<?php echo $linkAddress; ?>site/member_forgot_password.php">Forgot Password?</a>
                        </div>
                    </td>
                </tr>

            </table>
        </form>

        <?php
    }            // close function validatePassword( )

function validate_password()
    {
        if (!empty($_POST["registerMemberPassword"]) && ($_POST["registerMemberPassword"] == $_POST["registerConfirmMemberPassword"])) {

            $password = $this->test_input($_POST["registerMemberPassword"]);
            $cpassword = $this->test_input($_POST["registerConfirmMemberPassword"]);

            // echo "pw is $password and confirm pw is $cpassword on line ".__LINE__.".<br>";

            if (strlen($password) < '8') {
                echo "Your Password Must Contain At Least 8 Characters!<br>";
                return 0;
            } elseif (!preg_match("#[0-9]+#", $password)) {
                echo "Your Password Must Contain At Least 1 Number!<br>";
                return 0;
            } elseif (!preg_match("#[A-Z]+#", $password)) {
                echo "Your Password Must Contain At Least 1 Capital Letter!<br>";
                return 0;
            } elseif (!preg_match("#[a-z]+#", $password)) {
                echo "Your Password Must Contain At Least 1 Lowercase Letter!<br>";
                return 0;
            } else {
                return 1;
            }
        } else {
            return 1;
        }
    }            // close function validate_generic_password( )

function validate_generic_password($testPassword)
    {

        $password = $testPassword;

        // echo "pw is $password and confirm pw is $cpassword on line ".__LINE__.".<br>";

        if (strlen($password) < '8') {
            echo "Your Password Must Contain At Least 8 Characters!<br>";
            return 0;
        } elseif (!preg_match("#[0-9]+#", $password)) {
            echo "Your Password Must Contain At Least 1 Number!<br>";
            return 0;
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            echo "Your Password Must Contain At Least 1 Capital Letter!<br>";
            return 0;
        } elseif (!preg_match("#[a-z]+#", $password)) {
            echo "Your Password Must Contain At Least 1 Lowercase Letter!<br>";
            return 0;
        } else {
            return 1;
        }

    }   // close function test_input

    function get_member_name($email)
    {
        $o_db = new db();
        $logLink = $o_db->connect_database();

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: ".mysqli_connect_error();
        }


        $queryName = $logLink->prepare("SELECT member_name FROM member WHERE member_email = ?");
        $queryName->bind_param("s", $email);
        $queryName->execute();
        $resultLog = $queryName->get_result(); // get the mysqli result

        if ($resultLog == false) {
            echo "Database not available, try again later L".__LINE__." of ".__FILE__.".</br>";
        } else {
            $rowCt = mysqli_num_rows($resultLog);
            if ($rowCt > 0) {
                $rowAnswers = mysqli_fetch_row($resultLog);
                $memberName = $rowAnswers[0];
                return $memberName;
            } else {
                // echo "No match in database to email: $email on line ".__LINE__.".<br>";
                return 0;
            }
        }
        mysqli_free_result($resultLog);
    }  // close function get_member_name( $email )


    function get_added_by_name_by_id($link, $id)
    {
        $queryName = $link->prepare("SELECT added_by.added_by_name FROM added_by WHERE added_by_id = ?");
        $queryName->bind_param("s", $id);
        $queryName->execute();
        $resultLog = $queryName->get_result();

        if ($resultLog == false) {
            echo "Database not available, try again later L".__LINE__.".</br>";
        } else {
            $rowCt = mysqli_num_rows($resultLog);
            if ($rowCt > 0) {
                $rowAnswers = mysqli_fetch_row($resultLog);
                $addedByName = $rowAnswers[0];
                return $addedByName;
            } else {
                // echo "No match in database to id: $id on line ".__LINE__.".<br>";
                return 0;
            }
        }
    }  // close function get_added_by_name_by_id( $id )


    function get_member_name_by_id($link, $id)
    {
        $queryName = $link->prepare("SELECT member_name FROM member WHERE member_id = ?");
        $queryName->bind_param("s", $id);
        $queryName->execute();
        $resultLog = $queryName->get_result();

        if ($resultLog == false) {
            echo "Database not available, try again later L".__LINE__.".</br>";
        } else {
            $rowCt = mysqli_num_rows($resultLog);
            if ($rowCt > 0) {
                $rowAnswers = mysqli_fetch_row($resultLog);
                $memberName = $rowAnswers[0];
                return $memberName;
            } else {
                // echo "No match in database to id: $id on line ".__LINE__.".<br>";
                return 0;
            }
        }
    }  // close function get_member_name_by_id( $id )


    function get_member_id($link, $email)
    {
        $queryName = $link->prepare("SELECT member_id FROM member WHERE member_email = ?");
        $queryName->bind_param("s", $email);
        $queryName->execute();
        $resultLog = $queryName->get_result();

        if ($resultLog == false) {
            echo "Database not available, try again later L".__LINE__.".</br>";
        } else {
            $rowCt = mysqli_num_rows($resultLog);
            if ($rowCt > 0) {
                $rowAnswers = mysqli_fetch_row($resultLog);
                $memberID = $rowAnswers[0];
                return $memberID;
            } else {
                // echo "No match in database to email: $email on line ".__LINE__.".<br>";
                return 0;
            }
        }
    }  // close function get_member_id( $email )


    function get_valid_responded_member_id($link, $email)
    {
        $queryName = $link->prepare("SELECT member_id, member_responded, member_valid FROM member WHERE member_email = ?");
        $queryName->bind_param("s", $email);
        $queryName->execute();
        $resultLog = $queryName->get_result();

        if ($resultLog == false) {
            // printf("Errormessage: %s\n", $logLink->error);
            echo "Database not available, try again later L".__LINE__.".</br>";
        } else {
            $rowCt = mysqli_num_rows($resultLog);
            if ($rowCt > 0) {
                $rowAnswers = mysqli_fetch_row($resultLog);
                $member_id = $rowAnswers[0];
                $member_responded = $rowAnswers[1];
                $member_valid = $rowAnswers[2];


                // echo "responded:$memberResponded and valid:$memberValid on ".__LINE__." of ".__FILE__.".<br>";


                if ($member_responded === "y" && $member_valid === "y") {
                    return $member_id;
                } elseif ($member_responded === 'n') {
                    echo "email: $email has not reponded to validate account.<br>";
                    return 0;
                } elseif ($member_valid === 'n') {
                    echo "Account for email: $email is not valid.<br>";
                    return 0;
                } else {
                    echo "No valid match in database to email: $email.<br>";
                    return 0;
                }
            } else {
                // echo "No match in database to email: $email on line ".__LINE__.".<br>";
                return 0;
            }
        }


    }  // close function get_valid_responded_member_id( $email )


    function get_member_id_by_name($link, $name)
    {
        $queryName = $link->prepare("SELECT member_id FROM member WHERE member_name = ?");
        $queryName->bind_param("s", $name);
        $queryName->execute();
        $resultLog = $queryName->get_result();

        if ($resultLog == false) {
            echo "Database not available, try again later L".__LINE__.".</br>";
        } else {
            $rowCt = mysqli_num_rows($resultLog);
            if ($rowCt > 0) {
                $rowAnswers = mysqli_fetch_row($resultLog);
                $memberID = $rowAnswers[0];
                return $memberID;
            } else {
                echo "No match in database to name: $name on line ".__LINE__.".<br>";
                return 0;
            }
        }


    }  // close function get_member_id_by_name( $name )


    function get_member_email_by_id($link, $id)
    {

        $queryName = $link->prepare("SELECT member_email FROM member WHERE member_id = ?");
        $queryName->bind_param("s", $id);
        $queryName->execute();
        $resultLog = $queryName->get_result();

        if ($resultLog == false) {
            echo "Database not available, try again later L".__LINE__.".</br>";
        } else {
            $rowCt = mysqli_num_rows($resultLog);
            if ($rowCt > 0) {
                $rowAnswers = mysqli_fetch_row($resultLog);
                $memberEmail = $rowAnswers[0];
                return $memberEmail;
            } else {
                echo "No match in database to email for $id on line ".__LINE__.".<br>";
                return 0;
            }
        }
        mysqli_free_result($resultLog);


    }  // close function get_member_email_by_id( $id )


    function ckIfExistingSimilarName($link, $passMushroomName)
    {
        $testMushroomName = '%'.$passMushroomName.'%';

        $queryName = $link->prepare("SELECT mushroom.id, mushroom.name  FROM mushroom WHERE mushroom.name LIKE ?");

        $queryName->bind_param("s", $testMushroomName);
        $queryName->execute();
        $resultName = $queryName->get_result(); // get the mysqli result

        $rowCt = mysqli_num_rows($resultName);
        // printf("Select returned %d rows on Line 933 ckIfExistingSimilarName.<br>", $rowCt );

        if ($resultName == false) {
            echo "Database not available, try again later L".__LINE__.".</br>";

        } else {
            return $rowCt;
        }


    }      // close ckIfExistingSimilarName( $passMushroomName ) function  ********


    function forgot_password_form()
    {

        ?>
        <br><br>
        <form method="post" action="member_reset_password.php">

            <table>

                <tr>
                    <td colspan="2">
                        <div class="center">
                            Enter the email address for your account, and you will receive an email that will help you
                            reset your password:
                        </div>
                    </td>

                </tr>

                <tr>
                    <td colspan="2">
                        <div class="center">
                            <input type="text" name="forgotPasswordEmail"/>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="forgotLogin" value="Reset Password"/>
                    </td>
                </tr>
            </table>

        </form>
        <?php
    }  //  close function forgot_password_form


    function display_reset_password_form($email)
    {
        ?>
        <form method="post" action="">
            <table>
                <tr>
                    <td>
                        Enter your new password (must include uppercase letter and number):
                    </td>

                    <td>
                        <input type="password" name="memberPassword"/>
                    </td>
                </tr>

                <tr>
                    <td>
                        Enter new password again:
                    </td>

                    <td>
                        <input type="password" name="validatePassword"/>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submitRenew" value="Update Password"/>
                    </td>
                </tr>

            </table>
        </form>
        <?php
    }  // close function display_reset_password_form

    function reset_member_password_in_db($link, $id, $password)
    {
        // echo "Before test_input password:$password on line ".__LINE__." of ".__FILE__.".<br>";
        $password = $this->test_input($password);

        // echo "After test_input password:$password on line ".__LINE__." of ".__FILE__.".<br>";

        // same procedure as when created member
        $options = ['cost' => 10,];
        $password = password_hash($password, PASSWORD_DEFAULT, $options);

        //echo "id:$id and password:$password on line ".__LINE__." of ".__FILE__.".<br>";

        $resetQuery = $link->prepare("UPDATE member
                 SET member_password = ?
                 WHERE member_id = ?");

        $resetQuery->bind_param("si", $password, $id);
        $resetQuery->execute();
        $resultName = $resetQuery->get_result(); // get the mysqli result


        if ($resultName === true) {
            echo "Password has been reset.<br>";
        } else {
            echo "Error updating record: ".$link->error;
        }
    }   // close function reset_member_password_in_db( $id, $password)
}  // close class _member