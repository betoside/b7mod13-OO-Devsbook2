<?php
class User {
    public $id;
    public $email;
    public $password;
    public $name;
    public $birthdate;
    public $city;
    public $work;
    public $avatar;
    public $cover;
    public $token;
    public $ageYears;
    public $followers;
    public $following;
    public $photos;
    
}

interface UserDAO {
    public function findByToken($token);
    public function findByemail($email);
    public function findByName($name);
    public function findById($id);
    public function update(User $u);
    public function insert(User $u);
}