<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 06-Mar-21
 * Time: 20:19
 */

namespace app\models;


use emcodepro\mvc\Application;
use emcodepro\mvc\Model;

class LoginForm extends Model
{
    public $email;
    public $username;
    public $password;

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Password'
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);

        if(!$user){
            $this->addError('email', 'User does not exists with this email');
            return false;
        }

        if($this->password !== $user->password){
            $this->addError('password', 'Password is incorrect');
            return false;
        }

        return Application::$app->login($user);
    }
}