<?php

    namespace App\Services;
    use App\Models\User;

    class UserService
    {

        public function get($cpf = null) {
            if ($cpf) {
                return User::get($cpf);
            } else {
                return User::getAll();
            }
        }

        public function post() {
            
        }

        public function update() {

        }

        public function delete() {

        }

    }