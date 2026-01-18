<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>{{ $destination->name }} | WisataKu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Inter:wght@400;600&display=swap" rel="stylesheet">

<style>
:root{
    --bg:#f8f7f3;
    --panel:#ffffff;
    --border:#e5e7eb;
    --primary:#2f6f4e;
    --accent:#c9a227;
    --text:#1f2937;
    --muted:#6b7280;
}

body{
    background:var(--bg);
    font-family:'Inter',sans-serif;
    color:var(--text);
}

/* NAVBAR */
.navbar{
    position:fixed;
    top:0;
    width:100%;
    z-index:999;
    background:#363636cc;
    backdrop-filter:blur(10px);
    border-bottom:1px solid var(--border);
}
.navbar-brand{
    font-weight:800;
    font-size:1.6rem;
}
.navbar-brand span{
    color:var(--primary);
}
.navbar .form-control,
.navbar .form-select{
    height:44px;
    border-radius:10px;
    border:1px solid var(--border);
}
.navbar button{
    height:44px;
    border-radius:10px;
    font-weight:700;
}

/* PANEL */
.panel{
    background:var(--panel);
    border:1px solid var(--border);
    border-radius:18px;
    padding:24px;
}

.section-title{
    font-family:'Merriweather',serif;
    font-weight:700;
}

.main-image{
    height:420px;
    width:100%;
    object-fit:cover;
}

/* REVIEW */
.review-card{
    border-bottom:1px solid var(--border);
    padding:14px 0;
}
.review-card:last-child{
    border-bottom:none;
}

.btn-accent{
    background:var(--primary);
    color:#fff;
    border:none;
    border-radius:12px;
    font-weight:600;
}
.btn-accent:hover{
    background:#245a3f;
}

.sidebar{
    position:sticky;
    top:100px;
}

/* ================= MODERN CHART ================= */
.modern-score{
    position:relative;
    width:160px;
    height:160px;
    margin:auto;
}
.modern-score svg{
    position:absolute;
    top:0;
    left:0;
}
.score-text{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    text-align:center;
}
.score-text h2{
    font-weight:800;
    margin:0;
}
.score-text small{
    color:var(--muted);
    font-weight:600;
}

.progress{
    background:#e5e7eb;
}
.progress-bar{
    transition:width .8s ease;
}
  /* Footer styling */
  footer {
    background-color: #1e1e1e;
    color: #f1f1f1;
    text-align: center;
    padding: 20px 0;
    font-size: 14px;
  }

  footer a {
    color: #f1f1f1;
    text-decoration: none;
    margin: 0 10px;
    transition: color 0.3s;
  }

  footer a:hover {
    color: #ff6b6b;
  }

  .social-icons {
    margin: 10px 0;
  }

  .social-icons a {
    display: inline-block;
    margin: 0 8px;
    width: 32px;
    height: 32px;
    line-height: 32px;
    border-radius: 50%;
    background-color: #333;
    color: white;
    text-align: center;
    font-size: 16px;
    transition: all 0.3s;
  }

  .social-icons a:hover {
    background-color: #ff6b6b;
    transform: scale(1.1);
  }

  /* Optional: simple SVG icon style */
  .social-icons svg {
    width: 16px;
    height: 16px;
    vertical-align: middle;
    fill: white;
  }

</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            🌿 Wisata<span>Ku</span>
        </a>

        <form class="d-flex ms-auto gap-2" method="GET" action="{{ url('/') }}">
            <input type="text" name="search" class="form-control"
                   placeholder="Cari destinasi..."
                   value="{{ request('search') }}">

            <select name="category" class="form-select">
                <option value="">Semua Kategori</option>
                @isset($categories)
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category')==$cat?'selected':'' }}>
                            {{ ucfirst($cat) }}
                        </option>
                    @endforeach
                @endisset
            </select>

            <button class="btn btn-success px-3">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>
</nav>

<div class="container" style="margin-top:110px; margin-bottom:50px;">

<h1 class="mb-1">{{ $destination->name }}</h1>
<p class="text-muted mb-4">
    ⭐ {{ number_format($destination->rating,1) }} • {{ $destination->reviews->count() }} ulasan
</p>

<div class="row g-4">

<!-- LEFT -->
<div class="col-lg-8">

    <div class="panel p-0 mb-4 overflow-hidden">
        <img src="{{ asset('storage/'.$destination->image) }}" class="main-image">
    </div>

    <div class="panel mb-4">
        <h4 class="section-title">Tentang Destinasi</h4>
        <p class="text-muted">{{ $destination->description }}</p>
    </div>

    <div class="panel mb-4">
        <h4 class="section-title">Tulis Ulasan</h4>
        <form method="POST" action="/review/{{ $destination->id }}">
            @csrf
            <input class="form-control mb-3" name="name" placeholder="Nama Anda" required>
            <select class="form-select mb-3" name="rating" required>
                <option disabled selected>Rating</option>
                <option>5</option><option>4</option><option>3</option><option>2</option><option>1</option>
            </select>
            <textarea class="form-control mb-3" rows="4"
                      name="comment"
                      placeholder="Ceritakan pengalaman Anda..." required></textarea>
            <button class="btn btn-accent w-100 py-2">Kirim Ulasan</button>
        </form>
    </div>

    <div class="panel">
        <h4 class="section-title">Ulasan Pengunjung</h4>
        @forelse($destination->reviews as $r)
            <div class="review-card">
                <strong>{{ $r->name }}</strong>
                <span class="float-end">⭐ {{ $r->rating }}</span>
                <p class="text-muted mt-2">{{ $r->comment }}</p>
            </div>
        @empty
            <p class="text-muted">Belum ada ulasan</p>
        @endforelse
    </div>
