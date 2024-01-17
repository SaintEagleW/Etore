<!DOCTYPE html>
<html>

<head>
    <title>Etore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
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
            margin-bottom: 50px;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
        }

        /* #carouselExampleIndicators {
            margin-top: 100px;
        } */

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

        .carousel {
            /* display: flex;
            flex-direction: column;
            align-items: center; */
            width: 800px;
            margin-top: 100px;
            /* overflow: hidden; */
        }

        .carousel-inner {
            display: block;
            justify-content: center;
        }

        .carousel-image {
            width: 800px;
            height: 300px;
            display: none;
            /* 默认情况下隐藏所有图像 */
        }


        .product-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 800px;
        }

        .recommand {
            display: flex;
            flex-direction: column;
            margin: 50px 0px;
        }

        .popular {
            display: flex;
            flex-direction: column;
        }

        .title {
            font-size: 15px;
            font-weight: bolder;
            font-family: "Unbounded";
            justify-content: left;
            text-align: start;
        }

        .title i {
            color: orange;
            font-weight: bold;
            margin-right: 5px;
        }

        .product-row {
            width: 100%;
            height: 30%;
        }

        .product-item-r {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            align-items: center;
            /* text width: 25%; */
            margin: 20px 15px;
        }

        .product-pic-r {
            max-width: 80px;
            /* height: 80px; */
        }

        .product-info-r {
            display: flex;
            flex-direction: column;
            font-size: 12px;
            font-weight: bolder;
            text-align: center;
            text-decoration: none;
            color: #000;
        }

        .product-item {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            /* text width: 25%; */
            margin: 20px 30px;
        }

        .picture-p {
            width: 120px;
            height: 120px;
        }

        .product-pic {
            max-width: 120px;
            /* height: 120px; */
        }

        .product-pic img {
            max-width: 120px;
            /* height: 120px; */
        }

        .product-info {
            display: flex;
            flex-direction: column;
            font-size: 12px;
            font-weight: bolder;
            text-align: center;
            text-decoration: none;
            color: #000;
        }

        .product-price {
            color: #d12945;
        }

        a {
            text-decoration: none;
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

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <!-- <div class="carousel-item active">
                <img src="material/banner.png" class="d-block w-100 carousel-image" alt="...">
            </div> -->
            <div class="carousel-item active">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/003/631/369/small_2x/website-slider-for-black-friday-sale-with-copy-space-monoblock-gold-card-shopping-bag-gift-box-on-isolated-background-template-for-banner-mobile-social-media-ad-discount-store-shop-vector.jpg" class="d-block w-100 carousel-image" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://k.nooncdn.com/cms/pages/20201124/d014940da9460277a65a6579b69af1cd/en_mb-banner-macbook-hero.jpg" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/026/117/747/small_2x/elegant-christmas-sale-banner-with-gold-up-to-50-off-lettering-on-blue-gradient-background-in-framed-with-hand-drawn-christmas-elements-snowflakes-presents-snow-candy-cane-illustration-vector.jpg" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="product-container">
        <div class="recommand">
            <div class="title">
                <i class="fa-solid fa-grip-lines-vertical"></i>
                <label>Recommanded for you</label>
            </div>
            <div class="product" id="recommand">
            </div>
        </div>
        <div class="popular">
            <div class="title">
                <i class="fa-solid fa-grip-lines-vertical"></i>
                <label>Popular Items</label>
            </div>
            <div class="product" id="popular">
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            function RecommandItem(id, title, price, image) {
                this.id = id;
                this.title = title;
                this.price = price;
                this.image = image;

                this.render = () => {
                    const item = $('<div>').addClass('col-md-2')
                    const url = $('<a>').attr('href', `http://localhost:8000/commodity/${this.id}`).addClass('product-item-r').appendTo(item);
                    const img = $('<img>').attr('src', this.image).addClass('product-pic-r').appendTo(url);
                    const info = $('<div>').addClass('product-info-r').appendTo(url);
                    const title = $('<label>').attr('type', 'button').text(this.title).appendTo(info);
                    const price = $('<label>').attr('type', 'button').addClass('product-price').text(`$${this.price}`).appendTo(info);
                    return item;
                }
            }

            const render = (commodities) => {
                const list_r = $('#recommand');
                let row_r = null;

                for (i = 0; i < 6; i++) {
                    if (i % 6 === 0) {
                        if (row_r !== null) {
                            row_r.appendTo(list_r);
                        }

                        row_r = $('<div>').addClass('row product-row');
                    }

                    const commodity = commodities[i];
                    let recommandItem = new RecommandItem(
                        commodity.id,
                        commodity.title,
                        commodity.price,
                        commodity.imageUrl
                    );
                    let item = recommandItem.render();
                    row_r.append(item);
                }

                if (row_r !== null) {
                    row_r.appendTo(list_r);
                }


                const list_p = $('#popular');
                let row_p = null;

                for (i = 0; i < commodities.length; i++) {
                    if (i % 4 === 0) {
                        if (row_p !== null) {
                            row_p.appendTo(list_p);
                        }

                        row_p = $('<div>').addClass('row product-row');
                    }

                    let item = $('<div>').addClass('col-md-3').appendTo(row_p);
                    let url = $('<a>').attr('href', `http://localhost:8000/commodity/${commodities[i].id}`).addClass('product-item').appendTo(item);
                    let pic = $('<div>').addClass('picture-p').appendTo(url)
                    let img = $('<img>').attr('src', commodities[i].imageUrl).addClass('product-pic').appendTo(pic);
                    let info = $('<div>').addClass('product-info').appendTo(url);
                    let title = $('<label>').attr('type', 'button').text(commodities[i].title).appendTo(info);
                    let price = $('<label>').attr('type', 'button').addClass('product-price').text(`$${commodities[i].price}`).appendTo(info);
                }

                if (row_p !== null) {
                    row_p.appendTo(list_p);
                }
            }


            axios.get(
                'api/commodities', {}
            ).then(function(response) {
                console.log(response.data);
                render(response.data.data);
            }).catch(function(error) {
                console.error(error);
                alert(error.response);
            });
        });

        $(document).ready(function() {
            const token = getCookie('token');

            if (token !== null) {
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
            }
        });


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
    </script>
</body>

</html>