<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Festival Layang-Layang Nusantara</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">

  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --navy:       #0a1628;
      --navy-mid:   #111e36;
      --navy-card:  #162340;
      --navy-light: #1e2f4d;
      --border:     rgba(255,255,255,0.08);
      --gold:       #ffd700;
      --gold-dark:  #5a3a00;
      --blue:       #2d6bb5;
      --text-muted: rgba(255,255,255,0.55);
      --text-body:  rgba(255,255,255,0.8);
    }

    html { scroll-behavior: smooth; }

    body {
      font-family: 'Poppins', sans-serif;
      background: var(--navy);
      color: #fff;
      overflow-x: hidden;
    }

    /* ─── NAV ─────────────────────────────────────── */
    nav {
      position: fixed;
      top: 0; left: 0;
      width: 100%;
      background: rgba(10,22,40,0.97);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      z-index: 1000;
      border-bottom: 1px solid var(--border);
    }

    .nav-container {
      max-width: 1200px;
      margin: auto;
      padding: 0 20px;
      height: 60px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
    }

    .nav-logo {
      font-size: 14px;
      font-weight: 800;
      color: var(--gold);
      letter-spacing: 2px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .nav-logo-icon {
      width: 28px; height: 28px;
      flex-shrink: 0;
    }

    .nav-links {
      list-style: none;
      display: flex;
      align-items: center;
      gap: 24px;
    }

    .nav-links li a {
      font-size: 13px;
      color: var(--text-body);
      text-decoration: none;
      font-weight: 500;
      transition: color .3s;
    }

    .nav-links li a:hover { color: var(--gold); }

    .nav-btn {
      background: var(--gold);
      color: var(--gold-dark) !important;
      padding: 8px 20px;
      border-radius: 20px;
      font-weight: 700 !important;
      transition: background .3s, color .3s !important;
    }

    .nav-btn:hover {
      background: #fff !important;
      color: var(--navy) !important;
    }

    .menu-toggle {
      display: none;
      width: 40px; height: 40px;
      border: 1px solid var(--border);
      border-radius: 10px;
      background: rgba(255,255,255,0.04);
      color: #fff;
      font-size: 20px;
      cursor: pointer;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .mobile-nav {
      display: none;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 16px 16px;
    }

    .mobile-nav.open { display: block; }

    .mobile-nav-inner {
      background: var(--navy-card);
      border: 1px solid var(--border);
      border-radius: 18px;
      overflow: hidden;
    }

    .mobile-nav a {
      display: flex;
      align-items: center;
      width: 100%;
      padding: 15px 20px;
      color: #fff;
      text-decoration: none;
      font-size: 14px;
      font-weight: 600;
      border-bottom: 1px solid var(--border);
      transition: background .2s;
    }

    .mobile-nav a:last-child { border-bottom: none; }
    .mobile-nav a:hover { background: rgba(255,255,255,0.05); }
    .mobile-nav a.nav-btn {
      background: var(--gold);
      color: var(--gold-dark);
      justify-content: center;
      font-size: 15px;
    }
    .mobile-nav a.nav-btn:hover { background: #ffe033; }

    /* ─── HERO ─────────────────────────────────────── */
    header {
      min-height: 100vh;
      background:
        radial-gradient(ellipse 70% 50% at 80% 20%, rgba(45,107,181,0.25) 0%, transparent 60%),
        radial-gradient(ellipse 50% 40% at 10% 80%, rgba(255,215,0,0.06) 0%, transparent 50%),
        linear-gradient(160deg, var(--navy) 0%, #0d1e38 40%, #112040 70%, #0a1628 100%);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 90px 20px 60px;
      position: relative;
      overflow: hidden;
    }

    header::before {
      content: '';
      position: absolute;
      inset: 0;
      background-image:
        linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
      background-size: 60px 60px;
      pointer-events: none;
    }

    .sun-glow {
      position: absolute;
      top: 80px; right: 10%;
      width: 100px; height: 100px;
      background: radial-gradient(circle, rgba(255,215,0,0.55) 0%, rgba(255,140,0,0.3) 45%, transparent 70%);
      border-radius: 50%;
      filter: blur(4px);
      pointer-events: none;
    }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(255,215,0,0.12);
      border: 1px solid rgba(255,215,0,0.35);
      color: var(--gold);
      font-size: 11px;
      font-weight: 700;
      padding: 7px 20px;
      border-radius: 20px;
      letter-spacing: 2px;
      text-transform: uppercase;
      margin-bottom: 22px;
      position: relative;
      z-index: 2;
    }

    .hero-badge::before {
      content: '';
      width: 7px; height: 7px;
      border-radius: 50%;
      background: var(--gold);
      animation: pulse 1.8s ease-in-out infinite;
    }

    @keyframes pulse {
      0%,100% { opacity: 1; transform: scale(1); }
      50%      { opacity: .4; transform: scale(.7); }
    }

    header h1 {
      font-size: clamp(2rem, 7vw, 3.6rem);
      font-weight: 800;
      line-height: 1.12;
      color: #fff;
      text-shadow: 0 4px 32px rgba(0,0,0,0.5);
      margin-bottom: 16px;
      position: relative;
      z-index: 2;
    }

    header h1 span {
      background: linear-gradient(135deg, var(--gold), #ffb700);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    header p.tagline {
      font-size: clamp(0.88rem, 3vw, 1.05rem);
      color: var(--text-muted);
      max-width: 480px;
      margin: 0 auto 32px;
      line-height: 1.7;
      position: relative;
      z-index: 2;
    }

    .kite-scene {
      width: 100%;
      max-width: 860px;
      height: clamp(140px, 28vw, 260px);
      position: relative;
      z-index: 2;
      margin: 0 auto 12px;
    }

    .hero-cta {
      display: flex;
      gap: 12px;
      justify-content: center;
      flex-wrap: wrap;
      position: relative;
      z-index: 2;
      width: 100%;
      max-width: 400px;
      margin-top: 8px;
    }

    /* ─── INFO STRIP ───────────────────────────────── */
    .info-strip {
      background: var(--gold);
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 36px;
      padding: 14px 24px;
      flex-wrap: wrap;
    }

    .info-strip-item {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 13px;
      font-weight: 700;
      color: var(--gold-dark);
    }

    .strip-dot {
      width: 6px; height: 6px;
      border-radius: 50%;
      background: var(--gold-dark);
      opacity: .5;
      flex-shrink: 0;
    }

    /* ─── SECTIONS ─────────────────────────────────── */
    section { padding: 72px 20px; }

    .container { max-width: 1100px; margin: auto; }

    .section-tag {
      display: inline-block;
      font-size: 10px;
      font-weight: 700;
      color: var(--gold);
      letter-spacing: 3px;
      text-transform: uppercase;
      background: rgba(255,215,0,0.1);
      border: 1px solid rgba(255,215,0,0.25);
      padding: 5px 14px;
      border-radius: 20px;
      margin-bottom: 14px;
    }

    .section-heading {
      font-size: clamp(1.5rem, 5vw, 2rem);
      font-weight: 700;
      color: #fff;
      margin-bottom: 8px;
    }

    .section-sub {
      color: var(--text-muted);
      font-size: 0.9rem;
      margin-bottom: 40px;
      line-height: 1.65;
      max-width: 520px;
    }

    /* ─── ABOUT ────────────────────────────────────── */
    #about { background: var(--navy-mid); }

    .info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 16px;
    }

    .info-card {
      background: var(--navy-card);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 28px 24px;
      text-align: left;
      position: relative;
      overflow: hidden;
      transition: transform .3s, border-color .3s, box-shadow .3s;
    }

    .info-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 3px;
      background: linear-gradient(90deg, var(--gold), transparent);
      opacity: 0;
      transition: opacity .3s;
    }

    .info-card:hover {
      transform: translateY(-5px);
      border-color: rgba(255,215,0,0.25);
      box-shadow: 0 16px 40px rgba(0,0,0,0.35);
    }

    .info-card:hover::before { opacity: 1; }

    .card-icon-box {
      width: 48px; height: 48px;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 18px;
      font-size: 12px;
      font-weight: 800;
      background: rgba(255,215,0,0.1);
      border: 1px solid rgba(255,215,0,0.2);
      color: var(--gold);
      letter-spacing: 1px;
    }

    .info-card h3 {
      font-size: 1rem;
      font-weight: 700;
      color: #fff;
      margin-bottom: 10px;
    }

    .info-card p {
      font-size: 0.85rem;
      color: var(--text-muted);
      line-height: 1.65;
    }

    /* ─── JADWAL ───────────────────────────────────── */
    #jadwal { background: var(--navy); }

    .timeline-row {
      display: flex;
      gap: 0;
      position: relative;
    }

    .timeline-row::before {
      content: '';
      position: absolute;
      top: 24px;
      left: 16%; right: 16%;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(255,215,0,0.3), transparent);
    }

    .tl-item {
      flex: 1;
      text-align: center;
      padding: 0 12px;
    }

    .tl-dot {
      width: 48px; height: 48px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--gold), #ffb300);
      color: var(--gold-dark);
      font-size: 10px;
      font-weight: 800;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 16px;
      position: relative;
      z-index: 1;
      box-shadow: 0 0 20px rgba(255,215,0,0.35);
      line-height: 1.2;
      text-align: center;
    }

    .tl-day {
      font-size: 12px;
      font-weight: 700;
      color: var(--gold);
      margin-bottom: 8px;
      letter-spacing: .3px;
    }

    .tl-desc {
      font-size: 12px;
      color: var(--text-muted);
      line-height: 1.55;
    }

    /* ─── GALERI ───────────────────────────────────── */
    #galeri { background: var(--navy-mid); }

    .gallery {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 14px;
    }

    .gallery-item {
      border-radius: 18px;
      overflow: hidden;
      border: 1px solid var(--border);
      background: var(--navy-card);
      position: relative;
      aspect-ratio: 4/3;
      transition: transform .3s, border-color .3s, box-shadow .3s;
    }

    .gallery-item:hover {
      transform: translateY(-4px);
      border-color: rgba(255,215,0,0.25);
      box-shadow: 0 12px 32px rgba(0,0,0,0.4);
    }

    .gallery-item svg {
      width: 100%;
      height: 100%;
      display: block;
    }

    .gallery-label {
      position: absolute;
      bottom: 0; left: 0; right: 0;
      padding: 10px 14px 12px;
      background: linear-gradient(to top, rgba(6,14,26,0.85) 0%, transparent 100%);
      font-size: 12px;
      font-weight: 600;
      color: rgba(255,255,255,0.8);
    }

    /* ─── CTA ──────────────────────────────────────── */
    #daftar {
      background: var(--navy-card);
      border-top: 1px solid var(--border);
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    #daftar::before {
      content: '';
      position: absolute;
      inset: 0;
      background:
        radial-gradient(ellipse 60% 60% at 50% 0%, rgba(45,107,181,0.2) 0%, transparent 60%),
        radial-gradient(ellipse 40% 40% at 50% 100%, rgba(255,215,0,0.05) 0%, transparent 60%);
      pointer-events: none;
    }

    /* ─── BUTTONS ──────────────────────────────────── */
    .btn-primary {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: var(--gold);
      color: var(--gold-dark);
      padding: 14px 36px;
      border-radius: 40px;
      font-weight: 700;
      font-size: 14px;
      text-decoration: none;
      transition: transform .3s, box-shadow .3s, background .3s;
      letter-spacing: .3px;
      min-height: 48px;
    }

    .btn-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 32px rgba(255,215,0,0.4);
      background: #ffe033;
    }

    .btn-outline {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: transparent;
      color: #fff;
      padding: 14px 32px;
      border-radius: 40px;
      font-weight: 600;
      font-size: 14px;
      text-decoration: none;
      border: 1.5px solid rgba(255,255,255,0.25);
      transition: border-color .3s, background .3s, color .3s;
      min-height: 48px;
    }

    .btn-outline:hover {
      border-color: var(--gold);
      background: rgba(255,215,0,0.08);
      color: var(--gold);
    }

    .cta-buttons {
      display: flex;
      gap: 12px;
      justify-content: center;
      flex-wrap: wrap;
      margin-top: 32px;
      position: relative;
      z-index: 2;
    }

    /* ─── FOOTER ───────────────────────────────────── */
    footer {
      background: #060e1a;
      color: rgba(255,255,255,0.35);
      text-align: center;
      padding: 24px 20px;
      font-size: 12px;
      border-top: 1px solid var(--border);
    }

    footer span { color: var(--gold); }

    /* ─── MOBILE ───────────────────────────────────── */
    @media (max-width: 768px) {
      .nav-links { display: none; }
      .menu-toggle { display: inline-flex; }

      header {
        min-height: 100svh;
        padding: 80px 18px 48px;
        justify-content: flex-start;
        padding-top: 90px;
      }

      header h1 { font-size: clamp(1.85rem, 8vw, 2.5rem); }

      .sun-glow {
        top: 76px; right: 16px;
        width: 70px; height: 70px;
      }

      .info-strip {
        gap: 0;
        flex-direction: column;
        padding: 0 16px;
      }

      .info-strip-item {
        width: 100%;
        padding: 13px 4px;
        border-bottom: 1px solid rgba(90,58,0,0.2);
        font-size: 13px;
      }

      .info-strip-item:last-child { border-bottom: none; }

      section { padding: 56px 16px; }

      /* About cards — single column on small screens */
      .info-grid {
        grid-template-columns: 1fr;
        gap: 12px;
      }

      .info-card {
        padding: 22px 20px;
        border-radius: 18px;
        display: flex;
        align-items: flex-start;
        gap: 16px;
      }

      .card-icon-box { margin-bottom: 0; flex-shrink: 0; }

      .info-card-text { flex: 1; }

      /* Timeline — card style stacked */
      .timeline-row {
        flex-direction: column;
        gap: 12px;
      }

      .timeline-row::before { display: none; }

      .tl-item {
        text-align: left;
        display: flex;
        align-items: center;
        gap: 16px;
        background: var(--navy-card);
        border: 1px solid var(--border);
        border-radius: 18px;
        padding: 18px 16px;
      }

      .tl-dot {
        margin: 0;
        flex-shrink: 0;
        width: 52px; height: 52px;
        font-size: 11px;
      }

      .tl-text { flex: 1; }

      .tl-day { margin-bottom: 5px; font-size: 13px; }
      .tl-desc { font-size: 13px; }

      /* Gallery — 2 columns maintained but smaller gap */
      .gallery {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
      }

      .gallery-item { border-radius: 14px; }

      /* CTA buttons — full width stacked */
      .cta-buttons { flex-direction: column; align-items: stretch; }
      .hero-cta { flex-direction: column; align-items: stretch; }

      .btn-primary,
      .btn-outline {
        width: 100%;
        padding: 16px 24px;
      }
    }

    @media (max-width: 400px) {
      header h1 { font-size: 1.75rem; }
      .gallery-label { font-size: 11px; padding: 8px 10px 10px; }
    }
  </style>
