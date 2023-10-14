<?php

namespace App\Livewire\Brand;

use alert;
use Carbon\Carbon;
use App\Models\Brand;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class BrandList extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    use LivewireAlert;
    use WithPagination;
    use WithFileUploads;
    public $CreateForm = false;
    public $EditForm = false;
    public $ShowTable = true;

    public $selectedRows = [];
    public $selectPageRows = false;
    public ?Brand $brand;


    public $brandId;

    #[Rule('required', as: 'Marka Adı')]
    public $name;
    // #[Rule('required','exists:brands,id')]
    public $slug;
    #[Rule('nullable', as: 'Açıklama')]
    public $description;
    // #[Rule('nullable|sometimes|image|max:7024', onUpdate:false)]
    public $selectedImage;
    public $oldImage;
    public $logo_url;
    #[Rule('nullable', as: 'Yeni Resim')]
    public $selectedNewImage;
    public $image;
    #[Rule('nullable|', as: 'Durum')]
    public $isActive = 1;
    #[Rule('nullable', as: 'Silinmiş mi')]
    public $isDeleted;
    // #[Rule('nullable', as: 'Özel Not')]
    public $note;

    public function create()
    {
        $this->ShowTable = false;
        $this->CreateForm = true;
    }


    public function table()
    {
        $this->ShowTable = true;
        $this->CreateForm = false;
    }

    public function store()
    {
        $this->validate();

        $image = $this->selectedImage;
        $slug = Str::slug($this->name);
        if (isset($image)) {
            // make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            // check category dir is exists
            if (!Storage::disk('public')->exists('logo')) {
                Storage::disk('public')->makeDirectory('logo');
            }
            // resize image for category and upload
            $brand = Image::make($image)->resize(75, 75)->save();
            Storage::disk('public')->put('logo/' . $imagename, $brand);

            //            check category slider dir is exists
            if (!Storage::disk('public')->exists('logo/slider')) {
                Storage::disk('public')->makeDirectory('logo/slider');
            }
            //            resize image for category slider and upload
            $slider = Image::make($image)->resize(150, 150)->save();
            Storage::disk('public')->put('logo/slider/' . $imagename, $slider);
        } else {
            $imagename = "default_logo.png";
        }

        $brand =  new Brand();
        $brand->name = $this->name;
        $brand->slug = $slug;
        $brand->description = $this->description;
        $brand->image = $imagename;
        $brand->isActive = $this->isActive;
        $brand->note = $this->note;
        $brand->save();

        if ($brand == null) {
            $this->alert('warning', 'Bir hata oluştu. Kayıt işlemi yapılmadı.');
        } else {
            $this->alert('success', 'Kayıt işlemi başarılı bir şekilde yapıldı.');
        }

        $this->ShowTable = true;
        $this->CreateForm = false;
        $this->reset();
    }

    public function edit($id)
    {
        $this->reset();
        $brand = Brand::findOrFail($id);

     
        $this->name = $brand->name;
       
        $this->description = $brand->description;
      
        $this->image = $brand->image;
        $this->isActive = $brand->isActive;
        $this->note = $brand->note;
        $this->brandId = $brand->id;
     
        $this->ShowTable = false;
        $this->EditForm = true;
        $this->resetValidation();
    }


    public function updateBrand()
    {
      
        $this->validate();

       

        $imageold = $this->logo_url;
        $imageNew = $this->selectedNewImage;

        $slug = Str::slug($this->name);
      
   
        if(isset($imageNew)) {
       
            
            // make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $imageNew->getClientOriginalExtension();
            //    check category dir is exists
            if (!Storage::disk('public')->exists('logo')) {
                Storage::disk('public')->makeDirectory('logo');
            }
            // delete old image
            if (Storage::disk('public')->exists('logo/' . $this->image)) {
                Storage::disk('public')->delete('logo/' . $this->image);
            }
            //   resize image for category and upload
            $brandimage = Image::make($imageNew)->resize(125, 100)->save();
            Storage::disk('public')->put('logo/' . $imagename, $brandimage);

            //            check category slider dir is exists
            if (!Storage::disk('public')->exists('logo/slider')) {
                Storage::disk('public')->makeDirectory('logo/slider');
            }
            //            delete old slider image
            if (Storage::disk('public')->exists('logo/slider/' . $this->image)) {
                Storage::disk('public')->delete('logo/slider/' . $this->image);
            }
            //            resize image for category slider and upload
            $slider = Image::make($imageNew)->resize(250, 200)->save();
            Storage::disk('public')->put('logo/slider/' . $imagename, $slider);
        } else {
            $imagename = $imageold;
        }

      
        $brand = Brand::findOrFail($this->brandId);
      
        $brand->update([
            'name' => $this->name,
            'slug' => $slug,
            'image' => $imagename,
            'description' => $this->description,
            'isActive' => $this->isActive,
            'note' =>$this->note,
           
        ]);
        if ($brand == null) {
            $this->alert('warning', 'Bir hata oluştu. Güncelleme işlemi yapılmadı.');
        } else {
            $this->alert('success', 'Güncelleme işlemi başarılı bir şekilde yapıldı.');
        }

        $this->ShowTable = true;
        $this->EditForm = false;
        $this->reset();
    }




    ########## Çoklu Seçim İşlemleri ##########
    public function updatedSelectPageRows($value)
    {
        if ($value) {
            $this->selectedRows = $this->brands->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset('selectedRows', 'selectPageRows');
        }
    }
    #[On('brand-deleted')]
    public function getBrandsProperty()
    {
        return Brand::latest()->nonDeleted()->paginate("10");
    }

    public function deleteSelectedRows()
    {
        Brand::whereIn('id', $this->selectedRows)->update(['isDeleted' => 1]);

        $this->dispatch('brand-deleted');
        $this->reset('selectedRows', 'selectPageRows');

        $this->alert('success', 'Başarılı birşekilde sildiniz.');
    }

    public function passiveSelectedRows()
    {
        Brand::whereIn('id', $this->selectedRows)->update(['isActive' => 0]);


        $this->reset('selectedRows', 'selectPageRows');

        $this->alert('success', 'Başarılı birşekilde pasif yaptınız.');
    }

    public function activeSelectedRows()
    {
        Brand::whereIn('id', $this->selectedRows)->update(['isActive' => 1]);


        $this->reset('selectedRows', 'selectPageRows');

        $this->alert('success', 'Başarılı birşekilde aktif yaptınız.');
    }


    ########## Çok Seçim İşlemleri Bitiş ##########






    ########## Tekil Durum Değiştirme ##########
    public function changeStatusActive($brandId)
    {
        Brand::findOrFail($brandId)->update(['isActive' => true]);
    }

    public function changeStatusPassive($brandId)
    {
        Brand::findOrFail($brandId)->update(['isActive' => false]);
    }
    ########## Tekil Durum Değiştirme Bitiş ##########


    public function sendTrash($brandId)
    {
        Brand::findOrFail($brandId)->update(['isDeleted' => 1]);
        $this->alert('success', 'Başarılı birşekilde sildiniz.');
    }






    #[On('brand-deleted')]
    public function render()
    {
        $brands = Brand::latest()->nonDeleted()->paginate("10");
        $totalBrands = Brand::latest()->nonDeleted()->count();

        return view('admin.brand.brand-list', [
            'brands' => $brands,
            'totalBrands' => $totalBrands
        ]);
    }
}
