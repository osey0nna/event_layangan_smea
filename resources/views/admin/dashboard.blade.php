<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $pageTitle ?? 'Dashboard Admin' }} - Festival Layang-Layang</title>
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
            grid-template-columns: repeat(4, 1fr);
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
        .bg-gold { background: rgba(255,215,0,0.12); color: #ffd700; }
        .bg-green { background: rgba(34,197,94,0.12); color: #4ade80; }
        .bg-purple { background: rgba(167,139,250,0.12); color: #a78bfa; }

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
        .table-wrap { overflow-x: auto; }

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

        .ptable { width: 100%; border-collapse: collapse; }
        .ptable th {
            text-align: left;
            font-size: 10px;
            font-weight: 600;
            color: rgba(255,255,255,0.3);
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 12px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .ptable td {
            padding: 12px 20px;
            font-size: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            vertical-align: middle;
        }
        .ptable tr:last-child td { border-bottom: none; }
        .td-name { font-weight: 600; }
        .td-email { font-size: 10px; color: rgba(255,255,255,0.35); margin-top: 2px; }

        .status-yes, .status-no {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 600;
        }
        .status-yes { background: rgba(34,197,94,0.12); color: #4ade80; }
        .status-no { background: rgba(239,68,68,0.12); color: #f87171; }
        .aksi-wrap { display: flex; gap: 8px; flex-wrap: wrap; }
        .btn-acc, .btn-del {
            border-radius: 8px;
            padding: 6px 12px;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }
        .btn-acc {
            border: 1px solid rgba(34,197,94,0.3);
            background: rgba(34,197,94,0.1);
            color: #4ade80;
        }
        .btn-del {
            border: 1px solid rgba(239,68,68,0.25);
            background: rgba(239,68,68,0.08);
            color: #f87171;
        }

        .karya-list { display: grid; gap: 12px; }
        .karya-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 16px 20px;
            border-top: 1px solid rgba(255,255,255,0.05);
        }
        .karya-item:first-child { border-top: none; }
        .karya-thumb, .karya-thumb-ph {
            width: 52px;
            height: 52px;
            border-radius: 10px;
            flex-shrink: 0;
        }
        .karya-thumb { object-fit: cover; }
        .karya-thumb-ph {
            background: #1a3a6e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            color: #ffd700;
        }
        .karya-name { font-size: 12px; font-weight: 600; }
        .karya-owner { font-size: 10px; color: rgba(255,255,255,0.35); margin-top: 3px; }

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
            .stats-grid, .quick-grid { grid-template-columns: 1fr 1fr; }
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
            .stats-grid, .quick-grid { grid-template-columns: 1fr; }
            .panel-head {
                padding: 14px 16px;
                gap: 10px;
                align-items: flex-start;
                flex-direction: column;
            }
            .panel-body { padding: 16px; }
            .table-wrap { overflow: visible; }
            .ptable {
                border-collapse: separate;
                border-spacing: 0 12px;
            }
            .ptable thead {
                display: none;
            }
            .ptable tbody,
            .ptable tr,
            .ptable td {
                display: block;
                width: 100%;
            }
            .ptable tr {
                background: #0b1a30;
                border: 1px solid rgba(255,255,255,0.08);
                border-radius: 14px;
                overflow: hidden;
            }
            .ptable td {
                padding: 0 16px 14px;
                border-bottom: none;
            }
            .ptable td:first-child {
                padding-top: 16px;
            }
            .ptable td[data-label]::before {
                content: attr(data-label);
                display: block;
                margin-bottom: 8px;
                font-size: 10px;
                font-weight: 600;
                color: rgba(255,255,255,0.32);
                letter-spacing: 1px;
                text-transform: uppercase;
            }
            .aksi-wrap form {
                flex: 1 1 100%;
            }
            .btn-acc, .btn-del {
                width: 100%;
                padding: 10px 12px;
            }
            .karya-item {
                padding: 16px;
                align-items: flex-start;
                flex-wrap: wrap;
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
    $belumAcc = $users->where('is_approved', false)->count();
    $sudahNilai = $ranking->whereNotNull('penilaian_sum_total')->count();
@endphp

<div class="sidebar">
    <div class="sb-logo">
        <a href="{{ route('admin.dashboard') }}" class="sb-logo-link">
            <div class="sb-brand">FESTIVAL</div>
            <div class="sb-sub">Admin Panel</div>
        </a>
    </div>

    <div class="sb-section">Menu Utama</div>
    <ul class="sb-nav">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="{{ $activePage === 'dashboard' ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><rect x="1" y="1" width="6" height="6" rx="1"/><rect x="9" y="1" width="6" height="6" rx="1"/><rect x="1" y="9" width="6" height="6" rx="1"/><rect x="9" y="9" width="6" height="6" rx="1"/></svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.peserta') }}" class="{{ $activePage === 'peserta' ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 8a3 3 0 100-6 3 3 0 000 6zm-5 6a5 5 0 0110 0H3z"/></svg>
                Kelola Peserta
            </a>
        </li>
        <li>
            <a href="{{ route('admin.karya') }}" class="{{ $activePage === 'karya' ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M2 4h12v1H2zm0 4h12v1H2zm0 4h8v1H2z"/></svg>
                Kelola Karya
            </a>
        </li>
        <li>
            <a href="{{ route('admin.ranking') }}" class="{{ $activePage === 'ranking' ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 1l1.8 4.5H15l-3.9 2.8 1.5 4.7L8 10.2l-4.6 2.8 1.5-4.7L1 5.5h5.2z"/></svg>
                Ranking
            </a>
        </li>
    </ul>

    <div class="sb-user">
        <div class="sb-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'AD', 0, 2)) }}</div>
        <div>
            <div class="sb-un">{{ auth()->user()->name ?? 'Admin' }}</div>
            <div class="sb-ur">Administrator</div>
        </div>
    </div>
</div>

<div class="main">
    <div class="topbar">
        <div class="topbar-main">
            <div class="tb-title">{{ $pageTitle ?? 'Dashboard Admin' }}</div>
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
                <div class="mobile-user-name">{{ auth()->user()->name ?? 'Admin' }}</div>
                <div class="mobile-user-role">Administrator</div>
            </div>
            <div class="mobile-links">
                <a href="{{ route('admin.dashboard') }}" class="mobile-link {{ $activePage === 'dashboard' ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('admin.peserta') }}" class="mobile-link {{ $activePage === 'peserta' ? 'active' : '' }}">Kelola Peserta</a>
                <a href="{{ route('admin.karya') }}" class="mobile-link {{ $activePage === 'karya' ? 'active' : '' }}">Kelola Karya</a>
                <a href="{{ route('admin.ranking') }}" class="mobile-link {{ $activePage === 'ranking' ? 'active' : '' }}">Ranking</a>
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

        <div class="stats-grid">
            <div class="card">
                <div class="stat-label">Total Peserta</div>
                <div class="stat-value">{{ $users->count() }}</div>
                <span class="stat-badge bg-blue">Terdaftar</span>
            </div>
            <div class="card">
                <div class="stat-label">Belum Di-ACC</div>
                <div class="stat-value">{{ $belumAcc }}</div>
                <span class="stat-badge bg-gold">Menunggu</span>
            </div>
            <div class="card">
                <div class="stat-label">Total Karya</div>
                <div class="stat-value">{{ $karya->count() }}</div>
                <span class="stat-badge bg-green">Karya</span>
            </div>
            <div class="card">
                <div class="stat-label">Sudah Dinilai</div>
                <div class="stat-value">{{ $sudahNilai }}</div>
                <span class="stat-badge bg-purple">Penilaian</span>
            </div>
        </div>

        @if($activePage === 'dashboard')
            <div class="panel">
                <div class="panel-head">
                    <div class="panel-title">Ringkasan Admin</div>
                    <div class="panel-tag">Setiap menu sekarang punya halaman terpisah</div>
                </div>
                <div class="panel-body">
                    <div class="quick-grid">
                        <a href="{{ route('admin.peserta') }}" class="quick-card">
                            <div class="quick-card-title">Kelola Peserta</div>
                            <div class="quick-card-desc">Lihat peserta, ACC akun, dan hapus peserta pada halaman peserta yang khusus.</div>
                        </a>
                        <a href="{{ route('admin.karya') }}" class="quick-card">
                            <div class="quick-card-title">Kelola Karya</div>
                            <div class="quick-card-desc">Buka daftar karya peserta dengan tampilan yang lebih fokus dan tidak bercampur.</div>
                        </a>
                        <a href="{{ route('admin.ranking') }}" class="quick-card">
                            <div class="quick-card-title">Ranking Peserta</div>
                            <div class="quick-card-desc">Lihat urutan peserta berdasarkan total nilai juri di halaman ranking tersendiri.</div>
                        </a>
                    </div>
                </div>
            </div>
        @endif

        @if($activePage === 'peserta')
            <div class="panel">
                <div class="panel-head">
                    <div class="panel-title">Daftar Peserta</div>
                    <div class="panel-tag">{{ $users->count() }} peserta</div>
                </div>
                <div class="table-wrap">
                    <table class="ptable">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $u)
                            <tr>
                                <td data-label="Nama">
                                    <div class="td-name">{{ $u->name }}</div>
                                    <div class="td-email">{{ $u->email }}</div>
                                </td>
                                <td data-label="Status">
                                    @if($u->is_approved)
                                        <span class="status-yes">Disetujui</span>
                                    @else
                                        <span class="status-no">Belum</span>
                                    @endif
                                </td>
                                <td data-label="Aksi">
                                    <div class="aksi-wrap">
                                        @if(!$u->is_approved)
                                            <form method="POST" action="{{ route('admin.approve', $u->id) }}">
                                                @csrf
                                                <button type="submit" class="btn-acc">ACC</button>
                                            </form>
                                        @endif
                                        <form method="POST" action="{{ route('admin.delete', $u->id) }}" onsubmit="return confirm('Hapus peserta ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-del">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="empty-state">Belum ada peserta terdaftar</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        @if($activePage === 'karya')
            <div class="panel">
                <div class="panel-head">
                    <div class="panel-title">Karya Masuk</div>
                    <div class="panel-tag">{{ $karya->count() }} karya</div>
                </div>
                <div class="karya-list">
                    @forelse($karya as $k)
                    <div class="karya-item">
                        @if($k->file)
                            <img class="karya-thumb" src="{{ asset('storage/' . $k->file) }}" alt="{{ $k->judul }}">
                        @else
                            <div class="karya-thumb-ph">KRY</div>
                        @endif
                        <div style="flex:1; min-width:0;">
                            <div class="karya-name">{{ $k->judul }}</div>
                            <div class="karya-owner">{{ $k->user->name ?? '-' }}</div>
                        </div>
                        <span class="status-yes">Masuk</span>
                    </div>
                    @empty
                    <div class="empty-state">Belum ada karya masuk</div>
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
                @forelse($ranking as $index => $r)
                    @php $no = $index + 1; @endphp
                    <div class="rank-row">
                        <div class="rank-num">{{ $no }}</div>
                        <div>
                            <div class="rank-name">{{ $r->user->name ?? '-' }}</div>
                            <div class="rank-title">{{ $r->judul }}</div>
                        </div>
                        <div class="rank-karya">{{ optional($r->user)->karya()->count() ?? 0 }} karya</div>
                        <div class="rank-score"><strong>{{ $r->penilaian_sum_total ?? 0 }}</strong><br><span style="color:rgba(255,255,255,0.35);font-size:10px;">poin</span></div>
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
