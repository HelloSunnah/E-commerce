<!-- Main Sidebar Start -->
<aside class="main-sidebar text-white sidebar-light-dark elevation-1">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        {{-- <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">--}}
        <span class="fw-bold px-3 py-2 border rounded">
            <i class="fa-brands fa-algolia"></i>
        </span>
        <span class="pl-2 brand-text font-weight-bold">Business Name</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                
                <li class="nav-item">
                    <a href="{{route("home")}}" class="nav-link mb-2">
                        <i class="fa fa-gauge nav-icon"></i>
                        <p>
                            Dashboard
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">

                    <a href="#" class="nav-link mb-2">
                        <i class="fab fa-product-hunt nav-icon"></i>
                        <p>
                            Product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('product.list')}}" class="nav-link mb-2">
                                <i class="fa-solid fa-dot-circle nav-icon"></i>
                                <p>Product List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('product.create')}}" class="nav-link mb-2">
                                <i class="fa-solid fa-dot-circle nav-icon"></i>
                                <p>Product Create</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- nav-item-4 end -->




                <!-- nav-item-7 start -->
                <li class="nav-item">
                    <a href="#" class="nav-link mb-2">
                    <i class="fa fa-bag-shopping nav-icon"></i>

                        <p>
                            Order
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('onhold.list')}}" class="nav-link mb-2">
                                <i class="fa-solid fa-dot-circle nav-icon"></i>
                                <p>OnHold</p>
                            </a>
                        </li>
                    </ul><ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{route('processing.list')}}" class="nav-link mb-2">
                                <i class="fa-solid fa-dot-circle nav-icon"></i>
                                <p>Processing</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a href="{{route('complete.list')}}" class="nav-link mb-2">
                                <i class="fa-solid fa-dot-circle nav-icon"></i>
                                <p>Complete</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- nav-item-7 end -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- Main Sidebar End -->


<script>
    // Function to handle navigation link click
    function handleNavLinkClick(event) {
        // Prevent the default link behavior (preventing navigation)
        // event.preventDefault();

        // Remove the 'active' class from all nav-links
        const navLinks = document.querySelectorAll('.sidebar .nav-link');
        navLinks.forEach((navLink) => {
            navLink.classList.remove('active');
        });

        // Add the 'active' class to the clicked nav-link
        const clickedNavLink = event.currentTarget;
        clickedNavLink.classList.add('active');

        // Call the function to set the background and text color
        setActiveNavLinksBackground();
    }

    // Function to set background and text color for active nav-links
    function setActiveNavLinksBackground() {
        // Select all nav-links
        const navLinks = document.querySelectorAll('.sidebar .nav-link');

        // Define the linear gradient background style for the active nav-link
        const activeLinearGradient = 'linear-gradient(to right, #0c0958, #00228d, #255d9d)';
        // Define the background style for inactive nav-links
        const inactiveBackground = 'none';

        // Iterate through all nav-links
        navLinks.forEach((navLink) => {
            // Check if the nav-link is active
            const isActive = navLink.classList.contains('active');

            // Set background and text color based on whether the nav-link is active or not
            if (isActive) {
                navLink.style.backgroundImage = activeLinearGradient;
                navLink.style.color = 'white'; // Set the text color for active links
            } else {
                navLink.style.backgroundImage = inactiveBackground;
                navLink.style.color = ''; // Reset the text color for inactive links
            }
        });
    }

    // Attach click event listeners to all nav-links
    const navLinks = document.querySelectorAll('.sidebar .nav-link');
    navLinks.forEach((navLink) => {
        navLink.addEventListener('click', handleNavLinkClick);
    });

    // Call the function to set the initial background and text color
    setActiveNavLinksBackground();
</script>