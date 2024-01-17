<html>

<head>
    <title>Etore Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        body.disable-scroll {
            overflow: hidden;
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
            margin-right: 30px;
            font-size: 30px;
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
            padding: 10px 60px;
            cursor: pointer;
            color: #AAA;
            font-size: 14px;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 15px 25px 30px 25px;
            font-family: "Unbounded";
            margin-top: 100px;
            max-width: 1250px;
        }



        .left-col {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            justify-content: flex-start;
            padding-right: 50px;
        }

        .sidebar-title {
            font-size: 30px;
            font-weight: bold;
        }

        .sidebar-content {
            font-size: 15px;
            font-weight: bold;
            color: #999;
        }

        .sidebar-btn {
            font-size: 10px;
            width: 180px;
            margin-bottom: 20px;
        }

        .tab-content {
            height: 100%;
            width: 100%;
            /* max-width: 800px; */
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center; */
        }

        .tab-pane {
            /* width: 100%;
            justify-content: center; */
        }

        .content-info {
            /* display: flex;
            flex-direction: row; */
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
        }

        .info {
            /* display: flex;
            flex-direction: column; */
            align-items: flex-start;
            margin: 40px;
            line-height: 300%;
        }

        .avatar {
            width: 200px;
            height: 200px;
            background-color: #ccc;
        }

        .h-avatar {
            width: 50px;
            height: 50px;
            background-color: #ccc;
        }

        .nav-link {
            color: #888;
            font-size: 18px;
        }

        #myTab .nav-link.active {
            color: #205e9d;
            font-size: 18px;
            font-weight: bold;
            /* border-bottom-color: coral; */
        }

        .nav-link:hover {
            color: #8cb0d4;
        }

        .profile {
            width: 100%;
        }

        .coupon-container {
            /* display: flex;
            flex-direction: row; */
            justify-content: center;
        }

        .coupon {
            display: flex;
            flex-direction: row;
            width: 100%;
            background-color: #f9f9f9;
            padding: 0px;
            margin-bottom: 10px;
        }

        .coupon-left {
            text-align: start;
            align-items: center;
            background-color: #f9f9f9;
        }

        .coupon-title {
            font-size: 20px;
            font-weight: bold;
            margin: 10px;
        }

        .coupon-desc {
            font-size: 12px;
            color: #4E4E4E;
            margin: 10px;
        }

        .coupon-info {
            display: flex;
            flex-direction: row;
            align-items: baseline;
            justify-content: space-between;
            font-size: 12px;
            color: #999;
            margin: 10px;
            margin-top: 30px;
        }

        .coupon-right {
            display: flex;
            background-color: #4E4E4E;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            align-items: center;
            justify-content: center;
        }

        .order-container {
            justify-content: center;
        }

        .orderlist {
            /* display: flex;
            flex-direction: column;
            justify-content: center; */
            /* width: 100%; */
            background-color: #f9f9f9;
            margin-bottom: 10px;
        }

        .top {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            font-size: 12px;
            color: #969696;
            font-weight: bold;
            padding: 20px;
        }

        .orderlist-product {
            display: flex;
            flex-direction: row;
        }

        .orderlist-productLeft {
            height: 90px;
            width: 90px;

        }

        .orderlist-pic {
            max-height: 90px;
            max-width: 90px;
            height: auto;
            width: auto;
        }

        .orderlist-productRight {
            display: flex;
            flex-direction: column;
            margin-left: 20px;
            width: 100%;
        }

        .orderlist-productFirst {
            display: flex;
            flex-direction: row;
            align-items: baseline;
        }

        .orderlist-itemTitle {
            text-align: start;
            font-size: 16px;
            font-weight: bold;
        }

        .orderlist-quantity {
            text-align: start;
            font-size: 12px;
            font-weight: bold;
            color: #BDBDBD;
            margin-left: 10px;
        }

        .orderlist-productSecond {
            display: flex;
            flex-direction: row;
        }

        .orderlist-price {
            font-size: 15px;
            font-weight: bold;
            color: #d12945
        }

        .orderlist-productThird {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .orderlist-status {
            font-size: 12px;
            font-weight: bold;
            background-color: #E5E5E5;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .orderlist-detail {
            text-align: center;
            width: 100px;
            height: 30px;
            font-size: 12px;
            font-weight: bold;
            color: #707070;
            border: 1px solid #707070;
            padding: 5px 10px;

        }

        .detail-tab {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            width: 100%;
        }

        .backLink {
            color: #969696;
            font-size: 15px;
            font-weight: bold;
            text-align: start;
            margin: 20px 0px;
        }

        .detail-container {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .detail-info {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            margin-bottom: 20px;
        }

        .detail-title {
            font-size: 15px;
            font-weight: bold;
            text-align: start;
            margin-bottom: 10px;
        }

        .detail-content {
            font-size: 12px;
            color: #969696;
            font-weight: bold;
            text-align: start;
        }

        .detail-items {
            display: flex;
            flex-direction: column;
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
            /* width: 70px; */
            /* height: 70px; */
            text-align: left;
        }

        .order-pic {
            max-width: 70px;
            max-height: 70px;
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

        .detail-total {
            display: flex;
            flex-direction: row;
            justify-content: end;
            margin-right: 15px;
        }

        .detail-sumtitle {
            text-align: start;
            font-size: 13px;
            font-weight: bold;
            color: #707070
        }

        .detail-sumprice {
            text-align: end;
            color: #d12945;
            font-size: 15px;
            font-weight: bold;
            margin-left: 30px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .newinput {
            height: 40px;
            margin-top: 10px;
            margin-bottom: 33px;
            margin-left: -20px;
        }

        .commitButtonArea {
            justify-content: center;
        }

        .commitButton {
            margin: 0px 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <a class="logo" href="http://localhost:8000/"><i class="fas fa-store"></i> Etore</a>
        <div class="icons">
            <div class="search-container">
                <input type="text" class="search-bar" placeholder="Search">
                <!-- <button id="search"> -->
                <i class="fa-solid fa-magnifying-glass search-button"></i>
                <!-- </button> -->
            </div>
            <a href="http://localhost:8000/user/cart">
                <i class="fas fa-shopping-cart icon"></i>
            </a>
            <a href="http://localhost:8000/user/profile">
                <div class="rounded-circle h-avatar icon">
                    <img id="h-avatar" src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                </div>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- LEFT SIDEBAR -->
            <div class="col-md-4 left-col">
                <div class="profile-sidebar">
                    <div class="rounded-circle mx-auto my-4 avatar">
                        <img id="sb-avatar" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">

                    </div>
                    <label class="sidebar-title" id="sb-nickname"> </label>
                    <p class="sidebar-content" id="sb-email"> </p>
                    <a href="" class="btn btn-light btn-outline-secondary sidebar-btn" id="editProfile">Edit Profile</a>
                    <a href="http://localhost:8000/user/changePassword" class="btn btn-light btn-outline-secondary sidebar-btn">Change Password</a>
                    <a class="btn btn-light btn-outline-secondary sidebar-btn" type="submit" id="logout">Log Out</a>
                </div>
            </div>

            <!-- RIGHT CONTENT -->
            <div class="col-md-8">
                <!-- NAVIGATION BAR -->
                <ul class="nav nav-underline" id="myTab">
                    <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders">
                            <i class="fa-solid fa-scroll"></i> Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="coupon-tab" data-toggle="tab" href="#coupons">
                            <i class="fa-solid fa-ticket"></i> Coupon
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile">
                            <i class="fas fa-user"></i> Profile
                        </a>
                    </li>
                </ul>

                <!-- CONTENT -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="orders">
                        <!-- <div class="row" id="orderTab">
                        </div> -->
                    </div>
                    <div class="tab-pane fade" id="coupons">
                        <div class="row coupon-container" id="coupon">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <div class="row">
                            <div class="rounded-circle mx-auto my-4 avatar p-0">
                                <img id="c-avatar" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                            </div>
                            <div class="row content-info">
                                <div class="col-md-3 info">
                                    <p>Nickname</p>
                                    <p>Account</p>

                                </div>
                                <div class="col-md-3 info">
                                    <p id="c-nickname"> </p>
                                    <p id="c-email"> </p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#orders-tab').tab('show');
            fetchOrderListData();
            var hash = window.location.hash;
            if (hash) {
                $(`#myTab a[href="${hash}"]`).tab('show');
            }
            $('#myTab a').on('shown.bs.tab', function(e) {
                window.location.hash = e.target.hash;
            });
        });

        const renderOrders = (orders) => {
            const list = $('#orders');
            list.empty();
            for (i = 0; i < orders.length; i++) {
                let row = $('<div>').addClass('row orderlist').appendTo(list);
                let top = $('<div>').addClass('top').appendTo(row);
                let orderId = orders[i].orderId.toString();
                let paddedOrderId = orderId.padStart(8, '0');
                let number = $('<p>').addClass('orderlist-no').text(`Order No : E${paddedOrderId}`).appendTo(top);
                let datetimeString = orders[i].purchasedAt;
                let dateObject = new Date(datetimeString);
                let date = dateObject.toISOString().split('T')[0];
                let purchasedDate = $('<p>').addClass('orderlist-date').text(`Purchased Date : ${date}`).appendTo(top);
                let product = $('<div>').addClass('orderlist-product').appendTo(row);
                let left = $('<div>').addClass(' orderlist-productLeft').appendTo(product);
                let img = $('<img>').attr('src', orders[i].productPic).addClass('orderlist-pic').appendTo(left);
                let right = $('<div>').addClass(' orderlist-productRight').appendTo(product);
                let firstRow = $('<div>').addClass('orderlist-productFirst').appendTo(right);
                let title = $('<label>').addClass('orderlist-itemTitle').text(`${orders[i].productName}`).appendTo(firstRow);
                let quantity = $('<p>').addClass('orderlist-quantity').text(`( ${orders[i].quantity} items )`).appendTo(firstRow);
                let secondRow = $('<div>').addClass('orderlist-productSecond').appendTo(right);
                let price = $('<p>').addClass('orderlist-price').text(`$ ${orders[i].price.toLocaleString()}`).appendTo(secondRow);
                let thirdRow = $('<div>').addClass('orderlist-productThird').appendTo(right);
                let status = $('<p>').addClass('orderlist-status').text(orders[i].status).appendTo(thirdRow);
                let detail = $('<button>').addClass('btn btn-outline-secondary orderlist-detail').data('orderId', orders[i].orderId).attr('id', 'detail').text('Detail').appendTo(thirdRow);
            }
        }

        const renderOrderDetail = (orderDetail) => {
            const list = $('#orders');
            list.empty();
            let detailTab = $('<div>').addClass('detail-tab').appendTo(list);
            let backArea = $('<div>').addClass('backLink').appendTo(detailTab);
            let backLink = $('<a>').attr('type', 'submit').attr('id', 'back').text('＜ Back to Orders').attr('id', 'back').appendTo(backArea);
            let detailContainer = $('<div>').addClass('detail-container').appendTo(detailTab);
            let info = $('<div>').addClass('detail-info').appendTo(detailContainer);
            let infoTitle = $('<label>').addClass('detail-title').text('Info').appendTo(info);
            let infoContent = $('<div>').addClass('detail-content').appendTo(info);
            let orderId = orderDetail.orderId.toString();
            let paddedOrderId = orderId.padStart(8, '0');
            let orderNo = $('<p>').text(`Order No : E${paddedOrderId}`).appendTo(infoContent);
            let datetimeString = orderDetail.purchasedAt;
            let dateObject = new Date(datetimeString);
            let date = dateObject.toISOString().split('T')[0];
            let purchasedAt = $('<p>').text(`Purchased Date : ${date}`).appendTo(infoContent);
            let buyer = $('<div>').addClass('detail-info').appendTo(detailContainer);
            let buyerTitle = $('<label>').addClass('detail-title').text('Buyer').appendTo(buyer);
            let buyerContent = $('<div>').addClass('detail-content').appendTo(buyer);
            let buyerName = $('<p>').text(`Name : ${orderDetail.customer.name}`).appendTo(buyerContent);
            let buyerPhone = $('<p>').text(`Phone Number : ${orderDetail.customer.phoneNumber}`).appendTo(buyerContent);
            let buyerAdd = $('<p>').text(`Address : ${orderDetail.customer.address}`).appendTo(buyerContent);
            let items = $('<div>').addClass('detail-items').appendTo(detailContainer);
            let itemTitle = $('<label>').addClass('detail-title').text('Details').appendTo(items);
            for (i = 0; i < orderDetail.items.length; i++) {
                let row = $('<div>').addClass('row order').appendTo(items);
                let product = $('<div>').addClass('row order-product p-0 m-0').appendTo(row);
                let left = $('<div>').addClass('col-md-2 order-productLeft p-0').appendTo(product);
                let img = $('<img>').attr('src', orderDetail.items[i].commodityImageUrl).addClass('order-pic').appendTo(left);
                let right = $('<div>').addClass('col-md-10 order-productRight p-0').appendTo(product);
                let title = $('<div>').addClass('order-title').appendTo(right);
                let name = $('<label>').addClass('order-itemName').text(`${orderDetail.items[i].commodityTitle}`).appendTo(title);
                let detail = $('<div>').addClass('order-detail row').appendTo(right);
                let detailLeft = $('<div>').addClass('order-detailLeft col-md-6').appendTo(detail);
                let fullText = orderDetail.items[i].commodityDescription;
                let lines = fullText.split('\n');
                let displayedText = lines.slice(0, 3).join('<br>');
                let desc = $('<p>').addClass('order-itemDesc').html(displayedText).appendTo(detailLeft);
                let detailRight = $('<div>').addClass('order-detailRight col-md-6').appendTo(detail);
                let quantity = $('<p>').addClass('order-quantity').text(`Qty : ${orderDetail.items[i].quantity}`).appendTo(detailRight);
                let price = $('<p>').addClass('order-price').text(`$ ${orderDetail.items[i].subtotal.toLocaleString()}`).appendTo(detailRight);
                let line = $('<div>').addClass('order-line row m-0').appendTo(row);
            }

            let total = $('<div>').addClass('detail-total').appendTo(detailContainer);
            let subTitle = $('<p>').addClass('detail-sumtitle').html('Subtotal<br>Discount<br>Total').appendTo(total);
            let countTotal = $('<p>').addClass('detail-sumprice').html(`$ ${orderDetail.subtotal.toLocaleString()}<br>$ 0<br>$ ${orderDetail.subtotal.toLocaleString()}`).appendTo(total);
        }

        const fetchOrderListData = () => {
            axios.get(
                '/api/user/orders', {}
            ).then(function(response) {
                if (response.status === 400 || response.status === 403) {
                    alert('尚未登入');
                    window.location.href = `http://localhost:8000/user/login`;
                }
                if (response.status === 200) {
                    console.log(response.data.data);
                    renderOrders(response.data.data);
                }
            }).catch(function(error) {
                console.error(error.response);
                alert(error.response);
            });
        }

        const fetchOrderDetailData = (orderId) => {
            axios.get(
                `/api/user/order/${orderId}`, {}
            ).then(function(response) {
                if (response.status === 400 || response.status === 403) {
                    alert(response.data.message);
                    window.location.href = `http://localhost:8000/user/login`;
                }
                if (response.status === 200) {
                    console.log(response.data);
                    renderOrderDetail(response.data.data);
                }
            }).catch(function(error) {
                console.error(error.response);
                alert(error.response);
            });
        }

        const fetchEditProfile = () => {
            axios.get(
                '/api/user/profile', {}
            ).then(function(response) {
                if (response.status === 400 || response.status === 403) {
                    alert(response.data.message);
                    window.location.href = `http://localhost:8000/user/login`;
                }
                if (response.status === 200) {
                    const profile = response.data.data;
                    renderEditProfile(profile);
                }
            }).catch(function(error) {
                console.error(error.response);
                alert(error.response);
            });
        }

        const renderEditProfile = (profile) => {
            const list = $('#profile');
            list.empty();
            let top = $('<div>').addClass('row').appendTo(list);
            let avatarArea = $('<div>').addClass('rounded-circle mx-auto my-4 avatar p-0').appendTo(top);
            let avatar = $('<img>').attr('id', 'c-avatar').attr('style', 'width: 100%; height: 100%; object-fit: cover; border-radius: 50%;').attr('src', profile.avatarUrl).appendTo(avatarArea);
            let bottom = $('<div>').addClass('row content-info').appendTo(list);
            let title = $('<div>').addClass('col-md-3 info').appendTo(bottom);
            let nicknameTitle = $('<p>').text('Nickname').appendTo(title);
            let avatarUrlTitle = $('<p>').text('Avatar Url').appendTo(title);
            let inputArea = $('<div>').addClass('col-md-3 info').appendTo(bottom);
            let nicknameInput = $('<input>').addClass('newinput form-control').attr('id', 'new-nickname').attr('value', profile.nickname).appendTo(inputArea);
            let avatarUrlInput = $('<input>').addClass('newinput form-control').attr('id', 'new-avatarUrl').attr('value', profile.avatarUrl).appendTo(inputArea);
            let button = $('<div>').addClass('row commitButtonArea').appendTo(bottom);
            let submit = $('<a>').addClass('commitButton btn btn-light btn-outline-secondary sidebar-btn').attr('type', 'submit').attr('id', 'submit').text('Submit').appendTo(button);
            let cancel = $('<a>').addClass('commitButton btn btn-light btn-outline-secondary sidebar-btn').attr('type', 'submit').attr('id', 'cancel').text('Cancel').appendTo(button);

            avatarUrlInput.on('input', function() {
                avatar.attr('src', $(this).val());
            });
        }

        const renderProfile = (profile) => {
            const list = $('#profile');
            list.empty();
            let top = $('<div>').addClass('row').appendTo(list);
            let avatarArea = $('<div>').addClass('rounded-circle mx-auto my-4 avatar p-0').appendTo(top);
            let avatar = $('<img>').attr('id', 'c-avatar').attr('style', 'width: 100%; height: 100%; object-fit: cover; border-radius: 50%;').attr('src', profile.avatarUrl).appendTo(avatarArea);
            let bottom = $('<div>').addClass('row content-info').appendTo(list);
            let title = $('<div>').addClass('col-md-3 info').appendTo(bottom);
            let nicknameTitle = $('<p>').text('Nickname').appendTo(title);
            let accountTitle = $('<p>').text('Account').appendTo(title);
            let inputArea = $('<div>').addClass('col-md-3 info').appendTo(bottom);
            let nickname = $('<p>').attr('id', 'c-nickname').text(profile.nickname).appendTo(inputArea);
            let account = $('<p>').attr('id', 'c-account').text(profile.email).appendTo(inputArea);
        }

        $('body').on('click', '#back', function(e) {
            e.preventDefault();
            fetchOrderListData();
        });

        $('body').on('click', '#detail', function(e) {
            e.preventDefault();
            const orderId = $(this).data('orderId');
            fetchOrderDetailData(orderId);
        });

        $('body').on('click', '[name="coupon"]', function(e) {
            const code = $(this).data('code');
            const textArea = $('<textarea>').val(code).appendTo('body').select();
            try {
                document.execCommand('copy');
                alert('已成功複製優惠券代碼：' + code);
            } catch (err) {
                console.error('Unable to copy to clipboard', err);
            } finally {
                textArea.remove();
            }
        });

        $('body').on('click', '#editProfile', function(e) {
            e.preventDefault();
            $('#profile-tab').tab('show');
            fetchEditProfile();
        });

        $('body').on('click', '#submit', function(e) {
            const nickname = $('#new-nickname').val();
            const avatarUrl = $('#new-avatarUrl').val();
            axios.patch('/api/user/profile', {
                    nickname: nickname,
                    avatarUrl: avatarUrl
                })
                .then(function(response) {
                    if (response.status === 200) {
                        alert('變更成功');
                        axios.get('/api/user/profile', {})
                            .then(function(response) {
                                if (response.status === 200) {
                                    const body = response.data.data;
                                    updateState(body);
                                    renderProfile(body);
                                }
                            })
                    }
                    if (response.status === 400 | response.status === 403) {
                        alert(response.data.message);
                        window.location.href = `http://localhost:8000/user/login`;
                    }
                })
                .catch(function(error) {
                    console.error(error);
                });
        });

        $('body').on('click', '#cancel', function(e) {
            e.preventDefault();
            const token = getCookie('token');
            axios.get('/api/user/profile', {})
                .then(function(response) {
                    if (response.status === 200) {
                        const body = response.data.data;
                        updateState(body);
                        renderProfile(body);
                    }
                    if (response.status === 400 | response.status === 403) {
                        alert(response.data.message);
                        window.location.href = `http://localhost:8000/user/login`;
                    }
                })
                .catch(function(error) {
                    console.error(error);
                });
        });

        $(document).ready(function() {

            const render = (coupons) => {
                const list = $('#coupon');
                for (i = 0; i < coupons.length; i++) {
                    let row = $('<div>').addClass('row coupon').attr('type', 'button').attr('name', 'coupon').attr('data-code', coupons[i].code).appendTo(list);
                    let left = $('<div>').addClass('col-md-9 coupon-left').appendTo(row);
                    let title = $('<label>').addClass('coupon-title').text(coupons[i].title).appendTo(left);
                    let desc = $('<p>').addClass('coupon-desc').text(coupons[i].desc).appendTo(left);
                    let info = $('<div>').addClass('coupon-info').appendTo(left);
                    let code = $('<p>').addClass('coupon-code').text(`Code : ${coupons[i].code}`).appendTo(info);
                    let datetimeString = coupons[i].expired_at;
                    let dateObject = new Date(datetimeString);
                    let date = dateObject.toISOString().split('T')[0];
                    let time = $('<p>').addClass('coupon-time').text(`Expired Date : ${date}`).appendTo(info);
                    let right = $('<div>').addClass('col-md-3 coupon-right').appendTo(row);
                    if (coupons[i].type == "percentage") {
                        let discount = $('<label>').addClass('coupon-discount').text(coupons[i].discount + " %").appendTo(right);
                    }
                    if (coupons[i].type == "discount") {
                        let discount = $('<label>').addClass('coupon-discount').text("$ " + coupons[i].discount).appendTo(right);
                    }
                }
            }

            axios.get(
                '/api/user/coupon', {}
            ).then(function(response) {
                console.log(response.data);
                render(response.data.data);
            }).catch(function(error) {
                console.error(error.response);
                alert(error.response);
            });

            const token = getCookie('token');
            axios.get('/api/user/profile', {})
                .then(function(response) {
                    if (response.status === 200) {
                        const body = response.data.data;
                        updateState(body);
                        // const profile = new Profile(body.avatarUrl, body.nickname, body.email, body.password);
                        // profile.render();
                    }
                    if (response.status === 400 | response.status === 403) {
                        alert(response.data.message);
                        window.location.href = `http://localhost:8000/user/login`;
                    }
                })
                .catch(function(error) {
                    console.error(error);
                });
        })

        $(document).ready(function() {
            const buttonClick = () => {
                const token = getCookie('token');
                console.log(token);

                axios.post(
                    '/api/user/logout', {
                        token: token,
                    }
                ).then(function(response) {
                    if (response.data.code === 0) {
                        deleteCookie("token");
                        alert(response.data.message);
                        window.location.href = `http://localhost:8000/user/login`;
                    }
                    if (response.data.code === 1) {
                        alert(response.data.message);
                        window.location.href = `http://localhost:8000/user/login`;
                    }

                }).catch(function(error) {
                    console.error(error);
                    alert(error.response.data.message);
                });
            }

            $('#logout').on('click', buttonClick);
        })

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

        function deleteCookie(name) {
            document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
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

        function Profile() {
            this.contentAvatarImage = $('#c-avatar');
            this.sidebarAvatarImage = $('#sb-avatar');
            this.headerAvatarImage = $('#h-avatar');
            this.contentNicknameLabel = $('#c-nickname');
            this.sidebarNicknameLabel = $('#sb-nickname');
            this.accountLabel = $('#c-email');
            this.passwordLabel = $('#c-password');

            this.render = () => {
                this.contentAvatarImage.attr('src', state.avatarUrl);
                this.sidebarAvatarImage.attr('src', state.avatarUrl);
                this.headerAvatarImage.attr('src', state.avatarUrl);
                this.contentNicknameLabel.text(state.nickname);
                this.sidebarNicknameLabel.text(state.nickname);
                this.accountLabel.text(state.email);
                this.passwordLabel.text(state.password);
            }

            document.addEventListener('stateChanged', this.render);
        }

        const profile = new Profile();

        let state = {
            profile: {},
            coupons: {},
            nickname: '',
            email: '',
            password: '',
            avatarUrl: ''
        };

        function updateState(profile) {
            console.log('old state', state);
            state = {
                ...state,
                ...profile
            }
            console.log('new state', state);

            const event = new Event('stateChanged');
            document.dispatchEvent(event);
        }
    </script>
</body>

</html>