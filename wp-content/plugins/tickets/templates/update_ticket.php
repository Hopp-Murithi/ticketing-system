
<div class="container">
    <?php
    global $wpdb;
    $employees = $wpdb->get_results("SELECT * FROM wp_users");

    $ticket_id = null;
    $ticket = null;

    if (isset($_GET['ticket_id'])) {
        $ticket_id = $_GET['ticket_id'];
        $ticket = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}ticketing WHERE id = %d", $ticket_id));
    }

    ?>


    <div class="card">

        <form method="post">
            <?php

            global $success_msg;

            if ($success_msg) {
                echo "<p id='message'>Ticket has been updated successfully</p>";

                echo '<script> document.getElementById("message").style.display = "flex"; </script>';

                echo    '<script> 
                setTimeout(function(){
                    document.getElementById("message").style.display ="none";
                }, 3000);
            </script>';
            }
            ?>
            <h1><?php echo $ticket ? 'Update ticket' : 'Create ticket'; ?></h1>
            <div>
                <label for="title">Task title</label>
                <input type="text" id='title' name="title" value="<?php echo $ticket ? $ticket->title : ''; ?>" required />
            </div>
            <div>
                <label for="assignee">Assign to:</label>

                <select name="assignee">
                    <option value="">Please select</option>

                    <?php
                    foreach ($employees as $employee) {
                        $selected = ($ticket && $ticket->assignee === $employee->user_email) ? 'selected' : '';
                        echo '<option value="' . $employee->user_email . '" ' . $selected . '>' . $employee->user_email . '</option>';
                    }
                    ?>

                </select>
            </div>
            <div>
                <label for="task">Task</label>
                <input type="text" name="task" id='task' value="<?php echo $ticket ? $ticket->task : ''; ?>" required />
            </div>
            <div>
                <label for="due_date">Due date</label>
                <input type="date" name="due_date" id='due_date' value="<?php echo $ticket ? $ticket->due_date : ''; ?>" required />
            </div>
            <?php if ($ticket) : ?>
                <input type="hidden" name="ticket_id" value="<?php echo $ticket_id; ?>">
                <input type="submit" name='update' value="Update">
            <?php else : ?>
                <input type="submit" name='submit' value="Assign">
            <?php endif; ?>

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
        box-shadow: 0 8px 16px 0 rgba(0,
0, 0, 0.2);
}

css
Copy code
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
    background-color: #1DA1F2;
    width: 100%;
    font-size: 22px;
    font-weight: 600;
    color: black;
    margin-top: 20px;
    margin-bottom: 40px;
    padding: 15px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #040404;
    color: white;
}

#message {
    background-color: #ffffff;
    color: #4BB543;
    border-radius: 5px;
    font-size: 20px;
    font-weight: 800;
}
</style>