</head>
<body>

<!-- NAV -->
<nav>
  <div class="nav-container">
    <div class="nav-logo">
      <svg class="nav-logo-icon" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
        <polygon points="14,2 4,14 14,24 24,14" fill="#ffd700" opacity="0.9"/>
        <line x1="4" y1="14" x2="24" y2="14" stroke="rgba(90,58,0,0.5)" stroke-width="1"/>
        <line x1="14" y1="2" x2="14" y2="24" stroke="rgba(90,58,0,0.5)" stroke-width="1"/>
        <path d="M14 24 Q12 26 14 28" stroke="#ffd700" stroke-width="1.5" fill="none"/>
      </svg>
      FESTIVAL LAYANG
    </div>
    <ul class="nav-links">
      <li><a href="#about">Tentang</a></li>
      <li><a href="#jadwal">Jadwal</a></li>
      <li><a href="#galeri">Galeri</a></li>
      <li><a href="#daftar" class="nav-btn">Daftar</a></li>
      <li><a href="#">Login</a></li>
    </ul>
    <button type="button" class="menu-toggle" id="menuToggle" aria-expanded="false" aria-controls="mobileNav">&#9776;</button>
  </div>
  <div class="mobile-nav" id="mobileNav">
    <div class="mobile-nav-inner">
      <a href="#about">✦ Tentang</a>
      <a href="#jadwal">✦ Jadwal</a>
      <a href="#galeri">✦ Galeri</a>
      <a href="#">Login</a>
      <a href="#daftar" class="nav-btn">Daftar Sekarang →</a>
    </div>
  </div>
