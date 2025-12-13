@extends('frontend.master')
@section('content')
<style>
/* --- General Styles --- */
body {
    font-family: 'Lato', sans-serif;
    color: #333;
}

.common_product_header {
    background-size: cover;
    background-position: center;
    padding: 80px 0 50px;
    text-align: center;
}

.common_product_header h1 {
    font-size: 48px;
    font-weight: 700;
    color: #fff;
}

.common_product_header p {
    font-size: 18px;
    color: #fff;
    margin-top: 10px;
}

.btn-color {
    background-color: #ae0a46;
    color: #fff;
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 500;
    transition: all 0.3s;
}

.btn-color:hover {
    background-color: #930537;
    color: #fff;
    text-decoration: none;
}

/* --- Sidebar --- */
.blog_left {
    border-radius: 12px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.blog_left h6 {
    font-weight: 600;
    color: #ae0a46;
    margin-bottom: 10px;
}

.interests_list li {
    list-style: none;
    margin-bottom: 8px;
}

.interests_list li a {
    text-decoration: none;
    color: #555;
    font-weight: 500;
    transition: color 0.3s;
}

.interests_list li a:hover {
    color: #ae0a46;
}

/* --- Main Stories --- */
.blog_middle .story-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    margin-bottom: 20px;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
}

.blog_middle .story-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
}

.story-card img {
    width: 100%;
    height: auto;
    border-bottom: 1px solid #eee;
}

.story-card h5 {
    font-size: 20px;
    font-weight: 600;
    color: #ae0a46;
    margin-bottom: 5px;
}

.story-card p {
    font-size: 14px;
    color: #555;
}

.story-card .card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 15px;
    border-top: 1px solid #eee;
    font-size: 13px;
    color: #777;
}

.story-card .share-icons p {
    margin: 0 5px 0 0;
}

/* --- Sidebar Right --- */
.blog_right {
    border-radius: 12px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.popular_post {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.popular_post img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 50%;
}

.popular_post p {
    margin-left: 12px;
    font-size: 14px;
    color: #555;
}

.popular_post p:hover {
    color: #ae0a46;
}

/* --- Pagination --- */
.pagination li a {
    color: #ae0a46;
    border-radius: 6px;
    transition: all 0.2s;
}

.pagination li a:hover {
    background-color: #ae0a46;
    color: #fff;
}

/* --- Responsive --- */
@media (max-width: 991px) {
    .common_product_header h1 {
        font-size: 36px;
    }

    .common_product_header p {
        font-size: 16px;
    }
}
</style>

<!--====== Header Title ======-->
<section class="common_product_header" style="background-image: url('{{ asset('frontend/images/techglossy.jpg') }}');">
    <div class="container">
        <h1>Tech Glossys</h1>
        <p>Through our deep partnerships with trusted brands, <br> Insight offers a comprehensive catalog of software for business.</p>
        <div class="mt-4 d-flex justify-content-center">
            <a href="{{ route('all.story') }}" class="btn-color me-3">All Client Stories</a>
            <a href="{{ route('all.blog') }}" class="btn-color">All Blogs</a>
        </div>
    </div>
</section>

<div class="py-5 container-fluid blog_bg">
    <div class="container px-lg-4">
        <div class="row gx-4">
            <!-- Sidebar Left -->
            <div class="mb-4 col-lg-3 col-12 blog_left">
                <div class="mb-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <button class="border-0 bg-light btn btn-outline-secondary" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </div>

                <div class="mb-4">
                    <h6>By Industries</h6>
                    <ul class="interests_list ps-2">
                        @foreach ($industries as $item)
                        <li style="font-size: 14px;"><a href="#"><i class="fa-solid fa-chevron-right pe-1"></i>{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="mb-4">
                    <h6>By Categories</h6>
                    <ul class="interests_list ps-2">
                        @foreach ($categories as $item)
                        <li style="font-size: 14px;"><a href="#"><i class="fa-solid fa-chevron-right pe-1"></i>{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h6>By Brands</h6>
                    <ul class="interests_list ps-2">
                        @foreach ($brands as $item)
                        <li style="font-size: 14px;"><a href="#"><i class="fa-solid fa-chevron-right pe-1"></i>{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Main Blog Stories -->
            <div class="col-lg-6 col-12 blog_middle">
                @if ($client_storys)
                @foreach ($client_storys as $item)
                <div class="story-card">
                    <a class="text-decoration-none text-dark" href="{{ route('techglossy.details', $item->slug) }}">
                        <img src="{{ asset('storage/' . $item->image) }}" 
                             alt="{{ $item->title }}" 
                             onerror="this.onerror=null;this.src='https://picsum.photos/580/420?random={{ $item->id }}';">
                        <div class="p-3">
                            <h5>{{ $item->title }}</h5>
                            <p>{{ $item->header }}</p>
                        </div>
                        <div class="card-footer">
                            <div class="share-icons d-flex">
                                {!! Share::page(url('/blog/' . $item->id . '/details'))->facebook() !!}
                                {!! Share::page(url('/blog/' . $item->id . '/details'))->twitter() !!}
                                {!! Share::page(url('/blog/' . $item->id . '/details'))->whatsapp() !!}
                            </div>
                            <div><strong>Created at:</strong> {{ $item->created_at->format('Y-m-d') }}</div>
                        </div>
                    </a>
                </div>
                @endforeach
                @endif
            </div>

            <!-- Sidebar Right -->
            <div class="mb-4 col-lg-3 col-12 blog_right">
                <h6>POPULAR POSTS</h6>
                @if ($featured_storys)
                @foreach ($featured_storys as $item)
                <div class="popular_post">
                    <a href="{{ route('techglossy.details', $item->slug) }}" class="d-flex align-items-center text-decoration-none">
                        <img src="{{ asset('storage/' . $item->image) }}" 
                             alt="{{ $item->title }}" 
                             onerror="this.onerror=null;this.src='https://picsum.photos/60/60?random={{ $item->id }}';">
                        <p class="mb-0 ms-2">{{ Str::limit($item->title, 30) }}</p>
                    </a>
                </div>
                @endforeach
                @endif
                <div class="mt-4">
                    <img src="https://picsum.photos/580/420?random" class="rounded img-fluid">
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-4 col-12 d-flex justify-content-center">
                {{ $client_storys->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
