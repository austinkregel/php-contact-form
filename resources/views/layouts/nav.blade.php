<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
        Menu <i class="fa fa-bars"></i>
    </button>
    @guest
    <a class="navbar-brand page-scroll" href="#page-top">
        <i class="fa fa-play-circle"></i> <span class="light">Dealer</span> Inspire Challenge
    </a>
    @else
    <a class="navbar-brand page-scroll" href="/">
        <i class="fa fa-play-circle"></i> <span class="light">Dealer</span> Inspire Challenge
    </a>
    @endguest
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-right navbar-main-collapse">
    @guest
    <ul class="nav navbar-nav">
        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
        <li class="hidden">
            <a href="#page-top"></a>
        </li>
        <li>
            <a class="page-scroll" href="#about">About</a>
        </li> 
        <li>
            <a class="page-scroll" href="#coffee">Coffee</a>
        </li>
        <li>
            <a class="page-scroll" href="#contact">Contact</a>
        </li>
    </ul>
    @else
    <ul class="nav navbar-nav">
        <li>
    
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>
    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li> 
    </ul>
    @endguest
</div>