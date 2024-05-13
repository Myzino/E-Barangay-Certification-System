<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <ul class="navbar-nav">

            {{-- <li class="nav-item">
                <div id="toggle-btn" class="fas fa-sun"></div>
            </li> --}}

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: var(--bs-body-color);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p class="mb-0 fw-bold">Theme Customization</p>
                    </div>
                    <div class="row g-0 p-1">
                        <div class="col-3 text-center cursor-pointer" id="light-btn">
                            <div class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70">
                                <div id="light-btn" class="fas fa-sun p-1"></div>
                                <p class="tx-12">Light</p>
                            </div>
                        </div>
                        <div class="col-3 text-center cursor-pointer" id="dark-btn">
                            <div class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70">
                                <div id="dark-btn" class="fas fa-moon p-1"></div>
                                <p class="tx-12">Dark</p>
                            </div>                        
                        </div>
                        <div class="col-3 text-center cursor-pointer" id="green-btn">
                            <div class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70">
                                <div id="blue-btn" class="fas fa-tree p-1"></div>
                                <p class="tx-12">Nature</p>
                            </div>        
                        </div>
                        <div class="col-3 text-center cursor-pointer" id="red-btn">
                            <div class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70">
                                <div id="red-btn" class="fas fa-fire p-1"></div>
                                <p class="tx-12">Fire</p>
                            </div>        
                        </div>
                    </div>
                </div>
            </li>

            @php

                $id = Auth::user()->id;         //access user table authenticated field
                $profileData = App\Models\User::find($id);

            @endphp

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('../upload/admin_images/'.$profileData->photo) : url('../../assets/upload/no_image.png')}}" alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('../upload/admin_images/'.$profileData->photo) : url('../../assets/upload/no_image.png')}}" alt="">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder custom-dd-color">{{ $profileData->name }}</p>
                            <p class="tx-12 text-muted custom-dd-color">{{ $profileData->email}}</p>
                        </div>
                    </div>
                <ul class="list-unstyled p-1">
                    <a href="{{ route ('app.profile') }}" class="text-body ms-0">
                        <li class="dropdown-item py-2">
                            <i class="me-2 icon-md" data-feather="user"></i>
                            <span class="custom-dd-color">Profile</span>
                        </li>
                    </a>
                    {{-- <a href="#" class="text-body ms-0">
                        <li class="dropdown-item py-2">
                            <i class="me-2 icon-md" data-feather="edit"></i>
                            <span class="custom-dd-color">Change Password</span>
                        </li>
                    </a> --}}
                    <a href="{{ route ('app.logout')}}" class="text-body ms-0">
                        <li class="dropdown-item py-2">
                            <i class="me-2 icon-md" data-feather="log-out"></i>
                            <span class="custom-dd-color">Log Out</span>
                        </li>
                    </a>
                </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>

<script>
    let body = document.body;           //html's body element
    //darkmode part start=====>
    let toggleBtn = document.querySelector('#toggle-btn');  //selecting the sun icon
    let darkMode = localStorage.getItem('dark-mode');

    // Select the moon button
    let moonBtn = document.querySelector('#dark-btn');
    // Select the light button
    let lightBtn = document.querySelector('#light-btn');
    // Select the green button
    let greenBtn = document.querySelector('#green-btn');
    // Select the green button
    let redBtn = document.querySelector('#red-btn');

    // Function to enable light mode
    const enableLightMode = () => {
        document.body.classList.add('light');
        localStorage.setItem('theme', 'light'); // Store the theme preference in localStorage
    }

    // Function to enable dark mode
    const enableDarkMode = () => {
        document.body.classList.add('dark');
        localStorage.setItem('theme', 'dark'); // Store the theme preference in localStorage
    }

    // Function to enable green mode
    const enableGreenMode = () => {
        document.body.classList.add('green');
        localStorage.setItem('theme', 'green'); 
    }

    // Function to enable green mode
    const enableRedMode = () => {
        document.body.classList.add('red');
        localStorage.setItem('theme', 'red'); 
    }

    // Function to remove all classes from the body (light mode)
    const removeAllClassesFromBody = () => {
        document.body.className = ''; // Set the class attribute to an empty string
    }

    // Function to apply the saved theme preference
    const applySavedTheme = () => {
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'light') {
            enableLightMode();
        } else if (savedTheme === 'dark') {
            enableDarkMode();
        }else if (savedTheme === 'green') {
            enableGreenMode();
        } else if (savedTheme === 'red') {
            enableRedMode();
        } 
    }





    // Function to toggle dark mode when moon icon is clicked
    moonBtn.onclick = (e) => {
        let darkMode = localStorage.getItem('dark-mode');
        removeAllClassesFromBody(); // Remove all classes from the body
        enableDarkMode();
    }

    greenBtn.onclick = (e) => {
        let greenMode = localStorage.getItem('green-mode');
        removeAllClassesFromBody(); // Remove all classes from the body
        enableGreenMode();
    }

    redBtn.onclick = (e) => {
        let redMode = localStorage.getItem('red-mode');
        removeAllClassesFromBody(); // Remove all classes from the body
        enableRedMode();
    }

    // Add click event listener to the light button
    lightBtn.onclick = () => {
        let lightMode = localStorage.getItem('light-mode');
        removeAllClassesFromBody(); // Remove all classes from the body
        enableLightMode();
    }



    // Apply the saved theme preference when the page loads
    applySavedTheme();






    // const enableDarkMode = () => {
    //     toggleBtn.classList.replace('fa-sun', 'fa-moon');
    //     body.classList.add('dark');
    //     localStorage.setItem('dark-mode', 'enabled');
    // }

    // const disableDarkMode = () => {
    //     toggleBtn.classList.replace('fa-moon', 'fa-sun');
    //     body.classList.remove('dark');
    //     localStorage.setItem('dark-mode', 'disabled');
    // }

    // if(darkMode === 'enabled') {
    //     enableDarkMode();
    // }

    // toggleBtn.onclick = (e) => {
    //     let darkMode = localStorage.getItem('dark-mode');
    //     if(darkMode === 'disabled') {
    //         enableDarkMode();
    //     } else {
    //         disableDarkMode();
    //     }
    // }
    //end of darkmode part=====>




</script>