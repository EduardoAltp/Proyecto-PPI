<?php

namespace App\Policies;

use App\Models\Cita;
use App\Models\User;

class CitaPolicy
{
    // Admin ve todas; cliente solo las suyas (el controlador filtra la consulta)
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Cita $cita): bool
    {
        return $user->esAdmin() || $cita->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return ! $user->esAdmin(); // los clientes agendan
    }

    // Reprogramar: solo el dueño, y solo si sigue activa
    public function update(User $user, Cita $cita): bool
    {
        return $cita->user_id === $user->id
            && in_array($cita->estatus, ['pendiente', 'confirmada']);
    }

    // Cancelar: solo el dueño
    public function delete(User $user, Cita $cita): bool
    {
        return $cita->user_id === $user->id
            && in_array($cita->estatus, ['pendiente', 'confirmada']);
    }

    // Cambiar estatus (pendiente, confirmada, cancelada, realizada): solo admin
    public function cambiarEstatus(User $user, Cita $cita): bool
    {
        return $user->esAdmin();
    }
}