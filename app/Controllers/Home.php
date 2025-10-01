<?php namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $session = session();

        // kalau belum login, langsung redirect
        if (! $session->get('logged_in')) {
            return redirect()->to('/login');
        }

        // tampilkan dashboard dengan layout main
        return view('layouts/main', [
            'page' => view('home/dashboard', [
                'full_name' => $session->get('full_name')
            ])
        ]);
    }
}