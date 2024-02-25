<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IT Department</title>
    <link rel="stylesheet" href="{{ asset('assets/css/IT.css') }}">
</head>
<body>

<!-- navbar -->
<nav>
	<input type="checkbox" id="check">
	<label for="check" class="checkbtn">
		<i class="fas fa-bars"></i>
	</label>

    <a href="/dashboard"><img class="logo" src="https://www.apc.edu.ph/wp-content/uploads/2019/05/apc-icon.png" alt="icon"></a>

	<ul>
		<li><a class="active" href="/dashboard">Home</a></li>
		<li><a href="courses">Courses</a></li>
        <li><x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
            {{ __('Profile') }}
        </x-responsive-nav-link></li>
        <li><a href = "create">Create</a></li>
	</ul>
</nav>
<!-- section -->


<footer class="footer">
    <div class="container">
        <p>&copy; 2024 ALGORYTHM2.0. All rights reserved.</p>
    </div>
</footer>


</body>
</html>
