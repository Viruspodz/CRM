<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddNgoToPropertyOwnerTagEnum extends Migration
{
    public function up()
    {
        DB::statement("ALTER TABLE deals MODIFY COLUMN property_owner_tag ENUM(
            'Developer', 'Broker', 'Seller', 'Agent', 'Client - Sale', 
            'Client - Rent', 'Property Owner', 'Agent/Broker', 'Bank', 
            'Merchant', 'NGO', 'Charitable Institutions', 'LGU', 'HOA'
        ) NOT NULL");
    }

    public function down()
    {
        DB::statement("ALTER TABLE deals MODIFY COLUMN property_owner_tag ENUM(
            'Developer', 'Broker', 'Seller', 'Agent', 'Client - Sale', 
            'Client - Rent', 'Property Owner', 'Agent/Broker', 'Bank', 
            'Merchant'
        ) NOT NULL");
    }
}
