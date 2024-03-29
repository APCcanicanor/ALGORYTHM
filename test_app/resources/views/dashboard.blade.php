<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Syllabus</title>
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cutive&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Oswald:wght@600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav>
    <div class="logo-container">
        <a href="/dashboard">
            <img class="logo" src="https://www.apc.edu.ph/wp-content/uploads/2019/05/apc-icon.png" alt="icon">
        </a>
    </div>

    <div class="apc-name">
    <p> 
        <a class="yellow-name"> Asia </a>
        <a class="blue-name"> Pacific </a> 
        <a class="yellow-name"> College </a> 
        <a class="blue-name"> Syllabus </a> 
    </p>
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
                        <li><a href="/forApproval">Approval</a></li>
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
        <div class="overlay"></div>
        <h4 class ="syllabus-view-section"> view your syllabus here... </h1>
        <h1 class ="rprl-section">
            <a class="rprl-blue">Real Projects.</a> 
            <a class="rprl-yellow">Real Learning.</a> 
        </h1>
        <a href="/courses" class="btn-see-syllabus">View Syllabus</a>
    </div>
</section>

<!-- About Us Section -->
<section class="about-section">
    <div class="container">
        <h2 class = "about-us">ABOUT US</h2>
        <p class="about-us-info">The following are the students responsible for the making of this Syllabus System.</p>
        <div class="members">
            <div class="card">
                <img src="https://scontent.fmnl13-2.fna.fbcdn.net/v/t1.15752-9/426235430_265513763265977_3208154578375981903_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeEgsRm--nWiQiU7Ri-W1gK4ACglnMBQQ9gAKCWcwFBD2OTiJIYqwifWT3fp0avZHUvB1u90mSrV3jUg6dfgc7Vk&_nc_ohc=X-QQbfgBYIMAX-7Oioh&_nc_ht=scontent.fmnl13-2.fna&oh=03_AdRdUBOClm9sFUCC2tYEjnr6XU_Z2VRHV7Si_fGXU1exfQ&oe=65FAC52E" alt="Member 1">
                <div class="info">
                    <h3 class="student-name">Carl Von Nicanor</h3>
                    <p class="student-job">Project Manager</p>
                </div>
            </div>
            <div class="card">
                <img src="https://scontent.fmnl25-2.fna.fbcdn.net/v/t1.15752-9/426407824_1074928430220300_3342406724942136003_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeEdHl-nY8G9CNYKU7l9SbTzDTbjMN8mp7kNNuMw3yanuY_kJzaRsZjDj1cTtMfAiB_KmGEJajy80tOzAW9x_15j&_nc_ohc=Gd11gAqcOPIAX9uOJiT&_nc_ht=scontent.fmnl25-2.fna&oh=03_AdSaiDPuHWjysdp1WgmhbhLQJA50zeTYjF7YeKRfU2ddKg&oe=65FABAAF" alt="Member 2">
                <div class="info">
                    <h3 class="student-name">Johanne Marlowe Sanchez</h3>
                    <p class="student-job">Member</p>
                </div>
            </div>
            <!-- Add more cards for other members -->
            <div class="card">
                <img src="https://scontent.fmnl25-2.fna.fbcdn.net/v/t1.15752-9/344298055_3226216867670501_6255321439231081273_n.png?_nc_cat=102&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeF2Ue7a3jWkjFYSlvohC_rVdtkGXjTsF7J22QZeNOwXssOJJjgh3vTOqTS9dHef0LjTboCjXtNi7gDWlvnfBiI6&_nc_ohc=QZbygL_V1mAAX8Pk3hG&_nc_ht=scontent.fmnl25-2.fna&oh=03_AdQdl59BvpgCiroKDkJbRoP7HxBvhHtCLQO52_BvoRo42w&oe=65FC0C99" alt="Member 2">
                <div class="info">
                    <h3 class="student-name">Henzon Ivan Valguna</h3>
                    <p class="student-job">Member</p>
                </div>
            </div>

            <div class="card">
                <img src="https://scontent.fmnl25-2.fna.fbcdn.net/v/t1.15752-9/423105651_1323096652044615_3355850101978696698_n.png?_nc_cat=111&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeHLEuP1eEZhkmnR7m2-bgmqnei-qHKhwhad6L6ocqHCFhp7y36WFCbqHlHv5nWV0OVszqt_RyUkEFYyHwbZE--r&_nc_ohc=UZlPqzr4pHQAX9E9eNO&_nc_ht=scontent.fmnl25-2.fna&oh=03_AdQoJ94czKc4TnOLXPXA-9tEVsFYQ8g6mC6S7Zrce2j0uQ&oe=65FBEA87" alt="Member 2">
                <div class="info">
                    <h3 class="student-name">Gabrielle Ann Yogawin</h3>
                    <p class="student-job">Member</p>
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