</nav>

<!-- HERO -->
<header>
  <div class="sun-glow"></div>

  <div class="hero-badge">Kompetisi Nasional 2026</div>

  <h1>Festival Layang-Layang<br><span>Nusantara</span></h1>
  <p class="tagline">Perpaduan budaya, kreativitas, dan kompetisi spektakuler di langit Indonesia</p>

  <div class="kite-scene">
    <svg viewBox="0 0 900 260" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:100%;">
      <line x1="185" y1="245" x2="185" y2="50" stroke="rgba(255,255,255,0.2)" stroke-width="1.2" stroke-dasharray="5,4"/>
      <path d="M185 245 Q210 190 220 50" stroke="rgba(255,255,255,0.1)" stroke-width="1" fill="none"/>
      <line x1="450" y1="255" x2="450" y2="15" stroke="rgba(255,255,255,0.2)" stroke-width="1.2" stroke-dasharray="5,4"/>
      <path d="M450 255 Q420 190 415 15" stroke="rgba(255,255,255,0.1)" stroke-width="1" fill="none"/>
      <line x1="720" y1="245" x2="720" y2="35" stroke="rgba(255,255,255,0.2)" stroke-width="1.2" stroke-dasharray="5,4"/>
      <path d="M720 245 Q740 180 735 35" stroke="rgba(255,255,255,0.1)" stroke-width="1" fill="none"/>
      <polygon points="185,30 145,88 185,140 225,88" fill="#e63946" stroke="rgba(255,255,255,0.5)" stroke-width="1.5"/>
      <line x1="145" y1="88" x2="225" y2="88" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
      <line x1="185" y1="30" x2="185" y2="140" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
      <path d="M185,140 Q175,158 185,174 Q195,190 185,206 Q175,222 185,238" stroke="#ffd700" stroke-width="2" fill="none"/>
      <circle cx="185" cy="158" r="3.5" fill="#ffd700"/>
      <circle cx="185" cy="188" r="3.5" fill="#ffd700"/>
      <circle cx="185" cy="218" r="3.5" fill="#ffd700"/>
      <polygon points="450,10 392,88 450,158 508,88" fill="#2d9cdb" stroke="rgba(255,255,255,0.5)" stroke-width="2"/>
      <line x1="392" y1="88" x2="508" y2="88" stroke="rgba(255,255,255,0.4)" stroke-width="1.2"/>
      <line x1="450" y1="10" x2="450" y2="158" stroke="rgba(255,255,255,0.4)" stroke-width="1.2"/>
      <polygon points="450,10 392,88 450,158 508,88" fill="none" stroke="rgba(255,255,255,0.15)" stroke-width="8"/>
      <path d="M450,158 Q438,178 450,198 Q462,218 450,238 Q438,252 450,268" stroke="#ffd700" stroke-width="2.5" fill="none"/>
      <circle cx="450" cy="178" r="4.5" fill="#ffd700"/>
      <circle cx="450" cy="210" r="4.5" fill="#ffd700"/>
      <circle cx="450" cy="242" r="4.5" fill="#ffd700"/>
      <polygon points="720,20 678,82 720,140 762,82" fill="#f4a261" stroke="rgba(255,255,255,0.5)" stroke-width="1.5"/>
      <line x1="678" y1="82" x2="762" y2="82" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
      <line x1="720" y1="20" x2="720" y2="140" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
      <path d="M720,140 Q710,158 720,174 Q730,190 720,207 Q710,222 720,238" stroke="#ffd700" stroke-width="2" fill="none"/>
      <circle cx="720" cy="158" r="3.5" fill="#ffd700"/>
      <circle cx="720" cy="190" r="3.5" fill="#ffd700"/>
      <circle cx="720" cy="220" r="3.5" fill="#ffd700"/>
      <circle cx="60"  cy="50"  r="2"   fill="rgba(255,255,255,0.4)"/>
      <circle cx="320" cy="28"  r="1.5" fill="rgba(255,255,255,0.3)"/>
      <circle cx="600" cy="18"  r="2"   fill="rgba(255,255,255,0.35)"/>
      <circle cx="840" cy="55"  r="1.5" fill="rgba(255,255,255,0.3)"/>
    </svg>
  </div>

  <div class="hero-cta">
    <a href="#daftar" class="btn-primary">Daftar Sekarang</a>
    <a href="#about" class="btn-outline">Lihat Info</a>
  </div>
