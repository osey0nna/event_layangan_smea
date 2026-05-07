<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PesertaController extends Controller
{
    protected function getDashboardData(): array
    {
        return [
            'karya' => Karya::where('user_id', Auth::id())->get(),
            'rankingAll' => Karya::with('user')
                ->withSum('penilaian', 'total')
                ->orderByRaw('penilaian_sum_total IS NULL ASC')
                ->orderByDesc('penilaian_sum_total')
                ->get(),
        ];
    }

    protected function renderPage(string $activePage, string $pageTitle)
    {
        return view('peserta.dashboard', [
            ...$this->getDashboardData(),
            'activePage' => $activePage,
            'pageTitle' => $pageTitle,
        ]);
    }

    public function dashboard()
    {
        return $this->renderPage('dashboard', 'Dashboard Peserta');
    }

    public function uploadPage()
    {
        return $this->renderPage('upload', 'Upload Karya');
    }

    public function karya()
    {
        return $this->renderPage('karya', 'Karya Saya');
    }

    public function ranking()
    {
        return $this->renderPage('ranking', 'Ranking Peserta');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file'  => 'required|image|mimes:jpg,jpeg,png|max:10240',
            'judul' => 'required|string|max:255',
        ]);

        $path = null;

        try {
            DB::beginTransaction();

            $path = $request->file('file')->store('karya', 'public');

            Karya::create([
                'user_id' => auth()->id(),
                'judul'   => $request->judul,
                'file'    => $path,
            ]);

            DB::commit();

            return back()->with('success', 'Karya berhasil diupload!');
        } catch (\Throwable $th) {
            DB::rollBack();

            if ($path && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }

            report($th);

            return back()
                ->withInput()
                ->with('error', 'Upload gagal disimpan ke database. Silakan coba lagi.');
        }
    }

    public function delete($id)
    {
        $karya = Karya::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($karya->file && Storage::disk('public')->exists($karya->file)) {
            Storage::disk('public')->delete($karya->file);
        }

        $karya->delete();

        return back()->with('success', 'Karya berhasil dihapus');
    }
}
