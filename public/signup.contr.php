<?php

require_once __DIR__ . "/../config/session.php";
// require_once __DIR__."/../public/signup.classes.php";
class SignupContr extends Signup
{
    private $unique_id;
    private $fname;
    private $lname;
    private $email;
    private $password;
    private $conpassword;

    // for image validation
    private $profile_image;
    private $image_name; //the image name
    private $image_type; // the image type
    private $image_size; // the image size
    private $image_temp; //the temporary location where the uploaded image is stored
    // the upload folder should be created in the same folder that the include/final execution file is
    private $uploads_folders = "./profileUploads/"; // the uplodas folder
    private $upload_max_size = 2 * 1024 * 1024; // setting the max upload file size to 2MB
    //property to hold an array of allowed image types

    private $allowed_image_types = ["image/jpg", "image/jpeg", "image/png", "image/gif"];

    //property to store validation error
    //setting it to public to have access to it from the index file

    public $error;
    // public $verification;


    public function __construct($unique_id, $fname, $lname, $email, $password, $files)
    {
        $this->unique_id = $unique_id;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->password = $password;

        // fpr image
        // Use $files['product_image'] instead of $files['image']
        $this->image_name = $files['profileImage']['name'] ?? '';
        $this->image_size = $files['profileImage']['size'] ?? 0;
        $this->image_temp = $files['profileImage']['tmp_name'] ?? '';
        $this->image_type = $files['profileImage']['type'] ?? '';
    }

