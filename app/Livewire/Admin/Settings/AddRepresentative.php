<?php

namespace App\Livewire\Admin\Settings;

use App\Models\DealRepresentative;
use Livewire\Component;

class AddRepresentative extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function save()
    {
        $this->validate();

        DealRepresentative::create(['name' => $this->name]);

        session()->flash('message', 'Representative added successfully.');
        $this->reset('name');
    }

    public function delete($id)
    {
        $representative = DealRepresentative::find($id);

        if ($representative) {
            $representative->delete();
            session()->flash('message', 'Representative deleted successfully.');
        }
    }

    public function render()
    {
        $representatives = DealRepresentative::all();

        return view('livewire.admin.settings.add-representative', compact('representatives'))->layout('components.layouts.crm');
    }
}