</header>

<!-- INFO STRIP -->
<div class="info-strip">
  <div class="info-strip-item"><span class="strip-dot"></span>Jadwal: 8 – 9 Mei 2026</div>
  <div class="info-strip-item"><span class="strip-dot"></span>Lokasi: SMKN 1 Wonosobo</div>
  <div class="info-strip-item"><span class="strip-dot"></span>Lomba &amp; Seni Tradisional</div>
</div>

<!-- ABOUT -->
<section id="about">
  <div class="container">
    <div class="section-tag">Informasi Acara</div>
    <h2 class="section-heading">Kenapa Harus Ikut?</h2>
    <p class="section-sub">Event nasional yang menghadirkan lomba dan hiburan budaya terbaik Nusantara.</p>

    <div class="info-grid">
      <div class="info-card">
        <div class="card-icon-box">FL</div>
        <div class="info-card-text">
          <h3>Lomba Layang-Layang</h3>
          <p>Berbagai kategori kreasi unik dari seluruh penjuru Indonesia yang memukau dan menginspirasi.</p>
        </div>
      </div>
      <div class="info-card">
        <div class="card-icon-box">SN</div>
        <div class="info-card-text">
          <h3>Seni Tradisional</h3>
          <p>Pertunjukan dan hiburan budaya Nusantara yang kaya akan nilai seni dan warisan leluhur.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- JADWAL -->
