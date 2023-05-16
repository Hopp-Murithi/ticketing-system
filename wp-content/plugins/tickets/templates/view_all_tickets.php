<?php
global $wpdb;

$tickets = $wpdb->get_results("SELECT * FROM wp_ticketing ");

?>

<h1>All tickets assigned</h1>
<div class="container">

    <table>
        <tr>
            <th>Ticket title</th>
            <th>Task</th>
            <th>Assignee</th>
            <th>Due date</th>
            <th>Progress</th>
            
        

        </tr>


        <?php
        for ($i = 0; $i < count($tickets); $i++) {
        ?>

            <tr>
                <td><?php echo $tickets[$i]->title ?></td>
                <td><?php echo $tickets[$i]->task ?></td>
                <td><?php echo $tickets[$i]->assignee ?></td>
                <td><?php echo $tickets[$i]->due_date ?></td>
                <td><?php echo $tickets[$i]->status ?></td>
                <td>
                        <form method=" post" >
                            <input type="hidden" name="id" value="<?php ?>">
                            <input type="submit" value="Update">
                        </form>
                    </td>
                    <td>
                        <form  >
                            <input type="hidden" name="id" value="<?php  ?>">
                            <input class="delete" type="submit" value="Delete">
                        </form>
                    </td>
            </tr>
        <?php
        }

        ?>

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
    .delete{
        background-color:red ;
        color: #ffffff;
        font-weight: 500;
        border-radius: 8px;
        border:1px solid red;
        padding: 5px;
    }
</style>