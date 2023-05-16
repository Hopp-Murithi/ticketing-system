<?php

/**
 * @package ticketsplugin
 */

namespace Inc\Pages;

class Custom_user
{
     function register()
    { $this->create_employee();
    }

    function create_employee()
    {
        add_role(
            'employee',
            'Employee',
            [
                'read' => true,
                'edit_posts' => true
            ]

        );
    }
}
