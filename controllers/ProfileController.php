<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 06-Mar-21
 * Time: 22:36
 */

namespace app\controllers;


use emcodepro\mvc\Controller;

class ProfileController extends Controller
{
    public function behaviors(): array
    {
        return [
            self::ACCESS_BEHAVIOR => [
                'actions' => ['settings', 'profile'],
                'rule' => [self::RULE_AUTHORIZED]
            ]
        ];
    }

    public function settings()
    {
        return $this->render('settings');
    }
}