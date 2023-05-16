<?php

/**
 * @package ticketsplugin
 */

namespace Inc\Pages;


class Admin
{
    public $pages;

    public function __construct()
    {
    }

    function register()
    {
        add_action('admin_menu', [$this, 'create_ticket_page']);
        add_action('admin_menu', [$this, 'view_all_tickets']);
    }

    function create_ticket_page()
    {
        add_menu_page(
            'Create ticket',
            'Create ticket',
            'manage_options',
            'create_ticket',
            [$this, "create_ticket_cb"],
            'dashicons-plus',
            110
        );
    }

    function create_ticket_cb()
    {
        require_once ABSPATH . 'wp-content/plugins/tickets/templates/create_ticket.php';
    }

    function view_all_tickets()
    {
        add_menu_page(
            'View all tickets',
            'View all tickets',
            'manage_options',
            'view_tickets',
            [$this, "view_all_tickets_cb"],
            'dashicons-book',
            111
        );
    }

    function view_all_tickets_cb()
    {
        require_once ABSPATH . 'wp-content/plugins/tickets/templates/view_all_tickets.php';
    }
}