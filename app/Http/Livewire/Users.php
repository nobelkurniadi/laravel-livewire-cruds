<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $userId, $name, $email,  $search, $updateMode = false, $deleteId = '';
    
    public function render(){
        $search = '%' . $this->search . '%';
        $users = User::where('name', 'like', $search)->latest()->paginate(7);
        return view('livewire.users', [
            'users' => $users,
        ]);
    }

    public function store(){
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);
        
        $validatedData['password'] = bcrypt('Password');
        User::create($validatedData);
        session()->flash('message', 'User Added Successfully.');
        $this->resetInputFields();
        $this->emit('closeModal'); 
    }

    public function edit($id){
        $this->resetValidation();
        $this->updateMode = true;
        $user = User::where('id',$id)->first();
        $this->userId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
     }

    public function update(Request $request){
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
      
        User::where('id', $this->userId)->update($validatedData);
        session()->flash('message', 'User Updated Successfully.');
        $this->updateMode = false;
        $this->resetInputFields();
        $this->emit('closeModal'); 
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
    }
    
    public function cancel(){
        $this->resetValidation();
        $this->updateMode = false;
        $this->resetInputFields();
        $this->emit('closeModal'); 
        $this->emit('closeModalEdit'); 
    }

    public function deleteId($id){
        $this->deleteId = $id;
        $user = User::where('id',$id)->first();
        $this->name = $user->name;
    }

    public function delete(){
        User::destroy($this->deleteId);
        session()->flash('message', 'User Deleted Successfully.');
    }
}
