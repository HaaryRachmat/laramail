<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mail;

class Mails extends Component
{
    public $mails;
    public $mailId, $judul_surat, $isi_surat, $surat_dari, $ditujukan_kepada, $status, $keterangan;
    public $isOpen = 0; //0 tertutup dan 1 terbuka

    public function render()
    {
        // $this->mails = Mail::orderBy('created_at', 'DESC')->get();
        $this->mails = Mail::all();
        return view('livewire.mails');
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
        // untuk validasi data
        $this->validate(
            [
                'judul_surat' => 'required',
                'isi_surat' => 'required',
                'surat_dari' => 'required',
                'ditujukan_kepada' => 'required',
                'status' => 'required',
                'keterangan' => 'required'
            ]
        );

        // untuk menyimpan data ke database
        Mail::updateOrCreate(['id' => $this->mailId], [
            'judul_surat' => $this->judul_surat,
            'isi_surat' => $this->isi_surat,
            'surat_dari' => $this->surat_dari,
            'ditujukan_kepada' => $this->ditujukan_kepada,
            'status' => $this->status,
            'keterangan' => $this->keterangan
        ]);

        $this->hideModal();

        session()->flash('info', $this->mailId ? 'Surat Berhasil di Update' : 'Surat Berhasil Dibuat');

        $this->mailId = '';
        $this->judul_surat = '';
        $this->isi_surat = '';
        $this->surat_dari = '';
        $this->ditujukan_kepada = '';
        $this->status = '';
        $this->keterangan = '';
    }

    public function edit($id)
    {
        $mail  = Mail::findOrFail($id);
        $this->mailId = $id;
        $this->judul_surat = $mail->judul_surat;
        $this->isi_surat = $mail->isi_surat;
        $this->surat_dari = $mail->surat_dari;
        $this->ditujukan_kepada = $mail->ditujukan_kepada;
        $this->status = $mail->status;
        $this->keterangan = $mail->keterangan;

        $this->showModal();
    }

    public function delete($id)
    {
        Mail::find($id)->delete();
    }
}
