<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course List</title>
    <link rel="stylesheet" href="{{ asset('assets/css/courses.css') }}">
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

<!-- Introduction -->
<section class="intro">
    <div class="container">
        <h1 class = "intro-course-list">Welcome to Our Course List</h1>
        <p class = "course-list-description">This page provides a list of available courses offered by our institution. Students, as well as school staff, can browse through the available courses to learn more about their content and requirements.</p>
    </div>
</section>

<!-- Container for the list of courses -->
<div class="course-container">
    <!-- Course Card 1 -->
    <a href="{{ route('view_syllabus.IT') }}" class="course-link">
        <div class="course-card">
            <img src="https://media.istockphoto.com/id/1352367851/vector/dx-vector-icon-illustration.jpg?s=612x612&w=0&k=20&c=_m2prNR3aJFKZ-AH5kVKMr9RGmBnKoWU6J-ExRMBaC0=" alt="Course 1 Image">
            <h3>IT Department</h3>
            <p>Description of Course 1 goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </a>

    <!-- Course Card 2 -->
    <a href="{{ route('view_syllabus.biology') }}" class="course-link">
        <div class="course-card">
            <img src="https://icons.veryicon.com/png/o/education-technology/icon-summary-of-educational-activities/biology-1.png" alt="Course 2 Image">
            <h3>Biology Department</h3>
            <p>Description of Course 2 goes here. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
    </a>

    <!-- Add more course cards as needed -->
</div>

<footer class="footer">
    <div class="container">
        <p>&copy; 2024 ALGORYTHM2.0. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