<section id="jadwal">
  <div class="container">
    <div class="section-tag">Rundown</div>
    <h2 class="section-heading">Jadwal Acara</h2>
    <p class="section-sub">Rangkaian acara yang padat dan meriah selama dua hari penuh.</p>

    <div class="timeline-row">
      <div class="tl-item">
        <div class="tl-dot">8<br>Mei</div>
        <div class="tl-text">
          <div class="tl-day">19.00 WIB – Selesai</div>
          <div class="tl-desc">Pembukaan resmi dan pendaftaran ulang peserta</div>
        </div>
      </div>
      <div class="tl-item">
        <div class="tl-dot">8<br>Mei</div>
        <div class="tl-text">
          <div class="tl-day">19.00 WIB – Selesai</div>
          <div class="tl-desc">Lomba utama dan hiburan rakyat</div>
        </div>
      </div>
      <div class="tl-item">
        <div class="tl-dot">9<br>Mei</div>
        <div class="tl-text">
          <div class="tl-day">Pagi – Selesai</div>
          <div class="tl-desc">Final dan pengumuman pemenang</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- GALERI -->
<section id="galeri">
  <div class="container">
    <div class="section-tag">Dokumentasi</div>
    <h2 class="section-heading">Galeri</h2>
    <p class="section-sub">Momen-momen terbaik dari festival sebelumnya.</p>

    <div class="gallery">

      <!-- Card 1: Layang-layang merah naga -->
      <div class="gallery-item">
        <svg viewBox="0 0 300 225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
          <!-- Sky gradient -->
          <defs>
            <linearGradient id="sky1" x1="0%" y1="0%" x2="0%" y2="100%">
              <stop offset="0%" stop-color="#0d2247"/>
              <stop offset="100%" stop-color="#1a4a7a"/>
            </linearGradient>
          </defs>
          <rect width="300" height="225" fill="url(#sky1)"/>
          <!-- Clouds -->
          <ellipse cx="60" cy="40" rx="35" ry="12" fill="rgba(255,255,255,0.07)"/>
          <ellipse cx="90" cy="38" rx="28" ry="10" fill="rgba(255,255,255,0.06)"/>
          <ellipse cx="220" cy="55" rx="40" ry="13" fill="rgba(255,255,255,0.06)"/>
          <!-- Stars -->
          <circle cx="140" cy="20" r="1.5" fill="rgba(255,255,255,0.5)"/>
          <circle cx="250" cy="30" r="1" fill="rgba(255,255,255,0.4)"/>
          <circle cx="30" cy="70" r="1" fill="rgba(255,255,255,0.3)"/>
          <!-- Strings from bottom -->
          <line x1="150" y1="225" x2="145" y2="95" stroke="rgba(255,255,255,0.25)" stroke-width="1" stroke-dasharray="4,3"/>
          <!-- Main kite - Naga/Dragon shape -->
          <polygon points="145,30 108,85 145,120 182,85" fill="#c0392b" stroke="rgba(255,255,255,0.4)" stroke-width="1.5"/>
          <!-- Frame lines -->
          <line x1="108" y1="85" x2="182" y2="85" stroke="rgba(255,220,0,0.6)" stroke-width="1.2"/>
          <line x1="145" y1="30" x2="145" y2="120" stroke="rgba(255,220,0,0.6)" stroke-width="1.2"/>
          <!-- Batik pattern diamonds -->
          <polygon points="145,52 132,72 145,88 158,72" fill="rgba(255,215,0,0.2)" stroke="rgba(255,215,0,0.5)" stroke-width="0.8"/>
          <!-- Tail with nodes -->
          <path d="M145,120 Q138,135 145,148 Q152,162 145,175 Q138,188 145,200 Q152,212 145,223" stroke="#ffd700" stroke-width="2" fill="none"/>
          <circle cx="145" cy="148" r="3" fill="#ffd700"/>
          <circle cx="145" cy="175" r="3" fill="#ffd700"/>
          <circle cx="145" cy="200" r="3" fill="#e74c3c"/>
          <!-- Small secondary kite -->
          <polygon points="220,55 205,80 220,100 235,80" fill="#e74c3c" opacity="0.7" stroke="rgba(255,255,255,0.3)" stroke-width="1"/>
          <line x1="220" y1="225" x2="220" y2="100" stroke="rgba(255,255,255,0.18)" stroke-width="0.8" stroke-dasharray="3,4"/>
        </svg>
        <div class="gallery-label">Layang Naga Merah</div>
      </div>

      <!-- Card 2: Layang-layang biru langit cerah -->
      <div class="gallery-item">
        <svg viewBox="0 0 300 225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
          <defs>
            <linearGradient id="sky2" x1="0%" y1="0%" x2="30%" y2="100%">
              <stop offset="0%" stop-color="#87ceeb"/>
              <stop offset="60%" stop-color="#4fa3d4"/>
              <stop offset="100%" stop-color="#2176ae"/>
            </linearGradient>
          </defs>
          <rect width="300" height="225" fill="url(#sky2)"/>
          <!-- Sun -->
          <circle cx="250" cy="35" r="28" fill="rgba(255,240,120,0.25)"/>
          <circle cx="250" cy="35" r="18" fill="rgba(255,230,80,0.55)"/>
          <!-- Fluffy clouds -->
          <ellipse cx="50" cy="60" rx="38" ry="14" fill="rgba(255,255,255,0.6)"/>
          <ellipse cx="72" cy="54" rx="26" ry="12" fill="rgba(255,255,255,0.65)"/>
          <ellipse cx="180" cy="80" rx="44" ry="15" fill="rgba(255,255,255,0.55)"/>
          <ellipse cx="205" cy="74" rx="32" ry="12" fill="rgba(255,255,255,0.6)"/>
          <!-- Strings -->
          <line x1="130" y1="225" x2="115" y2="100" stroke="rgba(30,50,100,0.3)" stroke-width="1" stroke-dasharray="4,3"/>
          <!-- Box kite style - blue -->
          <polygon points="115,28 72,90 115,145 158,90" fill="#1565c0" stroke="rgba(255,255,255,0.6)" stroke-width="2"/>
          <!-- Inner decorative box -->
          <polygon points="115,55 93,90 115,118 137,90" fill="#1e88e5" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
          <line x1="72" y1="90" x2="158" y2="90" stroke="rgba(255,255,255,0.5)" stroke-width="1.5"/>
          <line x1="115" y1="28" x2="115" y2="145" stroke="rgba(255,255,255,0.5)" stroke-width="1.5"/>
          <!-- Batik motif -->
          <circle cx="115" cy="90" r="8" fill="rgba(255,215,0,0.3)" stroke="rgba(255,215,0,0.7)" stroke-width="1"/>
          <!-- Colorful tail -->
          <path d="M115,145 Q106,160 115,174 Q124,188 115,202 Q106,216 115,225" stroke="#ffd700" stroke-width="2.5" fill="none"/>
          <circle cx="115" cy="174" r="4" fill="#ffd700"/>
          <circle cx="115" cy="202" r="4" fill="#ff5722"/>
          <!-- Small kites in bg -->
          <polygon points="240,30 226,52 240,70 254,52" fill="#e91e63" opacity="0.55" stroke="rgba(255,255,255,0.3)" stroke-width="1"/>
          <line x1="240" y1="225" x2="240" y2="70" stroke="rgba(30,50,100,0.2)" stroke-width="0.8" stroke-dasharray="3,4"/>
        </svg>
        <div class="gallery-label">Layang Kotak Biru</div>
      </div>

      <!-- Card 3: Layang-layang wajah seni tradisional -->
      <div class="gallery-item">
        <svg viewBox="0 0 300 225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
          <defs>
            <linearGradient id="sky3" x1="0%" y1="0%" x2="0%" y2="100%">
              <stop offset="0%" stop-color="#1a0533"/>
              <stop offset="40%" stop-color="#2d1b69"/>
              <stop offset="100%" stop-color="#0d2247"/>
            </linearGradient>
          </defs>
          <rect width="300" height="225" fill="url(#sky3)"/>
          <!-- Milky way effect -->
          <ellipse cx="150" cy="60" rx="120" ry="30" fill="rgba(180,140,255,0.06)"/>
          <!-- Stars -->
          <circle cx="30" cy="25" r="1.5" fill="rgba(255,255,255,0.7)"/>
          <circle cx="80" cy="15" r="1" fill="rgba(255,255,255,0.6)"/>
          <circle cx="200" cy="20" r="1.5" fill="rgba(255,255,255,0.65)"/>
          <circle cx="260" cy="35" r="1" fill="rgba(255,255,255,0.5)"/>
          <circle cx="45" cy="85" r="1" fill="rgba(255,255,255,0.4)"/>
          <circle cx="270" cy="70" r="1.5" fill="rgba(255,255,255,0.5)"/>
          <circle cx="10" cy="130" r="1" fill="rgba(255,255,255,0.3)"/>
          <!-- Strings -->
          <line x1="150" y1="225" x2="148" y2="115" stroke="rgba(255,255,255,0.2)" stroke-width="1" stroke-dasharray="4,3"/>
          <!-- Decorative wajah kite - Hexagon style Javanese -->
          <polygon points="150,25 108,60 95,110 108,155 150,175 192,155 205,110 192,60" fill="#7b1fa2" stroke="rgba(255,215,0,0.7)" stroke-width="2"/>
          <!-- Inner face motif -->
          <ellipse cx="150" cy="100" rx="38" ry="50" fill="#9c27b0" stroke="rgba(255,215,0,0.4)" stroke-width="1"/>
          <!-- Eyes -->
          <ellipse cx="138" cy="88" rx="6" ry="4" fill="rgba(255,215,0,0.8)"/>
          <ellipse cx="162" cy="88" rx="6" ry="4" fill="rgba(255,215,0,0.8)"/>
          <circle cx="138" cy="88" r="2.5" fill="#1a0533"/>
          <circle cx="162" cy="88" r="2.5" fill="#1a0533"/>
          <!-- Nose -->
          <path d="M147,96 Q150,104 153,96" stroke="rgba(255,215,0,0.7)" stroke-width="1.5" fill="none"/>
          <!-- Smile -->
          <path d="M138,112 Q150,122 162,112" stroke="rgba(255,215,0,0.8)" stroke-width="1.5" fill="none"/>
          <!-- Crown on top -->
          <polygon points="150,25 140,42 150,38 160,42" fill="#ffd700" opacity="0.8"/>
          <!-- Tail -->
          <path d="M150,175 Q143,187 150,198 Q157,210 150,220" stroke="#ffd700" stroke-width="2" fill="none"/>
          <circle cx="150" cy="198" r="3.5" fill="#ffd700"/>
        </svg>
        <div class="gallery-label">Layang Topeng Wayang</div>
      </div>

      <!-- Card 4: Festival view banyak layang-layang -->
      <div class="gallery-item">
        <svg viewBox="0 0 300 225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
          <defs>
            <linearGradient id="sky4" x1="0%" y1="0%" x2="20%" y2="100%">
              <stop offset="0%" stop-color="#0e3b61"/>
              <stop offset="70%" stop-color="#1a5fa0"/>
              <stop offset="100%" stop-color="#0d4070"/>
            </linearGradient>
            <linearGradient id="ground" x1="0%" y1="0%" x2="0%" y2="100%">
              <stop offset="0%" stop-color="#1b4d1b"/>
              <stop offset="100%" stop-color="#0e2e0e"/>
            </linearGradient>
          </defs>
          <rect width="300" height="225" fill="url(#sky4)"/>
          <!-- Clouds -->
          <ellipse cx="70" cy="30" rx="42" ry="13" fill="rgba(255,255,255,0.12)"/>
          <ellipse cx="100" cy="26" rx="30" ry="10" fill="rgba(255,255,255,0.1)"/>
          <ellipse cx="220" cy="45" rx="35" ry="12" fill="rgba(255,255,255,0.1)"/>
          <!-- Ground / crowd suggestion -->
          <rect x="0" y="190" width="300" height="35" fill="url(#ground)"/>
          <!-- Silhouette crowd -->
          <ellipse cx="30" cy="192" rx="8" ry="6" fill="rgba(0,0,0,0.5)"/>
          <ellipse cx="60" cy="190" rx="9" ry="7" fill="rgba(0,0,0,0.5)"/>
          <ellipse cx="90" cy="193" rx="8" ry="6" fill="rgba(0,0,0,0.5)"/>
          <ellipse cx="120" cy="191" rx="9" ry="7" fill="rgba(0,0,0,0.5)"/>
          <ellipse cx="150" cy="192" rx="8" ry="6" fill="rgba(0,0,0,0.5)"/>
          <ellipse cx="180" cy="190" rx="9" ry="7" fill="rgba(0,0,0,0.5)"/>
          <ellipse cx="210" cy="193" rx="8" ry="6" fill="rgba(0,0,0,0.5)"/>
          <ellipse cx="240" cy="191" rx="9" ry="7" fill="rgba(0,0,0,0.5)"/>
          <ellipse cx="270" cy="192" rx="8" ry="6" fill="rgba(0,0,0,0.5)"/>
          <!-- Strings -->
          <line x1="80" y1="192" x2="72" y2="105" stroke="rgba(255,255,255,0.2)" stroke-width="0.8" stroke-dasharray="3,3"/>
          <line x1="150" y1="192" x2="148" y2="70" stroke="rgba(255,255,255,0.2)" stroke-width="0.8" stroke-dasharray="3,3"/>
          <line x1="220" y1="192" x2="228" y2="90" stroke="rgba(255,255,255,0.2)" stroke-width="0.8" stroke-dasharray="3,3"/>
          <line x1="50" y1="192" x2="38" y2="130" stroke="rgba(255,255,255,0.15)" stroke-width="0.7" stroke-dasharray="3,3"/>
          <line x1="250" y1="192" x2="260" y2="110" stroke="rgba(255,255,255,0.15)" stroke-width="0.7" stroke-dasharray="3,3"/>
          <!-- Kite 1 - orange/red medium left -->
          <polygon points="38,100 22,128 38,152 54,128" fill="#e65100" stroke="rgba(255,255,255,0.4)" stroke-width="1.2"/>
          <line x1="22" y1="128" x2="54" y2="128" stroke="rgba(255,255,255,0.35)" stroke-width="0.8"/>
          <line x1="38" y1="100" x2="38" y2="152" stroke="rgba(255,255,255,0.35)" stroke-width="0.8"/>
          <!-- Kite 2 - main green center -->
          <polygon points="148,35 114,78 148,115 182,78" fill="#2e7d32" stroke="rgba(255,255,255,0.5)" stroke-width="1.5"/>
          <line x1="114" y1="78" x2="182" y2="78" stroke="rgba(255,215,0,0.5)" stroke-width="1.2"/>
          <line x1="148" y1="35" x2="148" y2="115" stroke="rgba(255,215,0,0.5)" stroke-width="1.2"/>
          <polygon points="148,52 133,72 148,90 163,72" fill="rgba(255,215,0,0.2)" stroke="rgba(255,215,0,0.5)" stroke-width="0.8"/>
          <!-- Kite 3 - purple right -->
          <polygon points="228,62 210,92 228,118 246,92" fill="#6a1b9a" stroke="rgba(255,255,255,0.4)" stroke-width="1.2"/>
          <line x1="210" y1="92" x2="246" y2="92" stroke="rgba(255,255,255,0.35)" stroke-width="0.8"/>
          <line x1="228" y1="62" x2="228" y2="118" stroke="rgba(255,255,255,0.35)" stroke-width="0.8"/>
          <!-- Kite 4 - tiny red back left -->
          <polygon points="72,82 62,98 72,112 82,98" fill="#c62828" opacity="0.75" stroke="rgba(255,255,255,0.3)" stroke-width="1"/>
          <!-- Kite 5 - tiny yellow back right -->
          <polygon points="260,80 248,100 260,118 272,100" fill="#f9a825" opacity="0.75" stroke="rgba(255,255,255,0.3)" stroke-width="1"/>
          <!-- Tails main kite -->
          <path d="M148,115 Q141,128 148,140 Q155,152 148,164" stroke="#ffd700" stroke-width="2" fill="none"/>
          <circle cx="148" cy="140" r="3.5" fill="#ffd700"/>
          <!-- Festive flags/bunting at bottom -->
          <path d="M0,190 Q75,175 150,185 Q225,175 300,188" stroke="rgba(255,215,0,0.3)" stroke-width="0.8" fill="none"/>
        </svg>
        <div class="gallery-label">Festival Nusantara</div>
      </div>

    </div>
  </div>
