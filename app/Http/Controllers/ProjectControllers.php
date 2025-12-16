<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Product;
use App\Models\Project;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectControllers extends Controller
{
    public function index()
    {
        $projects = Project::with(['lead', 'product'])->get();
        return view('projects', compact('projects'));
    }

    public function storeFromLead(Request $request, $leadId)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $lead = Lead::findOrFail($leadId);
        $product = Product::findOrFail($request->product_id);

        Project::create([
            'name'       => 'Project ' . $product->name . ' - ' . $lead->name, 
            'lead_id'    => $lead->id,
            'product_id' => $product->id,
            'user_id'    => Auth::id(), 
        ]);

        $lead->save();

        return redirect('/projects')->with('success', 'Lead berhasil dikonversi menjadi Project!');
    }


    public function approve($id)
        {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            if (!$user->isManager()) {
                abort(403, 'Unauthorized');
            }

            $project = Project::findOrFail($id);
            $project->status = 'approved';
            $project->approved_by = $user->id; 

            $customer = null;
            if ($project->lead) {
                $customer = Customer::firstOrCreate(
                    ['email' => $project->lead->email],
                    [
                        'lead_id' => $project->lead->id, 
                        'name'    => $project->lead->name,
                    ]
                );
            }
            $project->status = 'approved';
            $project->approved_by = $user->id;
            
            if ($customer) {
                $project->customer_id = $customer->id;
            }
    
            $project->save();

            return back()->with('success', 'Project berhasil disetujui.');
        }

        public function reject($id)
        {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            
            if (!$user->isManager()) {
                abort(403, 'Unauthorized');
            }

            $project = Project::findOrFail($id);
            $project->status = 'rejected';
            $project->save();
            return back()->with('success', 'Project telah ditolak.');
        }
}
