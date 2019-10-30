<?php

namespace App\Observers;

class UserObserver
{
    // Quando está criando
    public function creating($user){
        Log::info("User {$user->email} will be registered");
    }

        // Quando foi criado
    public function created($user){
        Log::info("User {$user->email} has be registered successfully");
        Mail::to($user)->send(new UserRegistered($user));
    }

    // Quando está atualizando
    public function updating($user){
        Log::info("User {$user->email} will be updated");
    }

    // Quando foi atualizado
    public function updated($user){
        Log::info("User {$user->email} has be updated successfully");
    }

    // Quando está criando ou atualizando
    public function saving($user){
        Log::info("User {$user->email} will be updated");
    }

    // Quando foi criado ou atualizado
    public function saved($user){
        Log::info("User {$user->email} has be updated successfully");
    }
}
