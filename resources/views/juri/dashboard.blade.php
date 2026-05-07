<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $pageTitle ?? 'Dashboard Juri' }} - Festival Layang-Layang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Poppins', sans-serif; background: #060e1a; color: #fff; min-height: 100vh; display: flex; }
        a { text-decoration: none; }

        .sidebar {
            width: 230px;
            background: #0b1a30;
            border-right: 1px solid rgba(255,255,255,0.06);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: sticky;
            top: 0;
        }
        .sb-logo { padding: 22px; border-bottom: 1px solid rgba(255,255,255,0.06); }
        .sb-logo-link { color: inherit; display: block; }
        .sb-brand { font-size: 14px; font-weight: 700; color: #ffd700; letter-spacing: 1.5px; }
        .sb-sub { font-size: 10px; color: rgba(255,255,255,0.32); margin-top: 3px; }
        .sb-section {
            font-size: 9px;
            font-weight: 700;
            color: rgba(255,255,255,0.22);
            letter-spacing: 1.8px;
            text-transform: uppercase;
            padding: 14px 20px 6px;
        }
        .sb-nav { list-style: none; padding: 0 10px; }
        .sb-nav li { margin-bottom: 4px; }
        .sb-nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 13px;
            border-radius: 8px;
            color: rgba(255,255,255,0.55);
            font-size: 12px;
            transition: .15s;
        }
        .sb-nav a:hover { color: #fff; background: rgba(255,255,255,0.05); }
        .sb-nav a.active { color: #ffd700; background: rgba(255,215,0,0.08); font-weight: 600; }
        .sb-nav svg { width: 15px; height: 15px; flex-shrink: 0; }
        .sb-user {
            margin-top: auto;
            padding: 16px 20px;
            border-top: 1px solid rgba(255,255,255,0.06);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .sb-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(255,215,0,0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
            color: #ffd700;
        }
        .sb-un { font-size: 12px; font-weight: 600; }
        .sb-ur { font-size: 10px; color: rgba(255,255,255,0.32); margin-top: 2px; }

        .main { flex: 1; display: flex; flex-direction: column; min-width: 0; }
        .topbar {
            background: #0b1a30;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            padding: 16px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .topbar-main {
            min-width: 0;
        }
        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .mobile-toggle {
            display: none;
            width: 42px;
            height: 42px;
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,0.12);
            background: rgba(255,255,255,0.04);
            color: #fff;
            font-size: 20px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }
        .tb-title { font-size: 16px; font-weight: 700; }
        .tb-sub { font-size: 11px; color: rgba(255,255,255,0.34); margin-top: 2px; }
        .logout-btn {
            background: rgba(239,68,68,0.12);
            border: 1px solid rgba(239,68,68,0.3);
            color: #f87171;
            font-size: 12px;
            font-weight: 600;
            padding: 9px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }
        .logout-btn:hover { background: rgba(239,68,68,0.2); }
        .content { padding: 28px; }
        .mobile-panel {
            display: none;
            padding: 16px 28px 0;
        }
        .mobile-panel.open {
            display: block;
        }
        .mobile-card {
            background: #0b1a30;
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 14px;
            padding: 14px;
        }
        .mobile-user {
            padding-bottom: 12px;
            margin-bottom: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .mobile-user-name {
            font-size: 13px;
            font-weight: 600;
        }
        .mobile-user-role {
            font-size: 11px;
            color: rgba(255,255,255,0.38);
            margin-top: 2px;
        }
        .mobile-links {
            display: grid;
            gap: 10px;
        }
        .mobile-link {
            display: block;
            width: 100%;
            padding: 12px 14px;
            border-radius: 10px;
            color: rgba(255,255,255,0.8);
            background: rgba(255,255,255,0.04);
            font-size: 12px;
            font-weight: 600;
        }
        .mobile-link.active {
            color: #ffd700;
            background: rgba(255,215,0,0.08);
            border: 1px solid rgba(255,215,0,0.16);
        }
        .mobile-panel .logout-btn {
            width: 100%;
            margin-top: 12px;
        }

        .flash {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 20px;
        }
        .flash-success { background: rgba(34,197,94,0.1); border: 1px solid rgba(34,197,94,0.3); color: #4ade80; }
        .flash-error { background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.3); color: #f87171; }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-bottom: 22px;
        }
        .card, .panel {
            background: #0b1a30;
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 14px;
        }
        .card { padding: 18px 20px; }
        .stat-label {
            font-size: 10px;
            font-weight: 600;
            color: rgba(255,255,255,0.35);
            letter-spacing: 1.1px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }
        .stat-value { font-size: 28px; font-weight: 700; margin-bottom: 8px; }
        .stat-badge {
            display: inline-block;
            font-size: 10px;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 999px;
        }
        .bg-blue { background: rgba(59,130,246,0.12); color: #60a5fa; }
        .bg-green { background: rgba(34,197,94,0.12); color: #4ade80; }
        .bg-gold { background: rgba(255,215,0,0.12); color: #ffd700; }

        .panel-head {
            padding: 14px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .panel-title { font-size: 13px; font-weight: 600; }
        .panel-tag { font-size: 10px; color: rgba(255,255,255,0.32); }
        .panel-body { padding: 20px; }

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }
        .quick-card {
            display: block;
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 12px;
            padding: 18px;
            color: #fff;
            transition: .15s;
        }
        .quick-card:hover {
            border-color: rgba(255,215,0,0.35);
            background: rgba(255,215,0,0.05);
        }
        .quick-card-title { font-size: 13px; font-weight: 700; margin-bottom: 6px; }
        .quick-card-desc { font-size: 11px; line-height: 1.6; color: rgba(255,255,255,0.45); }

        .karya-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 16px;
        }
        .karya-card {
            background: #0b1a30;
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 14px;
            overflow: hidden;
            transition: border-color .15s;
        }
        .karya-card:hover { border-color: rgba(255,215,0,0.25); }
        .karya-image, .karya-image-empty {
            width: 100%;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #16335f;
        }
        .karya-image { object-fit: cover; }
        .karya-image-empty { color: #ffd700; font-size: 12px; font-weight: 700; }
        .karya-body { padding: 18px; }
        .karya-title { font-size: 14px; font-weight: 700; margin-bottom: 4px; }
        .karya-owner { font-size: 11px; color: rgba(255,255,255,0.4); margin-bottom: 14px; }
        .karya-divider { height: 1px; background: rgba(255,255,255,0.06); margin-bottom: 14px; }

        .existing-score {
            background: rgba(255,215,0,0.08);
            border: 1px solid rgba(255,215,0,0.18);
            border-radius: 8px;
            padding: 10px 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 14px;
        }
        .existing-score-label { font-size: 11px; color: rgba(255,255,255,0.5); }
        .existing-score-value { font-size: 18px; font-weight: 700; color: #ffd700; }

        .nilai-label {
            font-size: 10px;
            font-weight: 600;
            color: rgba(255,255,255,0.35);
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
        .nilai-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 14px;
        }
        .nilai-field label {
            display: block;
            font-size: 10px;
            color: rgba(255,255,255,0.45);
            margin-bottom: 5px;
        }
        .nilai-field input {
            width: 100%;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 8px;
            padding: 9px 10px;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            outline: none;
        }
        .nilai-field input:focus { border-color: rgba(255,215,0,0.45); }
        .nilai-submit {
            width: 100%;
            background: #ffd700;
            color: #5a3a00;
            border: none;
            border-radius: 8px;
            padding: 11px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }
        .nilai-submit:hover { background: #ffe94d; }

        .rank-head, .rank-row {
            display: grid;
            grid-template-columns: 56px 1fr 90px 80px;
            gap: 12px;
            align-items: center;
            padding: 12px 20px;
        }
        .rank-head {
            font-size: 10px;
            font-weight: 600;
            color: rgba(255,255,255,0.3);
            letter-spacing: 1px;
            text-transform: uppercase;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .rank-row { border-top: 1px solid rgba(255,255,255,0.05); }
        .rank-row:first-of-type { border-top: none; }
        .rank-num { font-size: 16px; font-weight: 700; }
        .rank-name { font-size: 12px; font-weight: 600; }
        .rank-title { font-size: 10px; color: rgba(255,255,255,0.35); margin-top: 2px; }
        .rank-karya, .rank-score { text-align: right; font-size: 11px; }
        .rank-score strong { font-size: 15px; }

        .empty-state {
            padding: 28px;
            text-align: center;
            font-size: 12px;
            color: rgba(255,255,255,0.3);
        }

        @media (max-width: 1024px) {
            .quick-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 768px) {
            body { display: block; }
            .sidebar { display: none; }
            .main { width: 100%; }
            .topbar {
                padding: 16px;
                gap: 12px;
                align-items: flex-start;
            }
            .topbar-main { flex: 1; }
            .tb-title {
                font-size: 15px;
                line-height: 1.35;
            }
            .tb-sub {
                font-size: 10px;
                line-height: 1.5;
                max-width: 100%;
            }
            .topbar-actions {
                margin-left: auto;
                flex-shrink: 0;
            }
            .mobile-toggle {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 42px;
                padding: 0 14px;
                font-size: 12px;
                font-weight: 600;
            }
            .topbar .logout-form {
                display: none;
            }
            .mobile-panel {
                padding: 16px 16px 0;
            }
            .content { padding: 16px; }
            .stats-grid { grid-template-columns: 1fr; }
            .panel-head {
                padding: 14px 16px;
                gap: 10px;
                align-items: flex-start;
                flex-direction: column;
            }
            .panel-body { padding: 16px; }
            .karya-grid { grid-template-columns: 1fr; }
            .nilai-grid { grid-template-columns: 1fr; }
            .nilai-field input {
                font-size: 16px;
            }
            .existing-score {
                align-items: flex-start;
                flex-direction: column;
            }
            .rank-head {
                display: none;
            }
            .rank-row {
                grid-template-columns: 40px 1fr;
                gap: 14px;
                padding: 16px;
            }
            .rank-row div:nth-child(3) { display: none; }
            .rank-score {
                grid-column: 2 / 3;
                text-align: left;
            }
        }
    </style>
</head>
<body>
@php
    $activePage = $activePage ?? 'dashboard';
    $totalKarya = $karya->count();
    $sudahDinilai = $karya->filter(fn ($item) => $item->penilaian->where('juri_id', auth()->id())->isNotEmpty())->count();
    $belumDinilai = $totalKarya - $sudahDinilai;
@endphp

<div class="sidebar">
    <div class="sb-logo">
        <a href="{{ route('juri.dashboard') }}" class="sb-logo-link">
            <div class="sb-brand">FESTIVAL</div>
            <div class="sb-sub">Panel Juri</div>
        </a>
    </div>

    <div class="sb-section">Menu Utama</div>
    <ul class="sb-nav">
        <li>
            <a href="{{ route('juri.dashboard') }}" class="{{ $activePage === 'dashboard' ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><rect x="1" y="1" width="6" height="6" rx="1"/><rect x="9" y="1" width="6" height="6" rx="1"/><rect x="1" y="9" width="6" height="6" rx="1"/><rect x="9" y="9" width="6" height="6" rx="1"/></svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('juri.karya') }}" class="{{ $activePage === 'karya' ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M2 4h12v1H2zm0 4h12v1H2zm0 4h8v1H2z"/></svg>
                Daftar Karya
            </a>
        </li>
        <li>
            <a href="{{ route('juri.ranking') }}" class="{{ $activePage === 'ranking' ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 1l1.8 4.5H15l-3.9 2.8 1.5 4.7L8 10.2l-4.6 2.8 1.5-4.7L1 5.5h5.2z"/></svg>
                Ranking
            </a>
        </li>
    </ul>

    <div class="sb-user">
        <div class="sb-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'JR', 0, 2)) }}</div>
        <div>
            <div class="sb-un">{{ auth()->user()->name ?? 'Juri' }}</div>
            <div class="sb-ur">Juri Penilai</div>
        </div>
    </div>
</div>

<div class="main">
    <div class="topbar">
        <div class="topbar-main">
            <div class="tb-title">{{ $pageTitle ?? 'Dashboard Juri' }}</div>
            <div class="tb-sub">Festival Layang-Layang Nusantara 2026 - SMKN 1 Wonosobo</div>
        </div>
        <div class="topbar-actions">
            <button type="button" class="mobile-toggle" id="mobileMenuToggle" aria-expanded="false" aria-controls="mobileMenu">Menu</button>
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn" onclick="return confirm('Yakin ingin logout?')">Logout</button>
            </form>
        </div>
    </div>

    <div class="mobile-panel" id="mobileMenu">
        <div class="mobile-card">
            <div class="mobile-user">
                <div class="mobile-user-name">{{ auth()->user()->name ?? 'Juri' }}</div>
                <div class="mobile-user-role">Juri Penilai</div>
            </div>
            <div class="mobile-links">
                <a href="{{ route('juri.dashboard') }}" class="mobile-link {{ $activePage === 'dashboard' ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('juri.karya') }}" class="mobile-link {{ $activePage === 'karya' ? 'active' : '' }}">Daftar Karya</a>
                <a href="{{ route('juri.ranking') }}" class="mobile-link {{ $activePage === 'ranking' ? 'active' : '' }}">Ranking</a>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn" onclick="return confirm('Yakin ingin logout?')">Logout</button>
            </form>
        </div>
    </div>

    <div class="content">
        @if(session('success'))
            <div class="flash flash-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="flash flash-error">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="flash flash-error">{{ $errors->first() }}</div>
        @endif

        <div class="stats-grid">
            <div class="card">
                <div class="stat-label">Total Karya</div>
                <div class="stat-value">{{ $totalKarya }}</div>
                <span class="stat-badge bg-blue">Masuk</span>
            </div>
            <div class="card">
                <div class="stat-label">Sudah Dinilai</div>
                <div class="stat-value">{{ $sudahDinilai }}</div>
                <span class="stat-badge bg-green">Selesai</span>
            </div>
            <div class="card">
                <div class="stat-label">Belum Dinilai</div>
                <div class="stat-value">{{ $belumDinilai }}</div>
                <span class="stat-badge bg-gold">Menunggu</span>
            </div>
        </div>

        @if($activePage === 'dashboard')
            <div class="panel">
                <div class="panel-head">
                    <div class="panel-title">Ringkasan Juri</div>
                    <div class="panel-tag">Setiap menu sekarang dibuka sebagai halaman terpisah</div>
                </div>
                <div class="panel-body">
                    <div class="quick-grid">
                        <a href="{{ route('juri.karya') }}" class="quick-card">
                            <div class="quick-card-title">Daftar Karya</div>
                            <div class="quick-card-desc">Lihat karya peserta dan isi nilai pada halaman karya yang fokus untuk penilaian.</div>
                        </a>
                        <a href="{{ route('juri.ranking') }}" class="quick-card">
                            <div class="quick-card-title">Ranking Peserta</div>
                            <div class="quick-card-desc">Pantau urutan nilai sementara tanpa bercampur dengan form penilaian.</div>
                        </a>
                        <a href="{{ route('juri.karya') }}" class="quick-card">
                            <div class="quick-card-title">Lanjut Menilai</div>
                            <div class="quick-card-desc">Kembali ke daftar karya untuk melanjutkan penilaian yang belum selesai.</div>
                        </a>
                    </div>
                </div>
            </div>
        @endif

        @if($activePage === 'karya')
            @if($karya->isEmpty())
                <div class="panel">
                    <div class="empty-state">Belum ada karya yang masuk untuk dinilai</div>
                </div>
            @else
                <div class="karya-grid">
                    @foreach($karya as $item)
                        @php
                            $nilaiKu = $item->penilaian->firstWhere('juri_id', auth()->id());
                        @endphp
                        <div class="karya-card">
                            @if($item->file)
                                <img class="karya-image" src="{{ asset('storage/' . $item->file) }}" alt="{{ $item->judul }}">
                            @else
                                <div class="karya-image-empty">KARYA</div>
                            @endif

                            <div class="karya-body">
                                <div class="karya-title">{{ $item->judul }}</div>
                                <div class="karya-owner">{{ $item->user->name ?? '-' }}</div>

                                <div class="karya-divider"></div>

                                @if($nilaiKu)
                                    <div class="existing-score">
                                        <div class="existing-score-label">Nilai kamu sudah tersimpan</div>
                                        <div class="existing-score-value">{{ $nilaiKu->total }}</div>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('juri.nilai', $item->id) }}">
                                    @csrf
                                    <div class="nilai-label">{{ $nilaiKu ? 'Perbarui Nilai' : 'Input Nilai' }}</div>

                                    <div class="nilai-grid">
                                        <div class="nilai-field">
                                            <label>Kreativitas</label>
                                            <input type="number" name="kreativitas" min="0" max="100" value="{{ $nilaiKu->kreativitas ?? '' }}" required>
                                        </div>
                                        <div class="nilai-field">
                                            <label>Keindahan</label>
                                            <input type="number" name="keindahan" min="0" max="100" value="{{ $nilaiKu->keindahan ?? '' }}" required>
                                        </div>
                                        <div class="nilai-field">
                                            <label>Keunikan</label>
                                            <input type="number" name="keunikan" min="0" max="100" value="{{ $nilaiKu->keunikan ?? '' }}" required>
                                        </div>
                                    </div>

                                    <button type="submit" class="nilai-submit">{{ $nilaiKu ? 'Perbarui Nilai' : 'Simpan Nilai' }}</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endif

        @if($activePage === 'ranking')
            <div class="panel">
                <div class="panel-head">
                    <div class="panel-title">Ranking Peserta</div>
                    <div class="panel-tag">Berdasarkan total penilaian juri</div>
                </div>
                <div class="rank-head">
                    <div>#</div>
                    <div>Peserta</div>
                    <div style="text-align:right">Karya</div>
                    <div style="text-align:right">Nilai</div>
                </div>
                @forelse($ranking as $index => $item)
                    @php $no = $index + 1; @endphp
                    <div class="rank-row">
                        <div class="rank-num">{{ $no }}</div>
                        <div>
                            <div class="rank-name">{{ $item->user->name ?? '-' }}</div>
                            <div class="rank-title">{{ $item->judul }}</div>
                        </div>
                        <div class="rank-karya">{{ optional($item->user)->karya()->count() ?? 0 }} karya</div>
                        <div class="rank-score"><strong>{{ $item->penilaian_sum_total ?? 0 }}</strong><br><span style="color:rgba(255,255,255,0.35);font-size:10px;">poin</span></div>
                    </div>
                @empty
                    <div class="empty-state">Belum ada data penilaian</div>
                @endforelse
            </div>
        @endif
    </div>
</div>
<script>
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function () {
            const isOpen = mobileMenu.classList.toggle('open');
            mobileMenuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
    }
</script>
</body>
</html>
