<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Organization;
use App\Models\Membership;
use App\Models\Task;
use App\Http\Traits\ApiResponse;
use App\Http\Resources\ManagerResource;
use App\Http\Request\ManagerRequest;
use App\Http\Resources\SubscribeResource;


class ManagerController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $manager = Manager::get();
        if($manager)
        {
            return sendJson(ManagerResource::collection($manager));
        }
        throw new \App\Exceptions\NotFoundException;
    }

    public function show(Request $request)
    {
        $manager = Manager::find($request->id);
        if($manager)
        {
            return sendJson(new ManagerResource($manager));
        }
        throw new \App\Exceptions\NotFoundException;
    }

    public function store(ManagerRequest $request)
    {
        $manager = Manager::create([$request->all()]);
        return sendJson(new ManagerResource($manager));
    }

    public function update(ManagerRequest $request)
    {
        // $manager = Manager::find($request->user_id);
        // $user = user::where('id',$request->user_id);

        $user = Manager::where('id',$request->id)->with('users')->first();
        if($user)
        {
            $user->update([
                'name'=>$request->name,
                'username'=>$request->username,
                'email' =>$request->email,
                'profile_photo'=>$request->profile_photo,
            ]);
            return sendJson(new ManagerResource($manager));
        }
    }

    public function subscribeToMembership(Request $request)
    {
        $manger = Manager::where('id',$request->id)->update([
            'membership_id'=>$request->membership_id,
        ]);
        // return response()->json($manger, 200);
        return $this->sendJson(new SubscribeResource($manger));
    }

//    public function pic(Request $request)
//    {
//        $validator = Validator::make($request->all(),[
//             'image'=>'required|mimes:png,jpg,jpeg'
//        ]);

//        if($validator->fails())
//        {
//            return response()->json(['error'=>$validator->error()],401);
//        }
//        if($image = $request->file('image'))
//        {
//            $path = 'upload';
//            $image = move($path,$image->etClientOriginalName());
//        }

//        return response()->json([
//            'success'=>true,
//            'message'=>'file uploaded',
//            'image'=>$image
//        ]);
//    }

    // public function store(Request $request)
    // {
    //     $this->validate($request,[
    //         "title"=>"required|max:150|min:2",
    //         "content"=>"required|max:500|min:5",
    //         "image"=>"image|mimes:png,jpg,jpeg",
    //     ]);

    //     $image = $request->file('image');
    //     $image_new_name = time().$image->getClientOriginalName();
    //     $image->move('images/posts',$image_new_name);

    //     $post = Post::create([
    //     "title"=>$request->title,
    //     "content"=>$request->content,
    //     "category_id"=>$request->category_id,
    //     "image"=>'images/posts/'.$image_new_name,
    //     ]);
    //     return redirect()->route('posts');
    // }
    // function uploadImage($folder,$image){

    //     $image->store('/',$folder);
    //     $filename = $image->hasName();
    //     $path = 'images/' . $folder . '/' . $filename;
    //     return $path;
    // }
}
