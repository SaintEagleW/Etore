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

        .cart-container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            font-family: "Unbounded";
            margin-top: 80px;
        }

        .cart-title {
            font-size: 20px;
            font-weight: bold;
            margin-top: 50px;
            margin-bottom: 30px;
        }

        .check-all {
            display: flex;
            flex-direction: row;
            align-items: center;
            font-size: 13px;
            font-weight: bold;
            background-color: #f9f9f9;
            margin-bottom: 10px;
            padding: 0px 20px;
            width: 350px;
            height: 50px;
        }

        .items-container {
            display: flex;
            flex-direction: column;
            width: 350px
        }

        .item {
            display: flex;
            flex-direction: row;
            background-color: #f9f9f9;
            width: 100%;
            margin-bottom: 10px;
            padding: 20px;
        }

        .checkbox {
            width: 15px;
            height: 82.45px;
            margin-right: 20px;
        }

        .item-pic {
            max-width: 60px;
            max-height: 60px;
            width: auto;
            height: auto;
            margin-right: 20px;
        }

        .item-info {
            display: flex;
            flex-direction: column;
        }

        .item-title {
            font-size: 13px;
            font-weight: bold;
            text-align: start;
        }

        .item-price {
            font-size: 13px;
            font-weight: bold;
            text-align: start;
        }

        .item-detail {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }

        .item-quantity {
            width: 80px;
        }

        .item-quantity button {
            align-items: center;
            background-color: white;
            color: #616161;
            font-family: Arial, sans-serif;
            border: 1px solid #dedede;
        }

        .item-quantity input {
            width: 30px;
            justify-content: center;
            text-align: center;
            color: #616161;
            font-family: Arial, sans-serif;
            border-top: 1px solid #dedede;
            border-bottom: 1px solid #dedede;
            border-left: 0px;
            border-right: 0px;
        }

        .fa-ticket {
            margin-right: 10px;
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
            padding-top: 20px;
        }

        .amount-price {
            display: flex;
            flex-direction: row;
            font-size: 13px;
            color: #d12945;
            font-weight: bold;
            text-align: start;
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
    <div class="cart-container">

        <div class="items-container">
            <label class="cart-title">Shopping Cart</label>
            <div class="check-all">
                <input class="checkbox" type="checkbox" id="selectAll">
                <label> All Items (<label id="itemsAmount"></label>) </label>
            </div>

            <div id="item"> </div>
            <!-- Modal -->
            <div class="modal fade" id="codeblock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <label class="modal-title fs-5" id="exampleModalLabel">Please fill in your coupon code.</label>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input required placeholder="Coupon Code">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="submit-coupon">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="amount-container">
            <label> Details </label>
            <div class="amount-details">
                <label>Subtotal</label>
                <div class="amount-price">
                    <p>$&nbsp;</p>
                    <p id="subtotal"></p>
                </div>

                <!-- <p>Discount</p> -->
            </div>
            <div class="purchase-button">
                <button type="submit" id="purchase">Purchase</button>
            </div>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            fetchCartData();
            fetchCartCount();
        });

        const render = (items) => {
            const list = $('#item');
            const subtotal = $('#subtotal');
            var sum = 0;
            list.empty();
            subtotal.empty();

            for (i = 0; i < items.length; i++) {
                console.log(items[i].commodityId);
                let item = $('<div>').addClass('item').appendTo(list);
                let checkbox = $('<input>').addClass('checkbox').attr('id', `checkbox${items[i].commodityId}`).data('product-id', items[i].commodityId).attr('name', 'update-button').attr('type', 'checkbox').prop('checked', items[i].is_checked).appendTo(item);
                let img = $('<img>').attr('src', items[i].commodityImageUrl).addClass('item-pic').appendTo(item);
                let info = $('<div>').addClass('item-info').appendTo(item);
                let title = $('<label>').addClass('item-title').text(items[i].commodityTitle).appendTo(info);
                let price = $('<p>').addClass('item-price align-right text-danger').text(`$ ${items[i].price}`).appendTo(info);
                let detail = $('<div>').addClass('item-detail').appendTo(info);
                let quantity = $('<div>').addClass('item-quantity').appendTo(detail);
                let decrease = $('<button>').attr('onclick', `decrement(${items[i].commodityId})`).attr('name', 'update-button').data('product-id', items[i].commodityId).text('-').appendTo(quantity);
                let number = $('<input>').addClass('quantity').attr('id', `quantity${items[i].commodityId}`).attr('type', 'text').attr('value', items[i].quantity).prop('disabled', true).appendTo(quantity);
                let increase = $('<button>').attr('onclick', `increment(${items[i].commodityId})`).attr('name', 'update-button').data('product-id', items[i].commodityId).text('+').appendTo(quantity);
                let more = $('<div>').addClass('item-coupon-delete').appendTo(detail);
                let coupon = $('<i>').attr('name', 'coupon').addClass('fa-solid fa-ticket').data('product-id', items[i].commodityId).appendTo(more);
                // let coupon = $('<i>').addClass('fa-solid fa-ticket').attr('data-bs-toggle', 'modal').attr('data-bs-target', '#codeblock').appendTo(more);
                let deleteAnchor = $('<a>').attr('name', 'delete').data('product-id', items[i].commodityId).appendTo(more);
                let trashIcon = $('<i>').addClass('fa-solid fa-trash').appendTo(deleteAnchor);

                let numberVal = parseInt(items[i].quantity);
                sum += numberVal;
            }
            document.getElementById('itemsAmount').textContent = sum;

        }

        const fetchCartData = () => {
            axios.get(
                '/api/user/cart', {}
            ).then(function(response) {
                if (response.data.code === 1) {
                    alert(response.data.message);
                    window.location.href = `http://localhost:8000/user/login`;
                }
                if (response.data.code === 0) {
                    console.log(response.data);
                    render(response.data.items);
                }
            }).catch(function(error) {
                console.error(error);
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

        // const myModalAlternative = new bootstrap.Modal('#codeblock', focus);

        $('body').on('click', 'i[name="coupon"]', function(e) {
            const modal = $('#codeblock');
            const productId = $(this).data('product-id')
            modal.data('product-id', productId);
            modal.modal('show');
            // console.log();
        });

        $('#submit-coupon').click(function() {
            const modal = $('#codeblock');
            console.log(modal.data('product-id'));
        });

        $('body').on('click', 'a[name="delete"]', function(e) {
            e.preventDefault();
            if (confirm('確定要刪除嗎？')) {
                const productId = $(this).data('product-id');
                axios.delete(`http://localhost:8000/api/user/cart/deleteItem?productId=${productId}`)
                    .then(function(response) {
                        fetchCartData();
                        fetchCartCount();
                    })
                    .catch(function(error) {
                        console.error('刪除失敗', error);
                    });
            }
        });

        $('body').on('click', '[name="update-button"]', function(e) {
            e.preventDefault();
            const productId = $(this).data('product-id');
            const quantityInput = parseInt($('#quantity' + productId).val());
            const isChecked = $('#checkbox' + productId).prop('checked');

            axios.patch(
                    '/api/user/cart/updateItem', {
                        productId: productId,
                        quantity: quantityInput,
                        isChecked: isChecked
                    }
                )
                .then(function(response) {
                    fetchCartData();
                    fetchCartCount();
                })
                .catch(function(error) {
                    console.error('更新失敗', error);
                });
        });

        $('body').on('click', '#selectAll', function(e) {
            const allCheckboxes = document.querySelectorAll(".checkbox.checkbox");
            const isChecked = this.checked;
            allCheckboxes.forEach(function(checkbox) {
                checkbox.checked = isChecked;
            });


            axios.patch(
                    '/api/user/cart/updateItems', {
                        isChecked: isChecked
                    }
                )
                .then(function(response) {
                    fetchCartData();
                    fetchCartCount();
                })
                .catch(function(error) {
                    console.error('更新失敗', error);
                });
        });

        $('body').on('click', '#purchase', function(e) {
            e.preventDefault();
            window.location.href = `http://localhost:8000/user/checkout`
            // const token = getCookie('token');

            // axios.post(
            //         '/api/order/create', {
            //             token: token
            //         }
            //     )
            //     .then(function(response) {
            //         if (response.data.code === 1) {
            //             alert(response.data.message);
            //             window.location.href = `http://localhost:8000/user/login`;
            //         }
            //         if (response.data.code === 0) {
            //             window.location.href = `http://localhost:8000/user/profile`
            //         }
            //     })
            //     .catch(function(error) {
            //         console.error('訂單建立失敗', error);
            //     });
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

        function decrement(productID) {
            var quantityInput = document.getElementById('quantity' + productID);
            var currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }

        function increment(productID) {
            var quantityInput = document.getElementById('quantity' + productID);
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