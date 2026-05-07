<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $pageTitle ?? 'Dashboard Peserta' }} - Festival Layang-Layang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Poppins', sans-serif; background: #0a1628; color: #fff; min-height: 100vh; display: flex; }
        a { text-decoration: none; }

        .sidebar {
            width: 230px;
            background: #0d1e38;
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
            background: #1a3a6e;
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
            background: #0d1e38;
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
            background: #0d1e38;
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
            background: #0d1e38;
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
        .bg-gold { background: rgba(255,215,0,0.12); color: #ffd700; }
        .bg-green { background: rgba(34,197,94,0.12); color: #4ade80; }

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

        .upload-zone {
            position: relative;
            background: rgba(255,255,255,0.03);
            border: 1.5px dashed rgba(255,255,255,0.15);
            border-radius: 10px;
            padding: 24px 20px;
            text-align: center;
            margin-bottom: 14px;
            cursor: pointer;
            transition: .2s;
            overflow: hidden;
        }
        .upload-zone:hover { border-color: rgba(255,215,0,0.5); background: rgba(255,215,0,0.04); }
        .upload-zone.has-file { border-color: rgba(255,215,0,0.4); background: rgba(255,215,0,0.04); }
        .upload-zone input[type="file"] {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
            font-size: 0;
        }
        .upload-icon { font-size: 30px; margin-bottom: 8px; }
        .upload-text { font-size: 12px; color: rgba(255,255,255,0.55); margin-bottom: 4px; }
        .upload-hint { font-size: 10px; color: rgba(255,255,255,0.25); }
        .upload-filename { font-size: 11px; color: #ffd700; margin-top: 8px; font-weight: 600; display: none; }
        .form-input {
            width: 100%;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 8px;
            padding: 11px 14px;
            color: #fff;
            font-size: 12px;
            font-family: 'Poppins', sans-serif;
            outline: none;
            margin-bottom: 12px;
        }
        .form-input:focus { border-color: rgba(255,215,0,0.45); }
        .form-input::placeholder { color: rgba(255,255,255,0.28); }
        .submit-btn {
            width: 100%;
            background: #ffd700;
            color: #5a3a00;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }
        .submit-btn:hover { background: #ffe94d; }
        .submit-btn:disabled { opacity: 0.6; cursor: not-allowed; }

        .karya-list { display: grid; gap: 12px; }
        .karya-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 16px 20px;
            border-top: 1px solid rgba(255,255,255,0.05);
        }
        .karya-item:first-child { border-top: none; }
        .karya-thumb, .karya-thumb-empty {
            width: 56px;
            height: 56px;
            border-radius: 10px;
            flex-shrink: 0;
        }
        .karya-thumb { object-fit: cover; }
        .karya-thumb-empty {
            background: #1a3a6e;
            color: #ffd700;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
        }
        .karya-name { font-size: 12px; font-weight: 600; }
        .karya-date { font-size: 10px; color: rgba(255,255,255,0.35); margin-top: 3px; }
        .karya-status {
            margin-left: auto;
            font-size: 10px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 999px;
            white-space: nowrap;
        }
        .status-ok { background: rgba(34,197,94,0.12); color: #4ade80; }
        .status-pending { background: rgba(251,191,36,0.12); color: #fbbf24; }

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
        .rank-highlight { background: rgba(255,215,0,0.05); border-left: 2px solid #ffd700; }
        .rank-num { font-size: 16px; font-weight: 700; }
        .rank-name { font-size: 12px; font-weight: 600; }
        .rank-title { font-size: 10px; color: rgba(255,255,255,0.35); margin-top: 2px; }
        .rank-karya, .rank-score { text-align: right; font-size: 11px; }
        .rank-score strong { font-size: 15px; }
        .you-badge {
            display: inline-block;
            margin-left: 6px;
            padding: 2px 6px;
            border-radius: 999px;
            font-size: 9px;
            font-weight: 700;
            background: rgba(255,215,0,0.15);
            color: #ffd700;
            vertical-align: middle;
        }

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
            .form-input,
            .nilai-field input {
                font-size: 16px;
            }
            .upload-zone {
                padding: 22px 16px;
            }
            .karya-item {
                padding: 16px;
                align-items: flex-start;
                flex-wrap: wrap;
            }
            .karya-status {
                margin-left: 0;
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
    $myRank = $rankingAll->search(fn ($item) => $item->user_id === auth()->id());
    $myRank = $myRank !== false ? $myRank + 1 : '-';
    $myScore = $rankingAll->firstWhere('user_id', auth()->id())?->penilaian_sum_total ?? 0;
@endphp

<div class="sidebar">
    <div class="sb-logo">
        <a href="{{ route('peserta.dashboard') }}" class="sb-logo-link">
            <div class="sb-brand">FESTIVAL</div>
            <div class="sb-sub">Panel Peserta</div>
        </a>
    </div>

    <div class="sb-section">Menu Utama</div>
    <ul class="sb-nav">
        <li>
            <a href="{{ route('peserta.dashboard') }}" class="{{ $activePage === 'dashboard' ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><rect x="1" y="1" width="6" height="6" rx="1"/><rect x="9" y="1" width="6" height="6" rx="1"/><rect x="1" y="9" width="6" height="6" rx="1"/><rect x="9" y="9" width="6" height="6" rx="1"/></svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('peserta.upload.page') }}" class="{{ $activePage === 'upload' ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 2l3 3H9v4H7V5H5l3-3zm-5 9h10v2H3z"/></svg>
                Upload Karya
            </a>
        </li>
        <li>
            <a href="{{ route('peserta.karya') }}" class="{{ $activePage === 'karya' ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M2 4h12v1H2zm0 4h12v1H2zm0 4h8v1H2z"/></svg>
                Karya Saya
            </a>
        </li>
        <li>
            <a href="{{ route('peserta.ranking') }}" class="{{ $activePage === 'ranking' ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 1l1.8 4.5H15l-3.9 2.8 1.5 4.7L8 10.2l-4.6 2.8 1.5-4.7L1 5.5h5.2z"/></svg>
                Ranking
            </a>
        </li>
    </ul>

    <div class="sb-user">
        <div class="sb-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'PS', 0, 2)) }}</div>
        <div>
            <div class="sb-un">{{ auth()->user()->name ?? 'Peserta' }}</div>
            <div class="sb-ur">Peserta</div>
        </div>
    </div>
</div>

<div class="main">
    <div class="topbar">
        <div class="topbar-main">
            <div class="tb-title">{{ $pageTitle ?? 'Dashboard Peserta' }}</div>
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
                <div class="mobile-user-name">{{ auth()->user()->name ?? 'Peserta' }}</div>
                <div class="mobile-user-role">Peserta</div>
            </div>
            <div class="mobile-links">
                <a href="{{ route('peserta.dashboard') }}" class="mobile-link {{ $activePage === 'dashboard' ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('peserta.upload.page') }}" class="mobile-link {{ $activePage === 'upload' ? 'active' : '' }}">Upload Karya</a>
                <a href="{{ route('peserta.karya') }}" class="mobile-link {{ $activePage === 'karya' ? 'active' : '' }}">Karya Saya</a>
                <a href="{{ route('peserta.ranking') }}" class="mobile-link {{ $activePage === 'ranking' ? 'active' : '' }}">Ranking</a>
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
                <div class="stat-label">Karya Diupload</div>
                <div class="stat-value">{{ $karya->count() }}</div>
                <span class="stat-badge bg-blue">Karya</span>
            </div>
            <div class="card">
                <div class="stat-label">Ranking Saat Ini</div>
                <div class="stat-value">#{{ $myRank }}</div>
                <span class="stat-badge bg-gold">Dari {{ $rankingAll->count() }} data</span>
            </div>
            <div class="card">
                <div class="stat-label">Total Nilai</div>
                <div class="stat-value">{{ $myScore }}</div>
                <span class="stat-badge bg-green">Poin</span>
            </div>
        </div>

        @if($activePage === 'dashboard')
            <div class="panel">
                <div class="panel-head">
                    <div class="panel-title">Ringkasan Peserta</div>
                    <div class="panel-tag">Setiap menu sekarang terbuka sebagai halaman terpisah</div>
                </div>
                <div class="panel-body">
                    <div class="quick-grid">
                        <a href="{{ route('peserta.upload.page') }}" class="quick-card">
                            <div class="quick-card-title">Upload Karya</div>
                            <div class="quick-card-desc">Masuk ke halaman upload khusus untuk mengirim file karya tanpa bercampur dengan menu lain.</div>
                        </a>
                        <a href="{{ route('peserta.karya') }}" class="quick-card">
                            <div class="quick-card-title">Karya Saya</div>
                            <div class="quick-card-desc">Lihat daftar karya milikmu di halaman tersendiri yang lebih rapi dan fokus.</div>
                        </a>
                        <a href="{{ route('peserta.ranking') }}" class="quick-card">
                            <div class="quick-card-title">Ranking</div>
                            <div class="quick-card-desc">Pantau posisi nilai sementara lewat halaman ranking yang terpisah.</div>
                        </a>
                    </div>
                </div>
            </div>
        @endif

        @if($activePage === 'upload')
            <div class="panel">
                <div class="panel-head">
                    <div class="panel-title">Upload Karya</div>
                    <div class="panel-tag">JPG dan PNG maksimal 10MB</div>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('peserta.upload') }}" enctype="multipart/form-data" id="uploadForm">
                        @csrf

                        <div class="upload-zone" id="uploadZone">
                            <input type="file" name="file" id="fileInput" accept="image/jpeg,image/png,image/jpg" required>
                            <div class="upload-icon">FILE</div>
                            <div class="upload-text">Klik area ini untuk memilih gambar karya</div>
                            <div class="upload-hint">Format JPG, JPEG, PNG - maksimal 10MB</div>
                            <div class="upload-filename" id="uploadFilename"></div>
                        </div>

                        <input class="form-input" type="text" name="judul" placeholder="Judul karya layangan" value="{{ old('judul') }}" required>

                        <button type="submit" class="submit-btn" id="submitBtn">Upload Karya</button>
                    </form>
                </div>
            </div>
        @endif

        @if($activePage === 'karya')
            <div class="panel">
                <div class="panel-head">
                    <div class="panel-title">Karya Saya</div>
                    <div class="panel-tag">{{ $karya->count() }} karya</div>
                </div>
                <div class="karya-list">
                    @forelse($karya as $item)
                        <div class="karya-item">
                            @if($item->file)
                                <img class="karya-thumb" src="{{ asset('storage/' . $item->file) }}" alt="{{ $item->judul }}">
                            @else
                                <div class="karya-thumb-empty">KRY</div>
                            @endif
                            <div>
                                <div class="karya-name">{{ $item->judul }}</div>
                                <div class="karya-date">Diupload {{ $item->created_at->format('d M Y') }}</div>
                            </div>
                            <div class="karya-status {{ ($item->user?->is_approved ?? false) ? 'status-ok' : 'status-pending' }}">
                                {{ ($item->user?->is_approved ?? false) ? 'Disetujui' : 'Menunggu ACC' }}
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">Belum ada karya yang diupload</div>
                    @endforelse
                </div>
            </div>
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
                @forelse($rankingAll as $index => $item)
                    @php $no = $index + 1; @endphp
                    <div class="rank-row {{ $item->user_id === auth()->id() ? 'rank-highlight' : '' }}">
                        <div class="rank-num">{{ $no }}</div>
                        <div>
                            <div class="rank-name">
                                {{ $item->user->name ?? '-' }}
                                @if($item->user_id === auth()->id())
                                    <span class="you-badge">KAMU</span>
                                @endif
                            </div>
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

@if($activePage === 'upload')
<script>
const mobileMenuToggle = document.getElementById('mobileMenuToggle');
const mobileMenu = document.getElementById('mobileMenu');
const fileInput = document.getElementById('fileInput');
const uploadZone = document.getElementById('uploadZone');
const uploadFilename = document.getElementById('uploadFilename');
const submitBtn = document.getElementById('submitBtn');
const uploadForm = document.getElementById('uploadForm');

if (mobileMenuToggle && mobileMenu) {
    mobileMenuToggle.addEventListener('click', function () {
        const isOpen = mobileMenu.classList.toggle('open');
        mobileMenuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });
}

if (fileInput && uploadZone && uploadFilename && submitBtn && uploadForm) {
    fileInput.addEventListener('change', function () {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            const kb = Math.round(file.size / 1024);
            uploadFilename.textContent = file.name + ' (' + kb + ' KB)';
            uploadFilename.style.display = 'block';
            uploadZone.classList.add('has-file');
        }
    });

    uploadForm.addEventListener('submit', function (event) {
        if (!fileInput.files || fileInput.files.length === 0) {
            event.preventDefault();
            alert('Pilih file gambar terlebih dahulu.');
            return;
        }

        submitBtn.disabled = true;
        submitBtn.textContent = 'Mengupload...';
    });

    uploadZone.addEventListener('dragover', function (event) {
        event.preventDefault();
        uploadZone.style.borderColor = 'rgba(255,215,0,0.6)';
    });

    uploadZone.addEventListener('dragleave', function () {
        uploadZone.style.borderColor = '';
    });

    uploadZone.addEventListener('drop', function (event) {
        event.preventDefault();

        const files = event.dataTransfer.files;
        if (!files || files.length === 0) {
            return;
        }

        fileInput.files = files;
        uploadFilename.textContent = files[0].name;
        uploadFilename.style.display = 'block';
        uploadZone.classList.add('has-file');
        uploadZone.style.borderColor = '';
    });
}
</script>
@else
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
@endif
</body>
</html>
