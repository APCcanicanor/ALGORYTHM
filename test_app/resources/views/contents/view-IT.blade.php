<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For Approvals</title>
    <link rel="stylesheet" href="{{ asset('assets/css/sfa.css') }}">
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

<section class="content">
    <div class="view-mode">
        <label for="courseTitle">Course Title:</label>
        <p id="courseTitle">{{ $IT->courseTitle }}</p>

        <label for="instructor">Instructor:</label>
        <p id="instructor">{{ $IT->instructor }}</p>

        <label for="courseDescription">Description:</label>
        <p id="courseDescription">{{ $IT->courseDescription }}</p>

        <label for="courseOutline">Outline:</label>
        <p id="courseOutline">{{ $IT->courseOutline }}</p>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <p>&copy; 2024 ALGORYTHM2.0. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
