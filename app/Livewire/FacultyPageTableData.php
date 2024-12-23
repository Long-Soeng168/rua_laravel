<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Faculty;
use App\Models\FacultyPage;
use Illuminate\Support\Facades\File;

class FacultyPageTableData extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $perPage = 10;

    #[Url(history: true)]
    public $filter = 0;

    #[Url(history: true)]
    public $sortBy = 'faculty_id';

    #[Url(history: true)]
    public $sortDir = 'ASC';

    public function setFilter($value) {
        $this->filter = $value;
        $this->resetPage();
    }

    public function setSortBy($newSortBy) {
        if($this->sortBy == $newSortBy){
            $newSortDir = ($this->sortDir == 'DESC') ? 'ASC' : 'DESC';
            $this->sortDir = $newSortDir;
        }else{
            $this->sortBy = $newSortBy;
        }
    }

    // ResetPage when updated search
    public function updatedSearch() {
        $this->resetPage();
    }

    public function delete($id) {
        $item = FacultyPage::findOrFail($id);

        if($item->image !== 'image.png') {
            $imagePathThumb = public_path('assets/images/publications/thumb/' . $item->image);
            $imagePath = public_path('assets/images/publications/' . $item->image);
            // Delete the image file from the filesystem
            if (File::exists($imagePathThumb)) {
                File::delete($imagePathThumb);
            }
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        if($item->pdf) {
            $filePath = public_path('assets/pdf/publications/' . $item->pdf);
            // Delete the image file from the filesystem
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }


        $item->delete();

        session()->flash('success', 'Delete Successfully!');
    }

    public function updateRead($id)
    {
        $item = FacultyPage::findOrFail($id);
        $item->update([
            'can_read' => $item->can_read == 0 ? 1 : 0
        ]);
    }

    public function updateDownload($id)
    {
        $item = FacultyPage::findOrFail($id);
        $item->update([
            'can_download' => $item->can_download == 0 ? 1 : 0
        ]);
    }


    public function render(){

        $items = FacultyPage::where(function($query){
                                $query->where('name', 'LIKE', "%$this->search%")
                                    ->orWhere('name_kh', 'LIKE', "%$this->search%")
                                    ->orWhere('description', 'LIKE', "%$this->search%")
                                    ->orWhere('description_kh', 'LIKE', "%$this->search%")
                                    ;
                            })
                            ->when($this->filter != 0, function($query){
                                $query->where('faculty_id', $this->filter);
                            })
                            ->orderBy($this->sortBy, $this->sortDir)
                            ->orderBy('parent_id')
                            ->orderBy('order_index')
                            ->paginate($this->perPage);
        $categories = Faculty::latest()->get();
        $selectedCategory = Faculty::find($this->filter);

        return view('livewire.faculty-page-table-data', [
            'items' => $items,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
        ]);
    }
}
