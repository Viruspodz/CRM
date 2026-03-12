<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('deal_name');
            $table->string('industry')->nullable();
            $table->enum('product_type', [
                'Property Sale', 'Property Rental', 'Property Enlistment', 'RealForce Individual Agent',
                'RealForce Group Subscription', 'RealForce Elite Partnership', 
                'RealSuite Subscription', 'RealSuite Markup Model', 'RealPro Subscription', 'White-Label'
            ])->nullable(); 
            $table->enum('property_owner_tag', ['Developer', 'Broker', 'Seller', 'Agent','Client - Sale', 'Client - Rent', 'Property Owner', 'Agent/Broker', 'Bank', 'Merchant']); 
            $table->string('contact_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email_address')->nullable();
            $table->string('deal_size')->nullable();
            $table->decimal('potential_income', 15, 2)->nullable();
            $table->enum('deal_stage', ['Lead','Contacted','Appointment','Presentation','Quotation','Closed Won','Closed Lost'])->nullable();
            $table->decimal('probability', 5, 2)->nullable();
            $table->decimal('weighted_forecast', 15, 2)->nullable();
            $table->enum('priority', ['Low', 'Mid', 'High'])->nullable();
            $table->date('from_date')->nullable();
            $table->date('expected_close_date')->nullable();
            $table->text('next_step')->nullable();
            $table->text('remarks')->nullable(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('deals');
    }
};
