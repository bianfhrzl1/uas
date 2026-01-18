<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>WisataKu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

<style>
:root{
    --bg:#f8fafc;
    --card:#ffffff;
    --primary:#0ea5a4;
    --secondary:#16a34a;
    --text:#0f172a;
    --muted:#64748b;
    --border:#e2e8f0;
}

body{
    background:linear-gradient(180deg,#f8fafc,#f1f5f9);
    color:var(--text);
    font-family:'Plus Jakarta Sans',sans-serif;
    padding-top:90px;
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
    background:linear-gradient(90deg,var(--primary),var(--secondary));
    border:none;
}

/* HERO */
.hero{
    padding:70px 0 60px;
}
.hero h1{
    font-size:3.4rem;
    font-weight:800;
}
.hero h1 span{
    color:var(--primary);
}
.hero p{
    color:var(--muted);
    max-width:520px;
    font-size:1.1rem;
}

/* SECTION */
.section-title{
    font-size:2rem;
    font-weight:800;
    margin:60px 0 32px;
}

/* DESTINATION CARD */
.card-destination{
    background:var(--card);
    border-radius:20px;
    overflow:hidden;
    border:1px solid var(--border);
    transition:.35s ease;
}
.card-destination:hover{
    transform:translateY(-10px);
    box-shadow:0 25px 60px rgba(0,0,0,.08);
}

/* IMAGE */
.card-image{
    position:relative;
    height:220px;
    overflow:hidden;
}
.card-image img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:.6s ease;
}
.card-destination:hover img{
    transform:scale(1.08);
}

/* CATEGORY */
.badge-category{
    position:absolute;
    top:14px;
    left:14px;
    background:#ffffffee;
    color:#0f172a;
    padding:6px 14px;
    font-size:.75rem;
    font-weight:700;
    border-radius:999px;
    box-shadow:0 6px 14px rgba(0,0,0,.12);
}

/* CARD BODY */
.card-body{
    padding:18px 20px 22px;
}
.card-title{
    font-size:1.25rem;
    font-weight:800;
    margin-bottom:6px;
}
.card-location{
    font-size:.9rem;
    color:var(--muted);
}
.rating{
    color:#f59e0b;
    font-weight:700;
}

/* FOOTER CARD */
.card-footer{
    padding:0 20px 20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}
.btn-detail{
    font-size:.85rem;
    font-weight:700;
    padding:7px 18px;
    border-radius:999px;
    border:1px solid var(--border);
    color:var(--text);
}
.btn-detail:hover{
    background:linear-gradient(90deg,var(--primary),var(--secondary));
    color:#fff;
    border-color:transparent;
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
<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="/">
            🌿 Wisata<span>Ku</span>
        </a>

        <form class="d-flex ms-auto gap-2" method="GET" action="{{ url('/') }}">
            <input type="text" name="search" class="form-control"
                   placeholder="Cari destinasi..."
                   value="{{ request('search') }}">

            <select name="category" class="form-select">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ request('category')==$cat?'selected':'' }}>
                        {{ ucfirst($cat) }}
                    </option>
                @endforeach
            </select>

            <button class="btn btn-primary px-4">Cari</button>
        </form>
    </div>
</nav>

<div class="container">

    <!-- HERO -->
    <section class="hero">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1>Temukan <span>Destinasi Terbaik</span></h1>
                <p class="mt-3">
                    Baca ulasan jujur, lihat foto asli, dan temukan pengalaman wisata terbaik di Indonesia.
                </p>
            </div>
            <div class="col-lg-6 d-none d-lg-block text-end">
                <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470"
                     class="img-fluid shadow">
            </div>
        </div>
    </section>

    <!-- LIST -->
    <h2 class="section-title">Destinasi</h2>

    <div class="row g-4">
        @forelse($destinations as $r)
        <div class="col-md-4">
            <div class="card-destination h-100">

                <div class="card-image">
                    <span class="badge-category">
                        {{ ucfirst($r->category) }}
                    </span>

                    @if($r->image)
                        <img src="{{ asset('storage/'.$r->image) }}">
                    @else
                        <img src="https://via.placeholder.com/400x220">
                    @endif
                </div>

                <div class="card-body">
                    <div class="card-title">{{ $r->name }}</div>
                    <div class="card-location">
                        <i class="bi bi-geo-alt"></i> {{ $r->location }}
                    </div>
                </div>

                <div class="card-footer">
                    <span class="rating">
                        ⭐ {{ number_format($r->rating ?? 0,1) }}
                    </span>
                    <a href="/destination/{{ $r->id }}" class="btn btn-detail">
                        Lihat Detail
                    </a>
                </div>

            </div>
        </div>
        @empty
            <p class="text-center text-muted">Destinasi tidak ditemukan</p>
        @endforelse
    </div>

    <div style="height:120px"></div>
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>