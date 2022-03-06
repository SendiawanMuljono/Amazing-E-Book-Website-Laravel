<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ebooks = [
            ['title' => 'The Portals', 'author' => 'Vladimir Putin', 'description' => 'The Portals talk about making portals. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum error nobis et aspernatur tempora, dolores impedit officia voluptates, fugit nam voluptatum quibusdam magni porro molestiae quae. Itaque dolores nobis atque sit, aut eveniet ad earum veritatis nulla exercitationem consequuntur amet, obcaecati accusantium! Et omnis veritatis quidem? Harum earum accusamus quis, repellendus saepe eveniet delectus ut ipsa necessitatibus quam similique odio quas nostrum, tempora laborum consequuntur eos. Sed, dolore eligendi quod iusto odit magnam quo laudantium atque provident assumenda earum corporis aspernatur facere doloremque modi adipisci saepe consequuntur dicta dolor ea ut ab at sapiente? Ab cumque dolor quae dicta pariatur. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores ullam hic, quisquam dolore magnam veritatis placeat. Incidunt cumque assumenda sint labore nihil debitis nemo, dolore veritatis repudiandae repellat asperiores dignissimos aut aperiam vel sunt quidem et in dolorem doloribus, minima culpa ullam necessitatibus? Provident quibusdam suscipit porro, tempora iusto facere. Libero expedita earum vero ratione deserunt, facilis dolores ut, sint sunt reiciendis dicta quia repellat, laboriosam repellendus vel mollitia ipsa enim nihil dolorem. A quidem, consequuntur perspiciatis aut atque non culpa, magni suscipit possimus neque dolor minima omnis voluptas sapiente quod, accusantium odit hic! Est accusantium suscipit culpa aut quis.'],
            ['title' => 'Superman', 'author' => 'Tom Cruise', 'description' => 'Superman is a book about man that is super. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam alias illo quibusdam odio provident, iure perferendis commodi fugit quo repellat excepturi. Quisquam, at! Perspiciatis dolor ullam rem debitis nemo placeat quos laboriosam pariatur eveniet hic impedit magni atque porro repellendus voluptatem reiciendis deleniti nihil, iste laborum unde. Dolorem, modi temporibus!'],
            ['title' => 'Big Bang Theory', 'author' => 'Dwayne Johnson', 'description' => 'Big Bang Theory talks about theory that could make Big Bang. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed mollitia eaque, dignissimos voluptate voluptates cumque exercitationem! Accusamus pariatur inventore possimus similique animi sit at! Ipsa beatae provident placeat amet iste!'],
            ['title' => 'Time Machine', 'author' => 'John Cena', 'description' => 'Time Machine tells about the possibility of time machine to be created. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque dolore sed ipsa perferendis, commodi nisi culpa. Nemo incidunt architecto laboriosam?'],
            ['title' => 'One Piece', 'author' => 'Chuck Norris', 'description' => 'One Piece tells about a pirate named Luffy that dreamed to be a pirate king'],
            ['title' => 'Dragon Ball Z', 'author' => 'Gal Gadot', 'description' => 'Dragon Ball Z is about protagonist named Goku that punch everyone'],
            ['title' => 'Romeo & Juliet', 'author' => 'Elizabeth Olsen', 'description' => 'Romeo & Juliet is a romance between Romeo and Juliet'],
            ['title' => 'Shrek is Love, Shrek is Life', 'author' => 'Scarlett Johanson', 'description' => 'Shrek is Love, Shrek is Life is a book that gives inspirational romance idea based on Shrek'],
            ['title' => 'Lord of the Rings', 'author' => 'Goku', 'description' => 'LOTR (Lord of the Rings) tells about dwarf trashing out a ring'],
            ['title' => 'Hobbit', 'author' => 'Donald Trump', 'description' => 'Hobbit is the sequel of LOTR which is about the same'],
            ['title' => 'Kuntilanak Kepleset', 'author' => 'Joe Biden', 'description' => 'Kuntilanak Kepleset is a phenomenal book about kuntilanak falls down when she is actually flying'],
            ['title' => 'Pocong Sleding Nenek Lampir', 'author' => 'Kamala Harris', 'description' => 'Pocong Sleding Nenek Lampir is a very scary book that will make you think why do I read this book'],
            ['title' => 'Police 86', 'author' => 'Joe Taslim', 'description' => 'Police 86 is a book based on a show program called 34'],
            ['title' => 'Criminal Acts', 'author' => 'Bambang Pamungkas', 'description' => 'Criminal Acts book consists of criminal acts'],
            ['title' => 'Winnie the Pooh', 'author' => 'Cristiano Ronaldo', 'description' => 'Winnie the Pooh is a book about yellow bear eating honey'],
            ['title' => 'Romanian Empire', 'author' => 'Lionel Messi', 'description' => 'Romanian Empire is a book about Sparta'],
            ['title' => 'Bermuda Triangle', 'author' => 'Kylian Mbappe', 'description' => 'Bermuda Triangle tells about undiscovered mystery and fact of Bermuda Triangle'],
            ['title' => 'Deep Web', 'author' => 'De Gea', 'description' => 'Deep Web book consists of various big mysterious around the internet']
        ];


        DB::table('ebooks')->insert($ebooks);
    }
}
