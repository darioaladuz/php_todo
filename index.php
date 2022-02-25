<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo App</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <div id="message">
    <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "todo";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            
            if(isset($_POST['submit'])){
                if(empty($_POST['task'])){
                    echo 'what the hell bro? add something just fucking add soemthing';
                } else {
                    $task = $_POST['task'];
                    // echo $_POST['task'];
                    $sql = "INSERT INTO tasks (task)
                    VALUES ('$task')";
                    
                    if ($conn->query($sql) === TRUE) {
                      echo "New record created successfully";
                    } else {
                      echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            } else {
                echo '';
            }
            
            // $conn->close();
        ?>
    </div>

    <form action="/todo/index.php" method="POST">
        <input type="text" name="task" id="task" placeholder="Add a task...">
        <input type="submit" name="submit" id="submit" value="submit">
    </form>

    <div id="tasks">
        <?php
            $sql = "SELECT task FROM tasks";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<div class='task'>" . $row['task'] . "</div>";
              }
            } else {
              echo "0 results";
            }
        ?>
    </div>
</body>
</html>