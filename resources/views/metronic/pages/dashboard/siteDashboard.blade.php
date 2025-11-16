<x-admin-app-layout :title="'Site Content Dashboard'">
    <style>
        .text-link {
            color: #ffffff;
            font-size: 18px;
            text-decoration: none;
            font-weight: 500;
            position: relative;
            transition: all 0.3s ease;
        }

        .text-link::after {
            content: '';
            position: absolute;
            width: 0%;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #4b5675;
            transition: width 0.3s ease;
        }

        .text-link:hover::after {
            width: 100%;
        }

        .text-link:hover {
            color: #ffffff;
        }
    </style>

    <div class="row gx-5">
        @php
            $cards = [
                [
                    'title' => 'Product Stats',
                    'data' => [
                        ['name' => 'Total Product', 'amount' => $total_products],
                        ['name' => 'Approved Product', 'amount' => $approved_products],
                        ['name' => 'Pending Approval', 'amount' => $sourced_products],
                    ],
                    'gradient' => 'linear-gradient(to right, #ffff, #F2FFF8)',
                ],
                [
                    'title' => 'Category Stats',
                    'data' => [
                        ['name' => 'Total Category', 'amount' => $categories],
                        ['name' => 'Sub Category', 'amount' => $sub_categories],
                        ['name' => 'Sub Sub Category', 'amount' => $sub_sub_categories],
                    ],
                    'gradient' => 'linear-gradient(to right, #ffff, #F2FFF8)',
                ],
                [
                    'title' => 'Page Stats',
                    'data' => [
                        ['name' => 'Brand', 'amount' => $brands],
                        ['name' => 'Solution', 'amount' => $solutions],
                        ['name' => 'Feature', 'amount' => $features],
                    ],
                    'gradient' => 'linear-gradient(to right, #ffff, #F2FFF8)',
                ],
                [
                    'title' => 'Content Stats',
                    'data' => [
                        ['name' => 'Blogs', 'amount' => 10],
                        ['name' => 'Techglossy', 'amount' => 6],
                        ['name' => 'Client Story', 'amount' => 8],
                    ],
                    'gradient' => 'linear-gradient(to right, #ffff, #F2FFF8)',
                ],
            ];
        @endphp

        @foreach ($cards as $card)
            <div class="col-lg-3 col-md-6">
                <div class="text-white card rounded-3 h-100" style="background: {{ $card['gradient'] }}; border: none;">

                    <!-- Card Header -->
                    <div class="pt-5 border-0 card-header ps-7">
                        <h3 class="mb-0">{{ $card['title'] }}</h3>
                    </div>

                    <!-- Card Body: List of amounts -->
                    <div class="p-5 py-0 card-body">
                        <ul class="bg-transparent list-group list-group-flush">
                            @foreach ($card['data'] as $item)
                                <li class="p-2 list-group-item d-flex justify-content-between align-items-center"
                                    style="background: transparent; color: black;">
                                    <span class="">{{ $item['name'] }}</span>
                                    <span class="fw-bold ">{{ $item['amount'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Card Footer: Total -->
                    <div class="py-3 border-0 card-footer d-flex justify-content-between">
                        <span class="text-black fw-bold">
                            Total:
                        </span>
                        <span class="text-black fw-bold">
                            {{ collect($card['data'])->sum('amount') }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>




    <div class="mt-5 row gx-5">
        <div class="col-lg-12">
            <div class="mb-5 card" style="background-image: linear-gradient(to right, #003b659e, #003B65)">
                <div class="flex-wrap p-5 d-flex align-items-center justify-content-between">
                    {{-- Left side text --}}
                    <div class="me-3 fw-bold fs-3">
                        Quick Links:
                    </div>

                    {{-- Right side links --}}
                    <div class="flex-wrap gap-3 d-flex">
                        @php
                            $allLinks = [
                                ['url' => route('admin.job-post.index'), 'title' => 'Job Post'],
                                ['url' => route('admin.blog.index'), 'title' => 'Blog'],
                                ['url' => route('techglossy.index'), 'title' => 'Techglossy'],
                                ['url' => route('feature.index'), 'title' => 'Feature'],
                                ['url' => route('clientstory.index'), 'title' => 'Client Story'],
                                ['url' => route('show-case-video.index'), 'title' => 'Showcase'],
                                ['url' => route('policy.index'), 'title' => 'Terms & Policy'],
                                ['url' => route('admin.brand.index'), 'title' => 'Brand'],
                                ['url' => route('admin.category.index'), 'title' => 'Category'],
                                ['url' => route('product-sourcing.index'), 'title' => 'Sourcing'],
                                ['url' => route('learnMore.index'), 'title' => 'Learn-more'],
                                ['url' => route('admin.catalogues.index'), 'title' => 'Catalogues'],
                                ['url' => route('admin.solution-cms.index'), 'title' => 'Solution'],
                                ['url' => route('sas.index'), 'title' => 'SAS'],
                            ];
                        @endphp

                        @foreach ($allLinks as $link)
                            <a href="{{ $link['url'] }}" class="text-link"
                                style="text-decoration: underline; color: #ffffff;">
                                {{ $link['title'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===== Builder Sections ===== --}}
    <div class="row gx-5">
        @php
            $builders = [
                [
                    'title' => 'Common Page Builder',
                    'links' => [
                        [
                            'index' => route('admin.row.index'),
                            'create' => route('admin.row.create'),
                            'title' => 'Row Builder',
                        ],
                        [
                            'index' => route('solutionCard.index'),
                            'create' => route('solutionCard.create'),
                            'title' => 'Solution Card',
                        ],
                        [
                            'index' => route('homepage.index'),
                            'create' => route('homepage.create'),
                            'title' => 'Homepage',
                        ],
                        [
                            'index' => route('learnMore.index'),
                            'create' => route('learnMore.create'),
                            'title' => 'Learnmore Page',
                        ],
                        [
                            'index' => route('what-we-do-page.index'),
                            'create' => route('what-we-do-page.create'),
                            'title' => 'What We Do',
                        ],
                        [
                            'index' => route('about-us.index'),
                            'create' => route('about-us.create'),
                            'title' => 'About Us',
                        ],
                    ],
                ],
                [
                    'title' => 'Software & Hardware Builder',
                    'links' => [
                        [
                            'index' => route('software-info-page.index'),
                            'create' => route('software-info-page.create'),
                            'title' => 'Software Info',
                        ],
                        [
                            'index' => route('software-common-page.index'),
                            'create' => route('software-common-page.create'),
                            'title' => 'Software Common',
                        ],
                        [
                            'index' => route('hardware-info-page.index'),
                            'create' => route('hardware-info-page.create'),
                            'title' => 'Hardware Info',
                        ],
                        [
                            'index' => route('hardware-common-page.index'),
                            'create' => route('hardware-common-page.create'),
                            'title' => 'Hardware Common',
                        ],
                        [
                            'index' => route('industry.index'),
                            'create' => route('industry.create'),
                            'title' => 'Industry',
                        ],
                        [
                            'index' => route('industryPage.index'),
                            'create' => route('industryPage.create'),
                            'title' => 'Industry Details',
                        ],
                    ],
                ],
                [
                    'title' => 'Portfolio',
                    'links' => [
                        [
                            'index' => route('portfolio-category.index'),
                            'create' => route('portfolio-category.create'),
                            'title' => 'Portfolio Category',
                        ],
                        [
                            'index' => route('portfolio-client.index'),
                            'create' => route('portfolio-client.create'),
                            'title' => 'Portfolio Clients',
                        ],
                        [
                            'index' => route('portfolio-team.index'),
                            'create' => route('portfolio-team.create'),
                            'title' => 'Portfolio Team',
                        ],
                        [
                            'index' => route('portfolio-choose-us.index'),
                            'create' => route('portfolio-choose-us.create'),
                            'title' => 'Portfolio Choose',
                        ],
                        [
                            'index' => route('portfolio-page.index'),
                            'create' => route('portfolio-page.create'),
                            'title' => 'Portfolio Page',
                        ],
                        [
                            'index' => route('portfolio-detail.index'),
                            'create' => route('portfolio-detail.create'),
                            'title' => 'Portfolio Details',
                        ],
                    ],
                ],
                [
                    'title' => 'Others Page Builder',
                    'links' => [
                        [
                            'index' => route('admin.brandPage.index'),
                            'create' => route('admin.brandPage.create'),
                            'title' => 'Brand Page',
                        ],
                        [
                            'index' => route('training-page.index'),
                            'create' => route('training-page.create'),
                            'title' => 'Training Page',
                        ],
                        [
                            'index' => route('solutionDetails.index'),
                            'create' => route('solutionDetails.create'),
                            'title' => 'Solution Details',
                        ],
                        [
                            'index' => route('portfolio-client-feedback.index'),
                            'create' => route('portfolio-client-feedback.create'),
                            'title' => 'Client Feedback',
                        ],
                        [
                            'index' => route('admin.catalogues.index'),
                            'create' => route('admin.catalogues.create'),
                            'title' => 'Catalogues',
                        ],
                    ],
                ],
            ];
        @endphp

        @foreach ($builders as $builder)
            <div class="col-lg-3 col-md-6">

                {{-- Card Links --}}
                <div class="shadow-sm card rounded-3 h-100"
                    style="background: linear-gradient(to right, #ffff, #FFFBF2) !important;">
                    {{-- Card Header --}}
                    <div class="pt-8 ps-8 bg-gradient rounded-3 d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 text-black">{{ $builder['title'] }}</h3>
                    </div>
                    <div class="pt-4 card-body">
                        <div class="list-group list-group-flush">
                            @foreach ($builder['links'] as $link)
                                <div class="bg-transparent ps-0 list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    <a href="{{ $link['index'] }}"
                                        class="">
                                        <span>{{ $link['title'] }}</span>
                                    </a>
                                    <a href="{{ $link['create'] }}"
                                        class="">
                                        <i class="fas fa-plus-circle text-primary"></i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Optional Hover Effect --}}
    <style>
        .list-group-item {
            transition: all 0.2s ease-in-out;
        }

        .list-group-item:hover {
            background-color: #f5f5f5;
            transform: translateX(5px);
            cursor: pointer;
        }
    </style>


</x-admin-app-layout>
