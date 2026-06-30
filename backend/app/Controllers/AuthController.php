<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function register(): ResponseInterface
    {
        $rules = [
            'nom' => 'required|min_length[2]|max_length[100]',
            'prenom' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(422);
        }

        $userModel = new UserModel();
        $data = [
            'nom' => $this->request->getVar('nom'),
            'prenom' => $this->request->getVar('prenom'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password')
        ];

        $userId = $userModel->insert($data);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Utilisateur créé avec succès',
            'user' => [
                'id' => $userId,
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email']
            ]
        ])->setStatusCode(201);
    }

    public function login(): ResponseInterface
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(422);
        }

        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $userModel->findByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Email ou mot de passe incorrect'
            ])->setStatusCode(401);
        }

        $session = session();
        $session->set([
            'user_id' => $user['id'],
            'email' => $user['email'],
            'nom' => $user['nom'],
            'prenom' => $user['prenom'],
            'logged_in' => true
        ]);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Connexion réussie',
            'user' => [
                'id' => $user['id'],
                'nom' => $user['nom'],
                'prenom' => $user['prenom'],
                'email' => $user['email']
            ]
        ]);
    }

    public function logout(): ResponseInterface
    {
        $session = session();
        $session->destroy();

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Déconnexion réussie'
        ]);
    }
}