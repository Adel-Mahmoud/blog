<?php

namespace App\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    
    public $id, $name, $email, $password, $confirm_password;
    
    public $add_at = false;
    public $edit_at = false;
    public $delete_at = false;
    
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users|max:255',
    ];
    
    private $pagination = 10;
    
    protected $paginationTheme = "bootstrap";
    
    public $search = '';
    
    public function render()
    {
        return view('livewire.users', [
            'users' => User::where('name', 'like', '%'.$this->search.'%')->paginate($this->pagination),
        ]);
    }
    
    public function resetData(){
      $this->id = "";
      $this->name = "";
      $this->email = "";
      $this->password = "";
      $this->confirm_password = "";
    }
    
    public function create(){
      $this->add_at = true;
    }
    
    public function store()
    {
        $this->rules['confirm_password'] = 'required|string|same:password';
        $this->validate();
        $this->password = Hash::make($this->password);;
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
        session()->flash('success','User Created Successfully!!');
        $this->resetData();
    }
    
    public function edit($id){
        $user = User::findOrFail($id);
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
    }
    
    public function update(){
        if ($this->id) {
          $user = User::findOrFail($this->id);
          $user->name = $this->name;
          $user->email = $this->email;
          if ($this->password !== "") {
            $user->password = $this->password;
          }
          $user->save();
          $this->resetData();
        }else{
          session()->flash('error','You must select an item first!!');
        }
    }
    
    public function destroy(){
      if ($this->id) {
        $user = User::findOrFail($this->id);
        $user->delete();
        session()->flash('success','User Deleted Successfully!!');
        $this->resetData();
      }else{
        session()->flash('error','You must select an item first!!');
      }
    }
    
}
