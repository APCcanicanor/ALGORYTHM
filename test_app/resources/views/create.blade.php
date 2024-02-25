<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/create.css') }}">
</head>
<body>

<!-- Navbar -->
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <a href="/"><img class="logo" src="https://www.apc.edu.ph/wp-content/uploads/2019/05/apc-icon.png" alt="icon"></a>
    <ul>
        <li><a class="active" href="/dashboard">Home</a></li>
        <li><a href="courses">Courses</a></li>
        <li><x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
            {{ __('Profile') }}
        </x-responsive-nav-link></li>
    </ul>
</nav>

<!-- Course Syllabus -->
<div class="course-syllabus">
    <h1>Interactive Course Syllabus</h1>
    <form>
        <label for="courseTitle">Course Title:</label>
        <input type="text" id="courseTitle" name="courseTitle" required>

        <label for="instructor">Instructor:</label>
        <input type="text" id="instructor" name="instructor" required>

        <label for="courseDescription">Course Description:</label>
        <textarea id="courseDescription" name="courseDescription" required></textarea>

        <label for="courseOutline">Course Outline:</label>
        <textarea id="courseOutline" name="courseOutline" required></textarea>

        <button type="button" onclick="generateAIResponse()">Generate AI Text</button>
        <div id="aiResponse"></div>
        <button id="submitButton" type="button" onclick="submitForApproval()">Submit for Approval</button>
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
