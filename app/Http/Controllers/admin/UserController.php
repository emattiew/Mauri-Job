<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('created_at','DESC')->paginate(10);
        return view('admin.users.list',[
            'users' => $users
        ]);
    }
    public function edit($id) {
        $user = User::findOrFail($id);
        
        return view('admin.users.edit',[
            'user' => $user
        ]);
    }
    public function update($id, Request $request) {
        
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:5|max:20',
            'email' => 'required|email|unique:users,email,'.$id.',id'
        ]);


        if ($validator->passes()) {

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->designation = $request->designation;
            $user->save();

            session()->flash('success', 'Les informations de l\'utilisateur ont été mises à jour avec succès.');


            return response()->json([
                'status' => true,
                'errors' => []
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    public function destroy(Request $request){
        $id = $request->id;

        $user = User::find($id);

        if ($user == null) {
            session()->flash('error', 'Utilisateur non trouvé');
            return response()->json([
                'status' => false,
            ]);
        }

        $user->delete();
        session()->flash('success', 'Utilisateur supprimé avec succès');
        return response()->json([
            'status' => true,
        ]);
    }

}
