<?php
namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Configrationss extends Controller
{
    public function create(){
        return view('back-end.admin.slider.create');
    }
    public function store(Request $request){
        $requestArray = $request->all();
        if($request->hasFile('image')){
            $fileName = $this->fileUpload($request);
            DB::select("INSERT INto SLIDER (IMAGE) VALUES('$fileName')");
        }
        return redirect()->route('sliders.index');
    }

    public function edit($id){

        $rows =DB::select("SELECT * FROM SLIDER WHERE ID = '$id'")[0];
        return view('back-end.admin.slider.edite',compact('rows'));
    }
    public function update(Request $request,$id){
        if($request->hasFile('image')){
            $fileName = $this->fileUpload($request);
            DB::select("UPDATE SLIDER SET IMAGE = '$fileName' WHERE ID = '$id'");
        }
        return redirect()->route('sliders.index');
    }
    public function destroy($id)
    {
        DB::select("DELETE FROM SLIDER WHERE ID = '$id'");
        return redirect()->route('sliders.index');
    }
    public function editSettings(Request $request){
        $about =DB::select('SELECT * FROM PAGES WHERE TYPE = "about"');
        $whats =DB::select('SELECT * FROM PAGES WHERE TYPE = "whats"');
        $phone =DB::select('SELECT * FROM PAGES WHERE TYPE = "phone"');
        $periods = Period::all();
        $pointsPerRial =DB::select('SELECT * FROM PAGES WHERE TYPE = "points_per_rial"');

        return view('back-end.admin.settings.edit',compact('about','pointsPerRial','whats','phone','periods'));
    }

    public function updateSettings(Request $request){
        $abouttext = $request->abouttext;
        $pointstext = $request->pointstext;
        $whats = $request->whats;
        $phone = $request->phone;

        DB::update("UPDATE pages SET TEXT = '$abouttext' WHERE type = 'about'");
        DB::update("UPDATE pages SET TEXT = '$pointstext' WHERE type = 'points_per_rial'");
        DB::update("UPDATE pages SET TEXT = '$whats' WHERE type = 'whats'");
        DB::update("UPDATE pages SET TEXT = '$phone' WHERE type = 'phone'");
        Period::truncate();
        foreach ($request->periods as $item) {
            Period::create(array("name"=>$item));
        }
        return redirect()->route('settings.edite')->with('message', ' تم حفظ التعديلات  بنجاح');
    }
    public function index(){
        $rows = DB::select('SELECT * FROM SLIDER');
        return view('back-end.admin.slider.index',compact('rows'));
    }

    public function fileUpload(Request $request) {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.'png';
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            // $this->save();
            return url('images/'.$name);
        }
    }

}
