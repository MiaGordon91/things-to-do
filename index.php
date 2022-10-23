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
    </head>

    <body>

        <h1>Crack On With It</h2>

            <form method="post" action="processForm.php" name="tasklist">
                    <?php if (isset($error)) { ?>
                        <p><?php echo $error; ?></p>
                    <?php } ?>
                <label for="task" name="task">My Task:</label>
                <input type="text" id="inputbox" name="task">
                <button type="submit" name="submit">Submit</button>            
            </form>

    <table>
        <thead>
            <tr>
                <th>Number</th>
                <th>Tasks</th>
                <th>Deadline</th>
                <th>Completed</th>
                <th style="width: 60px;">Action</th>
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
    