</div>

<!-- RIGHT (CHART BARU) -->
<div class="col-lg-4">
    <div class="panel mb-4 sidebar text-center">

        <h5 class="fw-bold mb-4">Penilaian Pengunjung</h5>

        <div class="modern-score mb-4">
            <svg width="160" height="160">
                <circle cx="80" cy="80" r="70"
                        stroke="#e5e7eb"
                        stroke-width="14"
                        fill="none"/>
                <circle cx="80" cy="80" r="70"
                        stroke="url(#grad)"
                        stroke-width="14"
                        fill="none"
                        stroke-linecap="round"
                        stroke-dasharray="{{ ($destination->rating/5)*440 }} 440"
                        transform="rotate(-90 80 80)"/>
                <defs>
                    <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" stop-color="#2f6f4e"/>
                        <stop offset="100%" stop-color="#6fbf8a"/>
                    </linearGradient>
                </defs>
            </svg>

            <div class="score-text">
                <h2>{{ number_format($destination->rating,1) }}</h2>
                <small>dari 5</small>
            </div>
        </div>

        <p class="text-muted mb-4">
            {{ $destination->reviews->count() }} total ulasan
        </p>

        @for($i=5;$i>=1;$i--)
            @php
                $count = $destination->reviews->where('rating',$i)->count();
                $percent = $destination->reviews->count()
                    ? ($count/$destination->reviews->count()*100)
                    : 0;
            @endphp
            <div class="mb-3 text-start">
                <div class="d-flex justify-content-between mb-1">
                    <small>⭐ {{ $i }}</small>
                    <small class="text-muted">{{ $count }}</small>
                </div>
                <div class="progress rounded-pill" style="height:10px;">
                    <div class="progress-bar"
                         style="width:{{ $percent }}%;
                         background:linear-gradient(90deg,#2f6f4e,#6fbf8a);">
                    </div>
                </div>
            </div>
        @endfor

    </div>
</div>

</div>
</div>

<!-- Footer -->

<footer>
  <div class="social-icons">
    <!-- Facebook -->
    <a href="#" title="Facebook">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M22 12C22 6.477 17.523 2 12 2S2 6.477 2 12c0 5.013 3.657 9.168 8.438 9.879v-6.987H7.898v-2.892h2.54V9.845c0-2.507 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.462h-1.26c-1.243 0-1.63.772-1.63 1.562v1.875h2.773l-.443 2.892h-2.33v6.987C18.343 21.168 22 17.013 22 12z"/>
      </svg>
    </a>

    <!-- Twitter -->
    <a href="#" title="Twitter">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M22.46 6c-.77.35-1.6.58-2.46.69a4.27 4.27 0 001.88-2.36 8.57 8.57 0 01-2.7 1.03 4.26 4.26 0 00-7.26 3.88 12.08 12.08 0 01-8.77-4.44 4.26 4.26 0 001.32 5.69A4.24 4.24 0 012 9.71v.05a4.26 4.26 0 003.42 4.18 4.26 4.26 0 01-1.93.07 4.26 4.26 0 003.98 2.96A8.53 8.53 0 012 19.54 12.07 12.07 0 008.29 21c7.55 0 11.68-6.26 11.68-11.68 0-.18-.01-.35-.02-.53A8.36 8.36 0 0022.46 6z"/>
      </svg>
    </a>

    <!-- Instagram -->
    <a href="#" title="Instagram">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.17.056 1.97.246 2.427.415a4.92 4.92 0 011.71 1.11 4.922 4.922 0 011.11 1.71c.169.457.359 1.257.415 2.427.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.056 1.17-.246 1.97-.415 2.427a4.918 4.918 0 01-1.11 1.71 4.918 4.918 0 01-1.71 1.11c-.457.169-1.257.359-2.427.415-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.056-1.97-.246-2.427-.415a4.918 4.918 0 01-1.71-1.11 4.918 4.918 0 01-1.11-1.71c-.169-.457-.359-1.257-.415-2.427C2.175 15.747 2.163 15.367 2.163 12s.012-3.584.07-4.85c.056-1.17.246-1.97.415-2.427a4.92 4.92 0 011.11-1.71 4.92 4.92 0 011.71-1.11c.457-.169 1.257-.359 2.427-.415C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.013 7.052.072 5.773.13 4.837.314 4.042.655a7.07 7.07 0 00-2.57 1.662A7.07 7.07 0 00.655 4.042c-.341.795-.525 1.731-.583 3.01C.013 8.332 0 8.741 0 12c0 3.259.013 3.668.072 4.948.058 1.279.242 2.215.583 3.01a7.07 7.07 0 001.662 2.57 7.07 7.07 0 002.57 1.662c.795.341 1.731.525 3.01.583C8.332 23.987 8.741 24 12 24s3.668-.013 4.948-.072c1.279-.058 2.215-.242 3.01-.583a7.07 7.07 0 002.57-1.662 7.07 7.07 0 001.662-2.57c.341-.795.525-1.731.583-3.01C23.987 15.668 24 15.259 24 12s-.013-3.668-.072-4.948c-.058-1.279-.242-2.215-.583-3.01a7.07 7.07 0 00-1.662-2.57 7.07 7.07 0 00-2.57-1.662c-.795-.341-1.731-.525-3.01-.583C15.668.013 15.259 0 12 0z"/>
        <path d="M12 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a3.999 3.999 0 110-7.998 3.999 3.999 0 010 7.998zM18.406 4.594a1.44 1.44 0 11-2.88 0 1.44 1.44 0 012.88 0z"/>
      </svg>
    </a>
  </div>
  &copy; 2026 Website Saya. All Rights Reserved.
</footer>

</body>
</html>