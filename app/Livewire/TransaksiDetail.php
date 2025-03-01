<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;

class TransaksiDetail extends Component
{
    public $showModal = false;
    public $selectedTransaksi;

    protected $listeners = ['showDetail'];

    public function showDetail($id)
    {
    $this->selectedTransaksi = Transaksi::with(['cabang', 'details.layanan'])->find($id);
    $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.transaksi-detail');
    }
}
