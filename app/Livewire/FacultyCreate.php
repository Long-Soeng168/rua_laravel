<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Faculty;

class FacultyCreate extends Component
{
    use WithFileUploads;

    public $image;
    public $pdf;
    public $name = null;
    public $name_kh = null;
    public $description = null;
    public $description_kh = null;
    public $order_index = null;
    public $contact_info = null;
    public $contact_info_kh = null;


    public function updated()
    {
        $this->dispatch('livewire:updated');
    }


    public function save()
    {
        // $this->dispatch('livewire:updated');
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'name_kh' => 'required|string|max:255',
            'description' => 'required',
            'description_kh' => 'required',
            'contact_info' => 'required',
            'contact_info_kh' => 'required',
            'order_index' => 'nullable',
        ]);

        $validated['create_by_user_id'] = request()->user()->id;
        foreach ($validated as $key => $value) {
            if (is_null($value) || $value === '') {
                unset($validated[$key]);
            }
        }

        $createdPublication = Faculty::create($validated);

        // dd($createdPublication);
        return redirect()->route('admin.faculties.index')->with('success', 'Successfully Created!');

        // session()->flash('message', 'Image successfully uploaded!');
    }

    public function render()
    {
        return view('livewire.faculty-create');
    }
}
