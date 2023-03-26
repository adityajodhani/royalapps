<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<div class="login-form">
    <form action="{{route('login.attempt')}}" method="POST">
        @csrf
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" required="required" name="email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required" name="password">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-block" placeholder="Submit"/>
        </div>
        <div class="clearfix">
            
            <a href="#" class="float-right">Forgot Password?</a>
        </div>        
    </form>
    
</div>
<style>
    .login-form {
        width: 340px;
        margin: 50px auto;
          font-size: 15px;
    }
    .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>