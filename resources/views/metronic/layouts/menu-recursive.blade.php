@foreach ($items as $item)
    @php
        $isActive = isset($item['route']) && Route::is($item['route']) || Route::is($item['routes']);
        $hasSubMenu = !empty($item['subMenu']);
    @endphp

    @if ($hasSubMenu)
        <div data-kt-menu-trigger="click"
            class="menu-item menu-accordion {{ Route::is(...($item['routes'] ?? [])) ? 'here show' : '' }}">
            <span class="menu-link">
                @if (isset($item['icon']))
                    <span class="menu-icon">
                        <span class="svg-icon svg-icon-2">
                            <i class="{{ $item['icon'] }}"></i>
                        </span>
                    </span>
                @else
                    <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                @endif
                <span class="menu-title">{{ $item['title'] }}</span>
                <span class="menu-arrow"></span>
            </span>

            <div class="menu-sub menu-sub-accordion">
                @include('metronic.layouts.menu-recursive', ['items' => $item['subMenu']])
            </div>
        </div>
    @else
        <div class="menu-item">
            <a class="menu-link {{ $isActive ? 'active' : '' }}"
                href="{{ isset($item['route']) ? route($item['route']) : '#' }}">
                @if (isset($item['icon']))
                    <span class="menu-icon">
                        <span class="svg-icon svg-icon-2">
                            <i class="{{ $item['icon'] }}"></i>
                        </span>
                    </span>
                @else
                    <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                @endif
                <span class="menu-title">{{ $item['title'] }}</span>
            </a>
        </div>
    @endif
@endforeach
