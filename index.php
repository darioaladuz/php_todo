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

    </div>

    <form action="/todo/index.php" method="POST">
        <input type="text" name="task" id="task" placeholder="Add a task...">
        <input type="submit" name="submit" id="submit" value="submit">
    </form>

    <div id="tasks">
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
                echo 'There are no tasks yet.';
            }
            
            // $conn->close();
        ?>
    </div>
</body>
</html>