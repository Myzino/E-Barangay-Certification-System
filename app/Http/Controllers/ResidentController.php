<?php

namespace App\Http\Controllers;     //naa dapat ni sulod sa Http/Controllers/App/ just like UserController pero dili man ga work so gi gawas nalang nako

use Illuminate\Http\Request;
use App\Models\Resident;

class ResidentController extends Controller
{
    public function index() {
        $residents = Resident::all();  //Fetch all residents from the database
        return view('app.residents.index', ['residents' => $residents]);
        // return view('app.residents.index');
    }

    // Method to add a new resident
    public function store(Request $request)
    {
        try {
            // Validate the student data
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'phone' => 'required|numeric|digits_between:11,12', // Age validation rule
                'address' => 'required|string|max:255',
            ], [
                'phone.digits_between' => 'The phone number must be between :min and :max digits.',
            ]);

            // Create a new resident
            Resident::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                // Add other fields as needed
            ]);

            // Toaster notification when added
            $notification = [
                'message' => 'Resident Added Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('resident.index')->with($notification);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // If validation fails, show Toastr error notification and flash errors to the session
            $errors = $e->errors();
            $errorMessage = reset($errors)[0]; // Get the first error message

            $notification = [
                'message' => $errorMessage,
                'alert-type' => 'error',
            ];

            return redirect()->back()->withInput()->withErrors($errors)->with($notification);
        }
    }

    // method to delete a specific resident
    public function destroy($id)
    {
        $resident = Resident::findOrFail($id);
        $resident->delete();

        
        //toaster notif when deleted
        $notification = array ( 
            'message' => 'Resident Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('resident.index')->with($notification);
    }
}
