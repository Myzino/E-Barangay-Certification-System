<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <ul class="navbar-nav">

            <li class="nav-item">
                <div id="toggle-btn" class="fas fa-sun"></div>
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
                    <a href="#" class="text-body ms-0">
                        <li class="dropdown-item py-2">
                            <i class="me-2 icon-md" data-feather="edit"></i>
                            <span class="custom-dd-color">Change Password</span>
                        </li>
                    </a>
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

    const enableDarkMode = () => {
        toggleBtn.classList.replace('fa-sun', 'fa-moon');
        body.classList.add('dark');
        localStorage.setItem('dark-mode', 'enabled');
    }

    const disableDarkMode = () => {
        toggleBtn.classList.replace('fa-moon', 'fa-sun');
        body.classList.remove('dark');
        localStorage.setItem('dark-mode', 'disabled');
    }

    if(darkMode === 'enabled') {
        enableDarkMode();
    }

    toggleBtn.onclick = (e) => {
        let darkMode = localStorage.getItem('dark-mode');
        if(darkMode === 'disabled') {
            enableDarkMode();
        } else {
            disableDarkMode();
        }
    }
    //end of darkmode part=====>




</script>