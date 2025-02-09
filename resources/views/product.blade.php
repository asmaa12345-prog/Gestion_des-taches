<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Product</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <img src="https://img.freepik.com/free-photo/leather-shoes-wooden-background_1203-7618.jpg?ga=GA1.1.1712261434.1710282507&semt=ais_incoming" class="card-img-top" alt="صورة المنتج">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $product['name'] }}</h5>
                        <p class="card-text">{{ $product['description'] }}</p>
                        <h6 class="text-success text-center">{{ $product['price'] }}</h6>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary">Buy now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
