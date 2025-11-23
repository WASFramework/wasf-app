<?php

use Wasf\Database\Schema;

return new class {
    public function up()
    {
        Schema::create("users", function($t){
            $t->id();
            $t->string("name");
            $t->string("username")->unique();
            $t->string("email")->unique();
            $t->string("password");
            $t->string("photo")->default("/uploads/profile/default.png");
            $t->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists("users");
    }
};
