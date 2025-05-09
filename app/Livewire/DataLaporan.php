<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use Livewire\WithPagination;
use App\Models\Cabang;


class DataLaporan extends Component
{
    use WithPagination;
    public $status = 'all';
    public $cabang = 'all';
    public $start_date;
    public $end_date;
    public $selectedTransaksi;
    public $showModal = false;

    protected $queryString = ['status' => ['except' => 'all'], 'start_date', 'end_date', 'cabang'];


    public function updating($field)
    {
        if (in_array($field, ['status', 'start_date', 'end_date', 'cabang'])) {
            $this->resetPage();
        }
    }

    public function fetchDetail($transaksiId)
    {
        $this->selectedTransaksi = Transaksi::with('cabang', 'user')->find($transaksiId);
        $this->showModal = true;
    }
    public function closeModal()
    {
    $this->showModal = false;
    }
    public function filterLaporan()
{
    $this->resetPage();
    $this->render(); // Paksa render ulang komponen
}


    public function render()
    {
        $query = Transaksi::with('cabang', 'user');

        if ($this->status !== 'all') {
            $query->where('status', $this->status);
        }

        if ($this->start_date && $this->end_date) {
            $query->whereBetween('created_at', [$this->start_date, $this->end_date]);
        } elseif ($this->start_date) {
            $query->whereDate('created_at', '>=', $this->start_date);
        } elseif ($this->end_date) {
            $query->whereDate('created_at', '<=', $this->end_date);
        }

        if ($this->cabang && $this->cabang !== 'all') {
            $query->where('cabang_id', $this->cabang);
        }



        $datas = $query
        ->latest()
        ->paginate(10);

        $cabangs = Cabang::all();;

        return view('livewire.data-laporan', compact('datas', 'cabangs'));
    }
}
