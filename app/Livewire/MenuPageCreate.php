<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Menu;
use App\Models\MenuPage;

use Image;

class MenuPageCreate extends Component
{
    use WithFileUploads;

    public $image;
    public $pdf;

    public $name = null;
    public $name_kh = null;
    public $description = null;
    public $description_kh = null;
    public $menu_id = null;
    public $parent_id = null;
    public $type = 'normal';
    public $order_index = null;

    public function updatedMenu_id()
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
            'menu_id' => 'required',
            'parent_id' => 'nullable',
            'order_index' => 'nullable',
        ]);


        // $validated['create_by_user_id'] = request()->user()->id;

        foreach ($validated as $key => $value) {
            if (is_null($value) || $value === '') {
                // unset($validated[$key]);
                $validated[$key] = null;
            }
        }
        // dd($validated);

        if (!empty($this->pdf)) {
            // $filename = time() . '_' . $this->pdf->getClientOriginalName();
            $filename = time() . str()->random(10) . '.' . $this->pdf->getClientOriginalExtension();

            $this->pdf->storeAs('publications', $filename, 'publicForPdf');
            $validated['pdf'] = $filename;
        }

        MenuPage::create($validated);

        return redirect()->route('admin.menus_pages.index')->with('success', 'Successfully Created!');

        // session()->flash('message', 'Image successfully uploaded!');
    }

    public function render()
    {
        $categories = Menu::orderBy('order_index')->get();
        $subCategories = MenuPage::where('menu_id', $this->menu_id)
                                        ->orderBy('parent_id')
                                        ->orderBy('order_index')
                                        ->latest()->get();

        return view('livewire.menu-page-create', [
            'categories' => $categories,
            'subCategories' => $subCategories,
        ]);
    }
}
