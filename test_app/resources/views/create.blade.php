<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Syllabus</title>
    <link rel="stylesheet" href="{{ asset('assets/css/create.css') }}">
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
        <li><a href="courses">Courses</a></li>

        <!-- Dropdown Menu -->
        <li class="dropdown">
            <a href="#">More <i class="fas fa-caret-down"></i></a>
            <ul class="dropdown-menu">
                @auth
                    @if(Auth::user()->role === 'teacher' || Auth::user()->role === 'executive')
                        <li><a href="create">Create</a></li>
                    @endif
                    @if(Auth::user()->role === 'executive')
                        <li><a href="forApproval">Pending Approval</a></li>
                    @endif
                    <li><a href="{{ route('profile.show') }}">Profile</a></li>
                @endauth
            </ul>
        </li>
    </ul>
</nav>

<!-- Course Syllabus -->
<div class="course-syllabus">
    <h1>Interactive Course Syllabus</h1>
    <form>
        <label for="courseTitle">Course Title:</label>
        <input type="text" id="courseTitle" name="courseTitle" required>

        <label for="instructor">Instructor:</label>
        <input type="text" id="instructor" name="instructor" value="{{ auth()->user()->name }}" required readonly>

        <label for="courseDescription">Course Description:</label>
        <textarea id="courseDescription" name="courseDescription" required></textarea>

        <label for="courseOutline">Course Outline:</label>
        <textarea id="courseOutline" name="courseOutline" required></textarea>

        <div class="button-container">
            <button type="button">Generate AI Text</button>
            <div id="aiResponse"></div>
            <button id="submitButton" type="button">Save and Submit for Approval</button>
        </div>
    </form>
</div>




<!-- Footer -->
<footer class="footer">
    <div class="container">
        <p>&copy; 2024 ALGORYTHM2.0. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
