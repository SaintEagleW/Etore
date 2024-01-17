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

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            font-family: "Unbounded";
            margin-top: 80px;
        }

        .page-title {
            font-size: 20px;
            font-weight: bold;
            margin-top: 50px;
            margin-bottom: 30px;
        }

        .checkout-container {
            display: flex;
            flex-direction: row;
        }

        .left {
            display: flex;
            flex-direction: column;
            margin-right: 25px;
        }

        .block {
            display: flex;
            flex-direction: column;
            background-color: #f9f9f9;
            margin-bottom: 10px;
        }

        .block-title {
            background-color: #000;
            color: #fff;
            font-weight: bold;
            font-size: 15px;
            margin-bottom: 10px;
            padding: 10px 20px;
        }

        .order {
            /* display: flex;
            flex-direction: column; */
            padding: 15px;
        }

        .order-product {
            /* display: flex;
            flex: row; */
        }

        .order-productLeft {
            /* width: 50px;
            height: 50px; */
            /* text-align: left; */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .order-pic {
            max-width: 50px;
            max-height: 50px;
            width: auto;
            height: auto;
        }

        .order-productRight {
            display: flex;
            flex-direction: column;
            /* margin-left: 10px; */
        }

        .order-title {
            display: flex;
            flex-direction: row;
        }

        .order-itemName {
            font-size: 15px;
            font-weight: bold;
        }

        .order-detail {
            height: 100%;
            /* display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: 100%; */
        }

        .order-detailLeft {}

        .order-itemDesc {
            color: #969696;
            font-size: 10px;
            text-align: start;
        }

        .order-detailRight {
            /* display: flex;
            flex-direction: column;
            justify-content: end;
            
            width: 200px; */
            text-align: end;
        }

        .order-quantity {
            color: #969696;
            font-size: 10px;
        }

        .order-price {
            color: #d12945;
            font-size: 15px;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }

        .order-line {
            height: 2px;
            background-color: #ccc;
            /* margin: 0px 10px 15px 15px; */
        }

        .buyer-content {
            display: flex;
            flex-direction: row;
            font-size: 15px;
            font-weight: bold;
            justify-content: space-between;
            align-items: center;
            padding-left: 20px;
        }

        .buyer-title {
            display: flex;
            flex-direction: column;
            padding-top: 3px;
            color: #d12945;
        }

        .buyer-title label {
            height: 25px;
            text-align: start;
            margin-bottom: 5px;
            color: #000;
        }

        .buyer-input {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .buyer-input input {
            height: 25px;
            width: 300px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            /* border-color: #969696; */
            border-radius: 5px;
        }

        .delivery-content {
            display: flex;
            flex-direction: column;
            font-size: 15px;
            font-weight: bold;
            padding-left: 20px;
        }

        .delivery-method {
            margin-bottom: 10px;
        }

        .payment-content {
            display: flex;
            flex-direction: row;
            font-size: 15px;
            font-weight: bold;
            padding-left: 20px;
        }

        .payment-method {
            margin-right: 5px;
        }

        .amount-container {
            display: flex;
            flex-direction: column;
            font-weight: bold;
            width: 200px;
            margin-top: 50px;
            margin-left: 30px;
        }

        .amount-details {
            font-size: 13px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            font-size: 13px;
            font-weight: bold;
            padding-top: 20px;
            margin-bottom: 10px;
        }

        .amount-title {
            display: flex;
            flex-direction: column;
        }

        .amount-title label {
            margin-bottom: 10px;
        }

        .amount-price {
            display: flex;
            flex-direction: column;
            font-size: 13px;
            color: #d12945;
            font-weight: bold;
            text-align: start;
        }

        .amount-price-row {
            display: flex;
            flex-direction: row;
            margin-bottom: 10px;
        }

        .amount-line {
            height: 2px;
            width: 190px;
            background-color: #ccc;
            margin-bottom: 10px;
        }

        .amount-total {
            display: flex;
            flex-direction: row;
            font-size: 13px;
            font-weight: bold;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .total-price {
            color: #d12945;
        }

        .purchase-button button {
            text-align: center;
            width: 200px;
            font-size: 15px;
            font-weight: bold;
            padding: 5px;
            background-color: #000;
            color: #fff;
        }

        .right {
            display: flex;
            flex-direction: column;
            background-color: #f9f9f9;
            max-height: 250px;
            padding: 15px;
        }

        .right-title {
            font-size: 15px;
            font-weight: bold;
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
    <div class="container">
        <div class="page-title">
            <label>Checkout</label>
        </div>
        <div class="checkout-container">

            <div class="Left">

                <div class="block">
                    <div class="block-title">
                        <label>Items</label>
                    </div>
                    <div class="items" id="item"></div>
                </div>
                <div class="block">
                    <div class="block-title">
                        <label>Buyer</label>
                    </div>
                    <div class="buyer-content">
                        <div class="buyer-title">
                            <div>
                                <label>Name</label> *
                            </div>
                            <div>
                                <label>Phone Number</label> *
                            </div>
                            <div>
                                <label>Address</label> *
                            </div>



                        </div>
                        <div class="buyer-input">
                            <input id="name" required>
                            <input id="phone" required>
                            <input id="add" required>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
                <div class="block">
                    <div class="block-title">
                        <label>Delivery Method</label>
                    </div>
                    <div class="delivery-content form-check">
                        <div class="delivery-method form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" data-value="home_delivery">
                            <i class="fa-solid fa-truck-fast"></i>
                            Home Delivery
                            </label>
                        </div>
                        <div class="delivery-method form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" data-value="store_pickup">

                            <label class="form-check-label" for="flexRadioDefault1">
                                <i class="fa-solid fa-store"></i>
                                Store Pickup
                            </label>
                        </div>

                    </div>

                </div>
                <div class="block">
                    <div class="block-title">
                        <label>Payment Method</label>
                    </div>
                    <div class="payment-content">

                        <div class="payment-method">
                            <input type="radio" class="btn-check" name="options-base" id="option1" autocomplete="off" value="credit_card">
                            <label class="btn" for="option1">
                                <i class="fa-solid fa-store"></i>
                                Credit Card
                            </label>
                        </div>
                        <div class="payment-method">
                            <input type="radio" class="btn-check" name="options-base" id="option2" autocomplete="off" value="ATM">
                            <label class="btn" for="option2">
                                <i class="fa-solid fa-dollar-sign"></i>
                                ATM
                            </label>
                        </div>
                        <div class="payment-method">
                            <input type="radio" class="btn-check" name="options-base" id="option3" autocomplete="off" value="paypal">
                            <label class="btn" for="option3">
                                <i class="fa-brands fa-paypal"></i>
                                Paypal
                            </label>
                        </div>
                    </div>

                </div>
            </div>
            <div class="right">
                <label class='right-title'> Details </label>
                <div class="amount-details">
                    <div class="amount-title">
                        <label>Subtotal</label>
                        <label>Discount</label>
                    </div>
                    <div class="amount-price">
                        <div class="amount-price-row">
                            $&nbsp;<label id="subtotal"></label>
                        </div>
                        <div class="amount-price-row">
                            $&nbsp;
                            <label id="discount">0</label>
                        </div>

                    </div>
                </div>
                <div class="amount-line"></div>
                <div class="amount-total">
                    <label class="total-title">Total</label>
                    <div class="total-price">
                        $&nbsp;<label id="total"></label>
                    </div>

                </div>
                <div class="purchase-button">
                    <button type="submit" id="purchase">Purchase</button>
                </div>
            </div>

        </div>


    </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            fetchCheckoutData();
            // fetchCartCount();
        });

        const render = (items) => {
            const list = $('#item');
            // const subtotal = $('#subtotal');
            // const sum = 0;
            // list.empty();
            // subtotal.empty();

            for (i = 0; i < items.items.length; i++) {

                let row = $('<div>').addClass('row order').appendTo(list);
                let product = $('<div>').addClass('row order-product p-0 m-0').appendTo(row);
                let left = $('<div>').addClass('col-md-2 order-productLeft').appendTo(product);
                let img = $('<img>').attr('src', items.items[i].commodityImageUrl).addClass('order-pic').appendTo(left);
                let right = $('<div>').addClass('col-md-10 order-productRight').appendTo(product);
                let title = $('<div>').addClass('order-title').appendTo(right);
                let name = $('<label>').addClass('order-itemName').text(`${items.items[i].commodityTitle}`).appendTo(title);
                let detail = $('<div>').addClass('order-detail row').appendTo(right);
                let detailLeft = $('<div>').addClass('order-detailLeft col-md-6').appendTo(detail);
                let fullText = items.items[i].commodityDesc;
                let lines = fullText.split('\n');
                let displayedText = lines.slice(0, 3).join('<br>');
                let desc = $('<p>').addClass('order-itemDesc').html(displayedText).appendTo(detailLeft);
                let detailRight = $('<div>').addClass('order-detailRight col-md-6').appendTo(detail);
                let quantity = $('<p>').addClass('order-quantity').text(`Qty : ${items.items[i].quantity}`).appendTo(detailRight);
                let price = $('<p>').addClass('order-price').text(`$ ${items.items[i].price.toLocaleString()}`).appendTo(detailRight);
                if (i < items.items.length - 1) {
                    let line = $('<div>').addClass('order-line row m-0').appendTo(row)
                };
            }

            // let total = $('<div>').addClass('detail-total') /*.appendTo(detailContainer)*/ ;
            // let subTitle = $('<p>').addClass('detail-sumtitle').html('Subtotal<br>Discount<br>Total').appendTo(total);
            // let countTotal = $('<p>').addClass('detail-sumprice').html(`$ ${items.subtotal.toLocaleString()}<br>$ 0<br>$ ${items.subtotal.toLocaleString()}`).appendTo(total);
        }

        const fetchCheckoutData = () => {
            axios.get(
                '/api/user/checkout', {}
            ).then(function(response) {
                if (response.data.code === 1) {
                    alert(response.data.message);
                    window.location.href = `http://localhost:8000/user/login`;
                }
                if (response.data.code === 0) {
                    console.log(response.data);
                    render(response.data.items);
                    const subtotal = response.data.items.subtotal
                    document.getElementById('subtotal').textContent = subtotal;
                    document.getElementById('total').textContent = subtotal;
                }
            }).catch(function(error) {
                console.error(error.response);
                alert(error.response);
            });
        }

        const fetchCartCount = () => {
            axios.get(
                '/api/user/cart/count', {}
            ).then(function(response) {
                if (response.data.code === 1) {
                    alert(response.data.message);
                    window.location.href = `http://localhost:8000/user/login`;
                }
                if (response.data.code === 0) {
                    console.log(response.data);
                    document.getElementById('subtotal').textContent = response.data.priceSum;
                }
            }).catch(function(error) {
                console.error(error.response);
                alert(error.response);
            });
        }





        $('body').on('click', '#purchase', function(e) {
            e.preventDefault();
            const token = getCookie('token');
            const name = $('#name').val();
            const phone = $('#phone').val();
            const add = $('#add').val();

            const delivery = $('input[name="flexRadioDefault"]:checked').data('value');
            const pay = $('input[name="options-base"]:checked').val();
            axios.post(
                    '/api/user/order', {
                        token: token,
                        buyerName: name,
                        buyerPhone: phone,
                        buyerAdd: add,
                        shipMethod: delivery,
                        payMethod: pay
                    }
                )
                .then(function(response) {
                    if (response.status === 400 || response.status === 403) {
                        alert(response.data.message);
                        window.location.href = `http://localhost:8000/user/login`;
                    }
                    if (response.status === 200) {
                        window.location.href = `http://localhost:8000/user/profile`
                    }
                })
                .catch(function(error) {
                    console.error('訂單建立失敗', error);
                });
        });

        $('input[name="options-base"]').on('change', function() {
            console.log($('input[name="options-base"]:checked').val());
        });


        $('input[name="flexRadioDefault"]').on('change', function() {
            console.log($('input[name="flexRadioDefault"]:checked').data());
            // console.log($('input[name="flexRadioDefault"]:checked').data('value'));
        });

        $(document).ready(function() {
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