<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class JuriController extends Controller
{
    protected function getDashboardData(): array
    {
        return [
            'karya' => Karya::with(['user', 'penilaian'])->get(),
            'ranking' => Karya::with('user')
                ->withSum('penilaian', 'total')
                ->orderByRaw('penilaian_sum_total IS NULL ASC')
                ->orderByDesc('penilaian_sum_total')
                ->get(),
        ];
    }

    protected function renderPage(string $activePage, string $pageTitle)
    {
        return view('juri.dashboard', [
            ...$this->getDashboardData(),
            'activePage' => $activePage,
            'pageTitle' => $pageTitle,
        ]);
    }

    public function dashboard()
    {
        return $this->renderPage('dashboard', 'Dashboard Juri');
    }

    public function karya()
    {
        return $this->renderPage('karya', 'Daftar Karya');
    }

    public function ranking()
    {
        return $this->renderPage('ranking', 'Ranking Peserta');
    }

    public function simpanNilai(Request $request, $karya_id)
    {
        $request->validate([
            'kreativitas' => 'required|numeric|min:0|max:100',
            'keindahan'   => 'required|numeric|min:0|max:100',
            'keunikan'    => 'required|numeric|min:0|max:100',
        ]);

        $total = $request->kreativitas + $request->keindahan + $request->keunikan;
        $karya = Karya::findOrFail($karya_id);

        Penilaian::updateOrCreate(
            [
                'karya_id' => $karya->id,
                'juri_id'  => auth()->id(),
            ],
            [
                'kreativitas' => $request->kreativitas,
                'keindahan'   => $request->keindahan,
                'keunikan'    => $request->keunikan,
                'total'       => $total,
            ]
        );

        return back()->with('success', "Nilai karya \"{$karya->judul}\" berhasil disimpan! Total: {$total}");
    }
}
