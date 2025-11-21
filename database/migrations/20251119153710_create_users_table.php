<?php

use Wasf\Database\Schema;

return new class {
    public function up()
    {
        Schema::create("users", function($t){
            $t->id();
            $t->string("name");
            $t->string("email")->unique();
            $t->string("password");
            $t->string("photo");
            $t->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists("users");
    }
};