</section>

<!-- CTA DAFTAR -->
<section id="daftar">
  <div class="container" style="position:relative;z-index:2;">
    <div class="section-tag">Bergabung</div>
    <h2 class="section-heading">Siap Ikut Festival?</h2>
    <p class="section-sub" style="margin-left:auto;margin-right:auto;text-align:center;">
      Daftarkan diri sekarang dan jadilah bagian dari festival layang-layang terbesar di Nusantara!
    </p>
    <div class="cta-buttons">
      <a href="#" class="btn-primary">Daftar Sekarang</a>
      <a href="#" class="btn-outline">Sudah Punya Akun? Login</a>
    </div>
  </div>
</section>

<footer>
  <p>&copy; 2026 <span>Festival Layang-Layang Nusantara</span> &mdash; SMKN 1 Wonosobo</p>
</footer>

<script>
  const menuToggle = document.getElementById('menuToggle');
  const mobileNav  = document.getElementById('mobileNav');

  if (menuToggle && mobileNav) {
    menuToggle.addEventListener('click', function () {
      const isOpen = mobileNav.classList.toggle('open');
      menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      menuToggle.innerHTML = isOpen ? '&#10005;' : '&#9776;';
    });

    mobileNav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        mobileNav.classList.remove('open');
        menuToggle.setAttribute('aria-expanded', 'false');
        menuToggle.innerHTML = '&#9776;';
      });
    });
  }
</script>

</body>
</html>