<?php
$str = "   Hello, World!   ";
$trimmed_str = trim($str);  

echo "Original String: |" . $str . "|<br>";
echo "Trimmed String: |" . $trimmed_str . "|";

$conn = new mysqli("localhost", "root", "", "project");
$name = $email = $password = "";
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Name
    if (empty($_POST['name'])) {
        $errors['name'] = "Please fill in the name field.";
    } else {
        $name = test_input($_POST['name']);
    }

    // Validate Email
    if (empty($_POST['email'])) {
        $errors['email'] = "Please fill in the email field.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    } else {
        $email = test_input($_POST['email']);
    }

    // Validate Password
    if (empty($_POST['password'])) {
        $errors['password'] = "Please fill in the password field.";
    } else {
        $password = test_input($_POST['password']);
    }

    // Process further only if there are no validation errors
    if (empty($errors)) {
        // Perform further actions, such as database insertion
        // ...

        echo "<h2>Your Input:</h2>";
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $password;
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
    <div class="col-6 offset-2 mt-5" >
        <form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control">
            <span class="text-danger"></span><br>
            <label for="">Email</label>
            <input type="email" name="email" class="form-control">
            <span class="text-danger"></span><br>

            <label for="">Password</label>
            <input type="password" name="password" class="form-control">
            <span class="text-danger"></span><br>

            <button type="submit" name="submit" class="btn btn-primary">Sumit</button>
            
        </form>
    </div>
        </div>
    </div>
   
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>