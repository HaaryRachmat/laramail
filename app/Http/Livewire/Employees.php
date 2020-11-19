<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;

class Employees extends Component
{
    public $employees;
    public $id_employee, $nama_employee, $jabatan, $status, $no_hp, $alamat;
    public $isModal;
    public $isOpen = 0;

    public function render()
    {
        $this->employees = Employee::orderBy('created_at', 'DESC')->get();
        return view('livewire.employees');
    }

    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }
    public function resetFields()
    {
        $this->nama_employee = "";
        $this->jabatan = "";
        $this->status = "";
        $this->no_hp = "";
        $this->alamat = "";
        $this->employee_id = "";
    }

    public function openModal()
    {
        $this->isModal = true;
    }

    public function closeModal()
    {
        $this->isModal = false;
    }

    public function store()
    {
        $this->validate([
            'nama_employee' => 'required',
            'jabatan' => 'required',
            'status' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        Employee::updateOrCreate(['id' => $this->id_employee], [
            'nama_employee' =>  $this->nama_employee,
            'jabatan' =>  $this->jabatan,
            'status' =>  $this->status,
            'no_hp' =>  $this->no_hp,
            'alamat' =>  $this->alamat
        ]);

        $this->closeModal();

        session()->flash('info', $this->id_employee ? 'Data Berhasil Di Update' : 'Data Berhasil ditambahkan');

        $this->id_employee = '';
        $this->nama_employee = '';
        $this->jabatan = '';
        $this->status = '';
        $this->no_hp = '';
        $this->alamat = '';
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        $this->id_employee = $id;
        $this->nama_employee = $employee->nama_employee;
        $this->jabatan = $employee->jabatan;
        $this->status = $employee->status;
        $this->no_hp = $employee->no_hp;
        $this->alamat = $employee->alamat;

        $this->openModal();
    }

    public function delete($id)
    {
        Employee::find($id)->delete();
    }

    // public function store()
    // {
    //     $this->validate([
    //         'nama_employee' => 'required|string',
    //         'jabatan' => 'required|string',
    //         'status' => 'required',
    //         'no_hp' => 'required|numeric',
    //         'alamat' => 'required|string'
    //     ]);

    //     Employee::updateOrCreate(['id' => $this->employee_id], [
    //         'nama_employee' => $this->nama_employee,
    //         'jabatan' => $this->jabatan,
    //         'status' => $this->status,
    //         'no_hp' => $this->no_hp,
    //         'alamat' => $this->alamat
    //     ]);

    //     session()->flash('message', $this->employee_id ? $this->nama_employee . 'Diperbaharui' : $this->nama_employee . 'Ditambahkan');
    //     $this->closeModal();
    //     $this->resetFields();
    // }

    // // tahu koding
    // public function showModal()
    // {
    //     $this->isOpen = true;
    // }
    // public function hideModal()
    // {
    //     $this->isOpen = false;
    // }
}
