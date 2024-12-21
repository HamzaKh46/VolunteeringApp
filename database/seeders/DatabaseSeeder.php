<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\FAQ;
use App\Models\News;
use App\Models\Category;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;





class DatabaseSeeder extends Seeder


{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ProjectsAndTagsSeeder::class);

        User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'admin@ehb.be'], // Check if the admin already exists by email
            [
                'name' => 'admin',
                'role' => 'admin',
                'password' => bcrypt('Password!321'), // Hash the password
            ]
        );

        $categories = [
            ['id' => 2, 'name' => 'Event Participation', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Costs & Fees', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'General Information', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Insert the categories into the database
        Category::insert($categories);

        $faqs = [
            [
                'question' => 'What is the purpose of this volunteering platform?',
                'answer' => 'Our platform connects volunteers with meaningful events and organizations that align with their interests and skills.',
                'category_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'How can I volunteer for events?',
                'answer' => 'Simply browse our event listings, select an event, and register to participate.',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'question' => 'Is volunteering free?',
                'answer' => 'Yes, volunteering is completely free, and you will not be charged for registering or participating.',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];



        Faq::insert($faqs);

        $newsItems = [
            [
                'title' => 'New Partnership: Volunteer to Help Disaster Relief',
                'image' => 'news_images/scgccwJmXgMBB4DdAJianzoCoWMWJYk39fI45Jqo.jpg',
                'content' => "We're proud to announce our new partnership with the Red Cross to provide disaster relief in affected areas. Volunteers are urgently needed to help distribute supplies, provide assistance to affected families, and raise awareness. Join us in making a positive impact!",
                'publication_date' => '2024-12-11',
                'created_at' => '2024-12-16 07:40:02',
                'updated_at' => '2024-12-16 07:40:02',
            ],
            [
                'title' => 'Upcoming Training for Volunteers',
                'image' => 'news_images/XpctDvbdPePRAzxgxis1PBuUwpYz7dKqCH1roaIl.jpg',
                'content' => "We are offering a training session to help new and returning volunteers improve their skills. Topics include leadership, community outreach, and crisis management. Don't miss this opportunity to be prepared for meaningful volunteer work!",
                'publication_date' => '2024-12-19',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert the news items into the database
        News::insert($newsItems);


        


        
    }
}


