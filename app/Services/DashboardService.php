<?php

namespace App\Services;

class DashboardService
{
    public function getDashboard($user)
    {
        return match ($user['role_key']) {
            'superadmin' => $this->superadmin(),
            'admincabang' => $this->cabang($user),
            default => $this->simple(),
        };
    }

    protected function superadmin()
    {
        return [
            'title' => 'Dashboard Super Admin',
            'cards' => [
                'cabang' => 30,
                'sapi' => 120,
                'kambing' => 340,
            ]
        ];
    }

    protected function cabang($user)
    {
        return [
            'title' => 'Dashboard Cabang',
            'cabang' => $user['cabang'],
        ];
    }

    protected function simple()
    {
        return ['title' => 'Dashboard'];
    }
}
