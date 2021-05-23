<div class="admin-sidebar">
    <nav class="admin-sidebar__nav">
        <ul>
            <li class="admin-sidebar__menu-item"><i class="fas fa-tachometer-alt"></i><a href="{{ url('/admin') }}">Bacheca</a></li>
            <li class="admin-sidebar__menu-item"><i class="far fa-copy"></i><a href="{{route('admin.posts.index')}}">Articoli</a></li>
            <li class="admin-sidebar__menu-item"><i class="fas fa-list"></i><a href="{{route('admin.categories.index')}}">Categorie</a></li>
            <li class="admin-sidebar__menu-item"><i class="fas fa-tags"></i><a href="{{route('admin.tags.index')}}">Tags</a></li>
            <li class="admin-sidebar__menu-item admin-sidebar__menu-item--comments"><span><i class="fas fa-comment-alt"></i>Commenti</span></li>
            <li class="admin-sidebar__menu-item"><i class="fas fa-paint-brush"></i>Aspetto</li>
            <li class="admin-sidebar__menu-item"><i class="fas fa-plug"></i>Plug-in</li>
            <li class="admin-sidebar__menu-item"><i class="fas fa-users"></i>Utenti</li>
        </ul>
    </nav>
</div>