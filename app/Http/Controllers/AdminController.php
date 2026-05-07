<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\User;

class AdminController extends Controller
{
    protected function getDashboardData(): array
    {
        return [
            'users' => User::where('role', 'peserta')->get(),
            'karya' => Karya::with('user')->get(),
            'ranking' => Karya::with('user')
                ->withSum('penilaian', 'total')
                ->orderByDesc('penilaian_sum_total')
                ->get(),
        ];
    }

    protected function renderPage(string $activePage, string $pageTitle)
    {
        return view('admin.dashboard', [
            ...$this->getDashboardData(),
            'activePage' => $activePage,
            'pageTitle' => $pageTitle,
        ]);
    }

    public function dashboard()
    {
        return $this->renderPage('dashboard', 'Dashboard Admin');
    }

    public function peserta()
    {
        return $this->renderPage('peserta', 'Kelola Peserta');
    }

    public function karya()
    {
        return $this->renderPage('karya', 'Kelola Karya');
    }

    public function ranking()
    {
        return $this->renderPage('ranking', 'Ranking Peserta');
    }

    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->is_approved = true;
        $user->save();

        return back()->with('success', 'Peserta berhasil di-ACC');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Peserta berhasil dihapus');
    }
}
