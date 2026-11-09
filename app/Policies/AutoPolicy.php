<?php

namespace App\Policies;

use App\Models\Auto;
use App\Models\User;

class AutoPolicy
{
    // El catálogo es público: permitimos usuario nulo (visitante)
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Auto $auto): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->esAdmin();
    }

    public function update(User $user, Auto $auto): bool
    {
        return $user->esAdmin();
    }

    public function delete(User $user, Auto $auto): bool
    {
        return $user->esAdmin();
    }

    public function restore(User $user, Auto $auto): bool
    {
        return $user->esAdmin();
    }

    public function forceDelete(User $user, Auto $auto): bool
    {
        return false; // nadie borra definitivamente
    }
}
