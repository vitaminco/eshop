<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.danhmuc.index') }}">Trang danh
                        sách</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.sanpham.index') }}">Trang danh
                        sách san phẩm</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
