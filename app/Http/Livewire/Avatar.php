<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Avatar extends Component
{
    use WithFileUploads;

    public $user, $file;

    public function mount(User $user){
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.avatar')
            ->extends('frontend.layout')
            ->section('content');
    }

    public function update() {

        $this->validate(['file'=> 'required|image|max:2048']);

        $this->user->update([
            'avatar' => $this->file->store('avatar','public')
        ]);

        session()->flash('message', 'Avatar actualizado');

    }
}
