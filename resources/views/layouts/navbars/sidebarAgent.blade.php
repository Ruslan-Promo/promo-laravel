<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'products') class="active " @endif>
                <a href="{{ route('products.agent.index') }}">
                    <i class="tim-icons icon-cart"></i>
                    <p>{{ __('admin.Products') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
