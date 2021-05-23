<header class="header--back"> 

    <nav class="header-menu--back">
        <ul>

            <li class="header-menu--back__item header-menu--back__item--wordpress-icon">
                <i class="fab fa-wordpress"></i>
            </li>

            <li class="header-menu--back__item header-menu--back__item--create-new">
                <nav class="dropdown" >
                    <a  href="" class=""  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-plus-square"></i> Aggiungi...
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('admin.posts.create')}}">Articolo</a>
                        <a class="dropdown-item" href="{{route('admin.categories.index')}}">Categoria</a>
                        <a class="dropdown-item" href="{{route('admin.tags.index')}}">Tag</a>
                    </div>
                </nav>
            </li>

            <li class="header-menu--back__item header-menu--back__item--posts-index">
                <a href="{{route('guest-home')}}"><i class="fas fa-home"></i>Visita il Sito</a>
            </li>


            <li class="header-menu--back__item header-menu--back__item--yoast-seo">
                <i class="fab fa-yoast"></i>
            </li>

            <li class="header-menu--back__item header-menu--back__item--user-menu">
                <i class="fas fa-user"></i>Ciao, <strong>{{Auth::user()->name}}</strong>
                <form style="display:inline;" action="{{route('logout')}}" method="post" >
                    @csrf
                    <button type="submit" class="my-btn my-btn--red my-btn--small"><i class="fas fa-power-off"></i></button>
                </form>
            </li>

        </ul>
    </nav>

</header>