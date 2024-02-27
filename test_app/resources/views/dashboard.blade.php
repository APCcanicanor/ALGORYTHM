<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Syllabus</title>
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>

<!-- Navbar -->
<nav>
    <div class="logo-container">
        <a href="/dashboard">
            <img class="logo" src="https://www.apc.edu.ph/wp-content/uploads/2019/05/apc-icon.png" alt="icon">
        </a>
    </div>

    <ul class="menu">
        <li><a class="active" href="/dashboard">Home</a></li>
        <li><a href="/courses">Courses</a></li>

        <!-- Dropdown Menu -->
        <li class="dropdown">
            <a href="#">More <i class="fas fa-caret-down"></i></a>
            <ul class="dropdown-menu">
                @auth
                    @if(Auth::user()->role === 'teacher' || Auth::user()->role === 'executive')
                        <li><a href="/create">Create</a></li>
                    @endif

                    @if(Auth::user()->role === 'teacher' || Auth::user()->role === 'executive')
                        <li><a href="/YourWorks">Your Works</a></li>
                    @endif

                    @if(Auth::user()->role === 'executive')
                        <li><a href="/forApproval">Pending Approval</a></li>
                    @endif
                    <li><a href="{{ route('profile.show') }}">Profile</a></li>
                @endauth
            </ul>
        </li>
    </ul>
</nav>

<!-- Section 1 -->
<section class="sec-num1">
    <div class="container">
        <h1>Check out our stored syllabus!</h1>
        <a href="/courses" class="btn">See syllabus</a>
    </div>
</section>

<!-- About Us Section -->
<section class="about-section">
    <div class="container">
        <h2>About Us</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam augue ante, aliquam at tincidunt sed, molestie ac mauris. Duis lobortis.</p>
        <div class="members">
            <div class="card">
                <img src="https://scontent.fmnl13-2.fna.fbcdn.net/v/t1.15752-9/426235430_265513763265977_3208154578375981903_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeEgsRm--nWiQiU7Ri-W1gK4ACglnMBQQ9gAKCWcwFBD2OTiJIYqwifWT3fp0avZHUvB1u90mSrV3jUg6dfgc7Vk&_nc_ohc=X-QQbfgBYIMAX-7Oioh&_nc_ht=scontent.fmnl13-2.fna&oh=03_AdRdUBOClm9sFUCC2tYEjnr6XU_Z2VRHV7Si_fGXU1exfQ&oe=65FAC52E" alt="Member 1">
                <div class="info">
                    <h3>Carl Von Nicanor</h3>
                    <p>Project Manager</p>
                </div>
            </div>
            <div class="card">
                <img src="https://scontent.fmnl25-2.fna.fbcdn.net/v/t1.15752-9/426407824_1074928430220300_3342406724942136003_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeEdHl-nY8G9CNYKU7l9SbTzDTbjMN8mp7kNNuMw3yanuY_kJzaRsZjDj1cTtMfAiB_KmGEJajy80tOzAW9x_15j&_nc_ohc=Gd11gAqcOPIAX9uOJiT&_nc_ht=scontent.fmnl25-2.fna&oh=03_AdSaiDPuHWjysdp1WgmhbhLQJA50zeTYjF7YeKRfU2ddKg&oe=65FABAAF" alt="Member 2">
                <div class="info">
                    <h3>Johanne Marlowee Sanchez</h3>
                    <p>Member</p>
                </div>
            </div>
            <!-- Add more cards for other members -->
            <div class="card">
                <img src="https://scontent.fmnl25-2.fna.fbcdn.net/v/t1.15752-9/344298055_3226216867670501_6255321439231081273_n.png?_nc_cat=102&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeF2Ue7a3jWkjFYSlvohC_rVdtkGXjTsF7J22QZeNOwXssOJJjgh3vTOqTS9dHef0LjTboCjXtNi7gDWlvnfBiI6&_nc_ohc=QZbygL_V1mAAX8Pk3hG&_nc_ht=scontent.fmnl25-2.fna&oh=03_AdQdl59BvpgCiroKDkJbRoP7HxBvhHtCLQO52_BvoRo42w&oe=65FC0C99" alt="Member 2">
                <div class="info">
                    <h3>Henzon Ivan Valguna</h3>
                    <p>Member</p>
                </div>
            </div>

            <div class="card">
                <img src="https://scontent.fmnl25-2.fna.fbcdn.net/v/t1.15752-9/423105651_1323096652044615_3355850101978696698_n.png?_nc_cat=111&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeHLEuP1eEZhkmnR7m2-bgmqnei-qHKhwhad6L6ocqHCFhp7y36WFCbqHlHv5nWV0OVszqt_RyUkEFYyHwbZE--r&_nc_ohc=UZlPqzr4pHQAX9E9eNO&_nc_ht=scontent.fmnl25-2.fna&oh=03_AdQoJ94czKc4TnOLXPXA-9tEVsFYQ8g6mC6S7Zrce2j0uQ&oe=65FBEA87" alt="Member 2">
                <div class="info">
                    <h3>Gabrielle Ann Yogawin</h3>
                    <p>Member</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <p>&copy; 2024 ALGORYTHM2.0. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
