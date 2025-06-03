<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE ORDINARY</title>
    <link rel="icon"
        href="https://theordinary.com/on/demandware.static/Sites-deciem-global-Site/-/default/dw8dc43046/images/brands-logo/theordinary_black.svg"
        type="image/x-icon">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="public\assets\css\admin.css?v=<?= time() ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<?php
$list_page = [
    "Products",
    "Orders",
    "Users",
    "Revenue",
    "Setting",
];

$list_filter_format = [
    'Serum',
    'Cream',
    'Gel',
    'Liquid',
    'Oil',
    'Powder',
    'Balm',
    'Masque',
    'Suspension',
];

$list_suited_to = [
    'All Skin Types',
    'Dry Skin',
    'Oily Skin'
];

$list_category = [
    'Serums',
    'Gifts',
    'Moisturizers',
    'Exfoliators',
    'Eye Serums',
    'Facial Cleansers',
    'Face Oils',
    'Toners & Essences',
    'Face Masques',
    'Explore Skincare'
];

$list_filter_sort = [
    'Rank by lowest price',
    'Rank by highest price',
    'Rank by lowest quantity',
    'Rank by highest quantity'
];

$list_filter = [
    'pending',
    'shipped',
    'delivered',
    'cancelled'
]
    ?>

<body>
    <div class="flex h-screen bg-gray-50">
        <!-- Sidebar -->
        <div id="sidebar"
            class="sidebar bg-gradient-to-b from-purple-700 to-pink-500 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 z-50 transition duration-200 ease-in-out">
            <div class="flex items-center justify-between px-4">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-spa text-2xl"></i>
                    <span class="text-xl font-bold">Beauty Admin</span>
                </div>
                <button id="closeSidebar" class="md:hidden p-2 rounded-md hover:bg-purple-800">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <nav class="mt-10">
                <a href="/The-Ordinary/admin?page=dashboards" id="dashboard-link"
                    class="sidebar-link <?= $_GET['page'] == 'dashboards' ? 'active' : '' ?> flex items-center px-4 py-3 rounded-md cursor-pointer">
                    <i class="fas fa-tachometer-alt mr-3 w-5 text-center"></i>
                    <span>General</span>
                </a>
                <a href="/The-Ordinary/admin?page=products" id="products-link"
                    class="sidebar-link <?= $_GET['page'] == 'products' ? 'active' : '' ?> flex items-center px-4 py-3 rounded-md cursor-pointer">
                    <i class="fas fa-box mr-3 w-5 text-center"></i>
                    <span>Products</span>
                </a>
                <a href="/The-Ordinary/admin?page=orders" id="orders-link"
                    class="sidebar-link <?= $_GET['page'] == 'orders' ? 'active' : '' ?> flex items-center px-4 py-3 rounded-md cursor-pointer">
                    <i class="fas fa-shopping-cart mr-3 w-5 text-center"></i>
                    <span>Orders</span>
                </a>
                <a href="/The-Ordinary/admin?page=users" id="customers-link"
                    class="sidebar-link <?= $_GET['page'] == 'users' ? 'active' : '' ?> flex items-center px-4 py-3 rounded-md cursor-pointer">
                    <i class="fas fa-users mr-3 w-5 text-center"></i>
                    <span>Customers</span>
                </a>
                <a href="/The-Ordinary/admin?page=revenue" id="revenue-link"
                    class="sidebar-link <?= $_GET['page'] == 'revenue' ? 'active' : '' ?> flex items-center px-4 py-3 rounded-md cursor-pointer">
                    <i class="fas fa-chart-line mr-3 w-5 text-center"></i>
                    <span>Revenue</span>
                </a>
                <div class="sidebar-link flex items-center px-4 py-3 rounded-md cursor-pointer">
                    <i class="fas fa-cog mr-3 w-5"></i>
                    <span>Setting</span>
                </div>
            </nav>

            <div class="px-4 mt-auto pb-5">
                <div class="flex items-center space-x-3 mt-20">
                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNTYgMjU2Ij48Y2lyY2xlIGN4PSIxMjgiIGN5PSIxMjgiIHI9IjEyMCIgZmlsbD0iI2U2ZTZlNiIvPjxjaXJjbGUgY3g9IjEyOCIgY3k9IjExNSIgcj0iMzUiIGZpbGw9IiM5OTkiLz48cGF0aCBkPSJNMTg4LDIwNGEzMCwzMCwwLDAsMC0uODItNyw2MCw2MCwwLDAsMC01OS4xOC00M2gtLjE4YTYwLjA5LDYwLjA5LDAsMCwwLTU5LDQzLDMwLDMwLDAsMCwwLS44Miw3WiIgZmlsbD0iIzk5OSIvPjwvc3ZnPg=="
                        alt="Admin" class="w-10 h-10 rounded-full">
                    <div>
                        <p class="text-sm font-medium">Admin</p>
                        <p class="text-xs opacity-70">admin@beautyshop.com</p>
                    </div>
                </div>
                <div class="mt-6 flex items-center text-sm hover:bg-purple-800 p-2 rounded-md cursor-pointer">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    <span>Log out</span>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <button id="openSidebar" class="md:hidden p-2 mr-2 rounded-md hover:bg-gray-100">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h1 class="text-xl font-semibold text-gray-800">General</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Tìm kiếm..."
                                class="py-2 pl-10 pr-4 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <div class="relative">
                            <button class="p-2 rounded-full hover:bg-gray-100 relative">
                                <i class="fas fa-bell text-gray-600"></i>
                                <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-4 bg-gray-50">

                <!-- Dashboard Section -->
                <?php if (isset($_GET['page']) && $_GET['page'] === 'dashboards'): ?>
                    <div id="dashboard-section" class="space-y-6">
                        <!-- Stats Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div class="card bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-500">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-sm text-gray-500 font-medium">Revenue</p>
                                        <p class="text-2xl font-bold text-gray-800"><?= $currentMonthlyData[0]['revenue'] ?>
                                            USD</p>
                                        <p class="text-xs text-green-500 mt-2"><i class="fas fa-arrow-up mr-1"></i>12% from
                                            last month</p>
                                    </div>
                                    <div class="bg-purple-100 p-3 rounded-full">
                                        <i class="fas fa-wallet text-purple-500 text-xl"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="card bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-sm text-gray-500 font-medium">Orders</p>
                                        <p class="text-2xl font-bold text-gray-800"><?= count($orders) ?></p>
                                        <p class="text-xs text-green-500 mt-2"><i class="fas fa-arrow-up mr-1"></i>5% from
                                            last month</p>
                                    </div>
                                    <div class="bg-blue-100 p-3 rounded-full">
                                        <i class="fas fa-shopping-bag text-blue-500 text-xl"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="card bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-sm text-gray-500 font-medium">Customers</p>
                                        <p class="text-2xl font-bold text-gray-800"><?= count($users) ?></p>
                                        <p class="text-xs text-green-500 mt-2"><i class="fas fa-arrow-up mr-1"></i>15% from
                                            last month</p>
                                    </div>
                                    <div class="bg-green-100 p-3 rounded-full">
                                        <i class="fas fa-users text-green-500 text-xl"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="card bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-500">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-sm text-gray-500 font-medium">Products</p>
                                        <p class="text-2xl font-bold text-gray-800"><?= count($products) ?></p>
                                        <p class="text-xs text-yellow-500 mt-2"><i
                                                class="fas fa-arrow-right mr-1"></i>Normal</p>
                                    </div>
                                    <div class="bg-yellow-100 p-3 rounded-full">
                                        <i class="fas fa-box text-yellow-500 text-xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Charts -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="bg-white p-6 rounded-xl shadow-sm">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="font-semibold text-gray-800">Revenue by month</h3>
                                    <div class="flex space-x-2">
                                        <select
                                            class="text-sm border rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                            <option>2023</option>
                                            <option>2022</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="h-80">
                                    <canvas id="revenueChart"></canvas>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-xl shadow-sm">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="font-semibold text-gray-800">Bestseller</h3>
                                    <div class="flex space-x-2">
                                        <select
                                            class="text-sm border rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                            <option>This month</option>
                                            <option>This year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="h-80">
                                    <canvas id="categoryChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Orders -->
                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="font-semibold text-gray-800">Recent Orders</h3>
                                <button class="text-purple-600 hover:text-purple-800 text-sm font-medium">All</button>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                code</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                customer</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                date</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                total</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                status</th>
                                            <th
                                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                touch</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php foreach ($orders as $order): ?>
                                            <tr class="table-row">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    #<?= $order['ID_Don_Hang'] ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    #<?= $order['ID_Khach_Hang'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    <?= $order['Ngay_Dat'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    <?= $order['tong_tien'] ?> USD
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span
                                                        class="px-3 py-1 text-xs rounded-full status-<?= $order['Trang_Thai'] ?>"><?= $order['Trang_Thai'] ?></span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button class="text-blue-600 hover:text-blue-900 mr-3">Detail</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Products Section -->
                <!-- Products Section -->
                <!-- Products Section -->

                <?php if (isset($_GET['page']) && $_GET['page'] === 'products'): ?>
                    <div id="products-section" class="space-y-6">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-semibold text-gray-800">Products management</h2>
                            <button
                                class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md flex items-center">
                                <i class="fas fa-plus mr-2"></i> Add
                            </button>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-3 md:space-y-0">
                                <div class="flex items-center space-x-2">
                                    <div class="relative">
                                        <input oninput="searchProduct()" type="text" placeholder="Search..."
                                            class="input-search-product py-2 pl-10 pr-4 w-64 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                    </div>
                                    <select 
                                        class=" border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <option>All</option>
                                        <?php foreach ($list_category as $value => $item): ?>
                                            <option value="<?= $value + 1 ?>"><?= $item ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <select onchange="sortProduct()"
                                        class="sort-product border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <option>Sort by</option>
                                        <?php foreach ($list_filter_sort as $item): ?>
                                            <option value="<?= $item ?>"><?= $item ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="flex border rounded-md overflow-hidden">
                                        <button class="px-3 py-2 bg-white border-r"><i
                                                class="fas fa-th-large text-gray-600"></i></button>
                                        <button class="px-3 py-2 bg-gray-100"><i
                                                class="fas fa-list text-gray-600"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="table-products min-w-full divide-y divide-gray-200">
                                    
                                </table>
                            </div>

                            <script>
                                function renderDataTableProducts(data) {
                                    const parent = document.querySelector('.table-products')
                                    parent.innerHTML = ""
                                    parent.innerHTML = `<thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Product</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Category</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Price</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Quantity</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Status</th>
                                            <th
                                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Operation</th>
                                        </tr>
                                    </thead>`

                                    var tr = ""
                                    console.log(data)
                                    data.forEach((item, index) => {
                                        tr += `<tr class="table-row" onclick="getDataDetailProduct(${item.ID_San_Pham})">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <img src="${item.Hinh_Anh.split(';')[0]}"
                                                        class="h-12 w-12 bg-gray-100 rounded-md flex items-center justify-center">
                                                        
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">${item.Ten_SP}</div>
                                                        <div class="text-xs text-gray-500">#${item.ID_San_Pham}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.ID_Danh_Muc}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.Gia} USD</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.SL}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-800">${item.SL == 0 ? 'Sold out' : 'In stock'}</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-blue-600 hover:text-blue-900 mr-3"><i
                                                        class="fas fa-edit"></i></button>
                                                <button class="text-red-600 hover:text-red-900"><i
                                                        class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>`
                                    })

                                    var tbody = document.createElement('tbody')
                                    tbody.classList.add('bg-white', 'divide-y', 'divide-gray-200')
                                    tbody.innerHTML = tr
                                    parent.appendChild(tbody)

                                }

                                function renderNavigation(index) {
                                    const parent = document.querySelector('.navigation')
                                    var navigation = ""
                                    for (let i = 1; i <= index; i++) {
                                        navigation += `<button onclick="getDataProducts(${i})" class='px-3 py-1 border rounded-md bg-purple-600 text-white'>${i}</button>`
                                    }
                                    parent.innerHTML = `
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">Trước</button>
                                ${navigation}
                                <button class="px-3 py-1 border rounded-md hover:bg-gray-50">Sau</button>`

                                }

                                function searchProduct(){
                                    var keyword = document.querySelector('.input-search-product').value
                                    console.log(keyword)

                                    fetch("/The-Ordinary/product/search", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded"
                                        },
                                        body: new URLSearchParams({ keyword })
                                    })
                                    .then(res => res.json())
                                    .then(result => renderDataTableProducts(result))
                                }

                                function sortProduct(){
                                    var sort = document.querySelector('.sort-product').value
                                    console.log(sort)

                                    fetch("/The-Ordinary/product/sort", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded"
                                        },
                                        body: new URLSearchParams({ sort })
                                    })
                                    .then(res => res.json())
                                    .then(result => renderDataTableProducts(result))
                                }

                                function getDataProducts(navigation) {
                                    fetch("The-Ordinary/admin/products", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded"
                                        },
                                        body: new URLSearchParams({navigation})
                                    })
                                        .then(res => res.json())
                                        .then(data => {
                                            renderDataTableProducts(data[0])
                                            renderNavigation(data[1])
                                        })

                                }

                                getDataProducts(1)
                            </script>

                            <div class="flex justify-between items-center mt-6">
                                <div class="text-sm text-gray-500">Hiển thị 1-5 của 24 sản phẩm</div>
                                <div class="navigation flex space-x-1">
                                    <!-- <button class="px-3 py-1 border rounded-md hover:bg-gray-50">Trước</button>
                                    <button class="px-3 py-1 border rounded-md bg-purple-600 text-white">1</button>
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">2</button>
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">3</button>
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">4</button>
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">5</button>
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">Sau</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Orders Section -->
                <!-- Orders Section -->
                <!-- Orders Section -->
                <?php if (isset($_GET['page']) && $_GET['page'] === 'orders'): ?>
                    <div id="orders-section" class="space-y-6">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-semibold text-gray-800">Quản lý đơn hàng</h2>
                            <div class="flex space-x-2">
                                <button
                                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-50">
                                    <i class="fas fa-file-export mr-2"></i> Xuất Excel
                                </button>
                                <button
                                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-50">
                                    <i class="fas fa-print mr-2"></i> In
                                </button>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-3 md:space-y-0">
                                <div class="flex items-center space-x-2">
                                    <div class="relative">
                                        <input type="text" placeholder="Tìm đơn hàng..."
                                            class="py-2 pl-10 pr-4 w-64 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                    </div>
                                    <select
                                        class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <option>Tất cả trạng thái</option>
                                        <option>Chờ xác nhận</option>
                                        <option>Đang xử lý</option>
                                        <option>Đã giao</option>
                                        <option>Đã hủy</option>
                                    </select>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-sm text-gray-600">Từ:</span>
                                        <input type="date"
                                            class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <span class="text-sm text-gray-600">Đến:</span>
                                        <input type="date"
                                            class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Mã đơn</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Khách hàng</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Ngày đặt</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tổng tiền</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Thanh toán</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Trạng thái</th>
                                            <th
                                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr class="table-row">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                #ORD-2305</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Nguyễn Thị Hương
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">15/06/2023</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">1.250.000đ</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-800">Đã
                                                    thanh toán</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-3 py-1 text-xs rounded-full status-delivered">Đã giao</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-blue-600 hover:text-blue-900 mr-3">Chi tiết</button>
                                                <button class="text-gray-600 hover:text-gray-900"><i
                                                        class="fas fa-ellipsis-v"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="table-row">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                #ORD-2304</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Trần Văn Nam</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">15/06/2023</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">850.000đ</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-800">Đã
                                                    thanh toán</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-3 py-1 text-xs rounded-full status-processing">Đang xử
                                                    lý</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-blue-600 hover:text-blue-900 mr-3">Chi tiết</button>
                                                <button class="text-gray-600 hover:text-gray-900"><i
                                                        class="fas fa-ellipsis-v"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="table-row">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                #ORD-2303</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Lê Thị Hoa</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">14/06/2023</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">2.100.000đ</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                <span
                                                    class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Chờ
                                                    thanh toán</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-3 py-1 text-xs rounded-full status-pending">Chờ xác
                                                    nhận</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-blue-600 hover:text-blue-900 mr-3">Chi tiết</button>
                                                <button class="text-gray-600 hover:text-gray-900"><i
                                                        class="fas fa-ellipsis-v"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="table-row">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                #ORD-2302</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Phạm Minh Tuấn
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">14/06/2023</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">750.000đ</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-800">Đã
                                                    hủy</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-3 py-1 text-xs rounded-full status-cancelled">Đã hủy</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-blue-600 hover:text-blue-900 mr-3">Chi tiết</button>
                                                <button class="text-gray-600 hover:text-gray-900"><i
                                                        class="fas fa-ellipsis-v"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="table-row">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                #ORD-2301</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Vũ Thị Lan</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">13/06/2023</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">1.800.000đ</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-800">Đã
                                                    thanh toán</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-3 py-1 text-xs rounded-full status-delivered">Đã giao</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-blue-600 hover:text-blue-900 mr-3">Chi tiết</button>
                                                <button class="text-gray-600 hover:text-gray-900"><i
                                                        class="fas fa-ellipsis-v"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="flex justify-between items-center mt-6">
                                <div class="text-sm text-gray-500">Hiển thị 1-5 của 42 đơn hàng</div>
                                <div class="flex space-x-1">
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">Trước</button>
                                    <button class="px-3 py-1 border rounded-md bg-purple-600 text-white">1</button>
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">2</button>
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">3</button>
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">4</button>
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">5</button>
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">Sau</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Customers Section -->
                <?php if (isset($_GET['page']) && $_GET['page'] === 'users'): ?>
                    <div id="customers-section" class="space-y-6">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-semibold text-gray-800">Quản lý khách hàng</h2>
                            <div class="flex space-x-2">
                                <button
                                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-50">
                                    <i class="fas fa-file-export mr-2"></i> Xuất danh sách
                                </button>
                                <button
                                    class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md flex items-center">
                                    <i class="fas fa-plus mr-2"></i> Thêm khách hàng
                                </button>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-3 md:space-y-0">
                                <div class="flex items-center space-x-2">
                                    <div class="relative">
                                        <input type="text" placeholder="Tìm khách hàng..."
                                            class="py-2 pl-10 pr-4 w-64 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                    </div>
                                    <select
                                        class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <option>Tất cả nhóm</option>
                                        <option>VIP</option>
                                        <option>Thường xuyên</option>
                                        <option>Mới</option>
                                    </select>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <select
                                        class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <option>Sắp xếp theo</option>
                                        <option>Tên: A-Z</option>
                                        <option>Tên: Z-A</option>
                                        <option>Đơn hàng: Cao đến thấp</option>
                                        <option>Đơn hàng: Thấp đến cao</option>
                                    </select>
                                </div>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Khách hàng</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Email</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Số điện thoại</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Đơn hàng</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tổng chi tiêu</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nhóm</th>
                                            <th
                                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr class="table-row">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center">
                                                        <span class="text-purple-600 font-medium">NT</span>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">Nguyễn Thị Hương
                                                        </div>
                                                        <div class="text-xs text-gray-500">Hà Nội</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                huong.nguyen@email.com</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">0912345678</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">8</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">5.250.000đ</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-3 py-1 text-xs rounded-full bg-purple-100 text-purple-800">VIP</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-blue-600 hover:text-blue-900 mr-3">Chi tiết</button>
                                                <button class="text-gray-600 hover:text-gray-900"><i
                                                        class="fas fa-ellipsis-v"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="table-row">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                        <span class="text-blue-600 font-medium">TV</span>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">Trần Văn Nam</div>
                                                        <div class="text-xs text-gray-500">TP. Hồ Chí Minh</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">nam.tran@email.com
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">0987654321</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">5</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">3.850.000đ</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-800">Thường
                                                    xuyên</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-blue-600 hover:text-blue-900 mr-3">Chi tiết</button>
                                                <button class="text-gray-600 hover:text-gray-900"><i
                                                        class="fas fa-ellipsis-v"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="table-row">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-pink-100 flex items-center justify-center">
                                                        <span class="text-pink-600 font-medium">LH</span>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">Lê Thị Hoa</div>
                                                        <div class="text-xs text-gray-500">Đà Nẵng</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">hoa.le@email.com
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">0923456789</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">3</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">2.100.000đ</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-800">Thường
                                                    xuyên</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-blue-600 hover:text-blue-900 mr-3">Chi tiết</button>
                                                <button class="text-gray-600 hover:text-gray-900"><i
                                                        class="fas fa-ellipsis-v"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="table-row">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                                                        <span class="text-green-600 font-medium">PM</span>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">Phạm Minh Tuấn</div>
                                                        <div class="text-xs text-gray-500">Hải Phòng</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                tuan.pham@email.com</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">0934567890</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">1</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">750.000đ</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-800">Mới</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-blue-600 hover:text-blue-900 mr-3">Chi tiết</button>
                                                <button class="text-gray-600 hover:text-gray-900"><i
                                                        class="fas fa-ellipsis-v"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="table-row">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center">
                                                        <span class="text-yellow-600 font-medium">VL</span>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">Vũ Thị Lan</div>
                                                        <div class="text-xs text-gray-500">Cần Thơ</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">lan.vu@email.com
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">0945678901</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">6</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">4.800.000đ</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-3 py-1 text-xs rounded-full bg-purple-100 text-purple-800">VIP</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-blue-600 hover:text-blue-900 mr-3">Chi tiết</button>
                                                <button class="text-gray-600 hover:text-gray-900"><i
                                                        class="fas fa-ellipsis-v"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="flex justify-between items-center mt-6">
                                <div class="text-sm text-gray-500">Hiển thị 1-5 của 120 khách hàng</div>
                                <div class="flex space-x-1">
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">Trước</button>
                                    <button class="px-3 py-1 border rounded-md bg-purple-600 text-white">1</button>
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">2</button>
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">3</button>
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">4</button>
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">5</button>
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">Sau</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Revenue Section -->
                <?php if (isset($_GET['page']) && $_GET['page'] === 'revenue'): ?>
                    <div id="revenue-section" class="space-y-6">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-semibold text-gray-800">Báo cáo doanh thu</h2>
                            <div class="flex space-x-2">
                                <button
                                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-50">
                                    <i class="fas fa-file-export mr-2"></i> Xuất báo cáo
                                </button>
                                <button
                                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-50">
                                    <i class="fas fa-print mr-2"></i> In báo cáo
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-white p-6 rounded-xl shadow-sm">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-sm font-medium text-gray-500">Tổng doanh thu</h3>
                                    <select
                                        class="text-xs border rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <option>Tháng này</option>
                                        <option>Quý này</option>
                                        <option>Năm nay</option>
                                    </select>
                                </div>
                                <div class="flex items-center">
                                    <div class="text-3xl font-bold text-gray-800">42.500.000đ</div>
                                    <div class="ml-3 text-sm text-green-500"><i class="fas fa-arrow-up mr-1"></i>15%</div>
                                </div>
                                <div class="mt-4">
                                    <div class="h-2 bg-gray-200 rounded-full">
                                        <div class="h-2 bg-purple-500 rounded-full" style="width: 75%"></div>
                                    </div>
                                    <div class="flex justify-between mt-2 text-xs text-gray-500">
                                        <div>Mục tiêu: 60.000.000đ</div>
                                        <div>75%</div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-xl shadow-sm">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-sm font-medium text-gray-500">Đơn hàng</h3>
                                    <select
                                        class="text-xs border rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <option>Tháng này</option>
                                        <option>Quý này</option>
                                        <option>Năm nay</option>
                                    </select>
                                </div>
                                <div class="flex items-center">
                                    <div class="text-3xl font-bold text-gray-800">254</div>
                                    <div class="ml-3 text-sm text-green-500"><i class="fas fa-arrow-up mr-1"></i>8%</div>
                                </div>
                                <div class="mt-4">
                                    <div class="h-2 bg-gray-200 rounded-full">
                                        <div class="h-2 bg-blue-500 rounded-full" style="width: 85%"></div>
                                    </div>
                                    <div class="flex justify-between mt-2 text-xs text-gray-500">
                                        <div>Mục tiêu: 300</div>
                                        <div>85%</div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-xl shadow-sm">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-sm font-medium text-gray-500">Giá trị trung bình</h3>
                                    <select
                                        class="text-xs border rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <option>Tháng này</option>
                                        <option>Quý này</option>
                                        <option>Năm nay</option>
                                    </select>
                                </div>
                                <div class="flex items-center">
                                    <div class="text-3xl font-bold text-gray-800">650.000đ</div>
                                    <div class="ml-3 text-sm text-green-500"><i class="fas fa-arrow-up mr-1"></i>12%</div>
                                </div>
                                <div class="mt-4">
                                    <div class="h-2 bg-gray-200 rounded-full">
                                        <div class="h-2 bg-green-500 rounded-full" style="width: 92%"></div>
                                    </div>
                                    <div class="flex justify-between mt-2 text-xs text-gray-500">
                                        <div>Mục tiêu: 700.000đ</div>
                                        <div>92%</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="bg-white p-6 rounded-xl shadow-sm">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="font-semibold text-gray-800">Doanh thu theo tháng</h3>
                                    <div class="flex space-x-2">
                                        <select
                                            class="text-sm border rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                            <option>2023</option>
                                            <option>2022</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="h-80">
                                    <canvas id="yearlyRevenueChart"></canvas>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-xl shadow-sm">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="font-semibold text-gray-800">Doanh thu theo danh mục</h3>
                                    <div class="flex space-x-2">
                                        <select
                                            class="text-sm border rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                            <option>Tháng này</option>
                                            <option>Quý này</option>
                                            <option>Năm nay</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="h-80">
                                    <canvas id="categoryRevenueChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="font-semibold text-gray-800">Sản phẩm bán chạy</h3>
                                <select
                                    class="text-sm border rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    <option>Tháng này</option>
                                    <option>Quý này</option>
                                    <option>Năm nay</option>
                                </select>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>

                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </main>
        </div>
    </div>
    <script>
        function confirmUpdateSubmit() {
            return confirm("Are you sure you want to update?");
        }
        function confirmDeleteSubmit() {
            return confirm("Are you sure you want to delete?");
        }
        function confirmCreatSubmit() {
            return confirm("Are you sure you want to create?");
        }  
    </script>

</body>

</html>