<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('roles')->truncate();

		// Create admin role
		$admin = new Role();
		$admin->name = "admin";
		$admin->display_name = "Admin";
		$admin->save();

		// Create editor role
		$editor = new Role();
		$editor->name = "editor";
		$editor->display_name = "Editor";
		$editor->save();

		// Create author role
		$author = new Role();
		$author->name = "author";
		$author->display_name = "Author";
		$author->save();

		// Attach the roles
		// First user as admin
		$user1 = User::find(1);
		$user1->detachRole($admin);
		$user1->attachRole($admin);

		// Second user as editor
		$user2 = User::find(2);
		$user2->detachRole($editor);
		$user2->attachRole($editor);

		// Third user as author
		$user3 = User::find(3);
		$user3->detachRole($author);
		$user3->attachRole($author);

		// Fourth user as admin
		$user4 = User::find(4);
		$user4->detachRole($admin);
		$user4->attachRole($admin);

		// Fifth user as author
		$user5 = User::find(5);
		$user5->detachRole($author);
		$user5->attachRole($author);
    }
}
