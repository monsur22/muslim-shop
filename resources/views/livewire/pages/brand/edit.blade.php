{{-- <div>
    <div class="page-header">
        <div class="page-title">
            <h4>Brand Edit </h4>
            <h6>Update your Brand</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Brand Name</label>
                        <input type="text" value="samsung">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label> Product Image</label>
                        <div class="image-upload">
                            <input type="file">
                            <div class="image-uploads">
                                <img src="{{asset('admin/assets/img/icons/upload.svg')}}" alt="img">
                                <h4>Drag and drop a file to upload</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="product-list">
                        <ul class="row">
                            <li>
                                <div class="productviews">
                                    <div class="productviewsimg">
                                        <img src="{{asset('admin/assets/img/brand/samsung.png')}}" alt="img">
                                    </div>
                                    <div class="productviewscontent">
                                        <div class="productviewsname">
                                            <h2>samsung</h2>
                                            <h3>581kb</h3>
                                        </div>
                                        <a href="javascript:void(0);">x</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
                    <a href="brandlist.html" class="btn btn-cancel">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div>
    <div class="page-header">
        <div class="page-title">
            <h4>Brand Edit</h4>
            <h6>Update your Brand</h6>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="updateBrand">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Brand Name</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea wire:model="desc" class="form-control"></textarea>
                            @error('desc') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    {{-- <div class="col-lg-12">
                        <div class="form-group">
                            <label>Product Image</label>
                            <input type="file" wire:model="image" class="form-control-file">
                            @if($image)
                                <img src="{{ $image->temporaryUrl() }}" alt="Preview">
                            @else
                                <img src="{{ asset('admin/assets/img/icons/upload.svg') }}" alt="img">
                            @endif
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div> --}}
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label> Brand Image</label>
                            <div class="image-upload">
                                <input type="file" wire:model="image">
                                <div class="image-uploads">
                                    <img src="{{asset('admin/assets/img/icons/upload.svg')}}" alt="img">
                                    <h4>Drag and drop a file to upload</h4>
                                </div>
                            </div>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                    </div>

                    @if($this->brand->image)
                    <div class="col-12">
                        <div class="product-list">
                            <ul class="row">
                                <li>
                                    <div class="productviews">
                                        <div class="productviewsimg">
                                            <img src="{{ asset('storage/' . $this->brand->image) }}" alt="img">
                                        </div>
                                        <div class="productviewscontent">
                                            <div class="productviewsname">
                                                <h2>{{$this->brand->name}}</h2>
                                                {{-- <h3>581kb</h3> --}}
                                            </div>
                                            <a href="javascript:void(0);" class="hideset">x</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endif
                    <!-- Other fields and actions -->
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a wire:navigate href="{{ route('brands.index') }}" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
