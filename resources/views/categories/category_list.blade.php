<div class="row">
    <div class="col-md-12 categories">
        <ul class="list-inline">
            @foreach($categories as $cat)
                <li>
                    <a href="{{URL::action('CategoriesController@show', [$cat->slug])}}" class={{$id==$cat->id ? 'active' : 'inactive'}}>
                        {{$cat->name}}
                    </a>
                </li>
            @endforeach
        </ul>
        <a class='toggle-categories' href="#">Categories <i class="fa fa-caret-down" aria-hidden="true"></i></a>
    </div>
</div>