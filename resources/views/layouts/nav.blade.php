
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">STORE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
         
          <li class="nav-item">
            <a class="nav-link" href="{{ route('listCategories') }}">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('listProducts')}}">Products</a>
          </li>
          
        </ul>

        <h1>‖</h1>
        <ul class="navbar-nav">
         
          <li class="nav-item">
            <a class="nav-link" href="{{route('listCategories_Elq')}}">Categories Eloquent</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Products Eloquent</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
  <div class="col-sm-12">

        <h5 class="text-center">Quản lí Kho Hàng</h5>
</div>

