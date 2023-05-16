<?php
// Check if user is already logged in
if (is_user_logged_in()) {
    wp_redirect('/ticketing-system/wp-admin/admin.php?page=view_tickets'); // Redirect to dashboard if already logged in
    exit;
}

// Check if form was submitted
if (isset($_POST['login'])) {
    // Verify user credentials
    $employee_number = $_POST['employee_number'];
    $user_password = $_POST['password'];

    // Get user ID based on employee number
    global $wpdb;
    $user_id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM wp_users WHERE ID = %s", $employee_number));

    if (!$user_id) {
        // Display error message if employee number is not found
        echo "Invalid employee number.";
        exit;
    }
    $hashed = wp_hash_password($user_password);
    // Check if the provided password is correct
    if (wp_check_password($user_password, $hashed, $user_id)) {
        // Authenticate the user
        $user = get_user_by('ID', $user_id);
        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID);
        do_action('wp_login', $user->user_login, $user);

     

        
        // Get the email address associated with the user
        $user_email = $user->user_email;
        var_dump($user_email);
        var_dump("SELECT * FROM `wp_ticketing` WHERE `assignee` = '$user_email'");
        
        // Query the ticketing system to get the tickets assigned to the user's email
        global $wpdb;
        $tickets = $wpdb->get_results("SELECT * FROM `wp_ticketing` WHERE `assignee` = '$user_email'");
        var_dump($tickets);
        if (empty($tickets)) {
            // Display message if no tickets are found
            echo "No tickets found.";
            exit;
        }

        // Display the filtered tickets for the user to view
        foreach ($tickets as $ticket) {
    
            echo "Title: " . $ticket->title . "<br>";
            echo "Task: " . $ticket->task . "<br>";
            echo "Due: " . $ticket->due_date . "<br>";
        
            echo "<br>";
        }

        exit;
    } else {
        // Display error message if password is incorrect
        echo "Invalid password.";
        exit;
    }
}
?>


<div class="container">
    <?php
    global $wpdb;
    $employees = $wpdb->get_results("SELECT * FROM wp_users");


    ?>


    <div class="card">

        <form method="post">

            <h1>Login</h1>
            <div>
                <label for="employee_number">Employee number</label>
                <input type="number" id='employee_number' name="employee_number" required />
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id='password' required />
            </div>

            <input type="submit" name='login' value="Login">

        </form>
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
        justify-content: center;
        margin: 40px;
        width: 50%;
        height: 70%;
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
        display: flex;
        justify-content: center;
    }

    label {
        display: block;
        color: black;
        margin-bottom: 10px;
        font-family: "Roboto Mono", monospace;
        font-size: 22px;
    }

    input[type="number"],
    input[type="password"] {
        padding: 5px;
        margin-bottom: 10px;
        font-size: 22px;
        width: 100%;
        height: 15%;
        box-sizing: border-box;
    }

    form {
        width: 100%;
        margin: 20px;
    }

    input[type="submit"] {
        background-color: #1DA1F2;
        width: 100%;
        font-size: 22px;font-weight: 600;
        color: black;
        margin-top: 20px;
        margin-bottom: 40px;
        padding: 15px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #040404;color: white;
    }
</style>