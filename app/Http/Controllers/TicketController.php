<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function form()
    {
        return view('contact_form');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'type'    => 'required|in:technical,billing,product,general,feedback',
        ]);

        $databaseName = match ($request->type) {
            'technical' => 'st_technical_db',
            'billing'   => 'st_billing_db',
            'product'   => 'st_product_db',
            'general'   => 'st_general_db',
            'feedback'  => 'st_feedback_db',
        };
        
        // Set the database name for the connection
        config(['database.connections.mysql_custom.database' => $databaseName]);

        DB::connection('mysql_custom')->table('tickets')->insert([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Ticket submitted successfully!');
    }

}
