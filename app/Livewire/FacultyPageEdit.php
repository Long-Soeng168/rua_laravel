<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Faculty;
use App\Models\FacultyPage;

use Image;

class FacultyPageEdit extends Component
{
    use WithFileUploads;

    public $image;
    public $pdf;

    public $item;

    public $name = null;
    public $name_kh = null;
    public $description = null;
    public $description_kh = null;
    public $faculty_id = null;
    public $parent_id = null;
    public $type = null;
    public $order_index = null;

    public function mount($id)
    {
        $this->item = FacultyPage::findOrFail($id);

        $this->name = $this->item->name;
        $this->name_kh = $this->item->name_kh;
        $this->description = $this->item->description;
        $this->description_kh = $this->item->description_kh;
        $this->faculty_id = $this->item->faculty_id;
        $this->parent_id = $this->item->parent_id;
        $this->type = $this->item->type;
        $this->order_index = $this->item->order_index;
    }


    public function updatedFacultyId()
    {
        $this->Parent_id = null;
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048', // 2MB Max
        ]);

        session()->flash('success', 'Image successfully uploaded!');
    }

    public function updatedPdf()
    {
        $this->validate([
            'pdf' => 'file|max:51200', // 2MB Max
        ]);

        session()->flash('success', 'PDF successfully uploaded!');
    }

    public function updated()
    {
        $this->dispatch('livewire:updated');
    }


    public function save()
    {
        $this->dispatch('livewire:updated');
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'name_kh' => 'required|string|max:255',
            'description' => 'required',
            'description_kh' => 'required',
            'type' => 'required',
            'faculty_id' => 'required',
            'parent_id' => 'nullable',
            'order_index' => 'nullable',
        ]);


        $validated['create_by_user_id'] = request()->user()->id;

        foreach ($validated as $key => $value) {
            if (is_null($value) || $value === '') {
                unset($validated[$key]);
            }
        }
        // dd($validated);

        if (!empty($this->pdf)) {
            // $filename = time() . '_' . $this->pdf->getClientOriginalName();
            $filename = time() . str()->random(10) . '.' . $this->pdf->getClientOriginalExtension();

            $this->pdf->storeAs('publications', $filename, 'publicForPdf');
            $validated['pdf'] = $filename;
        }

        $this->item->update($validated);

        return redirect()->route('admin.faculties_pages.index')->with('success', 'Successfully Created!');

        // session()->flash('message', 'Image successfully uploaded!');
    }

    public function render()
    {
        $categories = Faculty::latest()->get();
        $subCategories = FacultyPage::where('faculty_id', $this->faculty_id)->latest()->get();

        return view('livewire.faculty-page-edit', [
            'categories' => $categories,
            'subCategories' => $subCategories,
        ]);
    }
}
