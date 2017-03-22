<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Quotify</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            @if(Auth::guest())
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
            @else
                <li><a href="{{URL::action('HomeController@index')}}">Home</a></li>
                <li><a href="{{URL::action('AuthorsController@index')}}">Authors</a></li>
                <li><a href="{{URL::action('CategoriesController@index')}}">Categories</a></li>
                <li><a href="{{URL::action('QuotesController@new')}}">Add Quote</a></li>
                @if (Auth::user()->admin)
                    <li><a href="{{URL::action('UsersController@index')}}">Users</a></li>
                    <li><a href="{{URL::action('AuthorsController@new')}}">New Author</a></li>
                    <li><a href="{{URL::action('CategoriesController@new')}}">New Category</a></li>
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{url('/users', [Auth::user()->id])}}">Profile</a>
                        </li>
                        <li>
                            <a href={{URL::action('UsersController@edit', [Auth::user()->id])}}>Settings</a>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</nav>
