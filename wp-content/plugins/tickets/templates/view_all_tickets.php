<?php
global $wpdb;
$tickets = $wpdb->get_results("SELECT * FROM wp_ticketing");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $id = $_POST["id"];
    $wpdb->update("wp_ticketing", array("is_deleted" => 1), array("id" => $id));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = $_POST["id"];
    wp_redirect("http://example.com/update-ticket?ticket_id=" . $id);
    exit;
}
?>

<h1>All tickets</h1>
<div class="container">
    <table>
        <tr>
            <th>Ticket title</th>
            <th>Task</th>
            <th>Assignee</th>
            <th>Due date</th>
            <th>Progress</th>
        </tr>

        <?php foreach ($tickets as $ticket) { ?>
            <?php if ($ticket->is_deleted != 1) { ?> <!-- Check if the row is not deleted -->
                <tr id="data-row">
                    <td><?php echo $ticket->title ?></td>
                    <td><?php echo $ticket->task ?></td>
                    <td><?php echo $ticket->assignee ?></td>
                    <td><?php echo $ticket->due_date ?></td>
                    <td><?php echo $ticket->status ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $ticket->id ?>">
                            <input type="submit" name="update" class="update" value="Update">
                        </form>
                    </td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $ticket->id ?>">
                            <input type="submit" name="delete" class="delete" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
    </table>
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

    h1 {
        display: flex;
        justify-content: center;
        align-items: center;
        color: black;
    }

    table {
        background-color: antiquewhite;
        color: black;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid black;
        padding: 4px 12px;
    }

    .delete {
        background-color: red;
        color: #ffffff;
        font-weight: 500;
        border-radius: 8px;
        border: 1px solid red;
        padding: 5px;
    }
</style>
