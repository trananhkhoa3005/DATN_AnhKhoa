<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký tài khoản</title>
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
    <form action="{{ route('signup') }}" method="POST">
        @csrf
        <section class="vh-100"
            style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJaCRsck-G7hLQlh3xosmLmUnYjwAn_aMDmA&s');">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Tạo tài khoản</h2>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input name="name" type="text" id="form3Example1cg"
                                            class="form-control form-control-lg" placeholder="Nhập tên của bạn" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input name="email" type="email" id="form3Example3cg"
                                            class="form-control form-control-lg" placeholder="Nhập email" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input name="pass" type="password" id="form3Example4cg"
                                            class="form-control form-control-lg" placeholder="Nhập mật khẩu" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input name="phone" type="text" id="form3Example4cdg"
                                            class="form-control form-control-lg" placeholder="Nhập số điện thoại" />
                                    </div>

                                    {{-- <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="form2Example3cg" />
                                        <label class="form-check-label" for="form2Example3g">
                                            I agree all statements in <a href="#!" class="text-body"><u>Terms of
                                                    service</u></a>
                                        </label>
                                    </div> --}}

                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-lg btn-block btn-primary"
                                            style="background-color: #dd4b39;" type="submit">Đăng ký</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Đã có tài khoản? <a
                                            href="{{ route('login') }}" class="fw-bold text-body"><u>Đăng
                                                nhập</u></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>

</html>
