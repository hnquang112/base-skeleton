@inject ('request', 'Illuminate\Http\Request')

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ auth()->user()->avatar_image }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->display_name }}</p>
                <p>{{ auth()->user()->role_name }}</p>
                {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            </div>
        </div>
        <!-- sidebar menu: style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview{{ $request->is('cms/dashboard*') ? ' active' : '' }}">
                <a href="{{ route('cms.dashboard.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview{{ $request->is('cms/articles*') ? ' active' : '' }}">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Articles</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li {{ $request->is('cms/articles*') && !$request->is('cms/articles/create') ? 'class=active' : '' }}>
                        <a href="{{ route('cms.articles.index') }}"><i class="fa fa-circle-o"></i> Articles List</a>
                    </li>
                    <li {{ $request->is('cms/articles/create') ? 'class=active' : '' }}>
                        <a href="{{ route('cms.articles.create') }}"><i class="fa fa-circle-o"></i> Write New Article</a>
                    </li>
                </ul>
            </li>
            <li class="treeview{{ $request->is('cms/products*') || $request->is('cms/reviews*') || $request->is('cms/orders*') ? ' active' : '' }}">
                <a href="#">
                    <i class="fa fa-paper-plane"></i> <span>Products</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li {{ $request->is('cms/products*') && !$request->is('cms/products/create') ? 'class=active' : '' }}>
                        <a href="{{ route('cms.products.index') }}"><i class="fa fa-circle-o"></i> Products List</a>
                    </li>
                    <li {{ $request->is('cms/products/create') ? 'class=active' : '' }}>
                        <a href="{{ route('cms.products.create') }}"><i class="fa fa-circle-o"></i> Add New Product</a>
                    </li>
                    <li {{ $request->is('cms/reviews*') ? 'class=active' : '' }}>
                        <a href="{{ route('cms.reviews.index') }}"><i class="fa fa-star-half-o"></i> Reviews</a>
                    </li>
                    <li {{ $request->is('cms/orders*') ? 'class=active' : '' }}>
                        <a href="{{ route('cms.orders.index') }}"><i class="fa fa-money"></i> Orders</a>
                    </li>
                </ul>
            </li>
            @can ('view', 'App\User')
                <li class="treeview{{ $request->is('cms/categories*') || $request->is('cms/tags*')
                    ? ' active' : '' }}">
                    <a href="#">
                        <i class="fa fa-sitemap"></i> <span>Taxonomies</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li {{ $request->is('cms/categories*') ? 'class=active' : '' }}>
                            <a href="{{ route('cms.categories.index') }}"><i class="fa fa-list-ul"></i> Categories</a>
                        </li>
                        <li {{ $request->is('cms/tags*') ? 'class=active' : '' }}>
                            <a href="{{ route('cms.tags.index') }}"><i class="fa fa-tags"></i> Tags</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview{{ $request->is('cms/users*') || $request->is('cms/feedback*') ? ' active' : '' }}">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Users</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li {{ $request->is('cms/users*') && !$request->is('cms/users/create') ? 'class=active' : '' }}>
                            <a href="{{ route('cms.users.index') }}"><i class="fa fa-circle-o"></i> Users List</a>
                        </li>
                        <li {{ $request->is('cms/users/create') ? 'class=active' : '' }}>
                            <a href="{{ route('cms.users.create') }}"><i class="fa fa-circle-o"></i> Add New User</a>
                        </li>
                        <li {{ $request->is('cms/feedback*') ? 'class=active' : '' }}>
                            <a href="{{ route('cms.feedback.index') }}"><i class="fa fa-envelope"></i> Customer Feedback</a>
                        </li>
                    </ul>
                </li>
            @endcan
            <li class="treeview {{ $request->is('cms/settings*') || $request->is('cms/sliders*') || $request->is('cms/media*')
                || $request->is('cms/testimonials*')? ' active' : '' }}">
                <a href="#">
                    <i class="fa fa-gears"></i> <span>Settings</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    @can ('view', 'App\User')
                        <li {{ $request->is('cms/settings*') ? 'class=active' : '' }}>
                            <a href="{{ route('cms.settings.index') }}"><i class="fa fa-cog"></i> General Settings</a>
                        </li>
                    @endcan
                    <li {{ $request->is('cms/sliders*') ? 'class=active' : '' }}>
                        <a href="{{ route('cms.sliders.index') }}"><i class="fa fa-picture-o"></i> Home Slider</a>
                    </li>
                    <li {{ $request->is('cms/testimonials*') ? 'class=active' : '' }}>
                        <a href="{{ route('cms.testimonials.index') }}"><i class="fa fa-quote-left"></i> Home Testimonials</a>
                    </li>
                    <li {{ $request->is('cms/media*') ? 'class=active' : '' }}>
                        <a href="{{ route('cms.media.index') }}"><i class="fa fa-camera"></i> Uploaded Media</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section><!-- /.sidebar -->
</aside>