<?php
namespace App\Http\Controllers;

use App\Http\Requests\TicketFormRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
public function index()
{
$tickets = Ticket::where('user_id', Auth::id())->get();
return view('tickets.index', compact('tickets'));
}

public function create()
{

return view('tickets.create');
}

public function store(TicketFormRequest $request)
{
 $data = $request->validated();
   Ticket::create($data);

return redirect()->route('tickets.index');
}
}
