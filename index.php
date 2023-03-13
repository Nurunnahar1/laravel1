 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
 </head>
 <body>
 <form method="POST" action="process.php" enctype="multipart/form-data">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>

  <label for="profile-picture">Profile Picture:</label>
  <input type="file" id="profile-picture" name="profile-picture" accept="image/*" required>

  <input type="submit" value="Submit">
</form>




<table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Profile Picture</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <td><?= $user[0] ?></td>
          <td><?= $user[1] ?></td>
          <td><img src="uploads/<?= $user[2] ?>" alt="<?= $user[0] ?>"></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
 </body>
 </html>

 <?php
session_start();

// Define a function to validate the email address format
function is_valid_email($email) {
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Validate form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $profile_picture = $_FILES['profile-picture'];

  if (empty($name) || empty($email) || empty($password) || empty($profile_picture)) {
    die('All fields are required.');
  }

  if (!is_valid_email($email)) {
    die('Invalid email address.');
  }

  // Save profile picture to the server
  $upload_dir = 'uploads/';
  $timestamp = date('YmdHis');
  $file_name = $timestamp . '-' . $profile_picture['name'];
  $target_path = $upload_dir . $file_name;

  if (move_uploaded_file($profile_picture['tmp_name'], $target_path)) {
    // Save user data to CSV file
    $user_data = array($name, $email, $file_name);
    $file = fopen('users.csv', 'a');
    fputcsv($file, $user_data);
    fclose($file);

    // Set session and cookie variables
    $_SESSION['name'] = $name;
    setcookie('user', $name, time()+3600); // Expires in 1 hour
  } else {
    die('Error uploading file.');
  }
}

// Redirect to the users page
header('Location: users.php');
exit();
 
$file = fopen('users.csv', 'r');
$users = array();

while (($row = fgetcsv($file)) !== false) {
  $users[] = $row;
}

fclose($file);
?>
 