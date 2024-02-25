<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course List</title>
    <link rel="stylesheet" href="{{ asset('assets/css/courses.css') }}">
</head>
<body>

<!-- navbar -->
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
        <li><a href = "create">Create</a></li>
	</ul>
</nav>

<!-- Introduction -->
<section class="intro">
    <div class="container">
        <h1>Welcome to Our Course List</h1>
        <p>This page provides a list of available courses offered by our institution. Students, as well as school staff, can browse through the available courses to learn more about their content and requirements.</p>
    </div>
</section>

<!-- Container for the list of courses -->
<div class="course-container">
    <!-- Course Card 1 -->
    <a href="/IT" class="course-link">
        <div class="course-card">
            <img src="https://media.istockphoto.com/id/1352367851/vector/dx-vector-icon-illustration.jpg?s=612x612&w=0&k=20&c=_m2prNR3aJFKZ-AH5kVKMr9RGmBnKoWU6J-ExRMBaC0=" alt="Course 1 Image">
            <h3>Course Title 1</h3>
            <p>Description of Course 1 goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </a>

    <!-- Course Card 2 -->
    <a href="/Biology" class="course-link">
        <div class="course-card">
            <img src="https://icons.veryicon.com/png/o/education-technology/icon-summary-of-educational-activities/biology-1.png" alt="Course 2 Image">
            <h3>Course Title 2</h3>
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
