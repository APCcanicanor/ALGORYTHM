<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
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
		<li><a class="active" href="/">Home</a></li>
		<li><a href="courses">Courses</a></li>
	</ul>
</nav>

<!-- section -->
<section class="sec-num1">
    <div class="container">
        <h1>Check out our stored syllabus in each courses!</h1>
        <a href="/courses" class="btn">See syllabus</a>
    </div>
</section>

<!-- about us section -->
<section class="about-section">
    <div class="container">
        <h2>About Us</h2>
        <p>Welcome to our website! We are dedicated to revolutionizing education through artificial intelligence. Our platform generates course syllabi using cutting-edge AI technology, providing educators with comprehensive and tailored resources to enhance teaching and learning experiences. With our innovative approach, we aim to empower educators and institutions to adapt to the ever-evolving landscape of education.</p>
        <div class="members">
            <div class="card">
                <img src="https://scontent.fmnl13-2.fna.fbcdn.net/v/t1.15752-9/426235430_265513763265977_3208154578375981903_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeEgsRm--nWiQiU7Ri-W1gK4ACglnMBQQ9gAKCWcwFBD2OTiJIYqwifWT3fp0avZHUvB1u90mSrV3jUg6dfgc7Vk&_nc_ohc=X-QQbfgBYIMAX-7Oioh&_nc_ht=scontent.fmnl13-2.fna&oh=03_AdRdUBOClm9sFUCC2tYEjnr6XU_Z2VRHV7Si_fGXU1exfQ&oe=65FAC52E" alt="Member 1">
                <div class="info">
                    <h3>Carl Von Nicanor</h3>
                    <p>Project Manager</p>
                </div>
            </div>
            <div class="card">
                <img src="https://scontent.fmnl25-2.fna.fbcdn.net/v/t1.15752-9/426407824_1074928430220300_3342406724942136003_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeEdHl-nY8G9CNYKU7l9SbTzDTbjMN8mp7kNNuMw3yanuY_kJzaRsZjDj1cTtMfAiB_KmGEJajy80tOzAW9x_15j&_nc_ohc=Gd11gAqcOPIAX9uOJiT&_nc_ht=scontent.fmnl25-2.fna&oh=03_AdSaiDPuHWjysdp1WgmhbhLQJA50zeTYjF7YeKRfU2ddKg&oe=65FABAAF" alt="Member 2">
                <div class="info">
                    <h3>Johanne Marlowee Sanchez</h3>
                    <p>Member</p>
                </div>
            </div>
            <!-- Add more cards for other members -->
        </div>
    </div>
</section>


</body>
</html>
