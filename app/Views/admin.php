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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

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
    'Moisturizers',
    'Exfoliators',
    'Eye Serums',
    'Facial Cleansers',
    'Face Oils',
    'Toners & Essences',
    'Face Masques',
    'Explore Skincare',
    'Gifts'
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
    'canceled'
];

$list_status_account = [
    'Active',
    'Blocked'
];

$list_sort_customer = [
    'Sort by a-z name',
    'Sort by z-a name',
    'Sort by lowest orders',
    'Sort by highest orders',
    'Sort by lowest spent',
    'Sort by highest spent'
]
    ?>

<body>
    <?php if (isset($_SESSION['flash'])): ?>
        <div id="toast"
            class="fixed z-999 left-[50%] translate-x-[-30%] top-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm <?= $_SESSION['flash']['type'] ?> "
            role="alert">
            <div
                class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg <?= $_SESSION['flash']['type'] ?>">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal"><?= $_SESSION['flash']['message'] ?></div>
            <button onclick="closeAlert()" type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
            <script>
                function closeAlert(){
                const toast = document.querySelector('#toast')
                toast.style.display = 'none'
            }
            </script>
        </div>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
    <div class="wrapper flex h-screen bg-gray-50">

        <!-- Sidebar -->
        <div id="sidebar"
            class="sidebar bg-gradient-to-b from-blue-700 to-purple-500 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 z-50 transition duration-200 ease-in-out">
            <div class="flex items-center justify-between px-4">
                <div class="items-center space-x-2">
                    <p class="font-bold text-2xl">The Ordinary</p>
                    <span class="opacity-70">Admistrator</span>

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
                <a href="/The-Ordinary/admin?page=home" id="home-link"
                    class="sidebar-link <?= $_GET['page'] == 'home' ? 'active' : '' ?> flex items-center px-4 py-3 rounded-md cursor-pointer">
                    <i class="fas fa-house mr-3 w-5 text-center"></i>
                    <span>Home</span>
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
                <a href="/The-Ordinary/admin?page=category" id="category-link"
                    class="sidebar-link <?= $_GET['page'] == 'category' ? 'active' : '' ?> flex items-center px-4 py-3 rounded-md cursor-pointer">
                    <i class="fas fa-palette mr-3 w-5 text-center"></i>
                    <span>Category</span>
                </a>
                <a href="/The-Ordinary/admin?page=voucher" id="voucher-link"
                    class="sidebar-link <?= $_GET['page'] == 'voucher' ? 'active' : '' ?> flex items-center px-4 py-3 rounded-md cursor-pointer">
                    <i class="fas fa-ticket mr-3 w-5 text-center"></i>
                    <span>Vouchers</span>
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
                <div class="flex items-center space-x-3 mt-15">
                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNTYgMjU2Ij48Y2lyY2xlIGN4PSIxMjgiIGN5PSIxMjgiIHI9IjEyMCIgZmlsbD0iI2U2ZTZlNiIvPjxjaXJjbGUgY3g9IjEyOCIgY3k9IjExNSIgcj0iMzUiIGZpbGw9IiM5OTkiLz48cGF0aCBkPSJNMTg4LDIwNGEzMCwzMCwwLDAsMC0uODItNyw2MCw2MCwwLDAsMC01OS4xOC00M2gtLjE4YTYwLjA5LDYwLjA5LDAsMCwwLTU5LDQzLDMwLDMwLDAsMCwwLS44Miw3WiIgZmlsbD0iIzk5OSIvPjwvc3ZnPg=="
                        alt="Admin" class="w-10 h-10 rounded-full">
                    <div>
                        <p class="text-sm font-medium">Admin</p>
                        <p class="text-xs opacity-70">dinhvanhuy.04032019@gm...</p>
                    </div>
                </div>
                <div class="mt-6 flex items-center text-sm hover:bg-purple-100/10 p-2 rounded-md cursor-pointer">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    <a href="/The-Ordinary/logout">Log out</a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content flex-1 relative flex flex-col overflow-hidden">
            <?php if (isset($_SESSION['flash'])): ?>
                <div class="absolute z-99 w-full h-10 <?= $_SESSION['flash']['type'] ?>">
                    <?= $_SESSION['flash']['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['flash']); ?>
            <?php endif; ?>
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
                            <input type="text" placeholder="Search..."
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
                <!-- Dashboard Section -->
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
                                        <p class="text-2xl font-bold text-gray-800"><?= $total_order ?></p>
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
                                        <p class="text-2xl font-bold text-gray-800"><?= count($accounts) ?></p>
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
                                <script>
                                    const ctx = document.getElementById('revenueChart').getContext('2d');
                                    const gradient1 = ctx.createLinearGradient(0, 0, 0, 400);
                                    gradient1.addColorStop(0, 'rgb(144, 224, 239)');
                                    gradient1.addColorStop(1, 'rgba(202, 240, 248, 0)');
                                    const gradient2 = ctx.createLinearGradient(0, 0, 0, 400);
                                    gradient2.addColorStop(0, 'rgb(199, 125, 255)');
                                    gradient2.addColorStop(1, 'rgba(224, 170, 255, 0)');
                                    const chart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: <?= json_encode(array_column($monthlyData, 'month')) ?>,
                                            datasets: [
                                                {
                                                    label: 'Revenue (USD)',
                                                    fill: true,
                                                    backgroundColor: gradient1,
                                                    tension: 0.4, // đường cong mượt
                                                    pointRadius: 0, // ẩn chấm tròn
                                                    borderWidth: 2,
                                                    borderColor: 'rgb(0, 180, 216)',
                                                    data: <?= json_encode(array_map(fn($r) => round($r['revenue'], 0), $monthlyData)) ?>
                                                },
                                                {
                                                    label: 'Profit (USD)',
                                                    fill: true,
                                                    backgroundColor: gradient2,
                                                    tension: 0.4, // đường cong mượt
                                                    pointRadius: 0, // ẩn chấm tròn
                                                    borderWidth: 2,
                                                    borderColor: 'rgb(199, 125, 255)',
                                                    data: <?= json_encode(array_map(fn($r) => round($r['profit'], 0), $monthlyData)) ?>
                                                }
                                            ]
                                        },
                                        options: {
                                            responsive: true,
                                            maintainAspectRatio: false,
                                            plugins: {
                                                legend: {
                                                    position: 'top',
                                                    labels: {
                                                        usePointStyle: true,
                                                        pointStyle: 'circle',
                                                        padding: 20,
                                                        generateLabels(chart) {
                                                            return chart.data.datasets.map((dataset, i) => ({
                                                                text: dataset.label,
                                                                fillStyle: dataset.backgroundColor,
                                                                hidden: !chart.isDatasetVisible(i),
                                                                strokeStyle: 'transparent',
                                                                index: i,
                                                                pointStyle: 'circle'
                                                            }));
                                                        }

                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true,
                                                    grid: {
                                                        drawBorder: false
                                                    }
                                                },
                                                x: {
                                                    grid: {
                                                        drawBorder: false,
                                                    },

                                                }
                                            }
                                        }
                                    });
                                </script>
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
                                    <canvas id="bestseller"></canvas>
                                </div>
                                <script>
                                    const ctx2 = document.getElementById('bestseller').getContext('2d');
                                    const gradient3 = ctx2.createLinearGradient(0, 0, 0, 400);
                                    gradient3.addColorStop(0, 'rgb(0, 180, 216)');
                                    gradient3.addColorStop(1, 'rgb(199, 125, 255)');
                                    const chart2 = new Chart(ctx2, {
                                        type: 'bar',
                                        data: {
                                            labels: <?= json_encode(array_column($bestseller, 'Ten_SP')) ?>,
                                            datasets: [
                                                {
                                                    label: 'Top 5 bestseller',
                                                    fill: true,
                                                    backgroundColor: gradient3,
                                                    pointRadius: 0,
                                                    data: <?= json_encode(array_map(fn($r) => round($r['sold'], 0), $bestseller)) ?>
                                                },
                                            ]
                                        },
                                        options: {
                                            responsive: true,
                                            maintainAspectRatio: false,
                                            plugins: {
                                                legend: {
                                                    position: 'top',
                                                    labels: {
                                                        usePointStyle: true,
                                                        pointStyle: 'circle',
                                                        padding: 20,
                                                        generateLabels(chart) {
                                                            return chart.data.datasets.map((dataset, i) => ({
                                                                text: dataset.label,
                                                                fillStyle: dataset.backgroundColor,
                                                                hidden: !chart.isDatasetVisible(i),
                                                                strokeStyle: 'transparent',
                                                                index: i,
                                                                pointStyle: 'circle'
                                                            }));
                                                        }

                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true,
                                                    grid: {
                                                        drawBorder: false
                                                    }
                                                },
                                                x: {
                                                    ticks: {
                                                        callback: function (value) {
                                                            let label = this.getLabelForValue(value);
                                                            return label.length > 15 ? label.substring(0, 12) + '...' : label;
                                                        }
                                                    },
                                                    grid: {
                                                        drawBorder: false,
                                                    },

                                                }
                                            }
                                        }
                                    });
                                </script>
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

                <!-- Home Section -->
                <!-- Home Section -->
                <!-- Home Section -->

                <?php if (isset($_GET['page']) && $_GET['page'] === 'home'): ?>
                    <div id="home-section" class="space-y-6">
                        <div class="edit-btn flex justify-between items-center">
                            <h2 class="text-xl font-semibold text-gray-800">Home Management</h2>
                            <button onclick="getDataHome()"
                                class=" bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md flex items-center">
                                <i class="fas fa-edit mr-2"></i> Edit
                            </button>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="view">
                                <iframe class="w-full h-130" src="http://localhost/The-Ordinary/">
                                </iframe>
                            </div>
                        </div>
                    </div>
                    <script>
                        function renderEditHome(data){
                            var main = document.querySelector('.main-content')
                            var child = document.createElement('div')
                            child.classList.add("edit-home", "fixed", "flex", "items-center", "justify-center", "top-0", "z-999", "w-[84%]", "h-full", "bg-black/20")
                            child.innerHTML = `<div class="container relative overflow-y-scroll p-6 w-100 bg-white rounded-xl">
                    <form action="/The-Ordinary/admin/home" method="post" enctype="multipart/form-data"
                        class="w-full relative" onsubmit="return confirmUpdateSubmit()">
                        <div class="p-2 ring-1 ring-gray-200 rounded-sm">
                            <div class="sliders">
                                <span class="text-blue-500 font-bold">Slider</span>
                                ${data.slider.split(";").map(item => {
                                    return `<input name="slider[]" value="${item}" class="mt-1 w-full p-2 ring-1 ring-gray-200 rounded-sm">`
                                }).join("")}
                            </div>
                            <button type="button" onclick="AddInputSlider()" class="w-full p-2 bg-gray-300 text-gray-500 font-bold mt-2 rounded-sm"><i class="fas fa-plus"></i> Add</button>
                        </div>
                        
                        <div class="mt-4 p-2 ring-1 ring-gray-200 rounded-sm ">
                            <span class="text-blue-500 font-bold">Hero</span>
                            <input type="hidden" name="banner_old" value="${data.banner}">
                            <input type="file" name="banner" class="mt-1 w-full p-2 ring-1 ring-gray-200 rounded-sm">
                            <input name="heading" value="${data.heading}" class="mt-1 w-full p-2 ring-1 ring-gray-200 rounded-sm">
                            <textarea name="caption" class="mt-1 w-full p-2 ring-1 ring-gray-200 rounded-sm">${data.caption}</textarea>
                        </div>
                        <div class="mt-4 flex gap-3">
                            <button type="button" onclick="displayEditHome()" class="rounded-sm bg-blue-500 p-4 text-white font-bold w-full">Back</button>
                            <button class="rounded-sm bg-purple-500 p-4 text-white font-bold w-full">Update</button>
                        </div>
                    </form>
                </div>`
                main.appendChild(child)
                        }

                        function AddInputSlider(){
                            var sliders = document.querySelector('.sliders')
                            var input = document.createElement('input')
                            input.name = 'slider[]'
                            input.classList.add("mt-1", "w-full", "p-2", "ring-1", "ring-gray-200", "rounded-sm")
                            sliders.appendChild(input)
                        }

                        function getDataHome() {
                            fetch("/The-Ordinary/admin/home", {
                                method: "GET",
                                headers: {
                                    "Content-Type": "application/x-www-form-urlencoded"
                                }
                            })
                            .then(res => res.json())
                            .then(data => renderEditHome(data))
                        }
                    </script>
                <?php endif; ?>


                <!-- Products Section -->
                <!-- Products Section -->
                <!-- Products Section -->

                <?php if (isset($_GET['page']) && $_GET['page'] === 'products'): ?>
                    <div id="products-section" class="space-y-6">
                        <div class="create-btn flex justify-between items-center">
                            <h2 class="text-xl font-semibold text-gray-800">Products Management</h2>
                            <button onclick="displayCreate()"
                                class=" bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md flex items-center">
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
                                    <select onchange="categoryFilter()"
                                        class="filter-product border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <option value="all">All</option>
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
                                    var list_category = [
                                        'Serums',
                                        'Moisturizers',
                                        'Exfoliators',
                                        'Eye Serums',
                                        'Facial Cleansers',
                                        'Face Oils',
                                        'Toners & Essences',
                                        'Face Masques',
                                        'Explore Skincare',
                                        'Gifts'
                                    ];
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
                                        tr += `<tr class="table-row">
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
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${list_category[item.ID_Danh_Muc - 1]}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.Gia} USD</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.SL}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-3 py-1 text-xs rounded-full ${item.SL == 0 ? 'bg-orange-100 text-orange-400' : 'bg-green-100 text-green-800'}">${item.SL == 0 ? 'Sold out' : 'In stock'}</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button onclick="getDataProductById(${item.ID_San_Pham})" class="text-blue-600 hover:text-blue-900 mr-3"><i
                                                        class="fas fa-edit"></i></button>
                                                <button onclick="deleteProduct(${item.ID_San_Pham})" class="cursor-pointer text-red-600 hover:text-red-900"><i
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
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">Previous</button>
                                ${navigation}
                                <button class="px-3 py-1 border rounded-md hover:bg-gray-50">Next</button>`

                                }

                                function searchProduct() {
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

                                function sortProduct() {
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

                                function categoryFilter() {
                                    var cate = document.querySelector('.filter-product').value
                                    console.log(cate)

                                    if (cate == 'all') {
                                        getDataProducts(1)
                                        return
                                    }

                                    fetch("/The-Ordinary/product/category", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded"
                                        },
                                        body: new URLSearchParams({ cate })
                                    })
                                        .then(res => res.json())
                                        .then(result => {
                                            renderDataTableProducts(result[0])
                                            renderNavigation(result[1])
                                        })
                                }

                                function renderUpdateProduct(data) {
                                    const typeSkin = ['All Skin Types', 'Dry Skin', 'Oily Skin']
                                    const format = ['Serum', 'Cream', 'Gel', 'Liquid', 'Oil', 'Powder', 'Balm', 'Masque', 'Suspension']
                                    const main = document.querySelector('.main-content')
                                    var child = document.createElement('div')
                                    child.classList.add("update-product", "fixed", "flex", "items-center", "justify-center", "top-0", "z-999", "w-[84%]", "h-full", "bg-black/20")

                                    child.innerHTML = `<div class="container relative overflow-y-scroll h-150 p-6 w-200 bg-white rounded-xl">
                                    <form action="/The-Ordinary/admin/product" method="post" enctype="multipart/form-data"
                                        class="w-full relative" onsubmit="return confirmUpdateSubmit()">
                                        <input hidden name="id_product" value="${data[0].ID_San_Pham}">
                                        
                                        <div class="w-[50%] rounded-sm p-2 ring-1 ring-gray-200 grid grid-cols-2 gap-2">
                                            <div class="mt-3">
                                                <span>Name</span>
                                                <input value="${data[0].Ten_SP}" class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2" name="name_product" type="text">
                                            </div>
                                            <div class="mt-3">
                                                <span>Price</span>
                                                <input value="${data[0].Gia}" class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2" name="price_product" type="text">
                                            </div>
                                            <div class="mt-3">
                                                <span>Quantity</span>
                                                <input ${data[0].SL == 0 ? '' : 'disabled readonly'} value="${data[0].SL}" class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2" name="quantity_product" type="text">
                                            </div>
                                            <div class="mt-3">
                                                <span>Size</span>
                                                <input value="${data[0].Dung_Tich}" class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2" name="size_product" type="text">
                                            </div>
                                            <div class="mt-3">
                                                <span>Targets</span>
                                                <input value="${data[0].Targets}" class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2" name="targets_product" type="text">
                                            </div>
                                            <div class="mt-3">
                                                <span>Key ingredients</span>
                                                <input value="${data[0].Key_ingredients}" class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2" name="ingredients_product"
                                                    type="text">
                                            </div>
                                            <div class="mt-3">
                                                <span>Suited to</span>
                                                <select class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2" name="suited_product">
                                                    <option disabled selected value="">Select Suited</option>
                                                    ${typeSkin.map(item => `<option value="${item}" ${item === data[0].Suited_to ? `selected` : ``}>${item}</option>`).join("")}
                                                </select>
                                            </div>
                                            <div class="mt-3">
                                                <span>Category</span>
                                                <select class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2" name="format_product">
                                                    <option disabled selected value="">Select Category</option>
                                                    ${format.map(item => `<option value="${item}" ${item === data[0].Format ? `selected` : ``}>${item}</option>`).join("")}
                                                </select>
                                            </div>
                                            <div class="mt-3 col-start-1 col-end-3">
                                            <span>Description</span>
                                            <textarea class="w-full mt-2 ring-1 ring-gray-200 p-2" name="description_product" rows="3"
                                                cols="3">${data[0].Mo_Ta}</textarea>
                                        </div>
                                        </div>

                                       

                                        <div class="Album">
                                            <div class="dropzone" id="dropzone">
                                                <p>Drag drop image in here</p>
                                            </div>
                                            <input type="file" name="images[]" id="fileInput" multiple style="display:none">
                                            <div class="preview p-2 ring-1 ring-gray-200 rounded-sm" id="preview">
                                                ${data[0].Hinh_Anh.split(';').map(item => `<img class="list-img-item" src="${item}">`).join("")}
                                            </div>
                                    </div>
                                    <div class="rounded-sm bg-blue-500 w-[50%] mt-2 p-4">
                                        <button class="text-center w-full text-white text-bold" type="submit" name="update"
                                            value="update">Update</button>
                                    </div>
                                    <div class="rounded-sm bg-red-500 w-[50%] mt-2 p-4">
                                        <button onclick="displayUpdate()" type="button"
                                            class="create-btn text-center text-white w-full text-bold" type="submit">Cancle</button>
                                    </div>
                                    </form>
                                </div>`

                                    main.appendChild(child)
                                }

                                function deleteProduct(id_product) {

                                    if (!confirm('Are you sure delete?')) {
                                        return
                                    }

                                    fetch("/The-Ordinary/admin/product", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded"
                                        },
                                        body: new URLSearchParams({ id_product, 'delete': 'delete' })
                                    })
                                        .then(getDataProducts(1))
                                }

                                function getDataProducts(navigation) {
                                    fetch("The-Ordinary/admin/products", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded"
                                        },
                                        body: new URLSearchParams({ navigation })
                                    })
                                        .then(res => res.json())
                                        .then(data => {
                                            renderDataTableProducts(data[0])
                                            renderNavigation(data[1])
                                        })

                                }

                                function getDataProductById(id) {
                                    fetch("The-Ordinary/product", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded"
                                        },
                                        body: new URLSearchParams({ id })
                                    })
                                        .then(res => res.json())
                                        .then(data => renderUpdateProduct(data))
                                }

                                getDataProducts(1)
                            </script>

                            <div class="flex justify-between items-center mt-6">
                                <div class="text-sm text-gray-500"></div>
                                <div class="navigation flex space-x-1">

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
                            <h2 class="text-xl font-semibold text-gray-800">Orders Management</h2>
                            <div class="flex space-x-2">
                                <button onclick="exportDataOrder()"
                                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-50">
                                    <i class="fas fa-file-export mr-2"></i> Excel Export
                                </button>
                                <button
                                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-50">
                                    <i class="fas fa-print mr-2"></i> Print
                                </button>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-3 md:space-y-0">
                                <div class="flex items-center space-x-2">
                                    <div class="relative">
                                        <input oninput="searchOrder()" type="text" placeholder="Search..."
                                            class="input-search-order py-2 pl-10 pr-4 w-64 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                    </div>
                                    <select onchange="statusFilter()"
                                        class="filter-order border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <option value="all">All</option>
                                        <?php foreach ($list_filter as $item): ?>
                                            <option value="<?= $item ?>"><?= $item ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-sm text-gray-600">From:</span>
                                        <input type="date"
                                            class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <span class="text-sm text-gray-600">To:</span>
                                        <input type="date"
                                            class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="table-orders min-w-full divide-y divide-gray-200">


                                </table>
                            </div>

                            <script>
                                function renderDataTableOrders(data) {
                                    const parent = document.querySelector('.table-orders')
                                    parent.innerHTML = ""
                                    parent.innerHTML = `<thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                CODE</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                CUSTOMER</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                DATE</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                TOTAL</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                PAYMENT</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                STATUS</th>
                                            <th
                                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Operation</th>
                                        </tr>
                                    </thead>`

                                    var tr = ""
                                    console.log(data)
                                    data.forEach((item, index) => {
                                        tr += `<tr class="table-row">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                #${item.ID_Don_Hang}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">#${item.ID_Khach_Hang}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.Ngay_Dat}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.tong_tien} USD</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-800">${item.payment_status}</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-3 py-1 text-xs rounded-full status-${item.Trang_Thai}">${item.Trang_Thai}</span>
                                            </td>
                                            <td class="relative px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button onclick="getDataOrderDetail(${item.ID_Don_Hang})" class="text-blue-600 hover:text-blue-900 mr-3">Detail</button>
                                                <button class="dropdown p-2 text-gray-600 hover:text-gray-900"><i
                                                        class="fas fa-ellipsis-v"></i>
                                                </button>
                                                 <div class="dropdown-content shadow bg-gray-50 p-2 right-5 z-99 absolute">
                                                        <button style=${item.Trang_Thai != 'pending' ? "opacity:50%" : "opacity:100%"} ${item.Trang_Thai != 'pending' ? "disabled" : ""} onclick="updateStatus('${item.ID_Don_Hang}','shipped')" class="w-full text-center font-bold bg-orange-200 text-orange-400 px-2 rounded-xl">Confirm</button><br>
                                                        <button style=${item.Trang_Thai != 'shipped' ? "opacity:50%" : "opacity:100%"} ${item.Trang_Thai != 'shipped' ? "disabled" : ""} onclick="updateStatus('${item.ID_Don_Hang}','delivered')" class="w-full mt-2 text-center font-bold bg-green-200 text-green-400 px-2 rounded-xl">Delivered</button>
                                                    </div>
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
                                        navigation += `<button onclick="getDataOrders(${i})" class='px-3 py-1 border rounded-md bg-purple-600 text-white'>${i}</button>`
                                    }
                                    parent.innerHTML = `
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">Previous</button>
                                ${navigation}
                                <button class="px-3 py-1 border rounded-md hover:bg-gray-50">Next</button>`

                                }

                                function renderOrderDetail(data) {
                                    console.log(data)

                                    const main = document.querySelector('.main-content')
                                    var child = document.createElement('div')
                                    child.classList.add("detail-order", "fixed", "flex", "items-center", "justify-center", "top-0", "z-999", "w-[84%]", "h-full", "bg-black/20")
                                    child.innerHTML = `<div class="container flex-row gap-5 relative overflow-y-scroll min-h-120 p-6 w-100 bg-white rounded-xl">
                                    <div class="receipt relative p-3 w-full min-h-100 ring-1 ring-gray-200">
                                        <div class="flex justify-between">
                                            <h4>RECEIPT</h4>
                                            <h4>${data[0].Ngay_Dat}</h4>
                                        </div>
                                        <hr class="border-0.5 border-gray-200">
                                                ${data.map((item) => {
                                    return `<div class="flex gap-5 mt-5">
                                                    <img src="${item.Hinh_Anh.split(";")[0]}" class="bg-gray-100 w-[50px] h-[50px]">
                                                    <div>
                                                        <h5>${item.Ten_SP}</h5>
                                                        <span>${item.so_luong}x</span>
                                                        <span class="text-red-500">${item.price_each} USD</span>
                                                    </div>
                                                </div>`}).join("")}
                                        <div class="receipt-info absolute bottom-4 left-4">
                                            <p><strong>Name:</strong> ${data[0].HoTen}</p>
                                            <p><strong>Phone:</strong> ${data[0].SDT}</p>
                                            <p><strong>Address:</strong> ${data[0].dia_chi_giao}</p>
                                            <p><strong>Total:</strong> ${data[0].tong_tien} USD</p>
                                        </div>
                                        
                                    </div>
                                    <button onclick="print()" class="bg-blue-200 text-blue-500 font-bold mt-2 w-full ring-1 ring-gray-200 p-2"><i class="fas fa-print mr-2"></i>Print</button>
                                    <button onclick="displayDetailOrder()" class="font-bold w-full ring-1 ring-gray-200 p-2 mt-2">Back</button>
                                    
                                    
                                </div>`

                                    main.appendChild(child)

                                }

                                function searchOrder() {
                                    var id = document.querySelector('.input-search-order').value
                                    console.log(id)

                                    fetch("/The-Ordinary/admin/order/search", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded"
                                        },
                                        body: new URLSearchParams({ id })
                                    })
                                        .then(res => res.json())
                                        .then(result => {
                                            renderDataTableOrders(result)
                                            renderNavigation(1)
                                        })
                                }

                                function updateStatus(id_order, status) {

                                    if (!confirm("Are you sure update ?")) {
                                        return
                                    }

                                    var update = status
                                    fetch('The-Ordinary/admin/order', {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded"
                                        },
                                        body: new URLSearchParams({ id_order, update })
                                    })
                                        .then(getDataOrders(1))
                                }

                                function statusFilter() {
                                    var status = document.querySelector('.filter-order').value
                                    console.log(status)

                                    if (status == 'all') {
                                        getDataOrders(1)
                                        return
                                    }

                                    fetch("/The-Ordinary/admin/order/filter", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded"
                                        },
                                        body: new URLSearchParams({ status })
                                    })
                                        .then(res => res.json())
                                        .then(result => {
                                            renderDataTableOrders(result)
                                            renderNavigation(result(1))
                                        })
                                }

                                function getDataOrders(navigation) {
                                    fetch("The-Ordinary/admin/orders", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded"
                                        },
                                        body: new URLSearchParams({ navigation })
                                    })
                                        .then(res => res.json())
                                        .then(data => {
                                            renderDataTableOrders(data[0])
                                            renderNavigation(data[1])
                                        })

                                }

                                function getDataOrderDetail(id) {
                                    fetch("The-Ordinary/admin/order/detail", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded"
                                        },
                                        body: new URLSearchParams({ id })
                                    })
                                        .then(res => res.json())
                                        .then(data => renderOrderDetail(data))

                                }
                                getDataOrders(1)
                            </script>

                            <div class="flex justify-between items-center mt-6">
                                <div class="text-sm text-gray-500"></div>
                                <div class="navigation flex space-x-1">

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- Customers Section -->
                <!-- Customers Section -->
                <!-- Customers Section -->

                <?php if (isset($_GET['page']) && $_GET['page'] === 'users'): ?>
                    <div id="customers-section" class="space-y-6">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-semibold text-gray-800">Customer Management</h2>
                            <div class="flex space-x-2">
                                <button onclick="exportDataCustomer()"
                                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-50">
                                    <i class="fas fa-file-export mr-2"></i> Export Excel
                                </button>
                                <button
                                    class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md flex items-center">
                                    <i class="fas fa-plus mr-2"></i> Add
                                </button>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-3 md:space-y-0">
                                <div class="flex items-center space-x-2">
                                    <div class="relative">
                                        <input oninput="searchCustomer()" type="text" placeholder="Search..."
                                            class="input-search-customer py-2 pl-10 pr-4 w-64 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                    </div>
                                    <select
                                        class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <option>Group</option>
                                        <option>VIP</option>
                                        <option>Normally</option>
                                        <option>Newbie</option>
                                    </select>
                                    <select onchange="filterCustomer()"
                                        class="filter-gender border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <option value="">Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <select onchange="filterCustomer()"
                                        class="filter-status border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <option value="">Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Blocked">Blocked</option>
                                    </select>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <select onchange="sortCustomer()"
                                        class="sort-customer border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <option value="Sort by a-z name">Sort by</option>
                                        <?php foreach ($list_sort_customer as $sort): ?>
                                            <option value="<?= $sort ?>"><?= $sort ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="table-customers min-w-full divide-y divide-gray-200">


                                </table>
                            </div>

                            <script>
                                function renderDataTableCustomers(data) {
                                    const parent = document.querySelector('.table-customers')
                                    parent.innerHTML = ""
                                    parent.innerHTML = ` <thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Customer</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Email</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Phone</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ORDERS</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Spent</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Status</th>
                                            <th
                                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                OPERATION</th>
                                        </tr>
                                    </thead>`

                                    var tr = ""
                                    console.log(data)
                                    data.forEach((item, index) => {
                                        tr += `<tr class="table-row">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center">
                                                        <span class="text-purple-600 font-medium">${item.HoTen.slice(0, 1)}</span>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">${item.HoTen}
                                                        </div>
                                                        <div class="text-xs text-gray-500">#${item.ID_Khach_Hang}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.Email}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.SDT}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.total_orders}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">${item.total_spent}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span
                                                    class="px-3 py-1 text-xs rounded-full status-${item.trang_thai}">${item.trang_thai}</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button onclick="getDataCustomerByid('${item.ID_Khach_Hang}')" class="text-blue-600 hover:text-blue-900 mr-3">Detail</button>
                                                <button class="dropdown p-2 text-gray-600 hover:text-gray-900"><i
                                                        class="fas fa-ellipsis-v"></i></button>
                                                <div class="dropdown-content shadow w-30 bg-gray-50 p-2 right-10 z-99 absolute">
                                                        <button style=${item.trang_thai != 'Blocked' ? "opacity:50%" : "opacity:100%"} ${item.Trang_Thai != 'Blocked' ? "disabled" : ""} onclick="updateStatus('${item.ID_Khach_Hang}','shipped')" class="w-full text-center font-bold bg-green-200 text-green-400 px-2 rounded-xl">Unlock</button><br>
                                                        <button style=${item.trang_thai != 'Active' ? "opacity:50%" : "opacity:100%"} ${item.trang_thai != 'Active' ? "disabled" : ""} onclick="updateStatus('${item.ID_Khach_Hang}','delivered')" class="w-full mt-2 text-center font-bold bg-rose-200 text-rose-400 px-2 rounded-xl">Block</button>
                                                    </div>
                                            </td>
                                        </tr>`
                                    })

                                    var tbody = document.createElement('tbody')
                                    tbody.classList.add('bg-white', 'divide-y', 'divide-gray-200')
                                    tbody.innerHTML = tr
                                    parent.appendChild(tbody)
                                }

                                function renderDataCustomerDetail(data) {
                                    console.log(data)

                                    const main = document.querySelector('.main-content')
                                    var child = document.createElement('div')
                                    child.classList.add("customer-detail", "fixed", "flex", "items-center", "justify-center", "top-0", "z-999", "w-[84%]", "h-full", "bg-black/20")
                                    child.innerHTML = `<div class="container relative overflow-y-scroll p-6 w-100 bg-white rounded-xl">
                                                            <div class="flex gap-2 items-center">
                                                                <div
                                                                    class="rounded-xl ring-1 ring-gray-200 w-30 h-30 flex justify-center items-center text-purple-500 font-bold text-5xl">
                                                                    <span>${data[0].HoTen.slice(0, 1)}</span>
                                                                </div>
                                                                <div class="flex-1 ring-1 ring-gray-200 h-30 rounded-xl p-4">
                                                                    <strong>${data[0].HoTen}</strong>
                                                                    <p class="text-gray-500 mt-1">#${data[0].ID_Khach_Hang}</p>
                                                                    <div class="flex items-center gap-2">
                                                                        <p class="status-${data[0].trang_thai} mt-1 py-1 px-2 text-center rounded-xl">${data[0].trang_thai}</p>
                                                                        <p class="rounded-xl mt-1 py-1 px-2 bg-blue-200 text-blue-500">Newbie</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="w-full">
                                                                <div class="flex ring-1 ring-gray-200 rounded-sm items-center gap-2 mt-2">
                                                                    <i class="text-gray-500 p-2 fa-solid fa-envelope"></i>
                                                                    <p class="text-gray-500">${data[0].Email}</p>
                                                                </div>
                                                                <div class="flex ring-1 ring-gray-200 rounded-sm items-center gap-2 mt-2">
                                                                    <i class="text-gray-500 bg-purle-300 p-2 rounded-full fa-solid fa-location-dot"></i>
                                                                    <p class="text-gray-500">${data[0].DiaChi}</p>
                                                                </div>
                                                                <div class="flex ring-1 ring-gray-200 rounded-sm items-center gap-2 mt-2">
                                                                    <i class="text-gray-500 p-2 rounded-full fa-solid fa-phone"></i>
                                                                    <p class="text-gray-500">${data[0].SDT}</p>
                                                                </div>
                                                                <div class="flex ring-1 ring-gray-200 rounded-sm items-center gap-2 mt-2">
                                                                    <i class="text-gray-500 p-2 rounded-full fa-solid fa-clock"></i>
                                                                    <p class="text-gray-500">${data[0].ngay_sinh}</p>
                                                                </div>
                                                                <div class="flex ring-1 ring-gray-200 rounded-sm items-center gap-2 mt-2">
                                                                    <i class="text-gray-500 p-2 rounded-full fa-solid fa-venus-mars"></i>
                                                                    <p class="text-gray-500">${data[0].gioi_tinh}</p>
                                                                </div>
                                                                <div class="flex ring-1 ring-gray-200 rounded-sm items-center gap-2 mt-2">
                                                                    <i class="text-gray-500 p-2 rounded-full fa-solid fa-box"></i>
                                                                    <p class="text-gray-500">${data[0].total_orders}</p>
                                                                </div>
                                                                <div class=" p-3 ring-1 ring-gray-200 rounded-sm items-center gap-2 mt-2">
                                                                    <div class="flex justify-between items-center">
                                                                        <span>Point</span>
                                                                        <span class="">${data[0].total_spent}</span>
                                                                    </div>
                                                                    <div class="mt-2 w-full bg-gray-100 h-5 rounded-xl">
                                                                        <div class="h-full w-[50%] bg-gradient-to-r from-blue-700 to-purple-500 rounded-xl flex items-center">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex mt-4 gap-2">
                                                                    <button onclick="displayCustomer()" class="w-full rounded-sm p-2 font-bold ring-1 ring-gray-200">Back</button>
                                                                    <button onclick="displayContact()" class="w-full p-2 font-bold bg-blue-500 rounded-sm text-white">Contact</button>
                                                                </div>
                                                            </div>
                                                            <div style="display:none" class="contact absolute p-4 top-0 left-0 bg-white w-full h-full">
                                                                <form method="post" action="/The-Ordinary/admin/users/sendmail">
                                                                    <div class="rounded-sm mt-1 flex p-2 w-full ring-1 ring-gray-200">
                                                                        <strong><span>From: </span></strong>
                                                                        <input name="mailsender" value="dinhvanhuy.04032019@gmail.com" class="w-full ml-2 outline-none" readonly></input>
                                                                    </div>
                                                                    <div class="rounded-sm mt-3 flex p-2 w-full ring-1 ring-gray-200">
                                                                        <strong><span>To: </span></strong>
                                                                        <input name="mailreceiver" value="${data[0].Email}" class="w-full ml-2 outline-none" readonly></input>
                                                                    </div>
                                                                    <div class="rounded-sm mt-3 flex p-2 w-full ring-1 ring-gray-200">
                                                                        <strong><span>Title: </span></strong>
                                                                        <input name="title" class="w-full ml-2 outline-none"></input>
                                                                    </div>
                                                                    <div class="rounded-sm mt-3 p-2 w-full ring-1 ring-gray-200">
                                                                        <strong><span>Content: </span></strong>
                                                                        <textarea name="content" class="w-full outline-none" rows="10"></textarea>
                                                                    </div>
                                                                    <div class="flex mt-4 gap-2">
                                                                        <button type="button" onclick="displayContact()" class="w-full rounded-sm p-2 font-bold ring-1 ring-gray-200">Back</button>
                                                                        <button onclick="loading()" class="send w-full p-2 font-bold bg-blue-500 rounded-sm text-white flex items-center justify-center">Send</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>`

                                    main.appendChild(child)

                                }

                                function renderNavigation(index) {
                                    const parent = document.querySelector('.navigation')
                                    var navigation = ""
                                    for (let i = 1; i <= index; i++) {
                                        navigation += `<button onclick="getDataCustomers(${i})" class='px-3 py-1 border rounded-md bg-purple-600 text-white'>${i}</button>`
                                    }
                                    parent.innerHTML = `
                                    <button class="px-3 py-1 border rounded-md hover:bg-gray-50">Previous</button>
                                ${navigation}
                                <button class="px-3 py-1 border rounded-md hover:bg-gray-50">Next</button>`

                                }

                                function searchCustomer() {
                                    var keyword = document.querySelector('.input-search-customer').value
                                    console.log(keyword)

                                    fetch("/The-Ordinary/admin/users/search", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded"
                                        },
                                        body: new URLSearchParams({ keyword })
                                    })
                                        .then(res => res.json())
                                        .then(result => {
                                            renderDataTableCustomers(result[0])
                                            renderNavigation(result[1])
                                        })
                                }

                                function sortCustomer() {
                                    var sort = document.querySelector('.sort-customer').value
                                    console.log(sort)

                                    fetch("/The-Ordinary/admin/users/sort", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded"
                                        },
                                        body: new URLSearchParams({ sort })
                                    })
                                        .then(res => res.json())
                                        .then(result => renderDataTableCustomers(result[0]))
                                }

                                function filterCustomer() {
                                    var gender = document.querySelector('.filter-gender').value
                                    var status = document.querySelector('.filter-status').value
                                    console.log(gender)
                                    console.log(status)
                                    fetch("/The-Ordinary/admin/users/filter", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded"
                                        },
                                        body: new URLSearchParams({ gender, status })
                                    })
                                        .then(res => res.json())
                                        .then(result => renderDataTableCustomers(result[0]))
                                }

                                function getDataCustomerByid(id) {
                                    console.log(id)
                                    fetch("/The-Ordinary/admin/users/detail", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded"
                                        },
                                        body: new URLSearchParams({ id })
                                    })
                                        .then(res => res.json())
                                        .then(data => renderDataCustomerDetail(data))
                                }

                                function getDataCustomers(navigation) {
                                    fetch("The-Ordinary/admin/users", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded"
                                        },
                                        body: new URLSearchParams({ navigation })
                                    })
                                        .then(res => res.json())
                                        .then(data => {
                                            renderDataTableCustomers(data[0])
                                            renderNavigation(data[1])
                                        })
                                }

                                getDataCustomers(1)

                            </script>

                            <div class="flex justify-between items-center mt-6">
                                <div class="text-sm text-gray-500"></div>
                                <div class="navigation flex space-x-1">

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Category Section -->
                <!-- Category Section -->
                <!-- Category Section -->

                <?php if(isset($_GET['page']) && $_GET['page'] === 'category'):?>
                    <div id="category-section" class="space-y-6">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-semibold text-gray-800">Category Management</h2>
                            <div class="flex space-x-2">
                                <button onclick="displayCreateCategory()" class="bg-purple-500 text-white px-4 py-2 rounded-md">
                                    <i class="fas fa-plus mr-2"></i> Add
                                </button>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="overflow-x-auto">
                                <table class="table-category min-w-full divide-y divide-gray-200">
                                
                                </table>
                            </div>
                        </div>

                        <script>
                            function renderDataTableCategory(data){
                                const parent = document.querySelector('.table-category')
                                parent.innerHTML = ""
                                parent.innerHTML =`<thead>
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Category
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Date
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            OPERATION
                                        </th>
                                    </tr>
                                </thead>`
                                var tr = ""
                                console.log(data)
                                data.forEach((item)=>{
                                    tr += `<tr class="table-row">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            #${item.ID_Danh_Muc}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            ${item.Danh_Muc}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            ${item.Ngay_Tao}
                                        </td>
                                        <td class="px-6 flex justify-left py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button onclick="getDataProductById(${item.ID_Danh_Muc})" class="text-blue-600 hover:text-blue-900 mr-3"><i
                                                        class="fas fa-edit"></i></button>
                                                <button onclick="deleteProduct(${item.ID_Danh_Muc})" class="cursor-pointer text-red-600 hover:text-red-900"><i
                                                        class="fas fa-trash"></i></button>
                                            </td>
                                    </tr>`
                                })

                                var tbody = document.createElement('tbody')
                                tbody.classList.add('bg-white', 'divide-y', 'divide-gray-200')
                                tbody.innerHTML = tr
                                parent.appendChild(tbody)
                            }

                            function getDataCategory(){
                                fetch("/The-Ordinary/admin/category",{
                                    method: "GET",
                                    headers:{
                                        "Content-Type": "application/x-www-form-urlencoded"
                                    }
                                })
                                .then((res => res.json()))
                                .then(data => renderDataTableCategory(data))
                            }

                            getDataCategory()
                        </script>
                    </div>
                <?php endif; ?>


                <?php if(isset($_GET['page']) && $_GET['page'] === 'voucher'):?>
                    <div id="category-section" class="space-y-6">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-semibold text-gray-800">Vouchers Management</h2>
                            <div class="flex space-x-2">
                                <button onclick="displayCreateCategory()" class="bg-purple-500 text-white px-4 py-2 rounded-md">
                                    <i class="fas fa-plus mr-2"></i> Add
                                </button>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="overflow-x-auto">
                                <table class="table-category min-w-full divide-y divide-gray-200">
                                
                                </table>
                            </div>
                        </div>

                        <script>
                            function renderDataTableCategory(data){
                                const parent = document.querySelector('.table-category')
                                parent.innerHTML = ""
                                parent.innerHTML =`<thead>
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Category
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Date
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            OPERATION
                                        </th>
                                    </tr>
                                </thead>`
                                var tr = ""
                                console.log(data)
                                data.forEach((item)=>{
                                    tr += `<tr class="table-row">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            #${item.ID_Danh_Muc}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            ${item.Danh_Muc}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            ${item.Ngay_Tao}
                                        </td>
                                        <td class="px-6 flex justify-left py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button onclick="getDataProductById(${item.ID_Danh_Muc})" class="text-blue-600 hover:text-blue-900 mr-3"><i
                                                        class="fas fa-edit"></i></button>
                                                <button onclick="deleteProduct(${item.ID_Danh_Muc})" class="cursor-pointer text-red-600 hover:text-red-900"><i
                                                        class="fas fa-trash"></i></button>
                                            </td>
                                    </tr>`
                                })

                                var tbody = document.createElement('tbody')
                                tbody.classList.add('bg-white', 'divide-y', 'divide-gray-200')
                                tbody.innerHTML = tr
                                parent.appendChild(tbody)
                            }

                            function getDataCategory(){
                                fetch("/The-Ordinary/admin/category",{
                                    method: "GET",
                                    headers:{
                                        "Content-Type": "application/x-www-form-urlencoded"
                                    }
                                })
                                .then((res => res.json()))
                                .then(data => renderDataTableCategory(data))
                            }

                            
                        </script>
                    </div>
                <?php endif; ?>

                <!-- Revenue Section -->
                <!-- Revenue Section -->
                <!-- Revenue Section -->

                <?php if (isset($_GET['page']) && $_GET['page'] === 'revenue'): ?>
                    <div id="revenue-section" class="space-y-6">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-semibold text-gray-800">Revenue Report</h2>
                            <div class="flex space-x-2">
                                <button
                                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-50">
                                    <i class="fas fa-file-export mr-2"></i> Export
                                </button>
                                <button
                                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-50">
                                    <i class="fas fa-print mr-2"></i> Print
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-white p-6 rounded-xl shadow-sm">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-sm font-medium text-gray-500">Revenue</h3>
                                    <select
                                        class="text-xs border rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <option>This month</option>
                                        <option>This year</option>
                                    </select>
                                </div>
                                <div class="flex items-center">
                                    <div class="text-3xl font-bold text-gray-800"><?= $currentMonthlyData[0]['revenue'] ?>
                                        USD
                                    </div>
                                    <div class="ml-3 text-sm text-green-500"><i class="fas fa-arrow-up mr-1"></i>15%</div>
                                </div>
                                <div class="mt-4">
                                    <div class="h-2 bg-gray-200 rounded-full">
                                        <div class="h-2 bg-purple-500 rounded-full"
                                            style="width: <?= ($currentMonthlyData[0]['revenue'] / 150 * 100) . "%" ?>">
                                        </div>
                                    </div>
                                    <div class="flex justify-between mt-2 text-xs text-gray-500">
                                        <div>Target: 150.00 USD</div>
                                        <div><?= number_format(($currentMonthlyData[0]['revenue'] / 150 * 100), 2) . "%" ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-xl shadow-sm">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-sm font-medium text-gray-500">Profit</h3>
                                    <select
                                        class="text-xs border rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <option>This month</option>
                                        <option>This year</option>
                                    </select>
                                </div>
                                <div class="flex items-center">
                                    <div class="text-3xl font-bold text-gray-800"><?= $currentMonthlyData[0]['profit'] ?>
                                        USD
                                    </div>
                                    <div class="ml-3 text-sm text-green-500"><i class="fas fa-arrow-up mr-1"></i>8%</div>
                                </div>
                                <div class="mt-4">
                                    <div class="h-2 bg-gray-200 rounded-full">
                                        <div class="h-2 bg-blue-500 rounded-full"
                                            style="width: <?= ($currentMonthlyData[0]['profit'] / 30 * 100) . "%" ?>"></div>
                                    </div>
                                    <div class="flex justify-between mt-2 text-xs text-gray-500">
                                        <div>Target: 30.00 USD</div>
                                        <div><?= number_format(($currentMonthlyData[0]['profit'] / 30 * 100), 2) . "%" ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-xl shadow-sm">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-sm font-medium text-gray-500">Orders</h3>
                                    <select
                                        class="text-xs border rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <option>This month</option>
                                        <option>This year</option>
                                    </select>
                                </div>
                                <div class="flex items-center">
                                    <div class="text-3xl font-bold text-gray-800"><?= $total_order ?></div>
                                    <div class="ml-3 text-sm text-green-500"><i class="fas fa-arrow-up mr-1"></i>12%</div>
                                </div>
                                <div class="mt-4">
                                    <div class="h-2 bg-gray-200 rounded-full">
                                        <div class="h-2 bg-green-500 rounded-full"
                                            style="width: <?= ($total_order / 250 * 100) . "%" ?>"></div>
                                    </div>
                                    <div class="flex justify-between mt-2 text-xs text-gray-500">
                                        <div>Tatget: 250</div>
                                        <div> <?= number_format(($total_order / 250 * 100), 2) . "%" ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="bg-white p-6 rounded-xl shadow-sm">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="font-semibold text-gray-800">Revenue by year</h3>
                                    <div class="flex space-x-2">
                                        <select
                                            class="text-sm border rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                            <option>2025</option>
                                            <option>2024</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="h-80">
                                    <canvas id="yearlyRevenueChart"></canvas>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-xl shadow-sm">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="font-semibold text-gray-800">Profit by year</h3>
                                    <div class="flex space-x-2">
                                        <select
                                            class="text-sm border rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                            <option>2025</option>
                                            <option>2024</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="h-80">
                                    <canvas id="yearlyProfitChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="font-semibold text-gray-800">Top 5 bestseller</h3>
                                <select
                                    class="text-sm border rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                    <option>This month</option>
                                    <option>This year</option>
                                </select>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
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
                                                Sold</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php foreach ($bestseller as $item): ?>
                                            <tr class="table-row">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <img src="<?= explode(";", $item['Hinh_Anh'])[0] ?>"
                                                            class="h-12 w-12 bg-gray-100 rounded-md flex items-center justify-center">

                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                <?= $item['Ten_SP'] ?>
                                                            </div>
                                                            <div class="text-xs text-gray-500">#<?= $item['ID_San_Pham'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    <?= $list_category[$item['ID_Danh_Muc']] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    <?= $item['Gia'] ?>
                                                    USD
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    <?= $item['sold'] ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </main>
            <div style="display: none;"
                class="create-product fixed flex items-center justify-center top-0 z-999 w-[84%] h-full bg-black/20">
                <div class="container relative overflow-y-scroll h-150 p-6 w-200 bg-white rounded-xl">
                    <form action="/The-Ordinary/admin/product" method="post" enctype="multipart/form-data"
                        class="w-full relative" onsubmit="return confirmCreatSubmit()">

                        <div class="">
                            <span class="text-blue-500 font-bold">STEP 1: Create Stock</span>
                            <div class="w-[50%] rounded-sm p-2 ring-1 ring-gray-200 grid grid-cols-2 gap-2">
                                <div class="mt-3">
                                    <span>Price Import</span>
                                    <input class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2" name="price_store"
                                        type="text">
                                </div>
                                <div class="mt-3">
                                    <span>Quantity</span>
                                    <input class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2" name="quantity_store"
                                        type="text">
                                </div>
                                <div class="mt-3">
                                    <span>Brand Producer</span>
                                    <input class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2" name="producer_store"
                                        type="text">
                                </div>
                                <div class="mt-3">
                                    <span>EXP</span>
                                    <input class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2" name="exp_store"
                                        type="date">
                                </div>
                                <div class="mt-3">
                                    <span>MFG</span>
                                    <input class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2" name="mfg_store"
                                        type="date">
                                </div>
                            </div>
                            <br>
                            <span class="text-blue-500 font-bold">STEP 2: Create Product</span>
                            <div class="w-[50%] rounded-sm p-2 ring-1 ring-gray-200 grid grid-cols-2 gap-2">
                                <div class="mt-3">
                                    <span>Name</span>
                                    <input class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2" name="name_product"
                                        type="text">
                                </div>
                                <div class="mt-3">
                                    <span>Price</span>
                                    <input class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2" name="price_product"
                                        type="text">
                                </div>
                                <div class="mt-3">
                                    <span>Quantity</span>
                                    <input class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2"
                                        name="quantity_product" type="text">
                                </div>
                                <div class="mt-3">
                                    <span>Size</span>
                                    <input class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2" name="size_product"
                                        type="text">
                                </div>
                                <div class="mt-3">
                                    <span>Targets</span>
                                    <input class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2"
                                        name="targets_product" type="text">
                                </div>
                                <div class="mt-3">
                                    <span>Key ingredients</span>
                                    <input class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2"
                                        name="ingredients_product" type="text">
                                </div>
                                <div class="mt-3">
                                    <span>Suited to</span>
                                    <select class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2"
                                        name="suited_product">
                                        <option disabled selected value="">Select Suited</option>
                                        <?php foreach ($list_suited_to as $suited): ?>
                                            <option><?= $suited ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <span>Category</span>
                                    <select class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2"
                                        name="format_product">
                                        <option disabled selected value="">Select Category</option>
                                        <?php foreach ($list_filter_format as $format): ?>
                                            <option value="<?= $format ?>"><?= $format ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mt-3 col-end-3 col-start-1">
                                    <span>Description</span>
                                    <textarea class="rounded-sm w-full mt-2 ring-1 ring-gray-200 p-2"
                                        name="description_product" rows="3" cols="3"></textarea>
                                </div>

                            </div>
                        </div>

                        <div class="Album ">
                            <span class="text-blue-500 font-bold">STEP 3: Add Image</span>
                            <div class="dropzone" id="dropzone">
                                <p>Drag drop image in here</p>
                            </div>
                            <input type="file" name="images[]" id="fileInput" multiple style="display:none">
                            <div class="preview rounded-sm ring-1 ring-gray-200 p-2" id="preview"></div>
                            <div>
                                <button class="mt-2 text-center w-full h-10 bg-blue-500 rounded-sm text-white text-bold"
                                    type="submit" name="create" value="create">Create</button>
                                <button onclick="displayCreate()" type="button"
                                    class="create-btn text-center bg-red-500 rounded-sm mt-2 h-10 text-white w-full text-bold"
                                    type="submit" name="create" value="create">Cancle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div style="display:none"
                class="create-category fixed flex items-center justify-center top-0 z-999 w-[84%] h-full bg-black/20">
                <div class="container relative overflow-y-scroll p-6 w-100 bg-white rounded-xl">
                    <form action="/The-Ordinary/admin/product" method="post" enctype="multipart/form-data"
                        class="w-full relative" onsubmit="return confirmCreatSubmit()">

                        <input placeholder="category name" name="Danh_Muc" class="p-2 w-full ring-1 ring-gray-200 rounded-sm">
                        <button class="bg-purple-500 w-full rounded-sm p-2 text-white font-bold mt-2">Create</button>
                        <button type="button" onclick="displayCreateCategory()" class="bg-blue-500 w-full rounded-sm p-2 text-white font-bold mt-2">Back</button>
                    </form>
                </div>
            </div>
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

        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('fileInput');
        const preview = document.getElementById('preview');

        dropzone.addEventListener('click', () => fileInput.click());

        dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzone.classList.add('dragover');
        });

        dropzone.addEventListener('dragleave', () => {
            dropzone.classList.remove('dragover');
        });

        dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.classList.remove('dragover');
            fileInput.files = e.dataTransfer.files;
            showPreview(fileInput.files);
        });

        fileInput.addEventListener('change', () => {
            showPreview(fileInput.files);
        });

        function showPreview(files) {
            preview.innerHTML = "";
            for (let i = 0; i < files.length; i++) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    preview.appendChild(img);
                };
                reader.readAsDataURL(files[i]);
            }
        }

        function displayCreate() {
            var element = document.querySelector('.create-product')
            element.style.display = element.style.display === 'none' ? 'flex' : 'none'
        }

        function displayUpdate() {
            var element = document.querySelector('.update-product').remove()

        }

        function displayDetailOrder() {
            var element = document.querySelector('.detail-order').remove()
        }

        function displayCustomer() {
            var element = document.querySelector('.customer-detail').remove()
        }

        function displayContact() {
            var element = document.querySelector('.contact')
            element.style.display = element.style.display === 'none' ? 'block' : 'none'
        }

        function displayEditHome(){
            var element = document.querySelector('.edit-home').remove()
           
        }

        function displayCreateCategory(){
            var element = document.querySelector('.create-category')
            element.style.display = element.style.display === 'none' ? 'flex' : 'none'
        }

        function loading() {
            document.querySelector('.send').innerHTML = `<span class="loader"></span>`
        }

        

        function exportDataCustomer() {

            const table = document.querySelector(".table-customers");
            const ws = XLSX.utils.table_to_sheet(table);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
            XLSX.writeFile(wb, "BangDuLieu.xlsx");
        }

        function exportDataOrder() {
            const table = document.querySelector(".table-orders");
            const ws = XLSX.utils.table_to_sheet(table);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
            XLSX.writeFile(wb, "DataOrders.xlsx");
        }

        const ctx = document.getElementById('yearlyRevenueChart').getContext('2d');
        const ctx2 = document.getElementById('yearlyProfitChart').getContext('2d');
        const gradient1 = ctx.createLinearGradient(0, 0, 0, 400);
        gradient1.addColorStop(0, 'rgb(144, 224, 239)');
        gradient1.addColorStop(1, 'rgba(202, 240, 248, 0)');
        const gradient2 = ctx2.createLinearGradient(0, 0, 0, 400);
        gradient2.addColorStop(0, 'rgb(199, 125, 255)');
        gradient2.addColorStop(1, 'rgba(224, 170, 255, 0)');
        const chartRevenue = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode(array_column($monthlyData, 'month')) ?>,
                datasets: [
                    {
                        label: 'Revenue (USD)',
                        fill: true,
                        backgroundColor: gradient1,
                        tension: 0.4, // đường cong mượt
                        pointRadius: 0, // ẩn chấm tròn
                        borderWidth: 2,
                        borderColor: 'rgb(0, 180, 216)',
                        data: <?= json_encode(array_map(fn($r) => round($r['revenue'], 0), $monthlyData)) ?>
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            padding: 20,
                            generateLabels(chart) {
                                return chart.data.datasets.map((dataset, i) => ({
                                    text: dataset.label,
                                    fillStyle: dataset.backgroundColor,
                                    hidden: !chart.isDatasetVisible(i),
                                    strokeStyle: 'transparent',
                                    index: i,
                                    pointStyle: 'circle'
                                }));
                            }

                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                        },

                    }
                }
            }
        });

        const chartProfit = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: <?= json_encode(array_column($monthlyData, 'month')) ?>,
                datasets: [
                    {
                        label: 'Profit (USD)',
                        fill: true,
                        backgroundColor: gradient2,
                        tension: 0.4, // đường cong mượt
                        pointRadius: 0, // ẩn chấm tròn
                        borderWidth: 2,
                        borderColor: 'rgb(199, 125, 255)',
                        data: <?= json_encode(array_map(fn($r) => round($r['profit'], 0), $monthlyData)) ?>
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            padding: 20,
                            generateLabels(chart) {
                                return chart.data.datasets.map((dataset, i) => ({
                                    text: dataset.label,
                                    fillStyle: dataset.backgroundColor,
                                    hidden: !chart.isDatasetVisible(i),
                                    strokeStyle: 'transparent',
                                    index: i,
                                    pointStyle: 'circle'
                                }));
                            }

                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                        },

                    }
                }
            }
        });

    </script>

</body>

</html>