<a href="index.html">
    <div class="logo-container" id="step1" style="height: 60px;">
        <h1 style="margin-top: 12px;font-size:30px;">Taxi App Clone</h1>
        
    </div>
</a>
<!-- Logo End -->

<!-- Menu Start -->
<ul class="menu">
    <li class="lightblue {{($pagename=='admin') ? 'active' : ''}}">
        <a href="{{ url('/administrator') }}">
        	<span class="menu-icon"><i class="fa fa-user"></i></span>
        	<span class="menu-text">Administrators</span>
        </a>
    </li>
    <li class="lightblue {{($pagename=='cms') ? 'active' : ''}}">
    	<a href="{{ url('/cms') }}">
      		<span class="menu-icon"><i class="fa fa-info-circle"></i></span>
      		<span class="menu-text">CMS</span>
    	</a>
    </li>
</ul>

<!-- Menu End -->