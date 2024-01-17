<html>

<head>
    <title>Etore Commodity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* justify-content: center; */
        }

        .header {
            position: fixed;
            height: 80px;
            width: 100%;
            background-color: #000;
            color: #fff;
            display: flex;
            flex-direction: row;
            padding: 10px 20px;
            /* margin-bottom: 50px; */
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: #fff;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
        }

        .icons {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }

        .icon {
            color: #fff;
            font-size: 30px;
            margin-right: 30px;
        }

        .search-container {
            position: relative;
            display: inline-block;
        }

        .search-bar {
            border-radius: 50px;
            font-size: 14px;
            padding: 15px;
            width: 200px;
            height: 30px;
            padding-right: 40px;
            margin-right: 30px;
        }

        .search-button {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            padding: 10px 40px;
            cursor: pointer;
            color: #AAA;
            font-size: 14px;
        }

        .h-avatar {
            width: 50px;
            height: 50px;
            background-color: #ccc;
        }

        .product-container {
            display: flex;
            flex-direction: row;
            /* align-items: center; */
            justify-content: center;
            font-family: "Unbounded";
            width: 800px;
            margin-top: 160px;
        }

        .product-image {
            display: flex;
            flex-direction: column;
            /* align-items: center; */
            text-align: start;
            justify-content: flex-start;
            width: 300px;
            margin-right: 70px;
        }

        .product-details {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            text-align: start;
            width: 315px;
        }

        .title {
            display: flex;
            flex-direction: row;
            font-size: 22px;
            font-weight: bold;
        }

        .rating {
            display: flex;
            flex-direction: row;
            font-size: 13px;
            font-weight: bold;
            color: #a6a6a6;
            padding-left: 5px;
            margin-top: 5px;
        }

        .stars {
            color: #f5ed84;
            margin-left: 10px;
            margin-right: 10px;
        }

        #voters {
            font-size: 10px;
        }

        .horizontal-line {
            width: 100%;
            height: 1.5px;
            background-color: #bababa;
            margin-top: -3px;
            margin-bottom: 5px;
        }


        .price {
            display: flex;
            flex-direction: row;
            font-family: Arial, sans-serif;
            font-size: 25px;
            font-weight: bold;
            color: #d12945;
        }

        .desc {
            font-size: 10px;
            color: #616161;
        }

        .quantity {
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
            text-align: center;
            background-color: #fff;
            font-size: 12px;
            height: 20px;
        }

        .quantity button {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: start;
            background-color: white;
            color: #616161;
            font-family: Arial, sans-serif;
            border: 1px solid #dedede;
            font-size: 15px;
        }

        .quantity input {
            width: 40px;
            text-align: center;
            color: #616161;
            font-family: Arial, sans-serif;
            border-top: 1px solid #dedede;
            border-bottom: 1px solid #dedede;
            border-left: 0px;
            border-right: 0px;
        }

        .cart {
            display: flex;
            flex-direction: row;
            margin-top: 20px;
            justify-content: space-between;
        }

        .cart button {
            width: 150px;
            font-size: 15px;
            font-weight: bold;
            padding: 5px;

        }

        #buyNowButton {
            background-color: #000;
            color: white;
        }

        #addToCartButton {
            background-color: white;
            color: #616161;
            border: 1px solid #dedede;
        }
    </style>
</head>

