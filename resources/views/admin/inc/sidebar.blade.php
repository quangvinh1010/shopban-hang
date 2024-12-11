        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav flex-column">
                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('admin.home') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span class="ml-2">Home</span>
                    </a>
                </li>

                <!-- Orders -->
                <li class="nav-item">
                    <a class="nav-link" href="" data-toggle="collapse" data-target="#ordersMenu"
                        aria-expanded="false" aria-controls="ordersMenu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-file">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg>
                        <span class="ml-2">Orders</span>
                    </a>
                    <div class="collapse" id="ordersMenu">
                        <ul class="nav flex-column ml-3">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.orders.index')}}">List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.orders.create')}}">Add New</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <!-- Voucher -->
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#orderItemsMenu"
                        aria-expanded="false" aria-controls="orderItemsMenu">
                        <i class="fas fa-gift"></i>
                        <span class="ml-2">Voucher</span>
                    </a>
                    <div class="collapse" id="orderItemsMenu">
                        <ul class="nav flex-column ml-3">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.vouchers.index')}}">List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.vouchers.create')}}">Add New</a>
                            </li>
                        </ul>
                    </div>
                </li>
                

                <!-- Products -->
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#productsMenu"
                        aria-expanded="false" aria-controls="productsMenu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-shopping-cart">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span class="ml-2">Products</span>
                    </a>
                    <div class="collapse" id="productsMenu">
                        <ul class="nav flex-column ml-3">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.products.index')}}">List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.products.create')}}">Add New</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Category -->
                <li class="nav-item">
                    <a class="nav-link" href="" data-toggle="collapse" data-target="#categoryMenu"
                        aria-expanded="false" aria-controls="categoryMenu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-layers">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                        <span class="ml-2">Category</span>
                    </a>
                    <div class="collapse" id="categoryMenu">
                        <ul class="nav flex-column ml-3">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.category.index') }}">List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.category.create') }}">Add New</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Users -->
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#usersMenu"
                        aria-expanded="false" aria-controls="usersMenu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span class="ml-2">Users</span>
                    </a>
                    <div class="collapse" id="usersMenu">
                        <ul class="nav flex-column ml-3">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.users.index')}}">List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.users.create')}}">Add New</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </nav>
