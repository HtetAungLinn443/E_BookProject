<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link href="{{ asset('storage/image/logo.png') }}" rel="icon" type="image/png" />
    <!--Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('storage/css/admin/list.css') }}" />
</head>

<body>
    <div class="container-fluid">
        <div class="navigation">
            <ul>
                <li class="list {{ Request::is('profile') ? 'active' : '' }}">
                    <b></b>
                    <b></b>
                    <a href="{{ route('admin#profile') }}">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="text">Profile</span>
                    </a>
                </li>
                <li class="list {{ Request::is('category/list') ? 'active' : '' }}">
                    <b></b>
                    <b></b>
                    <a href="{{ route('admin#categoryList') }}">
                        <span class="icon">
                            <ion-icon name="list-outline"></ion-icon>
                        </span>
                        <span class="text">Category List</span>
                    </a>
                </li>

                <li class="list {{ Request::is('book/list') ? 'active' : '' }}">
                    <b></b>
                    <b></b>
                    <a href="{{ route('admin#bookList') }}">
                        <span class="icon">
                            <i class="fa-solid fa-book"></i>
                        </span>
                        <span class="text">Book List</span>
                    </a>
                </li>

                <li class="list {{ Request::is('account/adminList') ? 'active' : '' }}">
                    <b></b>
                    <b></b>
                    <a href="{{ route('admin#adminList') }}">
                        <span class="icon">
                            <ion-icon name="people-circle-outline"></ion-icon>
                        </span>
                        <span class="text">Admin List</span>
                    </a>
                </li>

                <li class="list {{ Request::is('account/userList') ? 'active' : '' }}">
                    <b></b>
                    <b></b>
                    <a href="{{ route('admin#userList') }}">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="text">User List</span>
                    </a>
                </li>

                <li class="list {{ Request::is('setting/listPage') ? 'active' : '' }}">
                    <b></b>
                    <b></b>
                    <a href="{{ route('account#listPage') }}">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="text">Setting</span>
                    </a>
                </li>

                <li class="list">
                    <b></b>
                    <b></b>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <a href="#" type="submit">
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <input type="submit" class="btn outline-none text-white " value="Sign Out">
                        </a>
                    </form>
                </li>
            </ul>
        </div>

        @yield('contact')
    </div>
</body>

<!-- Bootstrap JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
<!-- Jquery Link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- ionicons Link -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
{{-- js link --}}
<script src="{{ asset('storage/js/admin/script.js') }}"></script>

@yield('script')

</html>
