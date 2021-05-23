<aside class="sidebar-front">
        {{-- Sidebar Content --}}

{{-- Widget #1 --}}

<section class="sidebar-widget sidebar-widget--search">
    <input class="sidebar-widget--search__input" type="text" name="" id="" placeholder="Cerca Su Salvoblog">
    <button class="sidebar-widget--search__button"><i class="fas fa-search"></i></button>
</section>

{{-- Widget #2 --}}

<section class="sidebar-widget sidebar-widget--ad">
    <h3 class="sidebar-widget__heading">Pubblicità</h3>

    <img class="sidebar-widget--ad__image" src="{{asset('img/boolean-ad.jpg')}}" alt="boolean ad">
</section>


{{-- Widget #3 --}}

<section class="sidebar-widget sidebar-widget--share">

    <h3 class="sidebar-widget__heading">Condividi Sui Social</h3>

    <div class="sidebar-social-icon-container">
        <div class="sidebar-social-icon sidebar-social-icon--facebook"><a href="#"><i class="fab fa-facebook-f"></i></a></div>
        <div class="sidebar-social-icon sidebar-social-icon--whatsapp"><a href="#"><i class="fab fa-whatsapp"></i></a></div>
        <div class="sidebar-social-icon sidebar-social-icon--pinterest"><a href="#"><i class="fab fa-pinterest-p"></i></a></div>
        <div class="sidebar-social-icon sidebar-social-icon--twitter"><a href="#"><i class="fab fa-twitter"></i></a></div>
    </div>

</section>

{{-- Widget #4 --}}

<section class="sidebar-widget sidebar-widget--users">

    <h3 class="sidebar-widget__heading">Area Riservata</h3>

    
        @auth
            Autenticato come <strong>{{Auth::user()->name}}</strong>. Link Rapidi:

            <ul>
                <li class="sidebar-user-nav__list-item"><a href="{{ url('/admin') }}">Home Dashboard</a></li>
                <li class="sidebar-user-nav__list-item"><a href="{{route('admin.posts.index')}}">Articoli</a></li>
                <li class="sidebar-user-nav__list-item"><a href="{{route('admin.categories.index')}}">Categorie</a></li>
                <li class="sidebar-user-nav__list-item"><a href="{{route('admin.tags.index')}}">Tag</a></li>

                <li class="sidebar-user-nav__list-item sidebar-user-nav__list-item--large">
                    <form action="{{route('logout')}}" method="post" >
                        @csrf
                        <button type="submit" class="my-btn my-btn--primary my-btn--medium">Log-Out</button>
                    </form>
                </li>  

            </ul>

            @else

            Ti piacerebbe collaborare con <strong>SalvoBlog?</strong> Usa i pulsanti qui sotto per registrarti oppure per fare il log-in.
            <nav class="sidebar-user-nav">
                <ul>
                    <li class="sidebar-user-nav__list-item sidebar-user-nav__list-item--large"><a class="my-btn my-btn--medium my-btn--red" href="{{route('register')}}">Registrati</a></li>
                    <li class="sidebar-user-nav__list-item sidebar-user-nav__list-item--large"><a class="my-btn my-btn--medium my-btn--primary" href="{{route('login')}}">Log-In</a></li>
                </ul>
            </nav>


        @endauth

</section>




{{-- End of Sidebar Content --}}
</aside>