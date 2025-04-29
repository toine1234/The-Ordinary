<?php
namespace App\Validators;

class SignupValidation{

    private $errors = [];
    private $errorPass = "";
    private $errorComfirm = "";
    private $phone = "";
    private $email = "";
    private $count = 0;
    public function Validate(string $email, string $password, $phone, $comfirmPassword) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $this->email = "Email is invalid";
            $this->count +=1;
        }

        if (strlen($password) < 8){
            $this->errorPass = "Password is invalid";
            $this->count +=1;
        }

        if (preg_match("/^(03|05|07|08|09)\d{8}$/", $phone) == 0){
            $this->phone = "Phone is invalid";
            $this->count +=1;
        }

        if ($comfirmPassword != $password) {
            $this->errorComfirm = "Confirm Password is not match";
            $this->count +=1;
        }

        $this->errors = [
            "comfirmPass"=> $this->errorComfirm,
            "Pass"=>$this->errorPass,
            "phone"=>$this->phone,
            "email"=> $this->email,
            "count"=> $this->count
        ];
        
        return $this->errors;
    }
}