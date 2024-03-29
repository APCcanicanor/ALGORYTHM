<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For Approvals</title>
    <link rel="stylesheet" href="{{ asset('assets/css/sfa.css') }}">
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
        <p id="courseTitle">{{ $approval->courseTitle }}</p>

        <label for="instructor">Instructor:</label>
        <p id="instructor">{{ $approval->instructor }}</p>

        <label for="courseDescription">Description:</label>
        <p id="courseDescription">{{ $approval->courseDescription }}</p>

        <label for="courseOutline">Outline:</label>
        <p id="courseOutline">{{ $approval->courseOutline }}</p>

        <!-- Accept and Reject Buttons (with conditional disabling) -->
        @if ($approval->status === 'pending')
        <form action="{{ route('approve.syllabus', $approval->id) }}" method="POST">
            @csrf
            <label for="department">Select Department:</label>
            <select name="department" id="department">
                <option value="IT">IT Department</option>
                <option value="Biology">Biology Department</option>
                <!-- Add more departments as needed -->
            </select>
            <button type="submit">Accept</button>
        </form>

        <form action="{{ route('reject.approval', $approval->id) }}" method="POST">
            @csrf
            <button type="submit">Reject</button>
        </form>
        @endif
    </div>
</section>

<footer class="footer">
    <div class="container">
        <p>&copy; 2024 ALGORYTHM2.0. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
