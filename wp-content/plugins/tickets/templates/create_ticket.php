<div class="container">
    <?php
    global $wpdb;
    $employees = $wpdb->get_results("SELECT * FROM wp_users");


    ?>


    <div class="card">

        <form method="post">
            <?php

            global $success_msg;

            if ($success_msg) {
                echo "<p id='message'>Ticket has been assigned successfully</p>";

                echo '<script> document.getElementById("message").style.display = "flex"; </script>';

                echo    '<script> 
                setTimeout(function(){
                    document.getElementById("message").style.display ="none";
                }, 3000);
            </script>';
            }
            ?>
            <h1>Create ticket</h1>
            <div>
                <label for="title">Task title</label>
                <input type="text" id='title' name="title" required />
            </div>
            <div>
                <label for="assignee">Assign to:</label>

                <select name="assignee">
                    <option value="">Please select</option>

                    <?php
                    for ($i = 0; $i < count($employees); $i++) {
                    ?>
                        <option value=" <?php echo $employees[$i]->user_email ?>">
                            <?php echo $employees[$i]->user_email ?>
                        </option>
                    <?php
                    }

                    ?>
                </select>
            </div>
            <div>
                <label for="task">Task</label>
                <input type="text" name="task" id='task' required />
            </div>
            <div>
                <label for="due_date">Due date</label>
                <input type="date" name="due_date" id='due_date' required />
            </div>
            <input type="submit" name='submit' value="Assign">

        </form>
    </div>
</div>
</div>
<style>
    body {
        font-size: 16px;
        line-height: 1.5;
        background: radial-gradient(#1DA1F2, #ffffff) no-repeat center center fixed;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .card {
        display: flex;
        width: 50%;
        background-color: #ffffff;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        border-radius: 8px;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    h1 {
        color: black;
    }

    label {
        display: block;
        color: black;
        margin-bottom: 10px;
        font-family: "Roboto Mono", monospace;
        font-size: 22px;
    }

    input[type="text"],
    input[type="number"],
    select {
        padding: 5px;
        margin-bottom: 10px;
        width: 100%;
        box-sizing: border-box;
    }

    form {
        width: 100%
    }

    input[type="submit"] {
        background-color: #040404;
        color: white;
        margin-top: 20px;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #040404;
    }

    #message {
        background-color: #ffffff;
        color: #4BB543;
        border-radius: 5px;
        font-size: 20px;
        font-weight: 800;
    }
</style>