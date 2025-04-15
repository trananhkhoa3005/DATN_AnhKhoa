<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            .vh-100 {
                background-size: cover; /* Làm cho ảnh phủ đầy phần tử */
                background-position: center center; /* Đặt ảnh tại trung tâm */
                background-attachment: fixed; /* Giữ ảnh nền cố định khi cuộn trang */
                height: 100vh; /* Chiếm 100% chiều cao của màn hình */
                width: 100%; /* Chiếm 100% chiều rộng của phần tử */
                background-repeat: no-repeat; /* Ngừng việc lặp lại ảnh */
            }
        </style>
</head>

<body>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <section class="vh-100"
            style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJaCRsck-G7hLQlh3xosmLmUnYjwAn_aMDmA&s');">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <h3 class="mb-5">Đăng nhập</h3>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email" id="typeEmailX-2" class="form-control form-control-lg" name="email"
                                        placeholder="Nhập email" />
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="pass"
                                        placeholder="Nhập mật khẩu" />
                                </div>

                                <div class="form-check d-flex mb-5">
                                    <label class="form-check-label" for="form2Example3g">
                                        <a href="#" class="text-body" style="text-decoration: none;"><u>Quên mật khẩu?</u></a>
                                    </label>
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Đăng nhập</button>

                                <hr class="my-4">

                                <p class="text-center text-muted mt-5 mb-0">Tạo tài khoản? <a
                                        href="{{ route('signup') }}" class="fw-bold text-body" style="text-decoration: none;"><u>Đăng ký</u></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>

</html>
