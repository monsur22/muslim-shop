<div>
    <div>
        <div class="page-header">
            <div class="page-title">
                <h4>Brand ADD </h4>
                <h6>Create new Brand</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Brand Name</label>
                            <input type="text" wire:model="name"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea wire:model="desc" class="form-control @error('desc') is-invalid @enderror"></textarea>
                            @error('desc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-lg-12">
                        <div class="form-group">
                            <label>Product Image</label>
                            <input type="file" wire:model="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div> --}}
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label> Brand Image</label>
                            <div class="image-upload">
                                <input type="file" wire:model="image" @error('image') is-invalid @enderror>
                                <div class="image-uploads">
                                    <img src="{{ asset('admin/assets/img/icons/upload.svg') }}" alt="img">
                                    <h4>Drag and drop a file to upload</h4>
                                </div>
                            </div>
                            @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @if ($image)
                        <div class="col-12">
                            <div class="product-list">
                                <ul class="row">
                                    <li>
                                        <div class="productviews">
                                            <div class="productviewsimg">
                                                <img src="{{ $image->temporaryUrl() }}" alt="img">
                                            </div>
                                            <div class="productviewscontent">
                                                <div class="productviewsname">
                                                    <h2>{{ $image->getClientOriginalName() }}</h2>
                                                </div>
                                                <a href="javascript:void(0);" class="hideset">x</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif

                    <div class="col-lg-12">
                        <button wire:click="add" class="btn btn-submit me-2">Submit</button>
                        <a wire:navigate href="{{ route('brands.index') }}" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
