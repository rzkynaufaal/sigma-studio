<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $serviceId = null;

    public $name = '';
    public $description = '';
    public $duration = '';
    public $price = '';
    public $status = 'active';

    protected $rules = [
        'name'        => 'required|string|max:255',
        'description' => 'nullable|string',
        'duration'    => 'required|integer|min:5',
        'price'       => 'required|numeric|min:0',
        'status'      => 'required|in:active,inactive',
    ];

    public function render()
    {
        return view('livewire.admin.services.index', [
            'services' => Service::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    public function resetForm()
    {
        $this->serviceId   = null;
        $this->name        = '';
        $this->description = '';
        $this->duration    = '';
        $this->price       = '';
        $this->status      = 'active';
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->resetForm();
    }

    public function store()
    {
        $this->validate();

        Service::create([
            'name'        => $this->name,
            'description' => $this->description,
            'duration'    => $this->duration,
            'price'       => $this->price,
            'status'      => $this->status,
        ]);

        session()->flash('success', 'Layanan berhasil dibuat.');

        $this->resetForm();
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);

        $this->serviceId   = $service->id;
        $this->name        = $service->name;
        $this->description = $service->description;
        $this->duration    = $service->duration;
        $this->price       = $service->price;
        $this->status      = $service->status;

        $this->resetErrorBag();
    }

    public function update()
    {
        $this->validate();

        $service = Service::findOrFail($this->serviceId);

        $service->update([
            'name'        => $this->name,
            'description' => $this->description,
            'duration'    => $this->duration,
            'price'       => $this->price,
            'status'      => $this->status,
        ]);

        session()->flash('success', 'Layanan berhasil diupdate.');

        $this->resetForm();
    }

    public function delete($id)
    {
        Service::findOrFail($id)->delete();

        session()->flash('success', 'Layanan berhasil dihapus.');
    }
}
