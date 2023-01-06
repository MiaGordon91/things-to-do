<!DOCTYPE html> 

<?php
    session_start();
    include "processForm.php";   

?>

<html>
    <head>
        <meta charset="UTF-8">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">

            <title>
                Things To Do 
            </title>


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

        <div>
            <?php
                if(isset($_SESSION['status'])) 
                {
            ?>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Congrats!</strong> <?php echo $_SESSION['status']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
                unset($_SESSION['status']);
                }
            ?>

        </div>

        <h1>Crack On With It!</h1>

            <form method="post" action="processForm.php" name="tasklist" onsubmit="return validateForm()" required>
                <label for="task" name="task">New Task:</label>
                <input type="text" id="inputbox" name="task_input" class="task">
                <button type="submit" name="submit">Submit</button>            
            </form>

    <table id="taskTable">
        <thead>
            <tr>
                <th>Task Id</th>
                <th>Task</th>
                <th>Completed</th>
                <th>Ready to delete?</th>
            </tr>
        </thead>

        <tbody class="row_position">
           <?php
             $sql = "SELECT * FROM Tasks ORDER BY TaskId";
             $tasks = mysqli_query($conn, "SELECT * FROM Tasks");

             $i = 1; while($row = mysqli_fetch_array($tasks)) { ?>
        <tr>
            <td> 
                <?php echo $row['TaskId']; ?> 
                </td>
                    <td class="task"> <?php echo $row['Task']; ?> </td>
                    <td class="tickbox"> <input type="checkbox"> </td>
                    <td>
                        <!-- url decode -->
                        <a href= "index.php?id= <?php echo($row['TaskId']);?>" class='btn'>Delete</a>
                    </td>
        </tr>
            <?php $i++; } ?>                 
        </tbody>
    </table>

    </body>
</html>
    