<body>
    <div class="header">
        <a class="logo" href="http://localhost:8000/"><i class="fas fa-store"></i> Etore</a>

        <div class="icons">
            <div class="search-container">
                <input type="text" class="search-bar" placeholder="Search">
                <i class="fa-solid fa-magnifying-glass search-button"></i>
            </div>
            <a href="http://localhost:8000/user/cart">
                <i class="fas fa-shopping-cart icon"></i>
            </a>
            <a href="http://localhost:8000/user/profile">
                <div class="rounded-circle h-avatar icon">
                    <img id="h-avatar" alt="Avatar" src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                </div>
            </a>
        </div>
    </div>

    <div class="product-container">
        <div class="product-image">
            <img id="pic">
        </div>
        <div class="product-details">
            <div class="title">
                <label id="title"></label>
                <!-- <p id="sku"></p> -->
            </div>
            <div class="rating">
                <p id="point">3.3</P>
                <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p id="voters">1,000 Ratings</p>
            </div>
            <div class="horizontal-line"></div>
            <div class="price">
                <p>$&nbsp;</p>
                <p id="price" class="price"></p>
            </div>

            <p id="desc" class="desc"></p>

            <div class="quantity">
                <button onclick="decrement()">-</button>
                <input type="text" id="quantity" value="1">
                <button onclick="increment()">+</button>
            </div>

            <div class="cart">
                <button type="submit" id="buyNowButton">Buy now</button>
                <button type="submit" id="addToCartButton">Add to cart</button>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            axios.get(
                '/api/commodity/' + productId, {}
            ).then(function(response) {
                const commodity = response.data.data;
                document.getElementById('title').textContent = commodity.title;
                document.getElementById('desc').innerHTML = commodity.description.replace(/\n/g, "<br>");
                document.getElementById('price').textContent = commodity.price;
                document.getElementById('pic').src = commodity.imageUrl;
            }).catch(function(error) {
                console.error(error.response);
                alert(error.response);
            });
        });
        $(document).ready(function() {
            const token = getCookie('token');
            axios.get('/api/user/profile', {})
                .then(function(response) {
                    if (response.status === 200) {
                        const avatarUrl = response.data.data.avatarUrl;
                        document.getElementById('h-avatar').src = avatarUrl;
                    }
                    if (response.status === 400 | response.status === 403) {
                        document.getElementById('h-avatar').src = "https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png";
                    }
                })
                .catch(function(error) {
                    console.error(error);
                });
        });

        $('body').on('click', '#buyNowButton', function(e) {
            e.preventDefault();
            const productId = getParameterByName('productId');
            const quantityInput = parseInt($('#quantity').val());
            const token = getCookie('token');
            if (token === null) {
                alert('請先登入。');
                window.location.href = `http://localhost:8000/user/login`;
            }
            axios.post(
                    '/api/commodity/addToCart', {
                        productId: productId,
                        quantity: quantityInput,
                    }
                )
                .then(function(response) {
                    console.log(productId, quantity);
                    window.location.href = `http://localhost:8000/user/cart`;
                })
                .catch(function(error) {
                    console.error('加車失敗', error);
                });
        });

        $('body').on('click', '#addToCartButton', function(e) {
            e.preventDefault();
            const productId = getParameterByName('productId');
            const quantityInput = parseInt($('#quantity').val());
            axios.post(
                    '/api/commodity/addToCart', {
                        productId: productId,
                        quantity: quantityInput,
                    }
                )
                .then(function(response) {
                    console.log(productId, quantity);
                    alert(response.data.message);
                })
                .catch(function(error) {
                    console.error('加車失敗', error);
                });
        });

        function getCookie(cookieName) {
            var name = cookieName + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var cookieArray = decodedCookie.split(';');
            for (var i = 0; i < cookieArray.length; i++) {
                var cookie = cookieArray[i];
                while (cookie.charAt(0) === ' ') {
                    cookie = cookie.substring(1);
                }
                if (cookie.indexOf(name) === 0) {
                    return cookie.substring(name.length, cookie.length);
                }
            }
            return null;
        }

        function getParameterByName(name, url) {
            if (!url) {
                url = window.location.href;
            }

            url = new URL(url);
            let productId = url.pathname.replace('/commodity/', '');
            console.log(productId);
            return productId;
        }

        var productId = getParameterByName('productId');

        var quantityInput = document.getElementById('quantity');

        function decrement() {
            var currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }

        function increment() {
            var currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        }

        function isUserLoggedIn() {
            const token = getCookie('token');

            if (token) {
                return true;
            }
            return false;
        }

        const cartLink = document.querySelector('a[href="http://localhost:8000/user/cart"]');
        const profileLink = document.querySelector('a[href="http://localhost:8000/user/profile"]');

        cartLink.addEventListener('click', function(e) {
            if (!isUserLoggedIn()) {
                e.preventDefault();
                window.location.href = 'http://localhost:8000/user/login';
            }
        });

        profileLink.addEventListener('click', function(e) {
            if (!isUserLoggedIn()) {
                e.preventDefault();
                window.location.href = 'http://localhost:8000/user/login';
            }
        });
    </script>
</body>

</html>