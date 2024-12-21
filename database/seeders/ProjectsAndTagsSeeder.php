<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Tag;

class ProjectsAndTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $project1 = Project::create([
            'name' => 'Beach Cleanup',
            'description' => 'A community event to clean up the local beaches.'
        ]);

        $project2 = Project::create([
            'name' => 'Tree Planting',
            'description' => 'An initiative to plant trees in urban areas.'
        ]);

        $project3 = Project::create([
            'name' => 'Coding Workshop',
            'description' => 'A workshop to teach coding basics to beginners.'
        ]);

        $tag1 = Tag::create(['name' => 'Environment']);
        $tag2 = Tag::create(['name' => 'Community']);
        $tag3 = Tag::create(['name' => 'Education']);

        $project1->tags()->attach([$tag1->id, $tag2->id]); 
        $project2->tags()->attach([$tag1->id]);       
        $project3->tags()->attach([$tag3->id]);      
    }
}
