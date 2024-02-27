<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup</title>
</head>
<body>
    <script>
        alert("{{ $popupMessage }}");
        window.history.back(); // Redirect the user back to the previous page
    </script>
</body>
</html>
