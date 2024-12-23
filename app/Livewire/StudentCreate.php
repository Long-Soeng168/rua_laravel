<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Student;
use App\Models\Major;

use Image;

class StudentCreate extends Component
{
    use WithFileUploads;

    public $image;
    // public $pdf;


    public $name = null;
    public $name_kh = null;
    public $link = null;
    public $gender = null;
    public $email = null;
    public $phone = null;
    public $address = null;
    public $major_id = null;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048', // 2MB Max
        ]);

        session()->flash('success', 'Image successfully uploaded!');
    }

    // public function updatedPdf()
    // {
    //     $this->validate([
    //         'pdf' => 'file|max:2048', // 2MB Max
    //     ]);

    //     session()->flash('success', 'PDF successfully uploaded!');
    // }

    // public function updated()
    // {
    //     $this->dispatch('livewire:updated');
    // }


    public function save()
    {
        $this->dispatch('livewire:updated');
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'name_kh' => 'required|string|max:255',
            'link' => 'required|string|max:500',
            'gender' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address' => 'nullable|string',
            'major_id' => 'nullable',
            'image' => 'nullable|file|max:2048',
        ]);

        // $validated['create_by_user_id'] = request()->user()->id;

        // dd($validated);

        if(!empty($this->image)){
            // $filename = time() . '_' . $this->image->getClientOriginalName();
            $filename = time() . str()->random(10) . '.' . $this->image->getClientOriginalExtension();

            $image_path = public_path('assets/images/students/'.$filename);
            $image_thumb_path = public_path('assets/images/students/thumb/'.$filename);
            $imageUpload = Image::make($this->image->getRealPath())->save($image_path);
            $imageUpload->resize(400,null,function($resize){
                $resize->aspectRatio();
            })->save($image_thumb_path);
            $validated['image'] = $filename;
        }

        // if (!empty($this->pdf)) {
        //     $filename = time() . '_' . $this->pdf->getClientOriginalName();
        //     $this->pdf->storeAs('publications', $filename, 'publicForPdf');
        //     $validated['pdf'] = $filename;
        // }

        Student::create($validated);

        // dd($createdPublication);
        return redirect('admin/people/students')->with('success', 'Successfully Created!');

        // session()->flash('message', 'Image successfully uploaded!');
    }

    public function render()
    {
        // dd($allKeywords);
        // dump($this->selectedallKeywords);

        return view('livewire.student-create', [
            'majors' => Major::latest()->get(),
        ]);
    }
}
