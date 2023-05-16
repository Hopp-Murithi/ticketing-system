<?php

/**
 * @package ticketing plugin
 */

namespace Inc\Pages;

class CreateTicket
{
    public function register()
    {
        $this->create_tickets_table();
        $this->add_new_ticket();
    }

    function create_tickets_table()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . 'newticketing';

        $query = "CREATE TABLE IF NOT EXISTS " . $table_name . "(
            id int AUTO_INCREMENT PRIMARY KEY, 
            title text NOT NULL,
            assignee text NOT NULL,
            task text NOT NULL,
            status text NOT NULL DEFAULT 'pending',
            is_deleted int NOT NULL DEFAULT 0,
            due_date date NOT NULL DEFAULT CURRENT_DATE
         );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($query);
    }

    function add_new_ticket()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'title' => $_POST['title'],
                'assignee' => $_POST['assignee'],
                'task' => $_POST['task'],
                'status' => 'pending',
                'is_deleted' => 0,
                'due_date' => $_POST['due_date']

            ];

            global $wpdb;

           
        $existingTask = $wpdb->get_row(
            $wpdb->prepare("SELECT * FROM {$wpdb->prefix}newticketing WHERE assignee = %s AND is_deleted = 0", $_POST['assignee'])
        );

        if ($existingTask) {
            echo "Assignee already has an assigned task.";
            exit;
        }

            $table_name = $wpdb->prefix . 'newticketing';
            $results = $wpdb->insert($table_name, $data);


            global $success_msg;

            $success_msg = false;
            if ($results == true) {
                $success_msg = true;
            }
        }
    }
}
