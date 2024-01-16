<?php

namespace App\Controllers;

use Framework\Database;

class ListingController
{
    protected $db;
    
    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    /**
     * show all listings
     *
     * @return void
     */
    public function index() {
        $listings = $this->db->query("SELECT * FROM listings")->fetchAll();

        loadView('home', [
            'listings' => $listings
        ]);
    }

    /**
     * create a new listing page
     *
     * @return void
     */
    public function create() {
        loadView('listings/create');
    }

    /**
     * show a single listing
     *
     * @return void
     */
    public function show() {
        $id = $_GET['id'] ?? '';

        $params = [
            'id' => $id
        ];

        $listing = $this->db->query("SELECT * FROM listings WHERE id= :id", $params)->fetch();

        loadView('listings/show', [
            'listing' => $listing
        ]);
    }
}