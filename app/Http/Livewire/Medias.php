<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Media;

class Medias extends Component
{
    public $medias;
    public $mediaId, $nama_media, $nomor_telepon, $alamat;
    public $isOpen = 0;

    public function render()
    {
        // $this->medias = Media::orderBy('created_at', 'DESC')->get();
        $this->medias = Media::all();
        return view('livewire.medias');
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
        $this->validate(
            [
                'nama_media' => 'required',
                'nomor_telepon' => 'required',
                'alamat' => 'required',
            ]
        );

        Media::updateOrCreate(['id' => $this->mediaId], [
            'nama_media' => $this->nama_media,
            'nomor_telepon' => $this->nomor_telepon,
            'alamat' => $this->alamat

        ]);

        $this->hideModal();

        session()->flash('info', $this->mediaId ? 'Media Berhasil Di Update' : 'Media Berhasil Dibuat');

        $this->mediaId = '';
        $this->nama_media = '';
        $this->nomor_telepon = '';
        $this->alamat = '';
    }

    public function edit($id)
    {
        $media = Media::findOrFail($id);
        $this->mediaId = $id;
        $this->nama_media = $media->nama_media;
        $this->nomor_telepon = $media->nomor_telepon;
        $this->alamat = $media->alamat;

        $this->showModal();
    }

    public function delete($id)
    {
        Media::find($id)->delete();
    }
}
