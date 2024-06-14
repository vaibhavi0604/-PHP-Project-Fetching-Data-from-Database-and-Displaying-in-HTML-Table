<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fetch data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container my-4">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <?php
                $hostname = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $dbname = "students";
                
                $conn = mysqli_connect($hostname, $dbuser, $dbpass, $dbname);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());    
                }
                
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"];
                        $firstname = $row["first_name"];
                        $lastname = $row["last_name"];
                        $email = $row["email"];
                        echo "<tr>
                                <th scope='row'>$id</th>
                                <td>$firstname</td>
                                <td>$lastname</td>
                                <td>$email</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No results found</td></tr>";
                }
                
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
