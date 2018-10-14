<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">                    
                    <a class="dropdown-item" href="{{ route('dictionaries') }}">Dictionaries</a>
                    <a class="dropdown-item" href="{{ route('repeat.index') }}">Repeat</a>
                    <a class="dropdown-item" href="{{ route('user.reader.index') }}">Reader</a>
                    <a class="dropdown-item" href="{{ route('attention') }}">Attention</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('dictionary.index') }}">Dictionaries</a>                    
                    <a class="dropdown-item" href="{{ route('reader.index') }}">Reader</a>
                </div>
            </li>        
        </ul>
    </div>
</nav>