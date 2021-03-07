<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 04-Mar-21
 * Time: 21:39
 */

namespace app\controllers;

use emcodepro\mvc\Application;
use emcodepro\mvc\Controller;
use emcodepro\mvc\Request;
use emcodepro\mvc\Response;
use app\models\LoginForm;
use app\models\User;

class SiteController extends Controller
{
    public function index()
    {
        return $this->render('index');
    }

    public function about()
    {
        return $this->render('about', [
            'model' => 1
        ]);
    }

    public function register(Request $request, Response $response)
    {
        $model = new User();

        if($request->isPost()){
            $model->load($request->requestBody());
            if($model->validate() && $model->save()){
                Application::$app->session->setFlash('success', 'Thanks for registering');
                $response->redirect('/');
            }
        }
        return $this->render('register', [
            'model' => $model
        ]);
    }

    public function login(Request $request, Response $response)
    {
        $model = new LoginForm();

        if($request->isPost()){
            $model->load($request->requestBody());
            if($model->validate() && $model->login()){
                $response->redirect('/');
            }
        }

        return $this->render('login', [
            'model' => $model
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');

    }
}