<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="/" style="margin-left: 10px">RoyalApps</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
       
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li style="margin-right: 10px"><a href="/profile"><i class="fa-solid fa-user"></i> {{session('name')}}</a></li>
          <li style="margin-right: 10px"><a href="/logout"><span class="glyphicon glyphicon-log-in " ></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>