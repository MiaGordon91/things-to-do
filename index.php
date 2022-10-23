<!DOCTYPE html> 

<?php
    include 'processForm.php';
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
            <title>
                Things To Do 
            </title>
        <meta charset="UTF-8">

        <script>
            function validateForm() {
                var x = document.forms["tasklist"]["task_input"].value;
                if (x == "") {
                alert("A task must be entered");
                return false;
                }
            }
        </script>
    </head>

    <body>

        <h1>Crack On With It!</h2>

            <form method="post" action="processForm.php" name="tasklist" onsubmit="return validateForm()" required>
                <label for="task" name="task">My Task:</label>
                <input type="text" id="inputbox" name="task_input" class="task">
                <button type="submit" name="submit">Submit</button>            
            </form>

    <table>
        <thead>
            <tr>
                <th>Number</th>
                <th>Tasks</th>
                <th>Completed</th>
            </tr>
        </thead>

        <tbody>
           <?php
             $tasks = mysqli_query($conn, "SELECT * FROM Tasks");

             $i = 1; while($row = mysqli_fetch_array($tasks)) { ?>
        <tr>
            <td> 
                <?php echo $i; ?> 
                </td>
                    <td class="task"> <?php echo $row['Task']; ?> </td>
                    <td class="delete">
                    <a href="processForm.php?del_task=<?php echo $row['TaskId'] ?>">x</a>
                </td>
        </tr>
            <?php $i++; } ?>                 
        </tbody>
    </table>

    </body>
</html>
    