    private function emptyInput()
    {
        $result = 0;
        if (empty($this->unique_id) || empty($this->fname) || empty($this->lname) || empty($this->email) || empty($this->password) || empty($this->image_name)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }


    private function userTaken()
    {
        $result = 0;
        if (!$this->UserCheck($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail()
    {
        $result = 0;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidlname()
    {
        $result = 0;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->lname && $this->fname)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function passwordLength()
    {
        $result = 0;
        if (strlen($this->password) < 8) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    // methods for image validation

    private function isImage()
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);

        $mime = finfo_file($finfo, $this->image_temp);
        if (!in_array($mime, $this->allowed_image_types)) {
            return $this->error = "Only [.jpg, .jpeg, .png, and .gif] files are allowed";
        }
        finfo_close($finfo);
    }

    // we need a method to validate the image's name
    //  the method will return the sanitized image name, so we are sure that it is save to store the name in the database

    private function imageNameValidation()
    {
        return $this->image_name = filter_var($this->image_name, FILTER_SANITIZE_STRING);
    }





    // we need a method to validate the max upload size
    // the method will return an error if the file's size exceeds the 2MB limit

    private function sizeValidation()
    {
        if ($this->image_size > $this->upload_max_size) {
            return $this->error = "File is too large";
        }
    }

    // we need to check if the file already exists in the folder
    // the method will return an error if the file exists

    private function checkFile()
    {
        if (file_exists($this->uploads_folders . $this->newName())) {
            return $this->error = "File already exists in the folder";
        }
    }

    // we will move the file from our temporary storage to the uploads folder
    // when we're uploading a file, php is storing that file to a temporary location in the server. Then we have to move the file to our uploads folder



    private function newName()
    {
        return "influence" . md5($this->image_name);
    }




    private function moveFile()
    {

        // initially the #3 was $this->image_name, but the because it was appearing in the upload folder as the default image name and appeared in the database as the encrypted name, i have to change it here to the newNname,,,with the method created
        // i switched it back to image name because i am trying something
        if (!move_uploaded_file($this->image_temp, $this->uploads_folders . $this->newName())) {
            return $this->error = "There was an error, please try again";
        }
    }

    private function set_message($type, $message)
    {
        $_SESSION[$type] = $message;
    }




    public function signUser()
    {
        if ($this->emptyInput() == true) {
            $this->set_message("error", "Fields cannot be empty");
            header("Location: ../index.php?error=emptyfields");
            exit();
        }

        if ($this->userTaken() == false) {
            $this->set_message("error", "User already exists");
            header("Location: ../index.php?error=userTaken");
            exit();
        }
        if ($this->invalidEmail() == false) {
            $this->set_message("error", "Invalid Email format");
            header("Location: ../index.php?error=invalidEmail");
            exit();
        }

        if ($this->invalidlname() == false) {
            $this->set_message("error", "Invalid format");
            header("Location: ../index.php?error=invalidnameformat");
            exit();
        }

        if ($this->passwordLength() == false) {
            $this->set_message("error", "Password should not be less that 8 characters");
            header("Location: ../index.php?error=Passwordtooshort");
            exit();
        }
        // for the image aspect
        $this->isImage();
        $this->imageNameValidation();
        $this->sizeValidation();
        $this->checkFile();
        $this->newName();

        if ($this->error == null) {
            $this->moveFile();
        }
        $this->set_message("success", "Registration successful");
        // Generate 6-digit verification code
        $verificationCode = rand(100000, 999999);

        // set expiration time to 3 minutes
        $expirationTime = date("Y-m-d H:i:s", strtotime('+3 minutes'));



        $this->RegisterUser($this->unique_id, $this->fname, $this->lname, $this->email, $this->password, $this->newName(), $verificationCode, $expirationTime);
    }

    private function sendVerificationEmail($email, $verificationCode)
    {
        $subject = "";
        $message = "";
        $headers = "";

        if (!mail($email, $message, $headers)) {
            $this->set_message("error", "Failed to send verification email");
            header("Location: ../index.php?error=emailfailed");
            exit();
        }
    }

    public function resendVerificationCode($email)
    {
        // check if user exists and get the current code expiration time
        $sql = "SELECT expirationTime FROM users WHERE email = :email";
        $statement = $this->connection()->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            // check if the code is expired
            if (new DateTime($result['expirationTime']) < new DateTime()) {
                //generate a new verification code
                $verificationCode = rand(100000, 999999);

                // set a new expiration date
                $expirationTime = date("Y-m-d H:i:s", strtotime('+3 minutes'));

                // Update verificationCode and expiration time in the database
                $sql = "UPDATE users SET verification_Code = :verificationCode, verification_code_expiration = :expirationTime WHERE email = :email";
                $statement = $this->connection()->prepare($sql);
                $statement->bindParam(':verificationCode', $verificationCode);
                $statement->bindParam(':expirationTime', $expirationTime);
                $statement->bindParam(':email', $email);
                $statement->execute();

                // Resend the verification email
                $this->sendVerificationEmail($email, $verificationCode);
            } else {
                $this->set_message("error", "You can only resend the code after the current one expires.");
            }
        } else {
            $this->set_message("error", "User not found.");
        }
    }

    // public function verifyCode($email, $enteredCode)
    // {
    //     // Check if user exists and get the current verification code and expiration time
    //     $sql = "SELECT verification_code, verification_code_expiration FROM users WHERE email = :email";
    //     $statement = $this->connection()->prepare($sql);
    //     $statement->bindParam(':email', $email);
    //     $statement->execute();
    //     $result = $statement->fetch(PDO::FETCH_ASSOC);

    //     if ($result) {
    //         // Check if the code is expired
    //         if (new DateTime($result['verification_code_expiration']) >= new DateTime()) {
    //             // Check if the entered code matches the stored code
    //             if ($enteredCode == $result['verification_code']) {
    //                 // Code is correct
    //                 $this->set_message("success", "Verification successful.");
    //                 // Mark user as verified (optional)
    //                 // $this->markUserAsVerified($email);
    //             } else {
    //                 // Incorrect code
    //                 $this->set_message("error", "Incorrect verification code.");
    //             }
    //         } else {
    //             // Code is expired
    //             $this->set_message("error", "Verification code has expired. Please request a new one.");
    //         }
    //     } else {
    //         $this->set_message("error", "User not found.");
    //     }
    // }
}
