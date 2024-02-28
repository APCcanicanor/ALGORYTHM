<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syllabus Details</title>
    <link rel="stylesheet" href="{{ asset('assets/css/details.css') }}">
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

<!-- Content section -->
<section class="content">
    <!-- Display syllabus details and buttons -->
    <div class="view-mode">
        <label for="courseTitle">Course Title:</label>
        <p id="courseTitle">{{ $data->courseTitle }}</p>

        <label for="instructor">Instructor:</label>
        <p id="instructor">{{ $data->instructor }}</p>

        <label for="courseDescription">Description:</label>
        <p id="courseDescription">{{ $data->courseDescription }}</p>

        <label for="courseOutline">Outline:</label>
        <p id="courseOutline">{{ $data->courseOutline }}</p>

        <button id="startEditingBtn">Edit</button>
        <form id="deleteForm" action="{{ route('syllabus.destroy', $data->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="button" id="deleteBtn">Delete</button>
        </form>
        <!-- Button to send syllabus for approval -->
        <form action="{{ route('syllabus.sendForApproval', $data->id) }}" method="POST" id="sendForApprovalForm">
            @csrf
            <button type="submit" class="approval-btn" onclick="return confirmAndSend()">Send for Approval</button>
        </form>
    </div>
    <!-- Form for editing -->
    <div class="edit-mode" style="display: none;">
        <button id="backBtn">Back</button>
        <form id="editForm" action="{{ route('syllabus.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="editCourseTitle">Edit Course Title:</label>
            <input type="text" id="editCourseTitle" name="courseTitle" value="{{ $data->courseTitle }}" required>

            <label for="editInstructor">Edit Instructor:</label>
            <input type="text" id="editInstructor" name="instructor" value="{{ $data->instructor }}" required>

            <label for="editCourseDescription">Edit Description:</label>
            <textarea id="editCourseDescription" name="courseDescription" required>{{ $data->courseDescription }}</textarea>

            <label for="editCourseOutline">Edit Outline:</label>
            <textarea id="editCourseOutline" name="courseOutline" required>{{ $data->courseOutline }}</textarea>

            <button type="submit">Update</button>
        </form>
    </div>
</section>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Function to confirm sending for approval and display a message
    function confirmAndSend() {
        if (confirm('Are you sure you want to send this for approval?')) {
            alert('Syllabus sent for approval successfully!');
            return true; // Submit the form
        } else {
            return false; // Cancel the form submission
        }
    }

    // jQuery for toggling between view mode and edit mode
    $(document).ready(function() {
        $('#startEditingBtn').click(function() {
            $('.view-mode').hide();
            $('.edit-mode').show();
        });

        $('#backBtn').click(function() {
            $('.edit-mode').hide();
            $('.view-mode').show();
        });

        $('#deleteBtn').click(function() {
            if (confirm("Are you sure you want to delete this?")) {
                $('#deleteForm').submit();
            }
        });
    });
</script>

<footer class="footer">
    <div class="container">
        <p>&copy; 2024 ALGORYTHM2.0. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
