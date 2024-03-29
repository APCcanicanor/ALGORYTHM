<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Syllabus</title>
    <link rel="stylesheet" href="{{ asset('assets/css/create.css') }}">
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Add jQuery for JavaScript functionality -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Add custom CSS for pop-up message -->
    <style>
        .popup-container {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 20px;
            border-radius: 5px;
            z-index: 1000;
        }
    </style>
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

<!-- Course Syllabus -->
<div class="course-syllabus">
    <h1 class="course-interactive-title">Interactive Course Syllabus</h1>
    <form id="syllabusForm" action="{{ route('store-syllabus.create') }}" method="POST">
        @csrf
        <label for="courseTitle">Course Title:</label>
        <input type="text" id="courseTitle" name="courseTitle" required>

        <label for="instructor">Instructor:</label>
        <input type="text" id="instructor" name="instructor" value="{{ auth()->user()->name }}" required readonly>

        <label for="courseDescription">Course Description:</label>
        <textarea id="courseDescription" name="courseDescription" required></textarea>

        <label for="courseOutline">Course Outline:</label>
        <textarea id="courseOutline" name="courseOutline" required></textarea>

        <div class="button-container">
            <!-- Modify the button to trigger the redirect -->
            <button id="askAIButton" type="button">Ask AI</button>
            <div id="aiResponse"></div>
            <button id="saveButton" type="button">Save</button>
        </div>
    </form>

</div>

<!-- Pop-up Message Container -->
<div id="popupContainer" class="popup-container"></div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <p>&copy; 2024 ALGORYTHM2.0. All rights reserved.</p>
    </div>
</footer>

<script>
 $(document).ready(function() {
    $('#saveButton').click(function() {
        // Perform AJAX request to save form data
        var formData = $('#syllabusForm').serialize();
        $.ajax({
            type: 'POST',
            url: '{{ route("store-syllabus.create") }}',
            data: formData,
            success: function(response) {
                if (response.success) {
                    // Show success message
                    $('#popupContainer').html('<p>Syllabus saved successfully!</p>').fadeIn().delay(2000).fadeOut();
                    // Reset the form inputs
                    $('#syllabusForm')[0].reset();
                } else {
                    // Show error message
                    $('#popupContainer').html('<p>Failed to save syllabus. Please try again.</p>').fadeIn().delay(2000).fadeOut();
                }
            },
            error: function() {
                // Show error message
                $('#popupContainer').html('<p>An error occurred. Please try again.</p>').fadeIn().delay(2000).fadeOut();
            }
        });
    });

    $('#syllabusForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        // Perform AJAX request to submit form data
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function(response) {
                // Display success message if data was successfully stored
                if (response.success) {
                    $('#popupContainer').html('<p>Syllabus sent successfully!</p>').fadeIn().delay(2000).fadeOut();
                    $('#syllabusForm')[0].reset(); // Reset the form inputs
                } else {
                    $('#popupContainer').html('<p>Failed to create syllabus. Please try again.</p>').fadeIn().delay(2000).fadeOut();
                }
            },
            error: function() {
                $('#popupContainer').html('<p>An error occurred. Please try again.</p>').fadeIn().delay(2000).fadeOut();
            }
        });
    });

    // Add event listener for the ask AI button to redirect to askAI.blade.php
    $('#askAIButton').click(function() {
        window.location.href = "{{ route('askAI') }}";
    });
});

</script>

</body>
</html>
