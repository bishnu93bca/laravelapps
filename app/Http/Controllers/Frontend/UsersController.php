<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        // Display a list of posts
    }

    public function create() {
        // Show a form to create a new post
    }

    public function store(Request $request) {
        // Save a new post
    }

    public function show($id) {
        // Show a specific post
    }

    public function edit($id) {
        // Show a form to edit a post
    }

    public function update(Request $request, $id) {
        // Update a specific post
    }

    public function destroy($id) {
        // Delete a specific post
    }
}
