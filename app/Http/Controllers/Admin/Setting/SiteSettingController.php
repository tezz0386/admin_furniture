<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Admin\SiteSetting;
use App\Support\ImageSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Kamaln7\Toastr\Facades\Toastr;

class SiteSettingController extends Controller
{
    protected $pathOfSave = 'setting';
    protected $pathOfView = 'admin.settings.';
    protected $siteSetting;
    protected $imageSupport;
    protected $iconWidth=25;
    protected $iconHeight=25;
    protected $logoWidth=250;
    protected $logoHeight=250;
    function __construct(SiteSetting $siteSetting,  ImageSupport $imageSupport)
    {
        $this->middleware('auth');
        $this->siteSetting = $siteSetting;
        $this->imageSupport = $imageSupport;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site = $this->siteSetting::find(1);
        if($site){
            return view($this->pathOfView.'index', [
                'siteSetting'=>$this->siteSetting,
                'activePage'=>'sitesetting'
            ]);
        }else{
            return view($this->pathOfView.'create', [
                'activePage'=>'sitesetting',
            ]);
        }

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->siteSetting->rules(), $this->siteSetting->message());
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $this->siteSetting->fill($request->all());
        $icon = $this->imageSupport->saveAnyImg($request, $this->pathOfSave, 'icon', $this->iconWidth, $this->iconHeight);
        $logo = $this->imageSupport->saveAnyImg($request, $this->pathOfSave, 'logo', $this->logoWidth, $this->logoHeight);
        $this->siteSetting->icon = $icon;
        if($this->siteSetting->save()){
            Toastr::success('Your Web Site Setting Successfully Created', 'Success !!!', $optionsGroup=[]);
            return redirect()->route('sitesetting.index');
        }else{
            Toastr::error('Your Web Site Setting Could not be  Created', 'Error !!!', $optionsGroup=[]);
            return back()->withInput();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteSetting $siteSetting)
    {
        //
        return view($this->pathOfView.'update', [
            'siteSetting'=>$siteSetting,
            'activePage'=>'sitesetting',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteSetting $siteSetting)
    {
        //
        $this->siteSetting=$siteSetting;
        $validator = Validator::make($request->all(), $this->rules());
        if($validator->fails()){
            return back()
                ->withInput()
                ->withErrors($validator);
        }
        $this->siteSetting->fill($request->all());
        if(!$request->file('icon')== '' ){
            $this->imageSupport->deleteImg($this->pathOfSave, $siteSetting->icon);
            $icon = $this->imageSupport->saveAnyImg($request, $this->pathOfSave, 'icon', $this->iconWidth, $this->iconHeight);
             $this->siteSetting->icon = $icon;
        }
        if(!$request->file('logo') == ''){
            $this->imageSupport->deleteImg($this->pathOfSave, $siteSetting->logo);
            $logo = $this->imageSupport->saveAnyImg($request, $this->pathOfSave, 'logo', $this->logoWidth, $this->logoHeight);
            $this->siteSetting->logo = $logo;
        }
        if($this->siteSetting->save()){
            Toastr::success('Your Web Site Setting Successfully Created', 'Success !!!', $optionsGroup=[]);
            return redirect()->route('sitesetting.index');
        }else{
            Toastr::error('Your Web Site Setting Could not be  Created', 'Error !!!', $optionsGroup=[]);
            return back()->withInput();
        }

    }
    public function rules()
    {
        $rules=[
            'name'=>'required|unique:site_settings,name,'.$this->siteSetting->id,
            'description'=>'required',
            'icon'=>'mimes:jpg,jpeg,png',
            'logo'=>'mimes:jpeg,jpg,png',
            'address'=>'required',
            'contact_no'=>'required|max:14|min:9|unique:site_settings,contact_no,'.$this->siteSetting->id,
            'email'=>'required|email|unique:site_settings,email,'.$this->siteSetting->id,
            'location'=>'required|url',
            'title_tag'=>'required',
            'meta_keywords'=>'required',
            'meta_description'=>'required',
        ];
      return $rules;
    }
}
