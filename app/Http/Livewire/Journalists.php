<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Journalist;

class Journalists extends Component
{
    public $journalists;
    public $journalistId, $nama_journalist, $jabatan, $no_hp, $alamat;
    public $isOpen = 0;

    public function render()
    {
        $this->journalists = Journalist::orderBy('created_at', 'Desc')->get();
        return view('livewire.journalists');
    }

    public function showModal()
    {
        $this->isOpen = true;
    }
    public function hideModal()
    {
        $this->isOpen = false;
    }

    public function store()
    {
        $this->validate([
            'nama_journalist' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);

        Journalist::updateOrCreate(['id' => $this->journalistId], [
            'nama_journalist' => $this->nama_journalist,
            'jabatan' => $this->jabatan,
            'no_hp' => $this->no_hp,
            'alamat' => $this->alamat
        ]);
        $this->hideModal();

        session()->flash('info', $this->journalistId ? 'Data Berhasil Di Update' : 'Data Berhasil ditambahkan');

        $this->journalistId = '';
        $this->nama_journalist = '';
        $this->jabatan = '';
        $this->no_hp = '';
        $this->alamat = '';
    }

    public function edit($id)
    {
        $journalist = Journalist::findOrFail($id);

        $this->journalistId = $id;
        $this->nama_journalist = $journalist->nama_journalist;
        $this->jabatan = $journalist->jabatan;
        $this->no_hp = $journalist->no_hp;
        $this->alamat = $journalist->alamat;

        $this->showModal();
    }

    public function delete($id)
    {
        Journalist::find($id)->delete();
    }
}
